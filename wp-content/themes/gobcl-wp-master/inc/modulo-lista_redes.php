<?php
    // Opciones del Tema - Lista Redes Sociales
    $lista_redes = gobcl_get_option('_gobcl_lista_redes');

    // Checkeamos que en el array de redes exista al menos una red activa para mostrar el sidebar
    if (in_multiarray($lista_redes, '_gobcl_activa_red', true)): ?>
    <div class="redes-lista">

        <h5 class="titulo-seccion">Síguenos</h5>
        <ul>
            <?php



                $lista_redes = gobcl_get_option('_gobcl_lista_redes');

                function getNombreRed($nombre_red){

                    switch ($nombre_red) :
                        case 'facebook'   : return 'Facebook';
                        case 'twitter'    : return 'Twitter';
                        case 'flickr'     : return 'Flickr';
                        case 'youtube'    : return 'YouTube';
                        case 'instagram'  : return 'Instagram';
                        case 'pinterest'  : return 'Pinterest';
                        case 'vimeo'      : return 'Vimeo';
                        case 'linkedin'   : return 'LinkedIn';
                        case 'slideshare' : return 'Slideshare';
                        case 'scribd'     : return 'Scribd';
                        case 'soundcloud' : return 'Soundcloud';
                    endswitch;

                }

            ?>

            <?php foreach ($lista_redes as $red): ?>



                <?php
                    // Checkeamos si la red está activa
                    if ($red['_gobcl_activa_red']): 
                        ?>
                    
                    <li class="<?php echo $red['_gobcl_redes'] ?>">
                        <a class="clearfix" href="<?php echo (isset($red['url_red'])) ? $red['url_red'] : '#' ?>">
                            <span class="icono"></span>
                            <div class="texto">
                                <span class="red"><?php echo getNombreRed($red['_gobcl_redes']) ?></span>
                                <span class="usuario"><?php echo $red['user_red'] ?></span>
                            </div>
                        </a>
                    </li>
                <?php endif ?>


            <?php endforeach ?>




            <div class="clearfix"></div>
        </ul>

    </div>
<?php endif ?>
