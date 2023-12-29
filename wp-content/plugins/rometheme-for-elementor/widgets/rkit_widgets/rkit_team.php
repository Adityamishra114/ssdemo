<?php

class Rkit_Team extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'rtm-team';
    }
    public function get_title()
    {
        return 'Team';
    }
    public function get_keywords()
    {
        return ['rtm', 'team'];
    }
    public function get_icon()
    {
        return 'rkit-widget-icon eicon-person';
    }

    function get_custom_help_url()
    {
        return 'https://rometheme.net/romethemekit/';
    }

    public function get_style_depends()
    {
        return ['rkit-team-style'];
    }
    public function get_categories()
    {
        return ['romethemekit_widgets'];
    }
    protected function register_controls()
    {
        $this->start_controls_section('member_content_section', [
            'label' => esc_html('Member Content'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]);

        $this->add_control('select_style', [
            'label' => esc_html('Style'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'default' => esc_html('Default'),
                'social_on_hover' => esc_html('Social on Hover'),
                'overlay' => esc_html('Overlay'),
                'centered' => esc_html('Centered'),
            ],
            'default' => 'default'
        ]);

        $this->add_control(
            'member_image',
            [
                'label' => esc_html__('Choose Member    Image', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                'include' => [],
                'default' => 'large',
            ]
        );

        $this->add_control(
            'member_name',
            [
                'label' => esc_html__('Member Name', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Jon Doe', 'rometheme-for-elementor'),
                'placeholder' => esc_html__('Type member name here', 'rometheme-for-elementor'),
            ]
        );

        $this->add_control(
            'member_position',
            [
                'label' => esc_html__('Member Position', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Developer', 'rometheme-for-elementor'),
                'placeholder' => esc_html__('Type member position here', 'rometheme-for-elementor'),
            ]
        );

        $this->add_control(
            'member_description',
            [
                'label' => esc_html__('Member Description', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'rometheme-for-elementor'),
                'placeholder' => esc_html__('Type your description here', 'rometheme-for-elementor'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section('social_content', ['label' => esc_html('Social Media'), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $socmed = new \Elementor\Repeater();
        $socmed->add_control(
            'social_icon',
            [
                'label' => esc_html__('Icon', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );

        $socmed->add_control(
            'social_label',
            [
                'label' => esc_html__('Label', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your label here', 'rometheme-for-elementor'),
            ]
        );

        $socmed->add_control(
            'social_link',
            [
                'label' => esc_html__('Link', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'rometheme-for-elementor'),
                'options' => ['url'],
                'label_block' => true,
            ]
        );

        $socmed->start_controls_tabs('social_tabs');
        $socmed->start_controls_tab('social_tab_normal', ['label' => esc_html('Normal')]);
        $socmed->add_control('social_color_normal', [
            'label' => esc_html('Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-team__social_item' => 'color:{{VALUE}}'
            ]
        ]);
        $socmed->add_control('social_bg_normal', [
            'label' => esc_html('Background Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-team__social_item' => 'background-color:{{VALUE}}'
            ]
        ]);

        $socmed->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow_normal',
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-team__social_item',
            ]
        );

        $socmed->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_normal',
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-team__social_item',
            ]
        );

        $socmed->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_border_normal',
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-team__social_item',
            ]
        );

        $socmed->end_controls_tab();

        $socmed->start_controls_tab('social_tab_hover', ['label' => esc_html('Hover')]);
        $socmed->add_control('social_color_hover', [
            'label' => esc_html('Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-team__social_item:hover' => 'color:{{VALUE}}'
            ]
        ]);
        $socmed->add_control('social_bg_hover', [
            'label' => esc_html('Background Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-team__social_item:hover' => 'background-color:{{VALUE}}'
            ]
        ]);

        $socmed->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow_hover',
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-team__social_item:hover',
            ]
        );

        $socmed->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-team__social_item:hover',
            ]
        );

        $socmed->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_border_hover',
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .rkit-team__social_item:hover',
            ]
        );

        $socmed->end_controls_tab();

        $socmed->end_controls_tabs();

        $this->add_control('social_media_item', [
            'label' => esc_html('Add Social Media'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $socmed->get_controls(),
            'default' => [
                [
                    'social_icon' => ['value' => 'fab fa-facebook-f', 'library' => 'fa-brands'],
                    'social_label' => 'Facebook',
                    'social_link' => ['url' => 'https://facebook.com'],
                    'social_color_normal' => '#ffffff',
                    'social_bg_normal' => '#3b5998',
                ],
                [
                    'social_icon' => ['value' => 'fab fa-twitter', 'library' => 'fa-brands'],
                    'social_label' => 'Twitter',
                    'social_link' => ['url' => 'https://twitter.com'],
                    'social_color_normal' => '#ffffff',
                    'social_bg_normal' => '#1DA1F2',
                ],

                [
                    'social_icon' => ['value' => 'fab fa-instagram', 'library' => 'fa-brands'],
                    'social_label' => 'Twitter',
                    'social_link' => ['url' => 'https://instagram.com'],
                    'social_color_normal' => '#ffffff',
                    'social_bg_normal' => '#E1306C',
                ],
            ],
            'title_field' => '{{{ social_label }}}'
        ]);

        $this->end_controls_section();

        $this->start_controls_section('box_style', [
            'label' => esc_html('Style'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control(
            'content_align',
            [
                'label' => esc_html__('Alignment', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'rometheme-for-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'rometheme-for-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'rometheme-for-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__detail' => 'text-align: {{VALUE}}; justify-content:{{VALUE}}',
                    '{{WRAPPER}} .rkit-team__social' => 'justify-content:{{VALUE}}',
                ],
                'condition' => [
                    'select_style!' => 'centered'
                ]
            ]
        );
        $this->add_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control('profile_image_ratio', [
            'label' => esc_html('Member Image Ratio'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '1/1' => esc_html('1/1'),
                '3/2' => esc_html('3/2'),
                '5/4' => esc_html('5/4'),
                '16/9' => esc_html('16/9'),
                '9/16' => esc_html('9/16'),
                '4/5' => esc_html('4/5'),
                '2/3' => esc_html('2/3'),
            ],
            'default' => '3/2',
            'selectors' => [
                '{{WRAPPER}} .rkit-team__img img' => 'aspect-ratio:{{VALUE}}'
            ],
            'condition' => [
                'select_style!' => 'centered'
            ]
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'selector' => '{{WRAPPER}} .rkit-team-card',
            ]
        );

        $this->add_responsive_control(
            'profile_image_width',
            [
                'label' => esc_html__('Image Width', 'rometheme-for-elementor'),
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
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__centered .rkit-team__img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'select_style' => 'centered'
                ]
            ]
        );

        $this->add_control(
            'overlay_bg_options',
            [
                'label' => esc_html__('Overlay', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'select_style' => 'overlay'
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_overlay',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .rkit-team__overlay .rkit-team__detail',
                'condition' => [
                    'select_style' => 'overlay'
                ],
			]
		);
        

        $this->add_control(
            'name_content_option',
            [
                'label' => esc_html__('Name', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control('name_tag', [
            'label' => esc_html('Name Tag'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => esc_html('H1'),
                'h2' => esc_html('H2'),
                'h3' => esc_html('H3'),
                'h4' => esc_html('H4'),
                'h5' => esc_html('H5'),
                'h6' => esc_html('H6'),
            ],
            'default' => 'h4'
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .rkit-team__name',
            ]
        );


        $this->add_control(
            'role_content_option',
            [
                'label' => esc_html__('Member Position', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'role_typography',
                'selector' => '{{WRAPPER}} .rkit-team__role',
            ]
        );

        $this->add_control(
            'description_content_option',
            [
                'label' => esc_html__('Description', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'member_description!' => ''
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .rkit-team__description',
                'condition' => [
                    'member_description!' => ''
                ]
            ]
        );

        $this->add_control(
            'socmed_content_option',
            [
                'label' => esc_html__('Social Media', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__social_item' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_width',
            [
                'label' => esc_html__('Width', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__social_item' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'socmed_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__social_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'social_media_position',
            [
                'label' => esc_html__('Social Media Position', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'rometheme-for-elementor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'rometheme-for-elementor'),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'top' => [
                        'title' => esc_html__('Top', 'rometheme-for-elementor'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'bottom' => [
                        'title' => esc_html__('Bottom', 'rometheme-for-elementor'),
                        'icon' => ' eicon-v-align-bottom',
                    ],

                ],
                'default' => 'left',
                'toggle' => true,
                'condition' => [
                    'select_style' => 'social_on_hover',
                ]
            ]
        );

        $this->add_control(
            'horizontal_social_align',
            [
                'label' => esc_html__('Social Alignment', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'rometheme-for-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'rometheme-for-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'rometheme-for-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__social' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'select_style' => 'social_on_hover',
                    'social_media_position' => ['top', 'bottom']
                ]
            ]
        );

        $this->add_control('social_media_bg', [
            'label' => esc_html('Background Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-team__social' => 'background-color:{{VALUE}}'
            ],
            'condition' => [
                'select_style' => 'social_on_hover',
                'social_media_position' => ['top', 'bottom']
            ]
        ]);

        $this->end_controls_section();

        $this->start_controls_section('color_style', [
            'label' => esc_html('Color'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->start_controls_tabs('box_tabs');

        $this->start_controls_tab('box_tab_normal', ['label' => esc_html('Normal')]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_normal',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .rkit-team-card',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_normal',
                'selector' => '{{WRAPPER}} .rkit-team-card',
            ]
        );

        $this->add_control('name_color_normal', [
            'label' => esc_html('Name Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-team__name' => 'color:{{VALUE}}'
            ]
        ]);

        $this->add_control('role_color_normal', [
            'label' => esc_html('Member Position Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-team__role' => 'color:{{VALUE}}'
            ]
        ]);

        $this->add_control('description_color_normal', [
            'label' => esc_html('Description Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-team__description' => 'color:{{VALUE}}'
            ],
            'condition' => [
                'member_description!' => ''
            ]
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('box_tab_hover', ['label' => esc_html('Hover')]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_hover',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .rkit-team-card:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'selector' => '{{WRAPPER}} .rkit-team-card:hover',
            ]
        );

        $this->add_control('name_color_hover', [
            'label' => esc_html('Name Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-team-card:hover .rkit-team__name' => 'color:{{VALUE}}'
            ]
        ]);

        $this->add_control('role_color_hover', [
            'label' => esc_html('Member Position Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-team-card:hover .rkit-team__role' => 'color:{{VALUE}}'
            ]
        ]);

        $this->add_control('description_color_hover', [
            'label' => esc_html('Description Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-team-card:hover .rkit-team__description' => 'color:{{VALUE}}'
            ],
            'condition' => [
                'member_description!' => ''
            ]
        ]);

        $this->add_control('social_icon_color_hover', [
            'label' => esc_html('Social Icon Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-team-card:hover .rkit-team__social_item' => 'color:{{VALUE}}'
            ],
            'condition' => [
                'select_style!' => 'social_on_hover'
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section('spacing_style', [
            'label' => esc_html('Spacing'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]);

        $this->add_responsive_control(
            'box_padding',
            [
                'label' => esc_html__('Box Padding', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'select_style!' => 'overlay'
                ]
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Content Padding', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__detail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'social_margin',
            [
                'label' => esc_html__('Social Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__social ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_spacing',
            [
                'label' => esc_html__('Name Spacing', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 2,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'role_spacing',
            [
                'label' => esc_html__('Member Position Spacing', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 2,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__role' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => esc_html__('Description Spacing', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 2,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'member_description!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
            'socmed_spacing',
            [
                'label' => esc_html__('Social Media Spacing', 'rometheme-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 2,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rkit-team__social' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="rkit-team rkit-team__<?php echo ($settings['select_style'] != 'social_on_hover') ? esc_attr($settings['select_style']) : esc_attr($settings['select_style'] . '_' . $settings['social_media_position']) ?>">
            <div class="rkit-team-card">
                <div class="rkit-team__img">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'member_image'); ?>
                </div>
                <div class="rkit-team__detail">
                    <<?php echo esc_html($settings['name_tag']) ?> class="rkit-team__name"><?php echo esc_html($settings['member_name']) ?></<?php echo esc_html($settings['name_tag']) ?>>
                    <span class="rkit-team__role"><?php echo esc_html($settings['member_position']) ?></span>
                    <span class="rkit-team__description"><?php echo esc_html($settings['member_description']) ?></span>
                    <div class="rkit-team__social">
                        <?php
                        if ($settings['social_media_item']) {
                            foreach ($settings['social_media_item'] as $sm) {
                                echo '<div class="elementor-repeater-item-' . esc_attr($sm['_id']) . '">';
                                echo '<a class="rkit-team__social_item"  href="' . esc_url($sm['social_link']['url']) . '" > ';
                                \Elementor\Icons_Manager::render_icon($sm['social_icon'], ['aria-hidden' => 'true']);
                                echo ' </a>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
