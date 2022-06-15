<?php 
  require('../conexion.php');
  session_start();
  if (isset($_POST['save_task'])){

    $unidades = $_POST['cantidad_unidades'];
    $nombre_categoria = $_POST['nombre_categoria'];

    $nombre_producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $precio=$_POST['precio'];

    $query_categorias="INSERT INTO public.categorias(nombre_categoria) VALUES ('$nombre_categoria')";
    $resultado_categorias=pg_query($conn,$query_categorias);

    if(!$resultado_categorias){
        die("Insercion fallida");
      }else{
        $query_productos="INSERT INTO public.productos(nombre, descripcion, prec_producto,cantidad_unid, exis_producto) VALUES ('$nombre_producto', '$descripcion', '$precio','$unidades','s')";
        $resultado_productos=pg_query($conn,$query_productos);
      }

      if(!$resultado_productos){
        die("Insercion fallida");
      }

    $_SESSION['message']='Guadado de forma exitosa';
    $_SESSION['message_type']='success';

    header("location:../principal.php");
  }


?>