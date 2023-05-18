<?php
        
class handle_DB {

    private $host = "127.0.0.1";
    private $dbname = "ejercicio";
    private $password = "campus2023";
    private $user = "campus";
    public $conexion;
    public function query_handle($sql){

        $this -> connection_db();
        $this -> conexion -> query($sql);
        $this -> conexion -> close();
    }
    public function get_data_all(){

        $this -> connection_db();
        $data = $this -> conexion -> query("SELECT * FROM `libros`");
        $this -> conexion -> close();
        return $data -> fetch_all();
    }
    private function connection_db(){

        try{
            $this -> conexion = new mysqli($this -> host, $this -> user, $this -> password, $this -> dbname);
        }
        catch(mysqli_sql_exception $error){
        
            echo "DB error... ";
            print_r($error);
        }
    }

    public function get_data_one($id){

        $this -> connection_db();
        $data = $this -> conexion -> query("SELECT * FROM `libros` WHERE id = $id");
        $this -> conexion -> close();
        return $data -> fetch_all();
    }

}


?>