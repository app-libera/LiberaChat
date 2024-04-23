<?php		
/*
 * Plugin Name:       App LiberaChat
 * Plugin URI:        https://github.com/app-libera/LiberaChat
 * Description:       The App LiberaChat plugin for WordPress allows you to use the chat service of the Libera.Chat network on your WordPress site.
 * Author:            KiwiChat
 * Version:           1.0.2
 * Author URI:        https://app-libera.github.io
 * License:           GPLv3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       app-liberachat
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/* Defines plugin's root version/path/urlbase */
define( 'APP_LIBERA_CHAT_VERSION', '1.0.2' );
define( 'APP_LIBERA_CHAT_PATH', plugin_dir_path( __FILE__ ) );
define( 'APP_LIBERA_CHAT_URLBASE', 'https://web.libera.chat' );

// Check if admin
if ( is_admin() ) {
// Admin plugin function path
    require_once( APP_LIBERA_CHAT_PATH . 'admin/admin.php' );
}
require_once( APP_LIBERA_CHAT_PATH . 'public/index.php' );


function liberachat_plugin_links( $actions, $plugin_file ) {
    static $plugin;

    if ( !isset($plugin) )
        $plugin = plugin_basename(__FILE__);

    if ( $plugin == $plugin_file ) {
        $settings = array('settings' => '<a href="admin.php?page=libera-chat-settings">Settings</a>');
        $site_link = array('support' => '<a href="https://github.com/app-libera/LiberaChat" target="_blank">Support</a>');
        $actions = array_merge($site_link, $actions);
        $actions = array_merge($settings, $actions);
    }
    return $actions;
}

add_filter( 'plugin_action_links', 'liberachat_plugin_links', 10, 5 );

/* We have set the default values */
function liberachat_set_defaults()
{
    $config = array(
	    'liberachat_server'    => 'https://web.libera.chat',
        'liberachat_nick'      => 'Guest?',
        'liberachat_style'     => 'default',
        'liberachat_chan'      => '#libera',
        'liberachat_height'    => '500',
        'liberachat_width'     => '100%',
    );

    foreach ( $config as $key => $value )
    {
        if (!get_option($key)) {
            update_option($key, $value);
        }
    }
}

register_activation_hook( __FILE__, 'liberachat_set_defaults');

?>