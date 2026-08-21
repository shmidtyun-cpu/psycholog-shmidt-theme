<?php
/**
 * Footer router paired with the landing header shell.
 *
 * @package Psycholog_Schmidt
 */

defined( 'ABSPATH' ) || exit;

if ( ! is_front_page() ) {
	require get_template_directory() . '/footer.php';
	return;
}

do_action( 'generate_before_footer' );
do_action( 'generate_footer' );
do_action( 'generate_after_footer' );
wp_footer();
?>
</body>
</html>
