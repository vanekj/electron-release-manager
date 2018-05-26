(function($) {
	$('[enctype="multipart/form-data"]').on('submit', function(event) {
		event.preventDefault();
		var $form = $(this),
			$fileInputs = $form.find('[type="file"]');
		$fileInputs.each(function() {
			var $input = $(this),
				$progress = $input.parent().find('.progress-bar'),
				maxUploadSize = +$input.data('max-upload-size');
			$.each($(this)[0].files, function(index, file) {
				var uploaded = 0,
					step = !isNaN(maxUploadSize) && maxUploadSize > 0 ? maxUploadSize : 256,
					size = file.size,
					start = 0,
					reader = new FileReader(),
					blob = file.slice(start, step);
				reader.readAsBinaryString(blob);
				reader.onload = function() {
					var data = { file: reader.result };
					$.ajax({
						url: '/dashboard/versions/asset',
						type: 'POST',
						data: data
					}).done(function() {
						uploaded += step;
						var percent = Math.floor(uploaded / size * 100);
						if (percent > 100) {
							percent = 100;
						}
						$progress.css('width', percent + '%');
						if (uploaded <= size) {
							blob = file.slice(uploaded, uploaded + step);
							reader.readAsBinaryString(blob);
						} else {
							uploaded = size;
						}
					}).fail(function(error) {
						console.warn('Error: ', error);
					});
				};
			});
		});
	});
})(window.jQuery);
