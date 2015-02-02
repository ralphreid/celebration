<?php
/*
Plugin Name: RSVP and Wedding Invitation
Plugin URI: http://craftedpixels.net
Description: RSVP and Wedding Invitation Plugin allows you to send email wedding invitations and allow your guests to RSVP online on your WordPress site. The RSVP form is complete, with Name, Email, Phone, Attendance (yes/no). If "I will attend" is selected, further options appear (Nr. of persons attending, Nr. of kids menus, Nr. of vegetarian menus). There are no invasive css styles, so the rsvp form will adapt to the design of your theme.
Version: 1.4
Author: CraftedPixels Team
License: GNU General Public License v3 or later
License URI: license.txt
*/

/*
    Copyright 2013 CraftedPixels Team - craftedpixels.net

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
global $wpdb;

load_plugin_textdomain('wi-rsvp', false, basename(dirname(__FILE__)) . '/languages');

require_once dirname(__FILE__) . '/classes/Rsvp.class.php';
$rsvp = new WrsvpRsvp($wpdb, __FILE__);

register_activation_hook( __FILE__, array($rsvp, 'activation'));
add_action('init', array($rsvp, 'init'));
add_action('wp_enqueue_scripts', array($rsvp, 'enqueueScripts'));
add_action('wp_ajax_email_validation', array($rsvp, 'setEmailValidation'));