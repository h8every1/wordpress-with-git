<?php
/**
 * Template Name: Перейти на первую вложенную страницу
 * Created by h8every1 on 04.05.2015 21:55
 */
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$pagekids   = get_pages(
			array(
				"child_of"    => get_the_ID(),
				"sort_column" => "menu_order"
			)
		);
		$firstchild = $pagekids[0];
		wp_redirect( get_permalink( $firstchild->ID ) );
		exit;
	}
}