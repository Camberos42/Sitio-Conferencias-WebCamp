<?php include_once 'includes/templates/header.php';?>
    <section class="seccion contenedor">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam nesciunt laboriosam natus distinctio aperiam voluptatem maxime tenetur molestias ipsa obcaecati voluptatibus deserunt eos ea mollitia praesentium, aliquid odio consequatur repudiandae.
        </p>
    </section>
    <!--Seccion-->

    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="img/bg-talleres.jpg">
              <source src="videos/video.mp4" type="video/mp4">
              <source src="videos/video.webm" type="video/webm">
              <source src="videos/video.ogv" type="video/ogv">
            </video>
        </div>
        <!--contenedor video-->

        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del evento</h2>

                    <?php
                        try{
                            //require_once es una funcion que se encarga de incluir un archivo
                            require_once('includes/funciones/bd_conexion.php');
                            //Para hacer una consulta despues de crear la concexion a la bd en la linea anterior
                            $sql = " SELECT * FROM `categoria_evento` ";
                            
                            //query es una funcion de php para permitir hacer consultas de mysql
                            $resultado = $conexion->query($sql);

                        }catch(\Exception $e){
                            echo $e->getMessage();
                        }
                    ?>

                    <nav class="menu-programa">
                        <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <?php $categoria = $cat['cat_evento']; ?>
                            <a href="#<?php echo strtolower($categoria) ?>">
                                <i class="fas <?php echo $cat['icono'] ?>" aria-hidden="true"></i><?php echo $categoria ?>
                            </a>
                        <?php } ?>
                    </nav>

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
                            $sql .= " AND `eventos`.`id_cat_evento` = 1";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                            $sql .= " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono` , `nombre_invitado`, `apellido_invitado`  ";
                            $sql .= " FROM `eventos`  ";   
                            $sql .= " INNER JOIN `categoria_evento`  ";
                            $sql .= " ON `eventos`.`id_cat_evento` = `categoria_evento`.`id_categoria`  ";
                            $sql .= " INNER JOIN `invitados`  ";
                            $sql .= " ON `eventos`.`id_inv` = `invitados`.`invitado_id` ";
                            $sql .= " AND `eventos`.`id_cat_evento` = 2";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                            $sql .= " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono` , `nombre_invitado`, `apellido_invitado`  ";
                            $sql .= " FROM `eventos`  ";   
                            $sql .= " INNER JOIN `categoria_evento`  ";
                            $sql .= " ON `eventos`.`id_cat_evento` = `categoria_evento`.`id_categoria`  ";
                            $sql .= " INNER JOIN `invitados`  ";
                            $sql .= " ON `eventos`.`id_inv` = `invitados`.`invitado_id` ";
                            $sql .= " AND `eventos`.`id_cat_evento` = 3";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";

                        }catch(\Exception $e){
                            echo $e->getMessage();
                        }
                    ?>
                        <?php //Para crear un multi query
                            $conexion->multi_query($sql);
                        ?>

                        <?php
                            do {
                                $resultado = $conexion->store_result();
                                //row es un array que viene de MYSQLI_ASSOC
                                $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
                                 <?php $i = 0;?>
                                <?php foreach($row as $evento): ?>
                                    <?php //Se asegura que si es un numero par hara lo mismo
                                        if($i % 2 == 0) { ?>
                                    <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                                    <?php } ?>
                                        <div class="detalle-evento">
                                            <h3> <?php echo ($evento['nombre_evento']) ?> </h3>
                                            <p><i class="fas fa-clock" aria-hidden="true"></i> <?php echo $evento['hora_evento'] ?> </p>
                                            <p><i class="fas fa-calendar" aria-hidden="true"></i> <?php echo $evento['fecha_evento'] ?> </p>
                                            <p><i class="fas fa-user" aria-hidden="true"></i> <?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']?> </p>
                                        </div>
                                        
                                <?php if($i % 2 == 1): ?>
                                    <a href="calendario.php" class="button float-right">Ver Todos</a>
                                    </div> <!--Div talleres-->
                                <?php endif; ?>
                                <?php $i++; ?>
                                <?php endforeach;?>
                                <?php $resultado->free(); ?>
                         <?php   } while ($conexion->more_results() && $conexion->next_result()); //Se debe correr el while mientras haya mas resultados
                         ?>
                </div>
                <!--Div programa evento-->
            </div>
            <!--contenedor-->
        </div>
        <!--Contenido programa-->
    </section>
    <!--programa-->

    <?php include_once 'includes/templates/invitados.php';?>
    <!--Seccion invitados-->

    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero"></p> Invitados</li>
                <li>
                    <p class="numero"></p> Talleres</li>
                <li>
                    <p class="numero"></p> Dias</li>
                <li>
                    <p class="numero"></p> Conferencias</li>
            </ul>
        </div>
    </div>
    <!--Div contador-->

    <section class="precios seccion">
        <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por dia</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas las conferencias</li>
                            <li><i class="fas fa-check"></i>Todos los talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>Todos los dias</h3>
                        <p class="numero">$50</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas las conferencias</li>
                            <li><i class="fas fa-check"></i>Todos los talleres</li>
                        </ul>
                        <a href="#" class="button">Comprar</a>
                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 dia</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check"></i> Todos los talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <div id="mapa" class="mapa">
    </div>

    <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, quae praesentium harum odit dolorem saepe repellat veniam est excepturi mollitia nam distinctio laboriosam culpa numquam necessitatibus earum.</p>
                    <footer class="info-testimonial clearfix">
                        <i class="fas icon-testimonial fa-quote-left"></i>
                        <img class="imagen-testimonial" src="/img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--Fin testimonial-->
            <div class="testimonial">
                <blockquote>
                    <i class="fas icon-testimonial fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, quae praesentium harum odit dolorem saepe repellat veniam est excepturi mollitia nam distinctio laboriosam culpa numquam necessitatibus earum.</p>
                    <footer class="info-testimonial clearfix">
                        <img class="imagen-testimonial" src="/img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--Fin testimonial-->
            <div class="testimonial">
                <blockquote>
                    <i class="fas icon-testimonial fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, quae praesentium harum odit dolorem saepe repellat veniam est excepturi mollitia nam distinctio laboriosam culpa numquam necessitatibus earum.</p>
                    <footer class="info-testimonial clearfix">
                        <img class="imagen-testimonial" src="/img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--Fin testimonial-->
        </div>
    </section>

    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p> registrate al newsletter: </p>
            <h3>gldwebcamp</h3>
            <a href="#" class="button transparente">Registro</a>
        </div>
    </div>

    <section class="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p class="numero" id="dias"></p>Dias</li>
                <li>
                    <p class="numero" id="horas"></p>Horas</li>
                <li>
                    <p class="numero" id="minutos"></p>Minutos</li>
                <li>
                    <p class="numero" id="segundos"></p>Segundos</li>
            </ul>
        </div>
    </section>

<?php include_once 'includes/templates/footer.php';?>