<?php
session_start();

if(count($_SESSION)>0)
{
    if($_SESSION['usuario']=='ok')
    {
        header('Location:productos.php');
    }
}
else
{
    if($_POST)
    {
        if(($_POST['email']=="german@german.com")&&($_POST['password']=="german"))
        {
            $_SESSION['usuario']="ok";
            $_SESSION['nombreUsuario']="German";
            header('Location:productos.php');
        }
        else
        {
            $mensaje="El usuario o contraseña son incorrectos";    
            
        }
    }
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
</head>
<body>
<div class="container p-5">
    <div class="row">
    <div class="col-md-4"></div>    
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <?php if(isset($mensaje)){?>
                    <div class="alert alert-danger" role="alert">
                       <?php echo $mensaje ?>
                    </div>
                    <?php }?>
                    <form method="POST">
                        <div class = "form-group p-2">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Ingresa un email" name="email" required>
                            <small id="emailHelp" class="form-text text-muted">No comparta esta contraseña con nadie más.</small>
                        </div>
                        <div class = "form-group p-2">
                            <label for="inputPassword">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Ingrease la contraseña" required>
                        </div>
                        <div class="p-2"style="text-align:center">
                            <button type="submit" class="btn btn-success">Iniciar sesion</button>
                        </div>
                        
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
