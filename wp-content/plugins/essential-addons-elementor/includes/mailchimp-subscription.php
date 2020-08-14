<?php

// Setup Connection With Mailchimp
function eael_mailchimp_lists() {
    $api_key = get_option('eael_save_mailchimp_api');
    $data = array(
        'apikey'    => $api_key,
    );

    // cURL Setup
    $eael_mailchimp = curl_init();
    curl_setopt($eael_mailchimp, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/');
    curl_setopt($eael_mailchimp, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
    curl_setopt($eael_mailchimp, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($eael_mailchimp, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($eael_mailchimp, CURLOPT_TIMEOUT, 10);
    curl_setopt($eael_mailchimp, CURLOPT_POST, true);
    curl_setopt($eael_mailchimp, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($eael_mailchimp, CURLOPT_POSTFIELDS, json_encode($data) );

    $lists = curl_exec($eael_mailchimp);
    $lists = json_decode($lists);
    if( !empty($lists) ) {
        $lists_name = array( '' => 'Select One' );
        for($i = 0; $i < count( $lists->lists ); $i++) {
            $lists_name[ $lists->lists[$i]->id ] = $lists->lists[$i]->name;
        }
        return $lists_name;
    }

}

// Setup Connection With Mailchimp
function eael_mailchimp_subscribe( $email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '','LNAME' => '')){
    $data = array(
        'apikey'        => $api_key,
        'email_address' => $email,
        'status'        => $status,
        'merge_fields'  => $merge_fields
    );

    // cURL Setup
    $eael_mailchimp = curl_init();
    curl_setopt($eael_mailchimp, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
    curl_setopt($eael_mailchimp, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
    curl_setopt($eael_mailchimp, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($eael_mailchimp, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($eael_mailchimp, CURLOPT_TIMEOUT, 10);
    curl_setopt($eael_mailchimp, CURLOPT_POST, true);
    curl_setopt($eael_mailchimp, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($eael_mailchimp, CURLOPT_POSTFIELDS, json_encode($data) );

    $result = curl_exec($eael_mailchimp);
    return $result;
}

// Subscribe a user
function mailchimp_subscribe_with_ajax() {
    $api_key = $_POST['apiKey'];
    $list_id = $_POST['listId'];
    if( isset( $_POST['fields'] ) ) {
        parse_str( $_POST['fields'], $settings );
    }else {
        return;
    }
    $result = json_decode( eael_mailchimp_subscribe($settings['eael_mailchimp_email'], 'subscribed', $list_id, $api_key, array(
        'FNAME' => $settings['eael_mailchimp_firstname'],'LNAME' => $settings['eael_mailchimp_lastname'],), $settings['eael_mailchimp_phone']) );

    if( $result->status == 400 ) {
        foreach( $result->errors as $error ) {
            echo '<p>Error: ' . $result->message . '</p>';
        }
    }elseif( $result->status == 'subscribed' ) {
        echo 'You have subscribed successfully!';
    }
    die();
}
add_action( 'wp_ajax_mailchimp_subscribe', 'mailchimp_subscribe_with_ajax' );