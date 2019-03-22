<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Provise
 */
$top_message_enebled = get_theme_mod( 'top_panel_text', provise_theme()->customizer->get_default( 'top_panel_text' ) );
// Don't show top panel if all elements are disabled.
if ( ! provise_is_top_panel_visible() ) {
	return;
}
$contact_block_visibility = get_theme_mod( 'header_contact_block_visibility', provise_theme()->customizer->get_default( 'header_contact_block_visibility' ) );

?>



<div class="top-panel">
	<div <?php echo provise_get_container_classes( array( 'top-panel__wrap' ), 'header' ); ?>>
		<?php provise_top_menu(); ?>
		<div class="top-panel__inner">
			<?php
				provise_contact_block( 'header' );
				provise_top_search( '<div class="top-panel__search">%s</div>' );
				provise_social_list( 'header' );
			?>
		</div>
	</div>
</div><!-- .top-panel -->
