<?php

add_action('woocommerce_checkout_update_order_meta', 'lenbox_checkout_update_order_meta', 10, 1);
add_action('woocommerce_admin_order_after_billing_address', 'lenbox_order_after_billing_address', 10, 1);

function lenbox_checkout_update_order_meta($order_id, $url_paiement)
{
	$order = wc_get_order($order_id);
	update_post_meta($order_id, 'URL de paiement', $url_paiement);
}

function lenbox_order_after_billing_address($order)
{
	echo '<p>' . __('Url de paiement :', 'codaid-lenbox-woo') . '</p>';
}
