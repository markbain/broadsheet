<?php
/**
 * Title: Colophon
 * Slug: bd324-broadsheet/colophon
 * Keywords: footer, copyright, legal
 * Categories: bd324_broadsheet_part
 * Inserter: no
 * Viewport width: 1400
 * Description: Copyright line naming the site (a live, linked Site Title), and the privacy policy link once the site has set one.
 *
 * @package Broadsheet
 * @since Broadsheet 1.0.0
 */

?>
<!-- wp:group {"className":"s-colophon","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group s-colophon">
	<!-- wp:group {"className":"s-colophon__copy","layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group s-colophon__copy">
		<!-- wp:paragraph {"className":"u-lab u-quiet","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<p class="u-lab u-quiet" style="margin-top:0;margin-bottom:0">
			<?php
			printf(
				/* translators: %s: year. */
				esc_html__( '&copy; %s', 'broadsheet' ),
				esc_html( gmdate( 'Y' ) )
			);
			?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:site-title {"level":0,"className":"u-lab u-quiet"} /-->
	</div>
	<!-- /wp:group -->

	<?php if ( get_privacy_policy_url() ) : ?>
	<!-- wp:paragraph {"className":"u-lab u-quiet","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<p class="u-lab u-quiet" style="margin-top:0;margin-bottom:0"><?php echo wp_kses_post( get_the_privacy_policy_link() ); ?></p>
	<!-- /wp:paragraph -->
	<?php endif; ?>
</div>
<!-- /wp:group -->
