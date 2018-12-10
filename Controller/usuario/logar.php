<?php
session_start();
require_once '../../Model/Usuario.php';
require_once '../headers.php';
$headers = new Headers;
$headers->index();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$vc_login= isset($request->vc_login)?$request->vc_login:"";
$vc_senha= isset($request->vc_senha)?$request->vc_senha:"";
if (isset($_SESSION)){
    unset($_SESSION);
}

$usuario = new Usuario;
$response = $usuario->logar($vc_login, $vc_senha);
if ($response == "erro"){
    $_SESSION['erroLogin']='Usuário Incorreto ou Senha Incorreta';
    $_SESSION['logado'] = false;
}else if ($response == "falha"){
    $_SESSION['erroLogin']='Houve uma falha na autenticação. Tente novamente mais tarde';
    $_SESSION['logado'] = false;
}else{
    $_SESSION['logado'] = true;
    $_SESSION['nome'] = $response[0]['vc_nome'];
    $_SESSION['usuario']= $response[0]['vc_login'];
    $_SESSION['token'] = $response[0]['vc_token'];
    $_SESSION['email']= $response[0]['vc_email'];
}
//print_r($_SESSION);
echo json_encode($_SESSION);