(function($, window, document) {  // Avoid conflicts with other libraries

	$(document).ready(function () {

		// Apply highlight on page load
		highlight(window.location.hash.substring(1));

		// Apply highlight to clicked rule anchor
		$(".rule-anchor").on("click", function () {
			$("li").removeClass("highlight");
			highlight($(this).closest(".rule-item").attr("id"));
		});

		// Function to apply highlight class to an element identifier
		function highlight(id) {
			$("#" + id).addClass("highlight");
		}

	});
})(jQuery, window, document);
