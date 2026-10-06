<?php
/**
 * Title: Wordmark, small
 * Slug: broadsheet/wordmark-small
 * Keywords: logo, wordmark, footer
 * Categories: broadsheet_part
 * Inserter: no
 * Viewport width: 800
 * Description: The slip wordmark at footer size.
 *
 * @package Broadsheet
 * @since Broadsheet 0.1.0
 */

$broadsheet_name = get_bloginfo( 'name' );
?>
<!-- wp:html -->
<span class="s-slip u-disp" style="font-size: clamp(34px, 3.4vw, 44px);">
	<span class="s-slip__sizer" aria-hidden="true"><?php echo esc_html( $broadsheet_name ); ?></span>
	<span class="s-slip__a" aria-hidden="true"><?php echo esc_html( $broadsheet_name ); ?></span>
	<span class="s-slip__b" aria-hidden="true"><?php echo esc_html( $broadsheet_name ); ?></span>
	<span class="s-slip__c" aria-hidden="true"><?php echo esc_html( $broadsheet_name ); ?></span>
</span>
<!-- /wp:html -->
