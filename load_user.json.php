<?php
session_start();
header("Content-Type: text/javascript");
$dbhost = "localhost";
$dbuser = "lan_user";
$dbpass = "lan_user";
$db = "Chat_DB";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);
$sql = "SELECT username FROM usuario";
$result = $conn->query($sql);
$usuarios = array();
while($row = $result->fetch_assoc()) {
    $item = '{"username": "'.$row["username"].'"}';
    array_push($usuarios, $item);
}
echo "[" . implode(", ", $usuarios) . "]";
$conn->close();
?>
