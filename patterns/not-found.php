<?php
/**
 * Title: 404 content
 * Slug: broadsheet/not-found
 * Keywords: 404, not found, error, search
 * Categories: broadsheet_part
 * Inserter: no
 * Viewport width: 1400
 * Description: The heading, explanation and search field shown on a 404.
 *
 * @package Broadsheet
 * @since Broadsheet 1.0.0
 */

?>
<!-- wp:heading {"level":1,"fontSize":"d-xl"} -->
<h1 class="wp-block-heading has-d-xl-font-size"><?php esc_html_e( 'Nothing at this address', 'broadsheet' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'The page has moved, or it was never printed. Try the search below.', 'broadsheet' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'broadsheet' ); ?>","showLabel":false,"buttonText":"<?php esc_attr_e( 'Search', 'broadsheet' ); ?>","buttonPosition":"button-outside"} /-->
