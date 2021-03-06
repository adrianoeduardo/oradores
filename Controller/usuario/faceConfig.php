<?php
session_start();
require_once '../lib/Facebook/autoload.php';
/*require_once '../../Model/Usuario.php';*/
require_once '../headers.php';
$headers = new Headers;
header("Access-Control-Allow-Headers: Content-Type");
$headers->index();

$fb = new Facebook\Facebook([
    'app_id' => '339069046891344',
    'app_secret' => '3535327cd0c55fd3c45ec3fe2d0eee2f',
    'default_graph_version' => 'v2.2',
]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
try {
    if(isset($_SESSION['face_access_token'])){
          $accessToken = $_SESSION['face_access_token'];
      }else{
          $accessToken = $helper->getAccessToken();
      }
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
$loginUrl = $helper->getLoginUrl('http://localhost/projeto-oradores/Controller/usuario/faceCallback.php', $permissions);

//echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
echo json_encode($loginUrl);

/*
try {
	if(isset($_SESSION['face_access_token'])){
		$accessToken = $_SESSION['face_access_token'];
	}else{
		$accessToken = $helper->getAccessToken();
	}
	
} catch(Facebook\Exceptions\FacebookResponseException $e) {
	// When Graph returns an error
	echo $e->getMessage();
	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
	// When validation fails or other local issues
	echo $e->getMessage();
	exit;
}

if (! isset($accessToken)) {
	$url_login = 'http://localhost/projeto-oradores/Controller/usuario/faceConfig.php';
	$loginUrl = $helper->getLoginUrl($url_login, $permissions);
}else{
	$url_login = 'http://localhost/projeto-oradores/Controller/usuario/faceConfig.php';
	$loginUrl = $helper->getLoginUrl($url_login, $permissions);
	//Usuário ja autenticado
	if(isset($_SESSION['face_access_token'])){
		$fb->setDefaultAccessToken($_SESSION['face_access_token']);
	}//Usuário não está autenticado
	else{
		$_SESSION['face_access_token'] = (string) $accessToken;
		$oAuth2Client = $fb->getOAuth2Client();
		$_SESSION['face_access_token'] = (string) $oAuth2Client->getLongLivedAccessToken($_SESSION['face_access_token']);
		$fb->setDefaultAccessToken($_SESSION['face_access_token']);	
	}
	
	try {
		// Returns a `Facebook\FacebookResponse` object
		$response = $fb->get('/me?fields=name, email');
        $user = $response->getGraphUser();
        $usuario = new Usuario;
        $response = $usuario->logarFace($user['email']);
        $_SESSION['logado'] = true;
        $_SESSION['nome'] = $response[0]['vc_nome'];
        $_SESSION['usuario']= $response[0]['vc_login'];
        $_SESSION['token'] = $response[0]['vc_token'];
        $_SESSION['email']= $response[0]['vc_email'];
        print_r($_SESSION);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
		echo $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		echo $e->getMessage();
	exit;
    }
    header('Location: http://localhost:4200/login');
}*/