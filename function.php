<?php

function cc_init() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );
wp_enqueue_style('ccmech', get_bloginfo('template_directory').'/css/ccmech.css', false, 1.0, 'all');
}
add_action('init','cc_init');

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