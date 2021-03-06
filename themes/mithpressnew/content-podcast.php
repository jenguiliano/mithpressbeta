<?php
/**
 * The template for displaying content for single podcasts
 *
**/
    global $podcast_mb;
	$podcast_mb->the_meta();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title append-bottom prepend-top"><?php the_title(); ?></h1>
	</header>
    <!-- /entry-header -->

	<div class="entry-content">
		<div id="podcast-info" class="append-bottom prepend-top clear">
			<?php the_post_thumbnail( 'bio-image' ); ?>
			<span class="pods-speaker"><?php echo $podcast_mb->the_value('speaker'); ?></span> 
        	<span class="pods-affiliation"><?php echo $podcast_mb->the_value('affiliation'); ?></span>
			<span class="pods-date"><?php the_date( 'F j, Y' ); ?></span>
        </div><!-- /#podcast-info -->
        
        <div id="abstract">
			<?php the_content(); ?>
        </div><!-- /#abstract -->
        
        <div id="media-links" class="column left">
        <h2 class="column-title">Downloads</h2>
        <ul>
            <li><a href="#">Link One</a></li>
            <li><a href="#">Link One</a></li>
        </ul>
        </div><!-- /#media-links--> 
	</div><!-- .entry-content -->
    <br clear="all" />
	<?php edit_post_link( __( 'Edit', 'mithpress' ), '<div class="edit-link">', '</div>' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->