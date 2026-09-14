<?php
/**
 * Title: Hairline rows
 * Slug: slipsheet/rows
 * Keywords: list, rows, index, hairline, links
 * Categories: slipsheet_section
 * Block Types: core/list
 * Viewport width: 1400
 * Description: Stacked full-width rows, name at the left and a bracket parked at the right.
 *
 * @package Slipsheet
 * @since Slipsheet 0.1.0
 */

?>
<!-- wp:list {"className":"s-rows"} -->
<ul class="wp-block-list s-rows">
	<!-- wp:list-item {"className":"s-row"} -->
	<li class="s-row"><a href="#"><?php esc_html_e( 'First entry', 'slipsheet' ); ?></a></li>
	<!-- /wp:list-item -->

	<!-- wp:list-item {"className":"s-row"} -->
	<li class="s-row"><a href="#"><?php esc_html_e( 'Second entry', 'slipsheet' ); ?></a></li>
	<!-- /wp:list-item -->

	<!-- wp:list-item {"className":"s-row"} -->
	<li class="s-row"><a href="#"><?php esc_html_e( 'Third entry', 'slipsheet' ); ?></a></li>
	<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
