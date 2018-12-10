<?php
session_start();
require_once '../../Model/Usuario.php';
require_once '../headers.php';
$headers = new Headers;
$headers->index();

echo json_encode($_SESSION);