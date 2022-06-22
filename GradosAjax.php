<?php
include_once'Controller/Grados.php';
include_once'Model/DbConexion.php';
$a = new Conexion();
$con = $a->conectar();
$grado = new Grados();

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'fetchtableActive' :  //Mostrar Tablas activas
            $activo = $grado->showActive();
            echo $activo;
            break;

        case 'fetchtableInactive' :  //Mostrar Tablas activas
            $activo = $grado->showInactive();
            echo $activo;
            break;

        case 'addgrado'; //añadir grado
            $activo = $grado->addGrado();
            echo $activo;
            break;

        case 'showbyid'; //mostrar grado por id
            $activo = $grado->showById();
            echo $activo;
            break;

        case 'guardarE' : //Guardar Edit
            $activo = $grado->Update();
            echo $activo;
            break;
        
        case 'showDeletebyid' : //Guardar Edit
            $activo = $grado->showById();
            echo $activo;
            break;

        case 'deletebyid' : //Guardar Edit
            $activo = $grado->deletebyid();
            echo $activo;
            break;
        
    }

}


/* if($grado->verificadorCod() == 0){
    $activo = $grado->addGrado();
    echo $activo;
}else{
    echo 0;
} */
?>