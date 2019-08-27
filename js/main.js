jQuery(document).ready(function($) {
	var body = $('body');
	// 导航栏切换
	$('.left-state-button').on('click',function(){
		body.toggleClass('left-close');
	})
});