<?php
class Connection{

    private $user = "campus";
    private $hostname = "127.0.0.1";
    private $password = "campus2023";
    private $database = "ejercicio";
    private $connection;

    public  function __construct(){

        try{

            $this -> connection = new mysqli($this -> hostname, $this -> user, $this -> password, $this -> database);
            echo "Conexion exitosa...";
        }
        catch(mysqli_sql_exception $error){

            echo "conexion fallida DB: ".$error;
        }
    }

    public function insert_data($sql){

        $result = $this -> connection -> query($sql);

        $msg = ($result === TRUE)
            ? "Datos insertados correctamente"
            : "Error al ingresar datos";

        echo "<br/>".$msg;
    }

    public function get_data(){

        $result = $this -> connection -> query("SELECT * FROM usuarios");
        echo "<br/>";
        return $result -> fetch_all();
    }
}

$connecion = new Connection();
$sql = "INSERT INTO usuarios (id, name, age) VALUES (NULL, 'juan', '17')";
$data = $connecion -> get_data();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach($data as $el){ 
            
            echo "<li>"."Id: ".$el[0]." edad: ".$el[2]."</li>";
        ?>


        <?php } ?>
    </ul>
</body>
</html>