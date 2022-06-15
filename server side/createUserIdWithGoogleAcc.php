<?php

include('googleSignInConfig.php');
include('sql_queries_class.php');

$login_button = '';

if(isset($_GET['code'])){
    $token = $google_client -> fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token['error'])){
        $google_client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        //For Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2($google_client);
        
        //to get user profile data
        $data = $google_service->userinfo->get();

        if(!empty($data['email'])){
            $_SESSION['email']=$data['email'];
        }

        var_dump($data);
    }

}

if(!isset($_SESSION['access_token'])){
    //echo "Please login using Google Account in order to gain access to the CPP file <br/>";
    $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="sign-in-with-google.png" /></a>';
}

?>

<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login Page</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  
 </head>
 <body>
  <div class="container">
   <br />
   <?php
    if($login_button != ''){
        echo "<h2 align=\"center\">Please login using Google Account in order to gain access to the CPP file <br/></h2>";
    }
    else{
       echo "<h2 align=\"center\">You are now can access the CPP file. Below is your details:<br/>Please click \"Done\" if you want to close this screen.</h2>";
    }
   ?>
   <br />
   <div class="panel panel-default">
   <?php
   if($login_button == '')
   {

    $user = new sqlQueries();

    $user->registerUser($_SESSION['email']);

    $user->setUserId($_SESSION['email']);

    $textFile = fopen("toDoListUserId.txt","w") or die("zakiah unable to open text file");
    fwrite($textFile,$user->getUserIdFromEmail($_SESSION['email']));
    fclose($textFile);

    echo '<div class="panel-heading">Welcome </div><div class="panel-body">';
 //   echo '<h3><b>UserId :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['email'].'</h3>';
    echo '<h3><b>UserId :</b> '.$user-> getUserId().'</h3>'; 
    echo '<h3><a href="googleLogout.php">Done</h3></div>';
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   </div>
  </div>
 </body>
</html>