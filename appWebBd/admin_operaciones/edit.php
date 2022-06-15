<?php 

include("../conexion.php");
session_start();
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $query="SELECT * FROM peluqueria.servicio where id=$id";
    $resul=pg_query($conn,$query);

    if(pg_num_rows($resul)==1){
        $row=pg_fetch_array($resul);
        $servicio=$row['nombre'];
        $precio=$row['precio'];
    }else{
        echo 'ups!, tenemos problemas';
    }

}
if(isset($_POST['actualizar'])){
    $id=$_GET['id'];
    $servicio= $_POST['servicios'];
    $precio=$_POST['precio'];
   
    $query="UPDATE peluqueria.servicio set nombre='$servicio', precio='$precio' where id=$id";
    pg_query($conn,$query);
    $_SESSION['message']='Servicio actualizado exitosamente!';
    $_SESSION['message_type']='warning';
    header("Location:../principal.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <!--cdn para usar bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!--para usar iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
<body>
    
   <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
               
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                        <div class="form-group  mb-4">
                            <input type="text" name="servicios" value="<?php echo $servicio; ?>" class="form-control" placeholder="Actualiza el servicio">
                        </div>
                        <div class="form-group  mb-4">
                            <input type="number" name="precio" value="<?php echo $precio ?>" class="form-control" placeholder="Actualiza el precio" autofocus>
                        </div>
                        <button class=" btn btn-success btn-block" name="actualizar">Actualizar</button>
                    </form>
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


