(function($) { // Avoid conflicts with other libraries

	'use strict';

	$('#boardrules_font_icon').on('keyup blur', function() {
		var input = $(this).val();
		var $icon = $(this).next('svg');
		if (input.length > 0) {
			input = input.indexOf(':') === -1 ? 'fa:' + input : input;
			if (Iconify.iconExists(input)) {
				$icon.remove().end().after(Iconify.renderHTML(input));
				return;
			}
		}

		$icon.remove();
	});

})(jQuery);
