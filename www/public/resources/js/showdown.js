(function($, showdown) {
	var converter = new showdown.Converter();
	$('[data-md-target]').on('keyup', function() {
		$($(this).data('md-target')).html(converter.makeHtml($(this).val()));
	});
})(window.jQuery, window.showdown);
