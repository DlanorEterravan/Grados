<?php
class Conexion{
    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect('localhost', 'root', '', 'prueba');
    }
    
    public function conectar(){
        return $this->con;
    }

}

?>