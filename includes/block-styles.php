<?php

/*  Modify output for currency block style  */

add_filter( 'render_block', 'ropecon_render_block_paragraph_currency', 10, 2 );

function ropecon_render_block_paragraph_currency( $content, $block ) {
	if( $block['blockName'] != 'core/paragraph' ) {
		return $content;
	}

	if( !isset( $block['attrs']['className'] ) || !in_array( 'is-style-currency', explode( ' ', $block['attrs']['className'] ) ) ) {
		return $content;
	}

	$content = substr_replace( $content, '><span class="currency">&euro;</span>', strpos( $content, '>' ), 1 );
	return $content;
}


?>
