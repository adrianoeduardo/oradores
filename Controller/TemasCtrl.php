<?php
require_once '../Model/Temas.php';
header('Access-Control-Allow-Origin:http://localhost:4200');
header("Access-Control-Allow-Headers: Content-Type");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");
$params = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$metodo = $_SERVER['REQUEST_METHOD'];
$id=isset($request->num)?$request->num:"";
$temaDiscurso=isset($request->temaDiscurso)?$request->temaDiscurso:"";
$sn=isset($request->chAtualizado)?$request->chAtualizado:"";

$temas = new Temas;
switch ($metodo) {
    case "GET":
        if ($params[0]){
            $response = $temas->find($params[0]);
        }else{
            $response = $temas->findAll();
        }       
        header('Content-Type: application/json; charset=utf8');
        echo json_encode($response);
        break;
    case "POST":
        $response = $temas->inserirTema($id, $temaDiscurso);
        return $response;
        break;
    case "PUT":
        $response = $temas->inserirTema($id, $temaDiscurso, $sn);
        return $response;
        break;
}