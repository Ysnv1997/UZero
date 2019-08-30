            <header class="index-header">
            	<div class="pc hidden-md hidden-sm hidden-xs">
                	<!-- 每日一句骚话容器，删了就不够骚了！ -->
                    <p class="day-txt" id="day-txt"></p>
					<a href="" class="but but-diy" id="login-but">立即登录</a>
            	</div>
				<div class="mobile hidden-lg">
					 <a href="javascript:history.go(-1)"><i class="iconfont icon-Left"></i></a>

						<div class="dropdown pull-right">
						  <a href="javascript:;" class="" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						    菜单
						    <span class="caret"></span>
						  </a>
						  <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenu1">
					    	<?php
                            if ( has_nav_menu( 'mobile' ) ) :
                                wp_nav_menu( array(
                                'theme_location' => 'mobile',
                                    'container' => false,
                                    'items_wrap' => '%3$s',
                                    ) );
                            endif;?>
						  </ul>
						</div>
				</div>
            </header>