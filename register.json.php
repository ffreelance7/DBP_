<?php
session_start();
header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);
$dbhost = "localhost";
$dbuser = "lan_user";
$dbpass = "lan_user";
$db = "Chat_DB";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);
$sql = "INSERT INTO usuario (username, nombres, apellidos,password) ";
$sql .= " VALUES ('" . $data["username"] . "', '" . $data["nombre"] . "', '";
$sql .= $data["apellidos"] . "', '" . $data["password"] . "')";


$result = $conn->query($sql);
if ($result === TRUE) {
  	echo '{"result": "TRUE"}';
}
else {
	echo '{"result": "No se pudo guardar el alumno"}';
}
$conn->close();
?>
