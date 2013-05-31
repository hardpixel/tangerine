jQuery.noConflict();

jQuery(document).foundation();

jQuery(document).ready(function($) {

// REGISTER FUNCTIONS

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

	// Orbit Slider

	$('#orbit-slider').orbitSettings();

});
