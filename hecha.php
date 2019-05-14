<?php
require 'database.php';
$id = null;
if ( !empty($_GET['id'])) {
  $id = $_REQUEST['id'];
}
if ( $id==null) {
  header("Location: index.php");
} else {
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE Factura SET Hecha = true WHERE ID = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  Database::disconnect();
  header("Location: index.php");
}
?>
