<?php
/**
 * Title: News, four up
 * Slug: broadsheet/news
 * Keywords: posts, news, grid, query
 * Categories: broadsheet_section
 * Viewport width: 1400
 * Description: Latest posts in a four-column hairline grid that drops to two, then one.
 *
 * @package Broadsheet
 * @since Broadsheet 1.0.0
 */

?>
<!-- wp:group {"className":"s-ink-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group s-ink-accent">
	<!-- wp:group {"className":"s-head","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
	<div class="wp-block-group s-head">
		<!-- wp:heading {"fontSize":"d-2"} -->
		<h2 class="wp-block-heading has-d-2-font-size"><?php esc_html_e( 'News', 'broadsheet' ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:pattern {"slug":"broadsheet/link"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"queryId":1,"query":{"perPage":4,"postType":"post","offset":0,"order":"desc","orderBy":"date","inherit":false}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"className":"s-grid s-grid--4","layout":{"type":"default"}} -->
			<!-- wp:group {"className":"s-cell--tight","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group s-cell--tight">
				<!-- wp:post-date {"className":"u-lab u-quiet","format":"j F Y","isLink":true} /-->
				<!-- wp:post-title {"isLink":true,"fontSize":"d-4"} /-->
				<!-- wp:post-excerpt {"excerptLength":22,"showMoreOnNewLine":false} /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:pattern {"slug":"broadsheet/no-results"} /-->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
