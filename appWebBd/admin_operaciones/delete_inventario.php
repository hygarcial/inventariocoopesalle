<?php 
include('../conexion.php');
session_start();
    if(isset($_GET['id'])){
//update peluqueria.cita set activo=1 where activo is null;
        $id = $_GET['id'];
        $query ="UPDATE public.productos set exis_producto ='n' WHERE id_productos='$id'"; //aca hacemos referencia a la tabla 
        $resultado = pg_query($conn, $query);

        if(!$resultado){
           die("consulta fallida");
        }


        header("location:../admin_vistas/inventario.php");
    }

?>