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

			return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
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
							step: function (now) {
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