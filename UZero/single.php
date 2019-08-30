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
							<div class="text-article">
								<?php the_content(); ?>
							</div>
						</div>
						<?php } ?>

						<div class="comment-box shadow">
							<?php comments_template(); ?>
						</div>
					</div>
					<div class="col-md-3 col-sm-4">
						<article class="widget blog-info shadow">
							<div class="blog-info-header" style="background-image: url(https://fui.im/wp-content/themes/easter/img/infobg.jpg);">
								<span class="blog-info-name">
									<h4>山然博客</h4>
									<span>@ShanRan</span>
								</span>
								<img class="blog-info-img" src="http://0.gravatar.com/avatar/64337665631783c1b73030a1681fd289?s=128&d=mm&r=g">
								
							</div>
							<div class="blog-info-txt">
								<p>一个提前秃头的95后青年程序员！</p>
							</div>
							<div class="blog-pucll-info">
								<div class="blog-pucll-butt row">
									<div class="blog-pucll-butt-on col-xs-4 artlist">
										<span>
											<i class="iconfont icon-bi"></i>文章
										</span>
										<p>62</p>
									</div>
									<div class="blog-pucll-butt-on link col-xs-4">
										<span>友人</span>
										<p>62</p>
									</div>
									<div class="blog-pucll-butt-on col-xs-4">
										<span>访问</span>
										<p>62</p>
									</div>
								</div>
								<div class="blog-pucll-box">
									<ul class="">
										<li><a href="">一款骚气的WordPress主题！</a></li>
										<li><a href="">一款骚气的WordPress主题！</a></li>
										<li><a href="">一款骚气的WordPress主题！</a></li>
										<li><a href="">一款骚气的WordPress主题！</a></li>
										<li><a href="">一款骚气的WordPress主题！</a></li>
									</ul>
								</div>
								<div class="blog-list-info">
									<ul>
										<li><i class="iconfont icon-dingwei"></i> 重庆 · 渝北</li>
										<li><i class="iconfont icon-linedesign-14"></i> 3653次访问</li>
										<li><i class="iconfont icon-shijian"></i> 建站3695天</li>
										<li><i class="iconfont icon-Mac"></i> <?php last_login(); ?></li>
									</ul>
								</div>
								<div class="blog-info-button">
									<a href="" class="but but-diy">邮箱联系</a>
									<a href="" class="but but-diy">在线沟通</a>
								</div>
							</div>
						</article>
						<article class="widget adv">
							<img src="https://i.loli.net/2019/08/30/lSQEFbZMT7DYxAJ.jpg">
						</article>
						<article class="widget shadow">
							<p>热门文章</p>
							<ul class="blog-pucll-box show">
								<li><a href="">一款骚气的WordPress主题！</a><p>3264阅读</p></li>
								<li><a href="">一款骚气的WordPress主题！</a><p>3264阅读</p></li>
								<li><a href="">一款骚气的WordPress主题！</a><p>3264阅读</p></li>
								<li><a href="">一款骚气的WordPress主题！</a><p>3264阅读</p></li>
								<li><a href="">一款骚气的WordPress主题！</a><p>3264阅读</p></li>
								<li><a href="">一款骚气的WordPress主题！</a><p>3264阅读</p></li>
								<li><a href="">一款骚气的WordPress主题！</a><p>3264阅读</p></li>
							</ul>
						</article>
					</div>
				</div>
			
                <?php include_once 'theme-footer.php'; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>