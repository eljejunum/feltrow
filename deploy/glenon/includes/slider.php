	<?php if ( is_active_sidebar( 'sliderbar' ) ) : ?>
	<section id="slider">
		<div id="mask-slider" class="container">
			<div class="sixteen columns">
				<div class="gutter alpha omega">
					<?php dynamic_sidebar( 'sliderbar' ); ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>