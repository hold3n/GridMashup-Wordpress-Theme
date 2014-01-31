<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title><?php wp_title(''); ?><?php if( wp_title('', false) ) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<!-- Begin Body -->
<body <?php body_class('body'); ?>>

    <div id="wrap" class="container clr">
    
    	<div class="container-left clr">
    
        <header id="masthead" class="site-header clr" role="banner">
            <div class="logo">
                <?php if ( of_get_option('custom_logo') ) { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo of_get_option('custom_logo'); ?>" alt="<?php get_bloginfo( 'name' ) ?>" /></a>
                <?php } else { ?>
                    <?php if ( is_front_page() ) { ?>
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h1>
                    <?php } else { ?>
                    <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
                    <?php }
					if ( get_bloginfo('description') ) {
						echo '<p class="site-description">'. get_bloginfo('description') .'</p>';
					} ?>
                    <?php } ?>
            </div><!-- .logo -->
        </header><!-- .header -->  
    
    	<a href="javascript: void(0)" id="toggle-btn"><i class="icon-reorder"></i></a>
    	<div id="toggle-wrap" class="clr">
            <div id="navbar" class="navbar clr">
                <nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'main_menu',
                        'sort_column' => 'menu_order',
                        'menu_class' => 'nav-menu dropdown-menu',
                        'fallback_cb' => false ) ); ?>
                </nav><!-- #site-navigation -->
                <?php wpex_display_social(); ?>
            </div><!-- #navbar -->
            
            <?php get_sidebar(); ?>
        </div><!--#toogle-wrap -->
        
	</div><!-- .left-container clr -->
        
    <div id="main" class="container-right site-main row clr fitvids">