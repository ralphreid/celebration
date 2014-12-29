<?php
global $entiri_opt;
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 */
?>
        
        
    
    
    <!-- Footer -->
    <?php //print_r($entiri_opt); ?>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <hr class="dark">
              <p class="center"><?php echo $entiri_opt['copyright_text']; ?></p>
          </div>
        </div>

      <div class="row">
        <div class="col-md-12">
          <div class="circle-2">
            <div class="table-cell">
              <h2 class="fittext2"><?php echo $entiri_opt['footer_top_text']; ?></h2>
              <h1 class="fittext1"><?php echo $entiri_opt['footer_bottom_text']; ?></h1>
            </div>
          </div> 
        </div>
      </div>  


      </div>
    </footer>
    <!-- Footer End -->
    
<?php wp_footer(); ?>
</body>
</html>