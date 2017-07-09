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
			console.log('prueba');
		    $('html, body').animate({
		        scrollTop: $("#section-unete").offset().top - 100
		    }, 700);
		});

	});
})(jQuery);
