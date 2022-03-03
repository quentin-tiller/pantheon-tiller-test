/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 17);
/******/ })
/************************************************************************/
/******/ ({

/***/ 17:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(18);


/***/ }),

/***/ 18:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var MapModule = function ($) {
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
	var zoomOut,
	    zoomIn,
	    zoomInMarker = 9,
	    zoomInCountry = 4;

	// Makers, marker pin image, center map
	var markers = [];
	var markerImage = '';

	var centerMap = {
		lat: '',
		lng: ''
	};

	// Message widget
	var infoWindowHTML = '<div class=\"infowindow-content\">' + '<h4 class=\"infowindow-title\">%infoTitle%</h4>' + '%infoContent%</div>';

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
				content: infoWindowHTML.replace('%infoTitle%', $(linkItem).children('span').html()).replace('%infoContent%', $(linkItem).next('.marker-link-desc').html())
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
				$(this).closest('li').addClass('active').siblings().removeClass('active');

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
				$(this).closest('li').addClass('active').siblings().removeClass('active');
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
			if ($target.is(':focus')) {
				// Checking if the target was focused
				return false;
			} else {
				$target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
				$target.focus(); // Set focus again
			}
		});
	}

	function _geocodeFilter(elem) {
		geocoder.geocode({ 'address': $(elem).find('span').text().trim().toLowerCase() }, function (results, status) {
			if (status === 'OK') {
				map.setCenter(results[0].geometry.location);
				map.setZoom(zoomInCountry);
			} else {
				// console.log('Geocode was not successful for the following reason: ' + status);
				map.setCenter(centerMap);
				map.setZoom(zoomOut);
			}
		});
	}

	function _renderFilteredMarkersByCountry(categoryId, country) {
		var renderMarkers = markers.filter(function (marker, index) {
			return marker.country === country && marker.name === categoryId;
		});

		renderMarkers.forEach(function (marker, index) {
			marker.setMap(map);
		});

		map.setOptions({
			zoom: zoomOut
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
			zoom: zoomOut
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
			zoom: zoomOut
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
				style: google.maps.ZoomControlStyle.DEFAULT
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
			styles: [{
				'featureType': 'administrative',
				'elementType': 'labels',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'administrative.country',
				'elementType': 'geometry.stroke',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'administrative.province',
				'elementType': 'geometry.stroke',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'landscape',
				'elementType': 'geometry',
				'stylers': [{ 'visibility': 'on' }, { 'color': '#e3e3e3' }]
			}, {
				'featureType': 'landscape.natural',
				'elementType': 'labels',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'poi',
				'elementType': 'all',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'road',
				'elementType': 'all',
				'stylers': [{ 'color': '#ccc' }]
			}, {
				'featureType': 'road',
				'elementType': 'labels',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'transit',
				'elementType': 'labels.icon',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'transit.line',
				'elementType': 'geometry',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'transit.line',
				'elementType': 'labels.text',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'transit.station.airport',
				'elementType': 'geometry',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'transit.station.airport',
				'elementType': 'labels',
				'stylers': [{ 'visibility': 'off' }]
			}, {
				'featureType': 'water',
				'elementType': 'geometry',
				'stylers': [{ 'color': '#fff' }]
			}, {
				'featureType': 'water',
				'elementType': 'labels',
				'stylers': [{ 'visibility': 'off' }]
			}]
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
}(jQuery);

window.initMap = function () {
	MapModule.init('.map-parasoft-locations');
};

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgNTk5NzRhNmUxNGRmNjE3MGJiYWQiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9tYXAtbG9jYXRpb25zLmpzIl0sIm5hbWVzIjpbIk1hcE1vZHVsZSIsIiQiLCJtYXJrZXJJbWFnZURlZmF1bHRVUkwiLCJoZWFkZXJIZWlnaHQiLCJvdXRlckhlaWdodCIsIndpbmRvd1ciLCJ3aW5kb3ciLCJpbm5lcldpZHRoIiwiJGZpbHRlck1hcmtlckxpbmsiLCJmaW5kIiwiJG1hcExvY2F0aW9ucyIsIiRyZWdpb25hbERpc3RyaWJ1dG9yc0NvdW50cmllcyIsIiRyZWdpb25hbFNlcnZpY2VQcm92aWRlcnNDb3VudHJpZXMiLCIkbWFya2VyTGluayIsIm1hcCIsImdlb2NvZGVyIiwiem9vbU91dCIsInpvb21JbiIsInpvb21Jbk1hcmtlciIsInpvb21JbkNvdW50cnkiLCJtYXJrZXJzIiwibWFya2VySW1hZ2UiLCJjZW50ZXJNYXAiLCJsYXQiLCJsbmciLCJpbmZvV2luZG93SFRNTCIsIl9hZGRMaXN0ZW5lck1hcmtlciIsIm1hcmtlciIsImluZm93aW5kb3ciLCJhZGRMaXN0ZW5lciIsInNldFpvb20iLCJzZXRDZW50ZXIiLCJnZXRQb3NpdGlvbiIsIm9wZW4iLCJfY3JlYXRlTWFya2VycyIsImVhY2giLCJrZXkiLCJsaW5rSXRlbSIsImF0dHIiLCJnb29nbGUiLCJtYXBzIiwiTWFya2VyIiwibmFtZSIsImRhdGEiLCJjb3VudHJ5IiwicG9zaXRpb24iLCJOdW1iZXIiLCJpY29uIiwiSW5mb1dpbmRvdyIsImNvbnRlbnQiLCJyZXBsYWNlIiwiY2hpbGRyZW4iLCJodG1sIiwibmV4dCIsInB1c2giLCJfYWRkTGlzdGVuZXJMaW5rTWFya2VyIiwibGVuZ3RoIiwib24iLCJldiIsImNsb3Nlc3QiLCJhZGRDbGFzcyIsInNpYmxpbmdzIiwicmVtb3ZlQ2xhc3MiLCJfc2Nyb2xsVG9NYXAiLCJwcmV2ZW50RGVmYXVsdCIsIm15TGF0TG5nIiwiX3JlbmRlckNvdW50cmllc1VJIiwiJGRpc3RyaWJ1dG9yc1dyYXBwZXIiLCIkZGlzdHJpYnV0b3JzTGlzdCIsInBhcmVudCIsImFwcGVuZCIsIiRwcm92aWRlcnNXcmFwcGVyIiwiJHByb3ZpZGVyc0xpc3QiLCJfYWRkTGlzdGVuZXJGaWx0ZXJNYXJrZXIiLCJ2aWV3TWFwIiwiX3JlbmRlckFsbE1hcmtlcnMiLCJfcmVtb3ZlTWFya2VycyIsIl9yZW5kZXJGaWx0ZXJlZE1hcmtlcnMiLCJjYXRlZ29yeUlkIiwiX3JlbW92ZU1hcmtlcnNCeUNvdW50cnkiLCJfcmVuZGVyRmlsdGVyZWRNYXJrZXJzQnlDb3VudHJ5IiwiX2dlb2NvZGVGaWx0ZXIiLCIkdGFyZ2V0IiwiYW5pbWF0ZSIsInNjcm9sbFRvcCIsIm9mZnNldCIsInRvcCIsImZvY3VzIiwiaXMiLCJlbGVtIiwiZ2VvY29kZSIsInRleHQiLCJ0cmltIiwidG9Mb3dlckNhc2UiLCJyZXN1bHRzIiwic3RhdHVzIiwiZ2VvbWV0cnkiLCJsb2NhdGlvbiIsInJlbmRlck1hcmtlcnMiLCJmaWx0ZXIiLCJpbmRleCIsImZvckVhY2giLCJzZXRNYXAiLCJzZXRPcHRpb25zIiwiem9vbSIsImRlbGV0ZWRNYXJrZXJzIiwiY2F0ZWdvcnkiLCJtYW50YWluSW5Cb3VuZHMiLCJzTGF0IiwiZ2V0Qm91bmRzIiwiZ2V0U291dGhXZXN0IiwibkxhdCIsImdldE5vcnRoRWFzdCIsImNlbnRlciIsIkxhdExuZyIsIl9pbml0TWFwIiwiJGUiLCJwYXJzZUZsb2F0IiwicGFyc2VJbnQiLCJtYXBPcHRpb25zIiwibWluWm9vbSIsIm1heFpvb20iLCJ6b29tQ29udHJvbCIsInpvb21Db250cm9sT3B0aW9ucyIsInN0eWxlIiwiWm9vbUNvbnRyb2xTdHlsZSIsIkRFRkFVTFQiLCJkaXNhYmxlRG91YmxlQ2xpY2tab29tIiwibWFwVHlwZUNvbnRyb2wiLCJzY2FsZUNvbnRyb2wiLCJzY3JvbGx3aGVlbCIsInN0cmVldFZpZXdDb250cm9sIiwiZHJhZ2dhYmxlIiwib3ZlcnZpZXdNYXBDb250cm9sIiwibWFwVHlwZUlkIiwiTWFwVHlwZUlkIiwiUk9BRE1BUCIsInN0eWxlcyIsIk1hcCIsImdldCIsIkdlb2NvZGVyIiwiaW5pdCIsImpRdWVyeSIsImluaXRNYXAiXSwibWFwcGluZ3MiOiI7QUFBQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBSztBQUNMO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsbUNBQTJCLDBCQUEwQixFQUFFO0FBQ3ZELHlDQUFpQyxlQUFlO0FBQ2hEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLDhEQUFzRCwrREFBK0Q7O0FBRXJIO0FBQ0E7O0FBRUE7QUFDQTs7Ozs7Ozs7Ozs7Ozs7Ozs7QUM3REE7O0FBRUEsSUFBTUEsWUFBYSxVQUFVQyxDQUFWLEVBQWE7QUFDL0I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUlDLHdCQUF3Qiw4REFBNUI7O0FBRUEsS0FBSUMsZUFBZUYsRUFBRSxTQUFGLEVBQWFHLFdBQWIsRUFBbkI7O0FBRUEsS0FBSUMsVUFBVUMsT0FBT0MsVUFBUCxHQUFvQixHQUFsQzs7QUFFQTtBQUNBLEtBQUlDLG9CQUFvQlAsRUFBRSxzQkFBRixFQUEwQlEsSUFBMUIsQ0FBK0IsR0FBL0IsQ0FBeEI7O0FBRUEsS0FBSUMsZ0JBQWdCVCxFQUFFLHlCQUFGLENBQXBCOztBQUVBLEtBQUlVLGlDQUFpQ1YsRUFBRSxrREFBRixDQUFyQztBQUNBLEtBQUlXLHFDQUFxQ1gsRUFBRSxrREFBRixDQUF6Qzs7QUFFQTtBQUNBLEtBQUlZLGNBQWNaLEVBQUUsZUFBRixFQUFtQlEsSUFBbkIsQ0FBd0IsR0FBeEIsQ0FBbEI7O0FBRUEsS0FBSUssR0FBSjtBQUNB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QUFJeUIsT0FBT0MsSUFBUCxDQUFZa0csR0FBaEIsQ0FBb0J0QixHQUFHdUIsR0FBSCxDQUFPLENBQVAsQ0FBcEIsRUFBK0JwQixVQUEvQixDQUFOO0FBQ0F4RyxhQUFXLElBQUl3QixPQUFPQyxJQUFQLENBQVlvRyxRQUFoQixFQUFYOztBQUVBOUgsTUFBSWUsV0FBSixDQUFnQixNQUFoQixFQUF3QjhFLGVBQXhCO0FBQ0F6RTtBQUNBOztBQUVEcUI7QUFDQWtCOztBQUVBLEtBQUk5RCxrQ0FBa0NDLGtDQUF0QyxFQUEwRTtBQUN6RXNEO0FBQ0E7O0FBRUQsUUFBTztBQUNOMkUsUUFBTTFCO0FBREEsRUFBUDtBQUdBLENBNVhpQixDQTRYZjJCLE1BNVhlLENBQWxCOztBQThYQXhJLE9BQU95SSxPQUFQLEdBQWlCLFlBQVk7QUFDNUIvSSxXQUFVNkksSUFBVixDQUFlLHlCQUFmO0FBQ0EsQ0FGRCxDIiwiZmlsZSI6Im1hcC1sb2NhdGlvbnMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCJcIjtcblxuIFx0Ly8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4gXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhfX3dlYnBhY2tfcmVxdWlyZV9fLnMgPSAxNyk7XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gd2VicGFjay9ib290c3RyYXAgNTk5NzRhNmUxNGRmNjE3MGJiYWQiLCIndXNlIHN0cmljdCc7XG5cbmNvbnN0IE1hcE1vZHVsZSA9IChmdW5jdGlvbiAoJCkge1xuXHQvLyB2YXIgaXNMb2NhbCA9IGxvY2F0aW9uLmhvc3RuYW1lID09PSAnMTkyLjE2OC4xLjkyJztcblx0Ly9cblx0Ly8gdmFyIG1hcmtlckltYWdlRGVmYXVsdFVSTCA9IGlzTG9jYWwgP1xuXHQvLyAgICAgJy93cC1jb250ZW50L3RoZW1lcy9wYXJhc29mdC9kaXN0L2Fzc2V0cy9pbWFnZXMvY2lyY2xlODE3LnBuZydcblx0Ly8gICAgIDogJy93cC1jb250ZW50L3RoZW1lcy9wYXJhc29mdC9kaXN0L2Fzc2V0cy9pbWFnZXMvY2lyY2xlODE3LnBuZyc7XG5cdHZhciBtYXJrZXJJbWFnZURlZmF1bHRVUkwgPSAnL3dwLWNvbnRlbnQvdGhlbWVzL3BhcmFzb2Z0L2Rpc3QvYXNzZXRzL2ltYWdlcy9jaXJjbGU4MTcucG5nJztcblxuXHR2YXIgaGVhZGVySGVpZ2h0ID0gJCgnI2hlYWRlcicpLm91dGVySGVpZ2h0KCk7XG5cblx0dmFyIHdpbmRvd1cgPSB3aW5kb3cuaW5uZXJXaWR0aCA8IDk5MjtcblxuXHQvLyBGaWx0ZXJzIE1hcmtlciBMaW5rcyAtIHN3aXRjaCBtYXJrZXIgYmV0d2VlbiBjYXRlZ29yaWVzXG5cdHZhciAkZmlsdGVyTWFya2VyTGluayA9ICQoJy5tYXJrZXItbGlua3MtZmlsdGVyJykuZmluZCgnYScpO1xuXG5cdHZhciAkbWFwTG9jYXRpb25zID0gJCgnLm1hcC1wYXJhc29mdC1sb2NhdGlvbnMnKTtcblxuXHR2YXIgJHJlZ2lvbmFsRGlzdHJpYnV0b3JzQ291bnRyaWVzID0gJCgnLnZpZXctcGFydG5lcnMtbG9jYXRpb25zLnZpZXctZGlzcGxheS1pZC1ibG9ja18xJyk7XG5cdHZhciAkcmVnaW9uYWxTZXJ2aWNlUHJvdmlkZXJzQ291bnRyaWVzID0gJCgnLnZpZXctcGFydG5lcnMtbG9jYXRpb25zLnZpZXctZGlzcGxheS1pZC1ibG9ja181Jyk7XG5cblx0Ly8gTWFya2VyIExpbmtzXG5cdHZhciAkbWFya2VyTGluayA9ICQoJy5tYXJrZXItbGlua3MnKS5maW5kKCdhJyk7XG5cblx0dmFyIG1hcDtcblx0dmFyIGdlb2NvZGVyO1xuXHQvLyBDb25maWcgWm9vbVxuXHR2YXIgem9vbU91dCwgem9vbUluLCB6b29tSW5NYXJrZXIgPSA5LCB6b29tSW5Db3VudHJ5ID0gNDtcblxuXHQvLyBNYWtlcnMsIG1hcmtlciBwaW4gaW1hZ2UsIGNlbnRlciBtYXBcblx0dmFyIG1hcmtlcnMgPSBbXTtcblx0dmFyIG1hcmtlckltYWdlID0gJyc7XG5cblx0dmFyIGNlbnRlck1hcCA9IHtcblx0XHRsYXQ6ICcnLFxuXHRcdGxuZzogJydcblx0fTtcblxuXHQvLyBNZXNzYWdlIHdpZGdldFxuXHR2YXIgaW5mb1dpbmRvd0hUTUwgPSAnPGRpdiBjbGFzcz1cXFwiaW5mb3dpbmRvdy1jb250ZW50XFxcIj4nICtcblx0XHQnPGg0IGNsYXNzPVxcXCJpbmZvd2luZG93LXRpdGxlXFxcIj4laW5mb1RpdGxlJTwvaDQ+JyArXG5cdFx0JyVpbmZvQ29udGVudCU8L2Rpdj4nO1xuXG5cdGZ1bmN0aW9uIF9hZGRMaXN0ZW5lck1hcmtlcihtYXJrZXIsIGluZm93aW5kb3cpIHtcblx0XHRtYXJrZXIuYWRkTGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuXHRcdFx0bWFwLnNldFpvb20oem9vbUluTWFya2VyKTtcblx0XHRcdG1hcC5zZXRDZW50ZXIobWFya2VyLmdldFBvc2l0aW9uKCkpO1xuXHRcdFx0aW5mb3dpbmRvdy5vcGVuKG1hcCwgbWFya2VyKTtcblx0XHR9KTtcblx0fVxuXG5cdGZ1bmN0aW9uIF9jcmVhdGVNYXJrZXJzKCkge1xuXHRcdCQuZWFjaCgkbWFya2VyTGluaywgZnVuY3Rpb24gKGtleSwgbGlua0l0ZW0pIHtcblx0XHRcdG1hcmtlckltYWdlID0gJChsaW5rSXRlbSkuYXR0cignZGF0YS1tYXJrZXItaW1hZ2UnKSB8fCBtYXJrZXJJbWFnZTtcblxuXHRcdFx0dmFyIG1hcmtlciA9IG5ldyBnb29nbGUubWFwcy5NYXJrZXIoe1xuXHRcdFx0XHRuYW1lOiAkKGxpbmtJdGVtKS5kYXRhKCdtYXAtY2F0ZWdvcnknKSxcblx0XHRcdFx0Y291bnRyeTogJChsaW5rSXRlbSkuZGF0YSgnbWFwLWNvdW50cnknKSB8fCAnJyxcblx0XHRcdFx0cG9zaXRpb246IHtcblx0XHRcdFx0XHRsYXQ6IE51bWJlcigkKGxpbmtJdGVtKS5kYXRhKCdtYXAtbGF0JykpLFxuXHRcdFx0XHRcdGxuZzogTnVtYmVyKCQobGlua0l0ZW0pLmRhdGEoJ21hcC1sb25nJykpXG5cdFx0XHRcdH0sXG5cdFx0XHRcdG1hcDogbWFwLFxuXHRcdFx0XHRpY29uOiBtYXJrZXJJbWFnZVxuXHRcdFx0fSk7XG5cblx0XHRcdHZhciBpbmZvd2luZG93ID0gbmV3IGdvb2dsZS5tYXBzLkluZm9XaW5kb3coe1xuXHRcdFx0XHRjb250ZW50OiBpbmZvV2luZG93SFRNTFxuXHRcdFx0XHRcdC5yZXBsYWNlKFxuXHRcdFx0XHRcdFx0JyVpbmZvVGl0bGUlJyxcblx0XHRcdFx0XHRcdCQobGlua0l0ZW0pXG5cdFx0XHRcdFx0XHRcdC5jaGlsZHJlbignc3BhbicpLmh0bWwoKSlcblx0XHRcdFx0XHQucmVwbGFjZSgnJWluZm9Db250ZW50JScsICQobGlua0l0ZW0pXG5cdFx0XHRcdFx0XHQubmV4dCgnLm1hcmtlci1saW5rLWRlc2MnKS5odG1sKCkpXG5cdFx0XHR9KTtcblxuXHRcdFx0bWFya2Vycy5wdXNoKG1hcmtlcik7XG5cblx0XHRcdF9hZGRMaXN0ZW5lck1hcmtlcihtYXJrZXIsIGluZm93aW5kb3cpO1xuXHRcdH0pO1xuXHR9XG5cblx0ZnVuY3Rpb24gX2FkZExpc3RlbmVyTGlua01hcmtlcigpIHtcblx0XHQvLyBjaGVjayBpZiBtYXJrZXIgbGluayBleGlzdCBhbmQgZmlsdGVyTWFya2VyTGluayBpcyBlbXB0eVxuXHRcdC8vIHdoZW4gaXQncyBwcmVzZW50IGZpbHRlck1hcmtlckxpbmsgd2UgZG9uJ3Qgd2FudCB0byBhZGQgbGlzdGVuZXIgdG8gbWFya2VyTGlua0xpc3Rcblx0XHRpZiAoJG1hcmtlckxpbmsubGVuZ3RoID4gMCAmJiAkZmlsdGVyTWFya2VyTGluay5sZW5ndGggPT0gMCkge1xuXHRcdFx0JG1hcmtlckxpbmsub24oJ2NsaWNrJywgZnVuY3Rpb24gKGV2KSB7XG5cdFx0XHRcdCQodGhpcykuY2xvc2VzdCgnbGknKVxuXHRcdFx0XHRcdC5hZGRDbGFzcygnYWN0aXZlJylcblx0XHRcdFx0XHQuc2libGluZ3MoKVxuXHRcdFx0XHRcdC5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG5cblx0XHRcdFx0aWYgKHdpbmRvd1cpIHtcblx0XHRcdFx0XHRfc2Nyb2xsVG9NYXAoKTtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGV2LnByZXZlbnREZWZhdWx0KCk7XG5cblx0XHRcdFx0dmFyIG15TGF0TG5nID0ge1xuXHRcdFx0XHRcdGxhdDogJCh0aGlzKS5kYXRhKCdtYXAtbGF0JykgfHwgY2VudGVyTWFwLmxhdCxcblx0XHRcdFx0XHRsbmc6ICQodGhpcykuZGF0YSgnbWFwLWxvbmcnKSB8fCBjZW50ZXJNYXAubG5nXG5cdFx0XHRcdH07XG5cblx0XHRcdFx0bWFwLnNldENlbnRlcihteUxhdExuZyk7XG5cdFx0XHRcdG1hcC5zZXRab29tKHpvb21Jbk1hcmtlcik7XG5cdFx0XHR9KTtcblx0XHR9XG5cdH1cblxuXHRmdW5jdGlvbiBfcmVuZGVyQ291bnRyaWVzVUkoKSB7XG5cdFx0dmFyICRkaXN0cmlidXRvcnNXcmFwcGVyID0gJCgnLm1hcmtlci1saW5rcy1maWx0ZXInKS5maW5kKCdhW2RhdGEtbWFwLWNhdGVnb3J5PVwiMjcxXCJdJyk7XG5cdFx0dmFyICRkaXN0cmlidXRvcnNMaXN0ID0gJHJlZ2lvbmFsRGlzdHJpYnV0b3JzQ291bnRyaWVzLmZpbmQoJy5tYXJrZXItbGlua3MtZmlsdGVyLWJ5LWNvdW50cnknKTtcblxuXHRcdCRkaXN0cmlidXRvcnNXcmFwcGVyLnBhcmVudCgpLmFwcGVuZCgkZGlzdHJpYnV0b3JzTGlzdCk7XG5cblx0XHR2YXIgJHByb3ZpZGVyc1dyYXBwZXIgPSAkKCcubWFya2VyLWxpbmtzLWZpbHRlcicpLmZpbmQoJ2FbZGF0YS1tYXAtY2F0ZWdvcnk9XCIyNjZcIl0nKTtcblx0XHR2YXIgJHByb3ZpZGVyc0xpc3QgPSAkcmVnaW9uYWxTZXJ2aWNlUHJvdmlkZXJzQ291bnRyaWVzLmZpbmQoJy5tYXJrZXItbGlua3MtZmlsdGVyLWJ5LWNvdW50cnknKTtcblxuXHRcdCRwcm92aWRlcnNXcmFwcGVyLnBhcmVudCgpLmFwcGVuZCgkcHJvdmlkZXJzTGlzdCk7XG5cblx0fVxuXG5cdGZ1bmN0aW9uIF9hZGRMaXN0ZW5lckZpbHRlck1hcmtlcigpIHtcblx0XHQkZmlsdGVyTWFya2VyTGluay5vbignY2xpY2snLCBmdW5jdGlvbiAoZXYpIHtcblx0XHRcdGV2LnByZXZlbnREZWZhdWx0KCk7XG5cblx0XHRcdGlmICgkKHRoaXMpLmRhdGEoJ21hcC1jYXRlZ29yeScpKSB7XG5cdFx0XHRcdCQodGhpcykuY2xvc2VzdCgnbGknKVxuXHRcdFx0XHRcdC5hZGRDbGFzcygnYWN0aXZlJylcblx0XHRcdFx0XHQuc2libGluZ3MoKVxuXHRcdFx0XHRcdC5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG5cdFx0XHRcdGlmICh3aW5kb3dXKSB7XG5cdFx0XHRcdFx0X3Njcm9sbFRvTWFwKCk7XG5cdFx0XHRcdH1cblxuXHRcdFx0XHRpZiAoJCh0aGlzKS5kYXRhKCdtYXAtY2F0ZWdvcnknKSA9PT0gJ2FsbCcpIHtcblx0XHRcdFx0XHR2YXIgdmlld01hcCA9ICQodGhpcykuY2xvc2VzdCgnLnZpZXctb2ZmaWNlcy1tYXAnKTtcblx0XHRcdFx0XHQkKHZpZXdNYXApLmZpbmQoJy5hY3RpdmUnKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG5cdFx0XHRcdFx0X3JlbmRlckFsbE1hcmtlcnMoKTtcblx0XHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0XHRfcmVtb3ZlTWFya2VycygkKHRoaXMpLmRhdGEoJ21hcC1jYXRlZ29yeScpKTtcblx0XHRcdFx0XHRfcmVuZGVyRmlsdGVyZWRNYXJrZXJzKCQodGhpcykuZGF0YSgnbWFwLWNhdGVnb3J5JykpO1xuXHRcdFx0XHR9XG5cdFx0XHR9XG5cblx0XHRcdGlmICgkKHRoaXMpLmRhdGEoJ21hcC1jb3VudHJ5JykpIHtcblx0XHRcdFx0dmFyIGNhdGVnb3J5SWQgPSAkKHRoaXMpLmNsb3Nlc3QoJy5hY3RpdmUnKS5jaGlsZHJlbignLm1hcmtlci1saW5rLXdyYXBwZXInKS5jaGlsZHJlbignYScpLmRhdGEoJ21hcC1jYXRlZ29yeScpO1xuXHRcdFx0XHRfcmVtb3ZlTWFya2Vyc0J5Q291bnRyeSgkKHRoaXMpLmRhdGEoJ21hcC1jb3VudHJ5JykpO1xuXHRcdFx0XHRfcmVuZGVyRmlsdGVyZWRNYXJrZXJzQnlDb3VudHJ5KGNhdGVnb3J5SWQsICQodGhpcykuZGF0YSgnbWFwLWNvdW50cnknKSk7XG5cdFx0XHR9XG5cblx0XHRcdGlmICgkKHRoaXMpLmRhdGEoJ21hcC1maWx0ZXInKSA9PT0gJ2dlb2NvZGUnKSB7XG5cdFx0XHRcdF9nZW9jb2RlRmlsdGVyKHRoaXMpO1xuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0bWFwLnNldENlbnRlcihjZW50ZXJNYXApO1xuXHRcdFx0XHRtYXAuc2V0Wm9vbSh6b29tT3V0KTtcblx0XHRcdH1cblx0XHR9KTtcblx0fVxuXG5cdGZ1bmN0aW9uIF9zY3JvbGxUb01hcCgpIHtcblx0XHR2YXIgJHRhcmdldCA9ICRtYXBMb2NhdGlvbnM7XG5cdFx0JCgnaHRtbCwgYm9keScpLmFuaW1hdGUoe1xuXHRcdFx0c2Nyb2xsVG9wOiAkdGFyZ2V0Lm9mZnNldCgpLnRvcCAtIGhlYWRlckhlaWdodCAtIDE1XG5cdFx0fSwgMTAwMCwgZnVuY3Rpb24gKCkge1xuXHRcdFx0Ly8gQ2FsbGJhY2sgYWZ0ZXIgYW5pbWF0aW9uXG5cdFx0XHQvLyBNdXN0IGNoYW5nZSBmb2N1cyFcblx0XHRcdCR0YXJnZXQuZm9jdXMoKTtcblx0XHRcdGlmICgkdGFyZ2V0LmlzKCc6Zm9jdXMnKSkgeyAvLyBDaGVja2luZyBpZiB0aGUgdGFyZ2V0IHdhcyBmb2N1c2VkXG5cdFx0XHRcdHJldHVybiBmYWxzZTtcblx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdCR0YXJnZXQuYXR0cigndGFiaW5kZXgnLCAnLTEnKTsgLy8gQWRkaW5nIHRhYmluZGV4IGZvciBlbGVtZW50cyBub3QgZm9jdXNhYmxlXG5cdFx0XHRcdCR0YXJnZXQuZm9jdXMoKTsgLy8gU2V0IGZvY3VzIGFnYWluXG5cdFx0XHR9XG5cdFx0fSk7XG5cdH1cblxuXHRmdW5jdGlvbiBfZ2VvY29kZUZpbHRlcihlbGVtKSB7XG5cdFx0Z2VvY29kZXIuZ2VvY29kZShcblx0XHRcdHsnYWRkcmVzcyc6ICQoZWxlbSkuZmluZCgnc3BhbicpLnRleHQoKS50cmltKCkudG9Mb3dlckNhc2UoKX0sXG5cdFx0XHRmdW5jdGlvbiAocmVzdWx0cywgc3RhdHVzKSB7XG5cdFx0XHRcdGlmIChzdGF0dXMgPT09ICdPSycpIHtcblx0XHRcdFx0XHRtYXAuc2V0Q2VudGVyKHJlc3VsdHNbMF0uZ2VvbWV0cnkubG9jYXRpb24pO1xuXHRcdFx0XHRcdG1hcC5zZXRab29tKHpvb21JbkNvdW50cnkpO1xuXHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdC8vIGNvbnNvbGUubG9nKCdHZW9jb2RlIHdhcyBub3Qgc3VjY2Vzc2Z1bCBmb3IgdGhlIGZvbGxvd2luZyByZWFzb246ICcgKyBzdGF0dXMpO1xuXHRcdFx0XHRcdG1hcC5zZXRDZW50ZXIoY2VudGVyTWFwKTtcblx0XHRcdFx0XHRtYXAuc2V0Wm9vbSh6b29tT3V0KTtcblx0XHRcdFx0fVxuXHRcdFx0fVxuXHRcdCk7XG5cdH1cblxuXHRmdW5jdGlvbiBfcmVuZGVyRmlsdGVyZWRNYXJrZXJzQnlDb3VudHJ5KGNhdGVnb3J5SWQsIGNvdW50cnkpIHtcblx0XHR2YXIgcmVuZGVyTWFya2VycyA9IG1hcmtlcnMuZmlsdGVyKGZ1bmN0aW9uIChtYXJrZXIsIGluZGV4KSB7XG5cdFx0XHRyZXR1cm4gbWFya2VyLmNvdW50cnkgPT09IGNvdW50cnkgJiYgbWFya2VyLm5hbWUgPT09IGNhdGVnb3J5SWQ7XG5cdFx0fSk7XG5cblx0XHRyZW5kZXJNYXJrZXJzLmZvckVhY2goZnVuY3Rpb24gKG1hcmtlciwgaW5kZXgpIHtcblx0XHRcdG1hcmtlci5zZXRNYXAobWFwKTtcblx0XHR9KTtcblxuXHRcdG1hcC5zZXRPcHRpb25zKHtcblx0XHRcdHpvb206IHpvb21PdXQsXG5cdFx0fSk7XG5cdH1cblxuXHRmdW5jdGlvbiBfcmVtb3ZlTWFya2Vyc0J5Q291bnRyeShjb3VudHJ5KSB7XG5cdFx0dmFyIGRlbGV0ZWRNYXJrZXJzID0gbWFya2Vycy5maWx0ZXIoZnVuY3Rpb24gKG1hcmtlciwgaW5kZXgpIHtcblx0XHRcdHJldHVybiBtYXJrZXIuY291bnRyeSAhPT0gY291bnRyeTtcblx0XHR9KTtcblxuXHRcdGRlbGV0ZWRNYXJrZXJzLmZvckVhY2goZnVuY3Rpb24gKG1hcmtlciwgaW5kZXgpIHtcblx0XHRcdG1hcmtlci5zZXRNYXAobnVsbCk7XG5cdFx0fSk7XG5cdH1cblxuXHRmdW5jdGlvbiBfcmVuZGVyRmlsdGVyZWRNYXJrZXJzKGNhdGVnb3J5KSB7XG5cdFx0dmFyIHJlbmRlck1hcmtlcnMgPSBtYXJrZXJzLmZpbHRlcihmdW5jdGlvbiAobWFya2VyLCBpbmRleCkge1xuXHRcdFx0cmV0dXJuIG1hcmtlci5uYW1lID09PSBjYXRlZ29yeTtcblx0XHR9KTtcblxuXHRcdHJlbmRlck1hcmtlcnMuZm9yRWFjaChmdW5jdGlvbiAobWFya2VyLCBpbmRleCkge1xuXHRcdFx0bWFya2VyLnNldE1hcChtYXApO1xuXHRcdH0pO1xuXG5cdFx0bWFwLnNldE9wdGlvbnMoe1xuXHRcdFx0em9vbTogem9vbU91dCxcblx0XHR9KTtcblx0fVxuXG5cdGZ1bmN0aW9uIF9yZW1vdmVNYXJrZXJzKGNhdGVnb3J5KSB7XG5cdFx0dmFyIGRlbGV0ZWRNYXJrZXJzID0gbWFya2Vycy5maWx0ZXIoZnVuY3Rpb24gKG1hcmtlciwgaW5kZXgpIHtcblx0XHRcdHJldHVybiBtYXJrZXIubmFtZSAhPT0gY2F0ZWdvcnk7XG5cdFx0fSk7XG5cblx0XHRkZWxldGVkTWFya2Vycy5mb3JFYWNoKGZ1bmN0aW9uIChtYXJrZXIsIGluZGV4KSB7XG5cdFx0XHRtYXJrZXIuc2V0TWFwKG51bGwpO1xuXHRcdH0pO1xuXHR9XG5cblx0ZnVuY3Rpb24gX3JlbmRlckFsbE1hcmtlcnMoKSB7XG5cdFx0bWFya2Vycy5mb3JFYWNoKGZ1bmN0aW9uIChtYXJrZXIsIGluZGV4KSB7XG5cdFx0XHRtYXJrZXIuc2V0TWFwKG1hcCk7XG5cdFx0fSk7XG5cblx0XHRtYXAuc2V0T3B0aW9ucyh7XG5cdFx0XHR6b29tOiB6b29tT3V0LFxuXHRcdH0pO1xuXHR9XG5cblx0ZnVuY3Rpb24gbWFudGFpbkluQm91bmRzKCkge1xuXHRcdHZhciBzTGF0ID0gbWFwLmdldEJvdW5kcygpLmdldFNvdXRoV2VzdCgpLmxhdCgpO1xuXHRcdHZhciBuTGF0ID0gbWFwLmdldEJvdW5kcygpLmdldE5vcnRoRWFzdCgpLmxhdCgpO1xuXHRcdGlmIChzTGF0IDwgLTg1IHx8IG5MYXQgPiA4NSkge1xuXHRcdFx0bWFwLnNldE9wdGlvbnMoe1xuXHRcdFx0XHR6b29tOiB6b29tT3V0LFxuXHRcdFx0XHRjZW50ZXI6IG5ldyBnb29nbGUubWFwcy5MYXRMbmcoY2VudGVyTWFwLmxhdCwgY2VudGVyTWFwLmxuZylcblx0XHRcdH0pO1xuXHRcdH1cblx0fVxuXG5cdGZ1bmN0aW9uIF9pbml0TWFwKGVsZW0pIHtcblx0XHR2YXIgJGUgPSAkKGVsZW0pO1xuXG5cdFx0Ly9pZiBlbGVtZW50IG5vdCBleGlzdCwgcmV0dXJuXG5cdFx0aWYgKCRlLmxlbmd0aCA9PT0gMCkge1xuXHRcdFx0cmV0dXJuO1xuXHRcdH1cblxuXHRcdC8vRGVmYXVsdCBjZW50ZXJcblx0XHRjZW50ZXJNYXAubGF0ID0gcGFyc2VGbG9hdCgkZS5hdHRyKCdkYXRhLW1hcC1sYXQnKSB8fCAxNC4yODAzNTQpO1xuXHRcdGNlbnRlck1hcC5sbmcgPSBwYXJzZUZsb2F0KCRlLmF0dHIoJ2RhdGEtbWFwLWxvbmcnKSB8fCAxNS45NzQxMjEpO1xuXG5cdFx0em9vbU91dCA9IHBhcnNlSW50KCRlLmF0dHIoJ2RhdGEtbWFwLXpvb20tb3V0JykgfHwgMik7XG5cdFx0em9vbUluID0gcGFyc2VJbnQoJGUuYXR0cignZGF0YS1tYXAtem9vbS1pbicpIHx8IDE1KTtcblxuXHRcdG1hcmtlckltYWdlID0gJGUuYXR0cignZGF0YS1tYXJrZXItaW1hZ2UnKSB8fCBtYXJrZXJJbWFnZURlZmF1bHRVUkw7XG5cblx0XHQvL01hcCBzdGFydCBpbml0XG5cdFx0dmFyIG1hcE9wdGlvbnMgPSB7XG5cdFx0XHRjZW50ZXI6IG5ldyBnb29nbGUubWFwcy5MYXRMbmcoY2VudGVyTWFwLmxhdCwgY2VudGVyTWFwLmxuZyksXG5cdFx0XHR6b29tOiB6b29tT3V0LFxuXHRcdFx0bWluWm9vbTogMSxcblx0XHRcdG1heFpvb206IDE2LFxuXHRcdFx0em9vbUNvbnRyb2w6IHRydWUsXG5cdFx0XHR6b29tQ29udHJvbE9wdGlvbnM6IHtcblx0XHRcdFx0c3R5bGU6IGdvb2dsZS5tYXBzLlpvb21Db250cm9sU3R5bGUuREVGQVVMVCxcblx0XHRcdH0sXG5cdFx0XHRkaXNhYmxlRG91YmxlQ2xpY2tab29tOiBmYWxzZSxcblx0XHRcdG1hcFR5cGVDb250cm9sOiBmYWxzZSxcblx0XHRcdHNjYWxlQ29udHJvbDogdHJ1ZSxcblx0XHRcdHNjcm9sbHdoZWVsOiBmYWxzZSxcblx0XHRcdHN0cmVldFZpZXdDb250cm9sOiBmYWxzZSxcblx0XHRcdGRyYWdnYWJsZTogdHJ1ZSxcblx0XHRcdG92ZXJ2aWV3TWFwQ29udHJvbDogZmFsc2UsXG5cdFx0XHRtYXBUeXBlSWQ6IGdvb2dsZS5tYXBzLk1hcFR5cGVJZC5ST0FETUFQLFxuXG5cdFx0XHQvL2NvbG9yLCBsaW5lcywgcm91dGVzLCB3YXRlciBjb2xvclxuXHRcdFx0c3R5bGVzOiBbXG5cdFx0XHRcdHtcblx0XHRcdFx0XHQnZmVhdHVyZVR5cGUnOiAnYWRtaW5pc3RyYXRpdmUnLFxuXHRcdFx0XHRcdCdlbGVtZW50VHlwZSc6ICdsYWJlbHMnLFxuXHRcdFx0XHRcdCdzdHlsZXJzJzogW3sndmlzaWJpbGl0eSc6ICdvZmYnfV1cblx0XHRcdFx0fSwge1xuXHRcdFx0XHRcdCdmZWF0dXJlVHlwZSc6ICdhZG1pbmlzdHJhdGl2ZS5jb3VudHJ5Jyxcblx0XHRcdFx0XHQnZWxlbWVudFR5cGUnOiAnZ2VvbWV0cnkuc3Ryb2tlJyxcblx0XHRcdFx0XHQnc3R5bGVycyc6IFt7J3Zpc2liaWxpdHknOiAnb2ZmJ31dXG5cdFx0XHRcdH0sIHtcblx0XHRcdFx0XHQnZmVhdHVyZVR5cGUnOiAnYWRtaW5pc3RyYXRpdmUucHJvdmluY2UnLFxuXHRcdFx0XHRcdCdlbGVtZW50VHlwZSc6ICdnZW9tZXRyeS5zdHJva2UnLFxuXHRcdFx0XHRcdCdzdHlsZXJzJzogW3sndmlzaWJpbGl0eSc6ICdvZmYnfV1cblx0XHRcdFx0fSwge1xuXHRcdFx0XHRcdCdmZWF0dXJlVHlwZSc6ICdsYW5kc2NhcGUnLFxuXHRcdFx0XHRcdCdlbGVtZW50VHlwZSc6ICdnZW9tZXRyeScsXG5cdFx0XHRcdFx0J3N0eWxlcnMnOiBbeyd2aXNpYmlsaXR5JzogJ29uJ30sIHsnY29sb3InOiAnI2UzZTNlMyd9XVxuXHRcdFx0XHR9LCB7XG5cdFx0XHRcdFx0J2ZlYXR1cmVUeXBlJzogJ2xhbmRzY2FwZS5uYXR1cmFsJyxcblx0XHRcdFx0XHQnZWxlbWVudFR5cGUnOiAnbGFiZWxzJyxcblx0XHRcdFx0XHQnc3R5bGVycyc6IFt7J3Zpc2liaWxpdHknOiAnb2ZmJ31dXG5cdFx0XHRcdH0sIHtcblx0XHRcdFx0XHQnZmVhdHVyZVR5cGUnOiAncG9pJyxcblx0XHRcdFx0XHQnZWxlbWVudFR5cGUnOiAnYWxsJyxcblx0XHRcdFx0XHQnc3R5bGVycyc6IFt7J3Zpc2liaWxpdHknOiAnb2ZmJ31dXG5cdFx0XHRcdH0sIHtcblx0XHRcdFx0XHQnZmVhdHVyZVR5cGUnOiAncm9hZCcsXG5cdFx0XHRcdFx0J2VsZW1lbnRUeXBlJzogJ2FsbCcsXG5cdFx0XHRcdFx0J3N0eWxlcnMnOiBbeydjb2xvcic6ICcjY2NjJ31dXG5cdFx0XHRcdH0sIHtcblx0XHRcdFx0XHQnZmVhdHVyZVR5cGUnOiAncm9hZCcsXG5cdFx0XHRcdFx0J2VsZW1lbnRUeXBlJzogJ2xhYmVscycsXG5cdFx0XHRcdFx0J3N0eWxlcnMnOiBbeyd2aXNpYmlsaXR5JzogJ29mZid9XVxuXHRcdFx0XHR9LCB7XG5cdFx0XHRcdFx0J2ZlYXR1cmVUeXBlJzogJ3RyYW5zaXQnLFxuXHRcdFx0XHRcdCdlbGVtZW50VHlwZSc6ICdsYWJlbHMuaWNvbicsXG5cdFx0XHRcdFx0J3N0eWxlcnMnOiBbeyd2aXNpYmlsaXR5JzogJ29mZid9XVxuXHRcdFx0XHR9LCB7XG5cdFx0XHRcdFx0J2ZlYXR1cmVUeXBlJzogJ3RyYW5zaXQubGluZScsXG5cdFx0XHRcdFx0J2VsZW1lbnRUeXBlJzogJ2dlb21ldHJ5Jyxcblx0XHRcdFx0XHQnc3R5bGVycyc6IFt7J3Zpc2liaWxpdHknOiAnb2ZmJ31dXG5cdFx0XHRcdH0sIHtcblx0XHRcdFx0XHQnZmVhdHVyZVR5cGUnOiAndHJhbnNpdC5saW5lJyxcblx0XHRcdFx0XHQnZWxlbWVudFR5cGUnOiAnbGFiZWxzLnRleHQnLFxuXHRcdFx0XHRcdCdzdHlsZXJzJzogW3sndmlzaWJpbGl0eSc6ICdvZmYnfV1cblx0XHRcdFx0fSwge1xuXHRcdFx0XHRcdCdmZWF0dXJlVHlwZSc6ICd0cmFuc2l0LnN0YXRpb24uYWlycG9ydCcsXG5cdFx0XHRcdFx0J2VsZW1lbnRUeXBlJzogJ2dlb21ldHJ5Jyxcblx0XHRcdFx0XHQnc3R5bGVycyc6IFt7J3Zpc2liaWxpdHknOiAnb2ZmJ31dXG5cdFx0XHRcdH0sIHtcblx0XHRcdFx0XHQnZmVhdHVyZVR5cGUnOiAndHJhbnNpdC5zdGF0aW9uLmFpcnBvcnQnLFxuXHRcdFx0XHRcdCdlbGVtZW50VHlwZSc6ICdsYWJlbHMnLFxuXHRcdFx0XHRcdCdzdHlsZXJzJzogW3sndmlzaWJpbGl0eSc6ICdvZmYnfV1cblx0XHRcdFx0fSwge1xuXHRcdFx0XHRcdCdmZWF0dXJlVHlwZSc6ICd3YXRlcicsXG5cdFx0XHRcdFx0J2VsZW1lbnRUeXBlJzogJ2dlb21ldHJ5Jyxcblx0XHRcdFx0XHQnc3R5bGVycyc6IFt7J2NvbG9yJzogJyNmZmYnfV1cblx0XHRcdFx0fSwge1xuXHRcdFx0XHRcdCdmZWF0dXJlVHlwZSc6ICd3YXRlcicsXG5cdFx0XHRcdFx0J2VsZW1lbnRUeXBlJzogJ2xhYmVscycsXG5cdFx0XHRcdFx0J3N0eWxlcnMnOiBbeyd2aXNpYmlsaXR5JzogJ29mZid9XVxuXHRcdFx0XHR9XG5cdFx0XHRdXG5cdFx0fTtcblxuXHRcdG1hcCA9IG5ldyBnb29nbGUubWFwcy5NYXAoJGUuZ2V0KDApLCBtYXBPcHRpb25zKTtcblx0XHRnZW9jb2RlciA9IG5ldyBnb29nbGUubWFwcy5HZW9jb2RlcigpO1xuXG5cdFx0bWFwLmFkZExpc3RlbmVyKCdkcmFnJywgbWFudGFpbkluQm91bmRzKTtcblx0XHRfY3JlYXRlTWFya2VycygpO1xuXHR9XG5cblx0X2FkZExpc3RlbmVyTGlua01hcmtlcigpO1xuXHRfYWRkTGlzdGVuZXJGaWx0ZXJNYXJrZXIoKTtcblxuXHRpZiAoJHJlZ2lvbmFsRGlzdHJpYnV0b3JzQ291bnRyaWVzICYmICRyZWdpb25hbFNlcnZpY2VQcm92aWRlcnNDb3VudHJpZXMpIHtcblx0XHRfcmVuZGVyQ291bnRyaWVzVUkoKTtcblx0fVxuXG5cdHJldHVybiB7XG5cdFx0aW5pdDogX2luaXRNYXBcblx0fTtcbn0pKGpRdWVyeSk7XG5cbndpbmRvdy5pbml0TWFwID0gZnVuY3Rpb24gKCkge1xuXHRNYXBNb2R1bGUuaW5pdCgnLm1hcC1wYXJhc29mdC1sb2NhdGlvbnMnKTtcbn07XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvYXNzZXRzL2pzL21hcC1sb2NhdGlvbnMuanMiXSwic291cmNlUm9vdCI6IiJ9