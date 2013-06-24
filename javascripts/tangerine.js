jQuery.noConflict();

jQuery(document).foundation();

jQuery(document).ready(function($) {

// REGISTER FUNCTIONS
	
	// Browser Class
	$.fn.addBrowserClass = function () {
		if( $.browser.mozilla == true ) {
			$(this).addClass('gecko');
		}

		if( $.browser.webkit == true ) {
			$(this).addClass('webkit');
		}

		if( $.browser.msie == true ) {
			$(this).addClass('msie');
		}

		if( $.browser.ipad == true ) {
			$(this).addClass('ipad');
		}

		if( $.browser.iphone == true ) {
			$(this).addClass('iphone');
		}

		if( $.browser.android == true ) {
			$(this).addClass('android');
		}
	}

	// Fix Sticky Main Menu
	$.fn.fixStickyMainMenu = function() {
		var $menu = $('#main-menu'),
			$viewport = $(window).width();

		$(window).resize(function () {
			if( $menu.hasClass('sticky') && $viewport > 940 ) {
				$('body').css('padding-top', '0');
			}
		});
	}

	// Orbit Slider

	// Extra settings not bundled with Orbit
	$.fn.orbitSettings = function() {
		var $orbit = $(this).find('.orbit-container'),
			$pause = $orbit.find('.orbit-timer > span'),
			$prev = $orbit.find('.orbit-prev'),
			$next = $orbit.find('.orbit-next');

		if( $(this).hasClass('pauseonhover') ) {

			$orbit.on('mouseenter mouseleave', function(e){
				$pause.trigger('click');
				e.stopPropagation();
			});
		}

		if( $(this).hasClass('keynav') ) {

			$(document).on('keydown', function(e){

				switch(e.which) {
					case $.ui.keyCode.LEFT:
						$prev.trigger('click');
					break;

					case $.ui.keyCode.RIGHT:
						$next.trigger('click');
					break;

					default: return;
				}

			}).on('keyup', function(e){

				switch(e.which) {
					case $.ui.keyCode.LEFT:
						$pause.trigger('click');
					break;

					case $.ui.keyCode.RIGHT:
						$pause.trigger('click');
					break;

					default: return;
				}
			});
		}
	}

// INIT FUNCTIONS

	$('html').addBrowserClass();

	// Orbit Slider

	$('#orbit-slider').orbitSettings();

// RESIZE FUNCTIONS

	$(document).fixStickyMainMenu();

});
