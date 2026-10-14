<?php
/**
 * Title: Header
 * Slug: bd324-broadsheet/header
 * Keywords: header, masthead, wordmark, navigation
 * Categories: bd324_broadsheet_part
 * Block Types: core/template-part/header
 * Viewport width: 1400
 * Description: Wordmark, tagline, the heavy bar, and the navigation row with search.
 *
 * @package Broadsheet
 * @since Broadsheet 1.0.0
 */

?>
<!-- wp:group {"tagName":"header","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<header class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:0">

	<!-- wp:group {"className":"s-masthead","layout":{"type":"default"}} -->
	<div class="wp-block-group s-masthead">
		<!-- wp:pattern {"slug":"bd324-broadsheet/wordmark"} /-->

		<!-- wp:site-tagline {"textAlign":"right","className":"u-lab s-tagline"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"className":"is-style-bar","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}}} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-bar" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:0"/>
	<!-- /wp:separator -->

	<!-- wp:group {"className":"s-navrow","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group s-navrow">
		<!-- wp:navigation {"className":"s-nav","overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"left"}} /-->

		<!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'broadsheet' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Search', 'broadsheet' ); ?>","buttonText":"<?php esc_attr_e( 'Search', 'broadsheet' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"className":"s-search"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"className":"is-style-hairline","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-hairline" style="margin-top:0;margin-bottom:0"/>
	<!-- /wp:separator -->

</header>
<!-- /wp:group -->
