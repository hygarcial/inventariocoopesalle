<?php 
include('../conexion.php');
     
    if(isset($_GET['id'])){
//update peluqueria.cita set activo=1 where activo is null;
        $id = $_GET['id'];
        $query ="UPDATE peluqueria.cita set activo=0 WHERE cita_id='$id'"; //aca hacemos referencia a la tabla 
        $resultado = pg_query($conn, $query);

        if(!$resultado){
           die("consulta fallida");
        }


        header("location:../admin_vistas/citas_clientes.php");
    }

?>