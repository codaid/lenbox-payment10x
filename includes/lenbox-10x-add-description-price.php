<?php

add_filter('woocommerce_gateway_description', 'lenbox_10x_add_description_price', 20, 2);

function lenbox_10x_add_description_price($description, $payment_id)
{
	if ('lenbox10x' === $payment_id) {
		$cart_total	= WC()->cart->get_total('edit');
		$monthly	= number_format(($cart_total * 1.07) / 10, 2);
		$today		= date("d/m/Y");

		$message  = '
				<div>
					<div>
						<p>' . $today . '  --->  ' . $monthly  . ' €</p>
						<p>' . date('d/m/Y', strtotime('+1 month')) . '  --->  ' . $monthly  . ' €</p>
						<p>Jusqu\'au :</p>
						<p>' . date('d/m/Y', strtotime('+10 month')) . '  --->  ' . $monthly  . ' €</p>
						<p>Mensualités approximative</p>
					</div>
				</div>';

		$description .= '<div  class="message">' . $message . '<div>';
	}
	return $description;
}
