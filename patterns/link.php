<?php
/**
 * Title: Link with bracket
 * Slug: broadsheet/link
 * Keywords: link, bracket, read more, call to action
 * Categories: broadsheet_part
 * Block Types: core/paragraph
 * Viewport width: 800
 * Description: An underlined link closed by the bracket tick. The tick is drawn in CSS, so this stays an ordinary editable paragraph.
 *
 * @package Broadsheet
 * @since Broadsheet 0.1.0
 */

?>
<!-- wp:paragraph {"className":"u-lab s-tick"} -->
<p class="u-lab s-tick"><a href="#"><?php esc_html_e( 'Read the programme', 'broadsheet' ); ?></a></p>
<!-- /wp:paragraph -->
