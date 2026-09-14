<?php
/**
 * Title: Slogan band
 * Slug: slipsheet/band
 * Keywords: band, slogan, full width, crop marks
 * Categories: slipsheet_section
 * Block Types: core/group
 * Viewport width: 1400
 * Description: A full-bleed band with corner crop marks and one short slogan. One ink per band - set it with the Ink block style.
 *
 * @package Slipsheet
 * @since Slipsheet 0.1.0
 */

?>
<!-- wp:group {"align":"full","className":"s-band s-ink-red","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull s-band s-ink-red">
	<!-- wp:heading {"level":2,"fontSize":"d-2"} -->
	<h2 class="wp-block-heading has-d-2-font-size"><?php esc_html_e( 'A short line that earns the whole width', 'slipsheet' ); ?></h2>
	<!-- /wp:heading -->
</div>
<!-- /wp:group -->
