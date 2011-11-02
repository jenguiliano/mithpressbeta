<?php get_header(); ?>

<div id="page-container">
		<div id="primary" class="width-limit">
<!--start subnav -->
		  <?php get_sidebar('left'); ?>
<!--end sidebar / start single project content-->
			<div id="content" role="main" class="span-10 last">
			
			<?php if (function_exists('mithpress_breadcrumbs')) mithpress_breadcrumbs(); ?>
			
			<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'project-detail' ); ?>
	
				<?php endwhile; // end of the loop. ?>
                    
                    <!-- start #nav-single 
        			<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'mithpress' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav"></span> Previous', 'mithpress' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav"></span>', 'mithpress' ) ); ?></span>
					</nav>
                    <!-- end #nav-single -->
<!-- start sidebar -->
		<?php get_sidebar('project'); ?>
<!-- end sidebar -->
		</div>
<!-- end #content -->
	</div>
<!--end #primary/post -->    
<div class="clear"></div>
</div>
<!-- end page / start footer -->

<?php get_footer(); ?>