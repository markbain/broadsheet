<?php
/**
 * Title: Photograph
 * Slug: slipstream/plate
 * Keywords: image, photograph, cover, tag
 * Categories: slipstream_part
 * Block Types: core/cover
 * Viewport width: 800
 * Description: A photograph filling its cell, with a solid category tag stuck in the corner. Replace the image through the media library.
 *
 * @package Slipstream
 * @since Slipstream 0.1.0
 */

?>
<!-- wp:cover {"dimRatio":0,"overlayColor":"plate","isUserOverlayColor":true,"isDark":false,"minHeight":470,"className":"s-plate","layout":{"type":"default"}} -->
<div class="wp-block-cover is-light s-plate" style="min-height:470px"><span aria-hidden="true" class="wp-block-cover__background has-plate-background-color has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container">
	<!-- wp:paragraph {"className":"u-lab s-tag"} -->
	<p class="u-lab s-tag"><?php esc_html_e( 'Residency', 'slipstream' ); ?></p>
	<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->
