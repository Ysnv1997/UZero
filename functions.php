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

//删除仪表盘模块  
function example_remove_dashboard_widgets() {  
    // Globalize the metaboxes array, this holds all the widgets for wp-admin  
    global $wp_meta_boxes;  
    // 以下这一行代码将删除 "快速发布" 模块  
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);  
    // 以下这一行代码将删除 "引入链接" 模块  
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  
    // 以下这一行代码将删除 "插件" 模块  
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);  
    // 以下这一行代码将删除 "近期评论" 模块  
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);  
    // 以下这一行代码将删除 "近期草稿" 模块  
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);  
    // 以下这一行代码将删除 "WordPress 开发日志" 模块  
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);  
    // 以下这一行代码将删除 "其它 WordPress 新闻" 模块  
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);  
    // 以下这一行代码将删除 "概况" 模块  
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);  
}  
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );  
// 以下这一行代码将删除 "welcome" 模块  
remove_action('welcome_panel', 'wp_welcome_panel');  


    function custom_dashboard_help() {
    echo '<h3 style="color:red">感谢你使用UZero主题，如果你觉得UZero主题让你感到身心愉悦，那么请打赏一下UZero主题吧！</h3><p style="text-align: center;"><img src="https://i.loli.net/2019/09/05/TJk1l35RNYjiDtF.png" alt=""></p><p>如果你在使用过程中遇到任何困难或者问题，请加入官方QQ群:<a href="https://jq.qq.com/?_wv=1027&amp;k=5NIqiSH" title="729193505" target="_blank" rel="nofollow" style="color:blue;text-decoration: none;">729193505</a>寻求帮助！</p>';
    }
    function example_add_dashboard_widgets() {
        wp_add_dashboard_widget('custom_help_widget', '赞助UZero主题', 'custom_dashboard_help');
    }
    add_action('wp_dashboard_setup', 'example_add_dashboard_widgets' );

