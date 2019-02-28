<?php

/* Theme support */

add_theme_support('post-thumbnails');
add_image_size('320x210', 320, 210, true); // thumbnail
add_image_size('660x250', 660, 250, true); // large thumb
add_image_size('660x9999', 660, 9999, false); // large


/*  Menús
/*  ----- */

// Definimos áreas para menús (location)
register_nav_menus( array(
    'menu_principal' => 'Menu principal',
    'menu_footer_1'  => 'Menu Footer Columna 1',
    'menu_footer_2'  => 'Menu Footer Columna 2',
    'menu_footer_3'  => 'Menu Footer Columna 3',
    'menu_inferior'  => 'Menu Inferior'
) );

/*  Widgets
/*  ----- */

function gobcl_widgets_init() {

    register_sidebar( array(
        'name'          => 'Sidebar principal',
        'id'            => 'sidebar_principal',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="titulo-seccion">',
        'after_title'   => '</h5><div class="clearfix"></div>',
    ) );

}
add_action( 'widgets_init', 'gobcl_widgets_init' );

// Función para traer título del menú

function get_menu_title( $theme_location, $default_name = 'menu' ) {
    if ( $theme_location && ( $locations = get_nav_menu_locations() ) && isset( $locations[ $theme_location ] ) ) {
        $menu = wp_get_nav_menu_object( $locations[ $theme_location ] );

        if( $menu && $menu->name ) {
            return $menu->name;
        }
    }

    return $default_name;
}


/*  Limpiamos head
/*  -------------- */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



/*  Apariencia > Personalizar
/*  ---------------------------------- */

function gobcl_theme_customizer( $wp_customize ) {

    // Quitamos sección 'Portada estática'
    $wp_customize->remove_section( 'static_front_page');

    // Añadimos sección 'Isologo'
    $wp_customize->add_section( 'gobcl_logo_section' , array(
        'title'       => __( 'Isologo', 'gobcl' ),
        'priority'    => 30,
        'description' => 'Reemplazar con el isologo correspondiente. 180x180 px',
        )
    );

    $wp_customize->add_setting( 'gobcl_logo', array( 'default' => 'http://placehold.it/180/0168b3&text=Isologo+(180+x+180+px)') );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gobcl_logo', array(
                'label'    => __( 'Isologo', 'gobcl' ),
                'section'  => 'gobcl_logo_section',
                'settings' => 'gobcl_logo',
            )
        )
    );

}
add_action('customize_register', 'gobcl_theme_customizer');

/*  Apariencia > Personalizar: Imagen de cabecera
/*  --------------------------------------------- */

$header_args = array(
    'default-image'          => 'http://placehold.it/1920x1440/&text=Imagen+de+cabecera+(1920+x+1440+px)',
    'width'                  => 1920,
    'height'                 => 1440,
    'header-text'            => false,
    'uploads'                => true
);

add_theme_support( 'custom-header', $header_args );




/**
 * GobCL - Opciones del Tema
 * Fuente: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress/wiki/Using-CMB-to-create-an-Admin-Theme-Options-Page
 * @version 0.1.0
 */

function update_cmb_meta_box_url( $url ) {
    // Actualizamos url de metabox

    return get_template_directory_uri().'/lib/metabox/';

}

class gobcl_Admin {

    /**
     * Option key, and option page slug
     * @var string
     */
    private $key = 'gobcl_options';

    /**
     * Array of metaboxes/fields
     * @var array
     */
    protected $option_metabox = array();

    /**
     * Options Page title
     * @var string
     */
    protected $title = '';

    /**
     * Options Page hook
     * @var string
     */
    protected $options_page = '';

    /**
     * Constructor
     * @since 0.1.0
     */
    public function __construct() {
        // Set our title
        $this->title = __( 'Opciones del Tema', 'gobcl' );
    }

    /**
     * Initiate our hooks
     * @since 0.1.0
     */
    public function hooks() {
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
    }

    /**
     * Register our setting to WP
     * @since  0.1.0
     */
    public function init() {
        register_setting( $this->key, $this->key );
    }

    /**
     * Add menu options page
     * @since 0.1.0
     */
    public function add_options_page() {
        $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
    }

    /**
     * Admin page markup. Mostly handled by CMB
     * @since  0.1.0
     */
    public function admin_page_display() {
        ?>
        <div class="wrap cmb_options_page <?php echo $this->key; ?>">
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
            <?php cmb_metabox_form( self::option_fields(), $this->key ); ?>
        </div>
        <?php
    }

    /**
     * Defines the theme option metabox and field configuration
     * @since  0.1.0
     * @return array
     */
    public function option_fields() {

        // Only need to initiate the array once per page-load
        if ( ! empty( $this->option_metabox ) ) {
            return $this->option_metabox;
        }

        $prefix = '_gobcl_';

        // Acá agregamos los campos de Opciones del Tema
        // field types: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress/wiki/Field-Types

        $this->fields = array(

            /* Fields Sidebar */

            // Redes Sociales
            array(
                'id'          => $prefix . 'lista_redes',
                'type'        => 'group',
                'name'        => 'Sidebar: Redes Sociales',
                'description' => __( 'URLs de Perfiles de redes sociales', 'gobcl' ),
                'options'     => array(
                    'group_title'   => __( 'Red {#}', 'gobcl' ), // {#} es reemplazado por el número de row
                    'add_button'    => __( 'Añadir nueva red', 'gobcl' ),
                    'remove_button' => __( 'Quitar red', 'gobcl' ),
                    'sortable'      => true, // beta
                ),
                'fields'      => array(

                    array(
                        'name' => 'Activar Red',
                        'desc' => 'Activa o desactiva la red',
                        'id' => $prefix . 'activa_red',
                        'type' => 'checkbox'
                    ),
                    array(
                        'name'    => 'Redes Sociales',
                        'desc'    => 'Selecciona una opción',
                        'id'      => $prefix . 'redes',
                        'type'    => 'select',
                        'options' => array(
                            'facebook'   => __( 'Facebook', 'gobcl' ),
                            'twitter'    => __( 'Twitter', 'gobcl' ),
                            'flickr'     => __( 'Flickr', 'gobcl' ),
                            'youtube'    => __( 'YouTube', 'gobcl' ),
                            'instagram'  => __( 'Instagram', 'gobcl' ),
                            'pinterest'  => __( 'Pinterest', 'gobcl' ),
                            'vimeo'      => __( 'Vimeo', 'gobcl' ),
                            'linkedin'   => __( 'LinkedIn', 'gobcl' ),
                            'slideshare' => __( 'SlideShare', 'gobcl' ),
                            'scribd'     => __( 'Scribd', 'gobcl' ),
                            'soundcloud' => __( 'Soundcloud', 'gobcl' ),
                        ),
                        'default' => 'facebook',
                    ),

                    array(
                        'name' => 'Nombre de usuario',
                        'id'   => 'user_red',
                        'type' => 'text_medium',
                        'sanitization_cb' => 'stripslashes_deep'
                    ),

                    array(
                        'name' => 'URL Perfil',
                        'id'   => 'url_red',
                        'type' => 'text_medium',
                        'sanitization_cb' => 'stripslashes_deep'
                    ),

                ),
            ),

            // Banners Sidebar
            array(
                'id'          => $prefix . 'banners_sidebar',
                'type'        => 'group',
                'name'        => 'Sidebar: Banners Sidebar',
                'description' => __( 'Banners sidebar, 320x100 px.', 'gobcl' ),
                'options'     => array(
                    'group_title'   => __( 'Banner {#}', 'gobcl' ),
                    'add_button'    => __( 'Añadir nuevo Banner', 'gobcl' ),
                    'remove_button' => __( 'Quitar Banner', 'gobcl' ),
                    'sortable'      => true, // beta
                ),
                'fields'      => array(
                    array(
                        'name' => 'Imagen Banner',
                        'id'   => 'image_banner_sidebar',
                        'type' => 'file',
                    ),
                    array(
                        'name' => 'URL Banner',
                        'description' => __( 'URL a la cual dirige el banner', 'gobcl' ),
                        'id'   => 'url_banner_sidebar',
                        'type' => 'text_url',
                        'attributes'  => array(
                            'placeholder' => 'Ej: http://www.gob.cl',
                        ),

                    ),
                    array(
                        'name' => 'Texto Alternativo Banner',
                        'description' => __( 'Requerido para lectores de pantalla', 'gobcl' ),
                        'id'   => 'alt_text_banner_sidebar',
                        'type' => 'text_medium',
                        'sanitization_cb' => 'stripslashes_deep'

                    ),

                ),
            ),

            /* Fields Home - Prefooter */

            // Banner Wide Home

            array(
                'id'          => $prefix . 'banner_wide',
                'type'        => 'group',
                'name'        => 'Home: Banner Wide',
                'repeatable'    => false,
                'description' => __( 'Banner de 660x130px', 'gobcl' ),
                'fields'      => array(
                    array(
                        'name' => 'Imagen',
                        'description' => 'Imagen de 660x130 pixeles',
                        'id'   => 'imagen_banner_wide',
                        'type' => 'file',
                    ),
                    array(
                        'name' => 'Texto 1 banner',
                        'id'   => 'texto_1_banner_wide',
                        'type' => 'text_medium',
                        'sanitization_cb' => 'stripslashes_deep'
                    ),
                    array(
                        'name' => 'Texto 2 banner',
                        'id'   => 'texto_2_banner_wide',
                        'type' => 'text_medium',
                        'sanitization_cb' => 'stripslashes_deep'
                    ),
                    array(
                        'name' => 'URL Banner',
                        'description' => 'URL a la cual dirige el banner',
                        'id'   => 'url_banner_wide',
                        'type' => 'text_url',
                        'attributes'  => array(
                            'placeholder' => 'Ej: http://www.gob.cl',
                        ),

                    ),

                ),
            ),

            // Cita destacada

            array(
                'id'          => $prefix . 'cita_destacada',
                'type'        => 'group',
                'name'        => 'Home: Cita Destacada',
                'repeatable'    => false,
                'description' => __( 'Cita destacada mostrado en el home del sitio', 'gobcl' ),
                'fields'      => array(
                    array(
                        'name' => 'Autor',
                        'id'   => 'autor_cita',
                        'type' => 'text_medium',
                        'sanitization_cb' => 'stripslashes_deep'
                    ),
                    array(
                        'name' => 'Cargo autor',
                        'id'   => 'cargo_autor_cita',
                        'type' => 'text_medium',
                        'sanitization_cb' => 'stripslashes_deep'
                    ),
                    array(
                        'name' => 'Texto',
                        'id'   => 'texto_cita',
                        'type' => 'textarea_small',
                        'sanitization_cb' => 'stripslashes_deep'
                    ),
                    array(
                        'name' => 'Información Cita',
                        'description' => 'Fecha, lugar, etc.',
                        'id'   => 'info_cita',
                        'type' => 'text_medium',
                        'sanitization_cb' => 'stripslashes_deep'
                    ),
                    array(
                        'name' => 'URL Fuente Cita',
                        'description' => 'Fuente de la cita (opcional)',
                        'id'   => 'url_cita',
                        'type' => 'text_url',
                        'attributes'  => array(
                            'placeholder' => 'Ej: http://www.gob.cl',
                        ),

                    ),

                ),
            ),

            // Lista Banners Pre-footer
            array(
                'id'          => $prefix . 'banners_pre_footer',
                'type'        => 'group',
                'name'        => 'Home: Banners pre-footer',
                'description' => __( 'Banners pre-footer, 320x100 px.', 'gobcl' ),
                'options'     => array(
                    'group_title'   => __( 'Banner {#}', 'gobcl' ),
                    'add_button'    => __( 'Añadir nuevo Banner', 'gobcl' ),
                    'remove_button' => __( 'Quitar Banner', 'gobcl' ),
                    'sortable'      => true, // beta
                ),
                'fields'      => array(
                    array(
                        'name' => 'Imagen Banner',
                        'id'   => 'image_banner_pre_footer',
                        'type' => 'file',
                    ),
                    array(
                        'name' => 'URL Banner',
                        'description' => __( 'URL a la cual dirige el banner', 'gobcl' ),
                        'id'   => 'url_banner_pre_footer',
                        'type' => 'text_url',
                        'attributes'  => array(
                            'placeholder' => 'Ej: http://www.gob.cl',
                        ),

                    ),
                    array(
                        'name' => 'Texto Alternativo Banner',
                        'description' => __( 'Requerido para lectores de pantalla', 'gobcl' ),
                        'id'   => 'alt_text_banner_pre_footer',
                        'type' => 'text_medium',
                        'sanitization_cb' => 'stripslashes_deep'

                    ),

                ),
            ),

            /* Fields Home - Footer */

            // Datos de contacto
            array(
                'name' => 'Datos de contacto',
                'desc' => 'Dirección, teléfono, etc.',
                'id' => $prefix . 'datos_contacto',
                'type' => 'text',
                'attributes'  => array(
                    'placeholder' => 'Ej: Palacio de La Moneda - Teléfono: +56 2 26904000',
                ),
                'sanitization_cb' => 'stripslashes_deep'
            ),


        );

        $this->option_metabox = array(
            'id'         => 'option_metabox',
            'title'      => __( 'Repeating Field Group', 'gobcl' ),
            'show_on'    => array( 'key' => 'options-page', 'value' => array( $this->key, ), ),
            'show_names' => true,
            'fields'     => $this->fields,
        );

        return $this->option_metabox;
    }

    /**
     * Public getter method for retrieving protected/private variables
     * @since  0.1.0
     * @param  string  $field Field to retrieve
     * @return mixed          Field value or exception is thrown
     */
    public function __get( $field ) {

        // Allowed fields to retrieve
        if ( in_array( $field, array( 'key', 'fields', 'title', 'options_page' ), true ) ) {
            return $this->{$field};
        }
        if ( 'option_metabox' === $field ) {
            return $this->option_fields();
        }

        throw new Exception( 'Invalid property: ' . $field );
    }

}

// Get it started
$gobcl_Admin = new gobcl_Admin();
$gobcl_Admin->hooks();

/**
 * Wrapper function around cmb_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function gobcl_get_option( $key = '' ) {
    global $gobcl_Admin;
    return cmb_get_option( $gobcl_Admin->key, $key );
}


// Metaboxes para el resto del tema

function gobcl_metaboxes( $meta_boxes ) {
    $prefix = '_gobcl_'; // Prefix for all fields
    $meta_boxes['page_titulo'] = array(
        'id' => 'page_titulo',
        'title' => 'Título páginas',
        'desc' => 'field description (optional)',
        'pages' => array('page'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Título Línea 1',
                'id' => $prefix . 'titulo_1',
                'type' => 'text_medium'
            ),

            array(
                'name' => 'Título Línea 2',
                'id' => $prefix . 'titulo_2',
                'type' => 'text_medium'
            ),
        ),
    );

    return $meta_boxes;
}

add_filter( 'cmb_meta_boxes', 'gobcl_metaboxes' );

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once 'lib/metabox/init.php';

}


/**
 * Helpers
 */

// Checkeamos existencia de par key => value en array multidimensional
function in_multiarray($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
}