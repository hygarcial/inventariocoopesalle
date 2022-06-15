<?php
    require('../conexion.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>

</head>
<body>

<div class="container p-4">
    <div class="row">
        
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Sexo</th>
                    
                    </tr>
                
                </thead>
                <tbody>
                    <?php 
                        $query="SELECT * FROM peluqueria.cliente";
                        $resultado = pg_query($conn, $query);
                        while($row = pg_fetch_array($resultado)){ ?>

                            <tr>
                                <td><?php echo $row['nombre_cliente']?></td>
                                <td><?php echo $row['apellido_cliente']?></td>
                                <td><?php echo $row['telefono']?></td>
                                <td><?php echo $row['sexo']?></td>
                            </tr>


                        <?php } ?>
                
                </tbody>
             
            </table>

        </div>
        <?php  $query="SELECT count(*) FROM  peluqueria.cliente"; 
                $resul=pg_query($conn,$query);
                $row= pg_fetch_array($resul);

                $query1="SELECT  count(c.sexo)
                FROM peluqueria.cliente c
                where c.sexo='M';"; 
                $resul1=pg_query($conn,$query1);
                $row1= pg_fetch_array($resul1);

                $query2="SELECT  count(c.sexo)
                FROM peluqueria.cliente c
                where c.sexo='F';"; 
                $resul2=pg_query($conn,$query2);
                $row2= pg_fetch_array($resul2);

                $query3="SELECT  sum(s.precio)
                FROM peluqueria.cita_servicio cs,peluqueria.servicio s
                where cs.id=s.id;"; 
                $resul3=pg_query($conn,$query3);
                $row3= pg_fetch_array($resul3);
       
        ?>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body"><p class="lead">Numero de Personas</p></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <p class="lead font-weight-bold"><?php echo $row[0];?></p>  
                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
            <div class="card bg-warning text-white mb-4">
                <div class="card-body"><p class="lead">Numero por Sexo</p></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <p class="lead font-weight-bold">Hombres: <?php echo $row1[0];?></p>
                    <p class="lead font-weight-bold">Mujeres: <?php echo $row2[0];?></p>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
			    </div>
			</div>
            <div class="card bg-danger text-white mb-4">
                <div class="card-body"><p class="lead">Ingresos Generados</p></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="lead font-weight-bold">Total: <?php echo $row3[0];?></p>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>

       

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
</body>
</html>


