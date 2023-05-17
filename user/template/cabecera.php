<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>index</title>
</head>
<body>
    
<?php $url = "http://".$_SERVER["HTTP_HOST"]; ?>

<nav class="navbar navbar-expand navbar-dark bg-primary">
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo $url; ?>/user/index.php"">CRUD</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $url; ?>/user/index.php"">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $url; ?>/user/productos.php">libros</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $url; ?>/user/nosotros.php"">Nosotros</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $url; ?>/admin/index.php"">Admin</a>
        </li>
    </ul>
</nav>