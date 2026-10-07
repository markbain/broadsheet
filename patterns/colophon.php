<?php
/**
 * Title: Colophon
 * Slug: broadsheet/colophon
 * Keywords: footer, copyright, legal
 * Categories: broadsheet_part
 * Inserter: no
 * Viewport width: 1400
 * Description: Copyright line, and the privacy policy link once the site has set one.
 *
 * @package Broadsheet
 * @since Broadsheet 1.0.0
 */

?>
<!-- wp:group {"className":"s-colophon","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group s-colophon">
	<!-- wp:paragraph {"className":"u-lab u-quiet","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<p class="u-lab u-quiet" style="margin-top:0;margin-bottom:0">
		<?php
		printf(
			/* translators: 1: year, 2: site name. */
			esc_html__( '&copy; %1$s %2$s', 'broadsheet' ),
			esc_html( gmdate( 'Y' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
		?>
	</p>
	<!-- /wp:paragraph -->

	<?php if ( get_privacy_policy_url() ) : ?>
	<!-- wp:paragraph {"className":"u-lab u-quiet","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<p class="u-lab u-quiet" style="margin-top:0;margin-bottom:0"><?php echo wp_kses_post( get_the_privacy_policy_link() ); ?></p>
	<!-- /wp:paragraph -->
	<?php endif; ?>
</div>
<!-- /wp:group -->
