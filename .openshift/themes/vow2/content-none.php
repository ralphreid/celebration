<?php
/**
 * The template for displaying a "No posts found" message.
 */
?>

	<div id="post-0" class="post no-results not-found">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'vow' ); ?></h1>
			
			<div class="entry-content">
				<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'vow' ); ?></p>
				<div class="search-none">
					<?php get_search_form(); ?>
				</div>
			</div><!-- .entry-content -->
		
	</div><!-- #post-0 -->
