<?php
 include 'configuracion.php';

 $json=array();

 if(isset($_GET["correo"]) && isset($_GET["contrasena"])){
    $correo=$_GET['correo'];
		$contrasena=$_GET['contrasena'];

		$consulta="SELECT correo, contrasena, nombre FROM usuarios WHERE correo= '".$correo."' AND contrasena= '".$contrasena."'";
    $resultado = mysqli_prepare($mysqli,$consulta);
    mysqli_stmt_execute($resultado);
    mysqli_stmt_store_result($resultado);
    mysqli_stmt_bind_result($resultado,$correo,$contrasena,$nombre);
    mysqli_stmt_fetch($resultado);

    $json['nombre']=$nombre;
    $json['correo']=$correo;
    $json['contrasena']=$contrasena;

    echo json_encode($json);

    //header('Content-Type: application/json; charset=utf8');
  }
?>
