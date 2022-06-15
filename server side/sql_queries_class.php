<?php

//zakiah12062022: basic operations for sql queries start
class sqlQueries{

	private $conn;
	private $username; // for server
	private $password; // for server
	private $userId;
	private $dbname;
	private $servername; // for server
	private $dbTableName;
	private $sql_cmd;
	public $status;
	public $jsonValue; //store value from db in jsone
	public $isViewLog = false; //set this false if dont want to view log
	
	
	function __construct(){
		
	
		$this->servername = "localhost";
		$this->dbname = "todo_list_db";
		$this->username = "root";
		$this->password = "";
		$this->dbTableName="user_todo_db";
		
		$this->connectToSqlDb(); //return db connection status. 
			
	}
	
	private function connectToSqlDb(){
		
		try{
			$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
		
			$this->conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			//echo "zakiah connection is successfull";
			
			//$this->conn = $try_conn;
			
			$this->status = "OK";
		}
		catch(PDOException $pdoException){
			//echo "zakiah connection to phpmyadmin failed = ". $pdoException->getMessage();
			
			$this->status = "ERR";
		}
		
		
	}

	function registerUser($param_userEmail){

		$this->sql_cmd="SELECT `userId` FROM `user_details` WHERE `googleEmail`='$param_userEmail' ";
		
		$sql_prepare = $this->conn->prepare($this->sql_cmd);
		$sql_prepare->execute();
		$sql_result = $sql_prepare -> setFetchMode(PDO::FETCH_ASSOC);
		
		$this->jsonValue = $sql_prepare->fetchAll();

		if($this->jsonValue != null){
			echo "value already exist";
			return;
		}



		$this->sql_cmd="SELECT COUNT(*) FROM `user_details`";
		
		$sql_prepare = $this->conn->prepare($this->sql_cmd);
		$sql_prepare->execute();
		$sql_result = $sql_prepare -> setFetchMode(PDO::FETCH_ASSOC);
		
		$this->jsonValue = $sql_prepare->fetchAll();

		$newUserId = "user".($this->jsonValue[0]['COUNT(*)']+1);

		$this->sql_cmd="INSERT INTO `user_details`(`googleEmail`, `userId`) VALUES ('$param_userEmail','$newUserId')";

		$sql_prepare = $this->conn->prepare($this->sql_cmd);
		$sql_prepare->execute();


		//var_dump($newUserId);
		
		//$this->userId = $this->jsonValue[0]['COUNT(*)']; //userId is unique, only 1. so, this is valid

		//var_dump($this->jsonValue);
	}
	
	function getUserIdFromEmail($param_userEmail){
		
		//after user sign to google account, we can obtain the google email.
		//google email is unique for each user.
		//but, email is private, so we will user the userId when accessing the ToDo List
		
		$this->sql_cmd="SELECT `userId` FROM `user_details` WHERE `googleEmail`='$param_userEmail'";
		
		$sql_prepare = $this->conn->prepare($this->sql_cmd);
		$sql_prepare->execute();
		$sql_result = $sql_prepare -> setFetchMode(PDO::FETCH_ASSOC);
		
		$this->jsonValue = $sql_prepare->fetchAll();
		
		$this->userId = $this->jsonValue[0]['userId']; //userId is unique, only 1. so, this is valid
		
		$this->viewLog("zakiah AT setUserId",false);
		$this->viewLog($this->userId,true);
		
		//$this->viewLog($this->jsonValue,true);
	}

	function getUserId(){
		return $this->userId;
	}

	function setUserId($param_usrId){
		$this->userId= $param_usrId;
	}
	
	
	function getToDoListBasedOnDate($param_date){
		
		$this->sql_cmd = "SELECT * FROM `$this->dbTableName` WHERE `date`='$param_date' AND `userId`='$this->userId' ";
		
		$sql_prepare = $this->conn -> prepare($this->sql_cmd);
		$sql_prepare -> execute();
		$sql_result = $sql_prepare -> setFetchMode(PDO::FETCH_ASSOC);
		
		$this->jsonValue = json_encode($sql_prepare->fetchAll());
		
		$this->viewLog("zakiah AT getToDoListBasedOnDate",false);

		$this->viewLog($this->jsonValue, true);
		
		return $this->jsonValue;
		
	}
	
	function getToDoListBasedIsDoneStatus($param_isDone){
		
		$this -> sql_cmd = "SELECT * FROM `$this->dbTableName` WHERE `isDone`= '$param_isDone' AND `userId`='$this->userId'";
		
		$sql_prepare = $this->conn-> prepare($this->sql_cmd);
		$sql_prepare -> execute();
		$sql_result = $sql_prepare -> setFetchMode(PDO::FETCH_ASSOC);
		
		//var_dump($sql_result);
		//var_dump($sql_prepare->fetchAll());
		
		//this $sql_prepare->fetch_All() can be run one time only to get the value. this maybe due to usage of pointers/arrays traversal inside it. so,when we call it for second time we only get null
		$this-> jsonValue = json_encode($sql_prepare->fetchAll());
		
		//$this->jsonValue= $sql_prepare->fetchAll();
		
		//var_dump($this->jsonValue);
		$this->viewLog("zakiah AT getToDoListBasedIsDoneStatus",false);
		$this->viewLog($this->jsonValue,true);
		
		return $this->jsonValue;
		
	}
	
	function createNewToDoList($param_date,$param_task,$param_isDone){
		
		$this->sql_cmd = "INSERT INTO `$this->dbTableName`(`userId`, `date`, `task`, `isDone`) 
							VALUES ('$this->userId','$param_date','$param_task','$param_isDone')";
		
		$sql_prepare = $this->conn->prepare($this->sql_cmd);
		$sql_prepare->execute();
		
		return "INSERT Success";
	}
	
	function deleteToDoListBasedOnDate($param_date){
		
		$this->sql_cmd = "DELETE FROM `user_todo_db` WHERE `date`='$param_date' AND `userId`='$this->userId'";
		
		$sql_prepare = $this->conn->prepare($this->sql_cmd);
		$sql_prepare->execute();
		
		return "DELETE Success";
		
	}
	
	function setToDoListForisDoneStatusToYesBasedOnDateANDTask($param_date,$param_task){
		
		$this->sql_cmd="UPDATE `user_todo_db` SET `isDone`='YES'  WHERE `userId`='$this->userId' AND`date`='$param_date' AND `task`='$param_task'";
		
		$sql_prepare = $this->conn->prepare($this->sql_cmd);
		$sql_prepare->execute();
		
		return "UPDATE Success";
	
	}
	
	function disconnectFromSqlDb(){
		$this->conn = null;
		$this->viewLog("zakiah disconnectFromSqlDb",false);
	}
	
	
	function viewLog($strLog,$setAsVarDump){
		
		if($this->isViewLog == true && $setAsVarDump == false)
			echo $strLog."<br/>";
		else if ($this->isViewLog == true && $setAsVarDump == true)
			var_dump($strLog);
			
	}
	

}

//zakiah12062022: basic operation for sql queries end
?>