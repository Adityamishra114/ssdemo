<?php

namespace RomethemeKit;

use RomeTheme;

class RkitWidgets
{

    private $list_widgets;

    public function __construct()
    {
        $options = get_option('rkit-widget-options');

        if ($options == false) {
            $this->list_widgets = [
                'offcanvas' => [
                    'name' => 'Offcanvas',
                    'class_name' => 'Offcanvas_Rometheme',
                    'category' => 'header',
                    'status' => true,
                    'type' => 'free'
                ],
                'search' => [
                    'name' => 'Search',
                    'class_name' => 'Search_Rometheme',
                    'category' => 'header',
                    'status' => true,
                    'type' => 'free'
                ],
                'sitelogo' => [
                    'name' => 'Site Logo',
                    'class_name' => 'SiteLogo_Rometheme',
                    'category' => 'header',
                    'status' => true,
                    'type' => 'free'
                ],
                'headerinfo' => [
                    'name' => 'Header Info',
                    'class_name' => 'HeaderInfo_Rometheme',
                    'category' => 'header',
                    'status' => true,
                    'type' => 'free'
                ],
                'navmenu' => [
                    'name' => 'Nav Menu',
                    'class_name' => 'Nav_Menu_Rometheme',
                    'category' => 'header',
                    'status' => true,
                    'type' => 'free'
                ],
                'blogpost' => [
                    'name' => 'Blog Post',
                    'class_name' => 'Blog_Post_Rkit',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'cta' => [
                    'name' => 'Call To Action',
                    'class_name' => 'CTA_Rkit',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'blockquote' => [
                    'name' => 'Blockquote',
                    'class_name' => 'Rkit_BLockQuote',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'socialshare' => [
                    'name' => 'Social Share',
                    'class_name' => 'Rkit_SocialShare',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'team' => [
                    'name' => 'Team',
                    'class_name' => 'Rkit_Team',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'runningtext' => [
                    'name' => 'Text Marquee',
                    'class_name' => 'Rkit_RunningText',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'animatedheading' => [
                    'name' => 'Animated Heading',
                    'class_name' => 'Rkit_AnimatedHeading',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'cardslider' => [
                    'name' => 'Card Slider',
                    'class_name' => 'Rkit_CardSlider',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'accordion' => [
                    'name' => 'Accordion',
                    'class_name' => 'Rkit_Accordion',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'barchart' => [
                    'name' => 'Bar Chart',
                    'class_name' => 'Rkit_BarChart',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'linechart' => [
                    'name' => 'Line Chart',
                    'class_name' => 'Rkit_LineChart',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'piechart' => [
                    'name' => 'Pie Chart',
                    'class_name' => 'Rkit_PieChart',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'testimonialcarousel' => [
                    'name' => 'Testimonial Carousel',
                    'class_name' => 'Rkit_TestimonialCarousel',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'tabs' => [
                    'name' => 'Tabs',
                    'class_name' => 'Rkit_Tabs',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'progressbar' => [
                    'name' => 'Progress Bar',
                    'class_name' => 'Rkit_ProgressBar',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
                'counter' => [
                    'name' => 'Counter',
                    'class_name' => 'Rkit_Counter',
                    'category' => 'rkit',
                    'status' => true,
                    'type' => 'free'
                ],
            ];
            update_option('rkit-widget-options', $this->list_widgets);
        }
        add_action('admin_enqueue_scripts', [$this, 'register_style']);
        add_action('wp_ajax_save_options', [$this, 'save_options']);  
    }

    function register_style()
    {

        $screen = get_current_screen();
        if ($screen->id == 'romethemekit_page_rkit-widgets') {
            wp_enqueue_style('style', RomeTheme::module_url() . 'HeaderFooter/assets/css/style.css');
            wp_enqueue_script('widgetViewScript', RomeTheme::module_url() . 'widgets/assets/js/widget.js', ['jquery'], RomeTheme::rt_version());
            wp_localize_script('widgetViewScript', 'rometheme_ajax_url', array(
                'ajax_url' => admin_url('admin-ajax.php')
            ));
        }
    }

    function save_options()
    {
        $data = $_POST;
        $options = get_option('rkit-widget-options');

        unset($data['action']);

        foreach ( $data as $key => $value){
            $options[$key]['status'] = ($value == "true") ? true : false;
        }

        $update = update_option('rkit-widget-options', $options);

        if ($update) {
            echo wp_send_json_success('success');
        } else {
            echo wp_send_json_error('errorrr');
        }
        
    
    }
}
