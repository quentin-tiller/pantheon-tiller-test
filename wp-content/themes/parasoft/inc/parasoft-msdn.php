<?php
// Helper functions
function getReqLocale() {
	$full   = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	$aloc   = explode( ',', $full );
	$parsed = 'en';

	if ( is_array( $aloc ) && count( $aloc ) > 0 ) {
		$parsed = $aloc[0];
	}

	if ( strpos( $parsed, '-' ) > 0 ) {
		$aloc = explode( '-', $parsed );
		if ( is_array( $aloc ) && count( $aloc ) > 0 ) {
			$parsed = $aloc[0];
		}
	}

	error_log( '[INFO][NEW] locale full/parsed: ' . $full . '/' . $parsed );

	return $parsed;
}

// Checks and updates in the db!
// returns 'true' (token correct, 'false' (token incorrect) or 'error' - REST endpoint problem
function check_msdn_code( $email, $token ) {
	$ch = @curl_init();

	@curl_setopt( $ch, CURLOPT_URL, WWW1_MSDN_URL . '?email=' . $email . '&code=' . urlencode( $token ) );
	@curl_setopt( $ch, CURLOPT_HTTPHEADER, [
		'Content-Type: text/plain',
		'Authorization: Bearer ' . WWW1_MSDN_TOKEN,
	] );
	@curl_setopt( $ch, CURLOPT_TIMEOUT, 30 );//timeout in secs
	@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	if ( defined( 'WP_DEBUG_PARA' ) && WP_DEBUG_PARA ) {
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	}

	$response    = @curl_exec( $ch );
	$status_code = @curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$curl_errors = curl_error( $ch );
	@curl_close( $ch );

	if ( $curl_errors ) {
		error_log( '[ERROR] when calling www1 for msdn code: ' . $curl_errors );
		error_log( '[ERROR] $status_code: ' . $status_code );

		return 'error';
	}

	$result = json_decode( $response );

	if ( json_last_error() === JSON_ERROR_NONE ) {
		// JSON is valid
		return $result->success;
	} else {
		return 'error';
	}
}

function free_email_checker( $email, $fname, $lname, $phone, $company ) {
	$the_form = 'https://forms.hubspot.com/uploads/form/v2/69806/10516048-ba6d-46ce-abfc-6aa8c0598888';

	$ip_addr         = $_SERVER['REMOTE_ADDR']; //IP address too.
	$hs_context      = [
		'ipAddress' => $ip_addr,
		'pageName'  => 'Wordpress PreChecker',
	];
	$hs_context_json = json_encode( $hs_context );

	//Need to populate these variable with values from the form.
	$str_post = "email=" . urlencode( $email ) . "&firstname=" . urlencode( $fname ) . "&lastname=" . urlencode( $lname ) . "&phone=" . urlencode( $phone ) . "&company=" . urlencode( $company ) . "&hs_context=" . urlencode( $hs_context_json );

	$ch = @curl_init();
	@curl_setopt( $ch, CURLOPT_POST, true );
	@curl_setopt( $ch, CURLOPT_POSTFIELDS, $str_post );
	@curl_setopt( $ch, CURLOPT_URL, $the_form );
	@curl_setopt( $ch, CURLOPT_TIMEOUT, 50 );//timeout in secs
	@curl_setopt( $ch, CURLOPT_HTTPHEADER, [
		'Content-Type: application/x-www-form-urlencoded',
	] );
	@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	if ( defined( 'WP_DEBUG_PARA' ) && WP_DEBUG_PARA ) {
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	}
	$response    = @curl_exec( $ch ); //Log the response from HubSpot as needed.
	$status_code = @curl_getinfo( $ch, CURLINFO_HTTP_CODE ); //Log the response status code
	$curl_errors = curl_error( $ch );

	@curl_close( $ch );
	if ( $status_code < 200 || $status_code > 299 ) {
		error_log( '[free_mail_checker] HS wh status/response: ' . $status_code . ' ' . $response );

		if ( $curl_errors ) {
			error_log( '[ERROR][free_mail_checker] when calling HubSpot: ' . $curl_errors );
//			return json_encode( [
//				'success' => 'false',
//				'error'=> $curl_errors,
//			] );
		}

		if ( $status_code == 400 && strpos( $response, 'Please try again with a different email address.' ) ) {
			return json_encode([
				'success' => 'false',
				'error'   => 'Please use a corporate email address.'
			]);
		} else {
			return json_encode( [
				'success' => 'false',
				'error'   => 'Something went wrong. Please try again later or contact visualstudiosupport@parasoft.com.',
			] );
		}
	}

	return json_encode( [
		'success' => 'true',
		'error' => ''
	] );
}

// is REST - no echo calls!
function check_msdn_code_json( $email, $token, $fname, $lname, $phone, $company ) {
	$ch      = @curl_init();
	$dry_run = 'dry_run@parasoft.com';

	@curl_setopt( $ch, CURLOPT_URL, WWW1_MSDN_URL . '?email=' . $email . '&code=' . urlencode( $token ) );
	@curl_setopt( $ch, CURLOPT_HTTPHEADER, [
		'Content-Type: text/plain',
		'Authorization: Bearer ' . WWW1_MSDN_TOKEN,
	] );
	@curl_setopt( $ch, CURLOPT_TIMEOUT, 90 );//timeout in secs
	@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	if ( defined( 'WP_DEBUG_PARA' ) && WP_DEBUG_PARA ) {
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	}

	$response    = @curl_exec( $ch );
	$status_code = @curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$curl_errors = curl_error( $ch );
	@curl_close( $ch );

	if ( $curl_errors ) {
		error_log( '[ERROR] when calling www1 for msdn code: ' . $curl_errors );
	}

	if ( defined( 'WP_DEBUG_PARA' ) && WP_DEBUG_PARA ) {
		error_log( "check_msdn_code_json prams:" . $email . $token );
		error_log( "check_msdn_code_json res/code:" . $response . $status_code );
	}

	if ( ( $status_code != 200 ) || ( $dry_run == $email ) ) {
		return $response;
	}

	//do next things
	$to_ret = hs_webhook_msdn_code( $email, $token, $fname, $lname, $phone, $company );

	if ( ! json_decode( $to_ret )->success ) {
		error_log( '[ERROR] Not uploaded to HS! msg: ' . json_decode( $to_ret )->error );
	}

	return $to_ret;
}

//is REST - no echo calls!
function get_download_links_stripe( $email ) {
	$ch = @curl_init();

	@curl_setopt( $ch, CURLOPT_URL, WWW1_DWN_URL . '?email=' . $email );
	@curl_setopt( $ch, CURLOPT_HTTPHEADER, [
		'Content-Type: text/plain',
		'Authorization: Bearer ' . WWW1_TOKEN
	] );
	@curl_setopt( $ch, CURLOPT_TIMEOUT, 90 );//timeout in secs
	@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	if ( defined( 'WP_DEBUG_PARA' ) && WP_DEBUG_PARA ) {
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	}

	$response    = @curl_exec( $ch );
	$status_code = @curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$curl_errors = curl_error( $ch );
	@curl_close( $ch );

	if ( $curl_errors ) {
		error_log( '[ERROR] when calling www1 for download code: ' . $curl_errors );
	}

	$the_links = explode( ",", $response );

	return $the_links;
}

// is REST - no echo calls!
function hs_webhook_msdn_code( $email, $token, $fname, $lname, $phone, $company ) {
	$dwn_links = get_download_links_stripe( $email );

	if ( ! is_array( $dwn_links ) ) {
		error_log( 'isarray? size?' . is_array( $dwn_links ) . ':' . sizeof( $dwn_links ) );
		$r = [
			'success' => 'false',
			'error'   => 'Download links not generated!'
		];
		error_log( '[ERROR][hs_webhook_msdn_code] call to www1 for downloads links!' );

		return json_encode( $r );
	}

	$hubspotutk      = $_COOKIE['hubspotutk']; //grab the cookie from the visitors browser.
	$ip_addr         = $_SERVER['REMOTE_ADDR']; //IP address too.
	$hs_context      = [
		'hutk'      => $hubspotutk,
		'ipAddress' => $ip_addr,
		'pageUrl'   => 'https://www.parasoft.com/virtualize/microsoft/activate/',
		'pageName'  => 'MSVS Code activate',
	];
	$hs_context_json = json_encode( $hs_context );
	$loc             = getReqLocale();

	//Need to populate these variable with values from the form.
	$str_post = "email=" . urlencode( $email )
	            . "&locale_detected=" . urlencode( $loc )
	            . "&msdn_token=" . urlencode( $token )
	            . "&firstname=" . urlencode( $fname )
	            . "&lastname=" . urlencode( $lname )
	            . "&phone=" . urlencode( $phone )
	            . "&company=" . urlencode( $company )
	            . "&msdn_soa_virt_free_trial_link_windows_=" . urlencode( $dwn_links[0] )
	            . "&msdn_soa_virt_free_trial_link_linux_=" . urlencode( $dwn_links[1] )
	            . "&msdn_soa_virt_free_trial_link_mac_=" . urlencode( $dwn_links[2] )
	            . "&hs_context=" . urlencode( $hs_context_json ); // Leave this one be

	$ch = @curl_init();
	@curl_setopt( $ch, CURLOPT_POST, true );
	@curl_setopt( $ch, CURLOPT_POSTFIELDS, $str_post );
	@curl_setopt( $ch, CURLOPT_URL, HS_FORMS_MSDN_URL );
	@curl_setopt( $ch, CURLOPT_TIMEOUT, 30 );//timeout in secs
	@curl_setopt( $ch, CURLOPT_HTTPHEADER, [
		'Content-Type: application/x-www-form-urlencoded',
	] );
	@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	if ( defined( 'WP_DEBUG_PARA' ) && WP_DEBUG_PARA ) {
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	}

	$response    = @curl_exec( $ch ); //Log the response from HubSpot as needed.
	$status_code = @curl_getinfo( $ch, CURLINFO_HTTP_CODE ); //Log the response status code
	$curl_errors = curl_error( $ch );

	@curl_close( $ch );
	error_log( 'MSVS code HS wh status/response: ' . $status_code . " " . $response );

	if ( $curl_errors ) {
		error_log( '[ERROR] when calling HubSpot: ' . $curl_errors );
//		return json_encode( [
//			'success' => 'false',
//			'error'=> $curl_errors,
//		] );
	}

	$str_post_lp = "email=" . urlencode( $email ) . "&locale_detected="
	               . $loc . "&msdn_token=" . urlencode( $token )
	               . "&firstname=" . urlencode( $fname )
	               . "&lastname=" . urlencode( $lname )
	               . "&phone=" . urlencode( $phone )
	               . "&company=" . urlencode( $company )
	               . "&msdn_soa_virt_free_trial_link_windows_=" . urlencode( $dwn_links[0] )
	               . "&msdn_soa_virt_free_trial_link_linux_=" . urlencode( $dwn_links[1] )
	               . "&msdn_soa_virt_free_trial_link_mac_=" . urlencode( $dwn_links[2] )
	               . '&hutk' . urlencode( $hubspotutk )
	               . '&ipAddress' . urlencode( $ip_addr )
	               . '&pageUrl' . urlencode( 'https://www.parasoft.com/virtualize/microsoft/activate/' )
	               . '&pageName' . urlencode( 'MSVS Code activate' );

	schedule_activity_to_lp( $str_post_lp );

	if ( ( $status_code == 204 ) || ( '204' === $status_code ) ) {
		error_log( json_encode( ['success' => 'true'] ) );

		return json_encode( [ 'success' => 'true' ] );
	}

	error_log( $response );

	return json_encode([
		'success' => 'false',
		'error' => $response
	]);
}

function schedule_activity_to_lp( $str_post ) {
	$ch = @curl_init();
	@curl_setopt( $ch, CURLOPT_POST, true );
	@curl_setopt( $ch, CURLOPT_POSTFIELDS, $str_post );
	@curl_setopt( $ch, CURLOPT_URL, WWW1_WP_ACTIVITY_URL );
	@curl_setopt( $ch, CURLOPT_TIMEOUT, 20 );//timeout in secs
	@curl_setopt( $ch, CURLOPT_HTTPHEADER, [
		'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
	] );
	@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	if ( defined( 'WP_DEBUG_PARA' ) && WP_DEBUG_PARA ) {
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	}
	$response    = @curl_exec( $ch ); //Log the response from HubSpot as needed.
	$status_code = @curl_getinfo( $ch, CURLINFO_HTTP_CODE ); //Log the response status code
	$curl_errors = curl_error( $ch );

	@curl_close( $ch );
	error_log( 'WP Activity (www1) REST API call status/response: ' . $status_code . " " . $response );
	if ( $curl_errors ) {
		error_log( '[ERROR] when calling WP Activity (www1) REST API: ' . $curl_errors );
//		return json_encode( [
//			'success' => 'false',
//			'error'=> $curl_errors,
//		] );
	}

	return $response;
}

// AJAX wrapper
add_action( 'wp_ajax_msdn_activate', 'parasoft_msdn_ajax_json' );
add_action( 'wp_ajax_nopriv_msdn_activate', 'parasoft_msdn_ajax_json' );

function parasoft_msdn_ajax_json() {
	switch ( $_REQUEST['fn'] ) {
		case 'free_email_checker':
			$jsonres = free_email_checker( $_REQUEST['email'], $_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['phone'], $_REQUEST['company'] );
			header( 'HTTP/1.1 200 OK' );
			header( 'Content-Type: application/json' );
			echo $jsonres;
			exit();
			break;
		case 'msdn_code_wrapper':
			$jsonres = check_msdn_code_json( $_REQUEST['email'], $_REQUEST['token'], $_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['phone'], $_REQUEST['company'] );
			header( 'HTTP/1.1 200 OK' );
			header( 'Content-Type: application/json' );
			echo $jsonres;
			exit();
			break;
		default:
			$jsonres = "{'success':false, 'error':'No function specified/no such function, check your jQuery.ajax() call'}";
			exit(); // Removes trailing '0'!!!
			break;
	}
}
