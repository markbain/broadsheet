<?php
/**
 * Title: Hero - three cells
 * Slug: bd324-broadsheet/hero
 * Keywords: hero, header, grid, three column
 * Categories: bd324_broadsheet_section
 * Viewport width: 1400
 * Description: Photograph, statement and an open-call panel, in one hairline grid.
 *
 * @package Broadsheet
 * @since Broadsheet 1.0.0
 */

?>
<!-- wp:group {"className":"s-grid s-grid--hero s-ink-accent","layout":{"type":"default"}} -->
<div class="wp-block-group s-grid s-grid--hero s-ink-accent">

	<!-- wp:pattern {"slug":"bd324-broadsheet/plate"} /-->

	<!-- wp:group {"className":"s-hero-copy s-cell","layout":{"type":"default"}} -->
	<div class="wp-block-group s-hero-copy s-cell">
		<!-- wp:heading {"level":1,"fontSize":"d-1"} -->
		<h1 class="wp-block-heading has-d-1-font-size"><?php esc_html_e( 'A statement that runs to four or five lines and says the whole thing at once', 'broadsheet' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'One short paragraph underneath, deliberately quiet. It is set small against a very loud heading, and it should not try to compete.', 'broadsheet' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:pattern {"slug":"bd324-broadsheet/read-more"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"s-call s-cell","backgroundColor":"accent-2","layout":{"type":"default"}} -->
	<div class="wp-block-group s-call s-cell has-accent-2-background-color has-background">
		<!-- wp:paragraph {"className":"u-lab","textColor":"accent-3"} -->
		<p class="u-lab has-accent-3-color has-text-color"><?php esc_html_e( 'Open call', 'broadsheet' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"fontSize":"d-1","textColor":"base"} -->
		<h2 class="wp-block-heading has-base-color has-text-color has-d-1-font-size"><?php echo esc_html__( 'Four', 'broadsheet' ) . '<br>' . esc_html__( 'short', 'broadsheet' ) . '<br>' . esc_html__( 'words', 'broadsheet' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"u-lab","textColor":"accent-3"} -->
		<p class="u-lab has-accent-3-color has-text-color"><?php echo esc_html__( 'A closing date', 'broadsheet' ) . '<br>' . esc_html__( 'Ten places', 'broadsheet' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
