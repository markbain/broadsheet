<?php
/**
 * Title: Hero - three cells
 * Slug: broadsheet/hero
 * Keywords: hero, header, grid, three column
 * Categories: broadsheet_section
 * Viewport width: 1400
 * Description: Photograph, statement and an open-call panel, in one hairline grid.
 *
 * @package Broadsheet
 * @since Broadsheet 0.1.0
 */

?>
<!-- wp:group {"className":"s-grid s-grid--hero s-ink-red","layout":{"type":"default"}} -->
<div class="wp-block-group s-grid s-grid--hero s-ink-red">

	<!-- wp:pattern {"slug":"broadsheet/plate"} /-->

	<!-- wp:group {"className":"s-hero-copy s-cell","layout":{"type":"default"}} -->
	<div class="wp-block-group s-hero-copy s-cell">
		<!-- wp:heading {"level":1,"fontSize":"d-1"} -->
		<h1 class="wp-block-heading has-d-1-font-size"><?php esc_html_e( 'A statement that runs to four or five lines and says the whole thing at once', 'broadsheet' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'One short paragraph underneath, deliberately quiet. It is set small against a very loud heading, and it should not try to compete.', 'broadsheet' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:pattern {"slug":"broadsheet/link"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"s-call s-cell","backgroundColor":"blue","layout":{"type":"default"}} -->
	<div class="wp-block-group s-call s-cell has-blue-background-color has-background">
		<!-- wp:paragraph {"className":"u-lab","textColor":"yellow"} -->
		<p class="u-lab has-yellow-color has-text-color"><?php esc_html_e( 'Open call', 'broadsheet' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"fontSize":"d-1","textColor":"paper"} -->
		<h2 class="wp-block-heading has-paper-color has-text-color has-d-1-font-size"><?php echo esc_html__( 'Four', 'broadsheet' ) . '<br>' . esc_html__( 'short', 'broadsheet' ) . '<br>' . esc_html__( 'words', 'broadsheet' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"u-lab","textColor":"yellow"} -->
		<p class="u-lab has-yellow-color has-text-color"><?php echo esc_html__( 'Closes [DATE]', 'broadsheet' ) . '<br>' . esc_html__( 'Ten places', 'broadsheet' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
