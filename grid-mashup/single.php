<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage grid-mashup
 * @since grid-mashup 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( !post_password_required() ) : ?>           
	<?php get_template_part('content', get_post_format() ); ?>            
	<?php endif; ?>
    
    <div id="primary" class="content-area clr">
		<div id="content" class="site-content boxed" role="main">
        
            <header class="post-header">
                 
                 <div class="entry-author entry-author-side">
	                 <div id="bloccoautore">
		                 <div class="author-avatar">
			                 <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
			             </div><!-- .author-avatar -->
			             <div class="author-description">
				             <p><?php the_author_posts_link(); ?></p>
			             </div>
	                 </div>
			     
				     <ul class="meta single-meta clr">
	                    <li><i class="icon-time"></i><?php the_date(); ?></li>    
	                    <li><i class="icon-folder-open"></i><?php the_category(' / '); ?></li>
	                    <li id="admininlista"><i class="icon-user"></i><?php the_author_posts_link(); ?></li>
	                </ul><!-- .meta -->
			     
	                <div style="clear:both"></div>
	                
                </div><!-- .entry-author -->
                
                <h1 class="post-header-title"><?php the_title(); ?></h1>
               
            </header><!-- .post-header -->
            
            <article class="textcontent entry clr">
                <?php the_content(); ?>
            </article><!-- /entry -->
            
           <?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            
            <?php if ( of_get_option('blog_tags', '1' ) =='1' ) : ?>
				<?php the_tags('<div class="post-tags clr">','','</div>'); ?>
			<?php endif; ?>
    
            <div class="entry-comment">
                <a class="toggle-comments" id="show_comments" href="#comments"><?php _e( 'Show Comments', 'wpmedium' ); ?></a>
                <a class="toggle-comments" id="hide_comments" href="#comments"><?php _e( 'Hide Comments', 'wpmedium' ); ?></a>
                <?php comments_template(); ?>
            </div>
            
		</div><!-- #content -->
        
         <nav class="single-nav clr"> 
			<?php next_post_link('<div class="single-nav-left col span_12 clr-margin">%link</div>', '&larr; %title', false); ?>
			<?php previous_post_link('<div class="single-nav-right col span_12">%link</div>', '%title &rarr;', false); ?>
		</nav><!-- .page-header-title --> 
                
	</div><!-- #primary -->

<?php endwhile; ?>

<?php get_footer(); ?>