<?php
/**
 * Title: Link with bracket
 * Slug: slipsheet/link
 * Keywords: link, bracket, read more, call to action
 * Categories: slipsheet_part
 * Block Types: core/paragraph
 * Viewport width: 800
 * Description: An underlined link closed by the bracket tick. The tick is drawn in CSS, so this stays an ordinary editable paragraph.
 *
 * @package Slipsheet
 * @since Slipsheet 0.1.0
 */

?>
<!-- wp:paragraph {"className":"u-lab s-tick"} -->
<p class="u-lab s-tick"><a href="#"><?php esc_html_e( 'Read the programme', 'slipsheet' ); ?></a></p>
<!-- /wp:paragraph -->
