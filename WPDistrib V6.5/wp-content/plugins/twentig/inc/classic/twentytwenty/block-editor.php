<?php
/**
 * Block editor
 *
 * @package twentig
 */

/**
 * Enqueue custom CSS generated by the Customizer settings inside the block editor.
 */
function twentig_twentytwenty_editor_styles() {

	add_editor_style( twentig_twentytwenty_fonts_url() );
	add_editor_style( TWENTIG_ASSETS_URI . '/css/twentytwenty/editor.css' );

	$css                    = '';
	$body_color             = sanitize_hex_color( twentytwenty_get_color_for_area( 'content', 'text' ) );
	$body_color_default     = '#000000';
	$body_font              = get_theme_mod( 'twentig_body_font' );
	$body_font_size         = get_theme_mod( 'twentig_body_font_size', twentig_get_default_body_font_size() );
	$heading_font           = get_theme_mod( 'twentig_heading_font' );
	$heading_font_weight    = get_theme_mod( 'twentig_heading_font_weight', '700' );
	$secondary_font         = get_theme_mod( 'twentig_secondary_font', 'heading' );
	$body_line_height       = get_theme_mod( 'twentig_body_line_height' );
	$h1_font_size           = get_theme_mod( 'twentig_h1_font_size' );
	$heading_letter_spacing = get_theme_mod( 'twentig_heading_letter_spacing' );
	$body_font_stack        = twentig_get_font_stack( 'body' );
	$heading_font_stack     = twentig_get_font_stack( 'heading' );
	$secondary_font_stack   = 'body' === $secondary_font ? $body_font_stack : $heading_font_stack;
	$content_width          = get_theme_mod( 'twentig_text_width' );

	// Text color.
	if ( $body_color && $body_color !== $body_color_default ) {
		$css .= '.editor-styles-wrapper.editor-styles-wrapper { color:' . $body_color . ';}';
	}

	// Layout.
	if ( 'medium' === $content_width ) {
		$css .= '.wp-block.wp-block,
		.editor-styles-wrapper .wp-block-cover.wp-block-cover h2,
		.wp-block .wp-block[data-type="core/group"]:not([data-align="full"]):not([data-align="wide"]):not([data-align="left"]):not([data-align="right"]),
		.wp-block .wp-block[data-type="core/cover"]:not([data-align="full"]):not([data-align="wide"]):not([data-align="left"]):not([data-align="right"]),
		.editor-styles-wrapper .wp-block[data-align="wide"] > .wp-block-image figcaption,
		.editor-styles-wrapper .wp-block[data-align="full"] > .wp-block-image figcaption,
		.editor-styles-wrapper hr.wp-block-separator.wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
			max-width: 700px; 
		}';
	} elseif ( 'wide' === $content_width ) {
		$css .= '.wp-block.wp-block,
		.editor-styles-wrapper .wp-block-cover.wp-block-cover h2,
		.wp-block .wp-block[data-type="core/group"]:not([data-align="full"]):not([data-align="wide"]):not([data-align="left"]):not([data-align="right"]),
		.wp-block .wp-block[data-type="core/cover"]:not([data-align="full"]):not([data-align="wide"]):not([data-align="left"]):not([data-align="right"]),
		.editor-styles-wrapper .wp-block[data-align="wide"] > .wp-block-image figcaption,
		.editor-styles-wrapper .wp-block[data-align="full"] > .wp-block-image figcaption,
		.editor-styles-wrapper hr.wp-block-separator.wp-block-separator:not(.is-style-wide):not(.is-style-dots) { 
			max-width: 800px; 
		}';
	}

	// Typography.
	if ( $body_font ) {
		$css .= '.editor-styles-wrapper.editor-styles-wrapper > *,
			.editor-styles-wrapper.editor-styles-wrapper p,
			.editor-styles-wrapper.editor-styles-wrapper ol,
			.editor-styles-wrapper.editor-styles-wrapper ul {
				font-family:' . $body_font_stack . ';
		}';
	}

	if ( 'small' === $body_font_size ) {
		$css .= '.editor-styles-wrapper > *, .editor-styles-wrapper .wp-block-latest-posts__post-excerpt { font-size: 17px; }';
	} elseif ( 'medium' === $body_font_size ) {
		$css .= '.editor-styles-wrapper > * { font-size: 19px; }';
	}

	if ( 'medium' === $body_line_height ) {
		$css .= '.editor-styles-wrapper.editor-styles-wrapper, .editor-styles-wrapper p, .editor-styles-wrapper p.wp-block-paragraph { line-height: 1.6;}';
	} elseif ( 'loose' === $body_line_height ) {
		$css .= '.editor-styles-wrapper.editor-styles-wrapper, .editor-styles-wrapper p, .editor-styles-wrapper p.wp-block-paragraph { line-height: 1.8;}';
	}

	$css .= '
		.editor-post-title__block .editor-post-title__input,
		.editor-styles-wrapper.editor-styles-wrapper :is(h1,h2,h3,h4,h5,h6),
		.editor-styles-wrapper.editor-styles-wrapper .wp-block :is(h1,h2,h3,h4,h5,h6) {';

	if ( $heading_font ) {
		$css .= 'font-family:' . $heading_font_stack . ';';
	}

	if ( $heading_font_weight ) {
		$css .= 'font-weight:' . $heading_font_weight . ';';
	}

	if ( 'normal' === $heading_letter_spacing ) {
		$css .= 'letter-spacing: normal;';
	} else {
		$css .= 'letter-spacing: -0.015em;';
	}

	$css .= ';} ';

	$css .= '.editor-styles-wrapper h6, .editor-styles-wrapper .wp-block h6 { letter-spacing: 0.03125em; }';

	$accent = sanitize_hex_color( twentytwenty_get_color_for_area( 'content', 'accent' ) );
	$css   .= '.editor-styles-wrapper a { color: ' . $accent . '}';

	$css .= '
		.editor-styles-wrapper .wp-block-button .wp-block-button__link,
		.editor-styles-wrapper .wp-block-file .wp-block-file__button,
		.editor-styles-wrapper .wp-block-paragraph.has-drop-cap:not(:focus):first-letter,
		.editor-styles-wrapper .wp-block-pullquote, 
		.editor-styles-wrapper .wp-block-quote.is-style-large,
		.editor-styles-wrapper .wp-block-quote.is-style-tw-large-icon,
		.editor-styles-wrapper .wp-block-quote .wp-block-quote__citation,
		.editor-styles-wrapper .wp-block-pullquote .wp-block-pullquote__citation,				
		.editor-styles-wrapper figcaption { font-family: ' . $secondary_font_stack . '; }';

	if ( $h1_font_size ) {
		$css .= '@media (min-width: 1220px) {
			.editor-styles-wrapper div[data-type="core/pullquote"][data-align="wide"] blockquote p, 
			.editor-styles-wrapper div[data-type="core/pullquote"][data-align="full"] blockquote p {
				font-size: 48px;
			}
		}';

		if ( 'small' === $h1_font_size ) {
			$css .= '@media (min-width: 700px) {
				.editor-post-title__block .editor-post-title__input, 
				.editor-styles-wrapper h1,
				.editor-styles-wrapper .wp-block h1, 
				.editor-styles-wrapper .wp-block.has-h-1-font-size {
					font-size: 56px;
				}
			}';
		} elseif ( 'medium' === $h1_font_size ) {
			$css .= '@media (min-width: 1220px) {
				.editor-post-title__block .editor-post-title__input, 
				.editor-styles-wrapper h1, 
				.editor-styles-wrapper .wp-block h1, 
				.editor-styles-wrapper .wp-block.has-h-1-font-size {
					font-size: 64px;
				}
			}';
		} elseif ( 'large' === $h1_font_size ) {
			$css .= '@media (min-width: 1220px) {
				.editor-post-title__block .editor-post-title__input,
				.editor-styles-wrapper h1,
				.editor-styles-wrapper .wp-block h1,
				.editor-styles-wrapper .wp-block.has-h-1-font-size {
					font-size: 72px;
				}
			}';
		}
	}

	// Layout blocks adjustments.
	if ( '#ffffff' === strtolower( twentytwenty_get_color_for_area( 'content', 'text' ) ) ) {
		$css .= ':root .has-background-background-color, :root .has-subtle-background-background-color{ color: #fff; }';
		$css .= '.editor-styles-wrapper .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-text-color) { color: #000; }';
	}

	// Elements styling.
	if ( ! get_theme_mod( 'twentig_button_uppercase', true ) ) {
		$css .= '.editor-styles-wrapper .wp-block-button .wp-block-button__link,
		.editor-styles-wrapper .wp-block-file .wp-block-file__button { text-transform: none; }';
	}

	$button_shape = get_theme_mod( 'twentig_button_shape', 'square' );
	if ( 'rounded' === $button_shape ) {
		$css .= '.editor-styles-wrapper .wp-block-button__link { border-radius: 6px; }';
	} elseif ( 'pill' === $button_shape ) {
		$css .= '.editor-styles-wrapper .wp-block-button__link { border-radius: 50px; padding: 1.1em 1.8em; }';
	}

	if ( 'minimal' === get_theme_mod( 'twentig_separator_style' ) ) {
		$css .= '.editor-styles-wrapper hr:not(.is-style-dots ) { 
			background: currentcolor !important;
		}

		.editor-styles-wrapper hr:not(.has-background):not(.is-style-dots) {
			color: currentcolor;
			opacity: 0.15;
		}

		.editor-styles-wrapper hr:not(.is-style-dots)::before,
		.editor-styles-wrapper hr:not(.is-style-dots)::after {
			background-color: transparent;
		}';
	}
	
	wp_add_inline_style( 'wp-block-library', $css );
}
add_action( 'admin_init', 'twentig_twentytwenty_editor_styles' );

/**
 * Set up theme defaults and register support for various features.
 */
function twentig_twentytwenty_theme_support() {

	// Set editor font sizes based on body font-size.
	$body_font_size = get_theme_mod( 'twentig_body_font_size', twentig_get_default_body_font_size() );

	$font_sizes = current( (array) get_theme_support( 'editor-font-sizes' ) );

	// Add medium font size option in the editor dropdown.
	$medium = array(
		'name' => esc_html_x( 'Medium', 'Name of the medium font size in the block editor', 'twentig' ),
		'size' => 23,
		'slug' => 'medium',
	);
	array_splice( $font_sizes, 2, 0, array( $medium ) );

	if ( 'small' === $body_font_size || 'medium' === $body_font_size ) {
		$size_s      = 14;
		$size_normal = 17;
		$size_m      = 19;
		$size_l      = 21;
		$size_xl     = 25;

		if ( 'medium' === $body_font_size ) {
			$size_s      = 16;
			$size_normal = 19;
			$size_m      = 21;
			$size_l      = 24;
			$size_xl     = 28;
		}

		foreach ( $font_sizes as $index => $settings ) {
			if ( 'small' === $settings['slug'] ) {
				$font_sizes[ $index ]['size'] = $size_s;
			} elseif ( 'normal' === $settings['slug'] ) {
				$font_sizes[ $index ]['size'] = $size_normal;
			} elseif ( 'medium' === $settings['slug'] ) {
				$font_sizes[ $index ]['size'] = $size_m;
			} elseif ( 'large' === $settings['slug'] ) {
				$font_sizes[ $index ]['size'] = $size_l;
			} elseif ( 'larger' === $settings['slug'] ) {
				$font_sizes[ $index ]['size'] = $size_xl;
			}
		}
	}

	$font_sizes = array_merge( $font_sizes, twentig_twentytwenty_get_heading_font_sizes() );

	add_theme_support( 'editor-font-sizes', $font_sizes );

	// Update subtle color.
	$color_palette     = current( (array) get_theme_support( 'editor-color-palette' ) );
	$subtle_background = get_theme_mod( 'twentig_subtle_background_color' );

	if ( $subtle_background ) {
		foreach ( $color_palette as $index => $settings ) {
			if ( 'subtle-background' === $settings['slug'] ) {
				$color_palette[ $index ]['color'] = $subtle_background;
			}
		}
	}

	add_theme_support( 'editor-color-palette', $color_palette );

	// Set content-width based on text width.
	$text_width = get_theme_mod( 'twentig_text_width' );
	if ( $text_width ) {
		global $content_width;
		if ( 'medium' === $text_width ) {
			$content_width = 700;
		} elseif ( 'wide' === $text_width ) {
			$content_width = 800;
		}
	}

	// Add support for custom line height controls.
	add_theme_support( 'custom-line-height' );

	// Add support for custom spacing.
	add_theme_support( 'custom-spacing' );

	// Add support for border.
	add_theme_support( 'border' );
}
add_action( 'after_setup_theme', 'twentig_twentytwenty_theme_support', 12 );

/**
 * Retrieves heading font sizes.
 */
function twentig_twentytwenty_get_heading_font_sizes() {
	$h1_font_size = get_theme_mod( 'twentig_h1_font_size' );
	$h1_size_px   = 84;

	if ( 'small' === $h1_font_size ) {
		$h1_size_px = 56;
	} elseif ( 'medium' === $h1_font_size ) {
		$h1_size_px = 64;
	} elseif ( 'large' === $h1_font_size ) {
		$h1_size_px = 72;
	}

	$sizes = array(
		array(
			'name' => 'H6',
			'size' => 18.01,
			'slug' => 'h6',
		),
		array(
			'name' => 'H5',
			'size' => 24.01,
			'slug' => 'h5',
		),
		array(
			'name' => 'H4',
			'size' => 32.01,
			'slug' => 'h4',
		),
		array(
			'name' => 'H3',
			'size' => 40.01,
			'slug' => 'h3',
		),
		array(
			'name' => 'H2',
			'size' => 48.01,
			'slug' => 'h2',
		),
		array(
			'name' => 'H1',
			'size' => $h1_size_px,
			'slug' => 'h1',
		),
	);

	return $sizes;
}

/**
 * Filters Twentig CSS library classes.
 *
 * @param array $classes Array holding additional classes.
 */
function twentig_twentytwenty_filter_block_classes( $classes ) {
	$classes['core/paragraph']['tw-text-wide'] = __( 'Make the block wide width.', 'twentig' );
	$classes['core/list']['tw-text-wide'] = __( 'Make the block wide width.', 'twentig' );
	return $classes;
}
add_filter( 'twentig_block_classes', 'twentig_twentytwenty_filter_block_classes' );

/**
 * Registers block styles.
 */
function twentig_twentytwenty_register_block_styles() {
	
	register_block_style(
		'core/quote',
		array(
			'name'  => 'tw-large-icon',
			'label' => esc_html__( 'Large icon', 'twentig' ),
		)
	);

	register_block_style(
		'core/quote',
		array(
			'name'  => 'tw-minimal',
			'label' => esc_html_x( 'Minimal', 'block style', 'twentig' ),
		)
	);

	register_block_style(
		'core/pullquote',
		array(
			'name'  => 'tw-minimal',
			'label' => esc_html_x( 'Minimal', 'block style', 'twentig' ),
		)
	);

	register_block_style(
		'core/separator',
		array(
			'name'  => 'tw-short',
			'label' => esc_html_x( 'Short line', 'block style', 'twentig' ),
		)
	);

	unregister_block_style( 'core/pullquote', 'tw-icon' );
	unregister_block_style( 'core/separator', 'tw-asterisks' );
}
add_action( 'init', 'twentig_twentytwenty_register_block_styles', 30 );

/**
 * Hooks into the data provided by the theme to modify blocks settings.
 */
function twentig_twentytwenty_filter_theme_json_theme( $theme_json ) {

	$new_data = array(
		'version'  => 2,
		'settings' => array(
			'spacing' => array(
				'blockGap' => false
			),
			'blocks' => array(
				'core/post-template' => array(
					'spacing' => array(
						'blockGap' => true
					),
				)	
			)
		),
	);

	return $theme_json->update_with( $new_data );
}
add_filter( 'wp_theme_json_data_theme', 'twentig_twentytwenty_filter_theme_json_theme' );