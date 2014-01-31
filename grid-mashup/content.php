<?php
/**
 * The default template for displaying content. Used for both single and index/archive.
 *
 * @package WordPress
 * @subpackage grid-mashup
 * @since grid-mashup 1.0
 */
 
 

/******************************************************
 * Single Posts
 * @since 1.0
*****************************************************/

if ( is_singular() && is_main_query() ) {
     
	if ( of_get_option('blog_single_thumbnail' ) == '1' && has_post_thumbnail() ) { ?>
    	<div>
	    	<div id="post-thumbnail">
				<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_post_width'),  wpex_img('blog_post_height'),  wpex_img('blog_post_crop') ) ?>" alt="<?php echo the_title(); ?>" />
				
	        </div>
	        <div class="pinbin-author"><p><?php echo get_post(get_post_thumbnail_id())->post_content; ?></p></div>
        </div> 
        <!-- #post-thumbnail -->
	<?php }

}

/******************************************************
 * Entries
 * @since 1.0
*****************************************************/
else { ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('loop-entry clr articolo'); ?>>
    
		<?php if ( has_post_thumbnail() ) { ?>
            <div>
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="loop-entry-img-link">
                <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_entry_width'),  wpex_img('blog_entry_height'),  wpex_img('blog_entry_crop') ) ?>" alt="<?php echo the_title(); ?>" />
            </a>
            </div>
            <div class="pinbin-category"><p><?php the_category(', ') ?></p></div> 
        <?php } ?>
        
        <div class="loop-entry-details">
           
            <header>
            	<h2>
            		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
            	</h2>
            </header>

			<div id="dettaglio-post">
				<p class="pinbin-date"><?php the_time(get_option('date_format')); if (!has_post_thumbnail()) {echo(" - "); the_category(', ');} ?></p>
				<p class="loop-entry-excerpt"><?php the_excerpt(); ?></p>
				<p id="ciccio" class="pinbin-link"><a href="<?php the_permalink() ?>">&rarr;</a></p>
			</div>
            
            
        </div><!-- .loop-entry-details -->
        
        
    </article><!-- .loop-entry-entry -->

<?php } ?>










