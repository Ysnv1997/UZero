<?php get_header();?>
    <!-- 右内容box -->
    <div class="box-right">
        <!-- 引导页信息 -->
        <div class="right-index">
            <div class="right-index-logo container">
                <a href=""><i class="iconfont icon-shan"></i></a>
                <h2><?php echo cs_get_option('plus_name') ?></h2>
                <p><?php echo cs_get_option('plus_description') ?></p>
            </div>
            <div class="index-search container">
                <form method="get" role="search" class="form-search form-horizontal col-lg-4 col-md-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="搜索内容" aria-describedby="basic-addon2">
                        <div class="input-group-addon">
                            <button type="submit" class="btn btn-light"><i class="iconfont icon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="right-index-nav container">
                <ul>
                    <li><a href="" id="close-left">博客</a></li>
                    <li><a href="">电影</a></li>
                    <li><a href="">音乐</a></li>
                    <li><a href="">生活</a></li>
                </ul>
            </div>
        </div>
        <!-- 首页内容主体 -->
        <div class="right-content">
            <header class="index-header row">
                <div class="col-md-11">
                    <!-- 每日一句骚话容器，删了就不够骚了！ -->
                    <p class="day-txt" id="day-txt"></p>
                </div>
            </header>
            <div class="content-box">
                <h4>首页</h4>
                <!-- 轮播图 -->
                <?php if(cs_get_option('index-loop')): ?>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach (cs_get_option('index-loop') as $value): ?>
                            <div class="swiper-slide">
                                <a href="<?php echo $value['index-loop-url']; ?>" <?php if($value['index-loop-blank']){ echo 'target="_blank"';} ?>>
                                    <img src="<?php echo $value['index-loop-img']; ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>
                </div>
                <?php endif; ?>
                <!-- 轮播图结束 -->
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
                    <?php if(have_posts()): while(have_posts()): the_post(); ?>
                        <article class="col-md-6 col-lg-3">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php the_permalink(); ?>"><img class="lazy" data-original="<?php echo post_thumbnail_src(); ?>" data-loading="<?php bloginfo ('template_url'); ?>/images/loading.gif"></a>
                                </div>
                                <div class="list-content-body">
                                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                    <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 80,"..."); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="link iframe btn btn-primary">阅读全文</a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile;endif; ?>
                </div>
                <!-- 列表结束 -->
                <div class="pages-nav">
                <?php previous_posts_link(__('<div class="load-more" style="display: inline-block;">上一页</div>')) ?>
                <?php next_posts_link(__('<div class="load-more" style="display: inline-block;">下一页</div>')) ?>
                </div>
                <footer class="footer">
                    <p>2019 © <a href="">WordPress</a> theme by <a href="">shanran</a> 国家神秘组织统一代码：<a href="">渝ICP备17003755号</a></p>
                </footer>
            </div>
        </div>
    </div>
<?php get_footer();?>