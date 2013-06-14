(function ($) {
	"use strict";
	var Page = (function() {

		var $navArrows = $( '#nav-arrows' ).hide(),
			$shadow = $( '#shadow' ).hide(),
			slicebox = $( '#sb-slider' ).slicebox( {
				onReady : function() {

				<?php if ($navi == true ) : ?>
					$navArrows.show();
				<?php endif; ?>
					$shadow.show();

				},
				orientation : 'r',
				cuboidsRandom : true,
				disperseFactor : 30,
				autoplay : true,
				speed3d : <?php echo $slider_duration; ?>,
				speed : 600,
				interval : <?php echo $slider_pause; ?>,
			} ),
			
			init = function() {

				initEvents();
				
			},
			initEvents = function() {

				// add navigation events
				$navArrows.children( ':first' ).on( 'click', function() {

					slicebox.next();
					return false;

				} );

				$navArrows.children( ':last' ).on( 'click', function() {
					
					slicebox.previous();
					return false;

				} );

			};

			return { init : init };

	})();

	Page.init();
	
}(jQuery));