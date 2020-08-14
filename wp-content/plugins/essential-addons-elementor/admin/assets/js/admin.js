/**
 * Eael Admin Script
 *
 * @since  v1.0.0
 */

;( function( $ ) {
	'use strict';
	/**
	 * Eael Tabs
	 */
	$( '.eael-tabs li a' ).on( 'click', function(e) {
		e.preventDefault();
		$( '.eael-tabs li a' ).removeClass( 'active' );
		$(this).addClass( 'active' );
		var tab = $(this).attr( 'href' );
		$( '.eael-settings-tab' ).removeClass( 'active' );
		$( '.eael-settings-tabs' ).find( tab ).addClass( 'active' );
	});

	/**
	 * Save Button Reacting on Any Changes
	 */
	var headerSaveBtn = $( '.eael-header-bar .eael-btn' );
	var footerSaveBtn = $( '.eael-save-btn-wrap .eael-btn' );
	$('.eael-checkbox input[type="checkbox"]').on( 'click', function() {
		headerSaveBtn.addClass( 'save-now' );
		footerSaveBtn.addClass( 'save-now' );
		headerSaveBtn.removeAttr('disabled').css('cursor', 'pointer');
		footerSaveBtn.removeAttr('disabled').css('cursor', 'pointer');
	} );

	/**
	 * Google Map API
	 */
	var $saveButton = $( '.js-eael-settings-save' );
	$( '#eael-popup-api-modal' ).on('click', function(e) {
		e.preventDefault();
		if( !$saveButton.hasClass('save-now') ) $saveButton.addClass('save-now');
		swal({
			title: "Google Map API Key",
			html: '<input type="text" id="google-map-api" class="swal2-input" name="google-map-api" placeholder="Google Map API" value="'+eaelAdmin.eael_google_api+'" />',
  			closeOnClickOutside: false,
  			closeOnEsc: false,
  			showCloseButton: true
		})
		.then(function(result) {
			if( !result.dismiss ) {
				var eaelGoogleMapApi = $('#google-map-api').val();
				$('#google-map-api-hidden').val(eaelGoogleMapApi);
				eael_save_settings_with_ajax(js_eael_pro_settings, headerSaveBtn, footerSaveBtn);
			}
		});
	});

	/**
	 * Mailchimp API
	 */
	$( '#eael-popup-mailchimp-api-modal' ).on('click', function(e) {
		e.preventDefault();
		if( !$saveButton.hasClass('save-now') ) $saveButton.addClass('save-now');
		swal({
			title: "Mailchimp API Key",
			html: '<input type="text" id="mailchimp-api" class="swal2-input" name="mailchimp-api" placeholder="Mailchimp API" value="'+eaelAdmin.eael_mailchimp_api+'" />',
  			closeOnClickOutside: false,
  			closeOnEsc: false,
  			showCloseButton: true
		})
		.then(function(result) {
			if( !result.dismiss ) {
				var eaelGoogleMapApi = $('#mailchimp-api').val();
				$('#mailchimp-api-hidden').val(eaelGoogleMapApi);
				eael_save_settings_with_ajax(js_eael_pro_settings, headerSaveBtn, footerSaveBtn);
			}
		});
	});

	/**
	 * Saving Data With Ajax Request
	 */	
	$( '.js-eael-settings-save' ).on( 'click', function(e) {
		e.preventDefault();
		if( $(this).hasClass('save-now') ) {
			eael_save_settings_with_ajax(js_eael_pro_settings, headerSaveBtn, footerSaveBtn, $(this));
		}else {
			$(this).attr('disabled', 'true').css('cursor', 'not-allowed');
		}
	} );
	$('#essential-addons-elementor-license-key').on('keypress', function(e) {
		if(e.which == 13) {
			$('.eael-license-activation-btn').click();
			return false;
		}
	});
	

	/**
	 * Ajax Save
	 */
	function eael_save_settings_with_ajax(js_eael_pro_settings, headerSaveBtn, footerSaveBtn, _this) {
		$.ajax( {
			url: js_eael_pro_settings.ajaxurl,
			type: 'post',
			data: {
				action: 'save_settings_with_ajax',
				fields: $( 'form#eael-settings' ).serialize(),
			},
			beforeSend: function() {
				_this.html('<svg id="eael-spinner" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48"><circle cx="24" cy="4" r="4" fill="#fff"/><circle cx="12.19" cy="7.86" r="3.7" fill="#fffbf2"/><circle cx="5.02" cy="17.68" r="3.4" fill="#fef7e4"/><circle cx="5.02" cy="30.32" r="3.1" fill="#fef3d7"/><circle cx="12.19" cy="40.14" r="2.8" fill="#feefc9"/><circle cx="24" cy="44" r="2.5" fill="#feebbc"/><circle cx="35.81" cy="40.14" r="2.2" fill="#fde7af"/><circle cx="42.98" cy="30.32" r="1.9" fill="#fde3a1"/><circle cx="42.98" cy="17.68" r="1.6" fill="#fddf94"/><circle cx="35.81" cy="7.86" r="1.3" fill="#fcdb86"/></svg><span>Saving Data..</span>');
			},
			success: function( response ) {
				
				setTimeout(function() {
					_this.html('Save Settings');
					swal({
						title: 'Settings Saved!',
						test: 'Click OK to continue',
						type: 'success',
					});
					headerSaveBtn.removeClass( 'save-now' );
					footerSaveBtn.removeClass( 'save-now' );
				}, 2000);
				
			},
			error: function() {
				swal({
					title: 'Opps..',
					test: 'Something went wrong!',
					type: 'error',
				});
			}
		} );
	}
} )( jQuery );
