<?php 
require_once get_template_directory() .'/inc/expand.php';
/**********************************************************************
                            静态文件
**********************************************************************/
add_action( 'wp_enqueue_scripts', 'SuStatic' );
function SuStatic() {
    wp_register_script( 'jquery1', get_template_directory_uri() . '/js/jquery.min.js', array(), true );
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), true );
    wp_register_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), true );
    wp_register_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), true );
    wp_register_script( 'lazyload', get_template_directory_uri() . '/js/jquery.lazyload.min.js', array(), true );
    wp_register_script( 'dayjs', 'https://cdn.jsdelivr.net/npm/dayjs/dayjs.min.js', array(), true );
    wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array(), true );
    wp_register_script( 'iframe', get_template_directory_uri() . '/js/iframe.js', array(), true );
    if ( !is_admin() ) {
        wp_enqueue_style( 'icon' );
        wp_enqueue_style( 'swiper' );
        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'fancybox' );
        wp_enqueue_style( 'style' );
        wp_enqueue_style( 'css' );

        
        wp_enqueue_script( 'jquery1' );
        wp_enqueue_script( 'bootstrap' );
        wp_enqueue_script( 'swiper' );
        wp_enqueue_script( 'lazyload' );
        wp_enqueue_script( 'dayjs' );
        wp_enqueue_script( 'fancybox' );
        wp_enqueue_script( 'main' );
        if(cs_get_option('plus_open_iframe')){
            wp_enqueue_script( 'iframe' );
        }
    }
    wp_enqueue_style( 'icon', get_template_directory_uri() . '/css/icon.css');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css');
    wp_enqueue_style( 'css', get_template_directory_uri() . '/css/css.css');

// 切换主题颜色
switch (cs_get_option('plus_color')) {
    case 'blue':
            wp_enqueue_style( 'blue', get_template_directory_uri() . '/css/color/blue.css');
            wp_enqueue_style( 'blue' );
        break;

    case 'blueBlack':
       wp_enqueue_style( 'blueBlack', get_template_directory_uri() . '/css/color/blueBlack.css');
        wp_enqueue_style( 'blueBlack' );
        break;

    case 'black':
        wp_enqueue_style( 'black', get_template_directory_uri() . '/css/color/black.css');
        wp_enqueue_style( 'black' );
        break;

    case 'no': break;
}
    wp_enqueue_style( 'style', get_stylesheet_uri());
    wp_localize_script( 'main', 'stayma_url',
        array(
            'ajax_url'   => admin_url('admin-ajax.php'),
            'order' => get_option('comment_order'),
            'formpostion' => 'bottom', //默认为bottom，如果你的表单在顶部则设置为top。
        )
    );
}