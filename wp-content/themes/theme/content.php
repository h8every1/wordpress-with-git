<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 */
$article_classes = array();
$article_classes[] = 'b-post';
if (is_singular()) {
	$article_classes[] = 'b-post__single';
} else {
	$article_classes[] = 'b-post__list';
}
if (is_search()) {
	$article_classes[] = 'b-post__search';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(implode(' ',$article_classes)); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="b-thumb b-thumb__in-post">
			<?php if ( is_singular() ) {
				$image_info = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
				$image_link = $image_info[0];
				$rel        = ' rel="prettyPhoto[' . get_the_ID() . ']"';
			} else {
				$image_link = get_the_permalink();
				$rel        = '';
			}
			?>
			<a class="b-thumb--link" href="<?= $image_link; ?>"<?= $rel; ?>>
				<?php the_post_thumbnail('post-thumbnail', array('class'=>'b-thumb--image')); ?>
			</a>
		</div><!-- .b-thumb -->
	<?php } ?>

	<header class="b-post--header">
		<?php
			if ( is_single() ) :
				the_title( '<h2 class="b-title b-title__post b-title__post-single">', '</h2>' );
			else :
				the_title( sprintf( '<h3 class="b-title b-title__post b-title__post-list"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			endif;
		?>
		<?php
		if (current_user_can('edit_posts')) {
		edit_post_link( 'Редактировать', '<span class="btn btn-primary">', '</span>' );
		}
		?>
	</header><!-- .b-post--header -->

	<div class="b-post--content">
		<?php
			the_content();
		?>
	</div><!-- .b-post--content -->

</article><!-- #post-<?php the_ID(); ?> -->