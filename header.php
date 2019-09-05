<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php wp_title( ' - ', true, 'right' ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php wp_head(); ?>

<style>
    <?php echo cs_get_option('plus_diy_css');?>
</style>

</head>

<body class="">
    <!-- 左导航 -->
    <div class="box-left">
        <div class="left-logo">
            <a rel="nofollow" href="<?php bloginfo('url'); ?>">
            <?php if(cs_get_option('plus_blog_logo')):?>
            <img src="<?php echo cs_get_option('plus_blog_logo');?>" alt="">
            <?php else:?>
                <?php bloginfo('name'); ?>
            <?php endif;?>
            </a>
        </div>
        <div class="navtager">
            <?php 
                wp_nav_menu( array( 
                'theme_location'=>'PrimaryMenu', 
                'menu_class'   => 'menuclass',   //ul节点class值
                'menu_id'   => 'menuid',         //ul节点id值
                'depth' => 0
                ));
            ?> 
        </div>
        <div class="contact">
            <ul>
                <?php if(cs_get_option('plus_left_qqImg')): ?>
                <li><a href="javascript:" data-img="<?php echo cs_get_option('plus_left_qqImg') ?>" data-title="扫一扫添加站长QQ" data-desc="<?php bloginfo('name')?>" class="pr-2 text-light single-popup">
                        <i class="czs-qq"></i></a></li>
                <?php endif; ?>
                <?php if(cs_get_option('plus_left_wxImg')): ?>
                <li>
                    <a href="javascript:" data-img="<?php echo cs_get_option('plus_left_wxImg') ?>" data-title="扫一扫添加站长微信" data-desc="<?php bloginfo('name')?>" class="pr-2 text-light single-popup">
                        <i class="czs-weixin"></i></a>
                </li>
                <?php endif; ?>
                <?php if(cs_get_option('plus_left_github')): ?>
                <li><a target="_blank" href="<?php echo cs_get_option('plus_left_github') ?>"><i class="czs-github-logo"></i></a></li>
                <?php endif; ?>
                <li><a href="javascript:;"><i id="searchBut" class="czs-search-l"></i></a></li>
            </ul>
        </div>



    </div><!-- 
    <div class="left-state-button">
        <i class="iconfont icon-Left"></i>
    </div> -->