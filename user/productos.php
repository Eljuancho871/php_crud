<?php include "./template/cabecera.php";  ?>

<?php 

    $txtID = (isset($_POST["txtID"])) ? $_POST["txtID"] : "none";
    $txtNombre = (isset($_POST["txtNombre"])) ? $_POST["txtNombre"] : "none";
    $txtImagen = (isset($_FILES["file"]["name"])) ? $_FILES["file"]["name"] : "none";

    $accion = (isset($_POST["accion"])) ? $_POST["accion"] : "none";

?>

<div style="display: flex; justify-content: center;margin-top: 100px;">
<div class="col-md-5">
    <h2>Formulario agregar libros:</h2>

    <center>
    <form method="POST" enctype="multipart/form-data" style="margin-right: 50px;">
        
        <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input type="email" class="form-control" name="txtID" id="exampleInputEmail1" placeholder="ID">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="email" class="form-control" name="txtNombre" id="exampleInputEmail1" placeholder="nombre">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Archivo</label>
            <input type="file" class="form-control" name="file" id="exampleInputPassword1">
        </div>
        <br/>
        <div class="btn-group" role="group">
            <button name="accion" value="agregar" class="btn btn-success" type="submit">Agregar</button>
            <button name="accion" value="modificar" class="btn btn-warning" type="submit">Modificar</button>
            <button name="accion" value="cancelar" class="btn btn-info" type="submit">Cancelar</button>
        </div>
    </form>
    </center>
</div>

<div class="col-md-3">

    <h2>Tabla de libros:</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Nombre</td>
                <td>Imagen</td>
                <td>Seleccionar | Borrar</td>
            </tr>
        </tbody>
    </table>

</div>
</div>



<?php include "./template/pie.php"; ?>