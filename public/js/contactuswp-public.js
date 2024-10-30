jQuery(document).ready(function($) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

 	var total;
	function getRandom(){return Math.ceil(Math.random()* 10);}
	function createSum(){
		var randomNum1 = getRandom(),
			randomNum2 = getRandom();
		total =randomNum1 + randomNum2;
	  $( "#question" ).text( randomNum1 + " + " + randomNum2 + "=" );  
	  $("#ans").val('');
	  checkInput();
	}

	function checkInput(){
			var input = $("#ans").val(), 
	    	slideSpeed = 200,
	      	hasInput = !!input, 
	      	valid = hasInput && input == total;
	    $('#contactuswp-captcha-message').toggle(!hasInput);
	    $('#contactuswp-send-btn').prop('disabled', !valid);  
	    $('#contactuswp-captcha-success').toggle(valid);
	    $('#contactuswp-captcha-fail').toggle(hasInput && !valid);
	}

	// On "reset button" click, generate new random sum
	$('#contactuswp-reset-btn').click(createSum);
	$("#contactuswp-captcha-refresh").click(createSum);
	// On user input, check value
	$( "#ans" ).keyup(checkInput);


	 $('#contactuswpBtn').click(function(e){
	 		contactuswpToggle();
	 });

	 $('#contactuswp-close-btn').click(function(e){
	 		contactuswpToggle();
	 });


	 $(document).mouseup(function(e) {
    	var container = $('#contactuswpFormDiv');
		var button = $('#contactuswpBtn');

    	// if the target of the click isn't the container nor a descendant of the container
		if (!container.is(e.target) && container.has(e.target).length === 0 && !button.is(e.target) && button.has(e.target).length === 0) 
			{
				contactuswpHide();
			}
	});

	 function contactuswpHide(){
	 		$('#contactuswpFormDiv').fadeOut("slow");
		 	$('#contactuswp-msg-warning').hide();
		 	$('#contactuswp-msg-success').hide();
		 	$('#contactuswp-msg-normal').hide();
		 	$('#contactuswp-image-loader').fadeOut();
		 	$('#contactuswpForm').fadeIn();
		 	if ($('#contactuswpBtn i').hasClass('fa-times')) {
	 			$('#contactuswpBtn i').removeClass('fa-times').addClass('fa-envelope');
	 		}
	 }

	 function contactuswpToggle(){
	 		$('#contactuswpFormDiv').fadeToggle("slow");
		 	$('#contactuswp-msg-warning').hide();
		 	$('#contactuswp-msg-success').hide();
		 	$('#contactuswp-msg-normal').hide();
		 	$('#contactuswp-image-loader').fadeOut();
		 	$('#contactuswpForm').fadeIn();
		 	if ($('#contactuswpBtn i').hasClass('fa-envelope')) {
	 			$('#contactuswpBtn i').removeClass('fa-envelope').addClass('fa-times');
	 		} else if ($('#contactuswpBtn i').hasClass('fa-times')) {
	 			$('#contactuswpBtn i').removeClass('fa-times').addClass('fa-envelope');
	 		}
	 		createSum();
	 }

	  $('form#contactuswpForm').submit(function(e){
	  	 e.preventDefault();

      $('#contactuswp-image-loader').fadeIn();

      var contactName = $('#contactuswp-name').val().trim();
      var contactEmail = $('#contactuswp-email').val().trim();
      var contactSubject = $('#contactuswp-subject').val().trim();
      var contactPhone = ($('#contactuswp-phone').length) ? $('#contactuswp-phone').val().trim() : '0';
      var contactMessage = $('#contactuswp-message').val().trim();

      var info = {
      				_ajax_nonce: contactuswp_ajax_obj.nonce,
                	action: 'contactuswpmail',
      				contactuswpName:  contactName,
      		 		contactuswpEmail:  contactEmail,
               	contactuswpSubject: contactSubject, 
               	contactuswpPhone: contactPhone, 
               	contactuswpMessage: contactMessage,
               	}

      $.post(contactuswp_ajax_obj.ajax_url, info, function(msg){
      	$('#contactuswp-image-loader').fadeOut();

      }).done(function(msg){

            // Message was sent
            if (msg == 'OK') {
               $('#contactuswp-image-loader').fadeOut();
               $('#contactuswp-reset-btn').click();
               $('#contactuswp-msg-warning').hide();
               $('#contactuswpForm').fadeOut();
               $('#contactuswp-msg-success').fadeIn();
            }
            // There was an error
            else {
               $('#contactuswp-image-loader').fadeOut();
               $('#contactuswp-msg-warning').html(msg);
	           $('#contactuswp-msg-warning').fadeIn();
            }
      }).fail(function(err) {
      			$('#contactuswp-image-loader').fadeOut();
                $('#contactuswp-msg-warning').html("Unexpected error occurred. Try again. ");
                $('#contactuswp-msg-warning').fadeIn();
        });
   });


});
