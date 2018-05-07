(function($) {
	$('.js-form-modal').on('click', function(event) {
		var $modal = $($(this).data('target'));
		if ($modal.length) {
			$.each($(this).data(), function(key, value) {
				$modal.find(':input[data-value="' + key + '"]').val(value);
			});
		} else if (typeof console === 'object' && console && typeof console.warn === 'function') {
			console.warn('Modal not found.', event);
		}
	});
})(window.jQuery);
