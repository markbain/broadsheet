<?php
/**
 * Title: Wordmark
 * Slug: broadsheet/wordmark
 * Keywords: logo, wordmark, site title, slip
 * Categories: broadsheet_part
 * Inserter: no
 * Viewport width: 1400
 * Description: The site name set as the slip - three strips, the middle one pushed sideways.
 *
 * @package Broadsheet
 * @since Broadsheet 1.0.0
 */

$broadsheet_name = get_bloginfo( 'name' );
?>
<!-- wp:html -->
<a class="s-slip s-slip--masthead u-disp" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( $broadsheet_name ); ?>">
	<span class="s-slip__sizer" aria-hidden="true"><?php echo esc_html( $broadsheet_name ); ?></span>
	<span class="s-slip__a" aria-hidden="true"><?php echo esc_html( $broadsheet_name ); ?></span>
	<span class="s-slip__b" aria-hidden="true"><?php echo esc_html( $broadsheet_name ); ?></span>
	<span class="s-slip__c" aria-hidden="true"><?php echo esc_html( $broadsheet_name ); ?></span>
</a>
<!-- /wp:html -->
