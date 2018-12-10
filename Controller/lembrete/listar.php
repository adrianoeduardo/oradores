<?php 
require_once '../../Model/Lembretes.php';
require_once '../headers.php';
$headers = new Headers;
$headers->index();
$params = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
$postdata = file_get_contents("php://input");
$lembretes = new Lembretes;
$response = $lembretes->findAll();
echo json_encode($response);
?>