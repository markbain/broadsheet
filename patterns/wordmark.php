<?php
/**
 * Title: Wordmark
 * Slug: slipstream/wordmark
 * Keywords: logo, wordmark, site title, slip
 * Categories: slipstream_part
 * Inserter: no
 * Viewport width: 1400
 * Description: The site name set as the slip - three strips, the middle one pushed sideways.
 *
 * @package Slipstream
 * @since Slipstream 0.1.0
 */

$slipstream_name = get_bloginfo( 'name' );
?>
<!-- wp:html -->
<a class="s-slip u-disp" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-size: var(--wp--preset--font-size--d-xl);" aria-label="<?php echo esc_attr( $slipstream_name ); ?>">
	<span class="s-slip__sizer" aria-hidden="true"><?php echo esc_html( $slipstream_name ); ?></span>
	<span class="s-slip__a" aria-hidden="true"><?php echo esc_html( $slipstream_name ); ?></span>
	<span class="s-slip__b" aria-hidden="true"><?php echo esc_html( $slipstream_name ); ?></span>
	<span class="s-slip__c" aria-hidden="true"><?php echo esc_html( $slipstream_name ); ?></span>
</a>
<!-- /wp:html -->
