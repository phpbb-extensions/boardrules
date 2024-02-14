document.addEventListener('DOMContentLoaded', () => {
	'use strict';

	const boardRulesFontIcon = document.getElementById('boardrules_font_icon');

	boardRulesFontIcon.addEventListener('keyup', () => updateIcon());
	boardRulesFontIcon.addEventListener('blur', () => updateIcon());

	const updateIcon = () => {
		const input = boardRulesFontIcon.value;
		const icon = boardRulesFontIcon.nextElementSibling; // Assuming the <i> element is the next sibling

		if (icon && icon.tagName.toLowerCase() === 'i') {
			icon.setAttribute('class', 'icon fa-' + input);
		}
	};
});
