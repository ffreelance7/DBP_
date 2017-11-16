<?php
session_start();
header("Content-Type: text/javascript");

$dbhost = "localhost";
$dbuser = "lan_user";
$dbpass = "lan_user";
$db = "Chat_DB";

$username = $_GET["codigo"];
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);
$sql = "SELECT username,nombres,apellidos FROM usuario WHERE username='$username'";
$result = $conn->query($sql);
$usuarios = array();
while($row = $result->fetch_assoc()) {
       $item = '{"username": "' .$row["username"];
       $item .= '", "nombres": "'.$row["nombres"];
       $item .= '", "apellidos": "'.$row["apellidos"].'"}';
    array_push($usuarios, $item);
}
echo "[" . implode(", ", $usuarios) . "]";
$conn->close();
?>
