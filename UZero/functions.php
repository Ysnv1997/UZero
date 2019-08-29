<?php 

register_nav_menus(array(
	'PrimaryMenu'=>'导航',
	'footer_nav'=>'页脚导航'));
add_theme_support('nav_menus');
/**********************************************************************
修复5.0.1版本后评论框不跟随
**********************************************************************/
    wp_enqueue_script( 'comment-reply' );

/**********************************************************************
                            引入后台框架
**********************************************************************/
require_once get_template_directory() .'/inc/cs-framework/cs-framework.php';
define( 'CS_ACTIVE_FRAMEWORK', true ); // default true
define( 'CS_ACTIVE_METABOX', false ); // default true
define( 'CS_ACTIVE_TAXONOMY', false ); // default true
define( 'CS_ACTIVE_SHORTCODE', false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE', false ); // default true


/**********************************************************************
                            静态文件
**********************************************************************/
add_action( 'wp_enqueue_scripts', 'SuStatic' );
function SuStatic() {

    wp_register_script( 'jquery1', get_template_directory_uri() . '/js/jquery.min.js', array(), true );
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), true );
    wp_register_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), true );
    wp_register_script( 'lazyload', get_template_directory_uri() . '/js/jquery.lazyload.min.js', array(), true );
    wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array(), true );
    
    
    if ( !is_admin() ) {
        wp_enqueue_style( 'css' );
        wp_enqueue_style( 'swiper' );
        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'style' );

        wp_enqueue_script( 'jquery1' );
        wp_enqueue_script( 'bootstrap' );
        wp_enqueue_script( 'swiper' );
        wp_enqueue_script( 'lazyload' );
        wp_enqueue_script( 'main' );
    }
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css');
    wp_enqueue_style( 'css', get_template_directory_uri() . '/css/css.css');
    wp_enqueue_style( 'style', get_stylesheet_uri());

    wp_localize_script( 'main', 'stayma_url',
        array(
            'ajax_url'   => admin_url('admin-ajax.php'),
            'order' => get_option('comment_order'),
            'formpostion' => 'bottom', //默认为bottom，如果你的表单在顶部则设置为top。
        )
    );
}







/**********************************************************************
                            特色图
**********************************************************************/
add_theme_support( "post-thumbnails" );
add_filter( 'add_image_size', create_function( '', 'return 1;' ) );
add_filter( 'create_fun_core', create_function( '', 'return 1;' ) );
/**********************************************************************
                            特色图
**********************************************************************/
function post_thumbnail_src(){
    global $post;
    $post_thumbnail_src='';
    if( has_post_thumbnail() ){    //如果有特色缩略图，则输出缩略图地址
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        $post_thumbnail_src = $thumbnail_src[0];
    } else {
        $post_thumbnail_src = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        if(!empty($matches[1][0])){
            $post_thumbnail_src = $matches[1][0];   //获取该图片 src
        }else{
            $post_thumbnail_src = false;
        }
    };
    return $post_thumbnail_src;
}
/**********************************************************************
                            阅读次数
**********************************************************************/
function post_views($before = '', $after = '', $echo = 1)  
{  
  global $post;  
  $post_ID = $post->ID;  
  $views = (int)get_post_meta($post_ID, 'views', true);  
  if ($echo) echo $before, number_format($views), $after;  
  else return $views;  
}  
function record_visitors()  
{  
    if (is_singular()) {  
      global $post;  
      $post_ID = $post->ID;  
      if($post_ID) {  
          $post_views = (int)get_post_meta($post_ID, 'views', true);  
          if(!update_post_meta($post_ID, 'views', ($post_views+1))) {  
            add_post_meta($post_ID, 'views', 1, true);  
          }  
      }  
    }  
}  
add_action('wp_head', 'record_visitors'); 
/**********************************************************************
                            评论模板
**********************************************************************/
include 'inc/do.php';
function wpmee_comment($comment, $args, $depth) {
    global $post;
    $commentcountText='';
    $GLOBALS['comment'] = $comment;
?>
<article <?php comment_class($GLOBALS['wow_comments']); ?>  id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID() ?>">

        <div class="comment-avatar"><?php echo get_avatar( $comment ); ?></div>
        <div class="comment-body">
            <div class="comment_author">
                <span class="name"><?php comment_author_link() ?></span>
                <em><?php echo get_comment_time('Y-m-d H:i') ?></em>
                
            </div>

            <div class="comment-text">
                <?php comment_text() ?>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <font style="color:#c00; font-style:inherit">您的评论正在等待审核中...</font>
                <?php endif; ?>
            </div>
            <div class="comment_reply">
                <span class="comment_reply_but">
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => "回复"))) ?>
                </span>
            </div>
        </div>
    </div>
<?php }
function wpmee_end_comment() {
    echo '</article>';
};
/**********************************************************************
                            SEO 标题设置
**********************************************************************/
function yct_seo_title( $title ){
    global $post;
    //静态首页SEO标题
    if( (is_front_page()) ) {
        //获取静态页面的SEO标题，第一个为标题，第二个为关键字
        $seo_meta =explode('||',get_post_meta($post->ID,'seo_info',true));
        //如果标题存在
        if ($seo_meta[0]){
            //如果存在首页标题描述则取消
            if(isset( $title['tagline'] )) {unset( $title['tagline'] );}
            //设置首页的SEO标题
            $title['title']=strip_tags($seo_meta[0]);
        }
    }elseif( (is_single() || is_page()) ) {
 
        //获取页面、文章的SEO标题，第一个为标题，第二个为关键字
        $seo_meta =explode('||',get_post_meta($post->ID,'seo_info',true));
        //如果标题存在
        if ($seo_meta[0]){
            //设置页面、文章的SEO标题
            $title['title']=strip_tags($seo_meta[0]);
        }
    }elseif( (is_tag() || is_category()) ) {
            //获取标签、分类的SEO标题，第一个为普通描述，第二个为SEO标题
            $seo_meta =explode('||',get_the_archive_description());
            //如果标题存在
            if ($seo_meta[1]){
                //设置页面、文章的SEO标题
                $title['title']=strip_tags($seo_meta[1]);
        }
    }
    //返回标题
    return $title;
}
add_filter( 'document_title_parts', 'yct_seo_title' );