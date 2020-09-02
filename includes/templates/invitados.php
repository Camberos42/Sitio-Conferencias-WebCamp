        <?php
            try{
                //require_once es una funcion que se encarga de incluir un archivo
                require_once('includes/funciones/bd_conexion.php');
                //Para hacer una consulta despues de crear la concexion a la bd en la linea anterior
                $sql = " SELECT * FROM `invitados`";

                //query es una funcion de php para permitir hacer consultas de mysql
                $resultado = $conexion->query($sql);

            }catch(\Exception $e){
                echo $e->getMessage();
            }
        ?>

        <section class="invitados contenedor seccion">
            <h2>Nuestros Invitados</h2>
            <ul class="lista-invitados clearfix">
                <?php //While para mostrar todos los invitados y aplicar colorbox en cada uno
                while($invitados = $resultado->fetch_assoc()) {  ?>

                    <li>
                        <div class="invitado">
                            <!--Se coloca el href apuntando al id y se debe colocar la clase-invitado tmb para crear esa conexion-->
                            <a class="invitado-info" href="#invitado<?php echo $invitados["invitado_id"]; ?>">
                                <img src="img/<?php echo $invitados["url_imagen"] ?> " alt="Imagen invitado">
                                <p><?php echo $invitados["nombre_invitado"] . " " . $invitados["apellido_invitado"]; ?></p>
                            </a>
                        </div>
                    </li>

                    <div style="display:none;">
                        <div class="invitado-info" id="invitado<?php echo $invitados["invitado_id"]; ?>">
                            <h2><?php echo $invitados["nombre_invitado"] . " " . $invitados["apellido_invitado"] ?></h2>
                            <img src="img/<?php echo $invitados["url_imagen"] ?> " alt="Imagen invitado">
                            <p><?php echo $invitados["descripcion"]?></p>
                        </div>
                    </div>
                <?php  } ?>
            </ul>
        </section>



        <?php
        //Cerrar la conexion a la base de datos
            $conexion->close();
        ?>