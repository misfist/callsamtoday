<?php   
    /* 
    Plugin Name: Smartwaiver Waiver Widget
    Plugin URI: http://www.smartwaiver.com
    Description: Plugin for displaying customized Smartwaiver Waiver Widget.
    Author: Smartwaiver
    Version: 1.0 
    Author URI: http://www.smartwaiver.com
    */
    
    $SW_CONFIG_PAGE_TITLE = "Smartwaiver Setup";
    $SW_ADMIN_MENU_TEXT = "Smartwaiver";
    $SW_BUILD_SNIPPET_LINK = "https://www.smartwaiver.com/m/user/sw_login.php?wms_login=1&wms_login_username=&wms_login_redirect=%2Fm%2Fwebpl%2Fwebpl.php%3Fwebpl_create";
    $SW_REQUIRED_CAPABILITY = "manage_options"; // see http://codex.wordpress.org/Roles_and_Capabilities
    $SW_SETTINGS = "smartwaiver_settings";
    $SW_SETTINGS_FIELD = "smartwaiver_settings"; // db field name for settings arr
    $SW_SNIPPET = "smartwaiver_snippet"; // settings option name
    
    function smartwaiver_init(){
        global $SW_SETTINGS, $SW_SETTINGS_FIELD;
        register_setting($SW_SETTINGS, $SW_SETTINGS_FIELD);
    }
    add_action('admin_init', 'smartwaiver_init');
    
    function smartwaiver_admin_actions() {
        global $SW_CONFIG_PAGE_TITLE, $SW_ADMIN_MENU_TEXT, 
            $SW_REQUIRED_CAPABILITY;
        
        $config_link_slug = "smartwaiver_config_action";
        $config_page_content_handler = "smartwaiver_config_page";
        
        add_options_page(
            $SW_CONFIG_PAGE_TITLE, $SW_ADMIN_MENU_TEXT,
            $SW_REQUIRED_CAPABILITY, 1, //$config_link_slug,
            $config_page_content_handler
        );
    }
    add_action('admin_menu', 'smartwaiver_admin_actions');
    
    function smartwaiver_config_page() {
        global $SW_CONFIG_PAGE_TITLE, $SW_BUILD_SNIPPET_LINK,
            $SW_SETTINGS, $SW_SETTINGS_FIELD, $SW_SNIPPET;
        include('smartwaiver_config_page.php'); 
    }
    
    function add_sw_snippet_to_footer() {
        global $SW_SETTINGS_FIELD, $SW_SNIPPET;
        $sw_settings = get_option($SW_SETTINGS_FIELD);
        echo $sw_settings[$SW_SNIPPET];
    }
    add_action('wp_footer', 'add_sw_snippet_to_footer');
?>