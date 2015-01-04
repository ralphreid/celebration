<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage vow
 * @since vow 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div class="container">
		    <div class="row spacer100"></div>
		    <div class="row">
		      <div class="col-md-12">
		        <h2 class="center">Oops, page not found</h2>
		      </div>
		     </div>
		     <div class="row">    
		      <div class="col-md-4 col-md-offset-4">

		        <?php get_search_form(); ?>

		      </div>    
		    </div>
		    <div class="row spacer100"></div>
		</div>       
	</div><!-- #primary -->

<?php get_footer(); ?>