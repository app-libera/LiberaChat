<?php

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

/*
 * Function that generates an entry in the Administration menu
 */
function liberachat_plugin_menu() {
    add_menu_page('Configuring LiberaChat',  //Page title 
        'App LiberaChat',                    //Menu title 
        'administrator',                     //Role with permissions 
        'liberachat_info',                   //Page id 
        'liberachat_settingspage',           //Playback function
     plugins_url('images/liberachat.png', dirname( __FILE__ ) ), //Icon
        61                                   //Position
        );

     add_submenu_page('liberachat_info',
        'Configuracion',
        'Info',                              //Submenu title
        'administrator',                     //Role with permissions 
        'liberachat_info',                   //Page id
        'liberachat_settingspage');          //Playback function 

     add_submenu_page('liberachat_info',
        'Configuracion',
        'Settings',                           //Submenu title
        'administrator',                      //Role with permissions
        'libera-chat-settings',               //Page id
        'libera_chat_settingspage');          //Playback function 

}

add_action('admin_menu', 'liberachat_plugin_menu');

/*
 * Function that records values in the internal DB
 */
function liberachat_info() {
	
    register_setting('liberachat-reg',
                     'liberachat_nick');
    register_setting('liberachat-reg',
                     'liberachat_server');
    register_setting('liberachat-reg',
                     'liberachat_chan');
    register_setting('liberachat-reg',
                     'liberachat_style');
    register_setting('liberachat-reg',
                     'liberachat_height');
    register_setting('liberachat-reg',
                     'liberachat_width');				 				 
}

add_action('admin_init', 'liberachat_info');


/*
 * Function that plays the main configuration page
 */
function liberachat_settingspage() {
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }

// Info APP LiberaChat options
include( APP_LIBERA_CHAT_PATH . 'admin/info_app_liberachat.php');

}

/*
 * Function that plays the main configuration page
 */
function libera_chat_settingspage() {
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }

    //Error message 
    if (isset($_GET['settings-updated'])) {
        add_settings_error('libera_messages', 'libera_message_ok', ('Updated values'), 'updated');
    }
    if (isset($_GET['settings-error'])) {
        add_settings_error('libera_messages', 'libera_message_error', ('A save error occurred'), 'error');
    }

    settings_errors('libera_messages');


// Kiwi APP LiberaChat options
include( APP_LIBERA_CHAT_PATH . 'admin/kiwi_app_liberachat.php');
	
}	
?>