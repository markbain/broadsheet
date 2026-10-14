<?php
/**
 * Title: Read more
 * Slug: bd324-broadsheet/read-more
 * Keywords: link, bracket, read more, call to action
 * Categories: bd324_broadsheet_part
 * Block Types: core/paragraph
 * Viewport width: 800
 * Description: A "Read more" link to the posts page, closed by the bracket tick. The tick is drawn in CSS, so this stays an ordinary editable paragraph.
 *
 * @package Broadsheet
 * @since Broadsheet 1.0.0
 */

?>
<!-- wp:paragraph {"className":"u-lab s-tick"} -->
<?php
// The posts page when the site has one, otherwise the front of the site.
$bd324_broadsheet_posts_page = (int) get_option( 'page_for_posts' );
$bd324_broadsheet_more_url   = $bd324_broadsheet_posts_page ? get_permalink( $bd324_broadsheet_posts_page ) : home_url( '/' );
?>
<p class="u-lab s-tick"><a href="<?php echo esc_url( $bd324_broadsheet_more_url ); ?>"><?php esc_html_e( 'Read more', 'broadsheet' ); ?></a></p>
<!-- /wp:paragraph -->
