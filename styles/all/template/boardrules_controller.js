document.addEventListener('DOMContentLoaded', () => {
	'use strict';
	// Function to apply highlight class to an element identifier
	const highlight = (id) => {
		if (id) {
			try {
				id = decodeURIComponent(id);
			} catch (e) {
				return;
			}

			document.getElementById(id).classList.add('highlight');
		}
	};

	// Apply highlight to clicked rule anchor
	document.querySelectorAll('.rule-anchor').forEach(anchor => {
		anchor.addEventListener('click', () => {
			document.querySelectorAll('li').forEach(li => li.classList.remove('highlight'));
			highlight(anchor.closest('.rule-item').id);
		});
	});

	// Apply highlight on page load to a rule category
	highlight(window.location.hash.substring(1));
});
