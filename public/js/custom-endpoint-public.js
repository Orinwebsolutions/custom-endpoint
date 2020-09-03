(function( $ ) {
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

	 $('document').ready(function(){
		 userDetailAjax();
	 })

	 function userDetailAjax(){
		 $('body .container .link').on('click', function(e){
			 e.preventDefault();
			 var userId = $(this).data('user_id');
			 var userNonce = $(this).data('user_nonce');
			 $.ajax({
				type:"POST",
				dataType:"json",
				url: wpAjax.ajaxurl,
				data:{ action : "custom_user_details", userId : userId, userNonce : userNonce},
				beforeSend: function(){
					// $(placeholder).addClass('loading');
				},
				success: function(response) {
					$('.user_detail').css('display', 'block');
					// console.log(response);
					$('.user_detail #name').html(response[0].name);
					$('.user_detail #username').html(response[0].username);
					$('.user_detail #email').html(response[0].email);
					$('.user_detail #address').html(response[0].address.street+','+response[0].address.suite+','+response[0].address.city+','+response[0].address.zipcode);
					$('.user_detail #contactNo').html(response[0].phone);
					$('.user_detail #website').html(response[0].website);
					$('.user_detail #company').html(response[0].company.name);
					// if(response.type == "success") {
					// 	jQuery("#vote_counter").html(response.vote_count)
					// }
					// else {
					// 	alert("Your vote could not be added")
					// }
				},
				error: function (request, status, error) {
					// alert(request.responseText);
					alert(error);
				}
			 });
		 });
	 }

	//  data : {action: "my_user_vote", post_id : post_id, nonce: nonce},

})( jQuery );
