var $=jQuery.noConflict();

(function($){
	"use strict";
	$(function(){

		/*------------------------------------*\
			#GLOBAL
		\*------------------------------------*/

		$(document).ready(function() {
		});

		$(".btn-scroll-unete a").click(function() {
		    $('html, body').animate({
		        scrollTop: $("#section-unete").offset().top - 100
		    }, 700);
		});

	});
})(jQuery);
