<?php

session_start();

require('../vendor/autoload.php');

use App\Controllers\userController;

$rawData = file_get_contents("php://input");

$data = json_decode($rawData,true);//convertimos los valores string a json

$userController = new userController();

$id = $userController-> register($data['name'],$data['email'],$data['password']);

if ($id === 0) {
    http_response_code(400);
    echo "Ya existe un usuario registrado con ese email";
    
}else {
    http_response_code(200);
    echo $id;
}


