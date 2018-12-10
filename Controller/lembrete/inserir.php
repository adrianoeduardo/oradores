<?php 
require_once '../../Model/Lembretes.php';
require_once '../headers.php';
$headers = new Headers;
$headers->index();
$params = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$lembrete=isset($request->lemb)?$request->lemb:"";
$prazo=isset($request->dataPrazo)?$request->dataPrazo:"";
$lembretes = new Lembretes;

if($lembrete == "" || $prazo == ""){
    echo json_encode("Há campos inválidos");
    exit;
}

$response = $lembretes->inserirLembrete($lembrete, $prazo);
echo json_encode($response);
?>