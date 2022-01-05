(function($) { // Avoid conflicts with other libraries

	'use strict';

	/* global Iconify */
	$('#boardrules_font_icon').on('keyup blur', function() {
		var input = $(this).val();
		var $icon = $(this).next('svg');
		if (input.length > 0) {
			input = input.indexOf(':') === -1 ? 'fa:' + input : input;
			Iconify.loadIcons([input], (loaded, missing, pending, unsubscribe) => {
				if (loaded.length) {
					$icon.remove().end().after(Iconify.renderHTML(input));
					return;
				}

				if (missing.length) {
					$icon.remove();
				}
			});
		}

		$icon.remove();
	});

})(jQuery);
