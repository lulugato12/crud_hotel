<?php
  session_start();
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  try{
    self::$cont =  new PDO( "mysql:host=localhost;"."dbname="."proyecto", "root", "");
  }
  catch(PDOException $e) {
    die($e->getMessage());
  }

  $sql = 'SELECT * FROM usuario WHERE ';
  foreach ($pdo->query($sql) as $row) {
    echo $row['nombre'] . ' ';
    echo $row['apellido']. '<br>';
  }

?>
