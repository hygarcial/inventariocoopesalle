<?php
    require('./conexion.php');
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
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                        <div class="col-md-4 mt-5">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                 <tr>
                                    <th>Servicio</th>
                                     <th>Precio</th>
                                </tr>
                             </thead>
                                <tbody>
                                <?php 
                                $query="SELECT * FROM peluqueria.servicio";
                                $resultado = pg_query($conn, $query);
                                while($row = pg_fetch_array($resultado)){ ?>

                                    <tr>
                                     <td><?php echo $row['nombre']?></td>
                                      <td><?php echo $row['precio']?></td>
                                    </tr>
                                <?php } ?>
                
                                    </tbody>
                            </table>
                        </div>
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><i class="fas fa-calendar-alt mr-2"></i>Solicitar cita</h3></div>
                                    <div class="card-body">
                                        <form action="./usuario_operaciones/save_cita.php" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-4 pt-1">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName"></label>Fecha<input class="form-control py-4" id="inputFirstName" name="fecha" type="date" placeholder="Ingrese la fecha" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Hora</label><input class="form-control py-4" id="inputLastName" name="hora" type="time" placeholder="Ingrese la hora" /></div>
                                                </div>
                                            </div>
                                            <label class="small mb-1" for="inputService">Tipo de servicio</label>
                                                <select class="form-control form-control-lg" id="inputService" name="servicio" readonly>
                                                    <?php
                                                        $sql="SELECT * FROM peluqueria.servicio";
                                                        $query=pg_query($conn,$sql);
                                                    ?>
                                                    <option>--Seleccione el servicio--</option>
                                                        <?php while ($row=pg_fetch_array($query)){?>
                                                        <option value=<?php echo $row['id'];?>> <?php echo $row['nombre']; ?></option> 
                                                        <?php } ?>
                                                </select>
                                               
                                            <div class="form-group mt-4 mb-0"><input class="btn btn-success text-white btn-block" name="save_cita" type="submit" value="Enviar"></div>
                                        </form>

                                    </div>
                                    
                                </div>
                                
                            </div>
                           
                        </div>
                    </div>
                </main>
            </div>
            <hr>
            <div class="row">
            <?php 
                $id= $_SESSION['id'];     
                $sql="SELECT * FROM peluqueria.cita WHERE cliente_id='$id' AND activo=1";
                $query=pg_query($conn,$sql);
               // $row=pg_fetch_array($query);
                //$id_cita=$row['cita_id'];
               // $consulta_servicios=""
            
            ?>
            <?php while($row=pg_fetch_array($query)){?>
               
            <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    
                <div class="card text-white bg-dark text-white mb-3" style="max-width: 18rem;">
                <a href="usuario_operaciones/delete_cita.php?id=<?=$row['cita_id'] ?>" class="btn btn-danger">
                 <i class="fas fa-window-close"></i></a>
                    <div class="card-header text-dark bg-light">Usuario: <?php echo $nombre;?> <i class="fas fa-user ml-2"></i>              
                     </div>
                        <div class="card-body text-dark bg-light">
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