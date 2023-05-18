<?php include "./template/cabecera.php";  ?>

<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "./db/db_connect.php";

    $conexion_instancia = new handle_DB();
    $txtId = (isset($_POST["txtId"]) ? $_POST["txtId"] : false);
    $txtNombre = (isset($_POST["txtNombre"])) ? $_POST["txtNombre"] : false;
    $txtImagen = (isset($_FILES["file"]["name"])) ? $_FILES["file"]["name"] : false;
    $accion = (isset($_POST["accion"])) ? $_POST["accion"] : false;
    $edit = false;
    $dir_images = "../user/images/";

    
    switch ($accion) {
        case 'agregar':
            $dateUniq = new DateTime();
            $dataArray = (array) $dateUniq;
            $define_image = $dataArray["date"].$txtImagen;
            move_uploaded_file($_FILES["file"]["tmp_name"], $dir_images.$define_image);
            $conexion_instancia -> query_handle("INSERT INTO `libros` (`id`, `nombre`, `imagen`) VALUES (NULL, '$txtNombre', '$define_image')");
            break;
            
            case "modificar":
                $txtImagenTmp = ($txtImagen) ? $txtImagen : $_POST["old_image"];
                $conexion_instancia -> query_handle("UPDATE `libros` SET `nombre` = '$txtNombre', `imagen` = '$txtImagenTmp' WHERE id = '$txtId' ");
                break;

            case "cancelar":
                $edit = false;
                break;

            case "eliminar":
                $id = $_POST["id_accion"];
                $conexion_instancia -> query_handle("DELETE FROM `libros` WHERE id = $id ");
                break;

            case "editar":
                $id = $_POST["id_accion"];
                $edit = $conexion_instancia -> get_data_one($id);
                break;
    }

?>

<div style="display: flex; justify-content: center;margin-top: 100px;">
<div class="col-md-5">
    <h2>Formulario agregar libros:</h2>

    <center>
    <form method="POST" enctype="multipart/form-data" style="margin-right: 50px;">

        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" value="<?php echo ($edit == false) ? "" : $edit[0][0]; ?>" disabled class="form-control" id="id" >
            <input type="hidden" value="<?php echo ($edit == false) ? "" : $edit[0][0]; ?>" name="txtId" />
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input value="<?php echo ($edit == false) ? "" : $edit[0][1]; ?>" type="text" class="form-control" name="txtNombre" id="exampleInputEmail1" placeholder="nombre">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Archivo</label>
            <br/>
            <?php echo ($edit == false) ? "" : "Nombre Archivo: ".$edit[0][2]; ?>
            <input type="hidden" value="<?php echo ($edit == false) ? "" : $edit[0][2]; ?>" name="old_image" />
            <input type="file" class="form-control" name="file" id="exampleInputPassword1">
        </div>
        <br/>
        <div class="btn-group">
            <button name="accion" <?php echo ($edit == false) ? '' : 'disabled'; ?> value="agregar" class="btn btn-success" type="submit" >Agregar</button>
            <button name="accion" <?php echo ($edit == false) ? 'disabled' : ''; ?> value="modificar" class="btn btn-warning" type="submit">Modificar</button>
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
    <?php foreach($conexion_instancia -> get_data_all() as $el){ ?>

            <tr>
                <td><?php echo $el[0]; ?></td>
                <td><?php echo $el[1]; ?></td>
                <td><img style="width: 150px" src="<?php "http://".$_SERVER["HTTP_HOST"] ?>/user/images/<?php echo $el[2]; ?>" /></td>
                <td>
                    <form method="POST" style="display: flex;">
                        <input type="hidden" name="id_accion" value="<?php echo $el[0] ?>" />
                        <input style="margin-right: 10px;" type="submit" class="btn btn-warning" name="accion" value="editar" />
                        <input type="submit" class="btn btn-danger" name="accion" value="eliminar" />
                    </form>
                </td>
            </tr>

    <?php } ?>

        </tbody>
    </table>


</div>
</div>



<?php include "./template/pie.php"; ?>