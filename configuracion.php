<?php
  $db_host='localhost';
  $db_user='root';
  $db_password='equipocru1';
  $db_schema='discipulado';
  $mysqli=mysqli_connect($db_host,$db_user,$db_password,$db_schema);
  if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}
?>