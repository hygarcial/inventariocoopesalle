<?php 
include('../conexion.php');
     session_start();
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $query ="DELETE FROM peluqueria.servicio WHERE id=$id"; //aca hacemos referencia a la tabla 
        $resultado = pg_query($conn, $query);

        if(!$resultado){
           die("consulta fallida");
        }

        $_SESSION['message']='Eliminado de forma exitosa';
        $_SESSION['message_type']='danger';

        header("location:../principal.php");
    }




?>