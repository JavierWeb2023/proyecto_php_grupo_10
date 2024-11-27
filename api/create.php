<?php

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'Database.php';
include_once 'Items.php';

$database = new Database();
$db = $database->getConnection();

$items = new Items($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->nombre) && !empty($data->apellido) &&
!empty($data->tramite) && !empty($data->fecha) &&
!empty($data->horario) && !empty($data->id_cliente)){

    $items->nombre = $data->nombre;
    $items->apellido = $data->apellido;
    $items->tramite = $data->tramite;
    $items->fecha = date('Y-m-d');
    $items->horario = time('H-i-s');
    $items->id_cliente = $data->id_cliente;

    if($items->create()){ 
        http_response_code(201); 
        echo json_encode(array("message" => "El turno ha sido generado."));
    } else{ 
        http_response_code(503); 
        echo json_encode(array("message" => "No se ha podido generar el turno."));
    }

}else{ 
    http_response_code(400); 
    echo json_encode(array("message" => "No se ha podido generar el turno. Los datos estan incompletos."));
}
?>