<?php
global $entiri_opt;
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

	
			<div class="container">
				<div class="row space30"></div>
			      <div class="row">
			        <div class="col-md-8">
			          <h1><?php printf( __( 'Category Archives: %s', 'vow' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
			        </div>
			        <div class="col-md-4">
			          <?php if(function_exists('bcn_display'))
					    {
					    	echo '<ul class="breadcrumb">';
					        bcn_display();
					        echo '</ul>';
					    } ?>
			        </div>      
			      </div>
			      <div class="row space30"></div>
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