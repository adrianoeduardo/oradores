<?php
require_once '../../Model/Lembretes.php';
require_once '../headers.php';
$headers = new Headers;
$headers->index();
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");
$params = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
$postdata = file_get_contents("php://input");
$lembretes = new Lembretes;
$response =$lembretes->deletarLembrete($params[0]);
echo json_encode($response);

?>