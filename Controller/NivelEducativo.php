<?php
include_once"Model/DbConexion.php";

Class Niveles extends Conexion{
    private $conexion;

    //Constructor para la conexion.
    public function __construct(){
        $this->conexion = new conexion();
        $this->con = $this->conexion->conectar();
    }

    //Funcion para mostrar niveles en el select.
    public function showNiveles(){
        $sql = "SELECT * FROM nivel_educativo_prueba";
        $ejecutar = mysqli_query($this->con, $sql);
        return $ejecutar;

    }

    //Funcion para mostrar los niveles en la tabla.
    public function nivelesId($id){
        $sql = "SELECT nombre FROM nivel_educativo_prueba WHERE id_nivel = $id";
        $ejecutar = mysqli_query($this->con, $sql);
        return $ejecutar;
    }
}

?>