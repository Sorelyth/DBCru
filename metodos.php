<?php
function LoginUsuario($vcorreo,$vcontra){
  include 'configuracion.php';
  $sentencia="SELECT nombre, correo, contraseña FROM usuarios WHERE correo='".$vcorreo."'";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  mysqli_stmt_bind_result($result,$nombre,$correo,$contraseña);
  mysqli_stmt_fetch($result);
  if(password_verify($vcontra,$contraseña)){
    session_start();
    $_SESSION['nombre']=$nombre;
    $_SESSION['contraseña']=$contraseña;
    $_SESSION['correo']=$correo;
    //header('Location: index.php');
  }
  else{
    echo '<script type="text/javascript">alert("Usuario o contraseña incorrecto(a).")</script>';
  }
  mysqli_stmt_close($result);
  mysqli_close($mysqli);
}

function RegistroUsuario($vnombre,$vcorreo,$vcontra,$vedad,$vcedula,$vpais,$vciudad,$vcargo,$vcompon,$vfase,$vequiponal,$vequipociudad,$vestado){
  include 'configuracion.php';
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
    //header('Location: login.php');
  }
}

?>