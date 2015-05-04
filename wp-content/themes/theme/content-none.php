<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<article id="post-0" <?php post_class( 'b-post b-post__error b-post__not-found' ); ?>>
	<header class="b-post--header">
		<h2 class="b-title b-title__post b-title__post-single b-title__error">Ничего нет</h2>
	</header><!-- .b-post--header -->

	<div class="b-post--content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>Готовы добавить первую запись? <a href="<?= esc_url( admin_url( 'post-new.php' ) );?>">Начните тут</a>.</p>

		<?php elseif ( is_search() ) : ?>

			<p>К сожалению, по вашему запросу ничего не найдено. Попробуйте поискать по другим ключевым словам.</p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p>Мы не можем найти страницу, которая вам нужна. Может быть, поиск поможет?</p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- .b-post--content -->
</article><!-- #post-0 -->
