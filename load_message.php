<?php
session_start();

header("Content-Type: text/javascript");

$data = json_decode(file_get_contents('php://input'), true);
$dbhost = "localhost";
$dbuser = "lan_user";
$dbpass = "lan_user";
$db = "Chat_DB";


$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);
$sql = "SELECT * FROM mensaje WHERE (remitente='".$_SESSION['user']."' and destinatario='".$data['destinatario']."') or (remitente='".$data['destinatario']."' and destinatario='".$_SESSION['user']."')";

$result = $conn->query($sql);

$mensajes = array();
if ($result) {
  while($row = $result->fetch_array()) {
          $item = '{"destinatario": "' .$row["destinatario"];
          $item .= '", "remitente": "'.$row["remitente"];
          $item .= '", "mensaje": "'.$row["mensaje"];
          $item .= '", "fecha": "'.$row["fecha_actual"].'"}';
      array_push($mensajes, $item);
  }
  echo "[" . implode(", ", $mensajes) . "]";
}
$conn->close();

?>
