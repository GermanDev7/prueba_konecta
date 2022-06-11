<?php include("template/header.php"); ?> 
<?php
print_r($_POST); 

$host="localhost";
$bd="cafeteria";
$usuario="root";
$pass="";

try {
    $conexion= new PDO("mysl:host=$host;dbname=$bd,$usuario,$pass");
    if($conexion)
    {
        echo "Conectadoa  ala bd cafeteria";
    }
    
} catch (Exception $ex) {

    echo $ex->getMessage();
    
}

?>
<div class="row">
<div class="col-md-5">
     <div class="card">
         <div class="card-header">
             Datos del producto
         </div>
         <div class="card-body">
         <form method="POST" >
            <div class = "form-group">
                <label for="txtNombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="txtNombre" placeholder="Nombre">
            </div>
            <div class = "form-group">
                <label for="txtReferencia">Referencia</label>
                <input type="text" class="form-control" name="referencia" id="txtReferencia" placeholder="Referencia">
            </div>
            <div class = "form-group">
                <label for="txtPrecio">Precio</label>
                <input type="number" class="form-control" name="precio" id="txtPrecio" placeholder="Precio">
            </div>
            <div class = "form-group">
                <label for="txtPeso">Peso</label>
                <input type="number" class="form-control" name="peso" id="txtPeso" placeholder="Peso">
            </div>
            <div class = "form-group">
                <label for="txtPeso">Categoria</label>
                <input type="number" class="form-control" name="categoria" id="txtCategoria" placeholder="Categoria">
            </div>
            <div class = "form-group">
                <label for="txtCantidad">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" id="txtCantidad" placeholder="Cantidad">
            </div>
            
            <button type="submit" name="accion" value="agregar" class="btn btn-primary">Crear</button>
            <button type="submit" name="accion" value="modificar" class="btn btn-primary">Crear</button>
            <button type="submit" name="accion" value="eliminar" class="btn btn-primary">Crear</button>
        </form>
             
         </div>
     </div>
 </div>
 <div class="col-md-7">
     <table class="table">
         <thead>
             <tr>
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
             <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
             </tr>
             
         </tbody>
     </table>
 </div>
    
</div>
 

<?php include("template/footer.php"); ?> 