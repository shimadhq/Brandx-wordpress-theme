<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Services_Banner_Widget extends Widget_Base{
    public function get_name() {
        return 'services_banner';
    }

    public function get_title() {
        return 'بنر خدمات';
    }

    public function get_icon() {
        return 'eicon-image-rollover';
    }

    public function get_style_depends() {
        return ['services-banner'];
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'محتوا',
            ]
        );

        $this->add_control(
            'main_image',
            [
                'label' => 'تصویر اصلی (قابل تغییر)',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/banner-image.png',
                ],
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => 'عنوان',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'ارائه بهترین خدمات طراحی سایت',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => 'متن',
                'type' =>  \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، وبا استفاده ازطراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجلـه در ستون و سطر آنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، حال کتاب های زیادی در شصت و سه درصد گذشته حال و آینده و با استفـاده از طراحان گرافیک است. لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ',
            ]
        );

        $this->add_control(
            'button1_text',
            [
                'label' => 'متن دکمه اول',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'خدمات کاری',
            ]
        );

        $this->add_control(
            'button1_link',
            [
                'label' => 'لینک دکمه اول',
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'button2_text',
            [
                'label' => 'متن دکمه دوم',
                'type' => Controls_Manager::TEXT,
                'default' => 'دوره های آموزشی',
            ]
        );

        $this->add_control(
            'button2_link',
            [
                'label' => 'لینک دکمه دوم',
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();
    }

    //PHP Render
    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="banner-services-widget">
            <div class="image-section">
                <?php if (!empty($settings['main_image']['url'])) : ?>
                    <img src="<?php echo esc_url($settings['main_image']['url']); ?>" alt="banner image" class="image" />
                <?php endif; ?>
            </div>
            <div class="content-section">
                <h2 class="services_banner_heading">
                    <?php echo esc_html($settings['heading']); ?>
                </h2>
                <div class="services_banner_content">
                    <?php echo $settings['description'] ?>
                </div>
                <div class="button-group">
                    <a href="<?php echo esc_url($settings['button1_link']['url']); ?>" class="btn btn-primary"><?php echo esc_html($settings['button1_text']); ?></a>
                    <a href="<?php echo esc_url($settings['button2_link']['url']); ?>" class="btn btn-secondary"><?php echo esc_html($settings['button2_text']); ?></a>
                </div>
            </div>
        </div>
        <?php
    }
}
