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
<h3 style="text-align:center">Reportes de Ventas</h3>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <table class="table table-bordered">
                    <thead class="bg-dark">

                        <tr>
                            <th class="text-light">Producto</th>
                            <th class="text-light">Fecha</th>
                            <th class="text-light">Unidades</th>
                            <th class="text-light">Precio venta</th>
                            <th class="text-light">Total</th>
                            <th> <a href="../admin_operaciones/export_pdf.php" class="btn btn-success">
                                    <i class="fas fa-file-pdf"></i>
                                    </a></th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT * FROM public.ventas";
                        $resultado = pg_query($conn, $query);
                        while ($row = pg_fetch_array($resultado)) { ?>

                            <tr>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['fecha'] ?></td>
                                <td><?php echo $row['unidades'] ?></td>
                                <td><?php echo $row['precio_venta'] ?></td>
                                <td><?php echo "$".$row['pago_total'] ?></td>
                                <td><a href="../principal.php" class="btn btn-primary">
                                    <i class="fas fa-home"></i>
                                    </a> </td> 
                                
                            </tr>


                        <?php }  ?>

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