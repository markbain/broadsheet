<?php
/**
 * Broadsheet functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Broadsheet
 * @since Broadsheet 0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'broadsheet_enqueue_styles' ) ) :
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
	 * @since Broadsheet 0.1.0
	 *
	 * @return void
	 */
	function broadsheet_enqueue_styles() {
		$version = wp_get_theme()->get( 'Version' );

		wp_enqueue_style(
			'broadsheet-foundation',
			get_parent_theme_file_uri( 'assets/css/foundation.css' ),
			array(),
			$version
		);
		wp_style_add_data(
			'broadsheet-foundation',
			'path',
			get_parent_theme_file_path( 'assets/css/foundation.css' )
		);

		wp_enqueue_style(
			'broadsheet-style',
			get_parent_theme_file_uri( 'style.css' ),
			array( 'broadsheet-foundation' ),
			$version
		);
		wp_style_add_data(
			'broadsheet-style',
			'path',
			get_parent_theme_file_path( 'style.css' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'broadsheet_enqueue_styles' );

if ( ! function_exists( 'broadsheet_editor_style' ) ) :
	/**
	 * Enqueues the same two stylesheets in the editors, so what an editor sees
	 * matches the front end.
	 *
	 * @since Broadsheet 0.1.0
	 *
	 * @return void
	 */
	function broadsheet_editor_style() {
		add_editor_style(
			array(
				'assets/css/foundation.css',
				'style.css',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'broadsheet_editor_style' );

if ( ! function_exists( 'broadsheet_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Broadsheet 0.1.0
	 *
	 * @return void
	 */
	function broadsheet_pattern_categories() {
		register_block_pattern_category(
			'broadsheet_section',
			array(
				'label'       => __( 'Broadsheet sections', 'broadsheet' ),
				'description' => __( 'Bands, hairline grids, ledgers and pauses.', 'broadsheet' ),
			)
		);

		register_block_pattern_category(
			'broadsheet_part',
			array(
				'label'       => __( 'Broadsheet parts', 'broadsheet' ),
				'description' => __( 'Small pieces: the wordmark, a bracket link, a photograph plate.', 'broadsheet' ),
			)
		);
	}
endif;
add_action( 'init', 'broadsheet_pattern_categories' );

if ( ! function_exists( 'broadsheet_remove_core_patterns' ) ) :
	/**
	 * Hides the bundled core patterns.
	 *
	 * This is a bespoke theme with a strict visual system - core patterns bring
	 * in rounded cards, gradients and shadows the design does not have. Comment
	 * out the add_action below if a site needs them.
	 *
	 * @since Broadsheet 0.1.0
	 *
	 * @return void
	 */
	function broadsheet_remove_core_patterns() {
		remove_theme_support( 'core-block-patterns' );
	}
endif;
add_action( 'after_setup_theme', 'broadsheet_remove_core_patterns' );

if ( ! function_exists( 'broadsheet_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * The ink styles let an editor set a section's loud colour without touching
	 * CSS. The rationing rule is one loud ink per band, so they are mutually
	 * exclusive by design: pick one per section.
	 *
	 * @since Broadsheet 0.1.0
	 *
	 * @return void
	 */
	function broadsheet_block_styles() {
		$inks = array(
			'ink-red'   => __( 'Ink: red', 'broadsheet' ),
			'ink-blue'  => __( 'Ink: blue', 'broadsheet' ),
			'ink-black' => __( 'Ink: black', 'broadsheet' ),
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
				'label' => __( 'Bar', 'broadsheet' ),
			)
		);
		register_block_style(
			'core/separator',
			array(
				'name'  => 'hairline',
				'label' => __( 'Hairline', 'broadsheet' ),
			)
		);

		// A list that keeps the hairline rhythm without the bullet.
		register_block_style(
			'core/list',
			array(
				'name'         => 'ruled-list',
				'label'        => __( 'Ruled', 'broadsheet' ),
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
add_action( 'init', 'broadsheet_block_styles' );
