(function ($) {
	"use strict";

	var ToggleHandler = function ( $scope, $ ) {
		var toggle_elem             = $scope.find('.eael-toggle-container').eq(0);
		$(toggle_elem).each(function () {
			var $toggle_target      = $(this).data('toggle-target');
			var $toggle_switch      = $($toggle_target).find('.eael-toggle-switch');
			$($toggle_target).find('.eael-primary-toggle-label').addClass("active");
			$($toggle_switch).toggle(
				function() {
					var $parent_container = $(this).closest('.eael-toggle-container');
					$($parent_container).find('.eael-toggle-content-wrap').removeClass("primary");
					$($parent_container).children('.eael-toggle-content-wrap').addClass("secondary");
					$($parent_container).find('.eael-toggle-switch-container').addClass("eael-toggle-switch-on");
					$(this).parent().parent().find('.eael-primary-toggle-label').removeClass("active");
					$(this).parent().parent().find('.eael-secondary-toggle-label').addClass("active");
				},
				function() {
					var $parent_container = $(this).closest('.eael-toggle-container');
					$($parent_container).children('.eael-toggle-content-wrap').addClass("primary");
					$($parent_container).children('.eael-toggle-content-wrap').removeClass("secondary");
					$($parent_container).find('.eael-toggle-switch-container').removeClass("eael-toggle-switch-on");
					$(this).parent().parent().find('.eael-primary-toggle-label').addClass("active");
					$(this).parent().parent().find('.eael-secondary-toggle-label').removeClass("active");
				}
			);
		});
	};

	var CounterHandler = function ($scope, $) {

		var counter_elem                = $scope.find('.eael-counter').eq(0),
			$target                     = counter_elem.data('target');
		
		$(counter_elem).waypoint(function () {
			$($target).each(function () {
				var v                   = $(this).data("to"),
					speed               = $(this).data("speed"),
					od                  = new Odometer({
						el:             this,
						value:          0,
						duration:       speed
					});
				od.render();
				setInterval(function () {
					od.update(v);
				});
			});
		},
			{
				offset:             "80%",
				triggerOnce:        true
			});
	};

	var FlipCarousel = function( $scope, $ ) {
		var flipCarousel_elem = $scope.find('.eael-flip-carousel').eq(0);
		$(flipCarousel_elem).each(function() {
			var style = $(this).data('style'),
				start = $(this).data('start'),
				fadeIn = $(this).data('fadein'),
				loop = $(this).data('loop'),
				autoplay = $(this).data('autoplay'),
				pauseOnHover = $(this).data('pauseonhover'),
				spacing = $(this).data('spacing'),
				click = $(this).data('click'),
				scrollwheel = $(this).data('scrollwheel'),
				touch = $(this).data('touch'),
				buttons = $(this).data('buttons'),
				buttonPrev = $(this).data('buttonprev'),
				buttonNext = $(this).data('buttonnext');

			$(this).flipster({
				style: style,
				start: start,
				fadeIn: fadeIn,
				loop: loop,
				autoplay: autoplay,
				pauseOnHover: pauseOnHover,
				spacing: spacing,
				click: click,
				scrollwheel: scrollwheel,
				tocuh: touch,
				buttons: buttons,
				buttonPrev: '<i class="flip-custom-nav ' + buttonPrev + '"></i>',
				buttonNext: '<i class="flip-custom-nav ' + buttonNext + '"></i>',
			});
		});
	}

	var FilterGallery = function( $scope, $ ) {
		var filtergallery_elem = $scope.find('.eael-filter-gallery-wrapper').eq(0);

		$(filtergallery_elem).each(function() {
			var gridStyle = $(this).data('grid-style'),
				ref = $(this).find('.item').data('ref'),
				duration = $(this).data('duration'),
				effects = $(this).data('effects'),
				popup = $(this).data('popup'),
				galleryEnabled = $(this).data('gallery-enabled');
			var mixer = mixitup( $(this), {
				controls: {
					scope: 'local'
				},
				selectors: {
					target: '[data-ref~="'+ref+'"]'
				},
				animation: {
					enable: true,
					duration: ''+duration+'',
					effects: ''+effects+'',
					easing: 'cubic-bezier(0.245, 0.045, 0.955, 1)',
				}
			} );

			// Set Background Image
			if( gridStyle == 'eael-hoverer' || gridStyle == 'eael-tiles' ) {
				var postColumn = $(this).find( '.eael-filter-gallery-container .item' );
				postColumn.each( function() {
					let dataBg = $(this).attr( 'data-item-bg' );
					$(this).css( 'background-image', 'url( '+ dataBg +' )' );
				} );
			}
			// Magnific Popup
			if( true == popup ) {
				$(this).find('.eael-magnific-link').magnificPopup({
					type: 'image',
					gallery:{
						enabled: galleryEnabled
					},
					callbacks: {
						close: function() {
							$( '#elementor-lightbox' ).hide();
						}
					}
				});
			}
		});
	}

	var InstagramGallery = function( $scope, $ ) {

		var instagramGallery = $scope.find('.eael-instagram-feed').eq(0),
			caption          = (instagramGallery.find('.eael-insta-grid').data('caption') === 'show-caption') ? '<p class="insta-caption">{{caption}}</p>' : '',
			likes            = (instagramGallery.find('.eael-insta-grid').data('likes') === 'yes') ? '<p class="eael-insta-post-likes"> <i class="fa fa-heart-o" aria-hidden="true"></i> {{likes}}</p>' : '',
			comments         = (instagramGallery.find('.eael-insta-grid').data('comments') === 'yes') ? '<p class="eael-insta-post-comments"><i class="fa fa-comment-o" aria-hidden="true"></i> {{comments}}</p>' : '',
			link_target      = (instagramGallery.find('.eael-insta-grid').data('link-target') === 'yes') ? 'target="_blank"' : '',
			link             = (instagramGallery.find('.eael-insta-grid').data('link') === 'yes') ? '<a href=\"{{link}}\" ' +link_target+ '></a>' : '';

		$(instagramGallery).each(function() {
			var get = $(this).find('.eael-insta-grid').data('get'),
				tagName = $(this).find('.eael-insta-grid').data('tag-name'),
				userId = $(this).find('.eael-insta-grid').data('user-id'),
				clientId = $(this).find('.eael-insta-grid').data('client-id'),
				accessToken = $(this).find('.eael-insta-grid').data('access-token'),
				limit = $(this).find('.eael-insta-grid').data('limit'),
				resolution = $(this).find('.eael-insta-grid').data('resolution'),
				sortBy = $(this).find('.eael-insta-grid').data('sort-by'),
				target = $(this).find('.eael-insta-grid').data('target');

			var loadButton = $(this).find('.eael-load-more-button');
			var feed = new Instafeed({
				get: ''+get+'',
				tagName: ''+tagName+'',
				userId: userId,
				clientId: ''+clientId+'',
				accessToken: ''+accessToken+'',
				limit: ''+limit+'',
				resolution: ''+resolution+'',
				sortBy: ''+sortBy+'',
				target: ''+target+'',
				template: '<div class="eael-insta-feed eael-insta-box"><div class="eael-insta-feed-inner"><div class="eael-insta-feed-wrap"><div class="eael-insta-img-wrap"><img src="{{image}}" /></div><div class="eael-insta-info-wrap"><div class="eael-insta-info-wrap-inner"><div class="eael-insta-likes-comments">' + likes + comments + '</div>' + caption + '</div></div>' + link + '</div></div></div>',
				after: function() {
					var el = $(this);
					if (el.classList)
						el.classList.add('show');
					else
						el.className += ' ' + 'show';

					// disable button if no more results to load
					if (!this.hasNext()) {
						$(loadButton).parent().addClass( 'no-pagination' );
						loadButton.attr('disabled', 'disabled');
					}
				},
				success: function() {
					$(this).find('.eael-insta-grid').masonry();
					$(loadButton).removeClass( 'button--loading' );
					$(loadButton).find( 'span' ).html( 'Load More' );
				}
			});

			// bind the load more button
			loadButton.on('click', function() {
				feed.next();
				$(loadButton).addClass( 'button--loading' );
				$(loadButton).find( 'span' ).html( 'Loading...' );
			});

			feed.run();

			$(window).load(function() {
				$(this).find('.eael-insta-grid').masonry({
					itemSelector: '.eael-insta-feed',
					percentPosition: true,
					columnWidth: '.eael-insta-box'
				});
			});
		});
	}

	/* ------------------------------ */
	/* Advance accordion
	/* ------------------------------ */
	var AdvAccordionHandler = function($scope, $) {
    var $advanceAccordion = $scope.find(".eael-adv-accordion"),
      $accordionHeader = $scope.find(".eael-accordion-header"),
      $accordionType = $advanceAccordion.data("accordion-type"),
			$accordionSpeed = $advanceAccordion.data("toogle-speed");
			
			// Open default actived tab
			$accordionHeader.each(function(){
				if($(this).hasClass('active-default')){
					$(this).addClass('show active');
					$(this).next().slideDown($accordionSpeed)
				}
			})

		// Remove multiple click event for nested accordion
    $accordionHeader.unbind("click");

    $accordionHeader.click(function(e) {
			e.preventDefault();
			
			var $this = $(this);
			
			if($accordionType === 'accordion') {
				if ($this.hasClass("show")) {
					$this.removeClass("show active");
					$this.next().slideUp($accordionSpeed);
				} else {
					$this.parent().parent().find(".eael-accordion-header").removeClass("show active");
					$this.parent().parent().find(".eael-accordion-content").slideUp($accordionSpeed);
					$this.toggleClass("show active");
					$this.next().slideToggle($accordionSpeed);
				}
			} else {
				// For acccordion type 'toggle'
				if ($this.hasClass("show")) {
					$this.removeClass("show active");
					$this.next().slideUp($accordionSpeed);
				} else {
					$this.addClass("show active");
					$this.next().slideDown($accordionSpeed);
				}
			}
    });
	}; // End of advance accordion
	

	/* ------------------------------ */
	/* Advance google map
	/* ------------------------------ */
	var AdvGoogleMap = function($scope, $) {

		var $map        = $scope.find('.eael-google-map'),
			$thisMap    = $('#' + $map.attr('id')),
			$mapID      = $thisMap.data('id'),
			$mapType    = $thisMap.data('map_type'),
			$mapAddressType    = $thisMap.data('map_address_type'),
			$mapLat     = $thisMap.data('map_lat'),
			$mapLng     = $thisMap.data('map_lng'),
			$mapAddr    = $thisMap.data('map_addr'),
			$mapBasicMarkerTitle            = $thisMap.data('map_basic_marker_title'),
			$mapBasicMarkerContent          = $thisMap.data('map_basic_marker_content'),
			$mapBasicMarkerIconEnable       = $thisMap.data('map_basic_marker_icon_enable'),
			$mapBasicMarkerIcon             = $thisMap.data('map_basic_marker_icon'),
			$mapBasicMarkerIconWidth        = $thisMap.data('map_basic_marker_icon_width'),
			$mapBasicMarkerIconHeight       = $thisMap.data('map_basic_marker_icon_height'),
			$mapZoom                = $thisMap.data('map_zoom'),
			$mapMarkerContent       = $thisMap.data('map_marker_content'),
			$mapMarkers             = $thisMap.data('map_markers'),
			$mapStaticWidth     = $thisMap.data('map_static_width'),
			$mapStaticHeight    = $thisMap.data('map_static_height'),
			$mapStaticLat       = $thisMap.data('map_static_lat'),
			$mapStaticLng       = $thisMap.data('map_static_lng'),
			$mapPolylines       = $thisMap.data('map_polylines'),
			$mapStrokeColor     = $thisMap.data('map_stroke_color'),
			$mapStrokeOpacity       = $thisMap.data('map_stroke_opacity'),
			$mapStrokeWeight        = $thisMap.data('map_stroke_weight'),
			$mapStrokeFillColor     = $thisMap.data('map_stroke_fill_color'),
			$mapStrokeFillOpacity       = $thisMap.data('map_stroke_fill_opacity'),
			$mapOverlayContent          = $thisMap.data('map_overlay_content'),
			$mapRoutesOriginLat         = $thisMap.data('map_routes_origin_lat'),
			$mapRoutesOriginLng    = $thisMap.data('map_routes_origin_lng'),
			$mapRoutesDestLat    = $thisMap.data('map_routes_dest_lat'),
			$mapRoutesDestLng    = $thisMap.data('map_routes_dest_lng'),
			$mapRoutesTravelMode    = $thisMap.data('map_routes_travel_mode'),
			$mapPanoramaLat    = $thisMap.data('map_panorama_lat'),
			$mapPanoramaLng    = $thisMap.data('map_panorama_lng'),
			$mapTheme          = JSON.parse(decodeURIComponent(($thisMap.data('map_theme') + '').replace(/\+/g, '%20'))),
			$map_streeview_control  = $thisMap.data('map_streeview_control'),
			$map_type_control       = $thisMap.data('map_type_control'),
			$map_zoom_control       = $thisMap.data('map_zoom_control'),
			$map_fullscreen_control = $thisMap.data('map_fullscreen_control'),
			$map_scroll_zoom        = $thisMap.data('map_scroll_zoom');

		var eaelMapHeader = new GMaps({
			el: "#eael-google-map-" + $mapID,
			lat: $mapLat,
			lng: $mapLng,
			zoom: $mapZoom,
			streetViewControl: $map_streeview_control,
			mapTypeControl: $map_type_control,
			zoomControl: $map_zoom_control,
			fullscreenControl: $map_fullscreen_control,
			scrollwheel: $map_scroll_zoom
		});

		if($mapTheme != '') {
			eaelMapHeader.addStyle({
				styledMapName:"Styled Map",
				styles: JSON.parse($mapTheme),
				mapTypeId: "map_style"  
			});
			
			eaelMapHeader.setStyle("map_style");
		}

		if( 'basic' == $mapType ) {

			var infoWindowHolder = $mapBasicMarkerContent != '' ? { content: $mapBasicMarkerContent} : '';
				
			if($mapBasicMarkerIconEnable == 'yes') {
				var iconHolder = {
					url: $mapBasicMarkerIcon,
					scaledSize: new google.maps.Size($mapBasicMarkerIconWidth, $mapBasicMarkerIconHeight),
				}
			} else { var iconHolder = null; }

			if($mapAddressType == 'address') {
				GMaps.geocode({
					address: $mapAddr,
					callback: function(results, status) {
						if (status == 'OK') {
							var latlng = results[0].geometry.location;
							eaelMapHeader.setCenter(latlng.lat(), latlng.lng());
							eaelMapHeader.addMarker({
								lat: latlng.lat(),
								lng: latlng.lng(),
								title: $mapBasicMarkerTitle,
								infoWindow: infoWindowHolder,
								icon: iconHolder
							});
						}
					}
				});
			}else if($mapAddressType == 'coordinates') {
				eaelMapHeader.addMarker({
					lat: $mapLat,
					lng: $mapLng,
					title: $mapBasicMarkerTitle,
					infoWindow: infoWindowHolder,
					icon: iconHolder
				});
			}
		
		} // end of basic map script


		if('marker' == $mapType) {

			var $data = JSON.parse(decodeURIComponent(($mapMarkers + '').replace(/\+/g, '%20')));

			if($data.length > 0) {
				$data.forEach(function($marker) {
					
					if($marker.eael_google_map_marker_content != '') {
						var infoWindowHolder = {
							content: $marker.eael_google_map_marker_content
						};
					}else {
						var infoWindowHolder = '';
					}

					if($marker.eael_google_map_marker_icon_enable == 'yes') {
						var iconHolder =  {
							url: $marker.eael_google_map_marker_icon.url,
							scaledSize: new google.maps.Size($marker.eael_google_map_marker_icon_width, $marker.eael_google_map_marker_icon_height), // scaled size
						};
					}else {
						var iconHolder = '';
					}


					eaelMapHeader.addMarker({
						lat: parseFloat($marker.eael_google_map_marker_lat),
						lng: parseFloat($marker.eael_google_map_marker_lng),
						title: $marker.eael_google_map_marker_title,
						infoWindow: infoWindowHolder,
						icon: iconHolder
					});

				});
			}
		}// end of multiple markers map


		if('static' == $mapType) {

			var $data = JSON.parse(decodeURIComponent(($mapMarkers + '').replace(/\+/g, '%20'))),
				markersHolder = [];

			if($data.length > 0) {
				$data.forEach(function($marker) {
					markersHolder.push(
						{
							lat: parseFloat($marker.eael_google_map_marker_lat),
							lng: parseFloat($marker.eael_google_map_marker_lng),
							color: $marker.eael_google_map_marker_icon_color
						},
					);
				});
			}

			var eaelStaticMapUrl = GMaps.staticMapURL({
				size: [$mapStaticWidth, $mapStaticHeight],
				lat: $mapStaticLat,
				lng: $mapStaticLng,
				markers: markersHolder
			});

			$('<img />').attr('src', eaelStaticMapUrl).appendTo('#eael-google-map-' + $mapID);

		} // End of static map


		if('polyline' == $mapType) {

			var $polylines_data = JSON.parse(decodeURIComponent(($mapPolylines + '').replace(/\+/g, '%20'))),
				$data = JSON.parse(decodeURIComponent(($mapMarkers + '').replace(/\+/g, '%20'))),
				$eael_polylines = [];


			var eaelPolylineMap = new GMaps({
				el: '#eael-google-map-' + $mapID,
				lat: $mapLat,
				lng: $mapLng,
				zoom: $mapZoom,
				center: {
					lat: -12.07635776902266,
					lng: -77.02792530422971,
				}
			});

			$polylines_data.forEach(function($polyline) {
				$eael_polylines.push(
					[
						parseFloat($polyline.eael_google_map_polyline_lat),
						parseFloat($polyline.eael_google_map_polyline_lng)
					]
				)
			});
			
			var path = JSON.parse(JSON.stringify($eael_polylines));

			eaelPolylineMap.drawPolyline({
				path: path,
				strokeColor: $mapStrokeColor.toString(),
				strokeOpacity: $mapStrokeOpacity,
				strokeWeight: $mapStrokeWeight
			});

			$data.forEach(function($marker) {
				if($marker.eael_google_map_marker_content != '') {
					var infoWindowHolder = {
						content: $marker.eael_google_map_marker_content
					};
				}else {
					var infoWindowHolder = '';
				}

				if($marker.eael_google_map_marker_icon_enable == 'yes') {
					var iconHolder =  {
						url:$marker.eael_google_map_marker_icon.url,
						scaledSize: new google.maps.Size($marker.eael_google_map_marker_icon_width, $marker.eael_google_map_marker_icon_height), // scaled size
					};
				}else {
					var iconHolder = '';
				}

				eaelPolylineMap.addMarker({
					lat: $marker.eael_google_map_marker_lat,
					lng: $marker.eael_google_map_marker_lng,
					title: $marker.eael_google_map_marker_title,
					infoWindow: infoWindowHolder,
					icon: iconHolder
				});
			});

			if($mapTheme != '') {
				eaelPolylineMap.addStyle({
					styledMapName:"Styled Map",
					styles: JSON.parse($mapTheme),
					mapTypeId: "polyline_map_style"  
				});

				eaelPolylineMap.setStyle("polyline_map_style");
			}
			
		} // End of polyline map


		if('polygon' == $mapType) {

			var $polylines_data = JSON.parse(decodeURIComponent(($mapPolylines + '').replace(/\+/g, '%20'))),
				$eael_polylines = [];

			$polylines_data.forEach(function($polyline) {
				$eael_polylines.push(
					[
						parseFloat($polyline.eael_google_map_polyline_lat),
						parseFloat($polyline.eael_google_map_polyline_lng)
					]
				)
			});

			var path = JSON.parse(JSON.stringify($eael_polylines));
			eaelMapHeader.drawPolygon({
				paths: path,
				strokeColor: $mapStrokeColor.toString(),
				strokeOpacity: $mapStrokeOpacity,
				strokeWeight: $mapStrokeWeight,
				fillColor: $mapStrokeFillColor.toString(),
				fillOpacity: $mapStrokeFillOpacity
			});
		} // End of polygon map


		if('overlay' == $mapType) {

			if( $mapOverlayContent != '') {
				var contentHolder = '<div class="eael-gmap-overlay">'+$mapOverlayContent+'</div>';
			}else {
				var contentHolder = '';
			}

			eaelMapHeader.drawOverlay({
				lat: $mapLat,
				lng: $mapLng,
				content: contentHolder
			});
		} // End of overlay map


		if('routes' == $mapType) {
			eaelMapHeader.drawRoute({
				origin: [$mapRoutesOriginLat, $mapRoutesOriginLng],
				destination: [$mapRoutesDestLat, $mapRoutesDestLng],
				travelMode: $mapRoutesTravelMode.toString(),
				strokeColor: $mapStrokeColor.toString(),
				strokeOpacity: $mapStrokeOpacity,
				strokeWeight: $mapStrokeWeight,
			});

			var $data = JSON.parse(decodeURIComponent(($mapMarkers + '').replace(/\+/g, '%20')));

			if($data.length > 0) {
				$data.forEach(function($marker) {
				
					if($marker.eael_google_map_marker_content != '') {
						var infoWindowHolder = {
							content: $marker.eael_google_map_marker_content
						};
					}else {
						var infoWindowHolder = '';
					}

					if($marker.eael_google_map_marker_icon_enable == 'yes') {
						var iconHolder =  {
							url:$marker.eael_google_map_marker_icon.url,
							scaledSize: new google.maps.Size($marker.eael_google_map_marker_icon_width, $marker.eael_google_map_marker_icon_height), // scaled size
						};
					}else {
						var iconHolder = '';
					}

					eaelMapHeader.addMarker({
						lat: $marker.eael_google_map_marker_lat,
						lng: $marker.eael_google_map_marker_lng,
						title: $marker.eael_google_map_marker_title,
						infoWindow:infoWindowHolder,
						icon: iconHolder,
					});
				});
			}
		} // End of map routers


		if('panorama' == $mapType) {
			var eaelPanorama = GMaps.createPanorama({
				el: '#eael-google-map-'+$mapID,
				lat: $mapPanoramaLat,
				lng: $mapPanoramaLng,
			});
		} // end of map panorama

	} // Advance google map

	/* ------------------------------ */
	/* Advance Tab
	/* ------------------------------ */
	var AdvanceTabHandler = function ($scope, $) {

		jQuery(document).ready(function($) {
			var $currentTab = $scope.find('.eael-advance-tabs'),
				$currentTabId = '#' + $currentTab.attr('id').toString();

				$($currentTabId + ' .eael-tabs-nav ul li').each( function(index) {
					if( $(this).hasClass('active-default') ) {
						$($currentTabId + ' .eael-tabs-nav > ul li').removeClass('active').addClass('inactive');
						$(this).removeClass('inactive');
					}else {
						if( index == 0 ) {
							$(this).removeClass('inactive').addClass('active');
				
						}
					}
				} );

				$($currentTabId + ' .eael-tabs-content div').each( function(index) {
					if( $(this).hasClass('active-default') ) {
						$($currentTabId + ' .eael-tabs-content > div').removeClass('active');
					}else {
						if( index == 0 ) {
							$(this).removeClass('inactive').addClass('active');
						}
					}
				} );

				$($currentTabId + ' .eael-tabs-nav ul li').click(function(){
					var currentTabIndex = $(this).index();
					var tabsContainer = $(this).closest('.eael-advance-tabs');
					var tabsNav = $(tabsContainer).children('.eael-tabs-nav').children('ul').children('li');
					var tabsContent = $(tabsContainer).children('.eael-tabs-content').children('div');
				
					$(this).parent('li').addClass('active');
				
					$(tabsNav).removeClass('active active-default').addClass('inactive');
					$(this).addClass('active').removeClass('inactive');
				
					$(tabsContent).removeClass('active').addClass('inactive');
					$(tabsContent).eq(currentTabIndex).addClass('active').removeClass('inactive');
				
					$(tabsContent).each( function(index) {
						$(this).removeClass('active-default');
				});
			});

		});
	}

	/* ------------------------------ */
	/* Post Timeline
	/* ------------------------------ */
	var postTimelineHandler = function ($scope, $) {
		var $_this = $scope.find('.eael-post-timeline'),
			$currentTimelineId = '#' + $_this.attr('id'),
			$total_posts    = parseInt( $_this.data('total_posts'), 10 ),
			$timeline_id    = $_this.data('timeline_id'),

			$post_type          = $_this.data('post_type'),
			$posts_per_page     = parseInt( $_this.data('posts_per_page'), 10 ),
			$post_order         = $_this.data('post_order'),
			$post_orderby       = $_this.data('post_orderby'),
			$post_offset        = parseInt( $_this.data('post_offset'), 10 ),

			$show_images        = $_this.data('show_images'),
			$image_size         = $_this.data('image_size'),
			$show_title         = $_this.data('show_title'),
			
			$show_excerpt       = $_this.data('show_excerpt'),
			$excerpt_length     = parseInt( $_this.data('excerpt_length'), 10 ),

			$btn_text       = $_this.data('btn_text'),

			$tax_query           = $_this.data('tax_query'),
			$exclude_posts  = $_this.data('exclude_posts'),
			$post__in  = $_this.data('post__in');

		var options = {
			totalPosts: $total_posts,
			loadMoreBtn: $( '#eael-load-more-btn-' + $timeline_id ),
			postContainer: $( '.eael-post-appender-' + $timeline_id ),
			postStyle: 'timeline',
		}
	
		var settings = {
			postType: $post_type,
			perPage: $posts_per_page,
			postOrder: $post_order,
			orderBy: $post_orderby,
			offset: $post_offset,

			showImage: $show_images,
			imageSize: $image_size,
			showTitle: $show_title,
			showExcerpt: $show_excerpt,
			excerptLength: parseInt( $excerpt_length, 10 ),
			btnText: $btn_text,
  
			tax_query: $tax_query,
			exclude_posts: $exclude_posts,
			post__in: $post__in,
		}

		eaelLoadMore( options, settings );
	}

	/* ------------------------------ */
	/* Content Timeline
	/* ------------------------------ */
	var contentTimelineHandler = function($scope, $) {
			var contentBlock = $( '.eael-content-timeline-block' );

			$( window ).on( 'scroll', function() {

				contentBlock.each(function() {
					if( $(this).find( '.highlight' ) ) {
						
						// Calculate screen middle position, top offset and line height and
						// change line height dynamically 

						let lineEnd = contentBlock.height() * 0.15 + window.innerHeight / 2;
						let topOffset = $(this).offset().top;
						let lineHeight = window.scrollY + lineEnd * 1.3 - topOffset;

						$(this).find( '.eael-content-timeline-inner' ).css( 'height', lineHeight +'px' );
					}
				});

				if( this.oldScroll > this.scrollY == false ) {
					this.oldScroll = this.scrollY;
					// Scroll Down
					$( '.eael-content-timeline-block.highlight' ).prev().find('.eael-content-timeline-inner').removeClass( 'eael-muted' ).addClass( 'eael-highlighted' );

				}else if( this.oldScroll > this.scrollY == true ) {
					this.oldScroll = this.scrollY;
					// Scroll Up
					$( '.eael-content-timeline-block.highlight' ).find('.eael-content-timeline-inner').addClass( 'eael-prev-highlighted' );
					$( '.eael-content-timeline-block.highlight' ).next().find('.eael-content-timeline-inner').removeClass( 'eael-highlighted' ).removeClass( 'eael-prev-highlighted' ).addClass( 'eael-muted' );

				}
				});
	} // end of content timeline

	/* ------------------------------ */
	/* Post List
	/* ------------------------------ */
	var postListHandler = function($scope, $) {
		var $_this = $scope.find('.eael-post-list-container'),
			eael_post_list_settings = {
				appender: $( $_this.data('appender') ),
				post_type: $_this.data('post_type'),
				posts_per_page: ( $_this.data('posts_per_page') !== '' ) ? parseInt( $_this.data('posts_per_page'), 10 ) : 11,
				post__in: $_this.data('post__in'),
				orderby: $_this.data('orderby'),
				order: $_this.data('order'),
				total_posts: $_this.data('total_posts'),
				offset: ( $_this.data('offset') !== '' ) ? parseInt( $_this.data('offset'), 10 ) : 0,

				eael_post_list_post_feature_image: $_this.data('show_image'),
				eael_post_list_post_meta: $_this.data('show_meta'),
				eael_post_list_post_title: $_this.data('show_title'),
				eael_post_list_post_excerpt: $_this.data('show_excerpt'),
				eael_post_list_post_excerpt_length: $_this.data('excerpt_length'),

				eael_post_list_featured_area: $_this.data('show_featured_area'),
				featured_posts: $_this.data('featured_posts'),
				eael_post_list_featured_meta: $_this.data('show_featured_meta'),
				eael_post_list_featured_title: $_this.data('show_featured_title'),
				eael_post_list_featured_excerpt: $_this.data('show_featured_excerpt'),
				eael_post_list_featured_excerpt_length: $_this.data('featured_excerpt_length'),

				tax_query: $_this.data('tax_query'),

				excluded: $_this.data('excluded'),

				eael_post_list_pagination: $_this.data('show_nav'),
				eael_post_list_pagination_next_icon: $_this.data('next_icon'),
				eael_post_list_pagination_prev_icon: $_this.data('prev_icon'),
				next_btn: $( $_this.data('next_btn') ),
				prev_btn: $( $_this.data('prev_btn') ),
			};
		eaelLoadMorePostList( eael_post_list_settings );
	} // end of Post List

	/* ------------------------------ */
	/* Data Table
	/* ------------------------------ */
	var dataTable = function($scope, $) {
		var $_this = $scope.find('.eael-data-table-wrap'),
			$enable_table = $_this.data('table_enabled'),
			$id = $_this.data('table_id');
		
		if( true == $enable_table ) $("#eael-data-table-"+$id).tablesorter();
		if( $enable_table != true ) {
			$('table#eael-data-table-'+$id+' .sorting').addClass('sorting-none');
			$('table#eael-data-table-'+$id+' .sorting_desc').addClass('sorting-none');
			$('table#eael-data-table-'+$id+' .sorting_asc').addClass('sorting-none');
		}

		var responsive = $_this.data('custom_responsive');
		if( true == responsive ) {
			var $th = $scope.find('.eael-data-table').find('th');
			var $tbody = $scope.find('.eael-data-table').find('tbody');

			$tbody.find('tr').each(function(i, item) {
				$(item).find('td .td-content-wrapper').each(function(index, item){
				$(this)
					.prepend('<div class="th-mobile-screen">' + $th.eq(index).html() + '</div>');
				});
			});
		}


	} // end of Data Table


   // Team member carousel
	var TeamMemberCarouselHandler = function ($scope, $) {
	   var $carousel                   = $scope.find('.eael-tm-carousel').eq(0),
			$pagination                 = ($carousel.data("pagination") !== undefined) ? $carousel.data("pagination") : '.swiper-pagination',
			$arrow_next                 = ($carousel.data("arrow-next") !== undefined) ? $carousel.data("arrow-next") : '.swiper-button-next',
			$arrow_prev                 = ($carousel.data("arrow-prev") !== undefined) ? $carousel.data("arrow-prev") : '.swiper-button-prev',
			$items                      = ($carousel.data("items") !== undefined) ? $carousel.data("items") : 3,
			$items_tablet               = ($carousel.data("items-tablet") !== undefined) ? $carousel.data("items-tablet") : 3,
			$items_mobile               = ($carousel.data("items-mobile") !== undefined) ? $carousel.data("items-mobile") : 3,
			$margin                     = ($carousel.data("margin") !== undefined) ? $carousel.data("margin") : 10,
			$margin_tablet              = ($carousel.data("margin-tablet") !== undefined) ? $carousel.data("margin-tablet") : 10,
			$margin_mobile              = ($carousel.data("margin-mobile") !== undefined) ? $carousel.data("margin-mobile") : 10,
			$speed                      = ($carousel.data("speed") !== undefined) ? $carousel.data("speed") : 400,
			$autoplay                   = ($carousel.data("autoplay") !== undefined) ? $carousel.data("autoplay") : 999999,
			$loop                       = ($carousel.data("loop") !== undefined) ? $carousel.data("loop") : 0,
			$grab_cursor                = ($carousel.data("grab-cursor") !== undefined) ? $carousel.data("grab-cursor") : 0,
			
			mySwiper = new Swiper($carousel, {
				direction:              'horizontal',
				speed:                  $speed,
				slidesPerView:          $items,
				spaceBetween:           $margin,
				grabCursor:             $grab_cursor,
				loop:                   $loop,
				autoplay: {
					delay: $autoplay,
				},
				pagination: {
					el: $pagination,
					clickable: true,
				},
				navigation: {
					nextEl: $arrow_next,
					prevEl: $arrow_prev,
				},
				breakpoints: {
					// when window width is <= 480px
					480: {
						slidesPerView:  $items_mobile,
						spaceBetween:   $margin_mobile
					},
					// when window width is <= 640px
					768: {
						slidesPerView:  $items_tablet,
						spaceBetween:   $margin_tablet
					}
				}
			});
	};

	// Image otspots
	var ImageHotspotHandler = function ($scope, $) {
		$('.eael-hot-spot-tooptip').each(function () {
			var $position_local         = $(this).data('tooltip-position-local'),
				$position_global        = $(this).data('tooltip-position-global'),
				$width                  = $(this).data('tooltip-width'),
				$size                   = $(this).data('tooltip-size'),
				$animation_in           = $(this).data('tooltip-animation-in'),
				$animation_out          = $(this).data('tooltip-animation-out'),
				$background             = $(this).data('tooltip-background'),
				$text_color             = $(this).data('tooltip-text-color'),
				$arrow                  = ($(this).data('eael-tooltip-arrow') === 'yes') ? true : false,
				$position               = $position_local;

			if (typeof $position_local === 'undefined' || $position_local === 'global') {
				$position = $position_global;
			}
			if (typeof $animation_out === 'undefined' || !$animation_out) {
				$animation_out = $animation_in;
			}
			
			$(this).tipso({
				speed:                  200,
				delay:                  200,
				width:                  $width,
				background:             $background,
				color:                  $text_color,
				size:                   $size,
				position:               $position,
				animationIn:            $animation_in,
				animationOut:           $animation_out,
				showArrow:              $arrow
			});
		});
	};

	var LogoCarouselHandler = function ($scope, $) {
		var $carousel                   = $scope.find('.eael-logo-carousel').eq(0),
			$items                      = ($carousel.data("items") !== undefined) ? $carousel.data("items") : 3,
			$items_tablet               = ($carousel.data("items-tablet") !== undefined) ? $carousel.data("items-tablet") : 3,
			$items_mobile               = ($carousel.data("items-mobile") !== undefined) ? $carousel.data("items-mobile") : 3,
			$margin                     = ($carousel.data("margin") !== undefined) ? $carousel.data("margin") : 10,
			$margin_tablet              = ($carousel.data("margin-tablet") !== undefined) ? $carousel.data("margin-tablet") : 10,
			$margin_mobile              = ($carousel.data("margin-mobile") !== undefined) ? $carousel.data("margin-mobile") : 10,
			$effect                     = ($carousel.data("effect") !== undefined) ? $carousel.data("effect") : 'slide',
			$speed                      = ($carousel.data("speed") !== undefined) ? $carousel.data("speed") : 400,
			$autoplay                   = ($carousel.data("autoplay") !== undefined) ? $carousel.data("autoplay") : 999999,
			$loop                       = ($carousel.data("loop") !== undefined) ? $carousel.data("loop") : 0,
			$grab_cursor                = ($carousel.data("grab-cursor") !== undefined) ? $carousel.data("grab-cursor") : 0,
			$pagination                 = ($carousel.data("pagination") !== undefined) ? $carousel.data("pagination") : '.swiper-pagination',
			$arrows                     = ($carousel.data("arrows") !== undefined) ? $carousel.data("arrows") : false,
			$arrow_next                 = ($carousel.data("arrow-next") !== undefined) ? $carousel.data("arrow-next") : '.swiper-button-next',
			$arrow_prev                 = ($carousel.data("arrow-prev") !== undefined) ? $carousel.data("arrow-prev") : '.swiper-button-prev',
			
			mySwiper = new Swiper($carousel, {
				direction:              'horizontal',
				speed:                  $speed,
				effect:                 $effect,
				slidesPerView:          $items,
				spaceBetween:           $margin,
				grabCursor:             $grab_cursor,
				paginationClickable:    true,
				autoHeight:             true,
				loop:                   $loop,
				autoplay: {
					delay: $autoplay,
				},
				pagination: {
					el: $pagination,
					clickable: true,
				},
				navigation: {
					nextEl: $arrow_next,
					prevEl: $arrow_prev,
				},
				breakpoints: {
					// when window width is <= 480px
					480: {
						slidesPerView:  $items_mobile,
						spaceBetween:   $margin_mobile
					},
					// when window width is <= 640px
					768: {
						slidesPerView:  $items_tablet,
						spaceBetween:   $margin_tablet
					}
				}
			});
	};

	var PostCarouselHandler = function ($scope, $) {
		var $postCarousel               = $scope.find('.eael-post-carousel').eq(0),
			$pagination                 = ($postCarousel.data("pagination") !== undefined) ? $postCarousel.data("pagination") : '.swiper-pagination',
			$arrow_next                 = ($postCarousel.data("arrow-next") !== undefined) ? $postCarousel.data("arrow-next") : '.swiper-button-next',
			$arrow_prev                 = ($postCarousel.data("arrow-prev") !== undefined) ? $postCarousel.data("arrow-prev") : '.swiper-button-prev',
			$items                      = ($postCarousel.data("items") !== undefined) ? $postCarousel.data("items") : 3,
			$items_tablet               = ($postCarousel.data("items-tablet") !== undefined) ? $postCarousel.data("items-tablet") : 3,
			$items_mobile               = ($postCarousel.data("items-mobile") !== undefined) ? $postCarousel.data("items-mobile") : 3,
			$margin                     = ($postCarousel.data("margin") !== undefined) ? $postCarousel.data("margin") : 10,
			$margin_tablet              = ($postCarousel.data("margin-tablet") !== undefined) ? $postCarousel.data("margin-tablet") : 10,
			$margin_mobile              = ($postCarousel.data("margin-mobile") !== undefined) ? $postCarousel.data("margin-mobile") : 10,
			$effect                     = ($postCarousel.data("effect") !== undefined) ? $postCarousel.data("effect") : 'slide',
			$speed                      = ($postCarousel.data("speed") !== undefined) ? $postCarousel.data("speed") : 400,
			$autoplay                   = ($postCarousel.data("autoplay") !== undefined) ? $postCarousel.data("autoplay") : 999999,
			$loop                       = ($postCarousel.data("loop") !== undefined) ? $postCarousel.data("loop") : 0,
			$grab_cursor                = ($postCarousel.data("grab-cursor") !== undefined) ? $postCarousel.data("grab-cursor") : 0,
			$centeredSlides             = ($effect == 'coverflow')? true : false,

			mySwiper = new Swiper($postCarousel, {
				direction:              'horizontal',
				speed:                  $speed,
				effect:                 $effect,
				centeredSlides:         $centeredSlides,
				slidesPerView:          $items,
				spaceBetween:           $margin,
				grabCursor:             $grab_cursor,
				autoHeight:             true,
				loop:                   $loop,
				autoplay: {
					delay: $autoplay,
				},
				pagination: {
					el: $pagination,
					clickable: true,
				},
				navigation: {
					nextEl: $arrow_next,
					prevEl: $arrow_prev,
				},
				breakpoints: {
					// when window width is <= 480px
					480: {
						slidesPerView:  $items_mobile,
						spaceBetween:   $margin_mobile
					},
					// when window width is <= 640px
					768: {
						slidesPerView:  $items_tablet,
						spaceBetween:   $margin_tablet
					}
				}
			});
	};
	
	var FacebookCarouselHandler = function ($scope, $) {

		var loadingFeed = $scope.find( '.eael-loading-feed' );
		var $fbCarousel            = $scope.find('.eael-facebook-feed-carousel-wrapper').eq(0),
				$name         = ($fbCarousel.data("facebook-feed-carousel-ac") !== undefined) ? $fbCarousel.data("facebook-feed-carousel-ac") : '',
				$limit         = ($fbCarousel.data("facebook-feed-carousel-post-limit") !== undefined) ? $fbCarousel.data("facebook-feed-carousel-post-limit") : '',
				$app_id         = ($fbCarousel.data("facebook-feed-carousel-app-id") !== undefined) ? $fbCarousel.data("facebook-feed-carousel-app-id") : '',
				$app_secret         = ($fbCarousel.data("facebook-feed-carousel-app-secret") !== undefined) ? $fbCarousel.data("facebook-feed-carousel-app-secret") : '',
				$length         = ($fbCarousel.data("facebook-feed-carousel-length") !== undefined) ? $fbCarousel.data("facebook-feed-carousel-length") : 400,
				$media         = ($fbCarousel.data("facebook-feed-carousel-media") !== undefined) ? $fbCarousel.data("facebook-feed-carousel-media") : false,
				$carouselId         = ($fbCarousel.data("facebook-feed-carousel-id") !== undefined) ? $fbCarousel.data("facebook-feed-carousel-id") : ' '; 
		
		/**
		 * Facebook Feed Init
		 */
		function eael_facebook_feeds() {
			var $access_token = ($app_id+'|'+$app_secret).toString();
			var $id_name = $name.toString();
			$( '#eael-facebook-feed-'+ $carouselId +'.eael-facebook-feed-main-carousel-container' ).socialfeed({

				facebook:{
				   accounts:[$id_name],
				   limit: $limit,
				   access_token: $access_token
				},

				// GENERAL SETTINGS
				length: $length,
				show_media: $media,
				template_html: '<div class="swiper-slide"><div class="carousel-cell eael-social-feed-element {{?\ !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{\{=it.id}}">\
				{{=it.attachment}}\
				<div class="eael-content">\
					<a class="pull-left auth-img" href="{{=it.author_link}}" target="_blank">\
						<img class="media-object" src="{{=it.author_picture}}">\
					</a>\
					<div class="media-body">\
						<p>\
							<i class="fa fa-{{=it.social_network}} social-feed-icon"></i>\
							<span class="author-title">{{=it.author_name}}</span>\
							<span class="muted pull-right social-feed-date"> {{=it.time_ago}}</span>\
						</p>\
						<div class="text-wrapper">\
							<p class="social-feed-text">{{=it.text}} </p>\
							<p><a href="{{=it.link}}" target="_blank" class="read-more-link">Read \</a></p>\
						</div>\
					</div>\
				</div>\
			</div></div>',
			});
		}

		/**
		 * Facebook Feed Carousel View
		 */
		 function eael_facebook_feed_carosuel() {
			var $carousel               = $scope.find('.eael-facebook-feed-carousel-nav').eq(0),
			$pagination                 = ($carousel.data("pagination") !== undefined) ? $carousel.data("pagination") : '.swiper-pagination',
			$arrow_next                 = ($carousel.data("arrow-next") !== undefined) ? $carousel.data("arrow-next") : '.swiper-button-next',
			$arrow_prev                 = ($carousel.data("arrow-prev") !== undefined) ? $carousel.data("arrow-prev") : '.swiper-button-prev',
			$items                      = ($carousel.data("items") !== undefined) ? $carousel.data("items") : 3,
			$items_tablet               = ($carousel.data("items-tablet") !== undefined) ? $carousel.data("items-tablet") : 3,
			$items_mobile               = ($carousel.data("items-mobile") !== undefined) ? $carousel.data("items-mobile") : 3,
			$margin                     = ($carousel.data("margin") !== undefined) ? $carousel.data("margin") : 10,
			$margin_tablet              = ($carousel.data("margin-tablet") !== undefined) ? $carousel.data("margin-tablet") : 10,
			$margin_mobile              = ($carousel.data("margin-mobile") !== undefined) ? $carousel.data("margin-mobile") : 10,
			$effect                     = ($carousel.data("effect") !== undefined) ? $carousel.data("effect") : 'slide',
			$speed                      = ($carousel.data("speed") !== undefined) ? $carousel.data("speed") : 400,
			$autoplay                   = ($carousel.data("autoplay") !== undefined) ? $carousel.data("autoplay") : 999999,
			$loop                       = ($carousel.data("loop") !== undefined) ? $carousel.data("loop") : 0,
			$grab_cursor                = ($carousel.data("grab-cursor") !== undefined) ? $carousel.data("grab-cursor") : 0,
			$centeredSlides             = ($effect == 'coverflow')? true : false,

			mySwiper = new Swiper($carousel, {
				direction:              'horizontal',
				speed:                  $speed,
				effect:                 $effect,
				centeredSlides:         $centeredSlides,
				slidesPerView:          $items,
				spaceBetween:           $margin,
				grabCursor:             $grab_cursor,
				autoHeight:             true,
				loop:                   $loop,
				autoplay: {
					delay: $autoplay,
				},
				pagination: {
					el: $pagination,
					clickable: true,
				},
				navigation: {
					nextEl: $arrow_next,
					prevEl: $arrow_prev,
				},
				breakpoints: {
					// when window width is <= 480px
					480: {
						slidesPerView:  $items_mobile,
						spaceBetween:   $margin_mobile
					},
					// when window width is <= 640px
					768: {
						slidesPerView:  $items_tablet,
						spaceBetween:   $margin_tablet
					}
				}
			});
		}

		$.ajax({
			url: eael_facebook_feeds(),
			beforeSend: function() {
				loadingFeed.addClass( 'show-loading' );
			},
			success: function() {
				setTimeout(function() {
				eael_facebook_feed_carosuel();
					loadingFeed.removeClass( 'show-loading' );
				}, 2000);
			},
			error: function() {
				console.log('error loading');
			}
		});  
	};

	var FacebookFeedHandler = function ($scope, $) {
		var loadingFeed = $scope.find( '.eael-loading-feed' );
		var $fbCarousel            = $scope.find('.eael-facebook-feed-layout-wrapper').eq(0),
				$name         = ($fbCarousel.data("facebook-feed-ac-name") !== undefined) ? $fbCarousel.data("facebook-feed-ac-name") : '',
				$limit         = ($fbCarousel.data("facebook-feed-post-limit") !== undefined) ? $fbCarousel.data("facebook-feed-post-limit") : '',
				$app_id         = ($fbCarousel.data("facebook-feed-app-id") !== undefined) ? $fbCarousel.data("facebook-feed-app-id") : '',
				$app_secret         = ($fbCarousel.data("facebook-feed-app-secret") !== undefined) ? $fbCarousel.data("facebook-feed-app-secret") : '',
				$length         = ($fbCarousel.data("facebook-feed-content-length") !== undefined) ? $fbCarousel.data("facebook-feed-content-length") : 400,
				$media         = ($fbCarousel.data("facebook-feed-media") !== undefined) ? $fbCarousel.data("facebook-feed-media") : false,
				$feed_type     = ($fbCarousel.data("facebook-feed-type") !== undefined) ? $fbCarousel.data("facebook-feed-type") : false,
				$carouselId         = ($fbCarousel.data("facebook-feed-id") !== undefined) ? $fbCarousel.data("facebook-feed-id") : ' ';
		// Facebook Feed Init
		function eael_facebook_feeds() {
			var $access_token = ($app_id+'|'+$app_secret).toString();
			var $id_name = $name.toString();
			$( '#eael-facebook-feed-'+ $carouselId +'.eael-facebook-feed-layout-container' ).socialfeed({

				facebook:{
				   accounts:[$id_name],
				   limit: $limit,
				   access_token: $access_token
				},

				// GENERAL SETTINGS
				length: $length,
				show_media: $media,
				template_html: '<div class="eael-social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}\" social-feed-id = "{{=it.id}}">\
				{{=it.attachment}}\
				<div class="eael-content">\
					<a class="pull-left auth-img" href="{{=it.author_link}}" target="_blank">\
						<img class="media-object" src="{{=it.author_picture}}">\
					</a>\
					<div class="media-body">\
						<p>\
							<i class="fa fa-{{=it.social_network}} social-feed-icon"></i>\
							<span class="author-title">{{=it.author_name}}</span>\
							<span class="muted pull-right social-feed-date"> {{=it.time_ago}}</span>\
						</p>\
						<div class="text-wrapper">\
							<p class="social-feed-text">{{=it.text}} </p>\
							<p><a href="{{=it.link}}" target="_blank" class="read-more-link">Read More</a></p>\
						</div>\
					</div>\
				</div>\
			</div>',
			});
		}
		
		// Facebook Feed Masonry View
		function eael_facebook_feed_masonry() {
			$('.eael-facebook-feed-layout-container.masonry-view').masonry({
				itemSelector: '.eael-social-feed-element',
				percentPosition: true,
				columnWidth: '.eael-social-feed-element'
			});
		}

		$.ajax({
			url: eael_facebook_feeds(),
			beforeSend: function() {
				loadingFeed.addClass( 'show-loading' );
			},
			success: function() {
				if($feed_type == 'masonry') {
					setTimeout(function() {
						eael_facebook_feed_masonry();
					}, 2000);
					 
				}                
			 loadingFeed.removeClass( 'show-loading' );
		 },
		 error: function() {
			 console.log('error loading');
		 }
	 });
		

	};

	var TwitterFeedHandler = function ($scope, $) {
		var loadingFeed = $scope.find( '.eael-loading-feed' );
		var $twitterFeed            = $scope.find('.eael-twitter-feed-layout-wrapper').eq(0),
				$name               = ($twitterFeed.data("twitter-feed-ac-name") !== undefined) ? $twitterFeed.data("twitter-feed-ac-name") : '',
				$limit              = ($twitterFeed.data("twitter-feed-post-limit") !== undefined) ? $twitterFeed.data("twitter-feed-post-limit") : '',
				$hash_tag           = ($twitterFeed.data("twitter-feed-hashtag-name") !== undefined) ? $twitterFeed.data("twitter-feed-hashtag-name") : '',
				$key                = ($twitterFeed.data("twitter-feed-consumer-key") !== undefined) ? $twitterFeed.data("twitter-feed-consumer-key") : '',
				$app_secret         = ($twitterFeed.data("twitter-feed-consumer-secret") !== undefined) ? $twitterFeed.data("twitter-feed-consumer-secret") : '',
				$length             = ($twitterFeed.data("twitter-feed-content-length") !== undefined) ? $twitterFeed.data("twitter-feed-content-length") : 400,
				$media              = ($twitterFeed.data("twitter-feed-media") !== undefined) ? $twitterFeed.data("twitter-feed-media") : false,
				$feed_type          = ($twitterFeed.data("twitter-feed-type") !== undefined) ? $twitterFeed.data("twitter-feed-type") : false,  
				$carouselId         = ($twitterFeed.data("twitter-feed-id") !== undefined) ? $twitterFeed.data("twitter-feed-id") : ' '; 

		var $id_name = $name.toString(); 
		var $hash_tag_name = $hash_tag.toString();    
		var $key_name = $key.toString();
		var $app_secret = $app_secret.toString();
		
		function eael_twitter_feeds() {
			$( '#eael-twitter-feed-'+ $carouselId +'.eael-twitter-feed-layout-container' ).socialfeed({
				// TWITTER
				twitter:{
				   accounts: [ $id_name , $hash_tag_name ],
				   limit: $limit,
				   consumer_key: $key_name,
				   consumer_secret: $app_secret,
				},

				// GENERAL SETTINGS
				length: $length,
				show_media: $media,
				template_html: '<div class="eael-social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}">\
				<div class="eael-content">\
					<a class="pull-left auth-img" href="{{=it.author_link}}" target="_blank">\
						<img class="media-object" src="{{=it.author_picture}}">\
					</a>\
					<div class="media-body">\
						<p>\
							<i class="fa fa-{{=it.social_network}} social-feed-icon"></i>\
							<span class="author-title">{{=it.author_name}}</span>\
							<span class="muted pull-right social-feed-date"> {{=it.time_ago}}</span>\
						</p>\
						<div class="text-wrapper">\
							<p class="social-feed-text">{{=it.text}} </p>\
							<p><a href="{{=it.link}}" target="_blank" class="read-more-link">Read More <i class="fa fa-angle-double-right"></i></a></p>\
						</div>\
					</div>\
				</div>\
				{{=it.attachment}}\
			</div>',
			});
		}

		
		//Twitter Feed masonry View
		
		function eael_twitter_feed_masonry() {
			$('.eael-twitter-feed-layout-container.masonry-view').masonry({
				itemSelector: '.eael-social-feed-element',
				percentPosition: true,
				columnWidth: '.eael-social-feed-element'
			});
		}

		$.ajax({
			url: eael_twitter_feeds(),
			beforeSend: function() {
				loadingFeed.addClass( 'show-loading' );
			},
			success: function() {
				if($feed_type == 'masonry') {
					setTimeout(function() {
						eael_twitter_feed_masonry();
					}, 2000);
					 
				}
				loadingFeed.removeClass( 'show-loading' );
			},
			error: function() {
				console.log('error loading');
			}
		});
				
	 }

	var TwitterFeedCarouselHandler = function ($scope, $) {
		var loadingFeed = $scope.find( '.eael-loading-feed' );
		var $twitterFeedCarousel            = $scope.find('.eael-twitter-feed-carousel-wrapper').eq(0),
				$name         = ($twitterFeedCarousel.data("twitter-feed-carousel-ac-name") !== undefined) ? $twitterFeedCarousel.data("twitter-feed-carousel-ac-name") : '',
				$limit         = ($twitterFeedCarousel.data("twitter-feed-carousel-post-limit") !== undefined) ? $twitterFeedCarousel.data("twitter-feed-carousel-post-limit") : '',
				$hash_tag         = ($twitterFeedCarousel.data("twitter-feed-carousel-hashtag-name") !== undefined) ? $twitterFeedCarousel.data("twitter-feed-carousel-hashtag-name") : '',
				$key         = ($twitterFeedCarousel.data("twitter-feed-carousel-consumer-key") !== undefined) ? $twitterFeedCarousel.data("twitter-feed-carousel-consumer-key") : '',
				$app_secret         = ($twitterFeedCarousel.data("twitter-feed-carousel-consumer-secret") !== undefined) ? $twitterFeedCarousel.data("twitter-feed-carousel-consumer-secret") : '',
				$length         = ($twitterFeedCarousel.data("twitter-feed-carousel-content-length") !== undefined) ? $twitterFeedCarousel.data("twitter-feed-carousel-content-length") : 400,
				$media         = ($twitterFeedCarousel.data("twitter-feed-carousel-media") !== undefined) ? $twitterFeedCarousel.data("twitter-feed-carousel-media") : false,  
				$carouselId         = ($twitterFeedCarousel.data("twitter-feed-carousel-id") !== undefined) ? $twitterFeedCarousel.data("twitter-feed-carousel-id") : ' '; 
		var $id_name = $name.toString(); 
		var $hash_tag_name = $hash_tag.toString();    
		var $key_name = $key.toString();
		var $app_secret = $app_secret.toString();
		
		function eael_twitter_feeds() {
			$( '#eael-twitter-feed-'+ $carouselId +'.eael-twitter-feed-main-carousel-container' ).socialfeed({
				// TWITTER
				twitter:{
				   accounts: [ $id_name , $hash_tag_name ],
				   limit: $limit,
				   consumer_key: $key_name,
				   consumer_secret: $app_secret,
				},

				// GENERAL SETTINGS
				length: $length,
				show_media: $media,
				template_html: '<div class="swiper-slide"><div class="carousel-cell eael-social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}">\
				<div class="eael-content">\
					<a class="pull-left auth-img" href="{{=it.author_link}}" target="_blank">\
						<img class="media-object" src="{{=it.author_picture}}">\
					</a>\
					<div class="media-body">\
						<p>\
							<i class="fa fa-{{=it.social_network}} social-feed-icon"></i>\
							<span class="author-title">{{=it.author_name}}</span>\
							<span class="muted pull-right social-feed-date"> {{=it.time_ago}}</span>\
						</p>\
						<div class="text-wrapper">\
							<p class="social-feed-text">{{=it.text}} </p>\
							<p><a href="{{=it.link}}" target="_blank" class="read-more-link">Read More <i class="fa fa-angle-double-right"></i></a></p>\
						</div>\
					</div>\
				</div>\
				{{=it.attachment}}\
			</div></div>',
			});
		}

				
		/**
		 * Twitter Feed Carousel View
		 */
		 function eael_twitter_feed_carosuel() {
			var $carousel               = $scope.find('.eael-twitter-feed-carousel-nav').eq(0),
			$pagination                 = ($carousel.data("pagination") !== undefined) ? $carousel.data("pagination") : '.swiper-pagination',
			$arrow_next                 = ($carousel.data("arrow-next") !== undefined) ? $carousel.data("arrow-next") : '.swiper-button-next',
			$arrow_prev                 = ($carousel.data("arrow-prev") !== undefined) ? $carousel.data("arrow-prev") : '.swiper-button-prev',
			$items                      = ($carousel.data("items") !== undefined) ? $carousel.data("items") : 3,
			$items_tablet               = ($carousel.data("items-tablet") !== undefined) ? $carousel.data("items-tablet") : 3,
			$items_mobile               = ($carousel.data("items-mobile") !== undefined) ? $carousel.data("items-mobile") : 3,
			$margin                     = ($carousel.data("margin") !== undefined) ? $carousel.data("margin") : 10,
			$margin_tablet              = ($carousel.data("margin-tablet") !== undefined) ? $carousel.data("margin-tablet") : 10,
			$margin_mobile              = ($carousel.data("margin-mobile") !== undefined) ? $carousel.data("margin-mobile") : 10,
			$effect                     = ($carousel.data("effect") !== undefined) ? $carousel.data("effect") : 'slide',
			$speed                      = ($carousel.data("speed") !== undefined) ? $carousel.data("speed") : 400,
			$autoplay                   = ($carousel.data("autoplay") !== undefined) ? $carousel.data("autoplay") : 999999,
			$loop                       = ($carousel.data("loop") !== undefined) ? $carousel.data("loop") : 0,
			$grab_cursor                = ($carousel.data("grab-cursor") !== undefined) ? $carousel.data("grab-cursor") : 0,
			$centeredSlides             = ($effect == 'coverflow')? true : false,

			mySwiper = new Swiper($carousel, {
				direction:              'horizontal',
				speed:                  $speed,
				effect:                 $effect,
				centeredSlides:         $centeredSlides,
				slidesPerView:          $items,
				spaceBetween:           $margin,
				grabCursor:             $grab_cursor,
				autoHeight:             true,
				loop:                   $loop,
				autoplay: {
					delay: $autoplay,
				},
				pagination: {
					el: $pagination,
					clickable: true,
				},
				navigation: {
					nextEl: $arrow_next,
					prevEl: $arrow_prev,
				},
				breakpoints: {
					// when window width is <= 480px
					480: {
						slidesPerView:  $items_mobile,
						spaceBetween:   $margin_mobile
					},
					// when window width is <= 640px
					768: {
						slidesPerView:  $items_tablet,
						spaceBetween:   $margin_tablet
					}
				}
			});
		}

		$.ajax({
			url: eael_twitter_feeds(),
			beforeSend: function() {
				loadingFeed.addClass( 'show-loading' );
			},
			success: function() {
				setTimeout( function() {
					eael_twitter_feed_carosuel();
					loadingFeed.removeClass( 'show-loading' );							
				}, 6000 );
			},
			error: function() {
				console.log('error loading');
			}
		});
	 }
	
	 var TestimonialSliderHandler = function ( $scope, $ ) {
		var $testimonialSlider      = $scope.find('.eael-testimonial-slider-main').eq(0),
		$pagination                 = ($testimonialSlider.data("pagination") !== undefined) ? $testimonialSlider.data("pagination") : '.swiper-pagination',
		$arrow_next                 = ($testimonialSlider.data("arrow-next") !== undefined) ? $testimonialSlider.data("arrow-next") : '.swiper-button-next',
		$arrow_prev                 = ($testimonialSlider.data("arrow-prev") !== undefined) ? $testimonialSlider.data("arrow-prev") : '.swiper-button-prev',
		$items                      = ($testimonialSlider.data("items") !== undefined) ? $testimonialSlider.data("items") : 3,
		$items_tablet               = ($testimonialSlider.data("items-tablet") !== undefined) ? $testimonialSlider.data("items-tablet") : 3,
		$items_mobile               = ($testimonialSlider.data("items-mobile") !== undefined) ? $testimonialSlider.data("items-mobile") : 3,
		$margin                     = ($testimonialSlider.data("margin") !== undefined) ? $testimonialSlider.data("margin") : 10,
		$margin_tablet              = ($testimonialSlider.data("margin-tablet") !== undefined) ? $testimonialSlider.data("margin-tablet") : 10,
		$margin_mobile              = ($testimonialSlider.data("margin-mobile") !== undefined) ? $testimonialSlider.data("margin-mobile") : 10,
		$effect                     = ($testimonialSlider.data("effect") !== undefined) ? $testimonialSlider.data("effect") : 'slide',
		$speed                      = ($testimonialSlider.data("speed") !== undefined) ? $testimonialSlider.data("speed") : 400,
		$autoplay                   = ($testimonialSlider.data("autoplay_speed") !== undefined) ? $testimonialSlider.data("autoplay_speed") : 999999,
		$loop                       = ($testimonialSlider.data("loop") !== undefined) ? $testimonialSlider.data("loop") : 0,
		$grab_cursor                = ($testimonialSlider.data("grab-cursor") !== undefined) ? $testimonialSlider.data("grab-cursor") : 0,
		$centeredSlides             = ($effect == 'coverflow')? true : false,

		mySwiper = new Swiper($testimonialSlider, {
			direction:              'horizontal',
			speed:                  $speed,
			effect:                 $effect,
			centeredSlides:         $centeredSlides,
			slidesPerView:          $items,
			spaceBetween:           $margin,
			grabCursor:             $grab_cursor,
			autoHeight:             true,
			loop:                   $loop,
			autoplay: {
				delay: $autoplay,
			},
			pagination: {
				el: $pagination,
				clickable: true,
			},
			navigation: {
				nextEl: $arrow_next,
				prevEl: $arrow_prev,
			},
			breakpoints: {
				// when window width is <= 480px
				480: {
					slidesPerView:  $items_mobile,
					spaceBetween:   $margin_mobile
				},
				// when window width is <= 640px
				768: {
					slidesPerView:  $items_tablet,
					spaceBetween:   $margin_tablet
				}
			}
		});
	 }
	
	var ContentTicker = function ($scope, $) {
		var $contentTicker              = $scope.find('.eael-content-ticker').eq(0),
			$items                      = ($contentTicker.data("items") !== undefined) ? $contentTicker.data("items") : 1,
			$items_tablet               = ($contentTicker.data("items-tablet") !== undefined) ? $contentTicker.data("items-tablet") : 1,
			$items_mobile               = ($contentTicker.data("items-mobile") !== undefined) ? $contentTicker.data("items-mobile") : 1,
			$margin                     = ($contentTicker.data("margin") !== undefined) ? $contentTicker.data("margin") : 10,
			$margin_tablet              = ($contentTicker.data("margin-tablet") !== undefined) ? $contentTicker.data("margin-tablet") : 10,
			$margin_mobile              = ($contentTicker.data("margin-mobile") !== undefined) ? $contentTicker.data("margin-mobile") : 10,
			$effect                     = ($contentTicker.data("effect") !== undefined) ? $contentTicker.data("effect") : 'slide',
			$speed                      = ($contentTicker.data("speed") !== undefined) ? $contentTicker.data("speed") : 400,
			$autoplay                   = ($contentTicker.data("autoplay") !== undefined) ? $contentTicker.data("autoplay") : 5000,
			$loop                       = ($contentTicker.data("loop") !== undefined) ? $contentTicker.data("loop") : false,
			$grab_cursor                = ($contentTicker.data("grab-cursor") !== undefined) ? $contentTicker.data("grab-cursor") : false,
			$pagination                 = ($contentTicker.data("pagination") !== undefined) ? $contentTicker.data("pagination") : '.swiper-pagination',
			$arrow_next                 = ($contentTicker.data("arrow-next") !== undefined) ? $contentTicker.data("arrow-next") : '.swiper-button-next',
			$arrow_prev                 = ($contentTicker.data("arrow-prev") !== undefined) ? $contentTicker.data("arrow-prev") : '.swiper-button-prev',
			

		mySwiper = new Swiper($contentTicker, {
			direction:              'horizontal',
			loop:                   $loop,
			speed:                  $speed,
			effect:                 $effect,
			slidesPerView:          $items,
			spaceBetween:           $margin,
			grabCursor:             $grab_cursor,
			paginationClickable:    true,
			autoHeight:             true,
			autoplay: {
				delay: $autoplay,
			},
			pagination: {
				el: $pagination,
				clickable: true,
			},
			navigation: {
				nextEl: $arrow_next,
				prevEl: $arrow_prev,
			},
			breakpoints: {
				// when window width is <= 480px
				480: {
					slidesPerView:  $items_mobile,
					spaceBetween:   $margin_mobile
				},
				// when window width is <= 640px
				768: {
					slidesPerView:  $items_tablet,
					spaceBetween:   $margin_tablet
				}
			}
		});
	};

	var ImageComparisonHandler = function( $scope, $ ){
		var $containerID    = $( '#' + $scope.find( '.eael-img-comp-container' )[0].id ),
			$offset         = $containerID.data('offset'),
			$orientation    = $containerID.data('orientation'),
			$beforeLabel    = $containerID.data('before_label'),
			$afterLabel     = $containerID.data('after_label'),
			$overlay        = $containerID.data('overlay'),
			$slideOnHover   = $containerID.data('onhover'),
			$slideOnClick   = $containerID.data('onclick');
		$containerID.twentytwenty( {
			default_offset_pct: $offset || 0.7, 
			orientation: $orientation || 'horizontal', 
			before_label: $beforeLabel || 'Before', 
			after_label: $afterLabel || 'After', 
			no_overlay: $overlay == 'yes' ? false : true,
			move_slider_on_hover: $slideOnHover == 'yes' ? true : false,
			move_with_handle_only: true,
			click_to_move: $slideOnClick == 'yes' ? true : false
		} );
	};

	var MailChimp = function ($scope, $) {
		var $mailChimp                    = $scope.find('.eael-mailchimp-wrap').eq(0),
			$mailchimp_id                 = ($mailChimp.data("mailchimp-id") !== undefined) ? $mailChimp.data("mailchimp-id") : '',
			$api_key                      = ($mailChimp.data("api-key") !== undefined) ? $mailChimp.data("api-key") : '',
			$list_id                      = ($mailChimp.data("list-id") !== undefined) ? $mailChimp.data("list-id") : '',
			$button_text                  = ($mailChimp.data("button-text") !== undefined) ? $mailChimp.data("button-text") : '',
			$success_text                 = ($mailChimp.data("success-text") !== undefined) ? $mailChimp.data("success-text") : '',
			$loading_text                 = ($mailChimp.data("loading-text") !== undefined) ? $mailChimp.data("loading-text") : '';


		eael_mailchimp_subscribe( 'eael-mailchimp-form-'+ $mailchimp_id +'', $api_key , $list_id , $button_text , $success_text , $loading_text );
	}

	var LightBox = function ($scope, $) {

		var $lightBox = $scope.find('.eael-lightbox-wrapper').eq(0),
		$trigger_type                  = ($lightBox.data("lightbox-trigger-type") !== undefined) ? $lightBox.data("lightbox-trigger-type") : '',
		$trigger_external              = ($lightBox.data("lightbox-trigger-external") !== undefined) ? $lightBox.data("lightbox-trigger-external") : '#open-popup',
		$lightbox_type                 = ($lightBox.data("lightbox-type") !== undefined) ? $lightBox.data("lightbox-type") : '',
		$lightbox_id                   = ($lightBox.data("lightbox-id") !== undefined) ? $lightBox.data("lightbox-id") : '',
		$type_url                      = ($lightBox.data("lightbox-type-url") !== undefined) ? $lightBox.data("lightbox-type-url") : '',
		$trigger_preload               = ($lightBox.data("lightbox-trigger-pageload") !== undefined) ? parseFloat($lightBox.data("lightbox-trigger-pageload")) * 1000 : '',
		$overlay                       = ($lightBox.data("lightbox-container-overlay") !== undefined) ? $lightBox.data("lightbox-container-overlay") : '',
		$closebtn_bg                   = ($lightBox.data("lightbox-closebtn-bg") !== undefined) ? $lightBox.data("lightbox-closebtn-bg") : '',
		$closebtn_color                = ($lightBox.data("lightbox-closebtn-color") !== undefined) ? $lightBox.data("lightbox-closebtn-color") : '';
		
		var $popup_template = '<div id="popup-'+ $lightbox_id +'" class="eael-lightbox-popup lity overlay-'+ $overlay +'" role="dialog" aria-label="Dialog Window (Press escape to close)" tabindex="-1"><div class="lity-wrap" data-lity-close role="document"><div class="lity-loader" aria-hidden="true">Loading...</div><div class="lity-container"><div class="lity-content"></div><button class="lity-close eael-lightbox-close" style="background-color: '+ $closebtn_bg +'; color: '+ $closebtn_color +'" type="button" aria-label="Close (Press escape to close)" data-lity-close>&times;</button></div></div></div>';
		
		jQuery(document).ready(function($) {
			var lightbox = null;
		
			if ($trigger_type == 'eael_lightbox_trigger_button') {
		
				if ($lightbox_type == 'lightbox_type_url') {
		
					$("#btn-eael-lightbox-" + $lightbox_id).click(function(e) {
						e.preventDefault();
						lightbox = lity($type_url, {
							template: $popup_template
						});
					});
		
				} else {
					$("#btn-eael-lightbox-" + $lightbox_id).click(function(e) {
						e.preventDefault();
						lightbox = lity("#popup-content-" + $lightbox_id, {
							template: $popup_template
						});
					});
		
				}
			} else if ($trigger_type == 'eael_lightbox_trigger_external') {
		
				if ($lightbox_type == 'lightbox_type_url') {
		
					$($trigger_external).click(function(e) {
						e.preventDefault();
						lightbox = lity($type_url, {
							template: $popup_template
						});
					});
				} else {
					$($trigger_external).click(function(e) {
						e.preventDefault();
						lightbox = lity("#popup-content-" + $lightbox_id, {
							template: $popup_template
						});
					});
				}
			} else {
		
				if ($lightbox_type == 'lightbox_type_url') {
		
					setTimeout(function() {
						lightbox = lity($type_url, {
							template: $popup_template
						});
					}, $trigger_preload);
				} else {
		
					setTimeout(function() {
						lightbox = lity("#popup-content-" + $lightbox_id, {
							template: $popup_template
						});
					}, $trigger_preload);
				}
		
		
			}
		
		});

	}

	var CountDown = function ($scope, $) {
		var $coundDown           = $scope.find('.eael-countdown-wrapper').eq(0),
		$countdown_id            = ($coundDown.data("countdown-id") !== undefined) ? $coundDown.data("countdown-id") : '',
		$expire_type             = ($coundDown.data("expire-type")  !== undefined) ? $coundDown.data("expire-type") : '',
		$expiry_text             = ($coundDown.data("expiry-text")  !== undefined) ? $coundDown.data("expiry-text") : '',
		$expiry_title			 = ($coundDown.data("expiry-title") !== undefined) ? $coundDown.data('expiry-title') : '',
		$redirect_url            = ($coundDown.data("redirect-url") !== undefined) ? $coundDown.data("redirect-url") : '',
		$template                = ($coundDown.data("template")     !== undefined) ? $coundDown.data("template") : '';
		
		jQuery(document).ready(function($) {
			'use strict';
			var countDown = $("#eael-countdown-" + $countdown_id);
	
			countDown.countdown({
				end: function() {
					if( $expire_type == 'text'){
						countDown.html( '<div class="eael-countdown-finish-message"><h4 class="expiry-title">' + $expiry_title + '</h4>' + '<div class="eael-countdown-finish-text">' + $expiry_text + '</div></div>');
					}
					else if ( $expire_type === 'url'){
						var editMode = $('body').find('#elementor').length;
						if( editMode > 0 ) {
							countDown.html("Your Page will be redirected to given URL (only on Frontend).");
						} else {
							window.location.href = $redirect_url;
						}	
					}
					else if ( $expire_type === 'template'){
						countDown.html( $template );
					} else {
						//do nothing!
					}
				}
			});
		});
	}

	var FancyText = function ($scope, $) { 
		var $fancyText              = $scope.find('.eael-fancy-text-container').eq(0),
			$id                     = ($fancyText.data("fancy-text-id") !== undefined) ? $fancyText.data("fancy-text-id") : '',
			$fancy_text             = ($fancyText.data("fancy-text")  !== undefined) ? $fancyText.data("fancy-text") : '',
			$transition_type        = ($fancyText.data("fancy-text-transition-type")  !== undefined) ? $fancyText.data("fancy-text-transition-type") : '',
			$fancy_text_speed       = ($fancyText.data("fancy-text-speed") !== undefined) ? $fancyText.data("fancy-text-speed") : '',
			$fancy_text_delay       = ($fancyText.data("fancy-text-delay")     !== undefined) ? $fancyText.data("fancy-text-delay") : '',  
			$fancy_text_cursor      = ($fancyText.data("fancy-text-cursor")     !== undefined) ? true : false,    
			$fancy_text_loop        = ($fancyText.data("fancy-text-loop")     !== undefined) ? true : false;    
			$fancy_text = $fancy_text.split("|");
			
		if ( $transition_type  == 'typing' ) {
			$("#eael-fancy-text-" + $id).typed({
				strings: $fancy_text,
				typeSpeed: $fancy_text_speed,
				backSpeed: 0,
				startDelay: 300,
				backDelay: $fancy_text_delay,
				showCursor: $fancy_text_cursor,
				loop: $fancy_text_loop,
			});
		}

		if ( $transition_type  != 'typing' ) {
			$("#eael-fancy-text-" + $id).Morphext({
			 animation: $transition_type,
				separator: ", ",
				speed: $fancy_text_delay,
				complete: function () {
						// Overrides default empty function
					}
			});
		}
	}

	var ImageAccordion = function ($scope, $) {
		var $imageAccordion         = $scope.find('.eael-img-accordion').eq(0),
			$id                     = ($imageAccordion.data("img-accordion-id") !== undefined) ? $imageAccordion.data("img-accordion-id") : '',
			$type             = ($imageAccordion.data("img-accordion-type")  !== undefined) ? $imageAccordion.data("img-accordion-type") : '';
		   

		if( 'on-click' === $type ) {
			$('#eael-img-accordion-'+ $id +' a').on('click', function(e) {
				e.preventDefault();
				$('#eael-img-accordion-'+ $id +' a').css('flex', '1');
				$(this).find('.overlay').parent('a').addClass('overlay-active');
				$('#eael-img-accordion-'+ $id +' a').find('.overlay-inner').removeClass('overlay-inner-show');
				$(this).find('.overlay-inner').addClass('overlay-inner-show');
				$(this).css('flex', '3');
			});
			$('#eael-img-accordion-'+ $id +' a').on('blur', function(e) {
				$('#eael-img-accordion-'+ $id +' a').css('flex', '1');
				$('#eael-img-accordion-'+ $id +' a').find('.overlay-inner').removeClass('overlay-inner-show');
				$(this).find('.overlay').parent('a').removeClass('overlay-active');
			});
		}
	}
	
	var InteractiveCard = function ($scope, $) {
		var $interactiveCard         = $scope.find('.interactive-card').eq(0),
			$id                      = ($interactiveCard.data("interactive-card-id") !== undefined) ? $interactiveCard.data("interactive-card-id") : '',
			$animation               = ($interactiveCard.data("animation")  !== undefined) ? $interactiveCard.data("animation") : '',
			$animation_time          = ($interactiveCard.data("animation-time")  !== undefined) ? $interactiveCard.data("animation-time") : '';
		
			
			var options = {
				containerId: 'interactive-card-' + $id,
				frontAnimation: {
					start: 'fade-out',
					end: 'fade-in'
				},
				rearAnimation: {
					start: 'zoom-out',
					end: 'zoom-in'
				},
				contentAnimation: $animation.toString(),
				revealTime: $animation_time
			}
			interactiveCards( options );          
	}

	var PricingTooltip = function($scope, $) {
		if( $.fn.tooltipster ) {
			var $tooltip = $scope.find('.tooltip'), i;

			for( i = 0; i < $tooltip.length; i++) {
				var $currentTooltip = $( '#' + $($tooltip[i]).attr('id') ),
					$tooltipSide	= ( $currentTooltip.data('side') !== undefined ) ? $currentTooltip.data('side') : false,
					$tooltipTrigger	= ( $currentTooltip.data('trigger') !== undefined ) ? $currentTooltip.data('trigger') : 'hover',
					$animation		= ( $currentTooltip.data('animation') !== undefined ) ? $currentTooltip.data('animation') : 'fade',
					$anim_duration	= ( $currentTooltip.data('animation_duration') !== undefined ) ? $currentTooltip.data('animation_duration') : 300,
					$theme 			= ( $currentTooltip.data('theme') !== undefined ) ? $currentTooltip.data('theme') : 'default',
					$arrow			= ( 'yes' == $currentTooltip.data('arrow') ) ? true : false;

				$currentTooltip.tooltipster({
					animation: $animation,
					trigger: $tooltipTrigger,
					side: $tooltipSide,
					delay: $anim_duration,
					arrow: $arrow,
					theme: 'tooltipster-' + $theme
				});

			}
		}
	}

    var ProgressBar = function ($scope, $) {
        var $progressBar             = $scope.find('.eael-progress-bar-container').eq(0),
            $layout                  = ($progressBar.data("layout") !== undefined) ? $progressBar.data("layout") : '',
            $id                      = ($progressBar.data("id") !== undefined) ? $progressBar.data("id") : '',
            $number                  = ($progressBar.data("number") !== undefined) ? $progressBar.data("number") : '',
        
            $line_stroke_color            = ($progressBar.data("line-stroke-color")  !== undefined) ? $progressBar.data("line-stroke-color") : '',
            $line_stroke_width            = ($progressBar.data("line-stroke-width")  !== undefined) ? $progressBar.data("line-stroke-width") : '',
            $line_stroke_trail_color      = ($progressBar.data("line-stroke-trail-color")  !== undefined) ? $progressBar.data("line-stroke-trail-color") : '',
            $line_stroke_trail_width      = ($progressBar.data("line-stroke-trail-width")  !== undefined) ? $progressBar.data("line-stroke-trail-width") : '',
            $line_direction               = ($progressBar.data("line-direction")  !== undefined) ? $progressBar.data("line-direction") : '',

            $fan_stroke_color            = ($progressBar.data("fan-stroke-color")  !== undefined) ? $progressBar.data("fan-stroke-color") : '',
            $fan_stroke_width            = ($progressBar.data("fan-stroke-width")  !== undefined) ? $progressBar.data("fan-stroke-width") : '',
            $fan_stroke_trail_color      = ($progressBar.data("fan-stroke-trail-color")  !== undefined) ? $progressBar.data("fan-stroke-trail-color") : '',
            $fan_stroke_trail_width      = ($progressBar.data("fan-stroke-trail-width")  !== undefined) ? $progressBar.data("fan-stroke-trail-width") : '',
            $fan_direction               = ($progressBar.data("fan-direction")  !== undefined) ? $progressBar.data("fan-direction") : '',

            $circle_stroke_color            = ($progressBar.data("circle-stroke-color")  !== undefined) ? $progressBar.data("circle-stroke-color") : '',
            $circle_stroke_width            = ($progressBar.data("circle-stroke-width")  !== undefined) ? $progressBar.data("circle-stroke-width") : '',
            $circle_stroke_trail_color      = ($progressBar.data("circle-stroke-trail-color")  !== undefined) ? $progressBar.data("circle-stroke-trail-color") : '',
            $circle_stroke_trail_width      = ($progressBar.data("circle-stroke-trail-width")  !== undefined) ? $progressBar.data("circle-stroke-trail-width") : '',
            $circle_direction               = ($progressBar.data("circle-direction")  !== undefined) ? $progressBar.data("circle-direction") : '',

            $bubble_circle_color            = ($progressBar.data("bubble-circle-color")  !== undefined) ? $progressBar.data("bubble-circle-color") : '',
            $bubble_bg_color                = ($progressBar.data("bubble-bg-color")  !== undefined) ? $progressBar.data("bubble-bg-color") : '',
            $bubble_circle_width            = ($progressBar.data("bubble-circle-width")  !== undefined) ? $progressBar.data("bubble-circle-width") : '',
            $bubble_direction               = ($progressBar.data("bubble-direction")  !== undefined) ? $progressBar.data("bubble-direction") : '',

            $rainbow_stroke_width            = ($progressBar.data("rainbow-stroke-width")  !== undefined) ? $progressBar.data("rainbow-stroke-width") : '',
            $rainbow_stroke_trail_width      = ($progressBar.data("rainbow-stroke-trail-width")  !== undefined) ? $progressBar.data("rainbow-stroke-trail-width") : '',
            $rainbow_color_one               = ($progressBar.data("rainbow-color-one")  !== undefined) ? $progressBar.data("rainbow-color-one") : '',
            $rainbow_color_two               = ($progressBar.data("rainbow-color-two")  !== undefined) ? $progressBar.data("rainbow-color-two") : '',
            $rainbow_color_three             = ($progressBar.data("rainbow-color-three")  !== undefined) ? $progressBar.data("rainbow-color-three") : '',
            $rainbow_color_four              = ($progressBar.data("rainbow-color-four")  !== undefined) ? $progressBar.data("rainbow-color-four") : '',
            $rainbow_color_five              = ($progressBar.data("rainbow-color-five")  !== undefined) ? $progressBar.data("rainbow-color-five") : '',
            $rainbow_direction               = ($progressBar.data("rainbow-direction")  !== undefined) ? $progressBar.data("rainbow-direction") : '',

            $energy_start_color            = ($progressBar.data("energy-start-color")  !== undefined) ? $progressBar.data("energy-start-color") : '',
            $energy_end_color              = ($progressBar.data("energy-end-color")  !== undefined) ? $progressBar.data("energy-end-color") : '',
            $energy_bg_color               = ($progressBar.data("energy-bg-color")  !== undefined) ? $progressBar.data("energy-bg-color") : '',
            $energy_direction              = ($progressBar.data("energy-direction")  !== undefined) ? $progressBar.data("energy-direction") : '',

            $stripe_start_color            = ($progressBar.data("stripe-start-color")  !== undefined) ? $progressBar.data("stripe-start-color") : '',
            $stripe_end_color              = ($progressBar.data("stripe-end-color")  !== undefined) ? $progressBar.data("stripe-end-color") : '',
            $stripe_bg_color               = ($progressBar.data("stripe-bg-color")  !== undefined) ? $progressBar.data("stripe-bg-color") : '',
            $stripe_direction              = ($progressBar.data("stripe-direction")  !== undefined) ? $progressBar.data("stripe-direction") : '',
            
            $text_title                    = ($progressBar.data("text-title")  !== undefined) ? $progressBar.data("text-title") : '',
            $text_direction                = ($progressBar.data("text-direction")  !== undefined) ? $progressBar.data("text-direction") : '',
            $text_bg_color                 = ($progressBar.data("text-bg-color")  !== undefined) ? $progressBar.data("text-bg-color") : '';
             
            if('rainbow' == $layout){
                var bar = new ldBar("#myItem"+ $id, {
                    "type": 'stroke', 
                    "path": 'M0 10L100 10', 
                    "stroke": 'data:ldbar/res,gradient(0,1,'+ $rainbow_color_one +','+ $rainbow_color_two +','+ $rainbow_color_three +','+ $rainbow_color_four +','+ $rainbow_color_five +')',
                    "aspect-ratio": 'none', 
                    "stroke-width": $rainbow_stroke_width,
                    "stroke-trail-width": $rainbow_stroke_trail_width,
                    "stroke-dir": $rainbow_direction
                  }).set($number);
            }
            else if('energy' == $layout){
                var bar = new ldBar("#myItem"+ $id, {
                    "type": 'fill', 
                    "path": 'M15 5L85 5A5 5 0 0 1 85 15L15 15A5 5 0 0 1 15 5',
                    "stroke": '#f00',
                    "fill": 'data:ldbar/res,gradient(45,2,'+ $energy_start_color +','+ $energy_end_color +','+ $energy_start_color +')',
                    "fill-dir": $energy_direction,
                    "fill-background": $energy_bg_color,
                    "fill-background-extrude": 1 
                  }).set($number);
            }
            else if('stripe' == $layout){
                var bar = new ldBar("#myItem"+ $id, {
                    "type": 'fill',
                    "path": 'M15 5L85 5A5 5 0 0 1 85 15L15 15A5 5 0 0 1 15 5',
                    "stroke": '#f00',
                    "fill": 'data:ldbar/res,stripe('+ $stripe_start_color +','+ $stripe_end_color +',1)',
                    "fill-dir": $stripe_direction,
                    "fill-background":$stripe_bg_color,
                    "fill-background-extrude": 1
                  }).set($number);
            }
            else if('text' == $layout){
                var bar = new ldBar("#myItem"+ $id, {
                    "type": 'fill',
                    "img": 'data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"70\" height=\"20\" viewBox=\"0 0 70 20\"><text x=\"35\" y=\"10\" text-anchor=\"middle\" dominant-baseline=\"central\" font-family=\"arial\">'+ $text_title +'</text></svg>', //
                    "fill-background-extrude": 1.3,
                    "fill-background": $text_bg_color,
                    "pattern-size": 100, 
                    "fill-dir": $text_direction,
                    "img-size": "70,20" 
                  }).set($number);
            }
            else if('line' == $layout){
                var bar = new ldBar("#myItem"+ $id, {
                    "type": 'stroke',
                    "path": 'M0 10L100 10',
                    "stroke": $line_stroke_color,
                    "stroke-width": $line_stroke_width,
                    "stroke-trail": $line_stroke_trail_color,
                    "stroke-trail-width": $line_stroke_trail_width,
                    "aspect-ratio": 'none',
                    "stroke-dir": $line_direction 
                  }).set($number);
            }
            else if('fan' == $layout){
                var bar = new ldBar("#myItem"+ $id, {
                    "type": 'stroke',
                    "path": 'M10 90A40 40 0 0 1 90 90',
                    "fill-dir": $fan_direction,
                    "fill":  $fan_stroke_color, 
                    "fill-background": $fan_stroke_trail_color, 
                    "fill-background-extrude": $fan_stroke_width, 
                    "stroke-dir": 'normal',
                    "stroke": $fan_stroke_color,
                    "stroke-width": $fan_stroke_width,
                    "stroke-trail": $fan_stroke_trail_color,
                    "stroke-trail-width": $fan_stroke_trail_width
                  }).set($number);
            }
            else if('circle' == $layout){
                var bar = new ldBar("#myItem"+ $id, {
                    "type": 'stroke',
                    "path": 'M50 10A40 40 0 0 1 50 90A40 40 0 0 1 50 10',
                    "fill-dir": $circle_direction,
                    "fill":  $circle_stroke_color, 
                    "fill-background": $circle_stroke_trail_color, 
                    "fill-background-extrude": $circle_stroke_width, 
                    "stroke-dir": 'normal',
                    "stroke": $circle_stroke_color,
                    "stroke-width": $circle_stroke_width,
                    "stroke-trail": $circle_stroke_trail_color,
                    "stroke-trail-width": $circle_stroke_trail_width
                  }).set($number);
            }
            else if('bubble' == $layout){
                var bar = new ldBar("#myItem"+ $id, {
                    "type": 'fill',
                    "path": 'M50 10A40 40 0 0 1 50 90A40 40 0 0 1 50 10',
                    "fill-dir": $bubble_direction,
                    "fill": 'data:ldbar/res,bubble('+ $bubble_bg_color +','+ $bubble_circle_color +')',
                    "pattern-size": $bubble_circle_width,
                    "fill-background": '#ddd',
                    "fill-background-extrude": 2,
                    "stroke-dir": 'normal',
                    "stroke": '#25b',
                    "stroke-width": '3',
                    "stroke-trail": '#ddd',
                    "stroke-trail-width": 0.5
                  }).set($number);
            }
    }

	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-toggle.default', ToggleHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-counter.default', CounterHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-flip-carousel.default', FlipCarousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-filterable-gallery.default', FilterGallery);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-dynamic-filterable-gallery.default', FilterGallery);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-instafeed.default', InstagramGallery);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-adv-accordion.default', AdvAccordionHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-google-map.default', AdvGoogleMap);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-adv-tabs.default', AdvanceTabHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-post-timeline.default', postTimelineHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-post-list.default', postListHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-data-table.default', dataTable);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-content-timeline.default', contentTimelineHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-team-member-carousel.default', TeamMemberCarouselHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-image-hotspots.default', ImageHotspotHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-logo-carousel.default', LogoCarouselHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-post-carousel.default', PostCarouselHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-facebook-feed-carousel.default', FacebookCarouselHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-facebook-feed.default', FacebookFeedHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-twitter-feed.default', TwitterFeedHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-twitter-feed-carousel.default', TwitterFeedCarouselHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-testimonial-slider.default', TestimonialSliderHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-content-ticker.default', ContentTicker);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-image-comparison.default', ImageComparisonHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-mailchimp.default', MailChimp);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-lightbox.default', LightBox);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-countdown.default', CountDown);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-fancy-text.default', FancyText);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-image-accordion.default', ImageAccordion);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-interactive-card.default', InteractiveCard);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-pricing-table.default', PricingTooltip);
		elementorFrontend.hooks.addAction('frontend/element_ready/eael-progress-bar.default', ProgressBar);
	});
}(jQuery));