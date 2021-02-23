(function($) {  // Avoid conflicts with other libraries

'use strict';

$(function() {
	// Function to apply highlight class to an element identifier
	var highlight = function (id) {
		if (id) {
			$('#' + decodeURIComponent(id)).addClass('highlight');
		}
	};

	// Apply highlight to clicked rule anchor
	$('.rule-anchor').on('click', function () {
		$('li').removeClass('highlight');
		highlight($(this).closest('.rule-item').attr('id'));
	});

	// Apply highlight on page load to a rule category
	highlight(window.location.hash.substring(1));
});

})(jQuery); // Avoid conflicts with other libraries
