<?php 

register_nav_menus(array(
    'PrimaryMenu'=>'导航',
	'mobile'=>'移动端导航',
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
    wp_register_script( 'dayjs', 'https://cdn.jsdelivr.net/npm/dayjs/dayjs.min.js', array(), true );
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
        wp_enqueue_script( 'dayjs' );
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
            <div class="comment-footer">
                <em><?php echo get_comment_time('Y-m-d H:i') ?></em><span class="hidden-xs hidden-sm">通过：
                <?php echo user_agent($comment->comment_agent); ?> 发布</span>
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
/**********************************************************************
                            SEO 标题设置
**********************************************************************/
//获取用户UA信息   
function user_agent($ua){
//开始解析操作系统   
$os = null;
if(preg_match('/Windows 95/i',$ua) || preg_match('/Win95/',$ua)){
        $os="Windows 95";}
    elseif(preg_match('/Windows NT 5.0/i',$ua) || preg_match('/Windows 2000/i', $ua)){
        $os="Windows 2000";}
    elseif(preg_match('/Win 9x 4.90/i',$ua) || preg_match('/Windows ME/i', $ua)){
        $os="Windows ME";}
    elseif(preg_match('/Windows.98/i',$ua) || preg_match('/Win98/i', $ua)){
        $os = "Windows 98";}
    elseif(preg_match('/Windows NT 6.0/i',$ua)){
        $os="Windows Vista";}
    elseif(preg_match('/Windows NT 6.1/i',$ua)){
        $os="Windows 7";}
    elseif(preg_match('/Windows NT 5.1/i',$ua)){
        $os = "Windows XP";}
    elseif(preg_match('/Windows NT 5.2/i',$ua) && preg_match('/Win64/i',$ua)){
        $os="Windows XP 64 bit";}
    elseif(preg_match('/Windows NT 5.2/i',$ua)){
        $os="Windows Server 2003";}
    elseif(preg_match('/Mac_PowerPC/i',$ua)){
        $os="Mac OS";}
    elseif(preg_match('/Windows Phone/i',$ua)){
        $os="Windows Phone7";}
    elseif (preg_match('/Windows NT 6.2/i', $ua)){
        $os="Windows 8";}
    elseif(preg_match('/Windows NT 4.0/i',$ua) || preg_match('/WinNT4.0/i',$ua)){
        $os="Windows NT 4.0";}
    elseif(preg_match('/Windows NT/i',$ua) || preg_match('/WinNT/i',$ua)){
        $os="Windows NT";}
    elseif(preg_match('/Windows CE/i',$ua)){
        $os="Windows CE";}
    elseif(preg_match('/ipad/i',$ua)){
        $os="iPad";}
    elseif(preg_match('/Touch/i',$ua)){
        $os="Touchw";}
    elseif(preg_match('/Symbian/i',$ua) || preg_match('/SymbOS/i',$ua)){
        $os="Symbian OS";}
    elseif (preg_match('/iPhone/i', $ua)) {
        $os="iPhone";}
    elseif(preg_match('/PalmOS/i',$ua)){
        $os="Palm OS";}
    elseif(preg_match('/QtEmbedded/i',$ua)){
        $os="Qtopia";}
    elseif(preg_match('/Ubuntu/i',$ua)){
        $os="Ubuntu Linux";}
    elseif(preg_match('/Gentoo/i',$ua)){
        $os="Gentoo Linux";}
    elseif(preg_match('/Fedora/i',$ua)){
        $os="Fedora Linux";}
    elseif(preg_match('/FreeBSD/i',$ua)){
        $os="FreeBSD";}
    elseif(preg_match('/NetBSD/i',$ua)){
        $os="NetBSD";}
    elseif(preg_match('/OpenBSD/i',$ua)){
        $os="OpenBSD";}
    elseif(preg_match('/SunOS/i',$ua)){
        $os="SunOS";}
    elseif(preg_match('/Linux/i',$ua)){
        $os="Linux";}
    elseif(preg_match('/Mac OS X/i',$ua)){
        $os="Mac OS X";}
    elseif(preg_match('/Macintosh/i',$ua)){
        $os="Mac OS";}
    elseif(preg_match('/Unix/i',$ua)){
        $os="Unix";}
    elseif(preg_match('#Nokia([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $os="Nokia";}
    elseif(preg_match('/Mac OS X/i',$ua)){
        $os="Mac OS X";}
    else{
        $os='未知操作系统';
}
//开始解析浏览器   
if(preg_match('#(Camino|Chimera)[ /]([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser = 'Camino ';}
    elseif(preg_match('#SE 2([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='搜狗浏览器 2';}
    elseif(preg_match('#360([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='360浏览器 ';}
    elseif (preg_match('#Maxthon( |\/)([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Maxthon ';}
    elseif (preg_match('#Chrome/([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Chrome ';}
    elseif (preg_match('#Safari/([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Safari ';}
    elseif(preg_match('#opera mini#i', $ua)) {
        $browser='Opera Mini ';}
    elseif(preg_match('#Opera.([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Opera ';}
    elseif(preg_match('#(j2me|midp)#i', $ua)) {
        $browser="J2ME/MIDP Browser";}
    elseif(preg_match('/GreenBrowser/i', $ua)){
        $browser='GreenBrowser';}
    elseif (preg_match('#TencentTraveler ([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='腾讯TT浏览器 ';}
    elseif(preg_match('#UCWEB([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='UCWEB ';}
    elseif(preg_match('#MSIE ([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Internet Explorer ';}
    elseif(preg_match('#avantbrowser.com#i',$ua)){
        $browser='Avant Browser';}
    elseif(preg_match('#PHP#', $ua, $matches)){
        $browser='PHP';}
    elseif(preg_match('#danger hiptop#i',$ua,$matches)){
        $browser='Danger HipTop';}
    elseif(preg_match('#Shiira[/]([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Shiira ';}
    elseif(preg_match('#Dillo[ /]([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Dillo ';}
    elseif(preg_match('#Epiphany/([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Epiphany ';}
    elseif(preg_match('#UP.Browser/([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Openwave UP.Browser ';}
    elseif(preg_match('#DoCoMo/([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='DoCoMo ';}
    elseif(preg_match('#(Firefox|Phoenix|Firebird|BonEcho|GranParadiso|Minefield|Iceweasel)/([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Firefox ';}
    elseif(preg_match('#(SeaMonkey)/([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Mozilla SeaMonkey ';}
    elseif(preg_match('#Kazehakase/([a-zA-Z0-9.]+)#i',$ua,$matches)){
        $browser='Kazehakase ';}
    else{$browser='未知浏览器';
}
return $os." | ".$browser;
}
/**********************************************************************
                            QQ信息获取
**********************************************************************/
add_action( 'init', 'ajax_qq_info' );
function ajax_qq_info() {
    if( $_GET['action'] == 'ajax_qq_info' && 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        $qqNum = isset($_GET['qqNum']) ? addslashes(trim($_GET['qqNum'])) : '';
        $infos = file_get_contents('http://r.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?g_tk=1518561325&uins='.$qqNum);
        $infos = iconv("GB2312", "UTF-8", $infos);
        $pattern = '/portraitCallBack\((.*)\)/is';
        preg_match($pattern, $infos, $result);
        echo $result[1];
        die();
    }   
}
/**********************************************************************
                            主人登录时间
**********************************************************************/
add_action( 'wp_login', 'set_last_login' );
function set_last_login( $login ) {
    $time_old = get_user_meta( 1, 'last_login' )[0];
    if (!empty($time_old)) update_user_meta( 1, 'last_login_old', $time_old + 8*3600 );
    update_user_meta( 1, 'last_login', time() );
}
function last_login() {
    $time = get_user_meta( 1, 'last_login' )[0];
    $time = (int) substr($time, 0, 10);  
    $int = time() - $time;
    $str = '';
    if ($int <= 60) {
        $str = sprintf('刚刚', $int);
    } elseif ($int < 3600) {
        $str = sprintf('%d分钟前', floor($int / 60));
    } elseif ($int < 86400) {
        $str = sprintf('%d小时前', floor($int / 3600));
    } elseif ($int < 2592000) {
        $str = sprintf('%d天前', floor($int / 86400));
    } else {
        $str = date('Y-m-d H:i:s', $time);
    }
    // if (is_user_logged_in()) {
    //     echo '上次登录日期 '.date('Y.m.d H:i', get_user_meta( 1, 'last_login_old' )[0]).'';
    //     echo '<li class="item active">本次登录已记录 '.date('Y.m.d H:i', $time + 8*3600).'</li>';
    // } else {
        echo '主人翁在'.$str.'来过。';
    // }
}
