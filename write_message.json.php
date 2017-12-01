<?php
session_start();
header("Content-Type: text/javascript");

$data = json_decode(file_get_contents('php://input'), true);
$dbhost = "localhost";
$dbuser = "lan_user";
$dbpass = "lan_user";
$db = "Chat_DB";

$Fecha = date('Y-m-d H:i:s');

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);
$sql = "INSERT INTO mensaje (mensaje, destinatario, remitente,fecha_actual) ";
$sql .= " VALUES ('" . $data["mensaje"] . "', '" . $data["destinatario"] . "', '";
$sql .= $_SESSION['user'] . "', '" . $Fecha . "')";

$result = $conn->query($sql);
$conn->close();

?>
