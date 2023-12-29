<?php

class Rkit_SocialShare extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'rtm-social_share';
    }

    public function get_title()
    {
        return 'Social Share';
    }

    public function get_icon()
    {
        return 'rkit-widget-icon eicon-social-icons';
    }

    public function get_keywords()
    {
        return ['social', 'rtm', 'share', 'social share'];
    }

    function get_custom_help_url()
    {
        return 'https://rometheme.net/romethemekit/';
    }

    public function get_categories()
    {
        return ['romethemekit_widgets'];
    }

    public function get_style_depends()
    {
        return ['rkit-social-share'];
    }

    public function get_script_depends()
    {
        return ['social-share-script'];
    }
    protected function register_controls()
    {
        $this->start_controls_section('social_content', [
            'label' => esc_html('Social Media'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]);

        $this->add_control('select_style', [
            'label' => esc_html__('Choose Style', 'rometheme-for-elementor'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'icon' => esc_html('Icon'),
                'text' => esc_html('Text'),
                'both' => esc_html('Both')
            ],
            'default' => 'icon'
        ]);

        $this->add_control(
            'icon_spacing',
            [
                'label' => esc_html__('Icon Spacing', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rkit-social-share__icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'select_style' => 'both'
                ]
            ]
        );

        $ss = new \Elementor\Repeater();

        $ss->add_control(
            'social_icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $ss->add_control('social_select', [
            'label' => esc_html__('Social Media', 'rometheme-for-elementor'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'facebook',
            'options' => [
                'facebook'      => esc_html__('Facebook', 'rometheme-for-elementor'),
                'twitter'       => esc_html__('Twitter', 'rometheme-for-elementor'),
                'pinterest'     => esc_html__('Pinterest', 'rometheme-for-elementor'),
                'linkedin'      => esc_html__('Linkedin', 'rometheme-for-elementor'),
                'quora'      => esc_html__('Quora', 'rometheme-for-elementor'),
                // 'tumblr'        => esc_html__('Tumblr', 'rometheme-for-elementor'),
                // 'snapchat'        => esc_html__( 'Snapchat', 'rometheme-for-elementor' ),
                // 'flicker'        => esc_html__('Flicker', 'rometheme-for-elementor'),
                // 'vkontakte'     => esc_html__('Vkontakte', 'rometheme-for-elementor'),
                // 'odnoklassniki' => esc_html__('Odnoklassniki', 'rometheme-for-elementor'),
                // 'moimir'        => esc_html__('Moimir', 'rometheme-for-elementor'),
                // 'live journal'   => esc_html__('Live journal', 'rometheme-for-elementor'),
                // 'blogger'       => esc_html__('Blogger', 'rometheme-for-elementor'),
                // 'digg'          => esc_html__('Digg', 'rometheme-for-elementor'),
                // 'evernote'      => esc_html__('Evernote', 'rometheme-for-elementor'),
                'reddit'        => esc_html__('Reddit', 'rometheme-for-elementor'),
                // 'delicious'     => esc_html__('Delicious', 'rometheme-for-elementor'),
                // 'stumbleupon'   => esc_html__('Stumbleupon', 'rometheme-for-elementor'),
                // 'pocket'        => esc_html__('Pocket', 'rometheme-for-elementor'),
                // 'surfingbird'   => esc_html__('Surfingbird', 'rometheme-for-elementor'),
                // 'liveinternet'  => esc_html__('Liveinternet', 'rometheme-for-elementor'),
                // 'buffer'        => esc_html__('Buffer', 'rometheme-for-elementor'),
                // 'instapaper'    => esc_html__('Instapaper', 'rometheme-for-elementor'),
                // 'xing'          => esc_html__('Xing', 'rometheme-for-elementor'),
                // 'wordpress'     => esc_html__('WordPress', 'rometheme-for-elementor'),
                // 'baidu'         => esc_html__('Baidu', 'rometheme-for-elementor'),
                // 'renren'        => esc_html__('Renren', 'rometheme-for-elementor'),
                // 'weibo'         => esc_html__('Weibo', 'rometheme-for-elementor'),
                // 'skype'         => esc_html__('Skype', 'rometheme-for-elementor'),
                'telegram'      => esc_html__('Telegram', 'rometheme-for-elementor'),
                'viber'         => esc_html__('Viber', 'rometheme-for-elementor'),
                'whatsapp'      => esc_html__('Whatsapp', 'rometheme-for-elementor'),
                'line'          => esc_html__('Line', 'rometheme-for-elementor'),
            ],
        ]);

        $ss->add_control('label_social', [
            'label' => esc_html__('Label', 'textdomain'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]);

        $ss->start_controls_tabs('social_tabs');

        $ss->start_controls_tab('social_tab_normal', ['label' => esc_html('Normal')]);

        $ss->add_control('social_color_normal', [
            'label' => esc_html('Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} > a svg path' => 'stroke: {{VALUE}}; fill: {{VALUE}};',
                '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-social-share__link' => 'color : {{VALUE}}',
            ]
        ]);

        $ss->add_control('social_bg_normal', [
            'label' => esc_html('Background Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-social-share__link' => 'background-color : {{VALUE}}',
            ]
        ]);

        $ss->end_controls_tab();

        $ss->start_controls_tab('social_tab_hover', ['label' => esc_html('Hover')]);

        $ss->add_control('social_color_hover', [
            'label' => esc_html('Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} > a:hover svg path' => 'stroke: {{VALUE}}; fill: {{VALUE}};',
                '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-social-share__link:hover' => 'color : {{VALUE}}',
            ]
        ]);

        $ss->add_control('social_bg_hover', [
            'label' => esc_html('Background Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-social-share__link:hover' => 'background-color : {{VALUE}}',
            ]
        ]);

        $ss->end_controls_tabs();

        $this->add_control('social_media', [
            'label' => esc_html('Add Social Media'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $ss->get_controls(),
            'default' => [
                [
                    'label_social' => 'Facebook',
                    'social_select' => 'facebook',
                    'social_icon' => ['value' => 'fab fa-facebook-f', 'library' => 'fa-brands'],
                    'social_color_normal' => '#3b5998',
                    'social_color_hover' => '#ffffff',
                    'social_bg_hover' => '#3b5998'
                ],
                [
                    'label_social' => 'Twitter',
                    'social_select' => 'twitter',
                    'social_icon' => ['value' => 'fab fa-twitter', 'library' => 'fa-brands'],
                    'social_color_normal' => '#1da1f2',
                    'social_color_hover' => '#ffffff',
                    'social_bg_hover' => '#1da1f2'
                ],
                [
                    'label_social' => 'Whatsapp',
                    'social_select' => 'whatsapp',
                    'social_icon' => ['value' => 'fab fa-whatsapp', 'library' => 'fa-brands'],
                    'social_color_normal' => '#19B206',
                    'social_color_hover' => '#ffffff',
                    'social_bg_hover' => '#19B206'
                ],
                [
                    'label_social' => 'Telegram',
                    'social_select' => 'telegram',
                    'social_icon' => ['value' => 'fab fa-telegram-plane', 'library' => 'fa-brands'],
                    'social_color_normal' => '#12BBDD',
                    'social_color_hover' => '#ffffff',
                    'social_bg_hover' => '#12BBDD'
                ],
            ],
            'title_field' => '{{{ label_social }}}',
        ]);

        $this->end_controls_section();

        $this->start_controls_section('social_media_style', ['label' => esc_html('Social Media'), 'tab' => \Elementor\Controls_Manager::TAB_STYLE]);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'social_typography',
                'selector' => '{{WRAPPER}} .rkit-social-share__link',
            ]
        );

        $this->add_responsive_control(
            'Social Direction',
            [
                'label' => esc_html__('Direction', 'textdomain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => esc_html__('Horizontal', 'textdomain'),
                        'icon' => 'eicon-arrow-right',
                    ],
                    'column' => [
                        'title' => esc_html__('Vertical', 'textdomain'),
                        'icon' => 'eicon-arrow-down',
                    ],
                ],
                'default' => 'row',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .rkit-social-media__list' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_alignment',
            [
                'label' => esc_html__('Alignment', 'textdomain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'textdomain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'textdomain'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .rkit-social-media__list' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .rkit-social-share__link' => 'justify-content: {{VALUE}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'border-radius',
            [
                'label' => esc_html__('Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .rkit-social-share__link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 18,
                    'unit' => 'px'
                ],
                'selectors' => [
                    '{{WRAPPER}} .rkit-social-share__icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_padding',
            [
                'label' => esc_html__('Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .rkit-social-share__link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .rkit-social-share__link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="rkit-social-share">
            <?php
            if ($settings['social_media']) {
                echo '<dl class="rkit-social-media__list">';
                foreach ($settings['social_media'] as $sm) {
            ?>
                    <dt class="elementor-repeater-item-<?php echo esc_attr($sm['_id']); ?>">
                        <?php
                        switch ($settings['select_style']) {
                            case 'icon':
                        ?>
                                <a type="button" data-social-media="<?php echo esc_attr($sm['social_select']) ?>" class="rkit-social-share__link">
                                    <?php \Elementor\Icons_Manager::render_icon($sm['social_icon'], ['aria-hidden' => 'true', 'class' => 'rkit-social-share__icon']); ?>
                                </a>
                            <?php
                                break;
                            case 'text':
                            ?>
                                <a type="button" data-social-media="<?php echo esc_attr($sm['social_select']) ?>" class="rkit-social-share__link">
                                    <?php echo ($sm['label_social']) ? esc_html($sm['label_social']) : esc_html(ucwords($sm['social_select'])) ?>
                                </a>
                            <?php
                                break;
                            case 'both':
                            ?>
                                <a type="button" data-social-media="<?php echo esc_attr($sm['social_select']) ?>" class="rkit-social-share__link">
                                    <?php \Elementor\Icons_Manager::render_icon($sm['social_icon'], ['aria-hidden' => 'true', 'class' => 'rkit-social-share__icon']); ?>
                                    <?php echo ($sm['label_social']) ? esc_html($sm['label_social']) : esc_html(ucwords($sm['social_select'])) ?>
                                </a>
                        <?php
                                break;
                        }
                        ?>
                    </dt>
            <?php
                }
                echo '</dl>';
            }
            ?>
        </div>
<?php
    }
}
