<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bappi
 */

?>
</div> <!-- row -->
</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="row">
		<div class="site-info">
			<a href="<?php echo esc_url(__('https://wordpress.org/', 'bappi')); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf(esc_html__('Proudly powered by %s', 'bappi'), 'gtalavero');
				?>
			</a>

		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>