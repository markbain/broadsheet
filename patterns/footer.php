<?php
/**
 * Title: Footer
 * Slug: broadsheet/footer
 * Keywords: footer, colophon, links
 * Categories: broadsheet_part
 * Block Types: core/template-part/footer
 * Viewport width: 1400
 * Description: Wordmark and tagline beside two link columns, with the colophon below.
 *
 * @package Broadsheet
 * @since Broadsheet 0.1.0
 */

?>
<!-- wp:group {"tagName":"footer","className":"s-footer s-ink-red","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<footer class="wp-block-group s-footer s-ink-red" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"className":"s-footer__cols","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"0"}}}} -->
	<div class="wp-block-columns s-footer__cols">
		<!-- wp:column {"width":"380px","className":"s-footer__brand"} -->
		<div class="wp-block-column s-footer__brand" style="flex-basis:380px">
			<!-- wp:pattern {"slug":"broadsheet/wordmark-small"} /-->

			<!-- wp:site-tagline {"className":"u-lab","style":{"spacing":{"margin":{"top":"22px","bottom":"0"}}}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"s-footer__col"} -->
		<div class="wp-block-column s-footer__col">
			<!-- wp:navigation {"className":"s-nav s-nav--stacked","overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"s-footer__col"} -->
		<div class="wp-block-column s-footer__col">
			<!-- wp:navigation {"className":"s-nav s-nav--stacked","overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
				<!-- wp:navigation-link {"label":"<?php esc_attr_e( 'Newsletter', 'broadsheet' ); ?>","url":"#"} /-->

				<!-- wp:navigation-link {"label":"<?php esc_attr_e( 'Contact', 'broadsheet' ); ?>","url":"#"} /-->

				<!-- wp:navigation-link {"label":"<?php esc_attr_e( 'Press kit', 'broadsheet' ); ?>","url":"#"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"className":"is-style-hairline","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|20"}}}} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-hairline" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--20)"/>
	<!-- /wp:separator -->

	<!-- wp:pattern {"slug":"broadsheet/colophon"} /-->

</footer>
<!-- /wp:group -->
