<?php
global $entiri_opt;
?>
<!DOCTYPE html>

<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="<?php echo get_template_directory_uri(); ?>/img/vow-favicon.png" rel="icon" type="image/png">
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!--[if IE 7]>
<link href="css/font-awesome/font-awesome-ie7.min.css" rel="stylesheet">
<![endif]-->

<!-- Internet Explorer condition - HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->   
<?php wp_head(); ?>
	
</head>       
<body <?php body_class(); ?>>
	<?php custom_style(); ?>
	<div id="loading-wrap">
		<div class="spinner">
	      <div class="bounce1"></div>
	      <div class="bounce2"></div>
	      <div class="bounce3"></div>
	    </div>
	</div>
	<div class="color-picker">
		<a href="#" class="handle"><i class="fa fa-cog"></i></a>
		<div class="settings-header">
			<h3>Setting panel</h3>
			<span>set your favourite style</span>
		</div>
		<div class="section">
			<h4 class="color"><i class="fa fa-tint"></i> Color schemes:</h4>
			<div class="colors">
        <a href="#" class="color-1" ></a>
        <a href="#" class="color-2" ></a>
        <a href="#" class="color-3" ></a>
        <a href="#" class="color-4" ></a>
        <a href="#" class="color-5" ></a>
        <a href="#" class="color-6" ></a>        
        <a href="#" class="color-7" ></a>  
        <a href="#" class="color-8" ></a>  
			<div style="clear:both;"></div>
			</div>
		</div>
	</div>
	<!-- Header -->	
	<header id="home" class="home-video">
		<!-- Full Screen Video -->
			 <div id="P3" class="player video-container" data-property="{videoURL:'6DtLfX1aQdY',containment:'.home-video',autoPlay:true, mute:false, startAt:0, opacity:1}"></div>
			 <!-- End Video -->
		
	    <div class="container">
		  <div class="row">
		    <div class="col-md-12">
		      <div class="circle">
		        <div class="table-cell">
		          <h1 class="fittext1"><?php echo $entiri_opt['top_text']; ?></h1> <!-- Change for your names -->
		          <h2 class="fittext2"><?php echo $entiri_opt['middle_text']; ?></h2>  <!-- Your own slogan here -->
		          <h3 class="fittext3"><?php echo $entiri_opt['bottom_text']; ?></h3>  <!-- Your own slogan here -->
		        </div>
		      </div> 
		    </div> 
		  </div>
		</div>
		<div class="navbar">
	      <div class="navbar-inner">
	          <div class="container">   
		<?php wp_nav_menu(array('theme_location'=>'primary','container'=>false,'menu_class'=>'nav', 'walker' => new rc_scm_walker
)); ?>    
		          
		          <?php
		          if (is_front_page()) {
		          	$class = 'select-menu-home';
		          }
		          else {
		          	$class = 'select-menu-page';
		          }
		          ?>
		          <select class="select-menu <?php echo $class; ?>"></select>
	          </div>
	      </div>
	    </div>
	</header>



	<!-- Content -->
	
	
		