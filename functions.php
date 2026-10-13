<?php
/**
 * Broadsheet functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Broadsheet
 * @since Broadsheet 1.0.0
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
	 * @since Broadsheet 1.0.0
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
	 * @since Broadsheet 1.0.0
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
	 * @since Broadsheet 1.0.0
	 *
	 * @return void
	 */
	function broadsheet_pattern_categories() {
		register_block_pattern_category(
			'broadsheet_section',
			array(
				'label'       => __( 'Broadsheet sections', 'broadsheet' ),
				'description' => __( 'Bands, hairline grids and ledgers.', 'broadsheet' ),
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
	 * @since Broadsheet 1.0.0
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
	 * @since Broadsheet 1.0.0
	 *
	 * @return void
	 */
	function broadsheet_block_styles() {
		$inks = array(
			'ink-accent'   => __( 'Ink: accent', 'broadsheet' ),
			'ink-secondary'  => __( 'Ink: secondary', 'broadsheet' ),
			'ink-contrast' => __( 'Ink: contrast', 'broadsheet' ),
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

		// Accent versions of core's Fill and Outline button styles. All four swap
		// fill and outline on hover; see style.css, "Buttons".
		register_block_style(
			'core/button',
			array(
				'name'  => 'fill-accent',
				'label' => __( 'Fill: accent', 'broadsheet' ),
			)
		);
		register_block_style(
			'core/button',
			array(
				'name'  => 'outline-accent',
				'label' => __( 'Outline: accent', 'broadsheet' ),
			)
		);

		// Move one, the slip, as a style of the Site Title block, so the wordmark
		// stays a real block an editor can restyle, remove or swap for a Site
		// Logo. broadsheet_slip_site_title() builds the strips at render time.
		register_block_style(
			'core/site-title',
			array(
				'name'  => 'slip',
				'label' => __( 'Slip', 'broadsheet' ),
			)
		);

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
					padding-block: 0.75rem;
					border-block-end: 1px solid currentColor;
				}',
			)
		);
	}
endif;
add_action( 'init', 'broadsheet_block_styles' );

if ( ! function_exists( 'broadsheet_paginated_post_links' ) ) :
	/**
	 * Adds working next/previous links to a paginated single post.
	 *
	 * WordPress splits a post's content on the <!--nextpage--> Quick Tag into
	 * $numpages regardless of how it was authored, but the link markup itself
	 * is only auto-appended by `core/post-content`'s own render callback, and
	 * only when it detects the newer Page Break BLOCK
	 * (`has_block( 'core/nextpage' )`). Content written with the classic
	 * Quick Tag - the classic editor, or imported content such as the Theme
	 * Unit Test data - never satisfies that check, so a genuinely paginated
	 * post renders truncated to its first page with no way to reach the
	 * rest. Add the links unconditionally instead, styled like the theme's
	 * other plain link rows (post-navigation-link uses the same `.s-link` /
	 * `.u-lab` pair in templates/single.html).
	 *
	 * @since Broadsheet 1.0.0
	 *
	 * @param string $content The current page's post content.
	 * @return string
	 */
	function broadsheet_paginated_post_links( $content ) {
		if ( is_admin() || ! in_the_loop() || ! is_main_query() ) {
			return $content;
		}

		// core/post-content already appends these when the post was authored
		// with the newer Page Break block - don't double them up.
		if ( has_block( 'core/nextpage' ) ) {
			return $content;
		}

		$links = wp_link_pages(
			array(
				'echo'             => false,
				'next_or_number'   => 'next',
				// Wrapped so the stylesheet can set the bracket on the right side of each.
				'nextpagelink'     => '<span class="s-pager-next">' . esc_html__( 'Next page', 'broadsheet' ) . '</span>',
				'previouspagelink' => '<span class="s-pager-prev">' . esc_html__( 'Previous page', 'broadsheet' ) . '</span>',
				'before'           => '<div class="wp-block-group s-link" style="display:flex;justify-content:space-between;gap:1.25rem">',
				'link_before'      => '<span class="u-lab">',
				'link_after'       => '</span>',
				'after'            => '</div>',
			)
		);

		return $content . $links;
	}
endif;
add_filter( 'the_content', 'broadsheet_paginated_post_links' );


if ( ! function_exists( 'broadsheet_caption_width' ) ) :
	/**
	 * Drops the inline width from classic [caption] figures.
	 *
	 * img_caption_shortcode() writes style="width: Npx" from the image's width.
	 * An inline width beats every stylesheet, and the cap that would rein it in
	 * - the constrained layout's content size - is core CSS, so a caption wider
	 * than the column (or the phone) pushes the page sideways. Without it the
	 * figure sizes like a block image: capped by the column, then by its parent.
	 *
	 * @since Broadsheet 1.0.0
	 *
	 * @return int Zero, which tells core to omit the style attribute.
	 */
	function broadsheet_caption_width() {
		return 0;
	}
endif;
add_filter( 'img_caption_shortcode_width', 'broadsheet_caption_width' );

if ( ! function_exists( 'broadsheet_blog_home_title' ) ) :
	/**
	 * Gives the blog home a title: the posts page's own.
	 *
	 * The blog home (home.html) titles itself with a Query Title block, but
	 * core renders that block only on archives and search - the posts page is
	 * neither, so it would have no heading at all. When the block comes back
	 * empty there, fill in the title of the page set as the posts page in
	 * Settings > Reading, keeping the block's heading level, font size and
	 * classes so the template still decides how it looks.
	 *
	 * @since Broadsheet 1.1.0
	 *
	 * @param string $block_content The rendered block, empty off archives.
	 * @param array  $block         The parsed block.
	 * @return string
	 */
	function broadsheet_blog_home_title( $block_content, $block ) {
		if ( '' !== trim( $block_content ) || ! is_home() ) {
			return $block_content;
		}

		$posts_page = (int) get_option( 'page_for_posts' );
		if ( ! $posts_page ) {
			return $block_content;
		}

		$attrs   = $block['attrs'] ?? array();
		$level   = (int) ( $attrs['level'] ?? 1 );
		$tag     = 0 === $level ? 'p' : 'h' . min( 6, max( 1, $level ) );
		$classes = array( 'wp-block-query-title' );
		if ( ! empty( $attrs['fontSize'] ) ) {
			$classes[] = 'has-' . $attrs['fontSize'] . '-font-size';
		}
		if ( ! empty( $attrs['textAlign'] ) ) {
			$classes[] = 'has-text-align-' . $attrs['textAlign'];
		}
		if ( ! empty( $attrs['className'] ) ) {
			$classes[] = $attrs['className'];
		}

		return sprintf(
			'<%1$s class="%2$s">%3$s</%1$s>',
			$tag,
			esc_attr( implode( ' ', $classes ) ),
			esc_html( get_the_title( $posts_page ) )
		);
	}
endif;
add_filter( 'render_block_core/query-title', 'broadsheet_blog_home_title', 10, 2 );

if ( ! function_exists( 'broadsheet_slip_site_title' ) ) :
	/**
	 * Sets a Site Title block with the Slip style as the slip wordmark.
	 *
	 * The name is printed four times - a hidden sizer and three clipped strips,
	 * all hidden from assistive technology - plus once as screen reader text.
	 * The strips go inside the link when the title is linked, so the whole
	 * wordmark is the hit target. See style.css, "Move one: the slip".
	 *
	 * The editor renders Site Title in JavaScript and never sees this, so it
	 * shows the name in the display face without the strips.
	 *
	 * @since Broadsheet 1.1.0
	 *
	 * @param string $block_content The block's rendered HTML.
	 * @param array  $block         The parsed block.
	 * @return string
	 */
	function broadsheet_slip_site_title( $block_content, $block ) {
		$class = $block['attrs']['className'] ?? '';
		if ( ! preg_match( '/(^|\s)is-style-slip(\s|$)/', $class ) ) {
			return $block_content;
		}

		$name = esc_html( get_bloginfo( 'name' ) );
		if ( '' === $name ) {
			return $block_content;
		}

		$strips = sprintf(
			'<span class="screen-reader-text">%1$s</span>' .
			'<span class="s-slip__sizer" aria-hidden="true">%1$s</span>' .
			'<span class="s-slip__a" aria-hidden="true">%1$s</span>' .
			'<span class="s-slip__b" aria-hidden="true">%1$s</span>' .
			'<span class="s-slip__c" aria-hidden="true">%1$s</span>',
			$name
		);

		// The innermost element holding the name: the link, or the wrapper.
		$pattern = false !== strpos( $block_content, '<a ' )
			? '#(<a\b[^>]*>)(.*?)(</a>)#s'
			: '#(<(?:p|h[1-6])\b[^>]*>)(.*?)(</(?:p|h[1-6])>)#s';

		$slipped = preg_replace_callback(
			$pattern,
			static function ( $m ) use ( $strips ) {
				$open = new WP_HTML_Tag_Processor( $m[1] );
				$open->next_tag();
				$open->add_class( 's-slip' );
				return $open->get_updated_html() . $strips . $m[3];
			},
			$block_content,
			1
		);

		return null === $slipped ? $block_content : $slipped;
	}
endif;
add_filter( 'render_block_core/site-title', 'broadsheet_slip_site_title', 10, 2 );

if ( ! function_exists( 'broadsheet_comment_form_heading' ) ) :
	/**
	 * Sets the comment form's "Leave a Reply" as an h2, not core's h3.
	 *
	 * On a post with no comments there is no Comments title, so an h3 would
	 * follow the post's h1 directly and skip a level. As an h2 it is a sibling
	 * of the Comments title when there is one.
	 *
	 * @since Broadsheet 1.1.0
	 *
	 * @param array $defaults The comment form arguments.
	 * @return array
	 */
	function broadsheet_comment_form_heading( $defaults ) {
		$defaults['title_reply_before'] = '<h2 id="reply-title" class="comment-reply-title">';
		$defaults['title_reply_after']  = '</h2>';
		return $defaults;
	}
endif;
add_filter( 'comment_form_defaults', 'broadsheet_comment_form_heading' );

if ( ! function_exists( 'broadsheet_focusable_pre' ) ) :
	/**
	 * Puts every pre in post content and comments in the tab order.
	 *
	 * Code never wraps (see foundation.css), so a long line scrolls sideways,
	 * and a keyboard user can only scroll a region that takes focus.
	 *
	 * @since Broadsheet 1.1.0
	 *
	 * @param string $content The post content or comment text.
	 * @return string
	 */
	function broadsheet_focusable_pre( $content ) {
		if ( false === stripos( $content, '<pre' ) ) {
			return $content;
		}

		$tags = new WP_HTML_Tag_Processor( $content );
		while ( $tags->next_tag( 'pre' ) ) {
			if ( null === $tags->get_attribute( 'tabindex' ) ) {
				$tags->set_attribute( 'tabindex', '0' );
			}
		}
		return $tags->get_updated_html();
	}
endif;
add_filter( 'the_content', 'broadsheet_focusable_pre', 20 );
add_filter( 'comment_text', 'broadsheet_focusable_pre', 20 );
