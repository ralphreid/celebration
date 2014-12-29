<?php
function vow_load_required() {

	$home_url = esc_url( home_url( '/' ) );

	if(get_term_by( 'name', 'Main', 'nav_menu' ) == false) {

	$menu_item1 = wp_insert_post(array(
	    'post_title'    => 'Home',
	    'post_type' 	=> 'nav_menu_item',
	    'post_content'  => '',
	    'post_excerpt'  => 'Home',
	    'menu_order'    => 0,
	    'post_status'   => 'publish',
	    'post_author'   => 1
	));
	update_post_meta($menu_item1,'_menu_item_subtitle','fa-home');
	update_post_meta($menu_item1,'_menu_item_type','custom');
	update_post_meta($menu_item1,'_menu_item_object','custom');
	update_post_meta($menu_item1,'_menu_item_url', $home_url.'#home');
	

	$menu_item2 = wp_insert_post(array(
	    'post_title'    => 'About',
	    'post_type' 	=> 'nav_menu_item',
	    'post_content'  => '',
	    'post_excerpt'  => 'About',
	    'menu_order'    => 1,
	    'post_status'   => 'publish',
	    'post_author'   => 1
	));
	update_post_meta($menu_item2,'_menu_item_subtitle','fa-heart');
	update_post_meta($menu_item2,'_menu_item_type','custom');
	update_post_meta($menu_item2,'_menu_item_object','custom');
	update_post_meta($menu_item2,'_menu_item_url', $home_url.'#about');

	$menu_item3 = wp_insert_post(array(
	    'post_title'    => 'Location',
	    'post_type' 	=> 'nav_menu_item',
	    'post_content'  => '',
	    'post_excerpt'  => 'Location',
	    'menu_order'    => 2,
	    'post_status'   => 'publish',
	    'post_author'   => 1
	));
	update_post_meta($menu_item3,'_menu_item_subtitle', 'fa-map-marker');
	update_post_meta($menu_item3,'_menu_item_type','custom');
	update_post_meta($menu_item3,'_menu_item_object','custom');
	update_post_meta($menu_item3,'_menu_item_url', $home_url.'#location');

	$menu_item4 = wp_insert_post(array(
	    'post_title'    => 'Gifts',
	    'post_type' 	=> 'nav_menu_item',
	    'post_content'  => '',
	    'post_excerpt'  => 'Gifts',
	    'menu_order'    => 3,
	    'post_status'   => 'publish',
	    'post_author'   => 1
	));
	update_post_meta($menu_item4,'_menu_item_subtitle', 'fa-gift');
	update_post_meta($menu_item4,'_menu_item_type','custom');
	update_post_meta($menu_item4,'_menu_item_object','custom');
	update_post_meta($menu_item4,'_menu_item_url', $home_url.'#gifts');

	$menu_item5 = wp_insert_post(array(
	    'post_title'    => 'Tableware',
	    'post_type' 	=> 'nav_menu_item',
	    'post_content'  => '',
	    'post_excerpt'  => 'Tableware',
	    'menu_order'    => 4,
	    'post_status'   => 'publish',
	    'post_author'   => 1
	));
	update_post_meta($menu_item5,'_menu_item_subtitle', 'fa-cutlery');
	update_post_meta($menu_item5,'_menu_item_type','custom');
	update_post_meta($menu_item5,'_menu_item_object','custom');
	update_post_meta($menu_item5,'_menu_item_url', $home_url.'#tableware');

	$menu_item6 = wp_insert_post(array(
	    'post_title'    => 'Gallery',
	    'post_type' 	=> 'nav_menu_item',
	    'post_content'  => '',
	    'post_excerpt'  => 'Gallery',
	    'menu_order'    => 5,
	    'post_status'   => 'publish',
	    'post_author'   => 1
	));
	update_post_meta($menu_item6,'_menu_item_subtitle', 'fa-camera-retro');
	update_post_meta($menu_item6,'_menu_item_type','custom');
	update_post_meta($menu_item6,'_menu_item_object','custom');
	update_post_meta($menu_item6,'_menu_item_url', $home_url.'#gallery');

	$menu_item7 = wp_insert_post(array(
	    'post_title'    => 'Blog',
	    'post_type' 	=> 'nav_menu_item',
	    'post_content'  => '',
	    'post_excerpt'  => 'Blog',
	    'menu_order'    => 6,
	    'post_status'   => 'publish',
	    'post_author'   => 1
	));
	update_post_meta($menu_item7,'_menu_item_subtitle', 'fa-pencil');
	update_post_meta($menu_item7,'_menu_item_type','custom');
	update_post_meta($menu_item7,'_menu_item_object','custom');
	update_post_meta($menu_item7,'_menu_item_url', $home_url.'#blog');

	$menu_item8 = wp_insert_post(array(
	    'post_title'    => 'Contact',
	    'post_type' 	=> 'nav_menu_item',
	    'post_content'  => '',
	    'post_excerpt'  => 'Contact',
	    'menu_order'    => 7,
	    'post_status'   => 'publish',
	    'post_author'   => 1
	));
	update_post_meta($menu_item8,'_menu_item_subtitle', 'fa-comment');
	update_post_meta($menu_item8,'_menu_item_type','custom');
	update_post_meta($menu_item8,'_menu_item_object','custom');
	update_post_meta($menu_item8,'_menu_item_url', $home_url.'#contact');

	$menu = wp_insert_term( 'Main' , 'nav_menu' );

	wp_set_object_terms( $menu_item1, $menu, 'nav_menu' );
	wp_set_object_terms( $menu_item2, $menu, 'nav_menu' );
	wp_set_object_terms( $menu_item3, $menu, 'nav_menu' );
	wp_set_object_terms( $menu_item4, $menu, 'nav_menu' );
	wp_set_object_terms( $menu_item5, $menu, 'nav_menu' );
	wp_set_object_terms( $menu_item6, $menu, 'nav_menu' );
	wp_set_object_terms( $menu_item7, $menu, 'nav_menu' );
	wp_set_object_terms( $menu_item8, $menu, 'nav_menu' );

	$locations = get_theme_mod('nav_menu_locations');
	$locations['primary'] = $menu['term_id'];
	set_theme_mod( 'nav_menu_locations', $locations );
	
	}

}
add_action("after_switch_theme", "vow_load_required", 10 ,  2);
?>