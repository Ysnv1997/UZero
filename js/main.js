jQuery(document).ready(function($) {
	var body = $('body');
	// 左边容器切换
	$('.left-state-button,#close-left').on('click',function(){
		body.toggleClass('left-close');
		return false;
	});
	// 图片懒加载注册
	$("img.lazy").lazyload({
		effect: "fadeIn",
		 placeholder : "http://www.htm.fun/wp-content/uploads/2019/08/1567233598-2699faee29464b6a.gif",

	});
	// 图片灯箱注册
	$('[data-fancybox="gallery"]').fancybox({
		protect: true,
		closeExisting: false,
		afterLoad : function(instance, current) {
	        var pixelRatio = window.devicePixelRatio || 1;

	        if ( pixelRatio > 1.5 ) {
	            current.width  = current.width  / pixelRatio;
	            current.height = current.height / pixelRatio;
	        }
	    }
	});
	// 二级导航栏切换
	if($('.navtager ul>li:has(ul)')){
		$('.navtager ul>li:has(ul)').append('<span class="menu-icon"><i class="czs-angle-down-l"></i></span>')
	}
	$('.menu-icon').on('click',function(){
		var menuTwo = $(this).prev();
		menuTwo.slideToggle(300);
		$(this).toggleClass('open')
	});

	// 搜索框切换
	$('.popup-close-btn').on('click',function(){
		$('.site-search-popup.show-popup').toggleClass('show-popup-close')
	})
	$('#searchBut').on('click',function(){
		$('.site-search-popup.show-popup').toggleClass('show-popup-close')
	})
	// 提示框调用
	$(document).on('click', '.single-popup', function(event) {
		event.preventDefault();
		var img = $(this).data("img");
		var title = $(this).data("title");
		var desc = $(this).data("desc");
		var html = '<div class="text-center"><h6>' + title + '</h6>\
						<p class="mt-1 mb-2">'+ desc +'</p>\
						<img src="' + img + '" alt="' + title + '">\
					</div>';
		ncPopup('small', html)
	});
    // 评论快速获取QQ信息
    function isNumber(value) {
        var patrn = /^(-)?\d+(\.\d+)?$/;
        if (patrn.exec(value) == null || value == "") {
            return false
        } else {
            return true
        }
    }

    // 评论快速获取QQ信息
    $("input#author").blur(function() {
        var _author = $(this).val();
        if (_author) {
                $.getJSON(stayma_url.url_ajax + '?action=ajax_qq_info&qqNum=' + _author, function(xhr) {
                    if (xhr[_author] == undefined) {
                        console.log('你的QQ号不存在，请检查，如果不使用QQ号，建议使用中英文昵称。');
                        $("input#author").focus();
                    } else if (xhr[_author][6] == "") {
                        console.log('你的QQ号可能是长期不登录或冻结状态？请检查。');
                        $("input#author").focus();
                    } else {
                        $("input#author").val(xhr[_author][6]);
                        $("input#email").val(_author + '@qq.com');
                        $("input#url").val('https://user.qzone.qq.com/' + _author);
                        $('#comment').focus();
                        //console.log(xhr);
                    }
                });
        }
        return;
    });
	// 首页轮播图调用
	  var mySwiper = new Swiper ('.swiper-container', {
	    loop: true, // 循环模式选项
	    autoplay:true,
	    // 如果需要分页器
	    pagination: {
		  el: '.swiper-pagination',
		  clickable :true,
	    },
	  }) 
	// 首页每日一句骚话---探探api
	// 感谢@淮城一只猫 提供骚话api
	function oneDayTTtxt(date){
		$.ajax({
			url: "https://bird.ioliu.cn/v2?url=https://my-tantan.tantanapp.com/api/daily_report?limit=1&until=" + date + "&headers={'H5-Authorization':'hV6iDl4WZHyeP8zQyXSRgDosPKnZodFgWuk2Ugr991ib1Lug00qxpLmQbbkNEx2m6l4e1xfefr0Etrw4jVp_wbJf9fdgLGYbl9JetrqukkgDIuQVbwtWRS2iuzt2775xODkEaijDWAaTVKGKpNKBYpXlAYZ3Lykp4FC68UpE3sQ0ZYbqjbV3JDz4rEuWhVLSSRgx0QA8WSQ'}",
			type: 'GET',
			dataType: 'json',
			success:function(data){
				$('#day-txt').text(data.data.reports[0].quote)
			}
		})
		
	}
	var theDate = dayjs().format('YYYY-MM-DD');
	oneDayTTtxt(theDate)
	// 浮动提示层
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	// 侧边栏右侧开关
	$('.artlist').on('click',function(){
		$('.blog-pucll-box').slideToggle(300)
	})

    // ajax评论
	commentAjax()
    function commentAjax() {

			jQuery(document).ready(function(jQuery) {
				var __cancel = jQuery('#cancel-comment-reply-link'),
					__cancel_text = __cancel.text(),
					__list = 'comment-list';//your comment wrapprer
				jQuery(document).on("submit", "#commentform", function() {
					jQuery.ajax({
						url: stayma_url.ajax_url,
						data: jQuery(this).serialize() + "&action=ajax_comment",
						type: jQuery(this).attr('method'),
						beforeSend: faAjax.createButterbar("提交中...."),
						error: function(request) {
							var t = faAjax;
							t.createButterbar(request.responseText);
						},
						success: function(data) {
							jQuery('textarea').each(function() {
								this.value = ''
							});
							var t = faAjax,
								cancel = t.I('cancel-comment-reply-link'),
								temp = t.I('wp-temp-form-div'),
								respond = t.I(t.respondId),
								post = t.I('comment_post_ID').value,
								parent = t.I('comment_parent').value;
								console.log(data)
								$('.commentlist').append(data)
							t.createButterbar("提交成功");
							cancel.style.display = 'none';
							cancel.onclick = null;
							t.I('comment_parent').value = '0';
							if (temp && respond) {
								temp.parentNode.insertBefore(respond, temp);
								temp.parentNode.removeChild(temp)
							}
						}
					});
					return false;
				});
				faAjax = {
					I: function(e) {
						return document.getElementById(e);
					},
					clearButterbar: function(e) {
						if (jQuery(".butterBar").length > 0) {
							jQuery(".butterBar").remove();
						}
					},
					createButterbar: function(message) {
						var t = this;
						t.clearButterbar();
						jQuery("#commentform").append('<div class="butterBar butterBar--center"><p class="butterBar-message">' + message + '</p></div>');
						setTimeout("jQuery('.butterBar').remove()", 3000);
					}
				};
			});
    }

    // ajax评论翻页
    ajaxCommenPage()
    function ajaxCommenPage(){
	    $('#comments-navi a').on('click',function(){
	    	var thisUrl = $(this).attr('href');
	    	$.ajax({
	    		url: thisUrl,
	    		type: 'GET',
	    		dataType: 'html',
	    		beforeSend:function(){
	    			$('.commentlist').fadeOut('300', function() {
	    				$(this).remove()
	    			});
	    			$('#comments-navi').fadeOut('300', function() {
	    				$(this).remove()
	    			});

	    		},
	    		success:function(data){
	    			var new_list = $(data).find('.commentlist'),
	    				new_nav = $(data).find('#comments-navi'),
	    				new_nav_a = new_nav.find('a');
	    			$('#comments').append(new_list.fadeIn(300))
					$('#comments').append(new_nav.fadeIn(300))
	    			ajaxCommenPage()
	    		},
	    		error:function(){}
	    	})
	    	return false;
	    })
    }




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
