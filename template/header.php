<?php 
session_start();
if(!isset($_SESSION['usuario']))
{
    header('Location:index.php');
}
else{
    if($_SESSION['usuario']=='ok')
    {
        $nombreUsuario=$_SESSION['nombreUsuario'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba PHP</title>


    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
</head>
<body>
<?php $url="http://".$_SERVER['HTTP_HOST']."/prueba" ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <ul class="nav navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo $url ?>/productos.php">Prueba</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url ?>/productos.php">Producto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url ?>/ventas.php">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url ?>/cerrar.php">Cerrar</a>
            </li>
            
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            