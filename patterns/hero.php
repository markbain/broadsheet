<?php
/**
 * Title: Hero - three cells
 * Slug: slipstream/hero
 * Keywords: hero, header, grid, three column
 * Categories: slipstream_section
 * Viewport width: 1400
 * Description: Photograph, statement and an open-call panel, in one hairline grid.
 *
 * @package Slipstream
 * @since Slipstream 0.1.0
 */

?>
<!-- wp:group {"className":"s-grid s-grid--hero s-ink-red","layout":{"type":"default"}} -->
<div class="wp-block-group s-grid s-grid--hero s-ink-red">

	<!-- wp:pattern {"slug":"slipstream/plate"} /-->

	<!-- wp:group {"className":"s-hero-copy s-cell","layout":{"type":"default"}} -->
	<div class="wp-block-group s-hero-copy s-cell">
		<!-- wp:heading {"level":1,"fontSize":"d-1"} -->
		<h1 class="wp-block-heading has-d-1-font-size"><?php esc_html_e( 'A statement that runs to four or five lines and says the whole thing at once', 'slipstream' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'One short paragraph underneath, deliberately quiet. It is set small against a very loud heading, and it should not try to compete.', 'slipstream' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:pattern {"slug":"slipstream/link"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"s-call s-cell","backgroundColor":"blue","layout":{"type":"default"}} -->
	<div class="wp-block-group s-call s-cell has-blue-background-color has-background">
		<!-- wp:paragraph {"className":"u-lab","textColor":"yellow"} -->
		<p class="u-lab has-yellow-color has-text-color"><?php esc_html_e( 'Open call', 'slipstream' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"fontSize":"d-1","textColor":"paper"} -->
		<h2 class="wp-block-heading has-paper-color has-text-color has-d-1-font-size"><?php echo esc_html__( 'Four', 'slipstream' ) . '<br>' . esc_html__( 'short', 'slipstream' ) . '<br>' . esc_html__( 'words', 'slipstream' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"u-lab","textColor":"yellow"} -->
		<p class="u-lab has-yellow-color has-text-color"><?php echo esc_html__( 'Closes [DATE]', 'slipstream' ) . '<br>' . esc_html__( 'Ten places', 'slipstream' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
