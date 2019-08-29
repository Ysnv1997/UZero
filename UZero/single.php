<?php get_header(); ?>
    <!-- 右内容box -->
    <div class="box-right">
		
        <!-- 首页内容主体 -->
        <div class="right-content">
            <header class="index-header">
                <!-- 待开发 -->
            </header>
            <div class="content-box">
				<div class="single-content-box row">
					<div class="col-md-8">
						<?php if( have_posts() ){ the_post();?>
						<div class="text-content">
							<article class="text-header">
								<h3><?php the_title(); ?></h3>
								<P class='single-info'><i class="iconfont icon-Clown"></i><?php the_author(); ?> · <?php the_time('Y'); ?>年 · <i class="iconfont icon-linedesign-14"></i><?php post_views(); ?> 次阅读</P>
								<div class="tags-list">
									<?php the_category(' '); ?>
								</div>
							</article>
							<div class="text-article">
								<?php the_content(); ?>
							</div>
						</div>
						<?php } ?>

						<div class="comment-box">
							<?php comments_template(); ?>
						</div>


					</div>
					<div class="col-md-4">
						22
					</div>
				</div>
			
                <footer class="footer">
                    <p>2019 © <a href="">WordPress</a> theme by <a href="">shanran</a> 国家神秘组织统一代码：<a href="">渝ICP备17003755号</a></p>
                </footer>
            </div>
        </div>
    </div>
<?php get_footer(); ?>