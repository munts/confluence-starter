(function($) {
	"use strict";

	$(window).load(function() {
		$("#loader").fadeOut("slow");
	});

	$(document).ready(function() {

		// ====================================================================

		// Header scroll function

		$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			if (scroll > 20) {
				$("header").addClass("hide-header");
			} else {
				$("header").removeClass("hide-header");
			}
		});

		// Superslides

		$('#slider').superslides({
			play: 6000,
			animation: 'fade',
			animation_speed: 2000
		});

		//=====================================================================

		// Carousels

		$("#specials .owl-carousel").owlCarousel({
			items: 4,
			margin: 30,
			loop: true,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>'],
			responsive:{
				0:{
					items:1
				},
				767:{
					items:2
				},
				992:{
					items:3
				}
			}
		});


		$("#home-reviews .owl-carousel").owlCarousel({
			items: 1,
			margin: 0,
			loop: false,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>']
		});

		$("#blog .owl-carousel").owlCarousel({
			items: 2,
			loop:true,
			responsiveClass:true,
			margin: 60,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>'],
			responsive:{
				0:{
					items:1
				},
				767:{
					items:2
				}
			}
		});

		/*$("#reviews .owl-carousel").owlCarousel({
			items: 1,
			margin: 0,
			loop: false,
			dots: false,
			nav: false,
			autoPlay: 4000
		});*/

		//=====================================================================

		// Home page reviews quote

		$("#home-reviews .owl-carousel blockquote").prepend("<i class='fa fa-quote-right fa-2x'></i>");



		// ====================================================================

		// Fancybox

		//$(".fancybox").fancybox();

		// ====================================================================

		/* Foundation Datepicker

		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
		var checkin = $('#reservation-arrival').datepicker({
			onRender: function(date) {
				return date.valueOf() < now.valueOf() ? 'disabled' : '';
			},
			format: 'dd/mm/yyyy'
		}).on('changeDate', function(ev) {
			if (ev.date.valueOf() > checkout.date.valueOf()) {
				var newDate = new Date(ev.date)
				newDate.setDate(newDate.getDate() + 1);
				checkout.setValue(newDate);
			}
			checkin.hide();
			$('#reservation-departure')[0].focus();
		}).data('datepicker');
		var checkout = $('#reservation-departure').datepicker({
			onRender: function(date) {
				return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			},
			format: 'dd/mm/yyyy'
		}).on('changeDate', function(ev) {
			checkout.hide();
		}).data('datepicker');    */

		//=====================================================================

	})

})(jQuery);