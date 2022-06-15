<?php 
  session_start();
  require('../conexion.php');
  
  if (isset($_POST['save_cita'])){

    $id=$_SESSION['id'];
    $fecha = $_POST['fecha'];
    $hora=$_POST['hora'];


    $query="INSERT INTO peluqueria.cita(fecha,hora,cliente_id,activo) VALUES ('$fecha', '$hora','$id',1)";
    $resultado=pg_query($conn,$query);

    $query2="SELECT * FROM peluqueria.cita WHERE hora='$hora' AND cliente_id='$id'";
    $resultado2=pg_query($conn,$query2);
    

    if (pg_num_rows($resultado2)==1) {
        $row=pg_fetch_array($resultado2);
        $cita_id=$row['cita_id'];
        $id_servicio= $_POST['servicio'];
        $query3="INSERT INTO peluqueria.cita_servicio(cita_id,id) VALUES ($cita_id, $id_servicio)";
        $resultado3=pg_query($conn, $query3);
    }else{
      echo("error en la insercion");
    }


    if(!$resultado || !$resultado2){
      die("Insercion fallida");
    }
    header("location:../principal.php");
  }

  

?>
