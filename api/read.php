<?php

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'Database.php';
include_once 'Items.php';

$database = new Database();
$db = $database->getConnection();

$items = new Items($db);

$id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : null;


$result = $items->read($id); 

if ($result->num_rows > 0) {
  $itemRecords = array();
  $itemRecords["items"] = array();

  while ($item = $result->fetch_assoc()) {
    $itemDetails = array(
      "id" => $item['id'],
      "nombre" => $item['nombre'],
      "apellido" => $item['apellido'],
      "tramite" => $item['tramite'],
      "fecha" => $item['fecha'],
      "horario" => $item['horario'],
      "id_cliente" => $item['id_cliente'],
    );
    array_push($itemRecords["items"], $itemDetails);
  }

  http_response_code(200);
  echo json_encode($itemRecords);
} else {
  http_response_code(404);
  echo json_encode(array("message" => "No item found."));
}

?>