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
    mysqli_stmt_bind_result($resultado,$correo,$contraseña,$nombre);
    mysqli_stmt_fetch($resultado);

    $json['nombre']=$nombre;
    $json['correo']=$correo;
    $json['contrasena']=$contrasena;
    echo $json;
    echo json_encode($json);


  }

	/*if(isset($_GET["correo"]) && isset($_GET["contraseña"])){
		$correo=$_GET['correo'];
		$contraseña=$_GET['contraseña'];

		$consulta="SELECT correo, contraseña, nombre FROM usuarios WHERE correo= '{$correo}' AND contraseña= '{$contraseña}'";
		$resultado=mysqli_query($mysqli,$consulta);

		if($consulta){
			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($mysqli);
			echo json_encode($json);
		}
		else{
			$results["correo"]='';
			$results["contraseña"]='';
			$results["nombre"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
	}
	else{
		   	$results["correo"]='';
			$results["contraseña"]='';
			$results["nombre"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}*/

/*if(isset($_GET['correo']) && isset($_GET['contraseña'])){
    $vcorreo=$_GET['correo'];
    $vcontra=$_GET['contraseña'];

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
}*/

?>
