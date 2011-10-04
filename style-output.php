<?php
// Variables containing style options
$body_background = of_get_option('body_background');
$header_background = of_get_option('header_background');
$nav_background1 = of_get_option('nav_background1');
$nav_background2 = of_get_option('nav_background2');
$header_background_image = of_get_option('header_background_image');
?>

body {
  background-color:<?php echo $body_background?>;
}
