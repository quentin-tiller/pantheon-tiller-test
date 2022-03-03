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
/******/ 	return __webpack_require__(__webpack_require__.s = 13);
/******/ })
/************************************************************************/
/******/ ({

/***/ 13:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(14);


/***/ }),

/***/ 14:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


jQuery(document).ready(function ($) {
	$('.pyd_heading').on('mouseover', function (e) {
		e.preventDefault();
		var target = $(this).attr('data-target');
		// console.log(target);
		if (target.indexOf(',') > -1) {
			var tarArray = target.split(',');
			tarArray.forEach(function (t) {
				$(t).addClass('show_gradient');
			});
		} else {
			$(target).addClass('show_gradient');
		}
	});
	$('.pyd_heading').on('mouseout', function (e) {
		e.preventDefault();
		var target = $(this).attr('data-target');
		if (target.indexOf(',') > -1) {
			var tarArray = target.split(',');
			tarArray.forEach(function (t) {
				$(t).removeClass('show_gradient');
			});
		} else {
			$(target).removeClass('show_gradient');
		}
	});
});

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgNTk5NzRhNmUxNGRmNjE3MGJiYWQiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9pbmZvZ3JhcGhpY3MuanMiXSwibmFtZXMiOlsialF1ZXJ5IiwiZG9jdW1lbnQiLCJyZWFkeSIsIiQiLCJvbiIsImUiLCJwcmV2ZW50RGVmYXVsdCIsInRhcmdldCIsImF0dHIiLCJpbmRleE9mIiwidGFyQXJyYXkiLCJzcGxpdCIsImZvckVhY2giLCJ0IiwiYWRkQ2xhc3MiLCJyZW1vdmVDbGFzcyJdLCJtYXBwaW5ncyI6IjtBQUFBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOzs7QUFHQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxtQ0FBMkIsMEJBQTBCLEVBQUU7QUFDdkQseUNBQWlDLGVBQWU7QUFDaEQ7QUFDQTtBQUNBOztBQUVBO0FBQ0EsOERBQXNELCtEQUErRDs7QUFFckg7QUFDQTs7QUFFQTtBQUNBOzs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDN0RBQSxPQUFPQyxRQUFQLEVBQWlCQyxLQUFqQixDQUF1QixVQUFVQyxDQUFWLEVBQWE7QUFDbkNBLEdBQUUsY0FBRixFQUFrQkMsRUFBbEIsQ0FBcUIsV0FBckIsRUFBa0MsVUFBVUMsQ0FBVixFQUFhO0FBQzlDQSxJQUFFQyxjQUFGO0FBQ0EsTUFBSUMsU0FBU0osRUFBRSxJQUFGLEVBQVFLLElBQVIsQ0FBYSxhQUFiLENBQWI7QUFDQTtBQUNBLE1BQUlELE9BQU9FLE9BQVAsQ0FBZSxHQUFmLElBQXNCLENBQUMsQ0FBM0IsRUFBOEI7QUFDN0IsT0FBSUMsV0FBV0gsT0FBT0ksS0FBUCxDQUFhLEdBQWIsQ0FBZjtBQUNBRCxZQUFTRSxPQUFULENBQWlCLFVBQVVDLENBQVYsRUFBYTtBQUM3QlYsTUFBRVUsQ0FBRixFQUFLQyxRQUFMLENBQWMsZUFBZDtBQUNBLElBRkQ7QUFHQSxHQUxELE1BS087QUFDTlgsS0FBRUksTUFBRixFQUFVTyxRQUFWLENBQW1CLGVBQW5CO0FBQ0E7QUFDRCxFQVpEO0FBYUFYLEdBQUUsY0FBRixFQUFrQkMsRUFBbEIsQ0FBcUIsVUFBckIsRUFBaUMsVUFBVUMsQ0FBVixFQUFhO0FBQzdDQSxJQUFFQyxjQUFGO0FBQ0EsTUFBSUMsU0FBU0osRUFBRSxJQUFGLEVBQVFLLElBQVIsQ0FBYSxhQUFiLENBQWI7QUFDQSxNQUFJRCxPQUFPRSxPQUFQLENBQWUsR0FBZixJQUFzQixDQUFDLENBQTNCLEVBQThCO0FBQzdCLE9BQUlDLFdBQVdILE9BQU9JLEtBQVAsQ0FBYSxHQUFiLENBQWY7QUFDQUQsWUFBU0UsT0FBVCxDQUFpQixVQUFVQyxDQUFWLEVBQWE7QUFDN0JWLE1BQUVVLENBQUYsRUFBS0UsV0FBTCxDQUFpQixlQUFqQjtBQUNBLElBRkQ7QUFHQSxHQUxELE1BS087QUFDTlosS0FBRUksTUFBRixFQUFVUSxXQUFWLENBQXNCLGVBQXRCO0FBQ0E7QUFDRCxFQVhEO0FBWUEsQ0ExQkQsRSIsImZpbGUiOiJpbmZvZ3JhcGhpY3MuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCJcIjtcblxuIFx0Ly8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4gXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhfX3dlYnBhY2tfcmVxdWlyZV9fLnMgPSAxMyk7XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gd2VicGFjay9ib290c3RyYXAgNTk5NzRhNmUxNGRmNjE3MGJiYWQiLCJqUXVlcnkoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgkKSB7XG5cdCQoJy5weWRfaGVhZGluZycpLm9uKCdtb3VzZW92ZXInLCBmdW5jdGlvbiAoZSkge1xuXHRcdGUucHJldmVudERlZmF1bHQoKTtcblx0XHR2YXIgdGFyZ2V0ID0gJCh0aGlzKS5hdHRyKCdkYXRhLXRhcmdldCcpO1xuXHRcdC8vIGNvbnNvbGUubG9nKHRhcmdldCk7XG5cdFx0aWYgKHRhcmdldC5pbmRleE9mKCcsJykgPiAtMSkge1xuXHRcdFx0dmFyIHRhckFycmF5ID0gdGFyZ2V0LnNwbGl0KCcsJyk7XG5cdFx0XHR0YXJBcnJheS5mb3JFYWNoKGZ1bmN0aW9uICh0KSB7XG5cdFx0XHRcdCQodCkuYWRkQ2xhc3MoJ3Nob3dfZ3JhZGllbnQnKTtcblx0XHRcdH0pO1xuXHRcdH0gZWxzZSB7XG5cdFx0XHQkKHRhcmdldCkuYWRkQ2xhc3MoJ3Nob3dfZ3JhZGllbnQnKTtcblx0XHR9XG5cdH0pO1xuXHQkKCcucHlkX2hlYWRpbmcnKS5vbignbW91c2VvdXQnLCBmdW5jdGlvbiAoZSkge1xuXHRcdGUucHJldmVudERlZmF1bHQoKTtcblx0XHR2YXIgdGFyZ2V0ID0gJCh0aGlzKS5hdHRyKCdkYXRhLXRhcmdldCcpO1xuXHRcdGlmICh0YXJnZXQuaW5kZXhPZignLCcpID4gLTEpIHtcblx0XHRcdHZhciB0YXJBcnJheSA9IHRhcmdldC5zcGxpdCgnLCcpO1xuXHRcdFx0dGFyQXJyYXkuZm9yRWFjaChmdW5jdGlvbiAodCkge1xuXHRcdFx0XHQkKHQpLnJlbW92ZUNsYXNzKCdzaG93X2dyYWRpZW50Jyk7XG5cdFx0XHR9KTtcblx0XHR9IGVsc2Uge1xuXHRcdFx0JCh0YXJnZXQpLnJlbW92ZUNsYXNzKCdzaG93X2dyYWRpZW50Jyk7XG5cdFx0fVxuXHR9KTtcbn0pO1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3NyYy9hc3NldHMvanMvaW5mb2dyYXBoaWNzLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==