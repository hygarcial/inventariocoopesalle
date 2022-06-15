<?php
    require('conexion.php');
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
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION['message']);}?>
            <div class="card card-body">
                <form action="../sistemaV1/admin_operaciones/save.php" method="POST">
                    <div class="form-group mb-4">
                        <input type="text" name="servicio" class="form-control" id="nombre" placeholder="Ingrese el servicio" autofocus>
                    </div>
                    <div class="form-group mb-4">
                         <input type="number" class="form-control"  name="precio" placeholder="Ingrese el precio" autofocus>
                    </div>
                    <input type="submit" class="btn btn-success text-white btn-block" name="save_task" value="Guardar">
                </form>
            </div>


        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead class="thead-dark">
    
                    <tr>
                        <th>Servicio</th>
                        <th>Precio</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    
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
                                <td><?php echo $row['fecha_creacion']?></td>
                                <td>
                                    <a href="../sistemaV1/admin_operaciones/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">
                                        <i class="fas fa-marker"></i>
                                     </a>

                                     <a href="../sistemaV1/admin_operaciones/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt "></i>      
                                     </a>
                                </td>
                            </tr>


                        <?php } ?>
                
                </tbody>
             
            </table>

        </div>


    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
</body>
</html>


