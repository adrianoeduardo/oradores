<?php 
require_once '../../Model/Lembretes.php';
require_once '../headers.php';
$headers = new Headers;
$headers->index();
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$riscar=isset($request->ch_riscado)?$request->ch_riscado:"";
$id=isset($request->sr_id)?$request->sr_id:"";
print_r($request);
$lembretes = new Lembretes;

if($riscar == "" || $id == ""){
    echo json_encode("Houve um problema");
    exit;
}

$response = $lembretes->riscarLembrete($riscar, $id);
echo json_encode($response);