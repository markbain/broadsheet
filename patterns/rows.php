<?php
/**
 * Title: Hairline rows
 * Slug: broadsheet/rows
 * Keywords: list, rows, index, hairline, links
 * Categories: broadsheet_section
 * Block Types: core/list
 * Viewport width: 1400
 * Description: Stacked full-width rows, name at the left and a bracket parked at the right.
 *
 * @package Broadsheet
 * @since Broadsheet 0.1.0
 */

?>
<!-- wp:list {"className":"s-rows"} -->
<ul class="wp-block-list s-rows">
	<!-- wp:list-item {"className":"s-row"} -->
	<li class="s-row"><a href="#"><?php esc_html_e( 'First entry', 'broadsheet' ); ?></a></li>
	<!-- /wp:list-item -->

	<!-- wp:list-item {"className":"s-row"} -->
	<li class="s-row"><a href="#"><?php esc_html_e( 'Second entry', 'broadsheet' ); ?></a></li>
	<!-- /wp:list-item -->

	<!-- wp:list-item {"className":"s-row"} -->
	<li class="s-row"><a href="#"><?php esc_html_e( 'Third entry', 'broadsheet' ); ?></a></li>
	<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
