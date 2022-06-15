<?php 
  require('../conexion.php');
  session_start();
  if (isset($_POST['save_task'])){

    $servicio = $_POST['servicio'];
    $precio=$_POST['precio'];
    echo $servicio;
    echo $precio;

    $query="INSERT INTO peluqueria.servicio(nombre, precio,fecha_creacion) VALUES ('$servicio', '$precio', NOW())";
    $resultado=pg_query($conn,$query);

    if(!$resultado){
      die("Insercion fallida");
    }

    $_SESSION['message']='Guadado de forma exitosa';
    $_SESSION['message_type']='success';

    header("location:../principal.php");
  }


?>