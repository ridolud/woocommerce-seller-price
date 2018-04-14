<?php
/**
 * Function Save Product
 */

// Save Variation Settings
add_action( 'woocommerce_save_product_variation', 'WCSP_save_variation_settings_fields', 10, 2 );
function WCSP_save_variation_settings_fields( $post_id ) 
{
	// Input Seller
	$text_field = $_POST['_seller_id'][ $post_id ];
	if( ! empty( $text_field ) ) {
		update_post_meta( $post_id, '_seller_id', esc_attr( $text_field ) );
	}
}

// Save Product Setting
add_action( 'save_post', 'WCSP_save_product' );
function WCSP_save_product( $post_id ){
	
	if ( isset($_GET['post_type']) && $_GET['post_type'] = 'product' ){
		$product_sold_individually = isset($_POST['_sold_individually']) ? $_POST['_sold_individually'] : false;
		if( ! $product_sold_individually ) {
			// Update Product option inventory "sold individually" set true.
			update_post_meta( $post_id, '_sold_individually', 'yes' );
		}
	}
}
