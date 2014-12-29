<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>
<?php the_post_thumbnail('listing'); ?>
<div class="blog">
    <div class="blog-text-2">
      <?php if(!is_single()) { ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php } ?>
      <h6><?php echo get_the_date(); ?> <?php _e('by', 'vow'); ?> <?php echo get_the_author(); ?></h6>
      <?php the_content(); ?>
      <?php if(is_single()) { ?>
          <div class="blog-container-pagging"> <!-- blog container -->
              <div class="blog-container-pagging-next">
                <?php next_post_link('%link', __('Next post <i class="fa fa-angle-right"></i>', 'vow')); ?>
              </div>      
              <div class="blog-container-pagging-prev">
                <?php previous_post_link('%link', __('<i class="fa fa-angle-left"></i> Previous post', 'vow')); ?>
              </div>
          </div>
      <?php } ?>
    </div>  
    

    <?php if (comments_open($post->ID)){ ?>
        <?php comments_template( '', true ); ?>
    <?php } ?>             
</div>

