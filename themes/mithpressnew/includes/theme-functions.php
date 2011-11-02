<?php
/*-----------------------------------------------------------------------------------

TABLE OF CONTENTS

- 
- 

-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Thumbnail Support */
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'post-thumbnails' );

function mithpress_thumbnails() {
	//update_option('thumbnail_size_w', 290);
    //update_option('thumbnail_size_h', 290);
    add_image_size( 'mini-thumbnail', 50, 50, true );
    add_image_size( 'slide', 640, 290, true );

}
add_action( 'init', 'mithpress_thumbnails' );


/*-----------------------------------------------------------------------------------*/
/* Nav Menus Support */
/*-----------------------------------------------------------------------------------*/

if ( function_exists('wp_nav_menu') ) {
	add_theme_support( 'nav-menus' );
		register_nav_menus( array( 
		'main-menu' => __( 'Main Menu' ), 
		'about-menu' => __( 'About Menu' ),
		'research-menu' => __( 'Research Menu' ),
		'community-menu' => __( 'Community Menu' ),
		'staff-menu' => __( 'Staff Menu' ),
		'digital-dialogues-menu' => __( 'Digital Dialogues Menu'),
		'footer-textlinks' => __( 'Footer Text Links ' ),
		'footer-menu' => __( 'Footer Menu' )
	)
  );
}     

/*-----------------------------------------------------------------------------------*/
/* Misc */
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'automatic-feed-links' );



/*-----------------------------------------------------------------------------------*/
/* Post navigation */
/*-----------------------------------------------------------------------------------*/
function mithpress_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="post-navigation clear">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'mithpress' ); ?></h3>
                <?php
                    $prev_post = get_adjacent_post(false, '', true);
                    $next_post = get_adjacent_post(false, '', false); ?>
                    <?php if ($prev_post) : $prev_post_url = get_permalink($prev_post->ID); $prev_post_title = $prev_post->post_title; ?>
                        <a class="post-prev" href="<?php echo $prev_post_url; ?>"><em>Previous post</em><span><?php echo $prev_post_title; ?></span></a>
                    <?php endif; ?>
                    <?php if ($next_post) : $next_post_url = get_permalink($next_post->ID); $next_post_title = $next_post->post_title; ?>
                        <a class="post-next" href="<?php echo $next_post_url; ?>"><em>Next post</em><span><?php echo $next_post_title; ?></span></a>
                    <?php endif; ?>
                <div class="line"></div>
            </div>
            
		</nav><!-- #nav-below-->
	<?php endif;
}

/*-----------------------------------------------------------------------------------*/
/* Post Meta */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('woo_post_meta')) {
	function woo_post_meta( ) {
?>
<p class="post-meta">
    <span class="post-author"><span class="small"><?php _e('by', 'woothemes') ?></span> <?php the_author_posts_link(); ?></span>
    <span class="post-date"><span class="small"><?php _e('on', 'woothemes') ?></span> <?php the_time( get_option( 'date_format' ) ); ?></span>
    <span class="post-category"><span class="small"><?php _e('in', 'woothemes') ?></span> <?php the_category(', ') ?></span>
    <?php edit_post_link( __('{ Edit }', 'woothemes'), '<span class="small">', '</span>' ); ?>
</p>
<?php 
	}
}

/* Prints HTML with meta information for the current post-date/time and author. */
if ( ! function_exists( 'mithpress_posted_on' ) ) :
function mithpress_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'mithpress' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'mithpress' ), get_the_author() ),
		esc_html( get_the_author() )
	);
}
endif;

/*-----------------------------------------------------------------------------------*/
/* WooTabs - Latest Posts */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('woo_tabs_latest')) {
	function woo_tabs_latest( $posts = 5, $size = 35 ) {
		global $post;
		$latest = get_posts('showposts='. $posts .'&orderby=post_date&order=desc');
		foreach($latest as $post) :
			setup_postdata($post);
	?>
	<li>
		<?php if ($size <> 0) woo_image('height='.$size.'&width='.$size.'&class=thumbnail&single=true'); ?>
		<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		<span class="meta"><?php the_time( get_option( 'date_format' ) ); ?></span>
		<div class="fix"></div>
	</li>
	<?php endforeach; 
	}
}

/*-----------------------------------------------------------------------------------*/
/* Nav Menus Support */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Recent Posts Widgets */
/*-----------------------------------------------------------------------------------*/

?>