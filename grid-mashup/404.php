<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area span_16 col clr-margin">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not found', 'wpex' ); ?></h1>
			</header><!-- .page-header -->

			<div id="error-page" class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'wpex' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location.?', 'wpex' ); ?></p>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>