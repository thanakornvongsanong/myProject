<?php
session_start();
include '/user.php';
require_once __DIR__ . '/Facebook/autoload.php';
include('facebook/facebook.php');
$fb = new Facebook\Facebook([
  'app_id' => '353390875049245',
  'app_secret' => '697d1d5ca0719c5141922187a33b2987',
  'default_graph_version' => 'v2.5',
]);
$permissions = ['user_birthday','email'];
$redirect = 'http://localhost/project/fblogin.php';
$helper = $fb->getRedirectLoginHelper();
try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}
if (isset($accessToken)) {
	  	// Logged in!
	 	// Now you can redirect to another page and use the
  		// access token from $_SESSION['facebook_access_token'] 
  		// But we shall we the same page

		// Sets the default fallback access token so 
		// we don't have to pass it to each request
		$fb->setDefaultAccessToken($accessToken);

		try {
			
		
		  $response = $fb->get('/me?fields=email,name,gender,birthday');
		  $userNode = $response->getGraphUser();
		}catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		$name= $userNode->getName();
		$id = $userNode->getId();
		$gender = $userNode->getGender();
		$email = $userNode->getProperty('email');
		$image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
		
		$id = $userNode->getId();
		$us = User::findByFacebookid($id);
                if($us!=null){
                    echo "Welcome ".$us->nick_name."</br>"."<img src='$image' /><br><br>"; 
                    $_SESSION["user"] = $us;
                   echo "<a href='/check.php'>Go Check Session</a>";
                }
                else{
                    echo "plz register";
                }
                
		
		
	}else{
		
		$loginUrl = $helper->getLoginUrl($redirect,$permissions);
		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}


?>