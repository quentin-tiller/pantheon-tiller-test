function areValuesPopulated(e) {
	0 != e.value.length || e.placeholder || e.value ? e.closest('.hs-form-field').classList.add('filled') : e.closest('.hs-form-field').classList.remove('filled');
}

function checkAllFields() {
	var e, l = document.querySelectorAll('.hs-input');
	for (e = 0; e < l.length; e++) {
		var s = l[e];
		areValuesPopulated(s), s.addEventListener('focus', isFocused), s.addEventListener('blur', isNoLongerFocused);
	}
}

function checkDependentFields() {
	var e, l = document.querySelectorAll('.hs-dependent-field');
	for (e = 0; e < l.length; e++) {
		l[e].addEventListener('change', checkAllFields);
	}
}

function removePleaseSelect() {
	var e = document.querySelectorAll('select.hs-input option');
	for (i = 0; i < e.length; i++) 'Please Select' == e[i].text && (e[i].text = '');
}

function isFocused(e) {
	this.closest('.hs-form-field').classList.add('focused');
}

function isNoLongerFocused(e) {
	this.closest('.hs-form-field').classList.remove('focused'), areValuesPopulated(this);
}

window.addEventListener('message', function (e) {
	'hsFormCallback' === e.data.type && 'onFormReady' === e.data.eventName && (checkAllFields(),
		checkDependentFields(), removePleaseSelect());
});
