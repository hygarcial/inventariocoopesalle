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
            <div class="card card-body">
            <h3> Registro de Ventas</h3>
                <form action="../admin_operaciones/guardar_venta.php" method="POST">
                    <?php
                    $sql = "SELECT * FROM public.productos WHERE exis_producto='s'";
                    $query = pg_query($conn, $sql);
                    if(pg_num_rows($query)==0){
                        echo 'no hay productos';
                    }else{
                    ?>
                    <div class="form-group mb-4">
                        <div class="form-group"><label class="small mb-1" for="inputTelephone"></label><select class="form-control form-control"  name="producto">
                                <option disabled="false">--Selecciona el Producto--</option>
                                <?php while ($row = pg_fetch_array($query)) { ?>
                                    <option><?php echo $row['nombre'] ?></option>
                                <?php  $id_producto = $row['id_productos'];
                                        $id_precio = $row['prec_producto'];
                                    
                            } }?>

                            </select></div>
                    </div>
                   
                    <div class="form-group mb-4">
                        <input disa type="hidden" class="form-control" name="id_producto" value="<?php echo $id_producto?>" placeholder="producto" autofocus>
                    </div>
                    <div class="form-group mb-4">
                        <input type="hidden" class="form-control" name="precio_venta"  value="<?php echo $id_precio?>" placeholder="Ingrese el precio de venta" autofocus>
                    </div>
                    <div class="form-group mb-4">
                        <input type="number" name="unidades" class="form-control" id="cantidad_unidades" placeholder="Cantidad de unidades del producto" autofocus>
                    </div>
                    <input type="submit" class="btn btn-success text-white btn-block" name="save_venta" value="Guardar">
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