<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) exit;

class Why_Brandx_Widget extends Widget_Base{
    public function get_name() {
        return 'why_brandx';
    }
    
    public function get_title() {
        return 'معرفی برندیکس';
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_style_depends() {
        return ['why-brandx-style'];
    }

    public function get_script_depends() {
        return ['why-brandx-script'];
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'media_section',
            [
                'label' => 'مدیا',
            ]
        );

        $this->add_control(
            'media_image',
            [
                'label' => 'تصویر اصلی',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/why-brandx.png',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => 'محتوا',
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => 'عنوان',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'چرا برندیکس؟!',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => 'متن',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'لورم ایپسـوم متـن ساختگی باتولید سادگی نامفهـوم از صنعت چاپ، و با استفاده از طراحان گـرافیک اسـت، چاپگرهـا و متون بلکه روزنـامه و مجلـه در ستون و سطر آنچنان که لازم اسـت، و برای شرایط فعلی تکنولوژی مورد نیـاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'counter_section',
            [
                'label' => 'تنظیمات شمارش گرها',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'counter_number',
            [
                'label' => 'عدد شمارش گر',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 'عدد نمونه',
                'placeholder' => 'عدد نهایی را وارد کنید',
            ]
        );

        $repeater->add_control(
            'counter_title',
            [
                'label' => 'عنوان شمارش گر',
                'type' => Controls_Manager::TEXT,
                'default' => 'عنوان نمونه',
                'placeholder' => 'عنوان شمارش گر را وارد کنید',
            ]
        );

        $this->add_control(
            'counters_list',
            [
                'label' => 'لیست شمارش گرها',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    ['counter_number' => '50000', 'counter_title' => 'رضایت مشتریان'],
                    ['counter_number' => '32500', 'counter_title' => 'تعداد پروژه ها'],
                    ['counter_number' => '+705', 'counter_title' => 'پروژه های فعال'],
                ],
                'title_field' => '{{{ counter_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings_for_display();
        $counters = $settings['counters_list'];
        $total = count($counters);
        $current = 0;

        ?>
        <div class="why-brandx">
            <div class="why-content">
                <h2 class="why-header">
                    <?php echo esc_html($settings['heading']); ?>
                </h2>
                <div class="why-description">
                    <?php echo $settings['description'] ?>
                </div>
                <?php if (!empty($counters)) : ?>
                    <div class="why-counters">
                        <?php foreach ($counters as $counter) : ?>
                            <?php $current++; ?>
                            <div class="wpc-counter-box">
                                <div class="wpc-counter-number" data-target="<?php echo esc_attr($counter['counter_number']); ?>">0</div>
                                <div class="wpc-counter-label"><?php echo esc_html($counter['counter_title']); ?></div>
                            </div>

                            <?php if ($current < $total) : ?>
                                <div class="counter-divider"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="why-media">
                <?php if (!empty($settings['media_image']['url'])) : ?>
                    <img src="<?php echo esc_url($settings['media_image']['url']); ?>" alt="media" class="media-image" />
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}