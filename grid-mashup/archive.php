<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="page-header archive-header">
				<h1 class="page-header-title archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'wpex' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'wpex' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'wpex' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'wpex' ), get_the_date( _x( 'Y', 'yearly archives date format', 'wpex' ) ) );
					else :
						echo single_term_title();
					endif;
				?></h1>
                <div class="archive-description"><?php echo term_description(); ?></div>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
            
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