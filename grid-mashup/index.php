<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage grid-mashup
 * @since grid-mashup 1.0
 */

get_header(); ?>
    
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