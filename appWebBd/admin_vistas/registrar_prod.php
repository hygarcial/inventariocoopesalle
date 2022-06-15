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
    <link href="css/styles.css" rel="stylesheet" />

    <!--cdn para usar bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!--para usar iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />


</head>

<body>

    <div class="container p-4">
            <div class="col-md-4 mx-auto">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['message']);
                } ?>
                <div class="card card-body">
                <h3> Registro de Productos</h3>
                    <form action="../admin_operaciones/guardar_prod.php" method="POST">
                        <div class="form-group mb-4">
                            <input type="text" name="producto" class="form-control" id="nombre" placeholder="Nombre del producto" autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <textarea type="text" name="descripcion" class="form-control" id="nombre" placeholder="Descripcion del producto" autofocus></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <input type="number" class="form-control" name="precio" placeholder="Ingrese el precio" autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" name="nombre_categoria" class="form-control" id="nombre_categoria" placeholder="Nombre de la categoria" autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <input type="number" name="cantidad_unidades" class="form-control" id="cantidad_unidades" placeholder="Cantidad del producto (unidades)" autofocus>
                        </div>
                        <input type="submit" class="btn btn-success text-white btn-block" name="save_task" value="Guardar">
                    </form>
                </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
</body>

</html>