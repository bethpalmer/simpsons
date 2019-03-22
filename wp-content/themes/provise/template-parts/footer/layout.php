<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Provise
 */
?>

<div class="footer-area-wrap invert">
	<div class="container">
		<?php do_action( 'provise_render_widget_area', 'footer-area' ); ?>
	</div>
</div>

<div class="footer-container">
	<div <?php echo provise_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<?php
			provise_social_list( 'footer' );
			provise_footer_copyright();
			provise_footer_menu();
		?>
	</div><!-- .site-info -->
</div><!-- .container -->
