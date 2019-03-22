<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Provise
 */
?>

<div class="footer-container">
	<div <?php echo provise_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<?php provise_social_list( 'footer' ); ?>
		<div class="footer-container__inner">
			<?php provise_footer_menu(); ?>
			<?php provise_footer_copyright();?>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->
