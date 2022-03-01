'use strict';

const MapModule = (function ($) {
	// var isLocal = location.hostname === '192.168.1.92';
	//
	// var markerImageDefaultURL = isLocal ?
	//     '/wp-content/themes/parasoft/dist/assets/images/circle817.png'
	//     : '/wp-content/themes/parasoft/dist/assets/images/circle817.png';
	var markerImageDefaultURL = '/wp-content/themes/parasoft/dist/assets/images/circle817.png';

	var headerHeight = $('#header').outerHeight();

	var windowW = window.innerWidth < 992;

	// Filters Marker Links - switch marker between categories
	var $filterMarkerLink = $('.marker-links-filter').find('a');

	var $mapLocations = $('.map-parasoft-locations');

	var $regionalDistributorsCountries = $('.view-partners-locations.view-display-id-block_1');
	var $regionalServiceProvidersCountries = $('.view-partners-locations.view-display-id-block_5');

	// Marker Links
	var $markerLink = $('.marker-links').find('a');

	var map;
	var geocoder;
	// Config Zoom
	var zoomOut, zoomIn, zoomInMarker = 9, zoomInCountry = 4;

	// Makers, marker pin image, center map
	var markers = [];
	var markerImage = '';

	var centerMap = {
		lat: '',
		lng: ''
	};

	// Message widget
	var infoWindowHTML = '<div class=\"infowindow-content\">' +
		'<h4 class=\"infowindow-title\">%infoTitle%</h4>' +
		'%infoContent%</div>';

	function _addListenerMarker(marker, infowindow) {
		marker.addListener('click', function () {
			map.setZoom(zoomInMarker);
			map.setCenter(marker.getPosition());
			infowindow.open(map, marker);
		});
	}

	function _createMarkers() {
		$.each($markerLink, function (key, linkItem) {
			markerImage = $(linkItem).attr('data-marker-image') || markerImage;

			var marker = new google.maps.Marker({
				name: $(linkItem).data('map-category'),
				country: $(linkItem).data('map-country') || '',
				position: {
					lat: Number($(linkItem).data('map-lat')),
					lng: Number($(linkItem).data('map-long'))
				},
				map: map,
				icon: markerImage
			});

			var infowindow = new google.maps.InfoWindow({
				content: infoWindowHTML
					.replace(
						'%infoTitle%',
						$(linkItem)
							.children('span').html())
					.replace('%infoContent%', $(linkItem)
						.next('.marker-link-desc').html())
			});

			markers.push(marker);

			_addListenerMarker(marker, infowindow);
		});
	}

	function _addListenerLinkMarker() {
		// check if marker link exist and filterMarkerLink is empty
		// when it's present filterMarkerLink we don't want to add listener to markerLinkList
		if ($markerLink.length > 0 && $filterMarkerLink.length == 0) {
			$markerLink.on('click', function (ev) {
				$(this).closest('li')
					.addClass('active')
					.siblings()
					.removeClass('active');

				if (windowW) {
					_scrollToMap();
				}

				ev.preventDefault();

				var myLatLng = {
					lat: $(this).data('map-lat') || centerMap.lat,
					lng: $(this).data('map-long') || centerMap.lng
				};

				map.setCenter(myLatLng);
				map.setZoom(zoomInMarker);
			});
		}
	}

	function _renderCountriesUI() {
		var $distributorsWrapper = $('.marker-links-filter').find('a[data-map-category="271"]');
		var $distributorsList = $regionalDistributorsCountries.find('.marker-links-filter-by-country');

		$distributorsWrapper.parent().append($distributorsList);

		var $providersWrapper = $('.marker-links-filter').find('a[data-map-category="266"]');
		var $providersList = $regionalServiceProvidersCountries.find('.marker-links-filter-by-country');

		$providersWrapper.parent().append($providersList);

	}

	function _addListenerFilterMarker() {
		$filterMarkerLink.on('click', function (ev) {
			ev.preventDefault();

			if ($(this).data('map-category')) {
				$(this).closest('li')
					.addClass('active')
					.siblings()
					.removeClass('active');
				if (windowW) {
					_scrollToMap();
				}

				if ($(this).data('map-category') === 'all') {
					var viewMap = $(this).closest('.view-offices-map');
					$(viewMap).find('.active').removeClass('active');
					_renderAllMarkers();
				} else {
					_removeMarkers($(this).data('map-category'));
					_renderFilteredMarkers($(this).data('map-category'));
				}
			}

			if ($(this).data('map-country')) {
				var categoryId = $(this).closest('.active').children('.marker-link-wrapper').children('a').data('map-category');
				_removeMarkersByCountry($(this).data('map-country'));
				_renderFilteredMarkersByCountry(categoryId, $(this).data('map-country'));
			}

			if ($(this).data('map-filter') === 'geocode') {
				_geocodeFilter(this);
			} else {
				map.setCenter(centerMap);
				map.setZoom(zoomOut);
			}
		});
	}

	function _scrollToMap() {
		var $target = $mapLocations;
		$('html, body').animate({
			scrollTop: $target.offset().top - headerHeight - 15
		}, 1000, function () {
			// Callback after animation
			// Must change focus!
			$target.focus();
			if ($target.is(':focus')) { // Checking if the target was focused
				return false;
			} else {
				$target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
				$target.focus(); // Set focus again
			}
		});
	}

	function _geocodeFilter(elem) {
		geocoder.geocode(
			{'address': $(elem).find('span').text().trim().toLowerCase()},
			function (results, status) {
				if (status === 'OK') {
					map.setCenter(results[0].geometry.location);
					map.setZoom(zoomInCountry);
				} else {
					// console.log('Geocode was not successful for the following reason: ' + status);
					map.setCenter(centerMap);
					map.setZoom(zoomOut);
				}
			}
		);
	}

	function _renderFilteredMarkersByCountry(categoryId, country) {
		var renderMarkers = markers.filter(function (marker, index) {
			return marker.country === country && marker.name === categoryId;
		});

		renderMarkers.forEach(function (marker, index) {
			marker.setMap(map);
		});

		map.setOptions({
			zoom: zoomOut,
		});
	}

	function _removeMarkersByCountry(country) {
		var deletedMarkers = markers.filter(function (marker, index) {
			return marker.country !== country;
		});

		deletedMarkers.forEach(function (marker, index) {
			marker.setMap(null);
		});
	}

	function _renderFilteredMarkers(category) {
		var renderMarkers = markers.filter(function (marker, index) {
			return marker.name === category;
		});

		renderMarkers.forEach(function (marker, index) {
			marker.setMap(map);
		});

		map.setOptions({
			zoom: zoomOut,
		});
	}

	function _removeMarkers(category) {
		var deletedMarkers = markers.filter(function (marker, index) {
			return marker.name !== category;
		});

		deletedMarkers.forEach(function (marker, index) {
			marker.setMap(null);
		});
	}

	function _renderAllMarkers() {
		markers.forEach(function (marker, index) {
			marker.setMap(map);
		});

		map.setOptions({
			zoom: zoomOut,
		});
	}

	function mantainInBounds() {
		var sLat = map.getBounds().getSouthWest().lat();
		var nLat = map.getBounds().getNorthEast().lat();
		if (sLat < -85 || nLat > 85) {
			map.setOptions({
				zoom: zoomOut,
				center: new google.maps.LatLng(centerMap.lat, centerMap.lng)
			});
		}
	}

	function _initMap(elem) {
		var $e = $(elem);

		//if element not exist, return
		if ($e.length === 0) {
			return;
		}

		//Default center
		centerMap.lat = parseFloat($e.attr('data-map-lat') || 14.280354);
		centerMap.lng = parseFloat($e.attr('data-map-long') || 15.974121);

		zoomOut = parseInt($e.attr('data-map-zoom-out') || 2);
		zoomIn = parseInt($e.attr('data-map-zoom-in') || 15);

		markerImage = $e.attr('data-marker-image') || markerImageDefaultURL;

		//Map start init
		var mapOptions = {
			center: new google.maps.LatLng(centerMap.lat, centerMap.lng),
			zoom: zoomOut,
			minZoom: 1,
			maxZoom: 16,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.DEFAULT,
			},
			disableDoubleClickZoom: false,
			mapTypeControl: false,
			scaleControl: true,
			scrollwheel: false,
			streetViewControl: false,
			draggable: true,
			overviewMapControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP,

			//color, lines, routes, water color
			styles: [
				{
					'featureType': 'administrative',
					'elementType': 'labels',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'administrative.country',
					'elementType': 'geometry.stroke',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'administrative.province',
					'elementType': 'geometry.stroke',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'landscape',
					'elementType': 'geometry',
					'stylers': [{'visibility': 'on'}, {'color': '#e3e3e3'}]
				}, {
					'featureType': 'landscape.natural',
					'elementType': 'labels',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'poi',
					'elementType': 'all',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'road',
					'elementType': 'all',
					'stylers': [{'color': '#ccc'}]
				}, {
					'featureType': 'road',
					'elementType': 'labels',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'transit',
					'elementType': 'labels.icon',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'transit.line',
					'elementType': 'geometry',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'transit.line',
					'elementType': 'labels.text',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'transit.station.airport',
					'elementType': 'geometry',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'transit.station.airport',
					'elementType': 'labels',
					'stylers': [{'visibility': 'off'}]
				}, {
					'featureType': 'water',
					'elementType': 'geometry',
					'stylers': [{'color': '#fff'}]
				}, {
					'featureType': 'water',
					'elementType': 'labels',
					'stylers': [{'visibility': 'off'}]
				}
			]
		};

		map = new google.maps.Map($e.get(0), mapOptions);
		geocoder = new google.maps.Geocoder();

		map.addListener('drag', mantainInBounds);
		_createMarkers();
	}

	_addListenerLinkMarker();
	_addListenerFilterMarker();

	if ($regionalDistributorsCountries && $regionalServiceProvidersCountries) {
		_renderCountriesUI();
	}

	return {
		init: _initMap
	};
})(jQuery);

window.initMap = function () {
	MapModule.init('.map-parasoft-locations');
};
