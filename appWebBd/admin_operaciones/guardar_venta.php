<?php 
  require('../conexion.php');
  session_start();
  if (isset($_POST['save_venta'])){

    $unidades = $_POST['unidades'];
    $producto= $_POST['producto'];
    $precio_venta= $_POST['precio_venta'];
    $codigo_producto = $_POST['id_producto'];
    $total=$unidades*$precio_venta;

    $query="INSERT INTO public.VENTAS (nombre,fecha,unidades,precio_venta,pago_total,id_productos)
                             VALUES ('$producto', NOW(),'$unidades', '$precio_venta', '$total','$codigo_producto')";
    $resultado=pg_query($conn,$query);


    if(!$resultado){
        die("Insercion fallida");
      }else{
        $query2="SELECT cantidad_unid FROM public.productos WHERE id_productos = '$codigo_producto'";
        $resul2=pg_query($conn,$query2);
        $row=pg_fetch_array($resul2);

        $descuento = $row['cantidad_unid'] - $unidades;
        if($descuento < 1 ){
            echo "sin stock";
        }else{
            $query_update="UPDATE public.productos set cantidad_unid='$descuento' WHERE id_productos='$codigo_producto'";
             pg_query($conn,$query_update);

        }
 
      }
      

    $_SESSION['message']='Guadado de forma exitosa';
    $_SESSION['message_type']='success';

    header("location:../principal.php");
  }


?>