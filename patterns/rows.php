<?php
/**
 * Title: Hairline rows
 * Slug: slipstream/rows
 * Keywords: list, rows, index, hairline, links
 * Categories: slipstream_section
 * Block Types: core/list
 * Viewport width: 1400
 * Description: Stacked full-width rows, name at the left and a bracket parked at the right.
 *
 * @package Slipstream
 * @since Slipstream 0.1.0
 */

?>
<!-- wp:list {"className":"s-rows"} -->
<ul class="wp-block-list s-rows">
	<!-- wp:list-item {"className":"s-row"} -->
	<li class="s-row"><a href="#"><?php esc_html_e( 'First entry', 'slipstream' ); ?></a></li>
	<!-- /wp:list-item -->

	<!-- wp:list-item {"className":"s-row"} -->
	<li class="s-row"><a href="#"><?php esc_html_e( 'Second entry', 'slipstream' ); ?></a></li>
	<!-- /wp:list-item -->

	<!-- wp:list-item {"className":"s-row"} -->
	<li class="s-row"><a href="#"><?php esc_html_e( 'Third entry', 'slipstream' ); ?></a></li>
	<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
