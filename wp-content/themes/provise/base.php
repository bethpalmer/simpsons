<?php get_header( provise_template_base() ); ?>

	<?php do_action( 'provise_render_widget_area', 'full-width-header-area' ); ?>

	<?php provise_site_breadcrumbs(); ?>

	<div <?php echo provise_get_container_classes( array( 'site-content_wrap' ), 'content' ); ?>>

		<?php do_action( 'provise_render_widget_area', 'before-content-area' ); ?>

		<div class="row">

			<div id="primary" <?php provise_primary_content_class(); ?>>

				<?php do_action( 'provise_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include provise_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'provise_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->


			<?php get_sidebar( 'sidebar' ); // Loads the sidebar.php template.  ?>

		</div><!-- .row -->

		<?php do_action( 'provise_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .container -->

	<?php do_action( 'provise_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( provise_template_base() ); ?>
