<?php
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */

get_header(); ?>

	<header class="page-header archive-header">
		<h1 class="page-header-title archive-title"><?php echo single_cat_title( '', false ); ?></h1>
		<?php if ( category_description() ) : // Show an optional category description ?>
		<div class="archive-meta"><?php echo category_description(); ?></div>
		<?php endif; ?>
	</header><!-- .archive-header -->

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

            <div id="infinite-wrap" class="grid clr">

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
            
            </div><!-- .grid -->

			<?php wpex_pagination(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>