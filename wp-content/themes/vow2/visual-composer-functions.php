<?php

global $animate_css;
global $team_members;
global $font_awesome_icons;
global $entypo_icons;

function team_array() {
	$output = array();
	$myposts = get_posts( array( 'post_type' => 'team' ) );

	
	foreach ( $myposts as $post ) {
		$output[$post->post_title] = $post->ID; 
	}
		
	wp_reset_postdata();
	
    return $output;
}
$team_members = team_array();

$animate_css = array(
	"none" => "",
	"flash" => "flash", 
	"bounce" => "bounce", 
	"shake" => "shake", 
	"tada" => "tada", 
	"swing" => "swing", 
	"wobble" => "wobble", 
	"pulse" => "pulse", 
	"flip" => "flip", 
	"flipInX" => "flipInX", 
	"flipOutX" => "flipOutX", 
	"flipInY" => "flipInY", 
	"flipOutY" => "flipOutY", 
	"fadeIn" => "fadeIn", 
	"fadeInUp" => "fadeInUp", 
	"fadeInDown" => "fadeInDown", 
	"fadeInLeft" => "fadeInLeft", 
	"fadeInRight" => "fadeInRight", 
	"fadeInUpBig" => "fadeInUpBig", 
	"fadeInDownBig" => "fadeInDownBig", 
	"fadeInLeftBig" => "fadeInLeftBig", 
	"fadeInRightBig" => "fadeInRightBig", 
	"fadeOut" => "fadeOut", 
	"fadeOutUp" => "fadeOutUp", 
	"fadeOutDown" => "fadeOutDown", 
	"fadeOutLeft" => "fadeOutLeft", 
	"fadeOutRight" => "fadeOutRight", 
	"fadeOutUpBig" => "fadeOutUpBig", 
	"fadeOutDownBig" => "fadeOutDownBig", 
	"fadeOutLeftBig" => "fadeOutLeftBig", 
	"fadeOutRightBig" => "fadeOutRightBig", 
	"slideInDown" => "slideInDown", 
	"slideInLeft" => "slideInLeft", 
	"slideInRight" => "slideInRight", 
	"slideOutUp" => "slideOutUp", 
	"slideOutLeft" => "slideOutLeft", 
	"slideOutRight" => "slideOutRight", 
	"bounceIn" => "bounceIn", 
	"bounceInDown" => "bounceInDown", 
	"bounceInUp" => "bounceInUp", 
	"bounceInLeft" => "bounceInLeft", 
	"bounceInRight" => "bounceInRight", 
	"bounceOut" => "bounceOut", 
	"bounceOutDown" => "bounceOutDown", 
	"bounceOutUp" => "bounceOutUp", 
	"bounceOutLeft" => "bounceOutLeft", 
	"bounceOutRight" => "bounceOutRight", 
	"rotateIn" => "rotateIn", 
	"rotateInDownLeft" => "rotateInDownLeft", 
	"rotateInDownRight" => "rotateInDownRight", 
	"rotateInUpLeft" => "rotateInUpLeft", 
	"rotateInUpRight" => "rotateInUpRight", 
	"rotateOut" => "rotateOut", 
	"rotateOutDownLeft" => "rotateOutDownLeft", 
	"rotateOutDownRight" => "rotateOutDownRight", 
	"rotateOutUpLeft" => "rotateOutUpLeft", 
	"rotateOutUpRight" => "rotateOutUpRight", 
	"lightSpeedIn" => "lightSpeedIn", 
	"lightSpeedOut" => "lightSpeedOut", 
	"hinge" => "hinge", 
	"rollIn" => "rollIn", 
	"rollOut" => "rollOut", 
);
$font_awesome_icons = array(
	
	__("fa-area-chart", "js_composer") => "fa-area-chart", 
	__("fa-at", "js_composer") => "fa-at", 
	__("fa-bell-slash", "js_composer") => "fa-bell-slash", 
	__("fa-bell-slash-o", "js_composer") => "fa-bell-slash-o", 
	__("fa-bicycle", "js_composer") => "fa-bicycle", 
	__("fa-binoculars", "js_composer") => "fa-binoculars", 
	__("fa-birthday-cake", "js_composer") => "fa-birthday-cake", 
	__("fa-bus", "js_composer") => "fa-bus", 
	__("fa-calculator", "js_composer") => "fa-calculator", 
	__("fa-cc", "js_composer") => "fa-cc", 
	__("fa-cc-amex", "js_composer") => "fa-cc-amex", 
	__("fa-cc-discover", "js_composer") => "fa-cc-discover", 
	__("fa-cc-mastercard", "js_composer") => "fa-cc-mastercard", 
	__("fa-cc-paypal", "js_composer") => "fa-cc-paypal", 
	__("fa-cc-stripe", "js_composer") => "fa-cc-stripe", 
	__("fa-cc-visa", "js_composer") => "fa-cc-visa", 
	__("fa-copyright", "js_composer") => "fa-copyright", 
	__("fa-eyedropper", "js_composer") => "fa-eyedropper", 
	__("fa-futbol-o", "js_composer") => "fa-futbol-o", 
	__("fa-google-wallet", "js_composer") => "fa-google-wallet", 
	__("fa-ils", "js_composer") => "fa-ils", 
	__("fa-ioxhost", "js_composer") => "fa-ioxhost", 
	__("fa-lastfm", "js_composer") => "fa-lastfm", 
	__("fa-lastfm-square", "js_composer") => "fa-lastfm-square", 
	__("fa-line-chart", "js_composer") => "fa-line-chart", 
	__("fa-meanpath", "js_composer") => "fa-meanpath", 
	__("fa-newspaper-o", "js_composer") => "fa-newspaper-o", 
	__("fa-paint-brush", "js_composer") => "fa-paint-brush", 
	__("fa-paypal", "js_composer") => "fa-paypal", 
	__("fa-pie-chart", "js_composer") => "fa-pie-chart", 
	__("fa-plug", "js_composer") => "fa-plug", 
	__("fa-shekel", "js_composer") => "fa-shekel", 
	__("fa-sheqel", "js_composer") => "fa-sheqel", 
	__("fa-slideshare", "js_composer") => "fa-slideshare", 
	__("fa-soccer-ball-o", "js_composer") => "fa-soccer-ball-o", 
	__("fa-toggle-off", "js_composer") => "fa-toggle-off", 
	__("fa-toggle-on", "js_composer") => "fa-toggle-on", 
	__("fa-trash", "js_composer") => "fa-trash", 
	__("fa-tty", "js_composer") => "fa-tty", 
	__("fa-twitch", "js_composer") => "fa-twitch", 
	__("fa-wifi", "js_composer") => "fa-wifi", 
	__("fa-yelp", "js_composer") => "fa-yelp", 
	__("fa-adjust", "js_composer") => "fa-adjust", 
	__("fa-anchor", "js_composer") => "fa-anchor", 
	__("fa-archive", "js_composer") => "fa-archive", 
	__("fa-area-chart", "js_composer") => "fa-area-chart", 
	__("fa-arrows", "js_composer") => "fa-arrows", 
	__("fa-arrows-h", "js_composer") => "fa-arrows-h", 
	__("fa-arrows-v", "js_composer") => "fa-arrows-v", 
	__("fa-asterisk", "js_composer") => "fa-asterisk", 
	__("fa-at", "js_composer") => "fa-at", 
	__("fa-automobile", "js_composer") => "fa-automobile", 
	__("fa-ban", "js_composer") => "fa-ban", 
	__("fa-bank", "js_composer") => "fa-bank", 
	__("fa-bar-chart", "js_composer") => "fa-bar-chart", 
	__("fa-bar-chart-o", "js_composer") => "fa-bar-chart-o", 
	__("fa-barcode", "js_composer") => "fa-barcode", 
	__("fa-bars", "js_composer") => "fa-bars", 
	__("fa-beer", "js_composer") => "fa-beer", 
	__("fa-bell", "js_composer") => "fa-bell", 
	__("fa-bell-o", "js_composer") => "fa-bell-o", 
	__("fa-bell-slash", "js_composer") => "fa-bell-slash", 
	__("fa-bell-slash-o", "js_composer") => "fa-bell-slash-o", 
	__("fa-bicycle", "js_composer") => "fa-bicycle", 
	__("fa-binoculars", "js_composer") => "fa-binoculars", 
	__("fa-birthday-cake", "js_composer") => "fa-birthday-cake", 
	__("fa-bolt", "js_composer") => "fa-bolt", 
	__("fa-bomb", "js_composer") => "fa-bomb", 
	__("fa-book", "js_composer") => "fa-book", 
	__("fa-bookmark", "js_composer") => "fa-bookmark", 
	__("fa-bookmark-o", "js_composer") => "fa-bookmark-o", 
	__("fa-briefcase", "js_composer") => "fa-briefcase", 
	__("fa-bug", "js_composer") => "fa-bug", 
	__("fa-building", "js_composer") => "fa-building", 
	__("fa-building-o", "js_composer") => "fa-building-o", 
	__("fa-bullhorn", "js_composer") => "fa-bullhorn", 
	__("fa-bullseye", "js_composer") => "fa-bullseye", 
	__("fa-bus", "js_composer") => "fa-bus", 
	__("fa-cab", "js_composer") => "fa-cab", 
	__("fa-calculator", "js_composer") => "fa-calculator", 
	__("fa-calendar", "js_composer") => "fa-calendar", 
	__("fa-calendar-o", "js_composer") => "fa-calendar-o", 
	__("fa-camera", "js_composer") => "fa-camera", 
	__("fa-camera-retro", "js_composer") => "fa-camera-retro", 
	__("fa-car", "js_composer") => "fa-car", 
	__("fa-caret-square-o-down", "js_composer") => "fa-caret-square-o-down", 
	__("fa-caret-square-o-left", "js_composer") => "fa-caret-square-o-left", 
	__("fa-caret-square-o-right", "js_composer") => "fa-caret-square-o-right", 
	__("fa-caret-square-o-up", "js_composer") => "fa-caret-square-o-up", 
	__("fa-cc", "js_composer") => "fa-cc", 
	__("fa-certificate", "js_composer") => "fa-certificate", 
	__("fa-check", "js_composer") => "fa-check", 
	__("fa-check-circle", "js_composer") => "fa-check-circle", 
	__("fa-check-circle-o", "js_composer") => "fa-check-circle-o", 
	__("fa-check-square", "js_composer") => "fa-check-square", 
	__("fa-check-square-o", "js_composer") => "fa-check-square-o", 
	__("fa-child", "js_composer") => "fa-child", 
	__("fa-circle", "js_composer") => "fa-circle", 
	__("fa-circle-o", "js_composer") => "fa-circle-o", 
	__("fa-circle-o-notch", "js_composer") => "fa-circle-o-notch", 
	__("fa-circle-thin", "js_composer") => "fa-circle-thin", 
	__("fa-clock-o", "js_composer") => "fa-clock-o", 
	__("fa-close", "js_composer") => "fa-close", 
	__("fa-cloud", "js_composer") => "fa-cloud", 
	__("fa-cloud-download", "js_composer") => "fa-cloud-download", 
	__("fa-cloud-upload", "js_composer") => "fa-cloud-upload", 
	__("fa-code", "js_composer") => "fa-code", 
	__("fa-code-fork", "js_composer") => "fa-code-fork", 
	__("fa-coffee", "js_composer") => "fa-coffee", 
	__("fa-cog", "js_composer") => "fa-cog", 
	__("fa-cogs", "js_composer") => "fa-cogs", 
	__("fa-comment", "js_composer") => "fa-comment", 
	__("fa-comment-o", "js_composer") => "fa-comment-o", 
	__("fa-comments", "js_composer") => "fa-comments", 
	__("fa-comments-o", "js_composer") => "fa-comments-o", 
	__("fa-compass", "js_composer") => "fa-compass", 
	__("fa-copyright", "js_composer") => "fa-copyright", 
	__("fa-credit-card", "js_composer") => "fa-credit-card", 
	__("fa-crop", "js_composer") => "fa-crop", 
	__("fa-crosshairs", "js_composer") => "fa-crosshairs", 
	__("fa-cube", "js_composer") => "fa-cube", 
	__("fa-cubes", "js_composer") => "fa-cubes", 
	__("fa-cutlery", "js_composer") => "fa-cutlery", 
	__("fa-dashboard", "js_composer") => "fa-dashboard", 
	__("fa-database", "js_composer") => "fa-database", 
	__("fa-desktop", "js_composer") => "fa-desktop", 
	__("fa-dot-circle-o", "js_composer") => "fa-dot-circle-o", 
	__("fa-download", "js_composer") => "fa-download", 
	__("fa-edit", "js_composer") => "fa-edit", 
	__("fa-ellipsis-h", "js_composer") => "fa-ellipsis-h", 
	__("fa-ellipsis-v", "js_composer") => "fa-ellipsis-v", 
	__("fa-envelope", "js_composer") => "fa-envelope", 
	__("fa-envelope-o", "js_composer") => "fa-envelope-o", 
	__("fa-envelope-square", "js_composer") => "fa-envelope-square", 
	__("fa-eraser", "js_composer") => "fa-eraser", 
	__("fa-exchange", "js_composer") => "fa-exchange", 
	__("fa-exclamation", "js_composer") => "fa-exclamation", 
	__("fa-exclamation-circle", "js_composer") => "fa-exclamation-circle", 
	__("fa-exclamation-triangle", "js_composer") => "fa-exclamation-triangle", 
	__("fa-external-link", "js_composer") => "fa-external-link", 
	__("fa-external-link-square", "js_composer") => "fa-external-link-square", 
	__("fa-eye", "js_composer") => "fa-eye", 
	__("fa-eye-slash", "js_composer") => "fa-eye-slash", 
	__("fa-eyedropper", "js_composer") => "fa-eyedropper", 
	__("fa-fax", "js_composer") => "fa-fax", 
	__("fa-female", "js_composer") => "fa-female", 
	__("fa-fighter-jet", "js_composer") => "fa-fighter-jet", 
	__("fa-file-archive-o", "js_composer") => "fa-file-archive-o", 
	__("fa-file-audio-o", "js_composer") => "fa-file-audio-o", 
	__("fa-file-code-o", "js_composer") => "fa-file-code-o", 
	__("fa-file-excel-o", "js_composer") => "fa-file-excel-o", 
	__("fa-file-image-o", "js_composer") => "fa-file-image-o", 
	__("fa-file-movie-o", "js_composer") => "fa-file-movie-o", 
	__("fa-file-pdf-o", "js_composer") => "fa-file-pdf-o", 
	__("fa-file-photo-o", "js_composer") => "fa-file-photo-o", 
	__("fa-file-picture-o", "js_composer") => "fa-file-picture-o", 
	__("fa-file-powerpoint-o", "js_composer") => "fa-file-powerpoint-o", 
	__("fa-file-sound-o", "js_composer") => "fa-file-sound-o", 
	__("fa-file-video-o", "js_composer") => "fa-file-video-o", 
	__("fa-file-word-o", "js_composer") => "fa-file-word-o", 
	__("fa-file-zip-o", "js_composer") => "fa-file-zip-o", 
	__("fa-film", "js_composer") => "fa-film", 
	__("fa-filter", "js_composer") => "fa-filter", 
	__("fa-fire", "js_composer") => "fa-fire", 
	__("fa-fire-extinguisher", "js_composer") => "fa-fire-extinguisher", 
	__("fa-flag", "js_composer") => "fa-flag", 
	__("fa-flag-checkered", "js_composer") => "fa-flag-checkered", 
	__("fa-flag-o", "js_composer") => "fa-flag-o", 
	__("fa-flash", "js_composer") => "fa-flash", 
	__("fa-flask", "js_composer") => "fa-flask", 
	__("fa-folder", "js_composer") => "fa-folder", 
	__("fa-folder-o", "js_composer") => "fa-folder-o", 
	__("fa-folder-open", "js_composer") => "fa-folder-open", 
	__("fa-folder-open-o", "js_composer") => "fa-folder-open-o", 
	__("fa-frown-o", "js_composer") => "fa-frown-o", 
	__("fa-futbol-o", "js_composer") => "fa-futbol-o", 
	__("fa-gamepad", "js_composer") => "fa-gamepad", 
	__("fa-gavel", "js_composer") => "fa-gavel", 
	__("fa-gear", "js_composer") => "fa-gear", 
	__("fa-gears", "js_composer") => "fa-gears", 
	__("fa-gift", "js_composer") => "fa-gift", 
	__("fa-glass", "js_composer") => "fa-glass", 
	__("fa-globe", "js_composer") => "fa-globe", 
	__("fa-graduation-cap", "js_composer") => "fa-graduation-cap", 
	__("fa-group", "js_composer") => "fa-group", 
	__("fa-hdd-o", "js_composer") => "fa-hdd-o", 
	__("fa-headphones", "js_composer") => "fa-headphones", 
	__("fa-heart", "js_composer") => "fa-heart", 
	__("fa-heart-o", "js_composer") => "fa-heart-o", 
	__("fa-history", "js_composer") => "fa-history", 
	__("fa-home", "js_composer") => "fa-home", 
	__("fa-image", "js_composer") => "fa-image", 
	__("fa-inbox", "js_composer") => "fa-inbox", 
	__("fa-info", "js_composer") => "fa-info", 
	__("fa-info-circle", "js_composer") => "fa-info-circle", 
	__("fa-institution", "js_composer") => "fa-institution", 
	__("fa-key", "js_composer") => "fa-key", 
	__("fa-keyboard-o", "js_composer") => "fa-keyboard-o", 
	__("fa-language", "js_composer") => "fa-language", 
	__("fa-laptop", "js_composer") => "fa-laptop", 
	__("fa-leaf", "js_composer") => "fa-leaf", 
	__("fa-legal", "js_composer") => "fa-legal", 
	__("fa-lemon-o", "js_composer") => "fa-lemon-o", 
	__("fa-level-down", "js_composer") => "fa-level-down", 
	__("fa-level-up", "js_composer") => "fa-level-up", 
	__("fa-life-bouy", "js_composer") => "fa-life-bouy", 
	__("fa-life-buoy", "js_composer") => "fa-life-buoy", 
	__("fa-life-ring", "js_composer") => "fa-life-ring", 
	__("fa-life-saver", "js_composer") => "fa-life-saver", 
	__("fa-lightbulb-o", "js_composer") => "fa-lightbulb-o", 
	__("fa-line-chart", "js_composer") => "fa-line-chart", 
	__("fa-location-arrow", "js_composer") => "fa-location-arrow", 
	__("fa-lock", "js_composer") => "fa-lock", 
	__("fa-magic", "js_composer") => "fa-magic", 
	__("fa-magnet", "js_composer") => "fa-magnet", 
	__("fa-mail-forward", "js_composer") => "fa-mail-forward", 
	__("fa-mail-reply", "js_composer") => "fa-mail-reply", 
	__("fa-mail-reply-all", "js_composer") => "fa-mail-reply-all", 
	__("fa-male", "js_composer") => "fa-male", 
	__("fa-map-marker", "js_composer") => "fa-map-marker", 
	__("fa-meh-o", "js_composer") => "fa-meh-o", 
	__("fa-microphone", "js_composer") => "fa-microphone", 
	__("fa-microphone-slash", "js_composer") => "fa-microphone-slash", 
	__("fa-minus", "js_composer") => "fa-minus", 
	__("fa-minus-circle", "js_composer") => "fa-minus-circle", 
	__("fa-minus-square", "js_composer") => "fa-minus-square", 
	__("fa-minus-square-o", "js_composer") => "fa-minus-square-o", 
	__("fa-mobile", "js_composer") => "fa-mobile", 
	__("fa-mobile-phone", "js_composer") => "fa-mobile-phone", 
	__("fa-money", "js_composer") => "fa-money", 
	__("fa-moon-o", "js_composer") => "fa-moon-o", 
	__("fa-mortar-board", "js_composer") => "fa-mortar-board", 
	__("fa-music", "js_composer") => "fa-music", 
	__("fa-navicon", "js_composer") => "fa-navicon", 
	__("fa-newspaper-o", "js_composer") => "fa-newspaper-o", 
	__("fa-paint-brush", "js_composer") => "fa-paint-brush", 
	__("fa-paper-plane", "js_composer") => "fa-paper-plane", 
	__("fa-paper-plane-o", "js_composer") => "fa-paper-plane-o", 
	__("fa-paw", "js_composer") => "fa-paw", 
	__("fa-pencil", "js_composer") => "fa-pencil", 
	__("fa-pencil-square", "js_composer") => "fa-pencil-square", 
	__("fa-pencil-square-o", "js_composer") => "fa-pencil-square-o", 
	__("fa-phone", "js_composer") => "fa-phone", 
	__("fa-phone-square", "js_composer") => "fa-phone-square", 
	__("fa-photo", "js_composer") => "fa-photo", 
	__("fa-picture-o", "js_composer") => "fa-picture-o", 
	__("fa-pie-chart", "js_composer") => "fa-pie-chart", 
	__("fa-plane", "js_composer") => "fa-plane", 
	__("fa-plug", "js_composer") => "fa-plug", 
	__("fa-plus", "js_composer") => "fa-plus", 
	__("fa-plus-circle", "js_composer") => "fa-plus-circle", 
	__("fa-plus-square", "js_composer") => "fa-plus-square", 
	__("fa-plus-square-o", "js_composer") => "fa-plus-square-o", 
	__("fa-power-off", "js_composer") => "fa-power-off", 
	__("fa-print", "js_composer") => "fa-print", 
	__("fa-puzzle-piece", "js_composer") => "fa-puzzle-piece", 
	__("fa-qrcode", "js_composer") => "fa-qrcode", 
	__("fa-question", "js_composer") => "fa-question", 
	__("fa-question-circle", "js_composer") => "fa-question-circle", 
	__("fa-quote-left", "js_composer") => "fa-quote-left", 
	__("fa-quote-right", "js_composer") => "fa-quote-right", 
	__("fa-random", "js_composer") => "fa-random", 
	__("fa-recycle", "js_composer") => "fa-recycle", 
	__("fa-refresh", "js_composer") => "fa-refresh", 
	__("fa-remove", "js_composer") => "fa-remove", 
	__("fa-reorder", "js_composer") => "fa-reorder", 
	__("fa-reply", "js_composer") => "fa-reply", 
	__("fa-reply-all", "js_composer") => "fa-reply-all", 
	__("fa-retweet", "js_composer") => "fa-retweet", 
	__("fa-road", "js_composer") => "fa-road", 
	__("fa-rocket", "js_composer") => "fa-rocket", 
	__("fa-rss", "js_composer") => "fa-rss", 
	__("fa-rss-square", "js_composer") => "fa-rss-square", 
	__("fa-search", "js_composer") => "fa-search", 
	__("fa-search-minus", "js_composer") => "fa-search-minus", 
	__("fa-search-plus", "js_composer") => "fa-search-plus", 
	__("fa-send", "js_composer") => "fa-send", 
	__("fa-send-o", "js_composer") => "fa-send-o", 
	__("fa-share", "js_composer") => "fa-share", 
	__("fa-share-alt", "js_composer") => "fa-share-alt", 
	__("fa-share-alt-square", "js_composer") => "fa-share-alt-square", 
	__("fa-share-square", "js_composer") => "fa-share-square", 
	__("fa-share-square-o", "js_composer") => "fa-share-square-o", 
	__("fa-shield", "js_composer") => "fa-shield", 
	__("fa-shopping-cart", "js_composer") => "fa-shopping-cart", 
	__("fa-sign-in", "js_composer") => "fa-sign-in", 
	__("fa-sign-out", "js_composer") => "fa-sign-out", 
	__("fa-signal", "js_composer") => "fa-signal", 
	__("fa-sitemap", "js_composer") => "fa-sitemap", 
	__("fa-sliders", "js_composer") => "fa-sliders", 
	__("fa-smile-o", "js_composer") => "fa-smile-o", 
	__("fa-soccer-ball-o", "js_composer") => "fa-soccer-ball-o", 
	__("fa-sort", "js_composer") => "fa-sort", 
	__("fa-sort-alpha-asc", "js_composer") => "fa-sort-alpha-asc", 
	__("fa-sort-alpha-desc", "js_composer") => "fa-sort-alpha-desc", 
	__("fa-sort-amount-asc", "js_composer") => "fa-sort-amount-asc", 
	__("fa-sort-amount-desc", "js_composer") => "fa-sort-amount-desc", 
	__("fa-sort-asc", "js_composer") => "fa-sort-asc", 
	__("fa-sort-desc", "js_composer") => "fa-sort-desc", 
	__("fa-sort-down", "js_composer") => "fa-sort-down", 
	__("fa-sort-numeric-asc", "js_composer") => "fa-sort-numeric-asc", 
	__("fa-sort-numeric-desc", "js_composer") => "fa-sort-numeric-desc", 
	__("fa-sort-up", "js_composer") => "fa-sort-up", 
	__("fa-space-shuttle", "js_composer") => "fa-space-shuttle", 
	__("fa-spinner", "js_composer") => "fa-spinner", 
	__("fa-spoon", "js_composer") => "fa-spoon", 
	__("fa-square", "js_composer") => "fa-square", 
	__("fa-square-o", "js_composer") => "fa-square-o", 
	__("fa-star", "js_composer") => "fa-star", 
	__("fa-star-half", "js_composer") => "fa-star-half", 
	__("fa-star-half-empty", "js_composer") => "fa-star-half-empty", 
	__("fa-star-half-full", "js_composer") => "fa-star-half-full", 
	__("fa-star-half-o", "js_composer") => "fa-star-half-o", 
	__("fa-star-o", "js_composer") => "fa-star-o", 
	__("fa-suitcase", "js_composer") => "fa-suitcase", 
	__("fa-sun-o", "js_composer") => "fa-sun-o", 
	__("fa-support", "js_composer") => "fa-support", 
	__("fa-tablet", "js_composer") => "fa-tablet", 
	__("fa-tachometer", "js_composer") => "fa-tachometer", 
	__("fa-tag", "js_composer") => "fa-tag", 
	__("fa-tags", "js_composer") => "fa-tags", 
	__("fa-tasks", "js_composer") => "fa-tasks", 
	__("fa-taxi", "js_composer") => "fa-taxi", 
	__("fa-terminal", "js_composer") => "fa-terminal", 
	__("fa-thumb-tack", "js_composer") => "fa-thumb-tack", 
	__("fa-thumbs-down", "js_composer") => "fa-thumbs-down", 
	__("fa-thumbs-o-down", "js_composer") => "fa-thumbs-o-down", 
	__("fa-thumbs-o-up", "js_composer") => "fa-thumbs-o-up", 
	__("fa-thumbs-up", "js_composer") => "fa-thumbs-up", 
	__("fa-ticket", "js_composer") => "fa-ticket", 
	__("fa-times", "js_composer") => "fa-times", 
	__("fa-times-circle", "js_composer") => "fa-times-circle", 
	__("fa-times-circle-o", "js_composer") => "fa-times-circle-o", 
	__("fa-tint", "js_composer") => "fa-tint", 
	__("fa-toggle-down", "js_composer") => "fa-toggle-down", 
	__("fa-toggle-left", "js_composer") => "fa-toggle-left", 
	__("fa-toggle-off", "js_composer") => "fa-toggle-off", 
	__("fa-toggle-on", "js_composer") => "fa-toggle-on", 
	__("fa-toggle-right", "js_composer") => "fa-toggle-right", 
	__("fa-toggle-up", "js_composer") => "fa-toggle-up", 
	__("fa-trash", "js_composer") => "fa-trash", 
	__("fa-trash-o", "js_composer") => "fa-trash-o", 
	__("fa-tree", "js_composer") => "fa-tree", 
	__("fa-trophy", "js_composer") => "fa-trophy", 
	__("fa-truck", "js_composer") => "fa-truck", 
	__("fa-tty", "js_composer") => "fa-tty", 
	__("fa-umbrella", "js_composer") => "fa-umbrella", 
	__("fa-university", "js_composer") => "fa-university", 
	__("fa-unlock", "js_composer") => "fa-unlock", 
	__("fa-unlock-alt", "js_composer") => "fa-unlock-alt", 
	__("fa-unsorted", "js_composer") => "fa-unsorted", 
	__("fa-upload", "js_composer") => "fa-upload", 
	__("fa-user", "js_composer") => "fa-user", 
	__("fa-users", "js_composer") => "fa-users", 
	__("fa-video-camera", "js_composer") => "fa-video-camera", 
	__("fa-volume-down", "js_composer") => "fa-volume-down", 
	__("fa-volume-off", "js_composer") => "fa-volume-off", 
	__("fa-volume-up", "js_composer") => "fa-volume-up", 
	__("fa-warning", "js_composer") => "fa-warning", 
	__("fa-wheelchair", "js_composer") => "fa-wheelchair", 
	__("fa-wifi", "js_composer") => "fa-wifi", 
	__("fa-wrench", "js_composer") => "fa-wrench", 
	__("fa-file", "js_composer") => "fa-file", 
	__("fa-file-archive-o", "js_composer") => "fa-file-archive-o", 
	__("fa-file-audio-o", "js_composer") => "fa-file-audio-o", 
	__("fa-file-code-o", "js_composer") => "fa-file-code-o", 
	__("fa-file-excel-o", "js_composer") => "fa-file-excel-o", 
	__("fa-file-image-o", "js_composer") => "fa-file-image-o", 
	__("fa-file-movie-o", "js_composer") => "fa-file-movie-o", 
	__("fa-file-o", "js_composer") => "fa-file-o", 
	__("fa-file-pdf-o", "js_composer") => "fa-file-pdf-o", 
	__("fa-file-photo-o", "js_composer") => "fa-file-photo-o", 
	__("fa-file-picture-o", "js_composer") => "fa-file-picture-o", 
	__("fa-file-powerpoint-o", "js_composer") => "fa-file-powerpoint-o", 
	__("fa-file-sound-o", "js_composer") => "fa-file-sound-o", 
	__("fa-file-text", "js_composer") => "fa-file-text", 
	__("fa-file-text-o", "js_composer") => "fa-file-text-o", 
	__("fa-file-video-o", "js_composer") => "fa-file-video-o", 
	__("fa-file-word-o", "js_composer") => "fa-file-word-o", 
	__("fa-file-zip-o", "js_composer") => "fa-file-zip-o", 
	__("fa-info-circle fa-lg fa-li", "js_composer") => "fa-info-circle fa-lg fa-li", 
	__("fa-circle-o-notch", "js_composer") => "fa-circle-o-notch", 
	__("fa-cog", "js_composer") => "fa-cog", 
	__("fa-gear", "js_composer") => "fa-gear", 
	__("fa-refresh", "js_composer") => "fa-refresh", 
	__("fa-spinner", "js_composer") => "fa-spinner", 
	__("fa-check-square", "js_composer") => "fa-check-square", 
	__("fa-check-square-o", "js_composer") => "fa-check-square-o", 
	__("fa-circle", "js_composer") => "fa-circle", 
	__("fa-circle-o", "js_composer") => "fa-circle-o", 
	__("fa-dot-circle-o", "js_composer") => "fa-dot-circle-o", 
	__("fa-minus-square", "js_composer") => "fa-minus-square", 
	__("fa-minus-square-o", "js_composer") => "fa-minus-square-o", 
	__("fa-plus-square", "js_composer") => "fa-plus-square", 
	__("fa-plus-square-o", "js_composer") => "fa-plus-square-o", 
	__("fa-square", "js_composer") => "fa-square", 
	__("fa-square-o", "js_composer") => "fa-square-o", 
	__("fa-cc-amex", "js_composer") => "fa-cc-amex", 
	__("fa-cc-discover", "js_composer") => "fa-cc-discover", 
	__("fa-cc-mastercard", "js_composer") => "fa-cc-mastercard", 
	__("fa-cc-paypal", "js_composer") => "fa-cc-paypal", 
	__("fa-cc-stripe", "js_composer") => "fa-cc-stripe", 
	__("fa-cc-visa", "js_composer") => "fa-cc-visa", 
	__("fa-credit-card", "js_composer") => "fa-credit-card", 
	__("fa-google-wallet", "js_composer") => "fa-google-wallet", 
	__("fa-paypal", "js_composer") => "fa-paypal", 
	__("fa-area-chart", "js_composer") => "fa-area-chart", 
	__("fa-bar-chart", "js_composer") => "fa-bar-chart", 
	__("fa-bar-chart-o", "js_composer") => "fa-bar-chart-o", 
	__("fa-line-chart", "js_composer") => "fa-line-chart", 
	__("fa-pie-chart", "js_composer") => "fa-pie-chart", 
	__("fa-bitcoin", "js_composer") => "fa-bitcoin", 
	__("fa-btc", "js_composer") => "fa-btc", 
	__("fa-cny", "js_composer") => "fa-cny", 
	__("fa-dollar", "js_composer") => "fa-dollar", 
	__("fa-eur", "js_composer") => "fa-eur", 
	__("fa-euro", "js_composer") => "fa-euro", 
	__("fa-gbp", "js_composer") => "fa-gbp", 
	__("fa-ils", "js_composer") => "fa-ils", 
	__("fa-inr", "js_composer") => "fa-inr", 
	__("fa-jpy", "js_composer") => "fa-jpy", 
	__("fa-krw", "js_composer") => "fa-krw", 
	__("fa-money", "js_composer") => "fa-money", 
	__("fa-rmb", "js_composer") => "fa-rmb", 
	__("fa-rouble", "js_composer") => "fa-rouble", 
	__("fa-rub", "js_composer") => "fa-rub", 
	__("fa-ruble", "js_composer") => "fa-ruble", 
	__("fa-rupee", "js_composer") => "fa-rupee", 
	__("fa-shekel", "js_composer") => "fa-shekel", 
	__("fa-sheqel", "js_composer") => "fa-sheqel", 
	__("fa-try", "js_composer") => "fa-try", 
	__("fa-turkish-lira", "js_composer") => "fa-turkish-lira", 
	__("fa-usd", "js_composer") => "fa-usd", 
	__("fa-won", "js_composer") => "fa-won", 
	__("fa-yen", "js_composer") => "fa-yen", 
	__("fa-align-center", "js_composer") => "fa-align-center", 
	__("fa-align-justify", "js_composer") => "fa-align-justify", 
	__("fa-align-left", "js_composer") => "fa-align-left", 
	__("fa-align-right", "js_composer") => "fa-align-right", 
	__("fa-bold", "js_composer") => "fa-bold", 
	__("fa-chain", "js_composer") => "fa-chain", 
	__("fa-chain-broken", "js_composer") => "fa-chain-broken", 
	__("fa-clipboard", "js_composer") => "fa-clipboard", 
	__("fa-columns", "js_composer") => "fa-columns", 
	__("fa-copy", "js_composer") => "fa-copy", 
	__("fa-cut", "js_composer") => "fa-cut", 
	__("fa-dedent", "js_composer") => "fa-dedent", 
	__("fa-eraser", "js_composer") => "fa-eraser", 
	__("fa-file", "js_composer") => "fa-file", 
	__("fa-file-o", "js_composer") => "fa-file-o", 
	__("fa-file-text", "js_composer") => "fa-file-text", 
	__("fa-file-text-o", "js_composer") => "fa-file-text-o", 
	__("fa-files-o", "js_composer") => "fa-files-o", 
	__("fa-floppy-o", "js_composer") => "fa-floppy-o", 
	__("fa-font", "js_composer") => "fa-font", 
	__("fa-header", "js_composer") => "fa-header", 
	__("fa-indent", "js_composer") => "fa-indent", 
	__("fa-italic", "js_composer") => "fa-italic", 
	__("fa-link", "js_composer") => "fa-link", 
	__("fa-list", "js_composer") => "fa-list", 
	__("fa-list-alt", "js_composer") => "fa-list-alt", 
	__("fa-list-ol", "js_composer") => "fa-list-ol", 
	__("fa-list-ul", "js_composer") => "fa-list-ul", 
	__("fa-outdent", "js_composer") => "fa-outdent", 
	__("fa-paperclip", "js_composer") => "fa-paperclip", 
	__("fa-paragraph", "js_composer") => "fa-paragraph", 
	__("fa-paste", "js_composer") => "fa-paste", 
	__("fa-repeat", "js_composer") => "fa-repeat", 
	__("fa-rotate-left", "js_composer") => "fa-rotate-left", 
	__("fa-rotate-right", "js_composer") => "fa-rotate-right", 
	__("fa-save", "js_composer") => "fa-save", 
	__("fa-scissors", "js_composer") => "fa-scissors", 
	__("fa-strikethrough", "js_composer") => "fa-strikethrough", 
	__("fa-subscript", "js_composer") => "fa-subscript", 
	__("fa-superscript", "js_composer") => "fa-superscript", 
	__("fa-table", "js_composer") => "fa-table", 
	__("fa-text-height", "js_composer") => "fa-text-height", 
	__("fa-text-width", "js_composer") => "fa-text-width", 
	__("fa-th", "js_composer") => "fa-th", 
	__("fa-th-large", "js_composer") => "fa-th-large", 
	__("fa-th-list", "js_composer") => "fa-th-list", 
	__("fa-underline", "js_composer") => "fa-underline", 
	__("fa-undo", "js_composer") => "fa-undo", 
	__("fa-unlink", "js_composer") => "fa-unlink", 
	__("fa-angle-double-down", "js_composer") => "fa-angle-double-down", 
	__("fa-angle-double-left", "js_composer") => "fa-angle-double-left", 
	__("fa-angle-double-right", "js_composer") => "fa-angle-double-right", 
	__("fa-angle-double-up", "js_composer") => "fa-angle-double-up", 
	__("fa-angle-down", "js_composer") => "fa-angle-down", 
	__("fa-angle-left", "js_composer") => "fa-angle-left", 
	__("fa-angle-right", "js_composer") => "fa-angle-right", 
	__("fa-angle-up", "js_composer") => "fa-angle-up", 
	__("fa-arrow-circle-down", "js_composer") => "fa-arrow-circle-down", 
	__("fa-arrow-circle-left", "js_composer") => "fa-arrow-circle-left", 
	__("fa-arrow-circle-o-down", "js_composer") => "fa-arrow-circle-o-down", 
	__("fa-arrow-circle-o-left", "js_composer") => "fa-arrow-circle-o-left", 
	__("fa-arrow-circle-o-right", "js_composer") => "fa-arrow-circle-o-right", 
	__("fa-arrow-circle-o-up", "js_composer") => "fa-arrow-circle-o-up", 
	__("fa-arrow-circle-right", "js_composer") => "fa-arrow-circle-right", 
	__("fa-arrow-circle-up", "js_composer") => "fa-arrow-circle-up", 
	__("fa-arrow-down", "js_composer") => "fa-arrow-down", 
	__("fa-arrow-left", "js_composer") => "fa-arrow-left", 
	__("fa-arrow-right", "js_composer") => "fa-arrow-right", 
	__("fa-arrow-up", "js_composer") => "fa-arrow-up", 
	__("fa-arrows", "js_composer") => "fa-arrows", 
	__("fa-arrows-alt", "js_composer") => "fa-arrows-alt", 
	__("fa-arrows-h", "js_composer") => "fa-arrows-h", 
	__("fa-arrows-v", "js_composer") => "fa-arrows-v", 
	__("fa-caret-down", "js_composer") => "fa-caret-down", 
	__("fa-caret-left", "js_composer") => "fa-caret-left", 
	__("fa-caret-right", "js_composer") => "fa-caret-right", 
	__("fa-caret-square-o-down", "js_composer") => "fa-caret-square-o-down", 
	__("fa-caret-square-o-left", "js_composer") => "fa-caret-square-o-left", 
	__("fa-caret-square-o-right", "js_composer") => "fa-caret-square-o-right", 
	__("fa-caret-square-o-up", "js_composer") => "fa-caret-square-o-up", 
	__("fa-caret-up", "js_composer") => "fa-caret-up", 
	__("fa-chevron-circle-down", "js_composer") => "fa-chevron-circle-down", 
	__("fa-chevron-circle-left", "js_composer") => "fa-chevron-circle-left", 
	__("fa-chevron-circle-right", "js_composer") => "fa-chevron-circle-right", 
	__("fa-chevron-circle-up", "js_composer") => "fa-chevron-circle-up", 
	__("fa-chevron-down", "js_composer") => "fa-chevron-down", 
	__("fa-chevron-left", "js_composer") => "fa-chevron-left", 
	__("fa-chevron-right", "js_composer") => "fa-chevron-right", 
	__("fa-chevron-up", "js_composer") => "fa-chevron-up", 
	__("fa-hand-o-down", "js_composer") => "fa-hand-o-down", 
	__("fa-hand-o-left", "js_composer") => "fa-hand-o-left", 
	__("fa-hand-o-right", "js_composer") => "fa-hand-o-right", 
	__("fa-hand-o-up", "js_composer") => "fa-hand-o-up", 
	__("fa-long-arrow-down", "js_composer") => "fa-long-arrow-down", 
	__("fa-long-arrow-left", "js_composer") => "fa-long-arrow-left", 
	__("fa-long-arrow-right", "js_composer") => "fa-long-arrow-right", 
	__("fa-long-arrow-up", "js_composer") => "fa-long-arrow-up", 
	__("fa-toggle-down", "js_composer") => "fa-toggle-down", 
	__("fa-toggle-left", "js_composer") => "fa-toggle-left", 
	__("fa-toggle-right", "js_composer") => "fa-toggle-right", 
	__("fa-toggle-up", "js_composer") => "fa-toggle-up", 
	__("fa-arrows-alt", "js_composer") => "fa-arrows-alt", 
	__("fa-backward", "js_composer") => "fa-backward", 
	__("fa-compress", "js_composer") => "fa-compress", 
	__("fa-eject", "js_composer") => "fa-eject", 
	__("fa-expand", "js_composer") => "fa-expand", 
	__("fa-fast-backward", "js_composer") => "fa-fast-backward", 
	__("fa-fast-forward", "js_composer") => "fa-fast-forward", 
	__("fa-forward", "js_composer") => "fa-forward", 
	__("fa-pause", "js_composer") => "fa-pause", 
	__("fa-play", "js_composer") => "fa-play", 
	__("fa-play-circle", "js_composer") => "fa-play-circle", 
	__("fa-play-circle-o", "js_composer") => "fa-play-circle-o", 
	__("fa-step-backward", "js_composer") => "fa-step-backward", 
	__("fa-step-forward", "js_composer") => "fa-step-forward", 
	__("fa-stop", "js_composer") => "fa-stop", 
	__("fa-youtube-play", "js_composer") => "fa-youtube-play", 
	__("fa-warning", "js_composer") => "fa-warning", 
	__("fa-adn", "js_composer") => "fa-adn", 
	__("fa-android", "js_composer") => "fa-android", 
	__("fa-angellist", "js_composer") => "fa-angellist", 
	__("fa-apple", "js_composer") => "fa-apple", 
	__("fa-behance", "js_composer") => "fa-behance", 
	__("fa-behance-square", "js_composer") => "fa-behance-square", 
	__("fa-bitbucket", "js_composer") => "fa-bitbucket", 
	__("fa-bitbucket-square", "js_composer") => "fa-bitbucket-square", 
	__("fa-bitcoin", "js_composer") => "fa-bitcoin", 
	__("fa-btc", "js_composer") => "fa-btc", 
	__("fa-cc-amex", "js_composer") => "fa-cc-amex", 
	__("fa-cc-discover", "js_composer") => "fa-cc-discover", 
	__("fa-cc-mastercard", "js_composer") => "fa-cc-mastercard", 
	__("fa-cc-paypal", "js_composer") => "fa-cc-paypal", 
	__("fa-cc-stripe", "js_composer") => "fa-cc-stripe", 
	__("fa-cc-visa", "js_composer") => "fa-cc-visa", 
	__("fa-codepen", "js_composer") => "fa-codepen", 
	__("fa-css3", "js_composer") => "fa-css3", 
	__("fa-delicious", "js_composer") => "fa-delicious", 
	__("fa-deviantart", "js_composer") => "fa-deviantart", 
	__("fa-digg", "js_composer") => "fa-digg", 
	__("fa-dribbble", "js_composer") => "fa-dribbble", 
	__("fa-dropbox", "js_composer") => "fa-dropbox", 
	__("fa-drupal", "js_composer") => "fa-drupal", 
	__("fa-empire", "js_composer") => "fa-empire", 
	__("fa-facebook", "js_composer") => "fa-facebook", 
	__("fa-facebook-square", "js_composer") => "fa-facebook-square", 
	__("fa-flickr", "js_composer") => "fa-flickr", 
	__("fa-foursquare", "js_composer") => "fa-foursquare", 
	__("fa-ge", "js_composer") => "fa-ge", 
	__("fa-git", "js_composer") => "fa-git", 
	__("fa-git-square", "js_composer") => "fa-git-square", 
	__("fa-github", "js_composer") => "fa-github", 
	__("fa-github-alt", "js_composer") => "fa-github-alt", 
	__("fa-github-square", "js_composer") => "fa-github-square", 
	__("fa-gittip", "js_composer") => "fa-gittip", 
	__("fa-google", "js_composer") => "fa-google", 
	__("fa-google-plus", "js_composer") => "fa-google-plus", 
	__("fa-google-plus-square", "js_composer") => "fa-google-plus-square", 
	__("fa-google-wallet", "js_composer") => "fa-google-wallet", 
	__("fa-hacker-news", "js_composer") => "fa-hacker-news", 
	__("fa-html5", "js_composer") => "fa-html5", 
	__("fa-instagram", "js_composer") => "fa-instagram", 
	__("fa-ioxhost", "js_composer") => "fa-ioxhost", 
	__("fa-joomla", "js_composer") => "fa-joomla", 
	__("fa-jsfiddle", "js_composer") => "fa-jsfiddle", 
	__("fa-lastfm", "js_composer") => "fa-lastfm", 
	__("fa-lastfm-square", "js_composer") => "fa-lastfm-square", 
	__("fa-linkedin", "js_composer") => "fa-linkedin", 
	__("fa-linkedin-square", "js_composer") => "fa-linkedin-square", 
	__("fa-linux", "js_composer") => "fa-linux", 
	__("fa-maxcdn", "js_composer") => "fa-maxcdn", 
	__("fa-meanpath", "js_composer") => "fa-meanpath", 
	__("fa-openid", "js_composer") => "fa-openid", 
	__("fa-pagelines", "js_composer") => "fa-pagelines", 
	__("fa-paypal", "js_composer") => "fa-paypal", 
	__("fa-pied-piper", "js_composer") => "fa-pied-piper", 
	__("fa-pied-piper-alt", "js_composer") => "fa-pied-piper-alt", 
	__("fa-pinterest", "js_composer") => "fa-pinterest", 
	__("fa-pinterest-square", "js_composer") => "fa-pinterest-square", 
	__("fa-qq", "js_composer") => "fa-qq", 
	__("fa-ra", "js_composer") => "fa-ra", 
	__("fa-rebel", "js_composer") => "fa-rebel", 
	__("fa-reddit", "js_composer") => "fa-reddit", 
	__("fa-reddit-square", "js_composer") => "fa-reddit-square", 
	__("fa-renren", "js_composer") => "fa-renren", 
	__("fa-share-alt", "js_composer") => "fa-share-alt", 
	__("fa-share-alt-square", "js_composer") => "fa-share-alt-square", 
	__("fa-skype", "js_composer") => "fa-skype", 
	__("fa-slack", "js_composer") => "fa-slack", 
	__("fa-slideshare", "js_composer") => "fa-slideshare", 
	__("fa-soundcloud", "js_composer") => "fa-soundcloud", 
	__("fa-spotify", "js_composer") => "fa-spotify", 
	__("fa-stack-exchange", "js_composer") => "fa-stack-exchange", 
	__("fa-stack-overflow", "js_composer") => "fa-stack-overflow", 
	__("fa-steam", "js_composer") => "fa-steam", 
	__("fa-steam-square", "js_composer") => "fa-steam-square", 
	__("fa-stumbleupon", "js_composer") => "fa-stumbleupon", 
	__("fa-stumbleupon-circle", "js_composer") => "fa-stumbleupon-circle", 
	__("fa-tencent-weibo", "js_composer") => "fa-tencent-weibo", 
	__("fa-trello", "js_composer") => "fa-trello", 
	__("fa-tumblr", "js_composer") => "fa-tumblr", 
	__("fa-tumblr-square", "js_composer") => "fa-tumblr-square", 
	__("fa-twitch", "js_composer") => "fa-twitch", 
	__("fa-twitter", "js_composer") => "fa-twitter", 
	__("fa-twitter-square", "js_composer") => "fa-twitter-square", 
	__("fa-vimeo-square", "js_composer") => "fa-vimeo-square", 
	__("fa-vine", "js_composer") => "fa-vine", 
	__("fa-vk", "js_composer") => "fa-vk", 
	__("fa-wechat", "js_composer") => "fa-wechat", 
	__("fa-weibo", "js_composer") => "fa-weibo", 
	__("fa-weixin", "js_composer") => "fa-weixin", 
	__("fa-windows", "js_composer") => "fa-windows", 
	__("fa-wordpress", "js_composer") => "fa-wordpress", 
	__("fa-xing", "js_composer") => "fa-xing", 
	__("fa-xing-square", "js_composer") => "fa-xing-square", 
	__("fa-yahoo", "js_composer") => "fa-yahoo", 
	__("fa-yelp", "js_composer") => "fa-yelp", 
	__("fa-youtube", "js_composer") => "fa-youtube", 
	__("fa-youtube-play", "js_composer") => "fa-youtube-play", 
	__("fa-youtube-square", "js_composer") => "fa-youtube-square", 
	__("fa-ambulance", "js_composer") => "fa-ambulance", 
	__("fa-h-square", "js_composer") => "fa-h-square", 
	__("fa-hospital-o", "js_composer") => "fa-hospital-o", 
	__("fa-medkit", "js_composer") => "fa-medkit", 
	__("fa-plus-square", "js_composer") => "fa-plus-square", 
	__("fa-stethoscope", "js_composer") => "fa-stethoscope", 
	__("fa-user-md", "js_composer") => "fa-user-md", 
	__("fa-wheelchair", "js_composer") => "fa-wheelchair", 
	__("fa-flag", "js_composer") => "fa-flag", 
	__("fa-maxcdn", "js_composer") => "fa-maxcdn"
);

$entypo_icons = array(
	__("phone", "js_composer") => "phone", 
	__("mobile", "js_composer") => "mobile", 
	__("mouse", "js_composer") => "mouse", 
	__("address", "js_composer") => "address", 
	__("mail", "js_composer") => "mail", 
	__("paper-plane", "js_composer") => "paper-plane", 
	__("pencil", "js_composer") => "pencil", 
	__("feather", "js_composer") => "feather", 
	__("attach", "js_composer") => "attach", 
	__("inbox", "js_composer") => "inbox", 
	__("reply", "js_composer") => "reply", 
	__("reply-all", "js_composer") => "reply-all", 
	__("forward", "js_composer") => "forward", 
	__("user", "js_composer") => "user", 
	__("users", "js_composer") => "users", 
	__("add-user", "js_composer") => "add-user", 
	__("vcard", "js_composer") => "vcard", 
	__("export", "js_composer") => "export", 
	__("location", "js_composer") => "location", 
	__("map", "js_composer") => "map", 
	__("compass", "js_composer") => "compass", 
	__("direction", "js_composer") => "direction", 
	__("hair-cross", "js_composer") => "hair-cross", 
	__("share", "js_composer") => "share", 
	__("shareable", "js_composer") => "shareable", 
	__("heart", "js_composer") => "heart", 
	__("heart-empty", "js_composer") => "heart-empty", 
	__("star", "js_composer") => "star", 
	__("star-empty", "js_composer") => "star-empty", 
	__("thumbs-up", "js_composer") => "thumbs-up", 
	__("thumbs-down", "js_composer") => "thumbs-down", 
	__("chat", "js_composer") => "chat", 
	__("ecomment", "js_composer") => "ecomment", 
	__("quote", "js_composer") => "quote", 
	__("home", "js_composer") => "home", 
	__("popup", "js_composer") => "popup", 
	__("search", "js_composer") => "search", 
	__("flashlight", "js_composer") => "flashlight", 
	__("print", "js_composer") => "print", 
	__("bell", "js_composer") => "bell", 
	__("link", "js_composer") => "link", 
	__("flag", "js_composer") => "flag", 
	__("cog", "js_composer") => "cog", 
	__("tools", "js_composer") => "tools", 
	__("trophy", "js_composer") => "trophy", 
	__("etag", "js_composer") => "etag", 
	__("camera", "js_composer") => "camera", 
	__("megaphone", "js_composer") => "megaphone", 
	__("moon", "js_composer") => "moon", 
	__("palette", "js_composer") => "palette", 
	__("leaf", "js_composer") => "leaf", 
	__("note", "js_composer") => "note", 
	__("beamed-note", "js_composer") => "beamed-note", 
	__("new", "js_composer") => "new", 
	__("graduation-cap", "js_composer") => "graduation-cap", 
	__("book", "js_composer") => "book", 
	__("newspaper", "js_composer") => "newspaper", 
	__("bag", "js_composer") => "bag", 
	__("airplane", "js_composer") => "airplane", 
	__("lifebuoy", "js_composer") => "lifebuoy", 
	__("eye", "js_composer") => "eye", 
	__("clock", "js_composer") => "clock", 
	__("mic", "js_composer") => "mic", 
	__("calendar", "js_composer") => "calendar", 
	__("flash", "js_composer") => "flash", 
	__("thunder-cloud", "js_composer") => "thunder-cloud", 
	__("droplet", "js_composer") => "droplet", 
	__("cd", "js_composer") => "cd", 
	__("briefcase", "js_composer") => "briefcase", 
	__("air", "js_composer") => "air", 
	__("hourglass", "js_composer") => "hourglass", 
	__("gauge", "js_composer") => "gauge", 
	__("language", "js_composer") => "language", 
	__("network", "js_composer") => "network", 
	__("key", "js_composer") => "key", 
	__("battery", "js_composer") => "battery", 
	__("bucket", "js_composer") => "bucket", 
	__("magnet", "js_composer") => "magnet", 
	__("drive", "js_composer") => "drive", 
	__("cup", "js_composer") => "cup", 
	__("rocket", "js_composer") => "rocket", 
	__("brush", "js_composer") => "brush", 
	__("suitcase", "js_composer") => "suitcase", 
	__("traffic-cone", "js_composer") => "traffic-cone", 
	__("globe", "js_composer") => "globe", 
	__("keyboard", "js_composer") => "keyboard", 
	__("browser", "js_composer") => "browser", 
	__("publish", "js_composer") => "publish", 
	__("progress-3", "js_composer") => "progress-3", 
	__("progress-2", "js_composer") => "progress-2", 
	__("progress-1", "js_composer") => "progress-1", 
	__("progress-0", "js_composer") => "progress-0", 
	__("light-down", "js_composer") => "light-down", 
	__("light-up", "js_composer") => "light-up", 
	__("adjust", "js_composer") => "adjust", 
	__("code", "js_composer") => "code", 
	__("monitor", "js_composer") => "monitor", 
	__("infinity", "js_composer") => "infinity", 
	__("light-bulb", "js_composer") => "light-bulb", 
	__("credit-card", "js_composer") => "credit-card", 
	__("database", "js_composer") => "database", 
	__("voicemail", "js_composer") => "voicemail", 
	__("clipboard", "js_composer") => "clipboard", 
	__("cart", "js_composer") => "cart", 
	__("box", "js_composer") => "box", 
	__("ticket", "js_composer") => "ticket", 
	__("rss", "js_composer") => "rss", 
	__("signal", "js_composer") => "signal", 
	__("thermometer", "js_composer") => "thermometer", 
	__("water", "js_composer") => "water", 
	__("sweden", "js_composer") => "sweden", 
	__("line-graph", "js_composer") => "line-graph", 
	__("pie-chart", "js_composer") => "pie-chart", 
	__("bar-graph", "js_composer") => "bar-graph", 
	__("area-graph", "js_composer") => "area-graph", 
	__("lock", "js_composer") => "lock", 
	__("lock-open", "js_composer") => "lock-open", 
	__("logout", "js_composer") => "logout", 
	__("login", "js_composer") => "login", 
	__("check", "js_composer") => "check", 
	__("cross", "js_composer") => "cross", 
	__("squared-minus", "js_composer") => "squared-minus", 
	__("squared-plus", "js_composer") => "squared-plus", 
	__("squared-cross", "js_composer") => "squared-cross", 
	__("circled-minus", "js_composer") => "circled-minus", 
	__("circled-plus", "js_composer") => "circled-plus", 
	__("circled-cross", "js_composer") => "circled-cross", 
	__("minus", "js_composer") => "minus", 
	__("plus", "js_composer") => "plus", 
	__("erase", "js_composer") => "erase", 
	__("block", "js_composer") => "block", 
	__("info", "js_composer") => "info", 
	__("circled-info", "js_composer") => "circled-info", 
	__("help", "js_composer") => "help", 
	__("circled-help", "js_composer") => "circled-help", 
	__("warning", "js_composer") => "warning", 
	__("cycle", "js_composer") => "cycle", 
	__("cw", "js_composer") => "cw", 
	__("ccw", "js_composer") => "ccw", 
	__("shuffle", "js_composer") => "shuffle", 
	__("back", "js_composer") => "back", 
	__("level-down", "js_composer") => "level-down", 
	__("retweet", "js_composer") => "retweet", 
	__("loop", "js_composer") => "loop", 
	__("back-in-time", "js_composer") => "back-in-time", 
	__("level-up", "js_composer") => "level-up", 
	__("switch", "js_composer") => "switch", 
	__("numbered-list", "js_composer") => "numbered-list", 
	__("add-to-list", "js_composer") => "add-to-list", 
	__("layout", "js_composer") => "layout", 
	__("list", "js_composer") => "list", 
	__("text-doc", "js_composer") => "text-doc", 
	__("text-doc-inverted", "js_composer") => "text-doc-inverted", 
	__("doc", "js_composer") => "doc", 
	__("docs", "js_composer") => "docs", 
	__("landscape-doc", "js_composer") => "landscape-doc", 
	__("picture", "js_composer") => "picture", 
	__("video", "js_composer") => "video", 
	__("music", "js_composer") => "music", 
	__("folder", "js_composer") => "folder", 
	__("archive", "js_composer") => "archive", 
	__("trash", "js_composer") => "trash", 
	__("upload", "js_composer") => "upload", 
	__("download", "js_composer") => "download", 
	__("save", "js_composer") => "save", 
	__("install", "js_composer") => "install", 
	__("cloud", "js_composer") => "cloud", 
	__("upload-cloud", "js_composer") => "upload-cloud", 
	__("bookmark", "js_composer") => "bookmark", 
	__("bookmarks", "js_composer") => "bookmarks", 
	__("open-book", "js_composer") => "open-book", 
	__("play", "js_composer") => "play", 
	__("paus", "js_composer") => "paus", 
	__("record", "js_composer") => "record", 
	__("stop", "js_composer") => "stop", 
	__("ff", "js_composer") => "ff", 
	__("fb", "js_composer") => "fb", 
	__("to-start", "js_composer") => "to-start", 
	__("to-end", "js_composer") => "to-end", 
	__("resize-full", "js_composer") => "resize-full", 
	__("resize-small", "js_composer") => "resize-small", 
	__("volume", "js_composer") => "volume", 
	__("sound", "js_composer") => "sound", 
	__("mute", "js_composer") => "mute", 
	__("flow-cascade", "js_composer") => "flow-cascade", 
	__("flow-branch", "js_composer") => "flow-branch", 
	__("flow-tree", "js_composer") => "flow-tree", 
	__("flow-line", "js_composer") => "flow-line", 
	__("flow-parallel", "js_composer") => "flow-parallel", 
	__("left-bold", "js_composer") => "left-bold", 
	__("down-bold", "js_composer") => "down-bold", 
	__("up-bold", "js_composer") => "up-bold", 
	__("right-bold", "js_composer") => "right-bold", 
	__("left", "js_composer") => "left", 
	__("down", "js_composer") => "down", 
	__("up", "js_composer") => "up", 
	__("right", "js_composer") => "right", 
	__("circled-left", "js_composer") => "circled-left", 
	__("circled-down", "js_composer") => "circled-down", 
	__("circled-up", "js_composer") => "circled-up", 
	__("circled-right", "js_composer") => "circled-right", 
	__("triangle-left", "js_composer") => "triangle-left", 
	__("triangle-down", "js_composer") => "triangle-down", 
	__("triangle-up", "js_composer") => "triangle-up", 
	__("triangle-right", "js_composer") => "triangle-right", 
	__("chevron-left", "js_composer") => "chevron-left", 
	__("chevron-down", "js_composer") => "chevron-down", 
	__("chevron-up", "js_composer") => "chevron-up", 
	__("chevron-right", "js_composer") => "chevron-right", 
	__("chevron-small-left", "js_composer") => "chevron-small-left", 
	__("chevron-small-down", "js_composer") => "chevron-small-down", 
	__("chevron-small-up", "js_composer") => "chevron-small-up", 
	__("chevron-small-right", "js_composer") => "chevron-small-right", 
	__("chevron-thin-left", "js_composer") => "chevron-thin-left", 
	__("chevron-thin-down", "js_composer") => "chevron-thin-down", 
	__("chevron-thin-up", "js_composer") => "chevron-thin-up", 
	__("chevron-thin-right", "js_composer") => "chevron-thin-right", 
	__("left-thin", "js_composer") => "left-thin", 
	__("down-thin", "js_composer") => "down-thin", 
	__("up-thin", "js_composer") => "up-thin", 
	__("right-thin", "js_composer") => "right-thin", 
	__("arrow-combo", "js_composer") => "arrow-combo", 
	__("three-dots", "js_composer") => "three-dots", 
	__("two-dots", "js_composer") => "two-dots", 
	__("dot", "js_composer") => "dot", 
	__("cc", "js_composer") => "cc", 
	__("cc-by", "js_composer") => "cc-by", 
	__("cc-nc", "js_composer") => "cc-nc", 
	__("cc-nc-eu", "js_composer") => "cc-nc-eu", 
	__("cc-nc-jp", "js_composer") => "cc-nc-jp", 
	__("cc-sa", "js_composer") => "cc-sa", 
	__("cc-nd", "js_composer") => "cc-nd", 
	__("cc-pd", "js_composer") => "cc-pd", 
	__("cc-zero", "js_composer") => "cc-zero", 
	__("cc-share", "js_composer") => "cc-share", 
	__("cc-remix", "js_composer") => "cc-remix", 
	__("db-logo", "js_composer") => "db-logo", 
	__("db-shape", "js_composer") => "db-shape"
);

add_filter('wpb_widget_title', 'override_widget_title', 10, 2);
function override_widget_title($output = '', $params = array('')) {
  $extraclass = (isset($params['extraclass'])) ? " ".$params['extraclass'] : "";
  return '<h4 class="entry-title'.$extraclass.'">'.$params['title'].'</h4>';
}
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_posts_grid");

vc_remove_element("vc_pie");
vc_remove_element("vc_tour");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_carousel");


if ( function_exists( 'vc_map' ) ) :

	

	function vc_theme_vc_row($atts, $content = null) {
	   $output = $el_class = $full_width = $image = $section_id = $style = '';
		extract(shortcode_atts(array(
		    'el_class' => '',
		    'full_width' => '',
		    'image' => $image,
		    'section_id' => '',
		    'style' => ''
		), $atts));

		wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_script( 'wpb_composer_front_js' );
		wp_enqueue_style('js_composer_custom_css');

		//$el_class = $this->getExtraClass($el_class);

		if($full_width != 'true') {
			$css_class = 'row '.get_row_css_class().$el_class.' '.$style;
			$container_start = '<div class="container">';
			if($style == 'big-unit-box')
				$container_start .= '<div class="big-unit-box-inside">';
			$container_end = '</div>';
			$container_inner_start = $container_inner_end = '';
		}
		else {
			$css_class = 'full-width-row '.$el_class.' '.$style;
			$container_start = '';
			$container_end = '';
			$container_inner_start = $container_inner_end = '';
			if($style == 'big-unit-box') {
				$container_inner_start = '<div class="container"><div class="big-unit-box-inside">';
				$container_inner_end = '</div></div>';
			}

		}

		$image_url = wp_get_attachment_image_src( $image, 'full' );

		
		$output .= $container_start;
		if ($image_url != '')
			$output .= '<div class="'.$css_class.'" style="background-image: url('.$image_url[0].');" id="'.$section_id.'">';
		else
			$output .= '<div class="'.$css_class.'" id="'.$section_id.'">';

		$output .= $container_inner_start;
		$output .= wpb_js_remove_wpautop($content);
		$output .= $container_inner_end;
		$output .= '</div>';
		$output .= $container_end;

		return $output;
	}
	
	function vc_theme_vc_column_text($atts, $content = null) {
		$output = $el_class = $css_animation = $color = '';

		extract(shortcode_atts(array(
		    'el_class' => '',
		    'css_animation' => '',
		    'color' => ''
		), $atts));

		$el_class = WPBakeryShortCode_VC_Column_text::getExtraClass($el_class);

		$css_class = 'wpb_text_column wpb_content_element '.$el_class;
		$css_class .= WPBakeryShortCode_VC_Column_text::getCSSAnimation($css_animation);
		$output .= "\n\t".'<div class="'.$css_class.' '.$color.'">';
		$output .= "\n\t\t".'<div class="wpb_wrapper">';
		$output .= "\n\t\t\t".wpb_js_remove_wpautop($content, true);
		$output .= "\n\t\t".'</div> ' . WPBakeryShortCode_VC_Column_text::endBlockComment('.wpb_wrapper');
		$output .= "\n\t".'</div> ' . WPBakeryShortCode_VC_Column_text::endBlockComment('.wpb_text_column');


		return $output;
	}

	function vc_theme_vc_button($atts, $content = null) {
		$output = $color = $size = $icon = $target = $href = $el_class = $title = $position = $style = '';
		extract(shortcode_atts(array(
		    'color' => 'wpb_button',
		    'size' => '',
		    'icon' => 'none',
		    'target' => '_self',
		    'href' => '',
		    'el_class' => '',
		    'title' => __('Text on the button', "js_composer"),
		    'position' => '',
		    'style' => ''
		), $atts));
		$a_class = '';

		if ( $el_class != '' ) {
		    $tmp_class = explode(" ", strtolower($el_class));
		    $tmp_class = str_replace(".", "", $tmp_class);
		    if ( in_array("prettyphoto", $tmp_class) ) {
		        wp_enqueue_script( 'prettyphoto' );
		        wp_enqueue_style( 'prettyphoto' );
		        $a_class .= ' prettyphoto';
		        $el_class = str_ireplace("prettyphoto", "", $el_class);
		    }
		    if ( in_array("pull-right", $tmp_class) && $href != '' ) { $a_class .= ' pull-right'; $el_class = str_ireplace("pull-right", "", $el_class); }
		    if ( in_array("pull-left", $tmp_class) && $href != '' ) { $a_class .= ' pull-left'; $el_class = str_ireplace("pull-left", "", $el_class); }
		}

		if ( $target == 'same' || $target == '_self' ) { $target = ''; }
		$target = ( $target != '' ) ? ' target="'.$target.'"' : '';

		$color = ( $color != '' ) ? ' wpb_'.$color : '';
		$size = ( $size != '' && $size != 'wpb_regularsize' ) ? ' '.$size : ' '.$size;
		$icon = ( $icon != '' && $icon != 'none' ) ? ' '.$icon : '';
		$i_icon = ( $icon != '' ) ? ' <i class="fa '.$icon.'"></i>' : '';
		$position = ( $position != '' ) ? ' '.$position.'-button-position' : '';
		$el_class = WPBakeryShortCode_VC_Button::getExtraClass($el_class);

		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ''.$color.$size.$el_class.$position.' '.$invert, 'vc_button');

		if ( $href != '' ) {
		    $output = '<a class="btn '.$css_class.' '.$style.'" title="'.$title.'" href="'.$href.'"'.$target.'>' . $i_icon.$title . '</a>';
		} else {
		    $output .= '<button class="btn '.$css_class.' '.$style.'">'.$i_icon.$title.'</button>';
		}

		return $output . WPBakeryShortCode_VC_Button::endBlockComment('button') . "\n";
	}


	add_shortcode('vc_icon_box', 'vc_icon_box');

	function vc_theme_vc_tabs($atts, $content = null) {
		$output = $title = $interval = $el_class = '';
		extract(shortcode_atts(array(
		    'title' => '',
		    'interval' => 0,
		    'el_class' => ''
		), $atts));


		$element = 'wpb_tabs';
		//if ( 'vc_tour' == $this->shortcode) $element = 'wpb_tour';

		// Extract tab titles
		preg_match_all( '/vc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();

		/**
		 * vc_tabs
		 *
		 */
		if ( isset($matches[0]) ) { $tab_titles = $matches[0]; }
		$tabs_nav = '';
		$tabs_nav .= '<ul class="nav nav-tabs">';
		foreach ( $tab_titles as $tab ) {
		    preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
		    if(isset($tab_matches[1][0])) {
		        $tabs_nav .= '<li><a href="#tab-'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'" data-toggle="tab">' . $tab_matches[1][0] . '</a></li>';

		    }
		}
		$tabs_nav .= '</ul>'."\n";

		$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim($element.' wpb_content_element '.$el_class), 'vc_tabs');

		$output .= "\n\t".'<div class="'.$css_class.'" data-interval="'.$interval.'">';
		$output .= "\n\t\t".'<div class="wpb_wrapper wpb_tour_tabs_wrapper tabbable">';
		//$output .= wpb_widget_title(array('title' => $title, 'extraclass' => $element.'_heading'));
		if($title != '') {
			$output .= "<h4>".$title."</h4>";
		}
		$output .= "\n\t\t\t".$tabs_nav;
		$output .= "\n\t\t\t<div class='tab-content'>".wpb_js_remove_wpautop($content)."</div>";
		/*
		if ( 'vc_tour' == $this->shortcode) {
		    $output .= "\n\t\t\t" . '<div class="wpb_tour_next_prev_nav clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="'.__('Previous slide', 'js_composer').'">'.__('Previous slide', 'js_composer').'</a></span> <span class="wpb_next_slide"><a href="#next" title="'.__('Next slide', 'js_composer').'">'.__('Next slide', 'js_composer').'</a></span></div>';
		}
		*/
		$output .= "\n\t\t".'</div>';
		$output .= "\n\t".'</div>';

		return $output;
	}

	function vc_theme_vc_tab($atts, $content = null) {
		$output = $title = $tab_id = $icon = '';
		//extract(shortcode_atts($this->predefined_atts, $atts));
		extract(shortcode_atts(array(
		    'title' => '',
		    'tab_id' => '',
		    'icon' => ''
		), $atts));

		$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tab-pane', 'vc_tab');
		$output .= "\n\t\t\t" . '<div id="tab-'. (empty($tab_id) ? sanitize_title( $title ) : $tab_id) .'" class="'.$css_class.'" data-icon="'.$icon.'">';
		$output .= ($content=='' || $content==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
		$output .= "\n\t\t\t" . '</div> ';

		return $output;
	}

	function vc_spacer($atts, $content = null) {
		$output = $height = '';
		extract(shortcode_atts(array(
		    'height' => ''
		), $atts));

		$output = '<div class="space'.$height.'"></div>';

		return $output;
	}
	
	add_shortcode('vc_spacer', 'vc_spacer');

	

	function vc_theme_vc_posts_slider($atts, $content = null) {
		$output = $count = '';
		$custom_links  = $categories = '';
		$orderby = $order = $el_class = '';
		extract(shortcode_atts(array(
		    'count' => 3,
		    'categories' => '',
		    'orderby' => NULL,
		    'order' => 'DESC',
		    'el_class' => ''
		), $atts));
		ob_start();
		
		if($count == '' || $count == 'All') $count = -1;
		
		?>
			
			<div class="slider1 flexslider <?php echo $el_class; ?>">
			<ul class="slides">
			<?php
			$loop = new WP_Query( array( 'post_type' => 'slider', 'posts_per_page' => $count, 'order_by' => $orderby, 'order' => $order, 'category_name' => $categories ) );
			while ( $loop->have_posts() ) : $loop->the_post();
		        $id_post = $loop->post->ID; 
		        $url = wp_get_attachment_url( get_post_thumbnail_id($id_post) );
		        ?>
		        <li>
		        	<div class="slides-top square">
		        		<a href="<?php echo $url; ?>" data-rel="prettyPhoto[00]" title="">
		        			<?php the_post_thumbnail('home-slider'); ?>
		        		</a>
		        	</div>
		        </li>
		        <?php
		    endwhile;
		    wp_reset_query();
		    ?>
			</ul>
			</div>
			
		    <?php
		
		
	    $output .= ob_get_clean();
				

		return $output;
	}


	
	/*
	function vc_theme_vc_accordion_tab($atts, $content = null) {
		$output = $title = '';

		extract(shortcode_atts(array(
			'title' => __("Section", "js_composer")
		), $atts));

		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'panel panel-default', 'vc_accordion_tab');
		$output .= "\n\t\t\t" . '<div class="'.$css_class.'">';
			$output .= "\n\t\t\t\t" . '<div class="panel-heading">';
		    $output .= "\n\t\t\t\t\t" . '<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#'.sanitize_title($title).'">'.$title.'</a></h4>';
		    $output .= "\n\t\t\t\t" . '</div>';
		    $output .= "\n\t\t\t\t" . '<div id="'.sanitize_title($title).'" class="panel-collapse collapse"><div class="panel-body">';
		        $output .= ($content=='' || $content==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
		    $output .= "\n\t\t\t\t" . '</div></div>';
		    $output .= "\n\t\t\t" . '</div> ';

		return $output;
	}

	function vc_theme_vc_accordion($atts, $content = null) {
		$output = $title = $interval = $el_class = $collapsible = $active_tab = '';
		//
		extract(shortcode_atts(array(
		    'title' => '',
		    'interval' => 0,
		    'el_class' => '',
		    'collapsible' => 'no',
		    'active_tab' => '1'
		), $atts));

		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'panel-group '.$el_class, 'vc_accordion');

		if($title != '') { 
			$output .= '<h4>'.$title.'</h4>';
		}
		$output .= "\n\t".'<div class="'.$css_class.'" id="accordion">'; //data-interval="'.$interval.'"
		$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
		$output .= "\n\t".'</div> ';

		return $output;
	}

	*/
	function reno_list_post_categories($id_post) {
		$post_categories = wp_get_post_categories( $id_post );
		$cats = array();
		$numItems = count($post_categories);	
		$html = '';
		$i = 0;
		foreach($post_categories as $c){
			$cat = get_category( $c );
			$html .= $cat->slug;
			if(++$i !== $numItems) {
			    $html .= ',';
			}
		}
		return $html;
	}

	function vc_theme_vc_message($atts, $content = null) {

		$output = $color = $el_class = $css_animation = '';
		extract(shortcode_atts(array(
		    'color' => 'alert-info',
		    'el_class' => '',
		    'css_animation' => ''
		), $atts));

		if ($color == "alert-block") $color = "";
		$color = ( $color != '' ) ? ' '.$color : '';
		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'alert wpb_content_element'.$color.$el_class, 'vc_message');

		$output .= '<div class="'.$css_class.'"><button type="button" class="close" data-dismiss="alert">&times;</button><div class="messagebox_text clearfix">'.wpb_js_remove_wpautop($content, true).'</div></div>';

		return $output;

	}

	function vc_social_icons($atts, $content=null) {
		$output = $title = '';
		$adn = $android = $apple = $bitbucket = $css3 = $dribbble = $dropbox = $facebook = '';
		$flickr = $foursquare = $github = $google_plus = $html5 = $instagram = $linkedin = '';
		$renren = $skype = $stackexchange = $trello = $tumblr = $twitter = $vk = $weibo = $windows = '';
		$xing = $youtube = '';
		extract(shortcode_atts(array(
		    'title' => '',
		    'style' => '',
		    'adn' => '',
		    'android' => '',
		    'apple' => '',
		    'bitbucket' => '',
		    'css3' => '',
		    'dribbble' => '',
		    'dropbox' => '',
		    'facebook' => '',
		    'flickr' => '',
		    'foursquare' => '',
		    'github' => '',
		    'google_plus' => '',
		    'html5' => '',
		    'instagram' => '',
		    'linkedin' => '',
		    'renren' => '',
		    'skype' => '',
		    'stackexchange' => '',
		    'trello' => '',
		    'tumblr' => '',
			'twitter' => '',
			'vk' => '',
			'weibo' => '',
			'windows' => '',
			'xing' => '',
			'youtube' => ''
		), $atts));
		ob_start(); ?> 
		
			<?php if($title != '') { ?>
				<h4><?php echo $title; ?></h4>
			<?php } ?>
			<?php if($adn != '') { ?>
				<a href="<?php echo $adn; ?>" class="social-network"><i class="fa fa-adn"></i></a>
			<?php } ?>
			<?php if($android != '') { ?>
				<a href="<?php echo $android; ?>" class="social-network"><i class="fa fa-android"></i></a>
			<?php } ?>
			<?php if($apple != '') { ?>
				<a href="<?php echo $apple; ?>" class="social-network"><i class="fa fa-apple"></i></a>
			<?php } ?>
			<?php if($bitbucket != '') { ?>
				<a href="<?php echo $bitbucket; ?>" class="social-network"><i class="fa fa-bitbucket"></i></a>
			<?php } ?>
			<?php if($css3 != '') { ?>
				<a href="<?php echo $css3; ?>" class="social-network"><i class="fa fa-css3"></i></a>
			<?php } ?>
			<?php if($dribbble != '') { ?>
				<a href="<?php echo $dribbble; ?>" class="social-network"><i class="fa fa-dribbble"></i></a>
			<?php } ?>
			<?php if($dropbox != '') { ?>
				<a href="<?php echo $dropbox; ?>" class="social-network"><i class="fa fa-dropbox"></i></a>
			<?php } ?>
			<?php if($facebook != '') { ?>
				<a href="<?php echo $facebook; ?>" class="social-network"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			<?php if($flickr != '') { ?>
				<a href="<?php echo $flickr; ?>" class="social-network"><i class="fa fa-flickr"></i></a>
			<?php } ?>
			<?php if($foursquare != '') { ?>
				<a href="<?php echo $foursquare; ?>" class="social-network"><i class="fa fa-foursquare"></i></a>
			<?php } ?>
			<?php if($github != '') { ?>
				<a href="<?php echo $github; ?>" class="social-network"><i class="fa fa-github"></i></a>
			<?php } ?>
			<?php if($google_plus != '') { ?>
				<a href="<?php echo $google_plus; ?>" class="social-network"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			<?php if($html5 != '') { ?>
				<a href="<?php echo $html5; ?>" class="social-network"><i class="fa fa-html5"></i></a>
			<?php } ?>
			<?php if($instagram != '') { ?>
				<a href="<?php echo $instagram; ?>" class="social-network"><i class="fa fa-instagram"></i></a>
			<?php } ?>
			<?php if($linkedin != '') { ?>
				<a href="<?php echo $linkedin; ?>" class="social-network"><i class="fa fa-linkedin"></i></a>
			<?php } ?>
			<?php if($renren != '') { ?>
				<a href="<?php echo $renren; ?>" class="social-network"><i class="fa fa-renren"></i></a>
			<?php } ?>
			<?php if($skype != '') { ?>
				<a href="<?php echo $skype; ?>" class="social-network"><i class="fa fa-skype"></i></a>
			<?php } ?>
			<?php if($stackexchange != '') { ?>
				<a href="<?php echo $stackexchange; ?>" class="social-network"><i class="fa fa-stack-exchange"></i></a>
			<?php } ?>
			<?php if($trello != '') { ?>
				<a href="<?php echo $trello; ?>" class="social-network"><i class="fa fa-trello"></i></a>
			<?php } ?>
			<?php if($tumblr != '') { ?>
				<a href="<?php echo $tumblr; ?>" class="social-network"><i class="fa fa-tumblr"></i></a>
			<?php } ?>
			<?php if($twitter != '') { ?>
				<a href="<?php echo $twitter; ?>" class="social-network"><i class="fa fa-twitter"></i></a>
			<?php } ?>
			<?php if($vk != '') { ?>
				<a href="<?php echo $vk; ?>" class="social-network"><i class="fa fa-vk"></i></a>
			<?php } ?>
			<?php if($weibo != '') { ?>
				<a href="<?php echo $weibo; ?>" class="social-network"><i class="fa fa-weibo"></i></a>
			<?php } ?>
			<?php if($windows != '') { ?>
				<a href="<?php echo $windows; ?>" class="social-network"><i class="fa fa-windows"></i></a>
			<?php } ?>
			<?php if($xing != '') { ?>
				<a href="<?php echo $xing; ?>" class="social-network"><i class="fa fa-xing"></i></a>
			<?php } ?>
			<?php if($youtube != '') { ?>
				<a href="<?php echo $youtube; ?>" class="social-network"><i class="fa fa-youtube"></i></a>
			<?php } ?>
		
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}

	add_shortcode('vc_social_icons', 'vc_social_icons');

	function vc_theme_vc_single_image($atts, $content = null) {
		$output = $el_class = $image = $img_size = $img_link = $img_link_target = $img_link_large = $title = $css_animation = '';

		extract(shortcode_atts(array(
		    'title' => '',
		    'image' => $image,
		    'img_size'  => 'thumbnail',
		    'img_link_large' => false,
		    'img_link' => '',
		    'img_link_target' => '_self',
		    'el_class' => '',
		    'css_animation' => ''
		), $atts));

		$img_id = preg_replace('/[^\d]/', '', $image);
		$img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => $img_size ));
		if ( $img == NULL ) $img['thumbnail'] = '<img src="http://placekitten.com/g/400/300" /> <small>'.__('This is image placeholder, edit your page to replace it.', 'js_composer').'</small>';

		$a_class = ' class="popup-link"';
		if ( $el_class != '' ) {
		    $tmp_class = explode(" ", strtolower($el_class));
		    $tmp_class = str_replace(".", "", $tmp_class);
		    if ( in_array("prettyphoto", $tmp_class) ) {
		        wp_enqueue_script( 'prettyphoto' );
		        wp_enqueue_style( 'prettyphoto' );
		        $a_class = ' class="prettyphoto"';
		        $el_class = str_ireplace(" prettyphoto", "", $el_class);
		    }
		}

		$link_to = '';
		if ($img_link_large==true) {
		    $link_to = wp_get_attachment_image_src( $img_id, 'large');
		    $link_to = $link_to[0];
		}
		else if (!empty($img_link)) {
		    $link_to = $img_link;
		}
		if(!preg_match('/^(https?\:\/\/|\/\/)/', $link_to) && $link_to!='') $link_to = 'http://'.$link_to;
		$image_string = !empty($link_to) ? '<a'.$a_class.' href="'.$link_to.'"'.($img_link_target!='_self' ? ' target="'.$img_link_target.'"' : '').'>'.$img['thumbnail'].'</a>' : $img['thumbnail'];

		$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_single_image wpb_content_element'.$el_class, 'vc_single_image');
		

		$output .= "\n\t".'<div class="'.$css_class.'">';
		$output .= "\n\t\t".'<div class="wpb_wrapper">';
		$output .= "\n\t\t\t".wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_singleimage_heading'));
		$output .= "\n\t\t\t".$image_string;
		$output .= "\n\t\t".'</div> ';
		$output .= "\n\t".'</div> ';

		return $output;
	}

	

	function fa_icon($atts) {
		$output = $name = '';
		extract(shortcode_atts(array(
		    'name' => ''
		), $atts));
		$output = '<i class="fa '.$name.'"></i>';
		return $output;
	}
	add_shortcode('icon', 'fa_icon');

	function vc_circle_gallery($atts, $content=null) {
		$output = $image = $icon = $animation = $style = $el_class = '';
		extract(shortcode_atts(array(
		    'image' => $image,
		    'icon'  => '',
		    'style' => '',
		    'animation' => '',
		    'el_class' => '',
		), $atts));
		if($animation == '' || $animation == 'none')
			$animated = '';
		else
			$animated = 'animated';
		ob_start(); 
			$images = explode(',', $image);
			$url1 = wp_get_attachment_url( $images[0] );
			$generated_key = wp_generate_password(5, false, false);
			?>
			<div class="circle-gallery <?php echo $animated; ?> <?php echo $style; ?>" data-type="<?php echo $animation; ?>">
				<a href="<?php echo $url1; ?>" data-rel="prettyPhoto[<?php echo $generated_key; ?>]" title="">
		          <div class="square-all">
		            <div class="img-container">              
		              <?php echo wp_get_attachment_image( $images[0], 'circle-gallery', false, array('class'=>'img-circle') ); ?>
		              <i class="fa <?php echo $icon; ?>"></i>
		            </div>
		          </div>
		        </a>
		        <?php
		        $i = 1;
		        
		        foreach ($images as $key => $value) {
		        	$url = wp_get_attachment_url( $value );

		        	if($i!=1) {
		        		?>
		        		<a class="none" href="<?php echo $url; ?>" data-rel="prettyPhoto[<?php echo $generated_key; ?>]" title=""></a>
		        		<?php
		        	}
		        	$i++;
		        }
		        ?>
		        
			</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	add_shortcode('vc_circle_gallery', 'vc_circle_gallery');

	function vc_map_link($atts, $content=null) { 
		$output = $link = '';
		extract(shortcode_atts(array(
		    'link'  => '',
		), $atts));
		ob_start(); 
		?>
		<a rel="external" href="<?php echo $link; ?>"  title="<?php _e('Click to open Google map for exact location', 'vow'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/img/google_map.png" alt="google_map" class="img-210">
        </a> 
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}

	add_shortcode('vc_map_link', 'vc_map_link');

	function vc_big_gallery($atts, $content=null) {
		$output = $image = '';
		extract(shortcode_atts(array(
		    'image' => $image,
		), $atts));
		
		
		$output .= '<div class="big-gallery flexslider">
        	<ul class="slides">
        		<li>';
        			$images = explode(',', $image);
        			$i = 0;
        			foreach ($images as $id) {
						$i++;
						$src_original = wp_get_attachment_url($id);
						if ($i > 14 && $i%14 == 1) {
							$output .= '</li><li>';
						}
						if ($i%14 < 3 && $i%14 != 0) {
							$output .= 
							'<div class="portfolio-big square">
				                <a href="'.$src_original.'" data-rel="prettyPhoto[11]">
				    	          '.wp_get_attachment_image( $id, 'gallery-big' ).'
				                </a>
				              </div>';
						}
						if ($i%14 == 3) {
							
						}
						if ($i%14 >2 && $i%14 < 7) {
							$output .=
							'<div class="portfolio square">
				                <a href="'.$src_original.'" data-rel="prettyPhoto[11]">
				    	          '.wp_get_attachment_image( $id, 'gallery' ).'
				                </a>
				              </div>';
						}
						if ($i%14 == 7) {
							
						}
						if ($i%14 > 6 || $i%14 == 0) {
							$output .=
							'<div class="portfolio-small square">
				                <a href="'.$src_original.'" data-rel="prettyPhoto[11]">
				    	          '.wp_get_attachment_image( $id, 'slider-thumb' ).'
				                </a>
				              </div>';
						}
					}	
        			$output .= '
        		</li>
        	</ul>
        </div>';
		
		return $output;
	}
	add_shortcode('vc_big_gallery', 'vc_big_gallery');

	function vc_theme_vc_wp_posts($atts, $content = null) {
		$output = $title = $number = $el_class = '';
		extract( shortcode_atts( array(
		    'title' => __('Recent Posts'),
		    'number' => 'all',
		    'el_class' => ''
		), $atts ) );


		$output = '<div class="vc_wp_posts wpb_content_element '.$el_class.'">';
		$args = array();

		ob_start();
		if($title != '') {
			$output .= '<h1 class="blog-title">'.$title.'</h1>';
		}
		if($number == 'all' || $number == '') {
			$number = -1;
		}
		?>
		<div class="row">
			<div class="owl-carousel carousel-top-navigation">           
	          <?php
	          $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $number ) );
			    while ( $loop->have_posts() ) : $loop->the_post();
			        $id_post = $loop->post->ID; 
			        $url = wp_get_attachment_url( get_post_thumbnail_id($id_post) );
			        $post_categories = wp_get_post_categories( $id_post );	
			        $categories = '';
			        $i = 0;
					foreach($post_categories as $c){
						$i++;
						$cat = get_category( $c );
						if($i != count($post_categories)) {
							$categories .= '<a href="'.get_category_link( $c ).'">'.$cat->name.'</a> / ';
						}
						else {
							$categories .= '<a href="'.get_category_link( $c ).'">'.$cat->name.'</a>';
						}
					}
			        ?>
			        <div class="item"> 
			            <div class="blog-container">
			              
			              	<?php
			              	//echo get_post_type( $id_post );
			              	if(get_post_format( $id_post ) == 'video') {
			              		$link = get_post_meta($id_post, 'vow_vimeo_link', true);
								$id = explode('/', $link);

								echo '<iframe class="video-content video-content-small" src="http://player.vimeo.com/video/'.$id[3].'?title=0&amp;byline=0&amp;portrait=0" ></iframe>';
			              	} else {
			              	?>
				                <a href="<?php the_permalink(); ?>" title="">                  
				                  <?php the_post_thumbnail('recent-news'); ?>
				                </a>    
			                <?php
			                }
			                ?>                 
			              
			              <div class="blog-text">
			              	  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			              	  <h6><?php echo get_the_date().' - '; echo $categories; ?></h6>
			              	  <p><?php the_excerpt(); ?></p>
			              	  <a href="<?php the_permalink(); ?>" class="read-more" rel="external"><i class="fa fa-book"></i> <?php _e('Read more', 'vow'); ?></a>
			              </div>              
			            </div>              
			         </div>    
			        <?php
			          
			    endwhile;
			    wp_reset_query();
	          ?>
	               
	 
	        </div>
	    </div>
		<?php
		$output .= ob_get_clean();

		$output .= '</div>' . "\n";

		return $output;
	}

	function vc_comments_template() { 
		global $post;
		$output = '';
		ob_start();
		?>
		<?php if (comments_open($post->ID)){ ?>
				<?php comments_template( '', true ); ?>
		<?php } ?>

		<?php
		$output .= ob_get_clean();
		return $output;
	}

	add_shortcode('vc_comments_template', 'vc_comments_template');

	add_action('admin_init','shortcodes_maps_init');

	function shortcodes_maps_init() {

	global $animate_css;
	global $team_members;
	global $font_awesome_icons;
	global $entypo_icons;

	
	

	vc_add_param('vc_row',array(
	      "type" => "dropdown",
	      "heading" => __("Full width", "js_composer"),
	      "param_name" => "full_width",
	      "value" => array(__('No', "js_composer") => "false",__('Yes', "js_composer") => "true" ),
	      "description" => __("Do you want to display this row in full width?", "js_composer")
	    )
	);

	vc_add_param('vc_row',array(
	      "type" => "textfield",
	      "heading" => __("ID", "js_composer"),
	      "param_name" => "id",
	      "description" => __("Enter unique ID of the section. You will use this ID to add menu item.", "js_composer")
	    )
	);

	/*
	vc_map( array(
	  "name" => __("Text Block", "js_composer"),
	  "base" => "vc_column_text",
	  "icon" => "icon-wpb-layer-shape-text",
	  "wrapper_class" => "clearfix",
	  "category" => __('Content', 'js_composer'),
	  "params" => array(
	    array(
	      "type" => "textarea_html",
	      "holder" => "div",
	      "heading" => __("Text", "js_composer"),
	      "param_name" => "content",
	      "value" => __("<p>I am text block. Click edit button to change this text.</p>", "js_composer")
	    ),
	    $add_css_animation,
	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "js_composer"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	    )
	  
	  )
	) );
	*/
	/*toto
	vc_map( array(
	  "name" => __("Accordion", "js_composer"),
	  "base" => "vc_accordion",
	  "show_settings_on_create" => false,
	  "is_container" => true,
	  "icon" => "icon-wpb-ui-accordion",
	  "category" => __('Content', 'js_composer'),
	  "params" => array(
	    array(
	      "type" => "textfield",
	      "heading" => __("Widget title", "js_composer"),
	      "param_name" => "title",
	      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "js_composer"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	    )
	  ),
	  "custom_markup" => '
	  <div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
	  %content%
	  </div>
	  <div class="tab_controls">
	  <button class="add_tab" title="'.__("Add accordion section", "js_composer").'">'.__("Add accordion section", "js_composer").'</button>
	  </div>
	  ',
	  'default_content' => '
	  [vc_accordion_tab title="'.__('Section 1', "js_composer").'"][/vc_accordion_tab]
	  [vc_accordion_tab title="'.__('Section 2', "js_composer").'"][/vc_accordion_tab]
	  ',
	  'js_view' => 'VcAccordionView'
	) );

	/* Button
	---------------------------------------------------------- */

	vc_map( array(
	  "name" => __("Button", "js_composer"),
	  "base" => "vc_button",
	  "icon" => "icon-wpb-ui-button",
	  "category" => __('Content', 'js_composer'),
	  "params" => array(
	    array(
	      "type" => "textfield",
	      "heading" => __("Text on the button", "js_composer"),
	      "holder" => "button",
	      "class" => "wpb_button",
	      "param_name" => "title",
	      "value" => __("Text on the button", "js_composer"),
	      "description" => __("Text on the button.", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("URL (Link)", "js_composer"),
	      "param_name" => "href",
	      "description" => __("Button link.", "js_composer")
	    ),
	    
	    array(
	      "type" => "dropdown",
	      "heading" => __("Icon", "js_composer"),
	      "param_name" => "icon",
	      "value" => $font_awesome_icons,
	      "description" => __("Button icon.", "js_composer")
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Size", "js_composer"),
	      "param_name" => "size",
	      "value" => array(__('Default', "js_composer") => "", __('Large', "js_composer") => "btn-large", __('Small', "js_composer") => "btn-small", __('Mini', "js_composer") => "btn-mini"),
	      "description" => __("Button size.", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "js_composer"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Style", "js_composer"),
	      "param_name" => "style",
	      "value" => array(__('Default', "js_composer") => "", __('Color 2', "js_composer") => "bc-2", __('Color 3', "js_composer") => "bc-3", __('Color 4', "js_composer") => "bc-4" )
	    ),
	  ),
	  "js_view" => 'VcButtonView'
	) );

	vc_map( array(
	  "name" => __("Spacer", "js_composer"),
	  "base" => "vc_spacer",
	  "show_settings_on_create" => true,
	  "category" => __('Content', 'js_composer'),
	  "params" => array(
	    array(
	      "type" => "dropdown",
	      "heading" => __("Height", "js_composer"),
	      "param_name" => "height",
	      "value" => array('20px' => '20', '1px' => '1','5px' => '5','10px' => '10','15px' => '15', '25px' => '25','30px' => '30',
	      	'35px' => '35', '40px' => '40', '45px' => '45', '50px' => '50','55px' => '55','60px' => '60', '65px' => '65', '70px' => '70',
	      	'75px' => '75', '80px' => '80', '85px' => '85', '90px' => '90', '95px' => '95', '100px' => '100', '125px' => '125'),
	      "description" => __("Choose icon", "js_composer")
	    )
	   
	  ),
	  
	) );


	

	vc_map( array(
	  "name" => __("Home slider", "js_composer"),
	  "base" => "vc_posts_slider",
	  "icon" => "icon-wpb-slideshow",
	  "category" => __('Content', 'js_composer'),
	  "params" => array(
	    
	    
	    array(
	      "type" => "textfield",
	      "heading" => __("Slides count", "js_composer"),
	      "param_name" => "count",
	      "description" => __('How many slides to show? Enter number or word "All".', "js_composer")
	    ),
	    array(
	      "type" => "exploded_textarea",
	      "heading" => __("Categories", "js_composer"),
	      "param_name" => "categories",
	      "description" => __("If you want to narrow output, enter category slugs here. Note: Only listed categories will be included. Divide categories with commas (,).", "js_composer")
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Order by", "js_composer"),
	      "param_name" => "orderby",
	      "value" => array( "", __("Date", "js_composer") => "date", __("ID", "js_composer") => "ID", __("Author", "js_composer") => "author", __("Title", "js_composer") => "title", __("Modified", "js_composer") => "modified", __("Random", "js_composer") => "rand", __("Comment count", "js_composer") => "comment_count", __("Menu order", "js_composer") => "menu_order" ),
	      "description" => sprintf(__('Select how to sort retrieved posts. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Order", "js_composer"),
	      "param_name" => "order",
	      "value" => array( __("Descending", "js_composer") => "DESC", __("Ascending", "js_composer") => "ASC" ),
	      "description" => sprintf(__('Designates the ascending or descending order. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "js_composer"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	    )
	  )
	) );
	
	
	/*
	vc_map( array(
	  "name" => __("Tab", "js_composer"),
	  "base" => "vc_tab",
	  "allowed_container_element" => 'vc_row',
	  "is_container" => true,
	  "content_element" => false,
	  "params" => array(
	    array(
	      "type" => "textfield",
	      "heading" => __("Title", "js_composer"),
	      "param_name" => "title",
	      "description" => __("Tab title.", "js_composer")
	    ),
	    array(
	      "type" => "tab_id",
	      "heading" => __("Tab ID", "js_composer"),
	      "param_name" => "tab_id"
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Icon", "js_composer"),
	      "param_name" => "icon",
	      "value" => $font_awesome_icons,
	      "description" => __("Tab icon.", "js_composer")
	    ),
	  ),
	  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
	) );

	*/
	vc_map( array(
	  "name" => __("Social icons", "js_composer"),
	  "base" => "vc_social_icons",
	  "icon" => "icon-wpb-row",
	  "show_settings_on_create" => true,
	  "category" => __('Content', 'js_composer'),
	  "params" => array(
	  	array(
	      "type" => "textfield",
	      "heading" => __("Widget title", "js_composer"),
	      "param_name" => "title",
	    ),
	  	array(
	      "type" => "textfield",
	      "heading" => __("Adn", "js_composer"),
	      "param_name" => "adn",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Android", "js_composer"),
	      "param_name" => "android",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Apple", "js_composer"),
	      "param_name" => "apple",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Bitbucket", "js_composer"),
	      "param_name" => "bitbucket",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Css3", "js_composer"),
	      "param_name" => "css3",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Dribbble", "js_composer"),
	      "param_name" => "dribbble",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Dropbox", "js_composer"),
	      "param_name" => "dropbox",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Facebook", "js_composer"),
	      "param_name" => "facebook",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Flickr", "js_composer"),
	      "param_name" => "flickr",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Foursquare", "js_composer"),
	      "param_name" => "foursquare",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Github", "js_composer"),
	      "param_name" => "github",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Google plus", "js_composer"),
	      "param_name" => "google_plus",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("html5", "js_composer"),
	      "param_name" => "html5",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Instagram", "js_composer"),
	      "param_name" => "instagram",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Linkedin", "js_composer"),
	      "param_name" => "linkedin",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Renren", "js_composer"),
	      "param_name" => "renren",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Skype", "js_composer"),
	      "param_name" => "skype",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Stackexchange", "js_composer"),
	      "param_name" => "stackexchange",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Trello", "js_composer"),
	      "param_name" => "trello",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Tumblr", "js_composer"),
	      "param_name" => "tumblr",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Twitter", "js_composer"),
	      "param_name" => "twitter",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Vk", "js_composer"),
	      "param_name" => "vk",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Weibo", "js_composer"),
	      "param_name" => "weibo",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Windows", "js_composer"),
	      "param_name" => "windows",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Xing", "js_composer"),
	      "param_name" => "xing",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Youtube", "js_composer"),
	      "param_name" => "youtube",
	    ),
	  ),
	) );

	
	/*
	vc_map( array(
	  "name" => __("Single Image", "js_composer"),
	  "base" => "vc_single_image",
	  "icon" => "icon-wpb-single-image",
	  "category" => __('Content', 'js_composer'),
	  "params" => array(
	    array(
	      "type" => "textfield",
	      "heading" => __("Widget title", "js_composer"),
	      "param_name" => "title",
	      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
	    ),
	    array(
	      "type" => "attach_image",
	      "heading" => __("Image", "js_composer"),
	      "param_name" => "image",
	      "value" => "",
	      "description" => __("Select image from media library.", "js_composer")
	    ),
	    $add_css_animation,
	    array(
	      "type" => "textfield",
	      "heading" => __("Image size", "js_composer"),
	      "param_name" => "img_size",
	      "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "js_composer")
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Link to large image?", "js_composer"),
	      "param_name" => "img_link_large",
	      "description" => __("If selected, image will be linked to the bigger image.", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'yes')
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Image link", "js_composer"),
	      "param_name" => "img_link",
	      "description" => __("Enter url if you want this image to have link.", "js_composer"),
	      "dependency" => Array('element' => "img_link_large", 'is_empty' => true, 'callback' => 'wpb_single_image_img_link_dependency_callback')
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Link Target", "js_composer"),
	      "param_name" => "img_link_target",
	      "value" => $target_arr,
	      "dependency" => Array('element' => "img_link", 'not_empty' => true)
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "js_composer"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	    )
	  )
	));
	*/
	vc_map( array(
	  "name" => __("Circle gallery", "js_composer"),
	  "base" => "vc_circle_gallery",
	  "icon" => "icon-wpb-single-image",
	  "category" => __('Content', 'js_composer'),
	  "params" => array(
	    
	    array(
	      "type" => "attach_images",
	      "heading" => __("Image", "js_composer"),
	      "param_name" => "image",
	      "value" => "",
	      "description" => __("Select images from media library.", "js_composer")
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Style", "js_composer"),
	      "param_name" => "style",
	      "value" => array(__('Big', "js_composer") => "",__('Small', "js_composer") => "small" ),
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Icon", "js_composer"),
	      "param_name" => "icon",
	      "value" => $font_awesome_icons,
	      "description" => __("Button icon.", "js_composer")
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("CSS Animation", "js_composer"),
	      "param_name" => "animation",
	      "value" => $animate_css,
	      "description" => __("Choose animation on object appearance", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "js_composer"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	    )
	  )
	));

	vc_map( array(
	  "name" => __("Big gallery", "js_composer"),
	  "base" => "vc_big_gallery",
	  "icon" => "icon-wpb-single-image",
	  "category" => __('Content', 'js_composer'),
	  "params" => array(
	    
	    array(
	      "type" => "attach_images",
	      "heading" => __("Image", "js_composer"),
	      "param_name" => "image",
	      "value" => "",
	      "description" => __("Select images from media library.", "js_composer")
	    ),
	  
	  )
	));
	
	vc_map( array(
	  "name" => __("Comments template", "js_composer"),
	  "base" => "vc_comments_template",
	  "icon" => "icon-wpb-row",
	  "show_settings_on_create" => false,
	  "category" => __('Content', 'js_composer'),
	  
	));

	vc_map( array(
	  "name" => __("Map link", "js_composer"),
	  "base" => "vc_map_link",
	  "icon" => "icon-wpb-single-image",
	  "category" => __('Content', 'js_composer'),
	  "params" => array(
	    
	    array(
	      "type" => "textfield",
	      "heading" => __("Map link", "js_composer"),
	      "param_name" => "link",
	      "description" => __("Insert google map link", "js_composer")
	    )
	  )
	));
	
	vc_map( array(
	  "name" => 'WP ' . __("Recent Posts"),
	  "base" => "vc_wp_posts",
	  "icon" => "icon-wpb-wp",
	  "category" => __("WordPress Widgets", "js_composer"),
	  "class" => "wpb_vc_wp_widget",
	  "params" => array(
	    array(
	      "type" => "textfield",
	      "heading" => __("Widget title", "js_composer"),
	      "param_name" => "title",
	      "description" => __("What text use as a widget title. Leave blank to use default widget title.", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Number of posts to show", "js_composer"),
	      "param_name" => "number",
	      "admin_label" => true,
	      "description" => __("Enter number of posts or word 'all' to display all posts", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "js_composer"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	    )
	  )
	) );

	}
endif;


?>