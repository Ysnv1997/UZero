<?php get_header();?>
    <!-- 右内容box -->
    <div class="box-right">
        <!-- 首页内容主体 -->
        <div class="right-content">
            <?php include_once 'theme-header.php'; ?>
            <?php if(cs_get_option('adv-index-top')): ?>
                <div class="adv-index-top">
                    <?php echo cs_get_option('adv-index-top'); ?>
                </div>
            <?php endif; ?>
            <div class="content-box">
                <h4>搜索</h4>
                <?php 
                $sticky = get_option( 'sticky_posts' );
                $args = array(
                    'posts_per_page'      => 4,
                    'post__in'            => $sticky,
                    'ignore_sticky_posts' => 1,
                );
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() && $sticky) : ?>
                  <div class="index-list-top row">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <article class="col-md-6">
                        <div class="list-top-body">
                            <a href="<?php the_permalink(); ?>" class="title"><span>[热]</span><?php the_title(); ?></a>
                            <a href="<?php the_permalink(); ?>" class="link iframe btn btn-primary">阅读全文</a>
                        </div>
                    </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div> 
                <?php endif; ?>
                <!-- 推荐结束 -->
                <!-- 文章列表 -->
                <div class="index-list-box row">
                    <?php if(have_posts()): while(have_posts()):the_post(); ?>
                        <article class="col-md-6 col-lg-3"">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php the_permalink(); ?>"><img class="lazy" data-original="<?php echo post_thumbnail_src(); ?>" data-loading="<?php bloginfo ('template_url'); ?>/images/loading.gif"><div class="overlay"><i class="iconfont icon-fangda"></i></div></a>

                                </div>
                                <div class="list-content-body">
                                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                    <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 60,"..."); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="link iframe btn btn-primary">阅读全文</a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile;endif;?>




                </div>
                <!-- 列表结束 -->
                <div class="pages-nav">
                    <?php
                        the_posts_pagination( array(
                            'mid_size'  => 2,
                           'prev_text' => __( '上一页', 'chenxingweb' ),
                            'next_text' => __( '下一页', 'chenxingweb' )
                        ) );
                    ?>
                </div>
                <?php include_once 'theme-footer.php'; ?>
            </div>
        </div>
    </div>
<?php get_footer();?>