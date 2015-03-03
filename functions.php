<?php if ( function_exists('add_theme_support') ) {
add_theme_support('post-thumbnails');
add_image_size('wider', 1920, 550, true );
add_image_size('slider', 1100, 550, true );
add_image_size('col-6', 550, 430, true );
add_image_size('col-6-mid', 550, 300, true );
add_image_size('col-4', 370, 290, true );
add_image_size('col-3', 275, 215, true );
add_image_size('tall', 500, 700, true );
add_image_size('square', 500, 500, true );
add_image_size('mega', 900, 900, true );
add_image_size('minibox', 500, 200, true );
add_image_size('midbox', 250, 200, true );
}
 
add_filter('image_size_names_choose', 'my_image_sizes');
	function my_image_sizes($sizes) {
	$addsizes = array(
		"col-6" => 'Media columna',
		"col-6-mid" => 'Media columna/alto',
		'col-4' => 'Tercio columna',
		'col-3' => 'Cuarto columna',
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}

add_post_type_support('page', 'excerpt');
;?>
<?php 
/* Add support for wp_nav_menu() */
function register_my_menu() {
	register_nav_menu( 'primary', 'Menú principal');
	register_nav_menu( 'secondary', 'Menú secundario');
	register_nav_menu( 'third', 'Footer Menú');
}
add_action( 'init', 'register_my_menu' );
?>
<?php 
function call_scripts() {
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');
    wp_register_script('core', get_template_directory_uri() . '/js/core.js');

    wp_enqueue_script('jquery');
    wp_enqueue_script('core');
}    
 
add_action('wp_enqueue_scripts', 'call_scripts');
?>
<?php
//Post type register

add_action('init', 'alcaldes_register');
function alcaldes_register() {
    $args = array(
        'label' => 'Alcaldes',
        'singular_label' => 'Alcalde',
        'public' => true,
		'menu_position' => 15, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'alcaldes'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('alcaldes', $args);
    flush_rewrite_rules();
}

add_action('init', 'staff_register');
function staff_register() {
    $args = array(
        'label' => 'Staff',
        'singular_label' => 'Staff',
        'public' => true,
		'menu_position' => 14, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'staff'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('staff', $args);
    flush_rewrite_rules();
}

add_action('init', 'documentos_register');
function documentos_register() {
    $args = array(
        'label' => 'Documentos',
        'singular_label' => 'Documento',
        'public' => true,
		'menu_position' => 14, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'documentos'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' , 'revisions' )
    );
    register_post_type('documentos', $args);
    flush_rewrite_rules();
}

add_action('init', 'turismo_register');
function turismo_register() {
    $args = array(
        'label' => 'Turismo',
        'singular_label' => 'turismo',
        'public' => true,
		'menu_position' => 10, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'turismo'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' , 'revisions' )
    );
    register_post_type('turismo', $args);
    flush_rewrite_rules();
}

// Para Integrantes del consejo - Carlos
add_action('init', 'integrantes_register');
function integrantes_register() {
    $args = array(
        'label' => 'Integrantes',
        'singular_label' => 'Integrante',
        'public' => true,
    'menu_position' => 15, 
        '_builtin' => false,
        'capability_type' => 'post',
    'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'integrantes'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('integrantes', $args);
    flush_rewrite_rules();
}




register_taxonomy("servicios", array('post' , 'staff' , 'documentos'), array("hierarchical" => true, "label" => "Servicios", "singular_label" => "Servicio", "rewrite" => true));

register_taxonomy("area", array('documentos'), array("hierarchical" => true, "label" => "Tipos", "singular_label" => "Tipo", "rewrite" => true));

register_taxonomy("tipo", array('turismo'), array("hierarchical" => true, "label" => "Tipos", "singular_label" => "Tipo", "rewrite" => true));


?>

<?php //register sidebars

/* register_sidebar(array(
  'name' => __( 'Home' ),
  'id' => 'home',
  'description' => __( 'Widgets en esta área se mostrarán en el home, utlice esta área para agregar la mini encuesta' ),
  'before_title' => '<h3>',
  'after_title' => '</h3>'
)); */


//add_filter('widget_text', 'do_shortcode');

?>
<?php 
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');?>
<?php 
function fontawesome() {
	echo '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">';
	//echo '<link href="'.get_bloginfo('template_directory').'/admin/bootstrap.css" rel="stylesheet">';
	echo "<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,800,400' rel='stylesheet' type='text/css'>";
	echo '<style type="text/css">body{ font-family: Open sans, helvetica neue, helvetica, arial , sans-serif}</style>';
}
add_action('admin_head', 'fontawesome');
?>
<?php 

function get_type_for_attachment($post_id) {
  $type = get_post_mime_type($post_id);
  switch ($type) {
    case 'image/jpeg':
    case 'image/png':
    case 'image/gif':
      return 'img'; break;
    case 'video/mpeg':
    case 'video/mp4': 
    case 'video/quicktime':
      return 'Vid'; break;
    case 'text/csv':
    case 'text/plain': 
    case 'text/xml':
      return 'Doc'; break;
	case 'application/pdf':
		return 'PDF'; break;
	case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
	case 'application/msword':
		return '.Doc'; break;
	case 'application/vnd.ms-excel':
	case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
		return '.Xls'; break;
	case 'application/vnd.ms-powerpoint' :
	case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
		return 'Ppt'; break;
    default:
      return 'file';
  }
}
// call it like this:
//echo '<img src="'.get_icon_for_attachment($my_attachment->ID).'" />';

function get_icon_for_attachment($post_id) {
  $type = get_post_mime_type($post_id);
  switch ($type) {
    case 'image/jpeg':
    case 'image/png':
    case 'image/gif':
      return 'fa-file-image-o'; break;
    case 'video/mpeg':
    case 'video/mp4': 
    case 'video/quicktime':
      return 'fa-file-video-o'; break;
    case 'text/csv':
    case 'text/plain': 
    case 'text/xml':
      return 'fa-file-text-o'; break;
	case 'application/pdf':
		return 'fa-file-pdf-o'; break;
	case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
	case 'application/msword':
		return 'fa-file-word-o'; break;
	case 'application/vnd.ms-excel':
	case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
		return 'fa-file-excel-o'; break;
	case 'application/vnd.ms-powerpoint' :
	case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
		return 'fa-file-powerpoint-o'; break;
    default:
      return 'fa-file-o';
  }
}
// call it like this:
//echo '<img src="'.get_icon_for_attachment($my_attachment->ID).'" />';



?>
<?php //include_once( rtrim( dirname( __FILE__ ), '/' ) . '/acf-taxonomy-field/taxonomy-field.php' );?>
<?php 
add_action( 'pre_get_posts', 'rc_modify_query_limit_posts' );
function rc_modify_query_limit_posts( $query ) {
	if(! is_admin() && $query->is_post_type_archive()){
		$query->set('posts_per_page', '7');
	}
	elseif(! is_admin() && $query->is_main_query() && $query->is_post_type_archive() ){
		$query->set('posts_per_page', '2');
	}
	elseif( ! is_admin() && $query->is_main_query() ) {
		$query->set('posts_per_page', '10');
	}
}
?>
<?php 
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>