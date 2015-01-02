<?php
global $entiri_opt;
/**
 * The Template for displaying all single posts.
 */
get_header(); ?>

<div class="container">
	<div class="row space30"></div>
      <div class="row">
        <div class="col-md-12">
          <h1>
          	<?php while ( have_posts() ) : the_post(); ?>
	          	<?php the_title(); ?>
	        <?php endwhile; // end of the loop. ?>
          </h1>
        </div> 
      </div>
	<?php
	if($entiri_opt['blog-template'] == 'left_sidebar' || (isset($_GET['template']) && $_GET['template'] == 'left_sidebar')) { 
		load_template(TEMPLATEPATH . '/blog-left_sidebar.php');
	}
	elseif ($entiri_opt['blog-template'] == 'full_width'  || (isset($_GET['template']) && $_GET['template'] == 'full_width')) {
		load_template(TEMPLATEPATH . '/blog-full_width.php');
	}
	elseif ($entiri_opt['blog-template'] == 'right_sidebar'  || (isset($_GET['template']) && $_GET['template'] == 'right_sidebar')) {
		load_template(TEMPLATEPATH . '/blog-right_sidebar.php');
	}
	?>
	<?php 
		vow_content_nav( 'nav-below' );
	?>
</div>


<?php get_footer(); ?>