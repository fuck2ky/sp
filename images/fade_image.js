// JavaScript Document

jQuery(window).bind("load", function() {
	
	$('.image_side img').show()				 
	
	
	//$(function() {
		//setInterval( "slideSwitch()", 7000 );
	//});

})

function slideSwitch() {
		var $active = $('.image_side IMG.active');
	
		if ( $active.length == 0 ) $active = $('.image_side IMG:last');
	
		var $next =  $active.next().length ? $active.next()
			: $('.image_side IMG:first');
	
		$active.addClass('last-active');
	
		$next.css({opacity: 0.0})
			.addClass('active')
			.animate({opacity: 1.0}, 5000, function() {
				$active.removeClass('active last-active');
			});
	}