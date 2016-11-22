<?php
/**
 * Additional Information tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/additional-information.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Specificatii tehnice', 'woocommerce' ) );

?>

<?php
// Get product attributes
$attributes = $product->get_attributes();

if ( $attributes ) {
    if ( $heading ):
	echo '<h3>'.$heading.'</h3>';
    endif;   
}
?>
        
<?php $product->list_attributes(); ?>

        <div style="clear: both;"></div>    
    
    <div class="suport-tabs">
    <i class="fa fa-cogs" aria-hidden="true"></i> Tehnic: 0743 55 00 00 
</div>    

<div class="suport-tabs">
    <i class="fa fa-user" aria-hidden="true"></i> Vanzari: 0749 06 57 82 
</div>

<div class="suport-tabs-email">
    <i class="fa fa-envelope" aria-hidden="true"></i> 
</div>

