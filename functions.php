<?php if ( function_exists('add_theme_support') ) {
add_theme_support('post-thumbnails');
add_image_size('slider', 1100, 550, true );
add_image_size('col-6', 550, 430, true );
add_image_size('col-6-mid', 550, 300, true );
add_image_size('col-4', 370, 290, true );
add_image_size('col-3', 275, 215, true );
add_image_size('square', 500, 500, true );
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

 
/* add_action('init', 'pais_register');
function pais_register() {
    $args = array(
        'label' => 'Países',
        'singular_label' => 'País',
        'public' => true,
		'menu_position' => 5, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'donde-estamos/paises'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('pais', $args);
    flush_rewrite_rules();
}

register_taxonomy("continente", array('pais'), array("hierarchical" => true, "label" => "Continentes", "singular_label" => "Continente", "rewrite" => true));

 */

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
      return 'Imagen'; break;
    case 'video/mpeg':
    case 'video/mp4': 
    case 'video/quicktime':
      return 'Video'; break;
    case 'text/csv':
    case 'text/plain': 
    case 'text/xml':
      return 'Documento'; break;
	case 'application/pdf':
		return 'PDF'; break;
	case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
	case 'application/msword':
		return 'MS .Doc'; break;
	case 'application/vnd.ms-excel':
	case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
		return 'MS .Xls'; break;
	case 'application/vnd.ms-powerpoint' :
	case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
		return 'MS .Ppt'; break;
    default:
      return 'Archivo';
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
	if( ! is_admin() && $query->is_main_query() ) {
		$query->set('posts_per_page', '15');
	}
}
?>