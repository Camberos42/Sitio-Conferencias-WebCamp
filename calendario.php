<?php include_once 'includes/templates/header.php';?>
    
    <section class="seccion contenedor">
        <h2>Calendario de Eventos</h2>

        <?php
            try{
                //require_once es una funcion que se encarga de incluir un archivo
                require_once('includes/funciones/bd_conexion.php');
                //Para hacer una consulta despues de crear la concexion a la bd en la linea anterior
                $sql = " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono` , `nombre_invitado`, `apellido_invitado`  ";
                $sql .= " FROM `eventos`  ";   
                $sql .= " INNER JOIN `categoria_evento`  ";
                $sql .= " ON `eventos`.`id_cat_evento` = `categoria_evento`.`id_categoria`  ";
                $sql .= " INNER JOIN `invitados`  ";
                $sql .= " ON `eventos`.`id_inv` = `invitados`.`invitado_id` ";
                $sql .= " ORDER BY `evento_id` ";
                //query es una funcion de php para permitir hacer consultas de mysql
                $resultado = $conexion->query($sql);

            }catch(\Exception $e){
                echo $e->getMessage();
            }
        ?>

        <!--Imprimir la consulta en el siguiente div-->
        <div class="calendario">
            <?php
                $calendario = array();
                //Funcion fetch_assoc imprime los resultados
                while($eventos = $resultado->fetch_assoc()) { 

                    //Obtiene la fecha del evento
                    $fecha = $eventos['fecha_evento'];

                    $evento = array(
                        'titulo' => $eventos['nombre_evento'],
                        'fecha' => $eventos['fecha_evento'],
                        'hora' => $eventos['hora_evento'],
                        'categoria' => $eventos['cat_evento'],
                        'icono' => 'fa' . ' ' . $eventos['icono'],
                        'invitado' => $eventos['nombre_invitado'] . ' ' . $eventos['apellido_invitado']

                    );

                    $calendario[$fecha][] = $evento;
                    
                    ?>

               <?php }; //While del fetch_assoc()?>

                <?php
                    //Imprime todos los eventos
                    foreach($calendario as $dia => $lista_eventos) { ?>

                    <h3>
                        <i class="fa fa-calendar"></i>
                        <?php
                            setlocale (LC_TIME, 'es_ES.UTF-8');
                            setlocale(LC_TIME,'spanish');

                            echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dia)));?>
                    </h3>

                    <?php foreach($lista_eventos as $evento) { ?>
                        <div class="dia">
                            <p class="titulo"> <?php echo $evento['titulo'];?></p>
                            <p class="hora">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> 
                                <?php echo $evento['fecha'] . " " . $evento['hora'];?>
                            </p>
                            <p> 
                                <i class="<?php echo $evento["icono"];?>" aria-hidden="true"></i> 
                                <?php echo $evento['categoria']; ?>
                            </p>
                            <p>
                                <i class="fa fa-user" aria-hidden="true"></i> 
                                <?php echo $evento['invitado'];?>
                            </p>

                        </div>

                        <?php } //fin foreach de eventos ?>
                    <?php } //fin foreach de dias ?>

        </div>
        <!--Div calendario-->

        <?php
        //Cerrar la conexion a la base de datos
            $conexion->close();
        ?>

    </section>

<?php include_once 'includes/templates/footer.php';?>