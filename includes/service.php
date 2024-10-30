<?php



// Handle the ajax request

add_action( 'wp_ajax_nopriv_contactuswpmail', 'contactuswp_mail_handler' );
add_action( 'wp_ajax_contactuswpmail', 'contactuswp_mail_handler' );

function contactuswp_mail_handler() {
   
    	$v=check_ajax_referer( 'ContactUsWP' );
    	if ($v) {
    
			$name =  sanitize_text_field(trim($_POST['contactuswpName'])); 
			$email = sanitize_email(trim($_POST['contactuswpEmail']));
			$subject = sanitize_text_field(trim($_POST['contactuswpSubject']));
			$phone = sanitize_text_field(trim($_POST['contactuswpPhone']));
			$contact_message = sanitize_textarea_field(trim($_POST['contactuswpMessage']));

	    	$response=email_me($name, $email, $subject, $phone, $contact_message);
			
		} else {
			$response = "Error!";
		}
	wp_send_json($response) ; 


}






