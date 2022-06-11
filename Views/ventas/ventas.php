<?php include("../../template/header.php"); ?> 
<?php include("../../config/bd.php");  

$producto_id=(isset($_POST['producto_id'])?$_POST['producto_id']:"");
$cantidad=(isset($_POST['cantidad'])?$_POST['cantidad']:"");
$accion=(isset($_POST['accion'])?$_POST['accion']:"");

//cargar lista productos
$sentenciaSQLSelect = $conexion->prepare("SELECT id,nombre FROM productos");
$sentenciaSQLSelect->execute();
$productos = $sentenciaSQLSelect->fetchALL(PDO::FETCH_ASSOC);
if($accion=="vender")
{
    $sentenciaSQL=$conexion->prepare("SELECT * FROM productos WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$producto_id);
    $sentenciaSQL->execute();
    $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
    $id= $producto['id'];
    $nombre= $producto['nombre'];
    $referencia= $producto['referencia'];
    $fecha_creacion= $producto['fecha_creacion'];
    $precio= $producto['precio'];
    $peso= $producto['peso'];
    $categoria_id= $producto['categoria_id'];
    $cantidadProducto= $producto['cantidad']; 
    if(isset($producto))
    {
        if($cantidadProducto>0)
    {
        if($cantidadProducto-$cantidad>=0)
        {
            try {
                $total=$cantidadProducto-$cantidad;
                $sentenciaSQL=$conexion->prepare("UPDATE productos SET nombre=:nombre, referencia=:referencia, precio=:precio, peso=:peso,
                categoria_id=:categoria_id, cantidad=:cantidad WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$id);
                $sentenciaSQL->bindParam(':nombre',$nombre);
                $sentenciaSQL->bindParam(':referencia',$referencia);
                $sentenciaSQL->bindParam(':precio',$precio);
                $sentenciaSQL->bindParam(':peso',$peso);
                $sentenciaSQL->bindParam(':categoria_id',$categoria_id);
                $sentenciaSQL->bindParam(':cantidad',$total);
                $sentenciaSQL->execute();
                header('Location:ventas.php');
                
            } catch (PDOException $ex) {
                
            }
        
        }
        else
        {
            $mensajeError="No se puedo realizar la venta, no alcanza el stock de este producto";
        }

    }
    else
    {
        $mensajeError="No se puedo realizar la venta, no hay stock de este producto";
    }
    }
    
}

?> 

<div class="container p-5">
    <div class="row">
    <div class="col-md-4"></div>    
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ventas
                </div>
                <div class="card-body">
                    <?php if(isset($mensajeError)){?>
                    <div class="alert alert-danger" role="alert">
                       <?php echo $mensajeError ?>
                    </div>
                    <?php }?>
                    <?php if(isset($mensajeOk)){?>
                    <div class="alert alert-danger" role="alert">
                       <?php echo $mensajeOk ?>
                    </div>
                    <?php }?>
                    <form method="POST">
                        <div class = "form-group p-2">
                            <label for="inputProducto">Producto</label>
                            <select class="form-control col-md-12 " name="producto_id" required>
                                <option value="0">Seleccion un producto</option>

                                <?php
                                    foreach($productos as $producto) {
                                    echo '<option value="'.$producto['id'].'">'.$producto['nombre'].'</option>';
                                    }
                                ?>

                            </select>
                           
                        </div>
                        <div class = "form-group p-2">
                            <label for="inputCantidad">Cantidad</label>
                            <input type="number" class="form-control" id="inputCantidad" name="cantidad"  required>
                        </div>
                        <div class="p-2"style="text-align:center">
                            <button type="submit"  name="accion" value="vender" class="btn btn-success">Vender</button>
                        </div>
                        
                    </form>                  
                </div>
                <div class="card-footer text-muted">
                       
                </div>
            </div>  
        </div>
        
    </div>
</div>

<?php include("../../template/footer.php"); ?> 