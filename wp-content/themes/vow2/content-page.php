<?php
/**
 * The template used for displaying page content in page.php
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		

		<?php
		$content = get_the_content();
		
		if (strpos($content,'[vc_row]') === false) {
		    echo '<div class="container">';
		}
		?>
		<?php the_content(); ?>
		<?php
		if (strpos($content,'[vc_row]') === false) {
		    echo '</div>';
		}
		?>	
			
		
		
	</article><!-- #post -->
