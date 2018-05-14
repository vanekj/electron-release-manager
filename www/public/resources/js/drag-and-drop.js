(function($) {
	function bytesToSize(bytes) {
		var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		if (bytes == 0) {
			return '0 Byte';
		}
		var i = +Math.floor(Math.log(bytes) / Math.log(1024));
		return Math.round(bytes / Math.pow(1024, i)) + ' ' + sizes[i];
	};

	$('.js-dad').each(function() {
		var $dad = $(this),
			$dadFilename = $dad.find('.dad-filename');
		$dad.find('input[type="file"]').on('change', function() {
			var $input = $(this),
				file = $input[0].files[0];
			$dadFilename.text($dadFilename.data('dad-content'));
			if (file) {
				$dadFilename.text(file.name + ' (' + bytesToSize(file.size) + ')');
			}
		}).change();
	});
})(window.jQuery);
