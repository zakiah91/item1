<?php

include('googleSignInConfig.php');


$google_client->revokeToken();

session_destroy();

header('location:createUserIdWithGoogleAcc.php');

?>