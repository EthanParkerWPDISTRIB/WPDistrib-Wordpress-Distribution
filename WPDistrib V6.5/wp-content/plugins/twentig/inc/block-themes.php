<?php
/**
 * Additional functionalities for block themes.
 *
 * @package twentig
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require TWENTIG_PATH . 'inc/custom-fonts.php';

/**
 * Enqueue styles for block themes: spacing, layout, fonts.
 */
function twentig_block_theme_enqueue_scripts() {

	if ( twentig_theme_supports_spacing() ) {
		$file = 'twentytwentyfour' === get_template() ? 'tw-spacing-default' : 'tw-spacing';
		wp_enqueue_style(
			'twentig-global-spacing',
			TWENTIG_ASSETS_URI . "/blocks/{$file}.css",
			array(),
			TWENTIG_VERSION
		);
	}

	$css = '';

	/* Fix columns core spacing */
	$cols_horizontal_gap = twentig_theme_supports_spacing() ? '32px' : 'var(--wp--style--block-gap)';
	$cols_spacing        = wp_get_global_styles(
		array( 'spacing', 'blockGap' ),
		array( 'block_name' => 'core/columns' )
	);

	if ( $cols_spacing ) {
		if ( is_array( $cols_spacing ) && isset( $cols_spacing['left'] ) ) {
			$cols_horizontal_gap = $cols_spacing['left'];
		} elseif ( is_string( $cols_spacing ) ) {
			$cols_horizontal_gap = $cols_spacing;
		}
	}

	$css .= "body .wp-block-columns.tw-cols-h-gap {column-gap:{$cols_horizontal_gap};}";

	if ( $css ) {		
		wp_add_inline_style( 'global-styles', twentig_minify_css( $css ) );
	}

	/* Enqueue fonts */
	$fonts = twentig_get_additional_fonts();

	if ( ! empty ( $fonts ) ) {
		
		/* Adds font css variables. */
		$font_css = twentig_get_custom_font_css_variables();
		wp_add_inline_style( 'global-styles', twentig_minify_css( $font_css ) );

		$enqueue_fonts = array();

		if ( count( $fonts ) < 3 ) {
			foreach ( $fonts as $font ) {
				$enqueue_fonts[] = $font['src'];
			}
		} else {

			global $template_html;
		
			$merged_json      = WP_Theme_JSON_Resolver::get_merged_data()->get_raw_data();
			$theme_fonts      = $merged_json['settings']['typography']['fontFamilies']['theme'];
			$global_styles    = wp_get_global_styles();
			$stylesheet       = json_encode( $global_styles );		
			$content_to_check = $stylesheet . $template_html;

			foreach ( $theme_fonts as $index => $font ) {
				if ( 'google' === ( $font['provider'] ?? null ) || empty($font['fontFace'] ) ) {
					unset( $theme_fonts[ $index ] );
				}
			}

			foreach ( $fonts as $font ) {
				$family_slug = sanitize_title( $font['slug'] );
				$family      = $font['fontFamily'];

				if ( in_array( $family_slug, array_column( $theme_fonts, 'slug' ), true ) ) {
					continue;
				}
			
				if ( str_contains( $content_to_check, json_encode( $family ) ) || 
					str_contains( $content_to_check, 'var(--wp--preset--font-family--' . $family_slug . ')' ) ||
					str_contains( $content_to_check, 'has-' . $family_slug . '-font-family' ) ||
					str_contains( $content_to_check, 'var:preset|font-family|' . $family_slug ) ) {
						$enqueue_fonts[] = $font['src'];
				}
			}
		}

		if ( ! empty( $enqueue_fonts ) ) {
			$typography = get_option( 'twentig_typography' );
			$local      = $typography['local'] ?? true;
			$remote_url = 'https://fonts.googleapis.com/css2?family=' . implode( '&family=', array_unique( array_values( $enqueue_fonts ) ) ) . '&display=swap';

			if ( $local ) {
				require TWENTIG_PATH . 'inc/wptt-webfont-loader.php';
				wp_register_style( 'twentig-webfonts', '' );
				wp_enqueue_style( 'twentig-webfonts' );
				wp_add_inline_style( 'twentig-webfonts', twentig_minify_css( wptt_get_webfont_styles( $remote_url ) ) );
			} else {
				wp_enqueue_style( // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
					'twentig-google-fonts',
					esc_url_raw( $remote_url ),
					array(),
					null
				);
			}
		}
	}
}
add_action( 'wp_enqueue_scripts', 'twentig_block_theme_enqueue_scripts', 11 );

/**
 * Enqueue styles inside the editor.
 */
function twentig_block_theme_editor_styles() {

	if ( twentig_theme_supports_spacing() ) {
		$file = 'twentytwentyfour' === get_template() ? 'tw-spacing-editor-default' : 'tw-spacing-editor';
		add_editor_style( TWENTIG_ASSETS_URI . "/blocks/{$file}.css" );
	}

	$fse_blocks = array(
		'columns',
		'latest-posts',
	);

	foreach ( $fse_blocks as $block_name ) {
		add_editor_style( TWENTIG_ASSETS_URI . "/blocks/{$block_name}/block.css" );
	}

	$css   = '';
	$fonts = twentig_get_additional_fonts();

	if ( ! empty ( $fonts ) ) {
		$enqueue_fonts = array();

		$css .= twentig_get_custom_font_css_variables();

		foreach ( $fonts as $font ) {
			$enqueue_fonts[] = $font['src'];
		}

		if ( ! empty( $enqueue_fonts ) ) {
			require TWENTIG_PATH . 'inc/wptt-webfont-loader.php';
			$remote_url = 'https://fonts.googleapis.com/css2?family=' . implode( '&family=', array_unique( array_values( $enqueue_fonts ) ) ) . '&display=swap';
			if ( count( $enqueue_fonts ) < 3 ) {
				$css .= wptt_get_webfont_styles( $remote_url );
			} else {
				$css .= twentig_get_cached_remote_font_styles( $remote_url );
			}
		}
	}

	if ( twentig_theme_supports_spacing() ) {
		$css .= 
			'html.block-editor-block-preview__content-iframe .is-root-container > .wp-block-group {
				padding-block: 80px;
				padding-left: var(--wp--style--root--padding-left);
				padding-right: var(--wp--style--root--padding-right);
			}

			html.block-editor-block-preview__content-iframe .is-root-container > .has-global-padding > .alignfull {
				margin-inline: 0;
			}

			.block-editor-iframe__body .is-root-container:not(.wp-site-blocks):not(.wp-block-post-content) .wp-block .wp-block-group.has-background {
				padding: 40px;
			}

			.block-editor-iframe__body .is-root-container .wp-block.wp-block-query .wp-block-post-template .wp-block-group.has-background {
				padding: 0;
			}

			.block-editor-block-preview__content-iframe .is-root-container :where(h1,h2,h3,p,.wp-block-buttons) + :where(.wp-block-columns,.wp-block-cover,.wp-block-group.has-background,.wp-block-media-text),
			.block-editor-block-preview__content-iframe .is-root-container .alignwide:where(figure,.wp-block-embed),
			.block-editor-block-preview__content-iframe .is-root-container .alignwide:where(figure,.wp-block-embed) + *,
			.block-editor-block-preview__content-iframe .is-root-container > :where(h1,h2,h3),
			.block-editor-block-preview__content-iframe .is-root-container > .wp-block-group > :where(h1,h2,h3) {
				margin-top: var(--wp--custom--spacing--tw-medium,--wp--custom--spacing--tw-margin-medium);
			}
			
			.block-editor-block-preview__content-iframe .is-root-container > .wp-block-query {
				padding: 60px;
			}
			';
	}

	/* Fix columns core spacing */
	$cols_horizontal_gap = twentig_theme_supports_spacing() ? '32px' : 'var(--wp--style--block-gap)';
	$cols_spacing        = wp_get_global_styles(
		array( 'spacing', 'blockGap' ),
		array( 'block_name' => 'core/columns' )
	);

	if ( $cols_spacing ) {
		if ( is_array( $cols_spacing ) && isset( $cols_spacing['left'] ) ) {
			$cols_horizontal_gap = $cols_spacing['left'];
		} elseif ( is_string( $cols_spacing ) ) {
			$cols_horizontal_gap = $cols_spacing;
		}
	}
	$css .= "body.editor-styles-wrapper .wp-block-columns.tw-cols-h-gap{column-gap:{$cols_horizontal_gap};}";

	/* Back compatibility for navigation buttons */
	$buttons_colors = wp_get_global_styles( array( 'elements', 'button', 'color' ) );

	$buttons_colors_css = '';
	if ( isset( $buttons_colors['background'] ) ) {
		$buttons_colors_css .= 'background-color: ' . esc_attr( $buttons_colors['background'] ) . ';';
	}

	if ( isset( $buttons_colors['text'] ) ) {
		$buttons_colors_css .= 'color: ' . esc_attr( $buttons_colors['text'] ) . ';';
	}
	
	if ( $buttons_colors_css ) {
		$css .= ".wp-block-navigation .wp-block-navigation-link.is-style-tw-button-fill a { $buttons_colors_css }";
	}

	wp_add_inline_style( 'wp-block-library', twentig_minify_css( $css ) );
}
add_action( 'admin_init', 'twentig_block_theme_editor_styles' );

/**
 * Hooks into the data provided by the theme to add new font options.
 */
function twentig_filter_theme_json_theme( $theme_json ) {

	$current_data = $theme_json->get_data();

	if ( ! isset( $current_data['version'] ) || $current_data['version'] !== 2 ) {
		return $theme_json;
	}

	$default_font_families = $current_data['settings']['typography']['fontFamilies']['theme'] ?? array();
	$default_font_families = twentig_merge_fonts_to_theme_fonts( $default_font_families );

	$new_data = array(
		'version'  => 2,
		'settings' => array(
			'typography' => array(
				'fontFamilies' => array(
					'theme' => $default_font_families,
				),
			),
		),
	);

	return $theme_json->update_with( $new_data );
}
add_filter( 'wp_theme_json_data_theme', 'twentig_filter_theme_json_theme' );

/**
 * Adds support for Twentig features.
 */
function twentig_block_theme_support() {

	if ( ! current_theme_supports( 'twentig-theme' ) ) {
		$theme = get_template();

		add_theme_support( 'tw-spacing' );
	
		if ( strpos( $theme, 'twentytwenty' ) !== 0 && 'unset' === get_option( 'twentig_curated_fonts', 'unset' ) ) {
			$has_curated = twentig_find_curated_fonts() ? 'enabled' : 'disabled';
			update_option( 'twentig_curated_fonts', $has_curated );
		}

		if ( in_array( $theme, ['twentytwentythree', 'twentytwentytwo' ], true ) || ( 'enabled' === get_option( 'twentig_curated_fonts', 'unset' ) && 'twentytwentyfour' !== $theme ) ) {
			add_filter( 'twentig_show_curated_fonts', '__return_true' );
		}
	}
}
add_action( 'after_setup_theme', 'twentig_block_theme_support', 11 );
