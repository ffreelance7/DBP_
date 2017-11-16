<?php
session_start();
header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);
$dbhost = "localhost";
$dbuser = "lan_user";
$dbpass = "lan_user";
$db = "Chat_DB";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);
$sql = "SELECT username,password FROM usuario WHERE username='".$data["username"]."' AND password='".$data["password"]."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

	echo '{"result": "TRUE"}';
}
else {
	echo '{"result": "Usuario o contraseña incorrecta"}';
}
$conn->close();
?>
