(function($) {
	'use strict';
	window.eael_mailchimp_subscribe = function( formId, apiKey, listId, buttonText, successMsg, loadingText ) {
		$( '#'+formId ).on('submit', function(e) {
			e.preventDefault();
			var self = $(this);

			self.find('.eael-mailchimp-subscribe').addClass( 'button--loading' );
			self.find('.eael-mailchimp-subscribe span').html( loadingText );
			$.ajax({
				url: eaelMailchimp.ajax_url,
				type: 'POST',
				data: {
					action: 'mailchimp_subscribe',
					fields: self.serialize(),
					apiKey: apiKey,
					listId: listId
				},
				success: function(data) {
					self.find('.eael-mailchimp-fields-wrapper').after( '<div class="eael-mailchimp-message"><p>'+successMsg+'</p></div>' );
					self.find('input[type=text], input[type=email], textarea').val('');

					self.find('.eael-mailchimp-subscribe').removeClass( 'button--loading' );
					self.find('.eael-mailchimp-subscribe span').html( buttonText );
				}
			});
		})
	}

})(jQuery);

