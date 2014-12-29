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
  <div class="span12">
  	<?php if(get_post_format( $post->ID ) == 'video') { ?>
  		<?php echo vow_video(); ?>
  	<?php } else { 
  		if(get_post_meta($post->ID, 'vow_portfolio_gallery', true)!='') {
  		?>
  		<div id="slider-nivo" class="bottom">
	      <?php echo vow_get_gallery(get_post_meta($post->ID, 'vow_portfolio_gallery', true),'portfolio-big'); ?>
	    </div>  

  	<?php } 
  	} ?>
             
  </div>
</div>
<div class="row spacer30"></div>

<div class="blog-container-text"> <!-- blog container -->
<div class="row">
  <div class="span12">
    <div class="blog-title">
      <?php if(get_post_format( $post->ID ) == 'image') { ?>
      	<i class="icon-picture"></i> 
      <?php } 
        elseif(get_post_format( $post->ID ) == 'video') { ?>
        	<i class="icon-film"></i>
        <?php } 
        elseif(get_post_format( $post->ID ) == 'quote') { ?>
        	<i class="icon-quote-right"></i>
        <?php }
    	else { ?>
    		<i class="icon-pencil"></i>
    	<?php } ?>
      <h1><?php the_title(); ?><span class="blog-date"><?php echo get_the_date(); ?></span></h1>
      <h5><?php echo vow_show_category_links($post->ID); ?></h5>
    </div>
  </div>
</div>

<div class="row">
  <div class="span12">
    <div class="blog-text">
      <?php the_content(); ?>
    </div>
  </div>
</div>

</div><!-- blog container end -->

<div class="blog-container-pagging"> <!-- blog container -->
<div class="row">
  <div class="span12">
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
</div>
</div>


	<?php if (comments_open($post->ID)){ ?>
		<?php comments_template( '', true ); ?>
	<?php } ?>

