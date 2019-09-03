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
  'framework_title' => '<a style="color:#fff;text-decoration: none;" href="http://www.htm.fun/">UZero</a><small class="oldVer" data-vs="1.0.0 "style="color:#dc7575;margin-left:10px">Release 1.0.0</small>',
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
        'desc'    => '请输入博客名字',
        'default' => '',
    ),
    // 站名
    array(
        'id'      => 'plus_description',
        'type'    => 'text',
        'title'   => '博客描述',
        'desc'    => '请一句话描述博客',
        'default' => '',
    ),
  // 站长简介背景图
    array(
        'id'      => 'plus_blog_info_bgImg',
        'type'    => 'upload',
        'title'   => '站长简介背景图',
        'desc'    => '请上传大于380*200的图片',
        'default' => '',
    ),
    // 建站时间
    array(
        'id'      => 'plus_date',
        'type'    => 'text',
        'title'   => '建站时间',
        'desc'    => '设置建站时间，格式为：2008-8-18',
        'default' => '2008-8-18',
    ),
  // 居住地
    array(
        'id'      => 'plus_from',
        'type'    => 'text',
        'title'   => '居住地址',
        'desc'    => '请输入你想显示的居住地',
        'default' => '中国',
    ),
    // 网站配色
    array(
      'id'         => 'plus_color',
      'type'       => 'radio',
      'title'      => '网站配色',
      'options'    => array(
        'no' => '默认模式',
        'blue' => '蓝色模式',
        'blueBlack' => '蓝黑模式',
        'black' =>'暗黑模式'
      ),
      'default'    => 'no'
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
            'title'   => 'qq二维码',
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
    // 邮箱地址
    array(
        'id'      => 'plus_left_emil',
        'type'    => 'text',
        'title'   => '邮箱',
        'desc'    => '请输入你的邮箱',
        'default' => '',
    ),

    // 邮箱地址
    array(
        'id'      => 'plus_left_qqText',
        'type'    => 'text',
        'title'   => 'QQ账号',
        'desc'    => '请输入你的QQ号',
        'default' => '',
    ),


  ));
$options[]      = array(
  'name'        => 'diycs1sjs',
  'title'       => '广告',
  'icon'        => 'fa fa-columns',
  'fields'      => array(
    array(
      'id'    => 'adv-index-top',
      'type'  => 'textarea',
      'title' => '首页轮播图顶部广告，横通。',
      'desc'    => '请设置自适应广告',
    ),
    array(
      'id'    => 'adv-single-content-1',
      'type'  => 'textarea',
      'title' => '文章页评论框上，文章主体下广告位',
      'desc'    => '请设置自适应广告',
    ),

    array(
      'id'    => 'adv-single-left-1',
      'type'  => 'textarea',
      'title' => '文章页右侧广告1',
      'desc'    => '请设置自适应广告',
    ),
    array(
      'id'    => 'adv-single-left-2',
      'type'  => 'textarea',
      'title' => '文章页右侧广告2',
      'desc'    => '请设置自适应广告',
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