<?php get_header(); ?>
    <!-- 右内容box -->
    <div class="box-right">
		
        <!-- 首页内容主体 -->
        <div class="right-content">
		<?php include_once 'theme-header.php'; ?>
            <div class="content-box">
				<div class="single-content-box row">
					<div class="col-md-9 col-sm-8">
						<?php if( have_posts() ){ the_post();?>
						<div class="text-content shadow">
							<article class="text-header">
								<h3><?php the_title(); ?></h3>
								<P class='single-info'><i class="iconfont icon-Clown"></i><?php the_author(); ?> · <?php the_time('Y'); ?>年 · <i class="iconfont icon-linedesign-14"></i><?php post_views(); ?> 次阅读</P>
								<div class="tags-list">
									<?php the_category(' '); ?>
								</div>
							</article>
							<div class="text-article entry-content">
								<?php the_content(); ?>
							</div>
						</div>
						<?php } ?>


						<?php if(cs_get_option('adv-single-content-1')): ?>
							<article class="adv shadow" style="margin-top: 30px;">
								<?php echo cs_get_option('adv-single-content-1'); ?>
							</article>
						<?php endif; ?>



						<div class="comment-box shadow">
							<?php comments_template(); ?>
						</div>


					</div>
					<div class="col-md-3 col-sm-4">
						<article class="widget blog-info shadow">
							<div class="blog-info-header" style="background-image: url(<?php echo cs_get_option('plus_blog_info_bgImg') ?>);">
								<span class="blog-info-name">
									<h4>山然博客</h4>
									<span>@ShanRan</span>
								</span>
								<img class="blog-info-img" src="<?php echo get_avatar_url(get_the_author_meta('email')); ?>">
								
							</div>
							<div class="blog-info-txt">
								<p><?php echo cs_get_option('plus_description'); ?></p>
							</div>
							<div class="blog-pucll-info">
								<div class="blog-pucll-butt row">
									<div class="blog-pucll-butt-on col-xs-4 artlist">
										<span>
											<i class="iconfont icon-bi"></i>文章
										</span>
										<p><?php echo wp_count_posts()->publish; ?></p>
									</div>
									<div class="blog-pucll-butt-on link col-xs-4">
										<span>友人</span>
										<p><?php $link = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->links WHERE link_visible = 'Y'"); echo $link; ?></p>
									</div>
									<div class="blog-pucll-butt-on col-xs-4">
										<span>评论</span>
										<p><?php echo wpb_comment_count();?></p>
									</div>
								</div>
								<div class="blog-pucll-box">
									<ul class="">
									<?php 
						                $sticky = get_option( 'sticky_posts' );
						                $args = array(
						                    'posts_per_page'=>5,
						                    'orderby'=>'date'
						                );
						                $the_query = new WP_Query( $args ); ?>
						                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>

										<?php endwhile;wp_reset_postdata(); ?>
									</ul>
								</div>
								<div class="blog-list-info">
									<ul>
										<li><i class="iconfont icon-dingwei"></i> <?php echo cs_get_option('plus_from'); ?></li>
										<li><i class="iconfont icon-linedesign-14"></i> <?php echo all_view(); ?>次访问</li>
										<li><i class="iconfont icon-shijian"></i> 建站<?php echo floor((time()-strtotime(cs_get_option('plus_date')))/86400); ?>天</li>
										<li><i class="iconfont icon-Mac"></i> <?php last_login(); ?></li>
									</ul>
								</div>
								<div class="blog-info-button">
									<a target="_blank" href="mailto:<?php echo cs_get_option('plus_left_emil'); ?>" class="but but-diy">邮箱联系</a>
									<a target="_blank" href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo cs_get_option('plus_left_qqText'); ?>&site=qq&menu=yes" class="but but-diy">在线沟通</a>
								</div>
							</div>
						</article>
						<?php if(cs_get_option('adv-single-left-1')): ?>
							<article class="widget adv">
								<?php echo cs_get_option('adv-single-left-1'); ?>
							</article>
						<?php endif; ?>
						<article class="widget shadow">
							<p>热门文章</p>
							<ul class="blog-pucll-box show">
							<?php 
				                $sticky = get_option( 'sticky_posts' );
				                $args = array(
				                    "meta_key" => "post_views_count",
									"orderby" => "meta_value_num",
									"order" => "DESC",
									"posts_per_page" => 7
				                );
				                $the_query = new WP_Query( $args ); ?>
				                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a><p><?php post_views(); ?>阅读</p></li>
								<?php endwhile;wp_reset_postdata(); ?>

							</ul>
						</article>
						<?php if(cs_get_option('adv-single-left-2')): ?>
							<article class="widget adv">
								<?php echo cs_get_option('adv-single-left-2'); ?>
							</article>
						<?php endif; ?>
					</div>
				</div>
			
                <?php include_once 'theme-footer.php'; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>