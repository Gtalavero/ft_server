<?php

/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package bappi
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses bappi_header_style()
 */


if (!function_exists('bappi_header_style')) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see bappi_custom_header_setup().
	 */
	function bappi_header_style()
	{
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if (!display_header_text()) :
			?>.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
			?>.site-title a,
			.site-description {
				color: #<?php echo esc_attr($header_text_color); ?>;
			}

			<?php endif; ?>
		</style>
	<?php
	}
endif;


function bappi_customize_css()
{
	?>
	<style type="text/css">
		/* Normal background color and text */
		.main-navigation>div,
		a:visited,
		.main-navigation .sub-menu .menu-item,
		body,
		code,
		kbd,
		tt,
		var,
		pre,
		input,
		textarea,
		select,
		.site-title a,
		.site-description,
		a:visited {
			color: <?php echo esc_attr(get_theme_mod('bappi_text_color', '#b2df82')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('bappi_background_color', '#060c08')); ?>;
		}

		/* Inverted background color and text */
		.sub-menu a:hover,
		.main-navigation .menu-item a:hover,
		a:hover,
		.entry-title,
		.comment-form-comment label,
		.form-submit input[type="submit"],
		.widget_calendar caption,
		.comments-area .comments-title,
		.main-navigation.is-extended .sub-menu a:hover,
		.menu-toggle {
			color: <?php echo esc_attr(get_theme_mod('bappi_background_color', '#060c08')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('bappi_text_color', '#b2df82')); ?>;
		}

		/* Overwrite for links */
		a,
		.main-navigation .menu-item a,
		/*.main-navigation .sub-menu a:hover,*/
		button,
		input,
		input:focus {
			color: <?php echo esc_attr(get_theme_mod('bappi_text_color', '#b2df82')); ?>;
		}

		/* Borders */
		.site-header,
		.wp-block-pullquote,
		.wp-block-quote:not(.is-style-large),
		.wp-block-quote:not(.is-style-large),
		input:focus,
		input,
		button,
		textarea,
		select .site-footer,
		.site-footer {
			border-color: <?php echo esc_attr(get_theme_mod('bappi_text_color', '#b2df82')); ?>;
		}

		.entry .entry-title,
		.entry .entry-title a:hover {
			color: <?php echo esc_attr(get_theme_mod('bappi_background_color', '#060c08')); ?>;
		}
	</style>
<?php
}
add_action('wp_head', 'bappi_customize_css');
