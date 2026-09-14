<?php
/**
 * Title: Wordmark, small
 * Slug: slipsheet/wordmark-small
 * Keywords: logo, wordmark, footer
 * Categories: slipsheet_part
 * Inserter: no
 * Viewport width: 800
 * Description: The slip wordmark at footer size.
 *
 * @package Slipsheet
 * @since Slipsheet 0.1.0
 */

$slipsheet_name = get_bloginfo( 'name' );
?>
<!-- wp:html -->
<span class="s-slip u-disp" style="font-size: clamp(34px, 3.4vw, 44px);">
	<span class="s-slip__sizer" aria-hidden="true"><?php echo esc_html( $slipsheet_name ); ?></span>
	<span class="s-slip__a" aria-hidden="true"><?php echo esc_html( $slipsheet_name ); ?></span>
	<span class="s-slip__b" aria-hidden="true"><?php echo esc_html( $slipsheet_name ); ?></span>
	<span class="s-slip__c" aria-hidden="true"><?php echo esc_html( $slipsheet_name ); ?></span>
</span>
<!-- /wp:html -->
