jQuery(document).ready(function($) {
	var body = $('body');
	// 左边容器切换
	$('.left-state-button').on('click',function(){
		body.toggleClass('left-close');
	})
	// 二级导航栏切换
	$('.menu-icon').on('click',function(){
		var menuTwo = $(this).next();
		menuTwo.slideToggle(300)
	})

	$(document).on('click', '.single-popup', function(event) {
		event.preventDefault();
		var img = $(this).data("img");
		var title = $(this).data("title");
		var desc = $(this).data("desc");
		var html = '<div class="text-center"><h6>' + title + '</h6>\
						<p class="mt-1 mb-2">'+ desc +'</p>\
						<img src="' + img + '" alt="' + title + '">\
					</div>'
		ncPopup('small', html)
	});


});
// 提示弹窗
if (typeof jQuery != 'undefined') {
	var $ = jQuery.noConflict();
}

function ncPopupTips(type, msg) {
	var ico = type ? '<span class="d-block h1 text-success mb-2"><?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1553065772988" class="icon w-56" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2922" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200"><defs><style type="text/css"></style></defs><path d="M666.272 472.288l-175.616 192a31.904 31.904 0 0 1-23.616 10.4h-0.192a32 32 0 0 1-23.68-10.688l-85.728-96a32 32 0 1 1 47.744-42.624l62.144 69.6 151.712-165.888a32 32 0 1 1 47.232 43.2m-154.24-344.32C300.224 128 128 300.32 128 512c0 211.776 172.224 384 384 384 211.68 0 384-172.224 384-384 0-211.68-172.32-384-384-384" p-id="2923"></path></svg></span>' : '<span class="d-block h1 text-danger mb-2"><?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1553065784656" class="icon w-56" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3053" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200"><defs><style type="text/css"></style></defs><path d="M544 576a32 32 0 0 1-64 0v-256a32 32 0 0 1 64 0v256z m-32 160a32 32 0 1 1 0-64 32 32 0 0 1 0 64z m0-608C300.256 128 128 300.256 128 512s172.256 384 384 384 384-172.256 384-384S723.744 128 512 128z" p-id="3054"></path></svg></span>';
	var c = type ? 'tips-success' : 'tips-error';
	var html = '<section class="nice-tips '+c+' nice-tips-sm nice-tips-open">'+
					'<div class="nice-tips-overlay"></div>'+
                    '<div class="nice-tips-body text-center">'+
	                    '<div class="nice-tips-content px-5">'+ico+
	                        '<div class="text-sm text-muted">'+msg+'</div>'+
	                    '</div>'+
                    '</div>'+
                '</section>';
    var tips = $(html);
	$('body').append(tips);
	$('body').addClass('modal-open');
	if (typeof lazyLoadInstance !== "undefined") {
		lazyLoadInstance.update();
	}

	setTimeout(function(){
		$('body').removeClass('modal-open');
		tips.removeClass('nice-tips-open');
		tips.addClass('nice-tips-close');

		setTimeout(function(){
			tips.removeClass('nice-tips-close');
			setTimeout(function(){
				tips.remove();
			}, 200);
		},400);
	},1200);
}

function ncPopup(type, html, maskStyle, btnCallBack) {

	var maskStyle = maskStyle ? 'style="' + maskStyle + '"' : '';

	var size = '';

	if( type == 'big' ){
		size = 'nice-tips-lg';
	}else if( type == 'no-padding' ){
		size = 'nice-tips-nopd';
	}else if( type == 'cover' ){
		size = 'nice-tips-cover nice-tips-nopd';
	}else if( type == 'full' ){
		size = 'nice-tips-xl';
	}else if( type == 'scroll' ){
		size = 'nice-tips-scroll';
	}else if( type == 'middle' ){
		size = 'nice-tips-md';
	}else if( type == 'small' ){
		size = 'nice-tips-sm';
	}

	var template = '\
	<div class="nice-tips ' + size + ' nice-tips-open">\
		<div class="nice-tips-overlay" ' + maskStyle + '></div>\
		<div class="nice-tips-body">\
			<div class="nice-tips-content">\
				'+html+'\
			</div>\
			<div class="btn-close-tips">\
				<?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1553064665406" class="icon w-32" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3368" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200"><defs><style type="text/css"></style></defs><path d="M512 12C235.9 12 12 235.9 12 512s223.9 500 500 500 500-223.9 500-500S788.1 12 512 12z m166.3 609.7c15.6 15.6 15.6 40.9 0 56.6-7.8 7.8-18 11.7-28.3 11.7s-20.5-3.9-28.3-11.7L512 568.6 402.3 678.3c-7.8 7.8-18 11.7-28.3 11.7s-20.5-3.9-28.3-11.7c-15.6-15.6-15.6-40.9 0-56.6L455.4 512 345.7 402.3c-15.6-15.6-15.6-40.9 0-56.6 15.6-15.6 40.9-15.6 56.6 0L512 455.4l109.7-109.7c15.6-15.6 40.9-15.6 56.6 0 15.6 15.6 15.6 40.9 0 56.6L568.6 512l109.7 109.7z" p-id="3369"></path></svg>\
			</div>\
		</div>\
	</div>\
	';

	var popup = $(template);
	$('body').append(popup);
	$('body').addClass('modal-open');
	if (typeof lazyLoadInstance !== "undefined") {
		lazyLoadInstance.update();
	}

	var close = function(){
		$('body').removeClass('modal-open');
		$(popup).removeClass('nice-tips-open');
		$(popup).addClass('nice-tips-close');
		setTimeout(function(){
			$(popup).removeClass('nice-tips-close');
			setTimeout(function(){
				popup.remove();
			}, 200);
		},600);
	}

	$(popup).on('click touchstart', '.btn-close-tips, .nice-tips-overlay', function(event) {
		event.preventDefault();
		close();
	});


	if( typeof btnCallBack == 'object' ){
		Object.keys(btnCallBack).forEach(function(key){

			$(popup).on('click touchstart', key, function(event) {

				var ret = btnCallBack[key](event, close);

			});

		});
	}
	return popup;
}
