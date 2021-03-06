<?php
/**
 * New endpoint for mailing
 */
add_action('rest_api_init','slh_register_contact_mail');

function slh_register_contact_mail() {
	register_rest_route(
		'contact/v1',
		'email',
		array(
			'methods' => WP_REST_SERVER::CREATABLE, //POST
			'callback' => 'slh_contact_result'
		)
	);
}

/**
 * Callback email contact function
 */
function slh_contact_result($data) {
	$json_result = array(
		'error' => 0, 
		'msg' => 'OK'
	);

	$name = sanitize_text_field(trim($data['name']));
	$email = sanitize_text_field(trim($data['email']));
	$comment = sanitize_text_field(trim($data['comment']));

	$emailBody = '<br/><br/>'
			. '<br/>Nombre: '.$name
			. '<br/>Email: '.$email
			. '<br/>Comentario: '.$comment;

	require_once get_template_directory(). '/inc/email/class.phpmailer.php';

	$mail = new PHPMailer();

	$mail->FromName = 'Sitio Web Servillantas Hecdiz';
	$mail-> AddAddress('servillantasmx@gmail.com');
	// $mail-> AddAddress('zanddro@hotmail.com');
	$mail-> AddCC('codeincmx@gmail.com');

	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	$mail->Subject = 'Nuevo Contacto';
	$mail->Body = $emailBody;

	$mail->IsSMTP();
	$mail->SMTPAuth = true;

	// for gmail account
	// $mail->Host = 'smtp.gmail.com';
	// $mail->Port = 587;
	// $mail->SMTPSecure = 'tls';
	// $mail->Username = 'contacto@servillantasadomicilio.com';
	// $mail->Password = '0VVxKMmNAgJK';

	// For hsotenger email 
	$mail->Host = 'smtp.hostinger.mx';
	$mail->Port = 587;
	$mail->Username = 'contacto@servillantasadomicilio.com';
	$mail->From = 'contacto@servillantasadomicilio.com';
	$mail->Password = '0VVxKMmNAgJK';

	if( !$mail->Send() ){
		$json_result['error'] = 1;
		$json_result['msg'] = $mail->ErrorInfo;
	}

	return $json_result;
}