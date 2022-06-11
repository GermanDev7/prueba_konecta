<?php include("template/header.php"); ?> 
<?php include("config/bd.php"); ?> 
<?php
$nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
$referencia=(isset($_POST['referencia'])?$_POST['referencia']:"");
$precio=(isset($_POST['precio'])?$_POST['precio']:"");
$peso=(isset($_POST['peso'])?$_POST['peso']:"");
$categoria_id=(isset($_POST['categoria_id'])?$_POST['categoria_id']:"");
$cantidad=(isset($_POST['cantidad'])?$_POST['cantidad']:"");
$accion=(isset($_POST['accion'])?$_POST['accion']:"");
$id=(isset($_POST['id'])?$_POST['id']:"");

$sentenciaSQLSelect = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQLSelect->execute();
$productos = $sentenciaSQLSelect->fetchALL(PDO::FETCH_ASSOC);

switch($accion)
{
    case "agregar":
        try {
            echo "presiono boton agregar";
            $fecha_creacion=date("Y-m-d");
            $sentenciaSQL=$conexion->prepare("INSERT INTO productos (nombre,referencia,precio, peso, categoria_id,fecha_creacion,cantidad) 
            VALUES (:nombre,:referencia,:precio,:peso,:categoria_id,:fecha_creacion,:cantidad)");
            //parametros
            $sentenciaSQL->bindParam(':nombre',$nombre);
            $sentenciaSQL->bindParam(':referencia',$referencia);
            $sentenciaSQL->bindParam(':precio',$precio);
            $sentenciaSQL->bindParam(':peso',$peso);
            $sentenciaSQL->bindParam(':categoria_id',$categoria_id);
            $sentenciaSQL->bindParam(':fecha_creacion',$fecha_creacion);
            $sentenciaSQL->bindParam(':cantidad',$cantidad);
            $sentenciaSQL->execute();
            header('Location:productos.php');
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
    break;
    case "modificar":
        try{
        $sentenciaSQL=$conexion->prepare("UPDATE productos SET nombre=:nombre, referencia=:referencia, precio=:precio, peso=:peso,
        categoria_id=:categoria_id, cantidad=:cantidad WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$id);
        $sentenciaSQL->bindParam(':nombre',$nombre);
        $sentenciaSQL->bindParam(':referencia',$referencia);
        $sentenciaSQL->bindParam(':precio',$precio);
        $sentenciaSQL->bindParam(':peso',$peso);
        $sentenciaSQL->bindParam(':categoria_id',$categoria_id);
        $sentenciaSQL->bindParam(':cantidad',$cantidad);
        $sentenciaSQL->execute();
        header('Location:productos.php');
        }  catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
    break;
    case "cancelar":

        header('Location:productos.php');
    break;

    case "seleccionar":
    try{ 
        $sentenciaSQL=$conexion->prepare("SELECT * FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$id);
        $sentenciaSQL->execute();
        $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $id= $producto['id'];
        $nombre= $producto['nombre'];
        $referencia= $producto['referencia'];
        $fecha_creacion= $producto['fecha_creacion'];
        $precio= $producto['precio'];
        $peso= $producto['peso'];
        $categoria_id= $producto['categoria_id'];
        $cantidad= $producto['cantidad'];
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
       
    break;

    case "borrar":
       try{
        $sentenciaSQL=$conexion->prepare("DELETE FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$id);
        $sentenciaSQL->execute();
        header('Location:productos.php');
       } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    break;

}

?>
<div class="card-body p-4">
    <div class="row p-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Datos del producto
                </div>
                <div class="card-body">
                <form method="POST" >
                    <div class = "form-group p-1">
                        <input type="hidden" class="form-control"  value="<?php echo $id; ?>" name="id" id="txtId">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" class="form-control"  value="<?php echo $nombre; ?>" name="nombre" id="txtNombre" placeholder="Nombre" required>
                    </div>
                    <div class = "form-group p-1">
                        <label for="txtReferencia">Referencia</label>
                        <input type="text" class="form-control" value="<?php echo $referencia; ?>" name="referencia" id="txtReferencia" placeholder="Referencia" required>
                    </div>
                    <div class = "form-group p-1">
                        <label for="txtPrecio">Precio</label>
                        <input type="number" class="form-control" value="<?php echo $precio; ?>" name="precio" id="txtPrecio" placeholder="Precio" required>
                    </div>
                    <div class = "form-group p-1">
                        <label for="txtPeso">Peso</label>
                        <input type="number" class="form-control" value="<?php echo $peso; ?>" name="peso" id="txtPeso" placeholder="Peso" required>
                    </div>
                    <div class = "form-group p-1">
                        <label for="txtPeso">Categoria</label>
                        <input type="number" class="form-control" value="<?php echo $categoria_id; ?>" name="categoria_id" id="txtCategoria" placeholder="Categoria" required>
                    </div>
                    <div class = "form-group p-1">
                        <label for="txtCantidad">Cantidad</label>
                        <input type="number" class="form-control" value="<?php echo $cantidad; ?>" name="cantidad" id="txtCantidad" placeholder="Cantidad" required>
                    </div>
                    <div class="btn-group p-1"  role="group" aria-label="">
                        <button type="submit" name="accion" value="agregar" <?php echo ($accion=="seleccionar")?"disabled":"" ?> class="btn btn-success">Crear</button>
                        <button type="submit" name="accion" value="modificar" <?php echo ($accion!="seleccionar")?"disabled":"" ?> class="btn btn-warning">Modificar</button>
                        <button type="submit" name="accion" value="cancelar"  <?php echo ($accion!="seleccionar")?"disabled":"" ?> class="btn btn-danger">Cancelar</button>
                    </div>
                
                </form>
                    
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <table  class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Referencia</th>
                        <th>Precio</th>
                        <th>Peso</th>
                        <th>Categoria</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productos as $key=> $producto){ ?>
                    <tr>
                        <td><?php  echo $key+1?></td>
                        <td><?php  echo $producto['nombre']?></td>
                        <td><?php  echo $producto['referencia']?></td>
                        <td><?php  echo $producto['precio']?></td>
                        <td><?php  echo $producto['peso']?></td>
                        <td><?php  echo $producto['categoria_id']?></td>
                        <td><?php  echo $producto['cantidad']?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>"/>
                                <button type="submit" name="accion" value="seleccionar" class="btn btn-success">Seleccionar</button>
                                <button type="submit" name="accion" value="borrar" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
        
    </div>
    
</div>

 

<?php include("template/footer.php"); ?> 