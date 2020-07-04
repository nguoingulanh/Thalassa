jQuery(function() {
	$('.languages a.current').on('click',function() {
		$('.languages ul').slideToggle();
		return false;
	});
	$('.menu-main li.has-sub > a').on('click',function() {
		$(this).parent().find('.sub-menu').slideToggle();
		return false;
	});
	$('.toggle-menu').on('click',function() {
		$('.menu-transform').fadeIn();
		$('#menu-main').addClass('active');
		return false;
	});
	$('.menu-close,.menu-transform').on('click',function() {
		$('.menu-transform').fadeOut();
		$('#menu-main').removeClass('active');
		return false;
	});
	$('.noti-close').on('click',function() {
		$(this).parents('.notification').slideUp();
		return false;
	});
	$('.select-custom .current').on('click',function() {
		$(this).parent().find('ul').slideToggle();
		return false;
	});
	$('.select-custom ul li a').on('click',function() {
		$(this).parents('.select-custom').find('.current').text($(this).text());
		$(this).parents('.select-custom').find('ul').slideToggle();
		return false;
	});
	$('.number-custom a.plus').on('click',function() {
		var paren = $(this).parents('.number-custom');
		var val = parseInt(paren.find('input').val()) + 1;
		paren.find('input').attr('value',val).val(val);
		return false;
	});
	$('.number-custom a.minus').on('click',function() {
		var paren = $(this).parents('.number-custom');
		var val = parseInt(paren.find('input').val()) - 1;
		if(val > 0) paren.find('input').attr('value',val).val(val);
		return false;
	});
})