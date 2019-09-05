<?php 
/*
*	Template Name: link  
*/
get_header(); ?>
    <!-- 右内容box -->
    <div class="box-right">
		
        <!-- 首页内容主体 -->
        <div class="right-content">
		<?php require_once get_template_directory() .'/theme-header.php'; ?>
            <div class="content-box">
				<div class="single-content-box row">
					<div class="col-lg-12">
						<h3>友情链接</h3>
						<div class="links">
							<div class="row">
								<?php 
									$bookmarks = get_bookmarks('title_li=&orderby=rand');
									if ( !empty($bookmarks) ) {
										foreach ($bookmarks as $bookmark) {
										echo '<div class="col-sm-4 col-md-3 links-box">
												<div class="author-details d-flex">
													<div class="author-pic col-xs-5">
														<a href="'.$bookmark->link_url.'">
															<img alt="" src="'.$bookmark->link_description.'" srcset="'.$bookmark->link_description.'" class="avatar photo">
														</a>
													</div>
													<div class="author-details-text col-xs-7">
														<div class="title">
															<h3>
																<a target="_blank" href="'.$bookmark->link_url.'">
																	'.$bookmark->link_name.'
																</a>
															</h3>
														</div>
														<p>
														'.$bookmark->link_notes.'
														</p>
													</div>
												</div>
											</div>';}};?>
							</div>
						</div>
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
		
				<?php require_once get_template_directory() .'/theme-footer.php'; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>