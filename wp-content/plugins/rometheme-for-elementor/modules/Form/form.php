<?php

namespace RomethemeKit;

class Rkit_Rform
{
    /**
     * Member Variable
     *
     * @var instance
     */
    private static $instance;

    /**
     * Instance.
     *
     * Ensures only one instance of the plugin class is loaded or can be loaded.
     *
     * @since 2.6.3
     * @access public
     * @static
     *
     * @return Init An instance of the class.
     */
    public static function instance()
    {

        if (is_null(self::$instance)) {

            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Construct the plugin object.
     *
     * @since 2.6.3
     * @access public
     */

    function __construct()
    {
        add_action('admin_menu', [$this, 'add_menu_form'], 999);
        if (class_exists('RomeThemeForm')) {
            add_action('current_screen', [$this, 'redirect_to_romethemeform']);
        } 
    }

    function redirect_to_romethemeform()
    {
        $current_screen = get_current_screen();

        if (!empty($current_screen->id) && $current_screen->id === 'romethemekit_page_form') {
            wp_safe_redirect(admin_url('admin.php?page=romethemeform-form'));
            exit;
        }
    }

    function add_menu_form()
    {
        add_submenu_page(
            'romethemekit',
            esc_html('Form'),
            esc_html('Form'),
            'manage_options',
            'form',
            [$this, 'romethemeform_call'],
            10
        );
    }

    function romethemeform_call()
    {
        require_once \RomeTheme::module_dir() . 'Form/form-view.php';
    }    
}
