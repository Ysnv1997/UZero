    <div class="site-search-popup show-popup">
        <div class="search-popup-close">
            <div class="container">
                <div class="popup-close-btn">
                    <i class="text-xl czs-close-l"></i>
                </div>
            </div>
        </div>
        <div class="site-search-body">
            <div class="container">
                <form method="get" role="search" class="form-search form-horizontal" action="<?php echo home_url( '/' ); ?>">
                    <div class="input-group">
                        <input type="text" name="s" class="form-control" placeholder="搜索内容" aria-describedby="basic-addon2">
                        <div class="input-group-addon">
                            <button type="submit" class="btn btn-light"><i class="czs-search-l"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- 站内链接跳转弹窗 -->
    <div class="popIframe" id="popIframe">
        <a href="" class="closemask" id="closemask">
            <i class="czs-angle-right-l"></i>
        </a>
    </div>
    <?php wp_footer();?>
    <script><?php echo cs_get_option('plus_diy_js');?></script>
        
    
</body>

</html>