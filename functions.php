<?php
/**
 * Slipsheet functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Slipsheet
 * @since Slipsheet 0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'slipsheet_enqueue_styles' ) ) :
	/**
	 * Enqueues the theme stylesheets on the front.
	 *
	 * WordPress does not enqueue a block theme's style.css automatically - there
	 * is no such hook in core's default-filters.php, and Twenty Twenty-Five
	 * enqueues its own. Both files are registered here.
	 *
	 * foundation.css is declared as a dependency of style.css, which fixes the
	 * load order: reset / base / layout (layered) first, components (unlayered)
	 * second. See README.md, "The layer contract".
	 *
	 * @since Slipsheet 0.1.0
	 *
	 * @return void
	 */
	function slipsheet_enqueue_styles() {
		$version = wp_get_theme()->get( 'Version' );

		wp_enqueue_style(
			'slipsheet-foundation',
			get_parent_theme_file_uri( 'assets/css/foundation.css' ),
			array(),
			$version
		);
		wp_style_add_data(
			'slipsheet-foundation',
			'path',
			get_parent_theme_file_path( 'assets/css/foundation.css' )
		);

		wp_enqueue_style(
			'slipsheet-style',
			get_parent_theme_file_uri( 'style.css' ),
			array( 'slipsheet-foundation' ),
			$version
		);
		wp_style_add_data(
			'slipsheet-style',
			'path',
			get_parent_theme_file_path( 'style.css' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'slipsheet_enqueue_styles' );

if ( ! function_exists( 'slipsheet_editor_style' ) ) :
	/**
	 * Enqueues the same two stylesheets in the editors, so what an editor sees
	 * matches the front end.
	 *
	 * @since Slipsheet 0.1.0
	 *
	 * @return void
	 */
	function slipsheet_editor_style() {
		add_editor_style(
			array(
				'assets/css/foundation.css',
				'style.css',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'slipsheet_editor_style' );

if ( ! function_exists( 'slipsheet_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Slipsheet 0.1.0
	 *
	 * @return void
	 */
	function slipsheet_pattern_categories() {
		register_block_pattern_category(
			'slipsheet_section',
			array(
				'label'       => __( 'Slipsheet sections', 'slipsheet' ),
				'description' => __( 'Bands, hairline grids, ledgers and pauses.', 'slipsheet' ),
			)
		);

		register_block_pattern_category(
			'slipsheet_part',
			array(
				'label'       => __( 'Slipsheet parts', 'slipsheet' ),
				'description' => __( 'Small pieces: the wordmark, a bracket link, a photograph plate.', 'slipsheet' ),
			)
		);
	}
endif;
add_action( 'init', 'slipsheet_pattern_categories' );

if ( ! function_exists( 'slipsheet_remove_core_patterns' ) ) :
	/**
	 * Hides the bundled core patterns.
	 *
	 * This is a bespoke theme with a strict visual system - core patterns bring
	 * in rounded cards, gradients and shadows the design does not have. Comment
	 * out the add_action below if a site needs them.
	 *
	 * @since Slipsheet 0.1.0
	 *
	 * @return void
	 */
	function slipsheet_remove_core_patterns() {
		remove_theme_support( 'core-block-patterns' );
	}
endif;
add_action( 'after_setup_theme', 'slipsheet_remove_core_patterns' );

if ( ! function_exists( 'slipsheet_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * The ink styles let an editor set a section's loud colour without touching
	 * CSS. The rationing rule is one loud ink per band, so they are mutually
	 * exclusive by design: pick one per section.
	 *
	 * @since Slipsheet 0.1.0
	 *
	 * @return void
	 */
	function slipsheet_block_styles() {
		$inks = array(
			'ink-red'   => __( 'Ink: red', 'slipsheet' ),
			'ink-blue'  => __( 'Ink: blue', 'slipsheet' ),
			'ink-black' => __( 'Ink: black', 'slipsheet' ),
		);

		foreach ( array( 'core/group', 'core/columns' ) as $block ) {
			foreach ( $inks as $slug => $label ) {
				register_block_style(
					$block,
					array(
						'name'  => $slug,
						'label' => $label,
					)
				);
			}
		}

		// The two rules that separate everything: a heavy bar and a hairline.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'bar',
				'label' => __( 'Bar', 'slipsheet' ),
			)
		);
		register_block_style(
			'core/separator',
			array(
				'name'  => 'hairline',
				'label' => __( 'Hairline', 'slipsheet' ),
			)
		);

		// A list that keeps the hairline rhythm without the bullet.
		register_block_style(
			'core/list',
			array(
				'name'         => 'ruled-list',
				'label'        => __( 'Ruled', 'slipsheet' ),
				'inline_style' => '
				ul.is-style-ruled-list {
					list-style: none;
					padding-inline-start: 0;
					border-block-start: 1px solid currentColor;
				}

				ul.is-style-ruled-list li {
					padding-block: 12px;
					border-block-end: 1px solid currentColor;
				}',
			)
		);
	}
endif;
add_action( 'init', 'slipsheet_block_styles' );
