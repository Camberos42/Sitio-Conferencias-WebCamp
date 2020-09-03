    <?php //isset Valida si la variable exista, y si existe ejecutar bloque de codigo que este dentro
    if(isset($_POST["submit"])):
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $regalo = $_POST["regalo"];
    $total = $_POST["total_pedido"];
    $fecha = date('Y-m-d H:i:s');
    //Pedidos
    $boletos =  $_POST["boletos"];
    $camisas =  $_POST["pedido_camisas"];
    $etiquetas =  $_POST["pedido_etiquetas"];
    //Llamar al archivo de funciones para uqe se puedan ejecutar
    include_once 'includes/funciones/funciones.php';
    $pedido = productos_json($boletos, $camisas, $etiquetas);
    //eventos
    $eventos = $_POST["registro"];
    $registro = eventos_json($eventos);
    try{
        //require_once es una funcion que se encarga de incluir un archivo
        require_once('includes/funciones/bd_conexion.php');
        //Esta linea le dice a sql que se vaya preparando porque se realizara una insercion a la BD
        $stmt = $conexion->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registrado, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
        //Pasarle los datos a traves de las variables (S es cadena e I es entero)
        $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
        //ejecutar el statement
        $stmt->execute();
        //Cerrar statement
        $stmt->close();
        //cerrar conexion
        $conexion->close();
        header('Location: validar_registro.php?exitoso=1');
    }catch(\Exception $e){
        echo $e->getMessage();
    }
    ?>
    <?php endif; ?>
<?php include_once 'includes/templates/header.php';?>
<section class="seccion contenedor">
        <h2>Resumen Registro</h2>

        <?php if(isset($_GET['exitoso'])):
                    if($_GET['exitoso'] == "1"):
                        echo "Registro Exitoso";
                    endif;
        endif;
        ?>

</section>
<?php include_once 'includes/templates/footer.php';?>
