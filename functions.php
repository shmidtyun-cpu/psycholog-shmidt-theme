<?php
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function () {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'align-wide' );
	register_nav_menus( array( 'primary' => 'Главное меню', 'footer' => 'Меню в подвале' ) );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'generatepress-parent', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'psycholog-shmidt', get_stylesheet_uri(), array( 'generatepress-parent' ), wp_get_theme()->get( 'Version' ) );
} );

add_action( 'init', function () {
	register_block_pattern_category( 'psycholog-shmidt', array( 'label' => 'Психолог Юнона Шмидт' ) );
} );

add_filter( 'body_class', function ( $classes ) {
	if ( is_front_page() ) { $classes[] = 'ys-home'; }
	return $classes;
} );

add_filter( 'generate_show_title', function ( $show_title ) {
	return ( is_front_page() && is_page() ) ? false : $show_title;
} );

add_action( 'wp', function () {
	if ( is_front_page() ) {
		remove_action( 'generate_header', 'generate_construct_header' );
		remove_action( 'generate_footer', 'generate_construct_footer' );
	}
} );

add_action( 'generate_header', function () {
	if ( ! is_front_page() ) { return; }
	?>
	<header class="ys-header"><div class="ys-shell ys-header__inner">
		<a class="ys-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		<details class="ys-nav"><summary>Меню</summary><nav aria-label="Главная навигация"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => false ) ); ?></nav></details>
	</div></header>
	<?php
} );

add_action( 'generate_footer', function () {
	if ( ! is_front_page() ) { return; }
	?>
	<footer class="ys-footer"><div class="ys-shell ys-footer__inner">
		<div><a class="ys-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a><p><?php bloginfo( 'description' ); ?></p></div>
		<nav aria-label="Навигация в подвале"><?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'fallback_cb' => false ) ); ?></nav>
		<p class="ys-footer__legal">© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
	</div></footer>
	<?php
} );
