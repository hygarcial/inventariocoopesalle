<?php
    require('../conexion.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservas</title>

</head>
<body>
<body class="bg-light">
       
        <div id="layoutAuthentication">
           
            <div class="row">
            <?php 
                $id= $_SESSION['id'];     
                $sql="SELECT * FROM peluqueria.cita WHERE activo=1";
                $query=pg_query($conn,$sql);
               // $row=pg_fetch_array($query);
                //$id_cita=$row['cita_id'];
               // $consulta_servicios=""
            
            ?>
            <?php while($row=pg_fetch_array($query)){?>
               
            <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <a href="../admin_operaciones/delete_cita.php?id=<?=$row['cita_id']?>" class="btn btn-success">
                 <i class="fas fa-user-check"></i></a>
                    <div class="card-header text-dark bg-light">Cita Activa              
                     </div>
                        <div class="card-body $blue-900">
                         <h5 class="card-title">Fecha: <?php echo $row['fecha']; ?></h5>
                         <p class="card-text">Hora: <?php echo $row['hora']; ?></p>
                         
                     </div>
                </div>
            </div>
            <?php }?>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
</body>
</html>