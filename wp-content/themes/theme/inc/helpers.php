<?php

// outputs URL path to template dir on the site
function _tpl( $return = false ) {
	$result = esc_url( get_template_directory_uri() );

	if ( $return ) {
		return $result;
	} else {
		echo $result;
	}
}

// Variable & intelligent excerpt length.
// src: http://wp-snippets.com/dynamic-custom-length-excpert/
function elustro_print_excerpt($length = 250) { // Max excerpt length. Length is set in characters
	global $post;
	$text = $post->post_excerpt;
	if ( '' == $text ) {
		$text = get_the_content( '' );
//		$text = apply_filters('the_content', $text);
		$text = str_replace( ']]>', ']]>', $text );
		$text = strip_shortcodes( $text ); // optional, recommended
		$text = strip_tags( $text ); // use ' $text = strip_tags($text,'&lt;p&gt;&lt;a&gt;'); ' if you want to keep some tags

		$pos = strpos( $post->post_content, '<!--more-->' );

		if ( false == $pos ) {
			$first_stop = mb_strpos( $text, '.', 0, "UTF-8" );
			if ( $first_stop >= $length ) {
				$length = $first_stop + 2;
			}
			$text    = mb_substr( $text, 0, $length, 'UTF-8' );
			$excerpt = reverse_strrchr( $text, '.', 1 );

			if ( $excerpt ) {
				$text = $excerpt;
			}
		}
	}

	echo apply_filters('the_excerpt', $text);
}

// Returns the portion of haystack which goes until the last occurrence of needle
function reverse_strrchr($haystack, $needle, $trail) {
	return mb_strrpos($haystack, $needle, 0, 'UTF-8') ?
		mb_substr($haystack, 0, mb_strrpos($haystack, $needle, 0, 'UTF-8') + $trail, 'UTF-8') : false;
}

// русские числительные
function _num($n, $w = array()) {
	$n = (int)substr($n,-3);
	return $n % 10 == 1 && $n % 100 != 11 ? $w[0] :
		($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20) ? $w[1] : $w[2]);
}
