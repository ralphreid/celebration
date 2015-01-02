<div class="row">
    <div class="span8"><h2><?php the_title(); ?></h2></div>
    <div class="span4">
        <!-- breadcrumb -->
        <?php if(function_exists('bcn_display'))
          {
            echo '<ul class="breadcrumb">';
              bcn_display();
              echo '</ul>';
          }?>
      </div>
  </div>
<div class="row">
	<div class="span9">
		<?php if(get_post_format( $post->ID ) == 'video') { ?>
			<div class="border-top"></div>  
	  		<?php echo vow_video(); ?>
	  	<?php } else { 
	  		if(get_post_meta($post->ID, 'vow_portfolio_gallery', true)!='') {
	  		?>
	  		<div class="border-top"></div>  
	  		<div id="slider-nivo" class="bottom">
		      <?php echo vow_get_gallery(get_post_meta($post->ID, 'vow_portfolio_gallery', true),'portfolio-big'); ?>
		    </div>  

	  	<?php } 
	  	} ?>
	  	<div class="row spacer30"></div>

		<div class="blog-container-text"> <!-- blog container -->
		 
		    <div class="blog-title">        
		      <i class="icon-picture icon-2x"></i> 
		      <h1><?php the_title(); ?><span class="blog-date"><?php echo get_the_date(); ?></span></h1>
		      <h5><?php echo vow_show_category_links($post->ID); ?></h5>
		    </div>



		    <div class="blog-text">
		      <?php the_content(); ?>
		    </div>

		</div><!-- blog container end -->


		<div class="blog-container-pagging"> <!-- blog container -->
		    <div class="blog-container-blog-list">
		      <a href="<?php echo get_permalink( get_option('page_for_posts' ) ); ?>"><i class="icon-angle-left"></i> <?php printf( __('Back to blog list', 'vow')); ?></a> 
		    </div>
		    <div class="blog-container-pagging-next">
		      <?php next_post_link('%link', '<i class="icon-angle-right"></i>'); ?>
		    </div>      
		    <div class="blog-container-pagging-prev">
		      <?php previous_post_link('%link', '<i class="icon-angle-left"></i>'); ?>
		    </div>
		</div>

		<?php if (comments_open($post->ID)){ ?>
			<?php comments_template( '', true ); ?>
		<?php } ?>

	</div>

	<div class="span3 sidebar">  <!-- sidebar -->
		<?php get_sidebar(); ?>
	</div>
</div>

