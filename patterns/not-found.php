<?php
/**
 * Title: 404 content
 * Slug: slipsheet/not-found
 * Keywords: 404, not found, error, search
 * Categories: slipsheet_part
 * Inserter: no
 * Viewport width: 1400
 * Description: The heading, explanation and search field shown on a 404.
 *
 * @package Slipsheet
 * @since Slipsheet 0.1.0
 */

?>
<!-- wp:heading {"level":1,"fontSize":"d-xl"} -->
<h1 class="wp-block-heading has-d-xl-font-size"><?php esc_html_e( 'Nothing at this address', 'slipsheet' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'The page has moved, or it was never printed. Try the search below.', 'slipsheet' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'slipsheet' ); ?>","showLabel":false,"buttonText":"<?php esc_attr_e( 'Search', 'slipsheet' ); ?>","buttonPosition":"button-outside"} /-->
