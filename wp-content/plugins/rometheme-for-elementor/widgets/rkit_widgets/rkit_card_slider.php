<?php

class Rkit_CardSlider extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'rkit-card-slider';
    }
    public function get_title()
    {
        return 'Card Slider';
    }
    public function get_icon()
    {
        return 'rkit-widget-icon eicon-nested-carousel';
    }

    public function get_categories()
    {
        return ['romethemekit_widgets'];
    }

    public function get_keywords()
    {
        return ['card', 'slider', 'carousel', 'rometheme'];
    }

    function get_custom_help_url()
    {
        return 'https://rometheme.net/romethemekit/';
    }

    public function get_style_depends()
    {
        return ['rkit-card_slider-style'];
    }

    public function get_script_depends()
    {
        return ['card-slider-script'];
    }

    protected function register_controls()
    {
        $this->start_controls_section('content_section', [
            'label' => esc_html('Content'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]);

        $item = new \Elementor\Repeater();

        $this->add_control('card_style', [
            'label' => esc_html('Style'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'default' => esc_html('Default'),
                'overlay' => esc_html('Overlay'),
            ],
            'default' => 'default'
        ]);

        $this->add_control('dot_position', [
            'label' => esc_html('Dot Position'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'before' => esc_html('Before Slider'),
                'after' => esc_html('After Slider')
            ],
            'default' => 'after'
        ]);

        $item->add_control('item_title', [
            'label' => esc_html('Title'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => esc_html('Input Your Title Here')
        ]);

        $item->add_control('item_description', [
            'label' => esc_html('Description'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
        ]);

        $item->add_control(
            'card_image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $item->add_control(
            'link_control',
            [
                'label' => esc_html__('Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'textdomain'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'item_list',
            [
                'label' => esc_html__('Card List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $item->get_controls(),
                'default' => [
                    [
                        'item_title' => esc_html__('Title #1', 'textdomain'),
                        'item_description' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'item_title' => esc_html__('Title #2', 'textdomain'),
                        'item_description' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'item_title' => esc_html__('Title #3', 'textdomain'),
                        'item_description' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'item_title' => esc_html__('Title #4', 'textdomain'),
                        'item_description' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'item_title' => esc_html__('Title #5', 'textdomain'),
                        'item_description' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'item_title' => esc_html__('Title #6', 'textdomain'),
                        'item_description' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'item_title' => esc_html__('Title #7', 'textdomain'),
                        'item_description' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'item_title' => esc_html__('Title #8', 'textdomain'),
                        'item_description' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ item_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section('button_content', [
            'label' => esc_html('Button'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]);

        $this->add_control(
            'show_button',
            [
                'label' => esc_html__('Show Button', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'textdomain'),
                'label_off' => esc_html__('No', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_position',
            [
                'label' => esc_html('Button Position'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'before' => esc_html('Before Title'),
                    'after' => esc_html('After Decription')
                ],
                'default' => 'after',
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-plus',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control('icon_position', [
            'label' => esc_html('Icon Position'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'row' => esc_html('After'),
                'row-reverse' => esc_html('Before')
            ],
            'selectors' => [
                '{{WRAPPER}} .card-slider_btn' => 'flex-direction:{{VALUE}}'
            ],
            'default' => 'row',
            'condition' => [
                'show_button' => 'yes'
            ]
        ]);

        $this->end_controls_section();

        $this->start_controls_section('image_content', [
            'label' => esc_html('Image'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [
                'card_style!' => 'overlay'
            ]
        ]);

        $this->add_control('image_style', [
            'label' => esc_html('Image Style'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'full-width' => esc_html('Full Width'),
                'circle' => esc_html('Circle'),
                'box' => esc_html('Box'),
            ],
            'default' => 'full-width'
        ]);

        $this->add_responsive_control('image_ratio', [
            'label' => esc_html('Image Ratio'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '1/1' => esc_html(' 1 : 1 '),
                '3/2' => esc_html(' 3 : 2 '),
                '5/4' => esc_html(' 5 : 4 '),
                '16/9' => esc_html(' 16 : 9 '),
            ],
            'selectors' =>  [
                '{{WRAPPER}} .cards .card-slider_image.full-width img , .cards .card-slider_image.box img' => 'aspect-ratio:{{VALUE}}'
            ],
            'default' => '3/2',
            'condition' => [
                'image_style!' => 'circle'
            ]
        ]);

        $this->end_controls_section();

        $this->start_controls_section('card_settings', [
            'label' => esc_html('Card'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]);

        $this->add_responsive_control('card_width', [
            'label' => esc_html__('Width', 'textdomain'),
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
                '{{WRAPPER}} .card' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('card_height', [
            'label' => esc_html__('Height', 'textdomain'),
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
                'unit' => 'px',
                'size' => 342,
            ],
            'selectors' => [
                '{{WRAPPER}} .card' => 'height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'card_style' => 'overlay'
            ]
        ]);

        $this->add_responsive_control('card_padding', [
            'label' => esc_html__('Padding', 'textdomain'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'selectors' => [
                '{{WRAPPER}} .cards.default .card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'card_style' => 'default'
            ]
        ]);

        $this->add_responsive_control('card_margin', [
            'label' => esc_html__('Margin', 'textdomain'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'selectors' => [
                '{{WRAPPER}} .cards .card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'selector' => '{{WRAPPER}} .cards .card',
            ]
        );

        $this->add_control(
            'bg_options',
            [
                'label' => esc_html__('Background', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'card_style' => 'default'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'card_background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .cards.default .card',
                'condition' => [
                    'card_style' => 'default'
                ]
            ]
        );

        $this->add_control(
            'border_options',
            [
                'label' => esc_html__('Border', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control('card_radius', [
            'label' => esc_html__('Border Radius', 'textdomain'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'selectors' => [
                '{{WRAPPER}} .cards .card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'selector' => '{{WRAPPER}} .cards .card',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section('image_settings', [
            'label' => esc_html('Image'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'card_style' => 'default',
                'image_style!' => 'full-width'
            ]
        ]);

        $this->add_responsive_control('image_size', [
            'label' => esc_html('Size'),
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
                '{{WRAPPER}} .cards .card-slider_image.circle' => 'width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .cards .card-slider_image.box' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'image_style!' => 'full-width'
            ]
        ]);

        $this->add_control(
            'image_radius',
            [
                'label' => esc_html__('Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .card-slider_image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'card_style' => 'default',
                    'image_style' => 'box'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .card-slider_image',
                'condition' => [
                    'card_style' => 'default',
                    'image_style!' => 'full-width'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section('card_body_settings', [
            'label' => esc_html('Body'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]);

        $this->add_control(
            'body_position',
            [
                'label' => esc_html__('Position', 'textdomain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Top', 'textdomain'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'end' => [
                        'title' => esc_html__('Bottom', 'textdomain'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .cards.overlay .card-slider_card-body' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'card_style' => 'overlay'
                ]
            ]
        );

        $this->add_responsive_control(
            'body_padding',
            [
                'label' => esc_html__('Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .card-slider_card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_setting',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_align',
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
                    '{{WRAPPER}} .card-slider_title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .card-slider_title',
            ]
        );

        $this->start_controls_tabs('title_tabs');

        $this->start_controls_tab('title_normal', ['label' => esc_html('Normal')]);

        $this->add_control('title_color_normal', [
            'label' => esc_html('Text Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .card-slider_title a' => 'color:{{VALUE}}'
            ]
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'title_stroke_normal',
                'selector' => '{{WRAPPER}} .card-slider_title a',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow_normal',
                'selector' => '{{WRAPPER}} .card-slider_title a',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('title_hover', ['label' => esc_html('Hover')]);

        $this->add_control('title_color_hover', [
            'label' => esc_html('Text Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .card-slider_title:hover a' => 'color:{{VALUE}}'
            ]
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'title_stroke_hover',
                'selector' => '{{WRAPPER}} .card-slider_title:hover a',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow_hover',
                'selector' => '{{WRAPPER}} .card-slider_title:hover a',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'description_settings',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'description_align',
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
                    'justify' => [
                        'title' => esc_html__('Justify', 'textdomain'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'justify',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .card-slider_description' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .card-slider_description',
            ]
        );

        $this->add_control('description_color', [
            'label' => esc_html('Text Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .card-slider_description' => 'color:{{VALUE}}'
            ]
        ]);

        $this->end_controls_section();

        $this->start_controls_section('button_settings', [
            'label' => esc_html('Button'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]);

        $this->add_responsive_control(
            'btn_align',
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
                    '{{WRAPPER}} .card-slider_btn-wrapper' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .card-slider_btn',
                'condition' => [
                    'btn_text!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .card-slider_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_radius',
            [
                'label' => esc_html__('Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .card-slider_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_width',
            [
                'label' => esc_html__('Width', 'textdomain'),
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
                    '{{WRAPPER}} .card-slider_btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_height',
            [
                'label' => esc_html__('Height', 'textdomain'),
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
                    '{{WRAPPER}} .card-slider_btn' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control('icon_btn_size', [
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
            'selectors' => [
                '{{WRAPPER}} .card-slider_btn-icon' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon!' => ''
            ]
        ]);

        $this->start_controls_tabs('btn_tabs');

        $this->start_controls_tab('btn_normal', ['label' => esc_html('Normal')]);

        $this->add_control('text_btn_color_normal', [
            'label' => esc_html('Text Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .card-slider_btn' => 'color:{{VALUE}}'
            ],
            'condition' => [
                'btn_text!' => ''
            ]
        ]);

        $this->add_control('icon_btn_color_normal', [
            'label' => esc_html('Icon Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .card-slider_btn-icon' => 'color:{{VALUE}}'
            ],
            'condition' => [
                'icon!' => ''
            ]
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_box_shadow_normal',
                'selector' => '{{WRAPPER}} .card-slider_btn',
            ]
        );

        $this->add_control(
            'btn_border_normal_opt',
            [
                'label' => esc_html__('Border', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border_btn_normal',
                'selector' => '{{WRAPPER}} .card-slider_btn',
            ]
        );

        $this->add_control(
            'btn_bg_normal_opt',
            [
                'label' => esc_html__('Background', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_background_normal',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .card-slider_btn',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('btn_hover', ['label' => esc_html('Hover')]);

        $this->add_control('text_btn_color_hover', [
            'label' => esc_html('Text Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .card-slider_btn:hover' => 'color:{{VALUE}}'
            ],
            'condition' => [
                'btn_text!' => ''
            ]
        ]);

        $this->add_control('icon_btn_color_hover', [
            'label' => esc_html('Icon Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .card-slider_btn:hover .card-slider_btn-icon' => 'color:{{VALUE}}'
            ],
            'condition' => [
                'icon!' => ''
            ]
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_box_shadow_hover',
                'selector' => '{{WRAPPER}} .card-slider_btn:hover',
            ]
        );


        $this->add_control(
            'btn_border_normal_opt',
            [
                'label' => esc_html__('Border', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border_btn_hover',
                'selector' => '{{WRAPPER}} .card-slider_btn:hover',
            ]
        );

        $this->add_control(
            'btn_bg_hover_opt',
            [
                'label' => esc_html__('Background', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_background_hover',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .card-slider_btn:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section('dot_settings', [
            'label' => esc_html('Dot'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]);

        $this->add_responsive_control(
            'dot_align',
            [
                'label' => esc_html__('Alignment', 'textdomain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left', 'textdomain'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right', 'textdomain'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .dot-container' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dot_radius',
            [
                'label' => esc_html__('Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dot_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('dot_tabs');

        $this->start_controls_tab('dot_tab_normal', ['label' => esc_html('Normal')]);

        $this->add_responsive_control(
            'dot_size',
            [
                'label' => esc_html__('Size', 'textdomain'),
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
                    '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control('dot_bg_normal', [
            'label' => esc_html('Background Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot' => 'background-color:{{VALUE}}'
            ]
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'dot_box_shadow_normal',
                'selector' => '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'dot_border_normal',
                'selector' => '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('dot_tab_hover', ['label' => esc_html('Hover')]);

        $this->add_responsive_control(
            'dot_size_hover',
            [
                'label' => esc_html__('Size', 'textdomain'),
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
                    '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control('dot_bg_hover', [
            'label' => esc_html('Background Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot:hover' => 'background-color:{{VALUE}}'
            ]
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'dot_box_shadow_hover',
                'selector' => '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'dot_border_hover',
                'selector' => '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot:hover',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('dot_tab_active', ['label' => esc_html('Active')]);

        $this->add_responsive_control(
            'dot_size_active',
            [
                'label' => esc_html__('Size', 'textdomain'),
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
                    '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot.active' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control('dot_bg_active', [
            'label' => esc_html('Background Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot.active' => 'background-color:{{VALUE}}'
            ]
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'dot_box_shadow_active',
                'selector' => '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot.active',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'dot_border_active',
                'selector' => '{{WRAPPER}} .rkit-slider-wrapper .dot-container .dot.active',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="rkit-slider-wrapper <?php echo esc_attr($settings['dot_position']); ?>">
            <div class="dot-container">
            </div>
            <div class="cards-slider">
                <div class="cards <?php echo esc_attr($settings['card_style']) ?>">
                    <?php foreach ($settings['item_list'] as $li) :
                        if (!empty($li['link_control']['url'])) {
                            $this->add_link_attributes('link_control_' . $li['_id'], $li['link_control']);
                        }
                    ?>
                        <div class="card elementor-repeater-item-<?php echo esc_attr($li['_id']) ?>">
                            <div class="card-slider_card-wrapper">
                                <div class="card-slider_image <?php echo esc_attr($settings['image_style']) ?>">
                                    <?php echo elementor\Group_Control_Image_Size::get_attachment_image_html($li, 'thumbnail', 'card_image'); ?>
                                </div>
                                <div class="card-slider_card-body">
                                    <?php if ($settings['show_button'] === 'yes' && $settings['button_position'] == 'before') : ?>
                                        <div class="card-slider_btn-wrapper">
                                            <a type="button" class="card-slider_btn" <?php echo $this->get_render_attribute_string('link_control_' . $li['_id']) ?>>
                                                <?php echo esc_html($settings['btn_text']); ?>
                                                <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true', 'class' => 'card-slider_btn-icon']); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <h2 class="card-slider_title"><a <?php echo $this->get_render_attribute_string('link_control_' . $li['_id']) ?>><?php echo esc_html($li['item_title']) ?></a></h2>
                                    <span class="card-slider_description"><?php echo esc_html($li['item_description']) ?></span>
                                    <?php if ($settings['show_button'] === 'yes' && $settings['button_position'] == 'after') : ?>
                                        <div class="card-slider_btn-wrapper">
                                            <a type="button" class="card-slider_btn" <?php echo $this->get_render_attribute_string('link_control_' . $li['_id']) ?>>
                                                <?php echo esc_html($settings['btn_text']); ?>
                                                <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true', 'class' => 'card-slider_btn-icon']); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
<?php
    }
}
