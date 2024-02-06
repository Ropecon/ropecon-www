<?php

/*
 *  When rendering image block, include image information
 *
 */

add_filter( 'render_block', 'ropecon_render_block_image_information', 10, 2 );

function ropecon_render_block_image_information( $content, $block ) {
	if( $block['blockName'] == 'core/media-text' ) {
		$media_id = $block['attrs']['mediaId'];
	}

	if( $block['blockName'] == 'core/cover' ) {
		if( isset( $block['attrs']['url'] ) ) {
			$media_id = $block['attrs']['id'];
		}
	}
	if( isset( $media_id ) && $media_id > 0 ) {
		$media = get_post( $media_id );
		if( !is_object( $media ) ) {
			return $content;
		}

		if( strlen( $media->post_content ) < 1 ) {
			return $content;
		}

		$markup = '<div class="image-information">' .
			'<span class="icon icon-Information" title="' . $media->post_content . '"></span>' .
			'<span class="info">' . $media->post_content . '</span>' .
			'</div>';

		$img_end = strpos( $content, '>', strpos( $content, '<img' ) ); // + strpos( $content, '<img' );

		return substr_replace( $content, $markup, $img_end + 1, 0 );
	}

	return $content;
}

/*
 *  Add image information as a column to the media list in admin
 *
 */

add_filter( 'manage_media_columns', function( $cols ) {
	foreach( $cols as $col_id => $col_label ) {
		$cols_new[$col_id] = $col_label;
		if( $col_id == 'title' ) {
			$cols_new['description'] = __( 'Description', 'ropecon' );
		}
	}
	return $cols_new;
} );

add_action( 'manage_media_custom_column', function( $column_name, $media_id ) {
	if( $column_name == 'description' ) {
		echo get_the_content( $media_id );
	}
}, 10, 2 );

?>
