;(function($) {
	// 'use strict';
	window.eaelLoadMorePostList = function( settings ) {

		var offSET = settings.offset,
			next_btn = settings.next_btn,
			prev_btn = settings.prev_btn,
			appender = settings.appender;
			
		delete settings.next_btn;
		delete settings.prev_btn;
		delete settings.appender;
		delete settings.offset;
		var newOffset = settings.posts_per_page + offSET;
		var prevOffset = 0 + offSET;

		if( settings.posts_per_page >= settings.total_posts || settings.posts_per_page <= -1 ) {
			$( next_btn ).prop('disabled', true);
			$( prev_btn ).prop('disabled', true);
		}

		if( settings.post_type == 'any' ) {
			delete settings.category;
			delete settings.post_tag;
			delete settings.product_cat;
			delete settings.product_tag;
		}

		// On Next Click Request
		$( next_btn ).on('click', function(e) {
			e.preventDefault();

			var dataOBJ = $.extend( {
				action: 'load_more',
				offset: newOffset,
				post_style: 'list',
			},  settings );

			$.ajax({
				url: eaelPostList.ajax_url,
				type: 'post',
				data: dataOBJ,
				success: function(response) {
					var response = JSON.parse( response );
					prevOffset = prevOffset + settings.posts_per_page;
					/**
					 * Enabling Prev Button for Click!
					 */
					$( prev_btn ).prop('disabled', false);

					/**
					 * Setting offset for pagination
					 */
					newOffset = newOffset + settings.posts_per_page;

					if( newOffset >= settings.total_posts ) {
						/**
						 * Disable Next Button to Click
						 */
						$( next_btn ).prop('disabled', true);
					}
					$( appender ).html('');
					$( appender ).append( $( response.content ) );
				},
				error: function(err) {
					console.log(err);
				}
			});
		});

		// On Prev Click Request
		$( prev_btn ).prop('disabled', true);
		$( prev_btn ).on('click', function(e) {
			e.preventDefault();
			prevOffset = prevOffset - settings.posts_per_page;
			var dataOBJ = $.extend( {
				action: 'load_more',
				offset: prevOffset,
				post_style: 'list',
			},  settings );

			$.ajax({
				url: eaelPostList.ajax_url,
				type: 'post',
				data: dataOBJ,
				success: function(response) {
					var response = JSON.parse( response );
					/**
					 * Enabling Next Button For Click
					 */
					$( next_btn ).prop('disabled', false);
					newOffset = newOffset - settings.posts_per_page;
					/**
					 * Disable Prev Button to Click!
					 */
					if( prevOffset <= offSET ) {
						$( prev_btn ).prop('disabled', true);
					}
					$( appender ).html('');
					$( appender ).append( $( response.content ) );
				},
				error: function(err) {
					console.log(err);
				}
			});
		});

		appender.parent().find('.post-categories').on('click', '.post-list-filter-item', function( e ){
			e.preventDefault();

			var allID = $(this).data('all-id');
			var taxonomy = $(this).data('taxonomy');

			var id = e.currentTarget.dataset.id;
			
			if( e.currentTarget.dataset.taxonomy != 'all' ) {
				var tax_query = {
					"taxonomy" : taxonomy,
					"fields" : "term_id",
					"terms" : [ id ]
				}	
				settings.tax_query = [ tax_query ];
			} else {
				settings.tax_query = [];
				Object.keys(allID).forEach(function(key, i) {
				    var tax_query = {
						"taxonomy" : key,
						"fields" : "term_id",
						"terms" : allID[key]
					}
					settings.tax_query[ i ] = tax_query;
				});
			}

			var dataOBJ = $.extend( {
				action: 'load_more',
				offset: 0,
				post_style: 'list',
			},  settings );

			$.ajax({
				url: eaelPostList.ajax_url,
				type: 'post',
				data: dataOBJ,
				success: function(response) {
					var response = JSON.parse( response );
					
					/**
					 * Resetting total_posts
					 */
					settings.total_posts = response.count;
					/**
					 * Resetting offset
					 */
					newOffset = settings.posts_per_page;
					prevOffset =  0;
					/**
					 * Disable Prev Button to Click!
					 */
					$( prev_btn ).prop('disabled', true);
					if( response.count <= settings.posts_per_page ) {
						$( next_btn ).prop('disabled', true);
					} else {
						$( next_btn ).prop('disabled', false);
					}
					$( appender ).html('');
					$( appender ).append(  $( response.content ) );
				},
				error: function(err) {
					console.log(err);
				}
			});
		});
	}
})(jQuery);