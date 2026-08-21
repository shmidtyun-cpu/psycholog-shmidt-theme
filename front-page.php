<?php
/**
 * Full-width landing page template for the static front page.
 *
 * @package Psycholog_Schmidt
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="ys-home-main">
	<?php
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>
</main>

<?php
get_footer();
