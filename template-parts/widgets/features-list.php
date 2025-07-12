<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) exit;

class Features_List_Widget extends Widget_Base{
    public function get_name() {
        return 'features-list';
    }

    public function get_title() {
        return 'لیست ویژگی ها';
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }

    public function get_style_depends() {
        return ['features-list'];
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {
        $this->start_controls_section (
            'content-section',
            [
                'label' => 'محتوا',
            ]
        );

        $this->add_control (
            'heading',
            [
                'label' => 'عنوان',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'ویژگی های ما',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => 'متن',
                'type' =>  \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'items_section',
            [
                'label' => 'آیتم‌ها',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_title',
            [
                'label' => 'عنوان آیتم',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'عنوان نمونه',
                'placeholder' => 'عنوان را وارد کنید',
            ]
        );

        $repeater->add_control(
            'item_content',
            [
                'label' => 'محتوا',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'محتوای نمونه برای این آیتم...',
                'placeholder' => 'محتوا را وارد کنید',
            ]
        );

        $repeater->add_control(
            'item_image',
            [
                'label' => 'تصویر آیتم',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                   'url' => '',
                ],
            ]
        );

        $this->add_control(
            'items_list',
            [
                'label' => 'لیست آیتم‌ها',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    ['item_title' => 'متناسب با علم روز', 'item_content' => 'بروز بودن بخش فنی مطابق با آپدیت ورژن برنامه ها', 'item_image' => ['url' => get_template_directory_uri() . '/assets/images/icons/icon1.svg']],
                    ['item_title' => 'سرعت تحویل کار', 'item_content' => 'تحویل پروژه ها در سریع ترین زمان و کیفیت ممکن', 'item_image' => ['url' => get_template_directory_uri() . '/assets/images/icons/icon2.svg']],
                    ['item_title' => 'پروژه های آنلاین', 'item_content' => 'همکاری با شرکت ها و مؤسسات به صورت آنلاین', 'item_image' => ['url' => get_template_directory_uri() . '/assets/images/icons/icon3.svg']],
                    ['item_title' => 'امنیت بالا', 'item_content' => 'محافظت از اطلاعات کاربران با بهترین سرویس ها', 'item_image' => ['url' => get_template_directory_uri() . '/assets/images/icons/icon4.svg']],
                    ['item_title' => 'پشتیبانی حرفه ای', 'item_content' => 'پاسخ دهی ۲۴ ساعته با کارشناسان مجرب', 'item_image' => ['url' => get_template_directory_uri() . '/assets/images/icons/icon5.svg']],
                ],
                'title_field' => '{{{ item_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings_for_display();
        $items = $settings['items_list'];
        $default_icon = get_template_directory_uri() . '/assets/images/icon1.svg';

        ?>
        <div class="features-list-widget">
            <div class="content-container">
                <h2 class="features-list-heading">
                    <?php echo esc_html($settings['heading']); ?>
                </h2>
                <div class="features-list-content">
                    <?php echo $settings['description'] ?>
                </div>
            </div>
            <div class="items-section">
                <div class="items-container">
                    <?php foreach ($items as $index => $item) : ?>
                        <div class="item">
                            <?php if (!empty($item['item_image']['url'])) : ?>
                                <?php
                                  $image_url = !empty($item['item_image']['url']) 
                                  ? $item['item_image']['url'] 
                                  : $default_icon;
                                ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($item['item_title']); ?>">
                            <?php endif; ?>
                            <h3><?php echo esc_html($item['item_title']); ?></h3>
                            <div><?php echo $item['item_content']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
}
