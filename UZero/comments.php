<?php if ( post_password_required() ) { return; } ?>
<div id="comments" class="clearfix">
    <?php if ( ! comments_open() ):?>
    <div id="respond">
        <p class="tips">
            <?php echo '评论已关闭。'; ?>
        </p>
    </div>
    <?php else: ?>
    <div class="respond-box">
	       <h3 class="comments-title">发表评论 <span id="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></span></h3>
        <?php if ( get_option( 'comment_registration') && !$user_ID ) : ?>
        <p class="tips">
            <?php print '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
        <?php else : ?>
        <div id="respond">
                    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="commentform">
            <?php if ( $user_ID ) : ?>
            <div class="comment-from-main">
                <div class="logged-in-as">你好，
                    <?php echo $user_identity; ?>！
                    <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出">
                        <?php echo '退出'; ?>
                    </a>
                </div>
            </div>
            <?php elseif ( '' !=$comment_author ): ?>
            <div class="comment-from-main">
                <div class="logged-in-as">
                    <?php printf(__( '你好，%s，'), $comment_author); ?>    
                </div>
            </div>
            <?php endif; ?>
            <?php if ( ! $user_ID ): ?>
            <div class="row">
                <p class="comment-note" style="color: #999;font-size: 14px; padding:0 1.5rem;">
                    人生在世，错别字在所难免，无需纠正。
                </p>
                <div class="col-sm-4">
                    <input required="required" type="text" name="author" id="author" placeholder="昵称orQQ" value="<?php echo $comment_author; ?>">
                </div>
                
                <div class="col-sm-4">
                    <input required="required" type="text" name="email" id="email" placeholder="邮箱"value="<?php echo $comment_author_email; ?>">
                </div>
                <div class="col-sm-4">
                    <input class="float-right" type="text" name="url" id="url" placeholder="网址（选填）"value="<?php echo $comment_author_url; ?>">
                </div>
            </div>
            
            <?php endif; ?>
            <div class="comment-from-textarea">
                <textarea required="required" class="form-control form-control-light" name="comment"></textarea>
            </div>
            <?php comment_id_fields(); ?>
            <?php do_action( 'comment_form', $post->ID); ?>
            <div class="form-submit">
                <span id="cancel-comment-reply" class="pull-left"><?php cancel_comment_reply_link('取消评论'); ?></span>
                <input name="submit" type="submit" id="submit" class="link iframe btn btn-primary pull-right" value="提交评论"
                />
                <!-- <input type='hidden' name='comment_post_ID' value='136' id='comment_post_ID'
                />
                <input type='hidden' name='comment_parent' id='comment_parent' value='0'
                /> -->
            </div>
        </form>
        </div>

        <?php endif; ?>
    </div>
    <?php if( !have_comments() ): ?>
        <p class="no-comment-list">这篇文章还没有评论者，快来成为第一位！</p>
    <?php else: ?>
    <div class="commentlist">
            <?php wp_list_comments( 'avatar_size=40&type=comment&callback=wpmee_comment&end-callback=wpmee_end_comment&max_depth='.get_option( 'thread_comments_depth')); ?>
    </div>
    <?php if ( get_comment_pages_count()>1 && get_option( 'page_comments' ) ) : ?>
        <div id="comments-navi">
            <?php paginate_comments_links( 'prev_text=<i class="iconfont icon-jiantou_liebiaoxiangzuo"></i>&next_text=>'); ?>
        </div>
    <?php endif;?>
    <?php endif;?>
    <?php endif; ?>
</div>