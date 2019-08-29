<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => '主题设置',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => '<a style="color:#fff;text-decoration: none;" href="https://www.ishanran.com/">UZero</a><small class="oldVer" data-vs="1.0.0 "style="color:#dc7575;margin-left:10px">Release 1.0.0</small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ----------------------------------------
// a option section for options overview  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'overwiew',
  'title'       => '基本',
  'icon'        => 'fa fa-star',
  'fields'      => array(

  // 站名
    array(
        'id'      => 'plus_name',
        'type'    => 'text',
        'title'   => '博客名字',
        'desc'    => '请输入博客名字，将用于引导页显示',
        'default' => '',
    ),
    // 站名
    array(
        'id'      => 'plus_description',
        'type'    => 'text',
        'title'   => '博客描述',
        'desc'    => '请输入博客描述，将用于引导页显示',
        'default' => '',
    ),
  // 网站logo图片
    array(
        'id'      => 'plus_header_logo',
        'type'    => 'upload',
        'title'   => '网站logo图片',
        'desc'    => '请上传置高为50px宽度为不定的logo图片',
        'default' => '',
    ),
  // 备案号
    array(
        'id'      => 'plus_footer_record',
        'type'    => 'text',
        'title'   => '备案号',
        'desc'    => '请设置备案号，无则留空',
        'default' => '',
    ),

    array(
      'id'        => 'index-loop',
      'type'      => 'group',
      'title'     => '轮播图',
      'button_title'=>'添加',
      'fields'    => array(
        array(
          'id'    => 'index-loop-img',
          'type'  => 'upload',
          'title' => '轮播图链接',
        ),
        array(
          'id'    => 'index-loop-url',
          'type'  => 'text',
          'title' => '跳转链接',
        ),
        array(
          'id'    => 'index-loop-blank',
          'type'  => 'switcher',
          'title' => '是否新窗口打开',
        ),
      ),
    ),



      // 功能
      array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '网站功能',
      ),

            // 附件自动重命名
            array(
                'id'    => 'plus_upload_filter',
                'type'  => 'switcher',
                'title' => '附件自动重命名',
            ),
            array(
                'id'         => 'gravatar_url',
                'type'       => 'radio',
                'title'      => 'gravatar头像优化',
                'options'    => array(
                  'no'      => '官方原有',
                  'ssl' => '从Gravatar官方ssl获取',
                  'duoshuo'     => '中国服务器',
                ),
              ),


  ),
);

$options[]      = array(
  'name'        => 'seo',
  'title'       => 'SEO',
  'icon'        => 'fa fa-address-card',
  'fields'      => array(

    // 全局seo
    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => '全局seo',
    ),


        // 自动获取文章内容作为文章description标签
        array(
            'id'    => 'web589_auto_description',
            'type'  => 'switcher',
            'title' => '自动获取文章内容作为文章description标签：',
        ),


    // 搜索窗展示图
    array(
        'id'      => 'web589_auto_description_num',
        'type'    => 'text',
        'title'   => '字数',
        'desc'    => '自动获取文章内容作为文章description标签，字数控制',
        'default' => '',
    ),

        // 自动获取文章标签作为文章keyword标签：
        array(
            'id'    => 'web589_auto_keywords',
            'type'  => 'switcher',
            'title' => '自动获取文章标签作为文章keyword标签：',
        ),

        // 内页title添加站点标题后缀：
        array(
            'id'    => 'dxseo_title_suffix',
            'type'  => 'switcher',
            'title' => '内页title添加站点标题后缀：',
        ),

        // title添加分页后缀：
        array(
            'id'    => 'dxseo_title_paged',
            'type'  => 'switcher',
            'title' => 'title添加分页后缀：',
        ),

    // title后缀分隔符：
    array(
        'id'      => 'dxseo_title_sep',
        'type'    => 'text',
        'title'   => 'title后缀分隔符：',
        'desc'    => '标题间的分隔符，默认为 - ，设置好以后请不要修改，不友好',
        'default' => ' - ',
    ),
    // 首页seo
    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => '首页seo',
    ),



    // 首页的标题
    array(
        'id'      => 'aiosp_home_title',
        'type'    => 'text',
        'title'   => '首页的标题',
        'desc'    => '首页的标题，建议采用 【网站名 - 网站描述】 这种格式',
        'default' => '',
    ),

    // 首页关键词
    array(
        'id'      => 'aiosp_home_keywords',
        'type'    => 'text',
        'title'   => '首页关键词',
        'desc'    => '首页关键词,请用英文逗号隔开',
        'default' => '',
    ),

    // 首页的描述
    array(
        'id'      => 'aiosp_home_description',
        'type'    => 'text',
        'title'   => '首页的描述',
        'desc'    => '首页的描述，建议120字左右',
        'default' => '',
    ),

    // Metas(非必填)
    array(
        'id'      => 'aiosp_home_metas',
        'type'    => 'text',
        'title'   => 'Metas(非必填)',
        'desc'    => 'Metas(非必填)',
        'default' => '',
    ),

));



$options[]      = array(
  'name'        => 'sns',
  'title'       => '社交',
  'icon'        => 'fa fa-users',
  'fields'      => array(
        // twitter
        array(
            'id'      => 'plus_left_qqImg',
            'type'    => 'upload',
            'title'   => 'qq',
            'desc'    => '上传站长QQ添加好友二维码',
        ),
        // qq
        array(
            'id'      => 'plus_left_wxImg',
            'type'    => 'upload',
            'title'   => 'weixin',
            'desc'    => '上传站长微信添加好友二维码',
        ),
        // GitHub
        array(
            'id'      => 'plus_left_github',
            'type'    => 'text',
            'title'   => 'GitHub',
            'desc'    => '请设置GitHub地址，请带上http://',
        ),
        // 新浪微博
        array(
            'id'      => 'plus_left_weibo',
            'type'    => 'text',
            'title'   => '微博',
            'desc'    => '请设置新浪微博地址，请带上http://',
        ),
  ));

$options[]      = array(
  'name'        => 'aq',
  'title'       => '安全',
  'icon'        => 'fa fa-h-square',
  'fields'      => array(
    // 维护模式
    array(
        'id'    => 'plus_weihu',
        'type'  => 'switcher',
        'title' => '维护模式',
    ),
    // 标题
    array(
        'id'         => 'plus_maintenance_title',
        'type'       => 'text',
        'title'      => '标题',
        'default'    => '维护中...',
        'dependency' => array( 'plus_weihu', '==', 'true' ),
    ),
    // 内容
    array(
        'id'         => 'plus_maintenance_notice',
        'type'       => 'text',
        'title'      => '内容',
        'default'    => '维护中...',
        'dependency' => array( 'plus_weihu', '==', 'true' ),
    ),
    // 修改原始登录入口
    array(
        'id'    => 'plus_hide_login',
        'type'  => 'switcher',
        'title' => '修改原始登录入口',
    ),
    // 入口前缀
    array(
        'id'         => 'plus_login_prefix',
        'type'       => 'text',
        'title'      => '入口前缀',
        'default'    => '123',
        'dependency' => array( 'plus_hide_login', '==', 'true' ),
    ),
    // 入口后缀
    array(
        'id'         => 'plus_login_suffix',
        'type'       => 'text',
        'title'      => '入口后缀',
        'default'    => 'abc',
        'dependency' => array( 'plus_hide_login', '==', 'true' ),
    ),
    // 非法跳转地址
    array(
        'id'         => 'plus_login_link',
        'type'       => 'text',
        'title'      => '非法跳转地址',
        'default'    => 'http://www.htm.fun/',
        'dependency' => array( 'plus_hide_login', '==', 'true' ),
    ),
    // 过滤HTTP 1.0
    array(
        'id'    => 'plus_login_http',
        'type'  => 'switcher',
        'title' => '过滤HTTP 1.0',
    ),

));

$options[]      = array(
  'name'        => 'tuozhan',
  'title'       => '拓展',
  'icon'        => 'fa fa-eercast',
  'fields'      => array(

    // SMTP发邮件
    array(
        'id'    => 'plus_site_smtp',
        'type'  => 'switcher',
        'title' => 'SMTP发邮件',
    ),
    // 发件人名称
    array(
        'id'         => 'plus_smtp_name',
        'type'       => 'text',
        'title'      => '发件人名称',
        'default'    => '',
        'dependency' => array( 'plus_site_smtp', '==', 'true' ),
    ),
    // SMTP服务器地址
    array(
        'id'         => 'plus_smtp_server',
        'type'       => 'text',
        'title'      => 'SMTP服务器地址',
        'default'    => '',
        'dependency' => array( 'plus_site_smtp', '==', 'true' ),
    ),
    // SMTP服务器端口
    array(
        'id'         => 'plus_smtp_port',
        'type'       => 'text',
        'title'      => 'SMTP服务器端口',
        'default'    => '',
        'dependency' => array( 'plus_site_smtp', '==', 'true' ),
    ),
    // 邮箱账号
    array(
        'id'         => 'plus_smtp_email',
        'type'       => 'text',
        'title'      => '邮箱账号',
        'default'    => '',
        'dependency' => array( 'plus_site_smtp', '==', 'true' ),
    ),
    // 邮箱密码
    array(
        'id'         => 'plus_smtp_password',
        'type'       => 'text',
        'title'      => '邮箱密码',
        'default'    => '',
        'dependency' => array( 'plus_site_smtp', '==', 'true' ),
    ),
    // 百度主动推送
    array(
        'id'    => 'plus_baidu_submit',
        'type'  => 'switcher',
        'title' => '百度主动推送',
    ),
    // 百度站长平台认证域名
    array(
        'id'         => 'plus_baidu_link',
        'type'       => 'text',
        'title'      => '百度站长平台认证域名',
        'default'    => '',
        'dependency' => array( 'plus_baidu_submit', '==', 'true' ),
    ),
    // 推送秘钥
    array(
        'id'         => 'plus_baidu_key',
        'type'       => 'text',
        'title'      => '推送秘钥',
        'default'    => '',
        'dependency' => array( 'plus_baidu_submit', '==', 'true' ),
    ),

    // 熊掌号
    array(
        'id'    => 'xzh_on',
        'type'  => 'switcher',
        'title' => '百度熊掌号',
    ),

    // 推送密钥 Appid
    array(
        'id'         => 'xzh_appid',
        'type'       => 'text',
        'title'      => 'Appid',
        'default'    => '',
        'dependency' => array( 'xzh_on', '==', 'true' ),
    ),
    // 推送密钥 token
    array(
        'id'         => 'xzh_post_token',
        'type'       => 'text',
        'title'      => '推送密钥 token',
        'default'    => '',
        'dependency' => array( 'xzh_on', '==', 'true' ),
    ),
    // 粉丝关注
    array(
      'id'    => 'xzh_render_head',
      'type'  => 'switcher',
      'title' => '粉丝关注',
      'dependency' => array( 'xzh_on', '==', 'true' ),
    ),
    // 文章段落间bar
    array(
      'id'    => 'xzh_render_body',
      'type'  => 'switcher',
      'title' => '文章段落间bar',
      'dependency' => array( 'xzh_on', '==', 'true' ),
    ),
    // 底部bar
    array(
      'id'    => 'xzh_render_tail',
      'type'  => 'switcher',
      'title' => '底部bar',
      'dependency' => array( 'xzh_on', '==', 'true' ),
    ),
    // 添加JSON_LD数据
    array(
      'id'    => 'xzh_jsonld_single',
      'type'  => 'switcher',
      'title' => '添加JSON_LD数据',
      'dependency' => array( 'xzh_on', '==', 'true' ),
    ),
    // 页面
    array(
      'id'    => 'xzh_jsonld_page',
      'type'  => 'switcher',
      'title' => '页面',
      'dependency' => array( 'xzh_on', '==', 'true' ),
    ),
    // 添加JSON_LD数据 - 不添加图片
    array(
      'id'    => 'xzh_jsonld_img',
      'type'  => 'switcher',
      'title' => '添加JSON_LD数据 - 不添加图片',
      'dependency' => array( 'xzh_on', '==', 'true' ),
    ),
    // 新增文章实时推送
    array(
      'id'    => 'xzh_post_on',
      'type'  => 'switcher',
      'title' => '新增文章实时推送',
      'dependency' => array( 'xzh_on', '==', 'true' ),
    ),
));

$options[]      = array(
  'name'        => 'diycssjs',
  'title'       => '自定义',
  'icon'        => 'fa fa-columns',
  'fields'      => array(

    array(
      'id'    => 'plus_diy_css',
      'type'  => 'textarea',
      'title' => '自定义css样式',
      'desc'    => '不需要写style标签',
    ),

    array(
      'id'    => 'plus_diy_js',
      'type'  => 'textarea',
      'title' => '自定义js样式',
      'desc'    => '需要写script标签,位于页尾部分',
    ),
  ));

$options[]   = array(
  'name'     => 'backup_section',
  'title'    => '备份',
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => '你可以保存当前设置，下载配置或者上传配置',
    ),

    array(
      'type'    => 'backup',
    ),

  )
);


CSFramework::instance( $settings, $options );