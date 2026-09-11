<?php
/**
 * Title: 404 content
 * Slug: slipstream/not-found
 * Keywords: 404, not found, error, search
 * Categories: slipstream_part
 * Inserter: no
 * Viewport width: 1400
 * Description: The heading, explanation and search field shown on a 404.
 *
 * @package Slipstream
 * @since Slipstream 0.1.0
 */

?>
<!-- wp:heading {"level":1,"fontSize":"d-xl"} -->
<h1 class="wp-block-heading has-d-xl-font-size"><?php esc_html_e( 'Nothing at this address', 'slipstream' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'The page has moved, or it was never printed. Try the search below.', 'slipstream' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'slipstream' ); ?>","showLabel":false,"buttonText":"<?php esc_attr_e( 'Search', 'slipstream' ); ?>","buttonPosition":"button-outside"} /-->
