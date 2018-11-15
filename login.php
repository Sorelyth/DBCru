<?php
 include 'configuracion.php';

if(isset($_POST['correo']) && isset($_POST['contraseña'])){
    $vcorreo=$_POST['correo'];
    $vcontra=$_POST['contraseña'];
  
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
  echo json_encode($result);
}

?>