<?php


/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function start_lvl(&$output, $depth = 0, $args = array()) {	
	}
	
	/**
	 * @see Walker_Nav_Menu::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function end_lvl(&$output, $depth = 0, $args = array()) {
	}
	
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */
	function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0) {
	    global $_wp_nav_menu_max_depth;
	   
	    $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
	
	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
	    ob_start();
	    $item_id = esc_attr( $object->ID );
	    $removed_args = array(
	        'action',
	        'customlink-tab',
	        'edit-menu-item',
	        'menu-item',
	        'page-tab',
	        '_wpnonce',
	    );
	
	    $original_title = '';
	    if ( 'taxonomy' == $object->type ) {
	        $original_title = get_term_field( 'name', $object->object_id, $object->object, 'raw' );
	        if ( is_wp_error( $original_title ) )
	            $original_title = false;
	    } elseif ( 'post_type' == $object->type ) {
	        $original_object = get_post( $object->object_id );
	        $original_title = $original_object->post_title;
	    }
	
	    $classes = array(
	        'menu-item menu-item-depth-' . $depth,
	        'menu-item-' . esc_attr( $object->object ),
	        'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
	    );
	
	    $title = $object->title;
	
	    if ( ! empty( $object->_invalid ) ) {
	        $classes[] = 'menu-item-invalid';
	        /* translators: %s: title of menu item which is invalid */
	        $title = sprintf( __( '%s (Invalid)' ), $object->title );
	    } elseif ( isset( $object->post_status ) && 'draft' == $object->post_status ) {
	        $classes[] = 'pending';
	        /* translators: %s: title of menu item in draft status */
	        $title = sprintf( __('%s (Pending)'), $object->title );
	    }
	
	    $title = empty( $object->label ) ? $title : $object->label;
	
	    ?>
	    <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
	        <dl class="menu-item-bar">
	            <dt class="menu-item-handle">
	                <span class="item-title"><?php echo esc_html( $title ); ?></span>
	                <span class="item-controls">
	                    <span class="item-type"><?php echo esc_html( $object->type_label ); ?></span>
	                    <span class="item-order hide-if-js">
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-up-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'vow'); ?>">&#8593;</abbr></a>
	                        |
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-down-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'vow'); ?>">&#8595;</abbr></a>
	                    </span>
	                    <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item', 'vow'); ?>" href="<?php
	                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
	                    ?>"><?php _e( 'Edit Menu Item', 'vow' ); ?></a>
	                </span>
	            </dt>
	        </dl>
	
	        <div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
	            <?php if( 'custom' == $object->type ) : ?>
	                <p class="field-url description description-wide">
	                    <label for="edit-menu-item-url-<?php echo $item_id; ?>">
	                        <?php _e( 'URL', 'vow' ); ?><br />
	                        <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->url ); ?>" />
	                    </label>
	                </p>
	            <?php endif; ?>
	            <p class="description description-thin">
	                <label for="edit-menu-item-title-<?php echo $item_id; ?>">
	                    <?php _e( 'Navigation Label', 'vow' ); ?><br />
	                    <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->title ); ?>" />
	                </label>
	            </p>
	            <p class="description description-thin">
	                <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
	                    <?php _e( 'Title Attribute', 'vow' ); ?><br />
	                    <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->post_excerpt ); ?>" />
	                </label>
	            </p>
	            <p class="field-link-target description">
	                <label for="edit-menu-item-target-<?php echo $item_id; ?>">
	                    <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $object->target, '_blank' ); ?> />
	                    <?php _e( 'Open link in a new window/tab', 'vow' ); ?>
	                </label>
	            </p>
	            <p class="field-css-classes description description-thin">
	                <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
	                    <?php _e( 'CSS Classes (optional)', 'vow' ); ?><br />
	                    <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $object->classes ) ); ?>" />
	                </label>
	            </p>
	            <p class="field-xfn description description-thin">
	                <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
	                    <?php _e( 'Link Relationship (XFN)', 'vow' ); ?><br />
	                    <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->xfn ); ?>" />
	                </label>
	            </p>
	            <p class="field-description description description-wide">
	                <label for="edit-menu-item-description-<?php echo $item_id; ?>">
	                    <?php _e( 'Description', 'vow' ); ?><br />
	                    <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $object->description ); // textarea_escaped ?></textarea>
	                    <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'vow'); ?></span>
	                </label>
	            </p>        
	            <?php
	            /* New fields insertion starts here */
	            
				$fontawesome_icons[] = "fa-area-chart";
				$fontawesome_icons[] = "fa-at";
				$fontawesome_icons[] = "fa-bell-slash";
				$fontawesome_icons[] = "fa-bell-slash-o";
				$fontawesome_icons[] = "fa-bicycle";
				$fontawesome_icons[] = "fa-binoculars";
				$fontawesome_icons[] = "fa-birthday-cake";
				$fontawesome_icons[] = "fa-bus";
				$fontawesome_icons[] = "fa-calculator";
				$fontawesome_icons[] = "fa-cc";
				$fontawesome_icons[] = "fa-cc-amex";
				$fontawesome_icons[] = "fa-cc-discover";
				$fontawesome_icons[] = "fa-cc-mastercard";
				$fontawesome_icons[] = "fa-cc-paypal";
				$fontawesome_icons[] = "fa-cc-stripe";
				$fontawesome_icons[] = "fa-cc-visa";
				$fontawesome_icons[] = "fa-copyright";
				$fontawesome_icons[] = "fa-eyedropper";
				$fontawesome_icons[] = "fa-futbol-o";
				$fontawesome_icons[] = "fa-google-wallet";
				$fontawesome_icons[] = "fa-ils";
				$fontawesome_icons[] = "fa-ioxhost";
				$fontawesome_icons[] = "fa-lastfm";
				$fontawesome_icons[] = "fa-lastfm-square";
				$fontawesome_icons[] = "fa-line-chart";
				$fontawesome_icons[] = "fa-meanpath";
				$fontawesome_icons[] = "fa-newspaper-o";
				$fontawesome_icons[] = "fa-paint-brush";
				$fontawesome_icons[] = "fa-paypal";
				$fontawesome_icons[] = "fa-pie-chart";
				$fontawesome_icons[] = "fa-plug";
				$fontawesome_icons[] = "fa-shekel";
				$fontawesome_icons[] = "fa-sheqel";
				$fontawesome_icons[] = "fa-slideshare";
				$fontawesome_icons[] = "fa-soccer-ball-o";
				$fontawesome_icons[] = "fa-toggle-off";
				$fontawesome_icons[] = "fa-toggle-on";
				$fontawesome_icons[] = "fa-trash";
				$fontawesome_icons[] = "fa-tty";
				$fontawesome_icons[] = "fa-twitch";
				$fontawesome_icons[] = "fa-wifi";
				$fontawesome_icons[] = "fa-yelp";
				$fontawesome_icons[] = "fa-adjust";
				$fontawesome_icons[] = "fa-anchor";
				$fontawesome_icons[] = "fa-archive";
				$fontawesome_icons[] = "fa-area-chart";
				$fontawesome_icons[] = "fa-arrows";
				$fontawesome_icons[] = "fa-arrows-h";
				$fontawesome_icons[] = "fa-arrows-v";
				$fontawesome_icons[] = "fa-asterisk";
				$fontawesome_icons[] = "fa-at";
				$fontawesome_icons[] = "fa-automobile";
				$fontawesome_icons[] = "fa-ban";
				$fontawesome_icons[] = "fa-bank";
				$fontawesome_icons[] = "fa-bar-chart";
				$fontawesome_icons[] = "fa-bar-chart-o";
				$fontawesome_icons[] = "fa-barcode";
				$fontawesome_icons[] = "fa-bars";
				$fontawesome_icons[] = "fa-beer";
				$fontawesome_icons[] = "fa-bell";
				$fontawesome_icons[] = "fa-bell-o";
				$fontawesome_icons[] = "fa-bell-slash";
				$fontawesome_icons[] = "fa-bell-slash-o";
				$fontawesome_icons[] = "fa-bicycle";
				$fontawesome_icons[] = "fa-binoculars";
				$fontawesome_icons[] = "fa-birthday-cake";
				$fontawesome_icons[] = "fa-bolt";
				$fontawesome_icons[] = "fa-bomb";
				$fontawesome_icons[] = "fa-book";
				$fontawesome_icons[] = "fa-bookmark";
				$fontawesome_icons[] = "fa-bookmark-o";
				$fontawesome_icons[] = "fa-briefcase";
				$fontawesome_icons[] = "fa-bug";
				$fontawesome_icons[] = "fa-building";
				$fontawesome_icons[] = "fa-building-o";
				$fontawesome_icons[] = "fa-bullhorn";
				$fontawesome_icons[] = "fa-bullseye";
				$fontawesome_icons[] = "fa-bus";
				$fontawesome_icons[] = "fa-cab";
				$fontawesome_icons[] = "fa-calculator";
				$fontawesome_icons[] = "fa-calendar";
				$fontawesome_icons[] = "fa-calendar-o";
				$fontawesome_icons[] = "fa-camera";
				$fontawesome_icons[] = "fa-camera-retro";
				$fontawesome_icons[] = "fa-car";
				$fontawesome_icons[] = "fa-caret-square-o-down";
				$fontawesome_icons[] = "fa-caret-square-o-left";
				$fontawesome_icons[] = "fa-caret-square-o-right";
				$fontawesome_icons[] = "fa-caret-square-o-up";
				$fontawesome_icons[] = "fa-cc";
				$fontawesome_icons[] = "fa-certificate";
				$fontawesome_icons[] = "fa-check";
				$fontawesome_icons[] = "fa-check-circle";
				$fontawesome_icons[] = "fa-check-circle-o";
				$fontawesome_icons[] = "fa-check-square";
				$fontawesome_icons[] = "fa-check-square-o";
				$fontawesome_icons[] = "fa-child";
				$fontawesome_icons[] = "fa-circle";
				$fontawesome_icons[] = "fa-circle-o";
				$fontawesome_icons[] = "fa-circle-o-notch";
				$fontawesome_icons[] = "fa-circle-thin";
				$fontawesome_icons[] = "fa-clock-o";
				$fontawesome_icons[] = "fa-close";
				$fontawesome_icons[] = "fa-cloud";
				$fontawesome_icons[] = "fa-cloud-download";
				$fontawesome_icons[] = "fa-cloud-upload";
				$fontawesome_icons[] = "fa-code";
				$fontawesome_icons[] = "fa-code-fork";
				$fontawesome_icons[] = "fa-coffee";
				$fontawesome_icons[] = "fa-cog";
				$fontawesome_icons[] = "fa-cogs";
				$fontawesome_icons[] = "fa-comment";
				$fontawesome_icons[] = "fa-comment-o";
				$fontawesome_icons[] = "fa-comments";
				$fontawesome_icons[] = "fa-comments-o";
				$fontawesome_icons[] = "fa-compass";
				$fontawesome_icons[] = "fa-copyright";
				$fontawesome_icons[] = "fa-credit-card";
				$fontawesome_icons[] = "fa-crop";
				$fontawesome_icons[] = "fa-crosshairs";
				$fontawesome_icons[] = "fa-cube";
				$fontawesome_icons[] = "fa-cubes";
				$fontawesome_icons[] = "fa-cutlery";
				$fontawesome_icons[] = "fa-dashboard";
				$fontawesome_icons[] = "fa-database";
				$fontawesome_icons[] = "fa-desktop";
				$fontawesome_icons[] = "fa-dot-circle-o";
				$fontawesome_icons[] = "fa-download";
				$fontawesome_icons[] = "fa-edit";
				$fontawesome_icons[] = "fa-ellipsis-h";
				$fontawesome_icons[] = "fa-ellipsis-v";
				$fontawesome_icons[] = "fa-envelope";
				$fontawesome_icons[] = "fa-envelope-o";
				$fontawesome_icons[] = "fa-envelope-square";
				$fontawesome_icons[] = "fa-eraser";
				$fontawesome_icons[] = "fa-exchange";
				$fontawesome_icons[] = "fa-exclamation";
				$fontawesome_icons[] = "fa-exclamation-circle";
				$fontawesome_icons[] = "fa-exclamation-triangle";
				$fontawesome_icons[] = "fa-external-link";
				$fontawesome_icons[] = "fa-external-link-square";
				$fontawesome_icons[] = "fa-eye";
				$fontawesome_icons[] = "fa-eye-slash";
				$fontawesome_icons[] = "fa-eyedropper";
				$fontawesome_icons[] = "fa-fax";
				$fontawesome_icons[] = "fa-female";
				$fontawesome_icons[] = "fa-fighter-jet";
				$fontawesome_icons[] = "fa-file-archive-o";
				$fontawesome_icons[] = "fa-file-audio-o";
				$fontawesome_icons[] = "fa-file-code-o";
				$fontawesome_icons[] = "fa-file-excel-o";
				$fontawesome_icons[] = "fa-file-image-o";
				$fontawesome_icons[] = "fa-file-movie-o";
				$fontawesome_icons[] = "fa-file-pdf-o";
				$fontawesome_icons[] = "fa-file-photo-o";
				$fontawesome_icons[] = "fa-file-picture-o";
				$fontawesome_icons[] = "fa-file-powerpoint-o";
				$fontawesome_icons[] = "fa-file-sound-o";
				$fontawesome_icons[] = "fa-file-video-o";
				$fontawesome_icons[] = "fa-file-word-o";
				$fontawesome_icons[] = "fa-file-zip-o";
				$fontawesome_icons[] = "fa-film";
				$fontawesome_icons[] = "fa-filter";
				$fontawesome_icons[] = "fa-fire";
				$fontawesome_icons[] = "fa-fire-extinguisher";
				$fontawesome_icons[] = "fa-flag";
				$fontawesome_icons[] = "fa-flag-checkered";
				$fontawesome_icons[] = "fa-flag-o";
				$fontawesome_icons[] = "fa-flash";
				$fontawesome_icons[] = "fa-flask";
				$fontawesome_icons[] = "fa-folder";
				$fontawesome_icons[] = "fa-folder-o";
				$fontawesome_icons[] = "fa-folder-open";
				$fontawesome_icons[] = "fa-folder-open-o";
				$fontawesome_icons[] = "fa-frown-o";
				$fontawesome_icons[] = "fa-futbol-o";
				$fontawesome_icons[] = "fa-gamepad";
				$fontawesome_icons[] = "fa-gavel";
				$fontawesome_icons[] = "fa-gear";
				$fontawesome_icons[] = "fa-gears";
				$fontawesome_icons[] = "fa-gift";
				$fontawesome_icons[] = "fa-glass";
				$fontawesome_icons[] = "fa-globe";
				$fontawesome_icons[] = "fa-graduation-cap";
				$fontawesome_icons[] = "fa-group";
				$fontawesome_icons[] = "fa-hdd-o";
				$fontawesome_icons[] = "fa-headphones";
				$fontawesome_icons[] = "fa-heart";
				$fontawesome_icons[] = "fa-heart-o";
				$fontawesome_icons[] = "fa-history";
				$fontawesome_icons[] = "fa-home";
				$fontawesome_icons[] = "fa-image";
				$fontawesome_icons[] = "fa-inbox";
				$fontawesome_icons[] = "fa-info";
				$fontawesome_icons[] = "fa-info-circle";
				$fontawesome_icons[] = "fa-institution";
				$fontawesome_icons[] = "fa-key";
				$fontawesome_icons[] = "fa-keyboard-o";
				$fontawesome_icons[] = "fa-language";
				$fontawesome_icons[] = "fa-laptop";
				$fontawesome_icons[] = "fa-leaf";
				$fontawesome_icons[] = "fa-legal";
				$fontawesome_icons[] = "fa-lemon-o";
				$fontawesome_icons[] = "fa-level-down";
				$fontawesome_icons[] = "fa-level-up";
				$fontawesome_icons[] = "fa-life-bouy";
				$fontawesome_icons[] = "fa-life-buoy";
				$fontawesome_icons[] = "fa-life-ring";
				$fontawesome_icons[] = "fa-life-saver";
				$fontawesome_icons[] = "fa-lightbulb-o";
				$fontawesome_icons[] = "fa-line-chart";
				$fontawesome_icons[] = "fa-location-arrow";
				$fontawesome_icons[] = "fa-lock";
				$fontawesome_icons[] = "fa-magic";
				$fontawesome_icons[] = "fa-magnet";
				$fontawesome_icons[] = "fa-mail-forward";
				$fontawesome_icons[] = "fa-mail-reply";
				$fontawesome_icons[] = "fa-mail-reply-all";
				$fontawesome_icons[] = "fa-male";
				$fontawesome_icons[] = "fa-map-marker";
				$fontawesome_icons[] = "fa-meh-o";
				$fontawesome_icons[] = "fa-microphone";
				$fontawesome_icons[] = "fa-microphone-slash";
				$fontawesome_icons[] = "fa-minus";
				$fontawesome_icons[] = "fa-minus-circle";
				$fontawesome_icons[] = "fa-minus-square";
				$fontawesome_icons[] = "fa-minus-square-o";
				$fontawesome_icons[] = "fa-mobile";
				$fontawesome_icons[] = "fa-mobile-phone";
				$fontawesome_icons[] = "fa-money";
				$fontawesome_icons[] = "fa-moon-o";
				$fontawesome_icons[] = "fa-mortar-board";
				$fontawesome_icons[] = "fa-music";
				$fontawesome_icons[] = "fa-navicon";
				$fontawesome_icons[] = "fa-newspaper-o";
				$fontawesome_icons[] = "fa-paint-brush";
				$fontawesome_icons[] = "fa-paper-plane";
				$fontawesome_icons[] = "fa-paper-plane-o";
				$fontawesome_icons[] = "fa-paw";
				$fontawesome_icons[] = "fa-pencil";
				$fontawesome_icons[] = "fa-pencil-square";
				$fontawesome_icons[] = "fa-pencil-square-o";
				$fontawesome_icons[] = "fa-phone";
				$fontawesome_icons[] = "fa-phone-square";
				$fontawesome_icons[] = "fa-photo";
				$fontawesome_icons[] = "fa-picture-o";
				$fontawesome_icons[] = "fa-pie-chart";
				$fontawesome_icons[] = "fa-plane";
				$fontawesome_icons[] = "fa-plug";
				$fontawesome_icons[] = "fa-plus";
				$fontawesome_icons[] = "fa-plus-circle";
				$fontawesome_icons[] = "fa-plus-square";
				$fontawesome_icons[] = "fa-plus-square-o";
				$fontawesome_icons[] = "fa-power-off";
				$fontawesome_icons[] = "fa-print";
				$fontawesome_icons[] = "fa-puzzle-piece";
				$fontawesome_icons[] = "fa-qrcode";
				$fontawesome_icons[] = "fa-question";
				$fontawesome_icons[] = "fa-question-circle";
				$fontawesome_icons[] = "fa-quote-left";
				$fontawesome_icons[] = "fa-quote-right";
				$fontawesome_icons[] = "fa-random";
				$fontawesome_icons[] = "fa-recycle";
				$fontawesome_icons[] = "fa-refresh";
				$fontawesome_icons[] = "fa-remove";
				$fontawesome_icons[] = "fa-reorder";
				$fontawesome_icons[] = "fa-reply";
				$fontawesome_icons[] = "fa-reply-all";
				$fontawesome_icons[] = "fa-retweet";
				$fontawesome_icons[] = "fa-road";
				$fontawesome_icons[] = "fa-rocket";
				$fontawesome_icons[] = "fa-rss";
				$fontawesome_icons[] = "fa-rss-square";
				$fontawesome_icons[] = "fa-search";
				$fontawesome_icons[] = "fa-search-minus";
				$fontawesome_icons[] = "fa-search-plus";
				$fontawesome_icons[] = "fa-send";
				$fontawesome_icons[] = "fa-send-o";
				$fontawesome_icons[] = "fa-share";
				$fontawesome_icons[] = "fa-share-alt";
				$fontawesome_icons[] = "fa-share-alt-square";
				$fontawesome_icons[] = "fa-share-square";
				$fontawesome_icons[] = "fa-share-square-o";
				$fontawesome_icons[] = "fa-shield";
				$fontawesome_icons[] = "fa-shopping-cart";
				$fontawesome_icons[] = "fa-sign-in";
				$fontawesome_icons[] = "fa-sign-out";
				$fontawesome_icons[] = "fa-signal";
				$fontawesome_icons[] = "fa-sitemap";
				$fontawesome_icons[] = "fa-sliders";
				$fontawesome_icons[] = "fa-smile-o";
				$fontawesome_icons[] = "fa-soccer-ball-o";
				$fontawesome_icons[] = "fa-sort";
				$fontawesome_icons[] = "fa-sort-alpha-asc";
				$fontawesome_icons[] = "fa-sort-alpha-desc";
				$fontawesome_icons[] = "fa-sort-amount-asc";
				$fontawesome_icons[] = "fa-sort-amount-desc";
				$fontawesome_icons[] = "fa-sort-asc";
				$fontawesome_icons[] = "fa-sort-desc";
				$fontawesome_icons[] = "fa-sort-down";
				$fontawesome_icons[] = "fa-sort-numeric-asc";
				$fontawesome_icons[] = "fa-sort-numeric-desc";
				$fontawesome_icons[] = "fa-sort-up";
				$fontawesome_icons[] = "fa-space-shuttle";
				$fontawesome_icons[] = "fa-spinner";
				$fontawesome_icons[] = "fa-spoon";
				$fontawesome_icons[] = "fa-square";
				$fontawesome_icons[] = "fa-square-o";
				$fontawesome_icons[] = "fa-star";
				$fontawesome_icons[] = "fa-star-half";
				$fontawesome_icons[] = "fa-star-half-empty";
				$fontawesome_icons[] = "fa-star-half-full";
				$fontawesome_icons[] = "fa-star-half-o";
				$fontawesome_icons[] = "fa-star-o";
				$fontawesome_icons[] = "fa-suitcase";
				$fontawesome_icons[] = "fa-sun-o";
				$fontawesome_icons[] = "fa-support";
				$fontawesome_icons[] = "fa-tablet";
				$fontawesome_icons[] = "fa-tachometer";
				$fontawesome_icons[] = "fa-tag";
				$fontawesome_icons[] = "fa-tags";
				$fontawesome_icons[] = "fa-tasks";
				$fontawesome_icons[] = "fa-taxi";
				$fontawesome_icons[] = "fa-terminal";
				$fontawesome_icons[] = "fa-thumb-tack";
				$fontawesome_icons[] = "fa-thumbs-down";
				$fontawesome_icons[] = "fa-thumbs-o-down";
				$fontawesome_icons[] = "fa-thumbs-o-up";
				$fontawesome_icons[] = "fa-thumbs-up";
				$fontawesome_icons[] = "fa-ticket";
				$fontawesome_icons[] = "fa-times";
				$fontawesome_icons[] = "fa-times-circle";
				$fontawesome_icons[] = "fa-times-circle-o";
				$fontawesome_icons[] = "fa-tint";
				$fontawesome_icons[] = "fa-toggle-down";
				$fontawesome_icons[] = "fa-toggle-left";
				$fontawesome_icons[] = "fa-toggle-off";
				$fontawesome_icons[] = "fa-toggle-on";
				$fontawesome_icons[] = "fa-toggle-right";
				$fontawesome_icons[] = "fa-toggle-up";
				$fontawesome_icons[] = "fa-trash";
				$fontawesome_icons[] = "fa-trash-o";
				$fontawesome_icons[] = "fa-tree";
				$fontawesome_icons[] = "fa-trophy";
				$fontawesome_icons[] = "fa-truck";
				$fontawesome_icons[] = "fa-tty";
				$fontawesome_icons[] = "fa-umbrella";
				$fontawesome_icons[] = "fa-university";
				$fontawesome_icons[] = "fa-unlock";
				$fontawesome_icons[] = "fa-unlock-alt";
				$fontawesome_icons[] = "fa-unsorted";
				$fontawesome_icons[] = "fa-upload";
				$fontawesome_icons[] = "fa-user";
				$fontawesome_icons[] = "fa-users";
				$fontawesome_icons[] = "fa-video-camera";
				$fontawesome_icons[] = "fa-volume-down";
				$fontawesome_icons[] = "fa-volume-off";
				$fontawesome_icons[] = "fa-volume-up";
				$fontawesome_icons[] = "fa-warning";
				$fontawesome_icons[] = "fa-wheelchair";
				$fontawesome_icons[] = "fa-wifi";
				$fontawesome_icons[] = "fa-wrench";
				$fontawesome_icons[] = "fa-file";
				$fontawesome_icons[] = "fa-file-archive-o";
				$fontawesome_icons[] = "fa-file-audio-o";
				$fontawesome_icons[] = "fa-file-code-o";
				$fontawesome_icons[] = "fa-file-excel-o";
				$fontawesome_icons[] = "fa-file-image-o";
				$fontawesome_icons[] = "fa-file-movie-o";
				$fontawesome_icons[] = "fa-file-o";
				$fontawesome_icons[] = "fa-file-pdf-o";
				$fontawesome_icons[] = "fa-file-photo-o";
				$fontawesome_icons[] = "fa-file-picture-o";
				$fontawesome_icons[] = "fa-file-powerpoint-o";
				$fontawesome_icons[] = "fa-file-sound-o";
				$fontawesome_icons[] = "fa-file-text";
				$fontawesome_icons[] = "fa-file-text-o";
				$fontawesome_icons[] = "fa-file-video-o";
				$fontawesome_icons[] = "fa-file-word-o";
				$fontawesome_icons[] = "fa-file-zip-o";
				$fontawesome_icons[] = "fa-info-circle fa-lg fa-li";
				$fontawesome_icons[] = "fa-circle-o-notch";
				$fontawesome_icons[] = "fa-cog";
				$fontawesome_icons[] = "fa-gear";
				$fontawesome_icons[] = "fa-refresh";
				$fontawesome_icons[] = "fa-spinner";
				$fontawesome_icons[] = "fa-check-square";
				$fontawesome_icons[] = "fa-check-square-o";
				$fontawesome_icons[] = "fa-circle";
				$fontawesome_icons[] = "fa-circle-o";
				$fontawesome_icons[] = "fa-dot-circle-o";
				$fontawesome_icons[] = "fa-minus-square";
				$fontawesome_icons[] = "fa-minus-square-o";
				$fontawesome_icons[] = "fa-plus-square";
				$fontawesome_icons[] = "fa-plus-square-o";
				$fontawesome_icons[] = "fa-square";
				$fontawesome_icons[] = "fa-square-o";
				$fontawesome_icons[] = "fa-cc-amex";
				$fontawesome_icons[] = "fa-cc-discover";
				$fontawesome_icons[] = "fa-cc-mastercard";
				$fontawesome_icons[] = "fa-cc-paypal";
				$fontawesome_icons[] = "fa-cc-stripe";
				$fontawesome_icons[] = "fa-cc-visa";
				$fontawesome_icons[] = "fa-credit-card";
				$fontawesome_icons[] = "fa-google-wallet";
				$fontawesome_icons[] = "fa-paypal";
				$fontawesome_icons[] = "fa-area-chart";
				$fontawesome_icons[] = "fa-bar-chart";
				$fontawesome_icons[] = "fa-bar-chart-o";
				$fontawesome_icons[] = "fa-line-chart";
				$fontawesome_icons[] = "fa-pie-chart";
				$fontawesome_icons[] = "fa-bitcoin";
				$fontawesome_icons[] = "fa-btc";
				$fontawesome_icons[] = "fa-cny";
				$fontawesome_icons[] = "fa-dollar";
				$fontawesome_icons[] = "fa-eur";
				$fontawesome_icons[] = "fa-euro";
				$fontawesome_icons[] = "fa-gbp";
				$fontawesome_icons[] = "fa-ils";
				$fontawesome_icons[] = "fa-inr";
				$fontawesome_icons[] = "fa-jpy";
				$fontawesome_icons[] = "fa-krw";
				$fontawesome_icons[] = "fa-money";
				$fontawesome_icons[] = "fa-rmb";
				$fontawesome_icons[] = "fa-rouble";
				$fontawesome_icons[] = "fa-rub";
				$fontawesome_icons[] = "fa-ruble";
				$fontawesome_icons[] = "fa-rupee";
				$fontawesome_icons[] = "fa-shekel";
				$fontawesome_icons[] = "fa-sheqel";
				$fontawesome_icons[] = "fa-try";
				$fontawesome_icons[] = "fa-turkish-lira";
				$fontawesome_icons[] = "fa-usd";
				$fontawesome_icons[] = "fa-won";
				$fontawesome_icons[] = "fa-yen";
				$fontawesome_icons[] = "fa-align-center";
				$fontawesome_icons[] = "fa-align-justify";
				$fontawesome_icons[] = "fa-align-left";
				$fontawesome_icons[] = "fa-align-right";
				$fontawesome_icons[] = "fa-bold";
				$fontawesome_icons[] = "fa-chain";
				$fontawesome_icons[] = "fa-chain-broken";
				$fontawesome_icons[] = "fa-clipboard";
				$fontawesome_icons[] = "fa-columns";
				$fontawesome_icons[] = "fa-copy";
				$fontawesome_icons[] = "fa-cut";
				$fontawesome_icons[] = "fa-dedent";
				$fontawesome_icons[] = "fa-eraser";
				$fontawesome_icons[] = "fa-file";
				$fontawesome_icons[] = "fa-file-o";
				$fontawesome_icons[] = "fa-file-text";
				$fontawesome_icons[] = "fa-file-text-o";
				$fontawesome_icons[] = "fa-files-o";
				$fontawesome_icons[] = "fa-floppy-o";
				$fontawesome_icons[] = "fa-font";
				$fontawesome_icons[] = "fa-header";
				$fontawesome_icons[] = "fa-indent";
				$fontawesome_icons[] = "fa-italic";
				$fontawesome_icons[] = "fa-link";
				$fontawesome_icons[] = "fa-list";
				$fontawesome_icons[] = "fa-list-alt";
				$fontawesome_icons[] = "fa-list-ol";
				$fontawesome_icons[] = "fa-list-ul";
				$fontawesome_icons[] = "fa-outdent";
				$fontawesome_icons[] = "fa-paperclip";
				$fontawesome_icons[] = "fa-paragraph";
				$fontawesome_icons[] = "fa-paste";
				$fontawesome_icons[] = "fa-repeat";
				$fontawesome_icons[] = "fa-rotate-left";
				$fontawesome_icons[] = "fa-rotate-right";
				$fontawesome_icons[] = "fa-save";
				$fontawesome_icons[] = "fa-scissors";
				$fontawesome_icons[] = "fa-strikethrough";
				$fontawesome_icons[] = "fa-subscript";
				$fontawesome_icons[] = "fa-superscript";
				$fontawesome_icons[] = "fa-table";
				$fontawesome_icons[] = "fa-text-height";
				$fontawesome_icons[] = "fa-text-width";
				$fontawesome_icons[] = "fa-th";
				$fontawesome_icons[] = "fa-th-large";
				$fontawesome_icons[] = "fa-th-list";
				$fontawesome_icons[] = "fa-underline";
				$fontawesome_icons[] = "fa-undo";
				$fontawesome_icons[] = "fa-unlink";
				$fontawesome_icons[] = "fa-angle-double-down";
				$fontawesome_icons[] = "fa-angle-double-left";
				$fontawesome_icons[] = "fa-angle-double-right";
				$fontawesome_icons[] = "fa-angle-double-up";
				$fontawesome_icons[] = "fa-angle-down";
				$fontawesome_icons[] = "fa-angle-left";
				$fontawesome_icons[] = "fa-angle-right";
				$fontawesome_icons[] = "fa-angle-up";
				$fontawesome_icons[] = "fa-arrow-circle-down";
				$fontawesome_icons[] = "fa-arrow-circle-left";
				$fontawesome_icons[] = "fa-arrow-circle-o-down";
				$fontawesome_icons[] = "fa-arrow-circle-o-left";
				$fontawesome_icons[] = "fa-arrow-circle-o-right";
				$fontawesome_icons[] = "fa-arrow-circle-o-up";
				$fontawesome_icons[] = "fa-arrow-circle-right";
				$fontawesome_icons[] = "fa-arrow-circle-up";
				$fontawesome_icons[] = "fa-arrow-down";
				$fontawesome_icons[] = "fa-arrow-left";
				$fontawesome_icons[] = "fa-arrow-right";
				$fontawesome_icons[] = "fa-arrow-up";
				$fontawesome_icons[] = "fa-arrows";
				$fontawesome_icons[] = "fa-arrows-alt";
				$fontawesome_icons[] = "fa-arrows-h";
				$fontawesome_icons[] = "fa-arrows-v";
				$fontawesome_icons[] = "fa-caret-down";
				$fontawesome_icons[] = "fa-caret-left";
				$fontawesome_icons[] = "fa-caret-right";
				$fontawesome_icons[] = "fa-caret-square-o-down";
				$fontawesome_icons[] = "fa-caret-square-o-left";
				$fontawesome_icons[] = "fa-caret-square-o-right";
				$fontawesome_icons[] = "fa-caret-square-o-up";
				$fontawesome_icons[] = "fa-caret-up";
				$fontawesome_icons[] = "fa-chevron-circle-down";
				$fontawesome_icons[] = "fa-chevron-circle-left";
				$fontawesome_icons[] = "fa-chevron-circle-right";
				$fontawesome_icons[] = "fa-chevron-circle-up";
				$fontawesome_icons[] = "fa-chevron-down";
				$fontawesome_icons[] = "fa-chevron-left";
				$fontawesome_icons[] = "fa-chevron-right";
				$fontawesome_icons[] = "fa-chevron-up";
				$fontawesome_icons[] = "fa-hand-o-down";
				$fontawesome_icons[] = "fa-hand-o-left";
				$fontawesome_icons[] = "fa-hand-o-right";
				$fontawesome_icons[] = "fa-hand-o-up";
				$fontawesome_icons[] = "fa-long-arrow-down";
				$fontawesome_icons[] = "fa-long-arrow-left";
				$fontawesome_icons[] = "fa-long-arrow-right";
				$fontawesome_icons[] = "fa-long-arrow-up";
				$fontawesome_icons[] = "fa-toggle-down";
				$fontawesome_icons[] = "fa-toggle-left";
				$fontawesome_icons[] = "fa-toggle-right";
				$fontawesome_icons[] = "fa-toggle-up";
				$fontawesome_icons[] = "fa-arrows-alt";
				$fontawesome_icons[] = "fa-backward";
				$fontawesome_icons[] = "fa-compress";
				$fontawesome_icons[] = "fa-eject";
				$fontawesome_icons[] = "fa-expand";
				$fontawesome_icons[] = "fa-fast-backward";
				$fontawesome_icons[] = "fa-fast-forward";
				$fontawesome_icons[] = "fa-forward";
				$fontawesome_icons[] = "fa-pause";
				$fontawesome_icons[] = "fa-play";
				$fontawesome_icons[] = "fa-play-circle";
				$fontawesome_icons[] = "fa-play-circle-o";
				$fontawesome_icons[] = "fa-step-backward";
				$fontawesome_icons[] = "fa-step-forward";
				$fontawesome_icons[] = "fa-stop";
				$fontawesome_icons[] = "fa-youtube-play";
				$fontawesome_icons[] = "fa-warning";
				$fontawesome_icons[] = "fa-adn";
				$fontawesome_icons[] = "fa-android";
				$fontawesome_icons[] = "fa-angellist";
				$fontawesome_icons[] = "fa-apple";
				$fontawesome_icons[] = "fa-behance";
				$fontawesome_icons[] = "fa-behance-square";
				$fontawesome_icons[] = "fa-bitbucket";
				$fontawesome_icons[] = "fa-bitbucket-square";
				$fontawesome_icons[] = "fa-bitcoin";
				$fontawesome_icons[] = "fa-btc";
				$fontawesome_icons[] = "fa-cc-amex";
				$fontawesome_icons[] = "fa-cc-discover";
				$fontawesome_icons[] = "fa-cc-mastercard";
				$fontawesome_icons[] = "fa-cc-paypal";
				$fontawesome_icons[] = "fa-cc-stripe";
				$fontawesome_icons[] = "fa-cc-visa";
				$fontawesome_icons[] = "fa-codepen";
				$fontawesome_icons[] = "fa-css3";
				$fontawesome_icons[] = "fa-delicious";
				$fontawesome_icons[] = "fa-deviantart";
				$fontawesome_icons[] = "fa-digg";
				$fontawesome_icons[] = "fa-dribbble";
				$fontawesome_icons[] = "fa-dropbox";
				$fontawesome_icons[] = "fa-drupal";
				$fontawesome_icons[] = "fa-empire";
				$fontawesome_icons[] = "fa-facebook";
				$fontawesome_icons[] = "fa-facebook-square";
				$fontawesome_icons[] = "fa-flickr";
				$fontawesome_icons[] = "fa-foursquare";
				$fontawesome_icons[] = "fa-ge";
				$fontawesome_icons[] = "fa-git";
				$fontawesome_icons[] = "fa-git-square";
				$fontawesome_icons[] = "fa-github";
				$fontawesome_icons[] = "fa-github-alt";
				$fontawesome_icons[] = "fa-github-square";
				$fontawesome_icons[] = "fa-gittip";
				$fontawesome_icons[] = "fa-google";
				$fontawesome_icons[] = "fa-google-plus";
				$fontawesome_icons[] = "fa-google-plus-square";
				$fontawesome_icons[] = "fa-google-wallet";
				$fontawesome_icons[] = "fa-hacker-news";
				$fontawesome_icons[] = "fa-html5";
				$fontawesome_icons[] = "fa-instagram";
				$fontawesome_icons[] = "fa-ioxhost";
				$fontawesome_icons[] = "fa-joomla";
				$fontawesome_icons[] = "fa-jsfiddle";
				$fontawesome_icons[] = "fa-lastfm";
				$fontawesome_icons[] = "fa-lastfm-square";
				$fontawesome_icons[] = "fa-linkedin";
				$fontawesome_icons[] = "fa-linkedin-square";
				$fontawesome_icons[] = "fa-linux";
				$fontawesome_icons[] = "fa-maxcdn";
				$fontawesome_icons[] = "fa-meanpath";
				$fontawesome_icons[] = "fa-openid";
				$fontawesome_icons[] = "fa-pagelines";
				$fontawesome_icons[] = "fa-paypal";
				$fontawesome_icons[] = "fa-pied-piper";
				$fontawesome_icons[] = "fa-pied-piper-alt";
				$fontawesome_icons[] = "fa-pinterest";
				$fontawesome_icons[] = "fa-pinterest-square";
				$fontawesome_icons[] = "fa-qq";
				$fontawesome_icons[] = "fa-ra";
				$fontawesome_icons[] = "fa-rebel";
				$fontawesome_icons[] = "fa-reddit";
				$fontawesome_icons[] = "fa-reddit-square";
				$fontawesome_icons[] = "fa-renren";
				$fontawesome_icons[] = "fa-share-alt";
				$fontawesome_icons[] = "fa-share-alt-square";
				$fontawesome_icons[] = "fa-skype";
				$fontawesome_icons[] = "fa-slack";
				$fontawesome_icons[] = "fa-slideshare";
				$fontawesome_icons[] = "fa-soundcloud";
				$fontawesome_icons[] = "fa-spotify";
				$fontawesome_icons[] = "fa-stack-exchange";
				$fontawesome_icons[] = "fa-stack-overflow";
				$fontawesome_icons[] = "fa-steam";
				$fontawesome_icons[] = "fa-steam-square";
				$fontawesome_icons[] = "fa-stumbleupon";
				$fontawesome_icons[] = "fa-stumbleupon-circle";
				$fontawesome_icons[] = "fa-tencent-weibo";
				$fontawesome_icons[] = "fa-trello";
				$fontawesome_icons[] = "fa-tumblr";
				$fontawesome_icons[] = "fa-tumblr-square";
				$fontawesome_icons[] = "fa-twitch";
				$fontawesome_icons[] = "fa-twitter";
				$fontawesome_icons[] = "fa-twitter-square";
				$fontawesome_icons[] = "fa-vimeo-square";
				$fontawesome_icons[] = "fa-vine";
				$fontawesome_icons[] = "fa-vk";
				$fontawesome_icons[] = "fa-wechat";
				$fontawesome_icons[] = "fa-weibo";
				$fontawesome_icons[] = "fa-weixin";
				$fontawesome_icons[] = "fa-windows";
				$fontawesome_icons[] = "fa-wordpress";
				$fontawesome_icons[] = "fa-xing";
				$fontawesome_icons[] = "fa-xing-square";
				$fontawesome_icons[] = "fa-yahoo";
				$fontawesome_icons[] = "fa-yelp";
				$fontawesome_icons[] = "fa-youtube";
				$fontawesome_icons[] = "fa-youtube-play";
				$fontawesome_icons[] = "fa-youtube-square";
				$fontawesome_icons[] = "fa-ambulance";
				$fontawesome_icons[] = "fa-h-square";
				$fontawesome_icons[] = "fa-hospital-o";
				$fontawesome_icons[] = "fa-medkit";
				$fontawesome_icons[] = "fa-plus-square";
				$fontawesome_icons[] = "fa-stethoscope";
				$fontawesome_icons[] = "fa-user-md";
				$fontawesome_icons[] = "fa-wheelchair";
				$fontawesome_icons[] = "fa-flag";
				$fontawesome_icons[] = "fa-maxcdn";
	            ?>      
	            <p class="field-custom description description-wide">
	                <label for="edit-menu-item-subtitle-<?php echo $item_id; ?>">
	                    <?php _e( 'Font Awesome Icon', 'vow' ); ?><br />
	                    <select id="edit-menu-item-subtitle-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-subtitle[<?php echo $item_id; ?>]">
	                    	<?php
	                    	foreach ($fontawesome_icons as $key => $value) { ?>
	                    		<option value="<?php echo $value; ?>" <?php if(esc_attr( $object->subtitle ) == $value) echo 'selected="selected"'; ?>><?php echo $value; ?></option>
	                    		<?php
	                    	}
	                    	?>
	                    </select>
	                </label>
	            </p>
	            <?php
	            /* New fields insertion ends here */
	            ?>
	            <div class="menu-item-actions description-wide submitbox">
	                <?php if( 'custom' != $object->type && $original_title !== false ) : ?>
	                    <p class="link-to-original">
	                        <?php printf( __('Original: %s'), '<a href="' . esc_attr( $object->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
	                    </p>
	                <?php endif; ?>
	                <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
	                echo wp_nonce_url(
	                    add_query_arg(
	                        array(
	                            'action' => 'delete-menu-item',
	                            'menu-item' => $item_id,
	                        ),
	                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                    ),
	                    'delete-menu_item_' . $item_id
	                ); ?>"><?php _e('Remove', 'vow'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
	                    ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel', 'vow'); ?></a>
	            </div>
	
	            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
	            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->object_id ); ?>" />
	            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->object ); ?>" />
	            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->menu_item_parent ); ?>" />
	            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->menu_order ); ?>" />
	            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->type ); ?>" />
	        </div><!-- .menu-item-settings-->
	        <ul class="menu-item-transport"></ul>
	    <?php
	    
	    $output .= ob_get_clean();

	    }
}
