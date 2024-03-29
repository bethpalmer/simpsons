<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Provise
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $utility = provise_utility()->utility; ?>

	<figure class="post-thumbnail">
		<?php $utility->media->get_image( array(
			'size'        => 'provise-thumb-l',
			'html'        => '<img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s">',
			'placeholder' => false,
			'echo'        => true,
		) );
		?>
	</figure><!-- .post-thumbnail -->

	<header class="entry-header">
		<?php $cats_visible = provise_is_meta_visible( 'single_post_categories', 'single' ) ? 'true' : 'false'; ?>

		<?php $utility->meta_data->get_terms( array(
			'visible' => $cats_visible,
			'type'    => 'category',
			'icon'    => '',
			'before'  => '<div class="post__cats">',
			'after'   => '</div>',
			'echo'    => true,
		) );
		?>

		<?php $utility->attributes->get_title( array(
			'class' => 'entry-title',
			'html'  => '<h1 %1$s>%4$s</h1>',
			'echo'  => true,
		) );
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php $author_visible = provise_is_meta_visible( 'single_post_author', 'single' ) ? 'true' : 'false'; ?>
				<?php $utility->meta_data->get_author( array(
					'visible' => $author_visible,
					'class'   => 'posted-by__author',
					'prefix'  => esc_html__( 'Posted by ', 'provise' ),
					'html'    => '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
					'echo'    => true,
				) );
				?>
				<span class="post__date">
					<?php $date_visible = provise_is_meta_visible( 'single_post_publish_date', 'single' ) ? 'true' : 'false';
					$utility->meta_data->get_date( array(
						'visible' => $date_visible,
						'class'   => 'post__date-link',
						'icon'    => '<i class="material-icons">event</i>',
						'echo'    => true,
					) );
					?>
				</span>
				<span class="post__comments">
					<?php $comment_visible = provise_is_meta_visible( 'single_post_comments', 'single' ) ? 'true' : 'false';
					$utility->meta_data->get_comment_count( array(
						'visible' => $comment_visible,
						'class'   => 'post__comments-link',
						'icon'    => '<i class="material-icons">mode_comment</i>',
						'echo'    => true,
					) );
					?>
				</span>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php provise_ads_post_before_content(); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links__title">' . esc_html__( 'Pages:', 'provise' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span class="page-links__item">',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'provise' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php $tags_visible = provise_is_meta_visible( 'single_post_tags', 'single' ) ? 'true' : 'false'; ?>

		<?php $utility->meta_data->get_terms( array(
			'visible'   => $tags_visible,
			'type'      => 'post_tag',
			'delimiter' => ', ',
			'icon'      => '<i class="material-icons">folder_open</i>',
			'before'    => '<div class="post__tags">',
			'after'     => '</div>',
			'echo'      => true,
		) );
		?>

		<?php provise_share_buttons( 'single' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->