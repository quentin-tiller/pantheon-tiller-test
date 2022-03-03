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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ 11:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(12);


/***/ }),

/***/ 12:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


jQuery(document).ready(function ($) {
	/*HOMEPAGE STATISTICS COUNTER*/
	if ($('#counter .counter-value').length != 0) {
		var done = false;
		$.fn.visible = function (partial) {
			var $t = $(this),
			    $w = $(window),
			    viewTop = $w.scrollTop(),
			    viewBottom = viewTop + $w.height(),
			    _top = $t.offset().top,
			    _bottom = _top + $t.height(),
			    compareTop = partial === true ? _bottom : _top,
			    compareBottom = partial === true ? _top : _bottom;

			return compareBottom <= viewBottom && compareTop >= viewTop;
		};

		$(window).on('scroll', function () {
			if (!done) {
				if ($('.counter').visible(true)) {
					$('.counter-value').each(function () {
						// Countup
						$(this).prop('Counter', 0).animate({
							Counter: $(this).attr('data-count')
						}, {
							duration: 1000,
							step: function step(now) {
								$(this).text(Math.ceil(now));
								done = true;
							}
						});
					});
				}
			}
		});
	}
});

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgNTk5NzRhNmUxNGRmNjE3MGJiYWQiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9maXhlcy5qcyJdLCJuYW1lcyI6WyJqUXVlcnkiLCJkb2N1bWVudCIsInJlYWR5IiwiJCIsImxlbmd0aCIsImRvbmUiLCJmbiIsInZpc2libGUiLCJwYXJ0aWFsIiwiJHQiLCIkdyIsIndpbmRvdyIsInZpZXdUb3AiLCJzY3JvbGxUb3AiLCJ2aWV3Qm90dG9tIiwiaGVpZ2h0IiwiX3RvcCIsIm9mZnNldCIsInRvcCIsIl9ib3R0b20iLCJjb21wYXJlVG9wIiwiY29tcGFyZUJvdHRvbSIsIm9uIiwiZWFjaCIsInByb3AiLCJhbmltYXRlIiwiQ291bnRlciIsImF0dHIiLCJkdXJhdGlvbiIsInN0ZXAiLCJub3ciLCJ0ZXh0IiwiTWF0aCIsImNlaWwiXSwibWFwcGluZ3MiOiI7QUFBQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBSztBQUNMO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsbUNBQTJCLDBCQUEwQixFQUFFO0FBQ3ZELHlDQUFpQyxlQUFlO0FBQ2hEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLDhEQUFzRCwrREFBK0Q7O0FBRXJIO0FBQ0E7O0FBRUE7QUFDQTs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQzdEQUEsT0FBT0MsUUFBUCxFQUFpQkMsS0FBakIsQ0FBdUIsVUFBVUMsQ0FBVixFQUFhO0FBQ25DO0FBQ0EsS0FBSUEsRUFBRSx5QkFBRixFQUE2QkMsTUFBN0IsSUFBdUMsQ0FBM0MsRUFBOEM7QUFDN0MsTUFBSUMsT0FBTyxLQUFYO0FBQ0FGLElBQUVHLEVBQUYsQ0FBS0MsT0FBTCxHQUFlLFVBQVVDLE9BQVYsRUFBbUI7QUFDakMsT0FBSUMsS0FBS04sRUFBRSxJQUFGLENBQVQ7QUFBQSxPQUNDTyxLQUFLUCxFQUFFUSxNQUFGLENBRE47QUFBQSxPQUVDQyxVQUFVRixHQUFHRyxTQUFILEVBRlg7QUFBQSxPQUdDQyxhQUFhRixVQUFVRixHQUFHSyxNQUFILEVBSHhCO0FBQUEsT0FJQ0MsT0FBT1AsR0FBR1EsTUFBSCxHQUFZQyxHQUpwQjtBQUFBLE9BS0NDLFVBQVVILE9BQU9QLEdBQUdNLE1BQUgsRUFMbEI7QUFBQSxPQU1DSyxhQUFhWixZQUFZLElBQVosR0FBbUJXLE9BQW5CLEdBQTZCSCxJQU4zQztBQUFBLE9BT0NLLGdCQUFnQmIsWUFBWSxJQUFaLEdBQW1CUSxJQUFuQixHQUEwQkcsT0FQM0M7O0FBU0EsVUFBU0UsaUJBQWlCUCxVQUFsQixJQUFrQ00sY0FBY1IsT0FBeEQ7QUFDQSxHQVhEOztBQWFBVCxJQUFFUSxNQUFGLEVBQVVXLEVBQVYsQ0FBYSxRQUFiLEVBQXVCLFlBQVk7QUFDbEMsT0FBSSxDQUFDakIsSUFBTCxFQUFXO0FBQ1YsUUFBSUYsRUFBRSxVQUFGLEVBQWNJLE9BQWQsQ0FBc0IsSUFBdEIsQ0FBSixFQUFpQztBQUNoQ0osT0FBRSxnQkFBRixFQUFvQm9CLElBQXBCLENBQXlCLFlBQVk7QUFDcEM7QUFDQXBCLFFBQUUsSUFBRixFQUFRcUIsSUFBUixDQUFhLFNBQWIsRUFBd0IsQ0FBeEIsRUFBMkJDLE9BQTNCLENBQW1DO0FBQ2xDQyxnQkFBU3ZCLEVBQUUsSUFBRixFQUFRd0IsSUFBUixDQUFhLFlBQWI7QUFEeUIsT0FBbkMsRUFFRztBQUNGQyxpQkFBVSxJQURSO0FBRUZDLGFBQU0sY0FBVUMsR0FBVixFQUFlO0FBQ3BCM0IsVUFBRSxJQUFGLEVBQVE0QixJQUFSLENBQWFDLEtBQUtDLElBQUwsQ0FBVUgsR0FBVixDQUFiO0FBQ0F6QixlQUFPLElBQVA7QUFDQTtBQUxDLE9BRkg7QUFTQSxNQVhEO0FBWUE7QUFDRDtBQUNELEdBakJEO0FBa0JBO0FBQ0QsQ0FwQ0QsRSIsImZpbGUiOiJmaXhlcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiBcdC8vIFRoZSBtb2R1bGUgY2FjaGVcbiBcdHZhciBpbnN0YWxsZWRNb2R1bGVzID0ge307XG5cbiBcdC8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG4gXHRmdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cbiBcdFx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG4gXHRcdGlmKGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdKSB7XG4gXHRcdFx0cmV0dXJuIGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdLmV4cG9ydHM7XG4gXHRcdH1cbiBcdFx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcbiBcdFx0dmFyIG1vZHVsZSA9IGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdID0ge1xuIFx0XHRcdGk6IG1vZHVsZUlkLFxuIFx0XHRcdGw6IGZhbHNlLFxuIFx0XHRcdGV4cG9ydHM6IHt9XG4gXHRcdH07XG5cbiBcdFx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG4gXHRcdG1vZHVsZXNbbW9kdWxlSWRdLmNhbGwobW9kdWxlLmV4cG9ydHMsIG1vZHVsZSwgbW9kdWxlLmV4cG9ydHMsIF9fd2VicGFja19yZXF1aXJlX18pO1xuXG4gXHRcdC8vIEZsYWcgdGhlIG1vZHVsZSBhcyBsb2FkZWRcbiBcdFx0bW9kdWxlLmwgPSB0cnVlO1xuXG4gXHRcdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG4gXHRcdHJldHVybiBtb2R1bGUuZXhwb3J0cztcbiBcdH1cblxuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZXMgb2JqZWN0IChfX3dlYnBhY2tfbW9kdWxlc19fKVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5tID0gbW9kdWxlcztcblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGUgY2FjaGVcbiBcdF9fd2VicGFja19yZXF1aXJlX18uYyA9IGluc3RhbGxlZE1vZHVsZXM7XG5cbiBcdC8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb24gZm9yIGhhcm1vbnkgZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kID0gZnVuY3Rpb24oZXhwb3J0cywgbmFtZSwgZ2V0dGVyKSB7XG4gXHRcdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywgbmFtZSkpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgbmFtZSwge1xuIFx0XHRcdFx0Y29uZmlndXJhYmxlOiBmYWxzZSxcbiBcdFx0XHRcdGVudW1lcmFibGU6IHRydWUsXG4gXHRcdFx0XHRnZXQ6IGdldHRlclxuIFx0XHRcdH0pO1xuIFx0XHR9XG4gXHR9O1xuXG4gXHQvLyBnZXREZWZhdWx0RXhwb3J0IGZ1bmN0aW9uIGZvciBjb21wYXRpYmlsaXR5IHdpdGggbm9uLWhhcm1vbnkgbW9kdWxlc1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5uID0gZnVuY3Rpb24obW9kdWxlKSB7XG4gXHRcdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuIFx0XHRcdGZ1bmN0aW9uIGdldERlZmF1bHQoKSB7IHJldHVybiBtb2R1bGVbJ2RlZmF1bHQnXTsgfSA6XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0TW9kdWxlRXhwb3J0cygpIHsgcmV0dXJuIG1vZHVsZTsgfTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kKGdldHRlciwgJ2EnLCBnZXR0ZXIpO1xuIFx0XHRyZXR1cm4gZ2V0dGVyO1xuIFx0fTtcblxuIFx0Ly8gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSBmdW5jdGlvbihvYmplY3QsIHByb3BlcnR5KSB7IHJldHVybiBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqZWN0LCBwcm9wZXJ0eSk7IH07XG5cbiBcdC8vIF9fd2VicGFja19wdWJsaWNfcGF0aF9fXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnAgPSBcIlwiO1xuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IDExKTtcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyB3ZWJwYWNrL2Jvb3RzdHJhcCA1OTk3NGE2ZTE0ZGY2MTcwYmJhZCIsImpRdWVyeShkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCQpIHtcblx0LypIT01FUEFHRSBTVEFUSVNUSUNTIENPVU5URVIqL1xuXHRpZiAoJCgnI2NvdW50ZXIgLmNvdW50ZXItdmFsdWUnKS5sZW5ndGggIT0gMCkge1xuXHRcdHZhciBkb25lID0gZmFsc2U7XG5cdFx0JC5mbi52aXNpYmxlID0gZnVuY3Rpb24gKHBhcnRpYWwpIHtcblx0XHRcdHZhciAkdCA9ICQodGhpcyksXG5cdFx0XHRcdCR3ID0gJCh3aW5kb3cpLFxuXHRcdFx0XHR2aWV3VG9wID0gJHcuc2Nyb2xsVG9wKCksXG5cdFx0XHRcdHZpZXdCb3R0b20gPSB2aWV3VG9wICsgJHcuaGVpZ2h0KCksXG5cdFx0XHRcdF90b3AgPSAkdC5vZmZzZXQoKS50b3AsXG5cdFx0XHRcdF9ib3R0b20gPSBfdG9wICsgJHQuaGVpZ2h0KCksXG5cdFx0XHRcdGNvbXBhcmVUb3AgPSBwYXJ0aWFsID09PSB0cnVlID8gX2JvdHRvbSA6IF90b3AsXG5cdFx0XHRcdGNvbXBhcmVCb3R0b20gPSBwYXJ0aWFsID09PSB0cnVlID8gX3RvcCA6IF9ib3R0b207XG5cblx0XHRcdHJldHVybiAoKGNvbXBhcmVCb3R0b20gPD0gdmlld0JvdHRvbSkgJiYgKGNvbXBhcmVUb3AgPj0gdmlld1RvcCkpO1xuXHRcdH07XG5cblx0XHQkKHdpbmRvdykub24oJ3Njcm9sbCcsIGZ1bmN0aW9uICgpIHtcblx0XHRcdGlmICghZG9uZSkge1xuXHRcdFx0XHRpZiAoJCgnLmNvdW50ZXInKS52aXNpYmxlKHRydWUpKSB7XG5cdFx0XHRcdFx0JCgnLmNvdW50ZXItdmFsdWUnKS5lYWNoKGZ1bmN0aW9uICgpIHtcblx0XHRcdFx0XHRcdC8vIENvdW50dXBcblx0XHRcdFx0XHRcdCQodGhpcykucHJvcCgnQ291bnRlcicsIDApLmFuaW1hdGUoe1xuXHRcdFx0XHRcdFx0XHRDb3VudGVyOiAkKHRoaXMpLmF0dHIoJ2RhdGEtY291bnQnKVxuXHRcdFx0XHRcdFx0fSwge1xuXHRcdFx0XHRcdFx0XHRkdXJhdGlvbjogMTAwMCxcblx0XHRcdFx0XHRcdFx0c3RlcDogZnVuY3Rpb24gKG5vdykge1xuXHRcdFx0XHRcdFx0XHRcdCQodGhpcykudGV4dChNYXRoLmNlaWwobm93KSk7XG5cdFx0XHRcdFx0XHRcdFx0ZG9uZSA9IHRydWU7XG5cdFx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHRcdH0pO1xuXHRcdFx0XHRcdH0pO1xuXHRcdFx0XHR9XG5cdFx0XHR9XG5cdFx0fSk7XG5cdH1cbn0pO1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3NyYy9hc3NldHMvanMvZml4ZXMuanMiXSwic291cmNlUm9vdCI6IiJ9