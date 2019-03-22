<?php
/**
 * Template part for minimal Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Provise
 */
?>

<div class="header-container__flex">

	<div class="site-branding">
		<?php provise_header_logo() ?>
		<?php provise_site_description(); ?>
	</div>
	<?php provise_main_menu(); ?>
</div>
