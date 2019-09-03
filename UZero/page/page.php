<?php get_header();?>
    <!-- 右内容box -->
    <div class="box-right">
        <!-- 首页内容主体 -->
        <div class="right-content">
            <?php get_template_part('theme','header');?>

            <?php if(cs_get_option('adv-index-top')): ?>
                <div class="adv-index-top">
                    <?php echo cs_get_option('adv-index-top'); ?>
                </div>
            <?php endif; ?>
            <div class="content-box">
                <!-- 推荐结束 -->
                <!-- 文章列表 -->
                <div class="index-list-box row">


                </div>

                <?php get_template_part('theme','footer');?>
            </div>
        </div>
    </div>
<?php get_footer();?>