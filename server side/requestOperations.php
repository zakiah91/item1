<?php
	include  "sql_queries_class.php";

	if(isset($_POST['usrId'])){
		$usrId = $_POST['usrId'];
	}else{
		die("Operation not allowed");
	}
		
		
	if(isset($_POST['opCode'])){
		$opCode = $_POST['opCode'];
	}
	
	if(isset($_POST['usrDate'])){
		$userDate = $_POST['usrDate'];
	}
	
	if(isset($_POST['usrTask'])){
		$userTask = $_POST['usrTask'];
	}
	
	if(isset($_POST['usrIsDone'])){
		$userIsDone = $_POST['usrIsDone'];
	}
	
	if($opCode != null){
		$ToDoList = new sqlQueries();
		$val = $ToDoList->setUserId($usrId);

		
		switch($opCode){
			case '5':
					//echo $userDate;
					if($userDate != null){
						$val = $ToDoList -> getToDoListBasedOnDate($userDate);
						echo  "JSON value : ".$val;
					}else{
						
						echo "Operation not allowed";		
					}
					 break;
			case '6':
					if($userIsDone != null){
						$val = $ToDoList -> getToDoListBasedIsDoneStatus($userIsDone);
						echo  "JSON value : ".$val;
					}else{
						
						echo "Operation not allowed";		
					}
					 break;
			case '7':
					if($userTask != null && $userDate != null && $userIsDone != null){
						$val = $ToDoList -> createNewToDoList($userDate,$userTask,$userIsDone);
						echo  "Result : ".$val;
					}else{
						
						echo "Operation not allowed";		
					}
					 break;
			case '8':
					if($userDate != null){
						$val = $ToDoList -> deleteToDoListBasedOnDate($userDate);
						echo  "Result : ".$val;
					}else{
						
						echo "Operation not allowed";		
					}
					 break;
			case '9':
					if($userDate != null && $userTask != null){
						$val = $ToDoList -> setToDoListForisDoneStatusToYesBasedOnDateANDTask($userDate,$userTask);
						echo "Result :".$val;
					}else{
						echo "Operation not allowed";
					}
			default:
					  break;
		}
	}else{
		echo "zakiah no operation given. ";
	}

	
	
	
	

?>