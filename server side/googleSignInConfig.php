<?php 

	require_once 'vendor/autoload.php';
	
	$google_client = new Google_Client();
	
	//zakiah12062022: all these secretId, clientSecret & redirect URL must be same with https://console.cloud.google.com/apis/credentials?project=test11062022
	//we also must registered the redirectUri
	$google_client->setClientId("764810202688-lejbpe6trp7c8dtse3cah51jnad7pfo5.apps.googleusercontent.com");
	
	$google_client->setClientSecret("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");
	
	$google_client->setRedirectUri("http://localhost/mywampvirtualhost/googleSignIn/createUserIdWithGoogleAcc.php");
	
	$google_client->addScope('email');
	
	$google_client->addScope('profile');

	
	session_start();

?>