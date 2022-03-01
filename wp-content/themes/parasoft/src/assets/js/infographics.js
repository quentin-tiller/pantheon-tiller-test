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