<?php
include_once"Model/DbConexion.php";

Class Grados extends Conexion{
    private $conexion;

    //Constructor para nuestra conexion.
    public function __construct(){
        $this->conexion = new conexion();
        $this->con = $this->conexion->conectar();
    }

    //Muestra todos los grados activos
    public function showActive(){
        $query = "SELECT grado_prueba.*, nivel_educativo_prueba.nombre as nivel_id from grado_prueba inner join nivel_educativo_prueba on grado_prueba.id_nivel_educativo_fk = nivel_educativo_prueba.id_nivel WHERE estadogra = 'a'";
        $result = mysqli_query($this->con, $query);
        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
            'id' => $row['idgra'],
            'codigo' => $row['codigo'],
            'nombre' => $row['nombregra'],
            'abreviatura' => $row['abreviatura'],
            'seccion' => $row['seccion'],
            'nivel' => $row['nivel_id'],
            );
        }
        $jsonstring = json_encode($json);
        return $jsonstring;
    }

    //Muestra todos los grados inactivos
    public function showInactive(){
        $query = "SELECT grado_prueba.*, nivel_educativo_prueba.nombre as nivel_id from grado_prueba inner join nivel_educativo_prueba on grado_prueba.id_nivel_educativo_fk = nivel_educativo_prueba.id_nivel WHERE estadogra = 'i'";
        $result = mysqli_query($this->con, $query);
        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
            'id' => $row['idgra'],
            'codigo' => $row['codigo'],
            'nombre' => $row['nombregra'],
            'abreviatura' => $row['abreviatura'],
            'seccion' => $row['seccion'],
            'nivel' => $row['nivel_id'],
            );
        }
        $jsonstring = json_encode($json);
        return $jsonstring;
    }

    //Muestra los grados por id
    public function showById(){
        $id = $_POST['id'];
        $query = "SELECT grado_prueba.*, nivel_educativo_prueba.nombre as nivel_id from grado_prueba inner join nivel_educativo_prueba on grado_prueba.id_nivel_educativo_fk = nivel_educativo_prueba.id_nivel WHERE idgra = '$id'";
        $result = mysqli_query($this->con, $query);
        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
            'id' => $row['idgra'],
            'codigo' => $row['codigo'],
            'nombre' => $row['nombregra'],
            'abreviatura' => $row['abreviatura'],
            'seccion' => $row['seccion'],
            'nivel' => $row['nivel_id'],
            );
        }
        $jsonstring = json_encode($json);
        return $jsonstring;
    }

    //agrega un nuevo grado a la tabla
    public function addGrado(){
        $c = $_POST['codigo'];
        $n = $_POST['nombre'];
        $a = $_POST['abreviatura'];
        $s = $_POST['seccion'];
        $ni = $_POST['nivel'];
        $e = $_POST['estado'];
        $sql = "INSERT INTO grado_prueba (codigo, nombregra, abreviatura, seccion, id_nivel_educativo_fk, estadogra) VALUES ('$c', '$n', '$a', '$s', '$ni', '$e')";
        $ejecutar = mysqli_query($this->con, $sql);
        echo "Grado guardado exitosamente";
    }

    //Modifica un grado 
    public function Update(){
        $id = $_POST['id'];
        $c = $_POST['codigo'];
        $n = $_POST['nombre'];
        $a = $_POST['abreviatura'];
        $s = $_POST['seccion'];
        $ni = $_POST['nivel'];
        $e = $_POST['estado'];
        $sql = "UPDATE grado_prueba SET codigo = '$c', nombregra = '$n', abreviatura = '$a', seccion = '$s', id_nivel_educativo_fk = '$ni', estadogra = '$e' WHERE idgra = '$id'";
        $ejecutar = mysqli_query($this->con, $sql);
        echo "Grado Editado Exitosamente";
    }

    //Elimina un grado
    public function deletebyid(){
        $id = $_POST['id'];
        $query = "DELETE FROM grado_prueba WHERE idgra = $id"; 
        $result = mysqli_query($this->con, $query);
        echo "Grado eliminado exitosamente";  
    }

    
    }

?>