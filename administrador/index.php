<?php
if($_POST)
{
    header('Location:inicio.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador del sitio web</title>


    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class = "form-group p-2">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Ingresa un email" name="email">
                            <small id="emailHelp" class="form-text text-muted">No comparta esta contraseña con nadie más.</small>
                        </div>
                        <div class = "form-group p-2">
                            <label for="inputPassword">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Ingrease la contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                    </form>
                    
                    
                </div>
                <div class="card-footer text-muted">
                       
                </div>
            </div>  
        </div>
        
    </div>
</div>
    
</body>
</html>