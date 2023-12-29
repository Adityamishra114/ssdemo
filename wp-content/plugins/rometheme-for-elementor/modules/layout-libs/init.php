<?php

namespace Rkit\Modules\Libs;

class Init
{
    private $url;
    private static $instance;
    public function __construct()
    {
        $this->url = \RomeTheme::module_url() . 'layout-libs/';
        add_action('elementor/preview/enqueue_styles', [$this, 'preview_styles']);
        add_action('elementor/editor/after_enqueue_styles', [$this, 'editor_styles']);
        add_action('elementor/editor/before_enqueue_scripts', [$this, 'editor_scripts']);
        add_action( 'elementor/editor/footer', array( $this, 'script_var' ) );
    }

    public function preview_styles()
    {
        wp_enqueue_style('rkit-preview-style', $this->url . 'assets/css/preview.css');
    }

    public function editor_styles(){
        wp_enqueue_style('rkit-library-style', $this->url . 'assets/css/style.css');
    }

    public function editor_scripts()
    {
        wp_enqueue_script('rkit-library-script', $this->url . 'assets/js/script.js' , ['jquery']);
    }

    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function script_var(){
        ?>
        
        <script type="text/javascript">
            var rkitLO ={
                "btnIcon" : "<?php echo esc_url(\RomeTheme::module_url(). 'layout-libs/assets/images/rometheme.svg'); ?>" ,
                "api_url" : "<?php echo \RomeTheme::api_url(); ?>",
                "default_tab" : "page"
            };
        </script>
        
        <?php
    }
}
