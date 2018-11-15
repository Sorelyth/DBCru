<?php

include 'configuracion.php';

if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contraseña']) && isset($_POST['edad']) && isset($_POST['cedula']) && isset($_POST['pais']) && isset($_POST['ciudad']) && isset($_POST['cargo']) && isset($_POST['componente']) && isset($_POST['fase']) && isset($_POST['equiponal']) && isset($_POST['equipociudad']) && isset($_POST['estado'])){
    $vnombre=$_POST['nombre'];
    $vcorreo=$_POST['correo'];
    $vcontra=$_POST['contraseña'];
    $vedad=$_POST['edad'];
    $vcedula=$_POST['cedula'];
    $vpais=$_POST['pais'];
    $vciudad=$_POST['ciudad'];
    $vcargo=$_POST['cargo'];
    $vcompon=$_POST['componente'];
    $vfase=$_POST['fase'];
    $vequiponal=$_POST['equiponal'];
    $vequipociudad=$_POST['equipociudad'];
    $vestado=$_POST['estado'];

  
  $sentencia="SELECT correo FROM usuarios WHERE correo='".$vcorreo."'";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  if(mysqli_stmt_num_rows($result)>0){mysqli_stmt_close($result);echo '<script type="text/javascript">alert("Usuario o correo ya existente. Intente otro correo de usuario.")</script>';}
  else{
    mysqli_stmt_close($result);
    $opciones = [ 'cost' => 12,];
    $contraseña = password_hash($vcontra, PASSWORD_BCRYPT, $opciones);
    $sentencia="INSERT INTO usuarios(nombre,correo,contraseña,edad,cedula,pais,ciudad,cargo,componente,fase,equiponal,equipociudad,estado) VALUES('".$vnombre."','".$vcorreo."','".$contraseña."',".$vedad.",".$vcedula.",'".$vpais."','".$vciudad."','".$vcargo."','".$vcompon."','".$vfase."','".$vequiponal."','".$vequipociudad."','".$vestado."')";
    $result = mysqli_prepare($mysqli,$sentencia);
    mysqli_stmt_execute($result);
    mysqli_stmt_store_result($result);
    mysqli_stmt_close($result);
    mysqli_close($mysqli);
    echo json_encode($result);
    //header('Location: login.php');
  }
}

?>