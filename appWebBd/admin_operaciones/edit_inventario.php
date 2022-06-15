<?php
require('../conexion.php');
session_start();
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $query="SELECT * FROM public.productos where id_productos='$id'";
    $resul=pg_query($conn,$query);

    $query2="SELECT * FROM public.categorias where id_categoria='$id'";
    $resul2=pg_query($conn,$query2);
    $row2=pg_fetch_array($resul2);


    if(pg_num_rows($resul)==1){
        $row=pg_fetch_array($resul);
        $nombre=$row['nombre'];
        $descripcion_pro=$row['descripcion'];
        $precio=$row['prec_producto'];
        $categoria=$row2['nombre_categoria']; 
        $cantidad=$row['cantidad_unid'];
    }else{
        echo 'ups!, tenemos problemas';
    }
   

}
if(isset($_POST['actualizar'])){
    $id=$_GET['id'];
    $nombre_up=$_POST['producto'];
    $descripcion_pro_up=$_POST['descripcion'];
    $precio_up=$_POST['precio'];
    $categoria_up=$_POST['nombre_categoria']; 
    $cantidad_up=$_POST['cantidad_unidades'];


    $query_update2="UPDATE public.categorias set nombre_categoria='$categoria_up' WHERE id_categoria='$id'";
    pg_query($conn,$query_update2);


    $query_update="UPDATE public.productos set nombre='$nombre_up', descripcion='$descripcion_pro_up', prec_producto='$precio_up', cantidad_unid='$cantidad_up' WHERE id_productos='$id'";
    pg_query($conn,$query_update);


    
    $_SESSION['message']='Servicio actualizado exitosamente!';
    $_SESSION['message_type']='warning';
    header("location:../admin_vistas/inventario.php");
}
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
                    <form action="edit_inventario.php?id=<?php echo $_GET['id']?>" method="POST">
                        <div class="form-group mb-4">
                            <input type="text" name="producto" class="form-control" id="nombre" value="<?php echo $nombre ?>" placeholder="Nombre del producto" autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" name="descripcion" class="form-control" id="nombre" value="<?php echo $descripcion_pro ?>" placeholder="Descripcion del producto" autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <input type="number" class="form-control" name="precio" value="<?php echo $precio ?>"placeholder="Ingrese el precio" autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" name="nombre_categoria" class="form-control" value="<?php echo $categoria ?>" id="nombre_categoria" placeholder="Nombre de la categoria" autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <input type="number" name="cantidad_unidades" class="form-control" value="<?php echo $cantidad ?>" id="cantidad_unidades" placeholder="Cantidad del producto (unidades)" autofocus>
                        </div>
                        <button class=" btn btn-success btn-block" name="actualizar">Actualizar</button>
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