<?php
/**
 * Title: Section with rows
 * Slug: slipsheet/section-rows
 * Keywords: section, list, rows, index
 * Categories: slipsheet_section
 * Viewport width: 1400
 * Description: A section title and quiet paragraph on the left, a set of hairline rows on the right.
 *
 * @package Slipsheet
 * @since Slipsheet 0.1.0
 */

?>
<!-- wp:columns {"className":"s-ink-red","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns s-ink-red" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:column {"width":"420px"} -->
	<div class="wp-block-column" style="flex-basis:420px">
		<!-- wp:heading {"fontSize":"d-2"} -->
		<h2 class="wp-block-heading has-d-2-font-size"><?php esc_html_e( 'A section title', 'slipsheet' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'The quiet paragraph that sits beside it and explains what the list is.', 'slipsheet' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:pattern {"slug":"slipsheet/rows"} /-->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
