<?php
/**
 * Header router: a clean landing shell on the front page, GeneratePress elsewhere.
 *
 * @package Psycholog_Schmidt
 */

defined( 'ABSPATH' ) || exit;

if ( ! is_front_page() ) {
	require get_template_directory() . '/header.php';
	return;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
wp_body_open();
do_action( 'generate_before_header' );
do_action( 'generate_header' );
do_action( 'generate_after_header' );

