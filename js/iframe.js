	// 劫持所有链接，站内iframe打开
	$('a[href!=""][target!="_blank"][rel!="nofollow"][data-fancybox != "gallery"]').on('click',function(){
		var href = $(this).attr('href');
		if (href.indexOf('javascript')== 0) {return}
		if ($(window).width()<=1200) {return}
		if ($(this).hasClass('page-numbers')) {return}
		$('iframe').remove()
		$('#popIframe').append('<iframe frameborder="0" allowfullscreen="true" allowtransparency="true" src="'+href+'"></iframe>')
		$('.popIframe').show();
		$('.left-state-button').hide();
		return false;
	})
	// a跳转弹窗关闭
	$('#closemask').on('click',function(){
		$('#popIframe').hide()
		$('.left-state-button').show()
		$('iframe').remove()
		return false;
	})
	try{

		if(self != top){
			$('body').addClass('isIframe')
		}

	} catch(err){}