<?php

include 'configuracion.php';

$json=array();

   if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contrasena']) && isset($_POST['edad']) && isset($_POST['cedula'])
   && isset($_POST['pais']) && isset($_POST['ciudad']) && isset($_POST['cargo']) && isset($_POST['componente']) && isset($_POST['fase'])
   && isset($_POST['equiponal']) && isset($_POST['equipociudad']) && isset($_POST['estado'])){
       $nombre=$_POST['nombre'];
       $correo=$_POST['correo'];
       $contrasena=$_POST['contrasena'];
       $edad=$_POST['edad'];
       $cedula=$_POST['cedula'];
       $pais=$_POST['pais'];
       $ciudad=$_POST['ciudad'];
       $cargo=$_POST['cargo'];
       $componente=$_POST['componente'];
       $fase=$_POST['fase'];
       $equiponal=$_POST['equiponal'];
       $equipociudad=$_POST['equipociudad'];
       $estado=$_POST['estado'];

   $consulta="INSERT INTO usuarios(nombre,correo,contrasena,edad,cedula,pais,ciudad,cargo,componente,fase,equiponal,equipociudad,estado)
   VALUES ('".$nombre."','".$correo."','".$contrasena."',".$edad.",".$cedula.",'".$pais."','".$ciudad."','".$cargo."','".$componente."','".$fase."','".$equiponal."','".$equipociudad."','".$estado."')";
   $resultado = mysqli_prepare($mysqli,$consulta);
   mysqli_stmt_execute($resultado);
   mysqli_stmt_store_result($resultado);
   mysqli_stmt_bind_result($resultado,$nombre,$correo,$contrasena,$edad,$cedula,$pais,$ciudad,$cargo,$componente,$fase,$equiponal,$equipociudad,$estado);
   mysqli_stmt_fetch($resultado);

   $json['nombre']=$nombre;
   $json['correo']=$correo;
   $json['contrasena']=$contrasena;
   $json['edad']=$edad;
   $json['cedula']=$cedula;
   $json['pais']=$pais;
   $json['ciudad']=$ciudad;
   $json['cargo']=$cargo;
   $json['componente']=$componente;
   $json['fase']=$fase;
   $json['equiponal']=$equiponal;
   $json['equipociudad']=$equipociudad;
   $json['estado']=$estado;

   echo json_encode($json);

   //header('Content-Type: application/json; charset=utf8');
   }
?>
