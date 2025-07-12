<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class About_Brandx_widget extends Widget_Base{
    public function get_name() {
        return 'about_brandx';
    }

    public function get_title() {
        return 'درباره برندیکس';
    }

    public function get_icon() {
        return 'eicon-e-youtube';
    }

    public function get_style_depends() {
        return ['about-brandx'];
    }

    public function get_categories() {
        return ['general'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'محتوای متنی',
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => 'عنوان',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'درباره مجموعه برندیکس',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => 'متن',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'لورم ایپسوم متن ساختگی تولید سادگی نامفهــوم از صنعت چاپ، وبا استفاده طراحان گرافیک اسـت، چاپگرها و متون بلکـه روزنامه و مجـلــه در ستون و سطرآنچنان لازم است، برای شرایـط فعلی تکنولوژی مورد نیـاز،وکاربردهای متنوع باهدف بهبود ابزارهای کاربردی می باشد،کتاب های زیادی درشصت و سه درصد گذشته حال و آینـده و با استفــاده از طراحان گرافیک است. ',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => 'متن دکمه',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'درباره برندیکس',
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => 'لینک دکمه',
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'video_section',
            [
                'label' => 'محتوای ویدئویی'
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => 'لینک ویدیو',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'video_thumbnail',
            [
                'label' => 'تصویر کاور (Thumbnail)',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/default-thumb.png',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $video = $settings['video_url']['url'];
        $thumbnail = $settings['video_thumbnail']['url'];
        $video_id = 'video_' . uniqid();
        ?>

        <div class="about-brandx">
            <div class="content-wrapper">
                <h2 class="about-heading">
                    <?php echo esc_html($settings['heading']); ?>
                </h2>
                <div class="about-description">
                    <?php echo $settings['description'] ?>
                </div>
                <div class="button-wrapper">
                    <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="button"><?php echo esc_html($settings['button_text']); ?></a>
                </div>
            </div>
            <div class="custom-video-wrapper">
                <?php if ($thumbnail): ?>
                    <div class="video-thumbnail" onclick="
                        const videoEl = document.getElementById('<?php echo esc_attr($video_id); ?>');
                        videoEl.style.display = 'block';
                        videoEl.play();
                        this.style.display='none';
                    ">
                        <img src="<?php echo esc_url($thumbnail); ?>" alt="ویدیو کاور" />
                            <div class="play-button">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/play-icon.svg" />
                            </div>
                    </div>
                <?php endif; ?>

                <?php if ($video): ?>
                    <video 
                        id="<?php echo esc_attr($video_id); ?>" 
                        class="video-element" 
                        src="<?php echo esc_url($video); ?>" 
                        controls 
                        style="display:<?php echo $thumbnail ? 'none' : 'block'; ?>;">
                    </video>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}