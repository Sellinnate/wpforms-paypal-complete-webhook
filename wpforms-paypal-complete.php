<?php
/*
Plugin Name: Wpforms Paypal Complete WebHook
Plugin URI:  https://sellinnate.com
Description: Sync WP-Forms PayPal with your custom app once payment is completed
Version:     1.0
Author:      Filippo Calabrese
Author URI:  https://filippocalabrese.com
License:     GPL2 etc
License URI: https://filippocalabrese.com
*/
if ( is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
    require __DIR__ . '/vendor/autoload.php';
}
/**
 * Fires when PayPal payment status notifies the site.
 *
 * @link  https://wpforms.com/developers/wpforms_paypal_standard_process_complete/
 *
 * @param array  $fields     Sanitized entry field values/properties.
 * @param array  $form_data  Form data and settings.
 * @param int    $payment_id PayPal Payment ID.
 * @param array  $data       PayPal Web Accept Data.
 */


function selli_dev_process_paypal( $fields, $entry, $form_data ) {

    //EXAMPLE ON HOW TO FILTER WHEN THE WEBHOOK NEEDS TO BE RUN BASED ON FIELDS VALUE
	//if($fields[1]['value'] == 'undesired value'){
	//	return;
	//}
      
    $client = new GuzzleHttp\Client();
	$client->request('POST', 'https://yourdomain.ext/webhookpage', [
		'form_params' => [
            //REMOVE THIS COMMENT AND MAP YOUR FORM DATA TO MATCH YOUR NEEDS (EXAMPLE BELOW)
			//'first_name' => $fields[1]['value'],
			//'last_name' => $fields[2]['value'],
			//'email' => $fields[3]['value']
		]
	]);
	return;
}
add_action( 'wpforms_paypal_standard_process_complete', 'selli_dev_process_paypal', 10, 3 );



