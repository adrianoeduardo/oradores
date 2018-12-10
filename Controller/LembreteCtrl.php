<?php
require_once '../Model/Lembretes.php';
header('Access-Control-Allow-Origin:http://localhost:4200');
header("Access-Control-Allow-Headers: Content-Type");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");
$params = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$metodo = $_SERVER['REQUEST_METHOD'];
$lembrete=isset($request->lemb)?$request->lemb:"";
$prazo=isset($request->dataPrazo)?$request->dataPrazo:"";

$lembretes = new Lembretes;
switch ($metodo) {
    case "GET":
        $response = $lembretes->findAll();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
        break;
    case "POST":
        $response = $lembretes->inserirLembrete($lembrete, $prazo);
        echo json_encode($response);
        break;
    case "DELETE":
        $response =$lembretes->deletarLembrete($params[0]);
        echo json_encode($response);
        break;
    case "PUT":
        $response = $lembretes->riscarLembrete();
        echo json_encode($response);
        break;
}

?>