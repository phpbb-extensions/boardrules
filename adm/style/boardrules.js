(function($) { // Avoid conflicts with other libraries

	'use strict';

	$('#boardrules_font_icon').on('keyup blur', function() {
		var input = $(this).val();
		var $icon = $(this).next('i');
		if (input.length > 0) {
			$icon.attr('class', 'fa-' + input);
		} else {
			$icon.attr('class', '');
		}
	});


})(jQuery);
