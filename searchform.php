<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<div class="row">
		<div class="small-12 columns">
			<div class="row collapse">
				<div class="small-8 columns">
					<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', TANGERINE_TEXTDOMAIN ); ?>" />
				</div>
				<div class="small-4 columns">
					<input type="submit" class="button prefix" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', TANGERINE_TEXTDOMAIN ); ?>" />
				</div>
			</div>
		</div>
	</div>

</form>
