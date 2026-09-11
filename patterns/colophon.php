<?php
/**
 * Title: Colophon
 * Slug: slipstream/colophon
 * Keywords: footer, copyright, legal
 * Categories: slipstream_part
 * Inserter: no
 * Viewport width: 1400
 * Description: Copyright line and legal links.
 *
 * @package Slipstream
 * @since Slipstream 0.1.0
 */

?>
<!-- wp:group {"className":"s-colophon","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group s-colophon">
	<!-- wp:paragraph {"className":"u-lab u-quiet","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<p class="u-lab u-quiet" style="margin-top:0;margin-bottom:0">
		<?php
		printf(
			/* translators: 1: year, 2: site name. */
			esc_html__( '&copy; %1$s %2$s', 'slipstream' ),
			esc_html( gmdate( 'Y' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
		?>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:navigation {"className":"s-nav s-nav--inline u-quiet","overlayMenu":"never","layout":{"type":"flex","justifyContent":"right"}} -->
		<!-- wp:navigation-link {"label":"<?php esc_attr_e( 'Terms', 'slipstream' ); ?>","url":"#"} /-->

		<!-- wp:navigation-link {"label":"<?php esc_attr_e( 'Privacy', 'slipstream' ); ?>","url":"#"} /-->
	<!-- /wp:navigation -->
</div>
<!-- /wp:group -->
