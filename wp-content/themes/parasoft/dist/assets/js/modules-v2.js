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
/******/ 	return __webpack_require__(__webpack_require__.s = 19);
/******/ })
/************************************************************************/
/******/ ({

/***/ 19:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(20);


/***/ }),

/***/ 20:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


jQuery(document).ready(function ($) {

	//HOME HERO BANNER CAROUSEL

	$('.inner-banner.alt-home.alt-v2 .carousel').flickity({
		// options
		wrapAround: true,
		cellAlign: 'center',
		pageDots: false,
		prevNextButtons: false,
		draggable: false,
		fade: true,
		autoPlay: 5000
	});

	//SUBPAGES BLOCK

	$('.subpages-block-v2 .parent-col li:nth-child(1) span').addClass('clicked');

	$('.subpages-block-v2 .parent-col li:nth-child(1) span').click(function () {
		$('.subpages-block-v2 .parent-col li span').removeClass('clicked');
		$(this).addClass('clicked');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('opacity', '0');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('transform', 'translateX(2000px)');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(1)').css('opacity', '1');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(1)').css('transform', 'translateX(0)');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(1)').css('height', '100%');
	});

	$('.subpages-block-v2 .parent-col li:nth-child(2) span').click(function () {
		$('.subpages-block-v2 .parent-col li span').removeClass('clicked');
		$(this).addClass('clicked');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('opacity', '0');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('transform', 'translateX(2000px)');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(2)').css('opacity', '1');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(2)').css('transform', 'translateX(0)');
	});

	$('.subpages-block-v2 .parent-col li:nth-child(3) span').click(function () {
		$('.subpages-block-v2 .parent-col li span').removeClass('clicked');
		$(this).addClass('clicked');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('opacity', '0');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('transform', 'translateX(2000px)');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(3)').css('opacity', '1');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(3)').css('transform', 'translateX(0)');
	});

	$('.subpages-block-v2 .parent-col li:nth-child(4) span').click(function () {
		$('.subpages-block-v2 .parent-col li span').removeClass('clicked');
		$(this).addClass('clicked');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('opacity', '0');
		$('.subpages-block-v2 .subpages-col .subpages-container').css('transform', 'translateX(2000px)');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(4)').css('opacity', '1');
		$('.subpages-block-v2 .subpages-col .subpages-container:nth-child(4)').css('transform', 'translateX(0)');
	});

	//INDUSTRIES BLOCK

	$('.industries-slider .category-0').addClass('clicked');

	$('.industries-slider .category-0').click(function () {
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(1)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(1)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-1').click(function () {
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(2)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(2)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-2').click(function () {
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(3)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(3)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-3').click(function () {
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(4)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(4)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-4').click(function () {
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(5)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(5)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-5').click(function () {
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(6)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(6)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-6').click(function () {
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(7)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(7)').css('transform', 'translateX(0)');
	});

	$('.industries-slider .category-7').click(function () {
		$('.industries-slider .category').removeClass('clicked');
		$(this).addClass('clicked');
		$('.industries-slider .industry-container').css('opacity', '0');
		$('.industries-slider .industry-container').css('transform', 'translateX(2000px)');
		$('.industries-slider .industry-container:nth-child(8)').css('opacity', '1');
		$('.industries-slider .industry-container:nth-child(8)').css('transform', 'translateX(0)');
	});

	//PRODUCTS HOME BLOCK

	$('.products-home .product-nav:first-child .product-nav-container').addClass('clicked');

	$('.products-home .product-nav:nth-child(1)').click(function () {
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(1)').css('opacity', '1');
		$('.products-home .product-container:nth-child(1)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(2)').click(function () {
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(2)').css('opacity', '1');
		$('.products-home .product-container:nth-child(2)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(3)').click(function () {
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(3)').css('opacity', '1');
		$('.products-home .product-container:nth-child(3)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(4)').click(function () {
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(4)').css('opacity', '1');
		$('.products-home .product-container:nth-child(4)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(5)').click(function () {
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(5)').css('opacity', '1');
		$('.products-home .product-container:nth-child(5)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(6)').click(function () {
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(6)').css('opacity', '1');
		$('.products-home .product-container:nth-child(6)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(7)').click(function () {
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(7)').css('opacity', '1');
		$('.products-home .product-container:nth-child(7)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(8)').click(function () {
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(8)').css('opacity', '1');
		$('.products-home .product-container:nth-child(8)').css('transform', 'translateX(0)');
	});

	$('.products-home .product-nav:nth-child(9)').click(function () {
		$('.products-home .product-nav .product-nav-container').removeClass('clicked');
		$(this).find('.product-nav-container').addClass('clicked');
		$('.products-home .product-container').css('opacity', '0');
		$('.products-home .product-container').css('transform', 'translateX(2000px)');
		$('.products-home .product-container:nth-child(9)').css('opacity', '1');
		$('.products-home .product-container:nth-child(9)').css('transform', 'translateX(0)');
	});
});

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgNTk5NzRhNmUxNGRmNjE3MGJiYWQiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9tb2R1bGVzLXYyLmpzIl0sIm5hbWVzIjpbImpRdWVyeSIsImRvY3VtZW50IiwicmVhZHkiLCIkIiwiZmxpY2tpdHkiLCJ3cmFwQXJvdW5kIiwiY2VsbEFsaWduIiwicGFnZURvdHMiLCJwcmV2TmV4dEJ1dHRvbnMiLCJkcmFnZ2FibGUiLCJmYWRlIiwiYXV0b1BsYXkiLCJhZGRDbGFzcyIsImNsaWNrIiwicmVtb3ZlQ2xhc3MiLCJjc3MiLCJmaW5kIl0sIm1hcHBpbmdzIjoiO0FBQUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLG1DQUEyQiwwQkFBMEIsRUFBRTtBQUN2RCx5Q0FBaUMsZUFBZTtBQUNoRDtBQUNBO0FBQ0E7O0FBRUE7QUFDQSw4REFBc0QsK0RBQStEOztBQUVySDtBQUNBOztBQUVBO0FBQ0E7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUM3REFBLE9BQU9DLFFBQVAsRUFBaUJDLEtBQWpCLENBQXVCLFVBQVNDLENBQVQsRUFBWTs7QUFFbEM7O0FBRUFBLEdBQUUseUNBQUYsRUFBNkNDLFFBQTdDLENBQXNEO0FBQy9DO0FBQ0FDLGNBQVksSUFGbUM7QUFHL0NDLGFBQVcsUUFIb0M7QUFJL0NDLFlBQVUsS0FKcUM7QUFLL0NDLG1CQUFpQixLQUw4QjtBQU0vQ0MsYUFBVyxLQU5vQztBQU8vQ0MsUUFBTSxJQVB5QztBQVEvQ0MsWUFBVTtBQVJxQyxFQUF0RDs7QUFhQTs7QUFFQVIsR0FBRSxx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MkMsU0FBM0MsRUFBc0QsR0FBdEQ7QUFDQVosSUFBRSxtQ0FBRixFQUF1Q1ksR0FBdkMsQ0FBMkMsV0FBM0MsRUFBd0Qsb0JBQXhEO0FBQ0FaLElBQUUsZ0RBQUYsRUFBb0RZLEdBQXBELENBQXdELFNBQXhELEVBQW1FLEdBQW5FO0FBQ0FaLElBQUUsZ0RBQUYsRUFBb0RZLEdBQXBELENBQXdELFdBQXhELEVBQXFFLGVBQXJFO0FBQ0EsRUFQRDs7QUFTQVosR0FBRSwwQ0FBRixFQUE4Q1UsS0FBOUMsQ0FBb0QsWUFBVTtBQUM3RFYsSUFBRSxvREFBRixFQUF3RFcsV0FBeEQsQ0FBb0UsU0FBcEU7QUFDQVgsSUFBRSxJQUFGLEVBQVFhLElBQVIsQ0FBYSx3QkFBYixFQUF1Q0osUUFBdkMsQ0FBZ0QsU0FBaEQ7QUFDQVQsSUFBRSxtQ0FBRixFQUF1Q1ksR0FBdkMsQ0FBMkMsU0FBM0MsRUFBc0QsR0FBdEQ7QUFDQVosSUFBRSxtQ0FBRixFQUF1Q1ksR0FBdkMsQ0FBMkMsV0FBM0MsRUFBd0Qsb0JBQXhEO0FBQ0FaLElBQUUsZ0RBQUYsRUFBb0RZLEdBQXBELENBQXdELFNBQXhELEVBQW1FLEdBQW5FO0FBQ0FaLElBQUUsZ0RBQUYsRUFBb0RZLEdBQXBELENBQXdELFdBQXhELEVBQXFFLGVBQXJFO0FBQ0EsRUFQRDtBQVdBLENBak9ELEUiLCJmaWxlIjoibW9kdWxlcy12Mi5qcyIsInNvdXJjZXNDb250ZW50IjpbIiBcdC8vIFRoZSBtb2R1bGUgY2FjaGVcbiBcdHZhciBpbnN0YWxsZWRNb2R1bGVzID0ge307XG5cbiBcdC8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG4gXHRmdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cbiBcdFx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG4gXHRcdGlmKGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdKSB7XG4gXHRcdFx0cmV0dXJuIGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdLmV4cG9ydHM7XG4gXHRcdH1cbiBcdFx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcbiBcdFx0dmFyIG1vZHVsZSA9IGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdID0ge1xuIFx0XHRcdGk6IG1vZHVsZUlkLFxuIFx0XHRcdGw6IGZhbHNlLFxuIFx0XHRcdGV4cG9ydHM6IHt9XG4gXHRcdH07XG5cbiBcdFx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG4gXHRcdG1vZHVsZXNbbW9kdWxlSWRdLmNhbGwobW9kdWxlLmV4cG9ydHMsIG1vZHVsZSwgbW9kdWxlLmV4cG9ydHMsIF9fd2VicGFja19yZXF1aXJlX18pO1xuXG4gXHRcdC8vIEZsYWcgdGhlIG1vZHVsZSBhcyBsb2FkZWRcbiBcdFx0bW9kdWxlLmwgPSB0cnVlO1xuXG4gXHRcdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG4gXHRcdHJldHVybiBtb2R1bGUuZXhwb3J0cztcbiBcdH1cblxuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZXMgb2JqZWN0IChfX3dlYnBhY2tfbW9kdWxlc19fKVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5tID0gbW9kdWxlcztcblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGUgY2FjaGVcbiBcdF9fd2VicGFja19yZXF1aXJlX18uYyA9IGluc3RhbGxlZE1vZHVsZXM7XG5cbiBcdC8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb24gZm9yIGhhcm1vbnkgZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kID0gZnVuY3Rpb24oZXhwb3J0cywgbmFtZSwgZ2V0dGVyKSB7XG4gXHRcdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywgbmFtZSkpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgbmFtZSwge1xuIFx0XHRcdFx0Y29uZmlndXJhYmxlOiBmYWxzZSxcbiBcdFx0XHRcdGVudW1lcmFibGU6IHRydWUsXG4gXHRcdFx0XHRnZXQ6IGdldHRlclxuIFx0XHRcdH0pO1xuIFx0XHR9XG4gXHR9O1xuXG4gXHQvLyBnZXREZWZhdWx0RXhwb3J0IGZ1bmN0aW9uIGZvciBjb21wYXRpYmlsaXR5IHdpdGggbm9uLWhhcm1vbnkgbW9kdWxlc1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5uID0gZnVuY3Rpb24obW9kdWxlKSB7XG4gXHRcdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuIFx0XHRcdGZ1bmN0aW9uIGdldERlZmF1bHQoKSB7IHJldHVybiBtb2R1bGVbJ2RlZmF1bHQnXTsgfSA6XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0TW9kdWxlRXhwb3J0cygpIHsgcmV0dXJuIG1vZHVsZTsgfTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kKGdldHRlciwgJ2EnLCBnZXR0ZXIpO1xuIFx0XHRyZXR1cm4gZ2V0dGVyO1xuIFx0fTtcblxuIFx0Ly8gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSBmdW5jdGlvbihvYmplY3QsIHByb3BlcnR5KSB7IHJldHVybiBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqZWN0LCBwcm9wZXJ0eSk7IH07XG5cbiBcdC8vIF9fd2VicGFja19wdWJsaWNfcGF0aF9fXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnAgPSBcIlwiO1xuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IDE5KTtcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyB3ZWJwYWNrL2Jvb3RzdHJhcCA1OTk3NGE2ZTE0ZGY2MTcwYmJhZCIsImpRdWVyeShkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oJCkge1xuXG5cdC8vSE9NRSBIRVJPIEJBTk5FUiBDQVJPVVNFTFxuXG5cdCQoJy5pbm5lci1iYW5uZXIuYWx0LWhvbWUuYWx0LXYyIC5jYXJvdXNlbCcpLmZsaWNraXR5KHtcbiAgICAgICAgLy8gb3B0aW9uc1xuICAgICAgICB3cmFwQXJvdW5kOiB0cnVlLFxuICAgICAgICBjZWxsQWxpZ246ICdjZW50ZXInLFxuICAgICAgICBwYWdlRG90czogZmFsc2UsXG4gICAgICAgIHByZXZOZXh0QnV0dG9uczogZmFsc2UsXG4gICAgICAgIGRyYWdnYWJsZTogZmFsc2UsXG4gICAgICAgIGZhZGU6IHRydWUsXG4gICAgICAgIGF1dG9QbGF5OiA1MDAwXG4gICAgfSk7XG5cblxuXG5cdC8vU1VCUEFHRVMgQkxPQ0tcblxuXHQkKCcuc3VicGFnZXMtYmxvY2stdjIgLnBhcmVudC1jb2wgbGk6bnRoLWNoaWxkKDEpIHNwYW4nKS5hZGRDbGFzcygnY2xpY2tlZCcpO1xuXG5cdCQoJy5zdWJwYWdlcy1ibG9jay12MiAucGFyZW50LWNvbCBsaTpudGgtY2hpbGQoMSkgc3BhbicpLmNsaWNrKGZ1bmN0aW9uKCl7XG5cdFx0JCgnLnN1YnBhZ2VzLWJsb2NrLXYyIC5wYXJlbnQtY29sIGxpIHNwYW4nKS5yZW1vdmVDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQodGhpcykuYWRkQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKCcuc3VicGFnZXMtYmxvY2stdjIgLnN1YnBhZ2VzLWNvbCAuc3VicGFnZXMtY29udGFpbmVyJykuY3NzKCdvcGFjaXR5JywgJzAnKTtcblx0XHQkKCcuc3VicGFnZXMtYmxvY2stdjIgLnN1YnBhZ2VzLWNvbCAuc3VicGFnZXMtY29udGFpbmVyJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgyMDAwcHgpJyk7XG5cdFx0JCgnLnN1YnBhZ2VzLWJsb2NrLXYyIC5zdWJwYWdlcy1jb2wgLnN1YnBhZ2VzLWNvbnRhaW5lcjpudGgtY2hpbGQoMSknKS5jc3MoJ29wYWNpdHknLCAnMScpO1xuXHRcdCQoJy5zdWJwYWdlcy1ibG9jay12MiAuc3VicGFnZXMtY29sIC5zdWJwYWdlcy1jb250YWluZXI6bnRoLWNoaWxkKDEpJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgwKScpO1xuXHRcdCQoJy5zdWJwYWdlcy1ibG9jay12MiAuc3VicGFnZXMtY29sIC5zdWJwYWdlcy1jb250YWluZXI6bnRoLWNoaWxkKDEpJykuY3NzKCdoZWlnaHQnLCAnMTAwJScpO1xuXHR9KTtcblxuXHQkKCcuc3VicGFnZXMtYmxvY2stdjIgLnBhcmVudC1jb2wgbGk6bnRoLWNoaWxkKDIpIHNwYW4nKS5jbGljayhmdW5jdGlvbigpe1xuXHRcdCQoJy5zdWJwYWdlcy1ibG9jay12MiAucGFyZW50LWNvbCBsaSBzcGFuJykucmVtb3ZlQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKHRoaXMpLmFkZENsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCgnLnN1YnBhZ2VzLWJsb2NrLXYyIC5zdWJwYWdlcy1jb2wgLnN1YnBhZ2VzLWNvbnRhaW5lcicpLmNzcygnb3BhY2l0eScsICcwJyk7XG5cdFx0JCgnLnN1YnBhZ2VzLWJsb2NrLXYyIC5zdWJwYWdlcy1jb2wgLnN1YnBhZ2VzLWNvbnRhaW5lcicpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMjAwMHB4KScpO1xuXHRcdCQoJy5zdWJwYWdlcy1ibG9jay12MiAuc3VicGFnZXMtY29sIC5zdWJwYWdlcy1jb250YWluZXI6bnRoLWNoaWxkKDIpJykuY3NzKCdvcGFjaXR5JywgJzEnKTtcblx0XHQkKCcuc3VicGFnZXMtYmxvY2stdjIgLnN1YnBhZ2VzLWNvbCAuc3VicGFnZXMtY29udGFpbmVyOm50aC1jaGlsZCgyKScpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMCknKTtcblx0fSk7XG5cblx0JCgnLnN1YnBhZ2VzLWJsb2NrLXYyIC5wYXJlbnQtY29sIGxpOm50aC1jaGlsZCgzKSBzcGFuJykuY2xpY2soZnVuY3Rpb24oKXtcblx0XHQkKCcuc3VicGFnZXMtYmxvY2stdjIgLnBhcmVudC1jb2wgbGkgc3BhbicpLnJlbW92ZUNsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCh0aGlzKS5hZGRDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQoJy5zdWJwYWdlcy1ibG9jay12MiAuc3VicGFnZXMtY29sIC5zdWJwYWdlcy1jb250YWluZXInKS5jc3MoJ29wYWNpdHknLCAnMCcpO1xuXHRcdCQoJy5zdWJwYWdlcy1ibG9jay12MiAuc3VicGFnZXMtY29sIC5zdWJwYWdlcy1jb250YWluZXInKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDIwMDBweCknKTtcblx0XHQkKCcuc3VicGFnZXMtYmxvY2stdjIgLnN1YnBhZ2VzLWNvbCAuc3VicGFnZXMtY29udGFpbmVyOm50aC1jaGlsZCgzKScpLmNzcygnb3BhY2l0eScsICcxJyk7XG5cdFx0JCgnLnN1YnBhZ2VzLWJsb2NrLXYyIC5zdWJwYWdlcy1jb2wgLnN1YnBhZ2VzLWNvbnRhaW5lcjpudGgtY2hpbGQoMyknKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDApJyk7XG5cdH0pO1xuXG5cdCQoJy5zdWJwYWdlcy1ibG9jay12MiAucGFyZW50LWNvbCBsaTpudGgtY2hpbGQoNCkgc3BhbicpLmNsaWNrKGZ1bmN0aW9uKCl7XG5cdFx0JCgnLnN1YnBhZ2VzLWJsb2NrLXYyIC5wYXJlbnQtY29sIGxpIHNwYW4nKS5yZW1vdmVDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQodGhpcykuYWRkQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKCcuc3VicGFnZXMtYmxvY2stdjIgLnN1YnBhZ2VzLWNvbCAuc3VicGFnZXMtY29udGFpbmVyJykuY3NzKCdvcGFjaXR5JywgJzAnKTtcblx0XHQkKCcuc3VicGFnZXMtYmxvY2stdjIgLnN1YnBhZ2VzLWNvbCAuc3VicGFnZXMtY29udGFpbmVyJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgyMDAwcHgpJyk7XG5cdFx0JCgnLnN1YnBhZ2VzLWJsb2NrLXYyIC5zdWJwYWdlcy1jb2wgLnN1YnBhZ2VzLWNvbnRhaW5lcjpudGgtY2hpbGQoNCknKS5jc3MoJ29wYWNpdHknLCAnMScpO1xuXHRcdCQoJy5zdWJwYWdlcy1ibG9jay12MiAuc3VicGFnZXMtY29sIC5zdWJwYWdlcy1jb250YWluZXI6bnRoLWNoaWxkKDQpJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgwKScpO1xuXHR9KTtcblxuXG5cblx0Ly9JTkRVU1RSSUVTIEJMT0NLXG5cblx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5jYXRlZ29yeS0wJykuYWRkQ2xhc3MoJ2NsaWNrZWQnKTtcblxuICAgICQoJy5pbmR1c3RyaWVzLXNsaWRlciAuY2F0ZWdvcnktMCcpLmNsaWNrKGZ1bmN0aW9uKCl7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5jYXRlZ29yeScpLnJlbW92ZUNsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCh0aGlzKS5hZGRDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyJykuY3NzKCdvcGFjaXR5JywgJzAnKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcicpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMjAwMHB4KScpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyOm50aC1jaGlsZCgxKScpLmNzcygnb3BhY2l0eScsICcxJyk7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5pbmR1c3RyeS1jb250YWluZXI6bnRoLWNoaWxkKDEpJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgwKScpO1xuXHR9KTtcblxuXHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmNhdGVnb3J5LTEnKS5jbGljayhmdW5jdGlvbigpe1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuY2F0ZWdvcnknKS5yZW1vdmVDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQodGhpcykuYWRkQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcicpLmNzcygnb3BhY2l0eScsICcwJyk7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5pbmR1c3RyeS1jb250YWluZXInKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDIwMDBweCknKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcjpudGgtY2hpbGQoMiknKS5jc3MoJ29wYWNpdHknLCAnMScpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyOm50aC1jaGlsZCgyKScpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMCknKTtcblx0fSk7XG5cblx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5jYXRlZ29yeS0yJykuY2xpY2soZnVuY3Rpb24oKXtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmNhdGVnb3J5JykucmVtb3ZlQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKHRoaXMpLmFkZENsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5pbmR1c3RyeS1jb250YWluZXInKS5jc3MoJ29wYWNpdHknLCAnMCcpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgyMDAwcHgpJyk7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5pbmR1c3RyeS1jb250YWluZXI6bnRoLWNoaWxkKDMpJykuY3NzKCdvcGFjaXR5JywgJzEnKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcjpudGgtY2hpbGQoMyknKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDApJyk7XG5cdH0pO1xuXG5cdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuY2F0ZWdvcnktMycpLmNsaWNrKGZ1bmN0aW9uKCl7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5jYXRlZ29yeScpLnJlbW92ZUNsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCh0aGlzKS5hZGRDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyJykuY3NzKCdvcGFjaXR5JywgJzAnKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcicpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMjAwMHB4KScpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyOm50aC1jaGlsZCg0KScpLmNzcygnb3BhY2l0eScsICcxJyk7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5pbmR1c3RyeS1jb250YWluZXI6bnRoLWNoaWxkKDQpJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgwKScpO1xuXHR9KTtcblxuXHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmNhdGVnb3J5LTQnKS5jbGljayhmdW5jdGlvbigpe1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuY2F0ZWdvcnknKS5yZW1vdmVDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQodGhpcykuYWRkQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcicpLmNzcygnb3BhY2l0eScsICcwJyk7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5pbmR1c3RyeS1jb250YWluZXInKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDIwMDBweCknKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcjpudGgtY2hpbGQoNSknKS5jc3MoJ29wYWNpdHknLCAnMScpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyOm50aC1jaGlsZCg1KScpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMCknKTtcblx0fSk7XG5cblx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5jYXRlZ29yeS01JykuY2xpY2soZnVuY3Rpb24oKXtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmNhdGVnb3J5JykucmVtb3ZlQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKHRoaXMpLmFkZENsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5pbmR1c3RyeS1jb250YWluZXInKS5jc3MoJ29wYWNpdHknLCAnMCcpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgyMDAwcHgpJyk7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5pbmR1c3RyeS1jb250YWluZXI6bnRoLWNoaWxkKDYpJykuY3NzKCdvcGFjaXR5JywgJzEnKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcjpudGgtY2hpbGQoNiknKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDApJyk7XG5cdH0pO1xuXG5cdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuY2F0ZWdvcnktNicpLmNsaWNrKGZ1bmN0aW9uKCl7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5jYXRlZ29yeScpLnJlbW92ZUNsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCh0aGlzKS5hZGRDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyJykuY3NzKCdvcGFjaXR5JywgJzAnKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcicpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMjAwMHB4KScpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyOm50aC1jaGlsZCg3KScpLmNzcygnb3BhY2l0eScsICcxJyk7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5pbmR1c3RyeS1jb250YWluZXI6bnRoLWNoaWxkKDcpJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgwKScpO1xuXHR9KTtcblxuXHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmNhdGVnb3J5LTcnKS5jbGljayhmdW5jdGlvbigpe1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuY2F0ZWdvcnknKS5yZW1vdmVDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQodGhpcykuYWRkQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcicpLmNzcygnb3BhY2l0eScsICcwJyk7XG5cdFx0JCgnLmluZHVzdHJpZXMtc2xpZGVyIC5pbmR1c3RyeS1jb250YWluZXInKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDIwMDBweCknKTtcblx0XHQkKCcuaW5kdXN0cmllcy1zbGlkZXIgLmluZHVzdHJ5LWNvbnRhaW5lcjpudGgtY2hpbGQoOCknKS5jc3MoJ29wYWNpdHknLCAnMScpO1xuXHRcdCQoJy5pbmR1c3RyaWVzLXNsaWRlciAuaW5kdXN0cnktY29udGFpbmVyOm50aC1jaGlsZCg4KScpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMCknKTtcblx0fSk7XG5cblxuXG5cdC8vUFJPRFVDVFMgSE9NRSBCTE9DS1xuXG5cdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LW5hdjpmaXJzdC1jaGlsZCAucHJvZHVjdC1uYXYtY29udGFpbmVyJykuYWRkQ2xhc3MoJ2NsaWNrZWQnKTtcblxuXHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1uYXY6bnRoLWNoaWxkKDEpJykuY2xpY2soZnVuY3Rpb24oKXtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1uYXYgLnByb2R1Y3QtbmF2LWNvbnRhaW5lcicpLnJlbW92ZUNsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCh0aGlzKS5maW5kKCcucHJvZHVjdC1uYXYtY29udGFpbmVyJykuYWRkQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXInKS5jc3MoJ29wYWNpdHknLCAnMCcpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcicpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMjAwMHB4KScpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcjpudGgtY2hpbGQoMSknKS5jc3MoJ29wYWNpdHknLCAnMScpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcjpudGgtY2hpbGQoMSknKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDApJyk7XG5cdH0pO1xuXG5cdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LW5hdjpudGgtY2hpbGQoMiknKS5jbGljayhmdW5jdGlvbigpe1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LW5hdiAucHJvZHVjdC1uYXYtY29udGFpbmVyJykucmVtb3ZlQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKHRoaXMpLmZpbmQoJy5wcm9kdWN0LW5hdi1jb250YWluZXInKS5hZGRDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcicpLmNzcygnb3BhY2l0eScsICcwJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgyMDAwcHgpJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyOm50aC1jaGlsZCgyKScpLmNzcygnb3BhY2l0eScsICcxJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyOm50aC1jaGlsZCgyKScpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMCknKTtcblx0fSk7XG5cblx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtbmF2Om50aC1jaGlsZCgzKScpLmNsaWNrKGZ1bmN0aW9uKCl7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtbmF2IC5wcm9kdWN0LW5hdi1jb250YWluZXInKS5yZW1vdmVDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQodGhpcykuZmluZCgnLnByb2R1Y3QtbmF2LWNvbnRhaW5lcicpLmFkZENsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyJykuY3NzKCdvcGFjaXR5JywgJzAnKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXInKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDIwMDBweCknKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXI6bnRoLWNoaWxkKDMpJykuY3NzKCdvcGFjaXR5JywgJzEnKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXI6bnRoLWNoaWxkKDMpJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgwKScpO1xuXHR9KTtcblxuXHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1uYXY6bnRoLWNoaWxkKDQpJykuY2xpY2soZnVuY3Rpb24oKXtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1uYXYgLnByb2R1Y3QtbmF2LWNvbnRhaW5lcicpLnJlbW92ZUNsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCh0aGlzKS5maW5kKCcucHJvZHVjdC1uYXYtY29udGFpbmVyJykuYWRkQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXInKS5jc3MoJ29wYWNpdHknLCAnMCcpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcicpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMjAwMHB4KScpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcjpudGgtY2hpbGQoNCknKS5jc3MoJ29wYWNpdHknLCAnMScpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcjpudGgtY2hpbGQoNCknKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDApJyk7XG5cdH0pO1xuXG5cdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LW5hdjpudGgtY2hpbGQoNSknKS5jbGljayhmdW5jdGlvbigpe1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LW5hdiAucHJvZHVjdC1uYXYtY29udGFpbmVyJykucmVtb3ZlQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKHRoaXMpLmZpbmQoJy5wcm9kdWN0LW5hdi1jb250YWluZXInKS5hZGRDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcicpLmNzcygnb3BhY2l0eScsICcwJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgyMDAwcHgpJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyOm50aC1jaGlsZCg1KScpLmNzcygnb3BhY2l0eScsICcxJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyOm50aC1jaGlsZCg1KScpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMCknKTtcblx0fSk7XG5cblx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtbmF2Om50aC1jaGlsZCg2KScpLmNsaWNrKGZ1bmN0aW9uKCl7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtbmF2IC5wcm9kdWN0LW5hdi1jb250YWluZXInKS5yZW1vdmVDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQodGhpcykuZmluZCgnLnByb2R1Y3QtbmF2LWNvbnRhaW5lcicpLmFkZENsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyJykuY3NzKCdvcGFjaXR5JywgJzAnKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXInKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDIwMDBweCknKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXI6bnRoLWNoaWxkKDYpJykuY3NzKCdvcGFjaXR5JywgJzEnKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXI6bnRoLWNoaWxkKDYpJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgwKScpO1xuXHR9KTtcblxuXHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1uYXY6bnRoLWNoaWxkKDcpJykuY2xpY2soZnVuY3Rpb24oKXtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1uYXYgLnByb2R1Y3QtbmF2LWNvbnRhaW5lcicpLnJlbW92ZUNsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCh0aGlzKS5maW5kKCcucHJvZHVjdC1uYXYtY29udGFpbmVyJykuYWRkQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXInKS5jc3MoJ29wYWNpdHknLCAnMCcpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcicpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMjAwMHB4KScpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcjpudGgtY2hpbGQoNyknKS5jc3MoJ29wYWNpdHknLCAnMScpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcjpudGgtY2hpbGQoNyknKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDApJyk7XG5cdH0pO1xuXG5cdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LW5hdjpudGgtY2hpbGQoOCknKS5jbGljayhmdW5jdGlvbigpe1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LW5hdiAucHJvZHVjdC1uYXYtY29udGFpbmVyJykucmVtb3ZlQ2xhc3MoJ2NsaWNrZWQnKTtcblx0XHQkKHRoaXMpLmZpbmQoJy5wcm9kdWN0LW5hdi1jb250YWluZXInKS5hZGRDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQoJy5wcm9kdWN0cy1ob21lIC5wcm9kdWN0LWNvbnRhaW5lcicpLmNzcygnb3BhY2l0eScsICcwJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgyMDAwcHgpJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyOm50aC1jaGlsZCg4KScpLmNzcygnb3BhY2l0eScsICcxJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyOm50aC1jaGlsZCg4KScpLmNzcygndHJhbnNmb3JtJywgJ3RyYW5zbGF0ZVgoMCknKTtcblx0fSk7XG5cblx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtbmF2Om50aC1jaGlsZCg5KScpLmNsaWNrKGZ1bmN0aW9uKCl7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtbmF2IC5wcm9kdWN0LW5hdi1jb250YWluZXInKS5yZW1vdmVDbGFzcygnY2xpY2tlZCcpO1xuXHRcdCQodGhpcykuZmluZCgnLnByb2R1Y3QtbmF2LWNvbnRhaW5lcicpLmFkZENsYXNzKCdjbGlja2VkJyk7XG5cdFx0JCgnLnByb2R1Y3RzLWhvbWUgLnByb2R1Y3QtY29udGFpbmVyJykuY3NzKCdvcGFjaXR5JywgJzAnKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXInKS5jc3MoJ3RyYW5zZm9ybScsICd0cmFuc2xhdGVYKDIwMDBweCknKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXI6bnRoLWNoaWxkKDkpJykuY3NzKCdvcGFjaXR5JywgJzEnKTtcblx0XHQkKCcucHJvZHVjdHMtaG9tZSAucHJvZHVjdC1jb250YWluZXI6bnRoLWNoaWxkKDkpJykuY3NzKCd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWCgwKScpO1xuXHR9KTtcblxuXG5cbn0pO1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3NyYy9hc3NldHMvanMvbW9kdWxlcy12Mi5qcyJdLCJzb3VyY2VSb290IjoiIn0=