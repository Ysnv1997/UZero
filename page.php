<?php get_header(); ?>
    <!-- 右内容box -->
    <div class="box-right">
		
        <!-- 首页内容主体 -->
        <div class="right-content">
		<?php include_once 'theme-header.php'; ?>
            <div class="content-box">
				<div class="single-content-box row">
					<div class="col-lg-12">
						<?php if( have_posts() ){ the_post();?>
						<div class="text-content shadow">
							<article class="text-header">
								<h3><?php the_title(); ?></h3>
								<P class='single-info'><i class="czs-vimeo"></i><?php the_author(); ?> · <?php the_time('Y'); ?>年 · <i class="czs-eye-l"></i><?php post_views(); ?> 次阅读</P>
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
				</div>
			
                <?php include_once 'theme-footer.php'; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>