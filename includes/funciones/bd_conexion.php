<?php
    //Se deben de poner los 4 parametros (localhost,user,password y nombre de la bd)
    $conexion = new mysqli('localhost:3307','root','root','gdlwebcamp');

    if($conexion->connect_error){
        echo $error -> $conexion->conect_error;
    }

?>