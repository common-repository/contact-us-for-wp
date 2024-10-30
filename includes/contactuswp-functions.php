<?php


  
 function contactuswp_button() {
  $form = get_option( 'contactuswp_form_options');
  $formdefault = $form['contactuswp_default_form_checkbox'] ?? '0';
  $formshortcode = $form['contactuswp_form_shortcode_txt'] ?? '';
  $options = get_option( 'contactuswp_icon_direction');
  $shapeopt = get_option( 'contactuswp_icon_shape');
  $labels = get_option( 'contactuswp_form_labels');
  $showphone = $labels['contactuswp_phone_field_checkbox'] ?? '0';
  $direction = $options['contactuswp_icon_direction_slct'] ?? 'left';
  $shape = $shapeopt['contactuswp_icon_shape_slct'] ?? 'round';
  $shapeBtn = $shape.'Btn';
  $shapeFBtn = $shape.'FBtn';
  $titletxt = $labels['contactuswp_title_txt'] ?? __('Contact Us', 'contactuswp');
  $nametxt = $labels['contactuswp_name_label_txt'] ?? __('Name', 'contactuswp');
  $emailtxt = $labels['contactuswp_email_label_txt'] ?? __('Email', 'contactuswp');
  $subjecttxt = $labels['contactuswp_subject_label_txt'] ?? __('Subject', 'contactuswp');
  $phonetxt = $labels['contactuswp_phone_label_txt'] ?? __('Phone', 'contactuswp');
  $messagetxt = $labels['contactuswp_message_label_txt'] ?? __('Message', 'contactuswp');
  $submissiontxt = $labels['contactuswp_message_submission_txt'] ?? __('Thank you! 👍 Your message was sent successfully! We will get back to you shortly.', 'contactuswp');
  if ($titletxt==''){ $titletxt= __('Contact Us', 'contactuswp'); }
  if ($nametxt==''){ $nametxt=__('Name', 'contactuswp');}
  if ($emailtxt==''){ $emailtxt=__('Email', 'contactuswp');}
  if ($subjecttxt==''){ $subjecttxt=__('Subject', 'contactuswp');}
  if ($messagetxt==''){ $messagetxt=__('Message', 'contactuswp');}
  if ($shape==''){ $shapeBtn='roundBtn'; $shapeFBtn='roundFBtn';}
  if ($submissiontxt==''){ $submissiontxt=__('Thank you! 👍 Your message was sent successfully! We will get back to you shortly.', 'contactuswp'); }

    	echo '<span class="'.$direction.' contactuswpBtnClass '.$shapeBtn.'" id="contactuswpBtn" title="'.$titletxt.'"><i class="fas fa-envelope"></i></span>
    	<div id="contactuswpFormDiv" class="'.$direction.'">';
      if (($formshortcode == '' )||($formdefault == '1')) {
      echo '<div id="contactuswp-form-close"><a id="contactuswp-close-btn"><i class="fas fa-times fa-lg"></i></a></div>
        	<form id="contactuswpForm" method="post" action="">
            	<h3>'.$titletxt.'</h3><br>
            	<div class="cuwp-class-formrow"><div class="cuwp-class-input"><input type="text" id="contactuswp-name" name="contactuswp-name" minlength="2" placeholder="'.$nametxt.'" title="'.$nametxt.'"></div></div>
            	<div class="cuwp-class-formrow"><div class="cuwp-class-input"><input type="text" id="contactuswp-email" name="contactuswp-email" minlength="5" maxlength="300" placeholder="'.$emailtxt.'" title="'.$emailtxt.'"></div></div>
            	<div class="cuwp-class-formrow"><div class="cuwp-class-input"><input type="text" id="contactuswp-subject" name="contactuswp-subject" minlength="0" placeholder="'.$subjecttxt.'" title="'.$subjecttxt.'"></div></div>';
      if ($showphone=='1'){
                echo '<div class="cuwp-class-formrow"><div class="cuwp-class-input"><input type="phone" id="contactuswp-phone" name="contactuswp-phone" minlength="0" maxlength="15" placeholder="'.$phonetxt.'" title="'.$phonetxt.'"></div></div>';
              }
       echo  '<div class="cuwp-class-formrow"><div class="cuwp-class-input"><textarea id="contactuswp-message" name="contactuswp-message" minlength="5" rows="4" placeholder="'.$messagetxt.'" title="'.$messagetxt.'"></textarea></div></div>
              <div id="contactuswp-captcha-div">
            	<span id="question"></span><input id="ans" type="text"> <a id="contactuswp-captcha-refresh"><i class="fas fa-redo-alt"></i></a>
              <div id="contactuswp-captcha-message">'.__('Please verify.', 'contactuswp').'</div>
              <div id="contactuswp-captcha-success">'.__('Validation complete :)', 'contactuswp').'</div>
              <div id="contactuswp-captcha-fail">'.__('Validation failed :(', 'contactuswp').'</div>
              </div>     
              <div class="cuwp-class-formrow"><button type="submit" class="contactuswp-form-button '.$shapeFBtn.'" id="contactuswp-send-btn" title="'. __('Send', 'contactuswp').'"><i class="fas fa-paper-plane fa-lg"></i></button> &nbsp; <button type="reset" class="contactuswp-form-button '.$shapeFBtn.'" id="contactuswp-reset-btn" title="'. __('Reset', 'contactuswp').'"><i class="fas fa-times fa-lg"></i></button></div>
        	</form>
            <div id="contactuswp-msg-success">'.$submissiontxt.'</div>
            <div id="contactuswp-msg-warning"></div>
            <div id="contactuswp-msg-normal"></div>
            <div id="contactuswp-image-loader"></div>
            ';
            } else {
              echo '<div id="contactuswp-form-close"><a id="contactuswp-close-btn"><i class="fas fa-times fa-lg"></i></a></div>';
              echo do_shortcode( $formshortcode  );
            }
        echo '</div>' ;
     
	}


	add_action( 'wp_footer', 'contactuswp_button' );

  function contactuswp_hook_css() {
      $cuwpcolor = get_option( 'contactuswp_icon_color' );
      $cuwpBtn = $cuwpcolor['contactuswp_icon_color_txt'] ??  '#2ACCE5';
      $cuwpTextBtn = $cuwpcolor['contactuswp_icon_text_color_txt'] ?? '#ffffff' ;
      $cuwpTextBtnHvr = $cuwpcolor['contactuswp_icon_text_hovercolor_txt'] ?? '#ffffff';
      $cuwpBtnHvr = $cuwpcolor['contactuswp_icon_hovercolor_txt'] ?? '#333333';
      if ($cuwpBtn=='') { $cuwpBtn = '#2ACCE5';} 
      if ($cuwpBtnHvr=='') {$cuwpBtnHvr = '#333333';}
      if ($cuwpTextBtn=='') { $cuwpTextBtn = '#ffffff';} 
      if ($cuwpTextBtnHvr=='') {$cuwpTextBtnHvr = '#ffffff';}
      ?>
        <style> 
        .contactuswpBtnClass i {
          border-color : <?php echo $cuwpBtn; ?> !important;
          color: <?php echo $cuwpTextBtn;?> !important;
          box-shadow: 0 0 10px 0 <?php echo $cuwpBtn; ?> inset, 0 0 10px 4px <?php echo $cuwpBtn; ?> !important;
          background-color: <?php echo $cuwpBtn; ?> !important;
      }
        .contactuswpBtnClass i:hover {
          box-shadow: 0 0 10px 0 <?php echo $cuwpBtnHvr; ?> inset, 0 0 10px 4px <?php echo $cuwpBtnHvr; ?> !important;
          background-color: <?php echo $cuwpBtnHvr; ?> !important;
          color: <?php echo $cuwpTextBtnHvr;?> !important;
        }
        .contactuswp-form-button{
          color: <?php echo $cuwpTextBtn;?> !important;
          background-color: <?php echo $cuwpBtn; ?> !important;

        }
        .contactuswp-form-button:hover{
          color: <?php echo $cuwpTextBtnHvr;?> !important;
          background-color: <?php echo $cuwpBtnHvr; ?> !important;
        }
        #contactuswp-captcha-refresh, #contactuswp-close-btn{
          color: <?php echo $cuwpBtn; ?> !important;
        }
      </style>
        <?php
    }

    add_action('wp_head', 'contactuswp_hook_css');

    function email_me($name, $email, $subject, $phone, $contact_message){
            
            $myemail = get_option('contactuswp_send_to_email');
            $autoreply = get_option('contactuswp_form_labels');
            $to = $myemail['contactuswp_send_to_email_txt'];
            $msg = __('Thank you! 👍 Your message was sent successfully! We will get back to you shortly.', 'contactuswp');
            $autoreplymsg = $autoreply['contactuswp_message_submission_txt']?? $msg;
            $activateautoreply = $autoreply['contactuswp_send_autoreply_checkbox'] ?? '0';

            if (''==$autoreplymsg) { 
              $autoreplymsg = $msg;  
            }
            
            $error=null;
                
               // Check Name
                if (strlen($name) < 2) {
                    $error['name'] = __("Please enter your name.", 'contactuswp');
                }
                // Check Email
                if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
                    $error['email'] = __("Please enter a valid email address.", 'contactuswp');
                }
                // Check Message
                if (strlen($contact_message) < 5) {
                    $error['message'] = __("Please enter your message. It should have at least 5 characters.", 'contactuswp');
                }
               // Subject
                if ($subject == '') { $subject = "Contact Form Submission"; }


               // Set Message
               $message = '<html><body>';
               $message .= "<div><b>".__('From:', 'contactuswp')."</b> " . $name . "</div><br />";
               $message .= "<div><b>".__('Email address:', 'contactuswp')."</b> " . $email . "</div><br />";
               
               if (($phone !='0') || ($phone!='')) {
                  $message .= "<div><b>".__('Phone:', 'contactuswp')."</b> <a href= tel:".$phone." >" . $phone . "</a></div><br />";
               }

               $message .= "<div><b>".__('Message:', 'contactuswp')."</b> </div><br />";
               $message .= "<p>". nl2br($contact_message)."</p>";
               $message .= '</body></html>';

               $reply = '<html><body>';
               $reply .= '<div>' . $name . ',</div><br />';
               $reply .= '<p>'.$autoreplymsg.'</p><br />';
               $reply .= '<p>'.get_bloginfo('name').'</p>';
               $reply .= '</body></html>';

               // Set From: header
                $from =  $name . " <" . $email . ">";
        

               // Email Headers
                $headers = array();
                $headers[] = "From: " . $from ;
                $headers[] = "Reply-To: ". $from;
                // $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-Type: text/html; charset=UTF-8";

                // Email Headers
                $replyheaders = array();
                $replyheaders[] = "From: ". get_bloginfo('name'). "<" . $to .">" ;
                $replyheaders[] = "Reply-To: ". $to;
                // $headers[] = "MIME-Version: 1.0";
                $replyheaders[] = "Content-Type: text/html; charset=UTF-8";


               

               if (!$error) {

                  //ini_set("sendmail_from", $siteOwnersEmail); // for windows server
                  $mail = wp_mail($to, $subject, $message, $headers);
                  if ('1'==$activateautoreply) {
                    $replymail = wp_mail($email, $subject, $reply, $replyheaders);
                  }

                 if ($mail) 
                    { 
                        $response = __("OK", 'contactuswp');  
                    } else 
                    { 
                        $response = __("Something went wrong. Please try again.", 'contactuswp'); 
                    }
                    
                } # end if - no validation error

                else {

                    
                
                    $response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
                    $response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
                    $response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
                    
                    //echo $response;

                } # end if - there was a validation error_log(message)
        
                return $response;
    }

