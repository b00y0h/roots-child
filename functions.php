<?php

if ( !function_exists( 'optionsframework_init' ) ) {
/*-----------------------------------------------------------------------------------*/
/* Options Framework Theme
/*-----------------------------------------------------------------------------------*/

/* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */

if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/admin/');
} else {
	define('OPTIONS_FRAMEWORK_URL', get_stylesheet_directory() . '/admin . '/admin/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('stylesheet_directory') . '/admin/admin/');
}
require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
}


function init() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}
add_action('init','init');

function in_my_foot(){
    ?>
	<script>
	window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/libs/jquery-1.6.2.min.js"><\/script>')
	</script>
	<?php
}
add_action('wp_footer', 'in_my_foot');

// load the custom stylesheet
if ( !is_admin() ) { 
    wp_register_style('style', get_bloginfo( 'stylesheet_directory' ) . '/css/site.css',false,0.1);
    wp_enqueue_style( 'style' );
}


//Load dynamic options stylesheet
function of_options_output_css() { ?>
	<style type="text/css">
		/* <![CDATA[ */
	<?php $of_css_options_output = dirname( __FILE__ ) . '/style-output.php'; if( is_file( $of_css_options_output ) ) require $of_css_options_output; ?>
		/* ]]> */
	</style>
<?php }

add_action('wp_head', 'of_options_output_css');


/* 
 * Turns off the default options panel from Twenty Eleven
 */
 
add_action('after_setup_theme','remove_twentyeleven_options', 100);

function remove_twentyeleven_options() {
	remove_action( 'admin_menu', 'twentyeleven_theme_options_add_page' );
}