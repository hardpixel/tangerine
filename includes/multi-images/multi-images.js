jQuery(document).ready(function($){

	function updateAttachedImages () {
		var images = new Array();

		$("#attachments-container").find('.attachment-image').each(function() {
			images.push($(this).attr('data-image-id'));
		});

		$('.attachments-field').val(images.join(','));
	}

	$.fn.removeAttachedImage = function () {

		$(this).on('click', function () {
			var $image = $(this).parents('.attachment-image').filter(':first');

			$image.remove();
			updateAttachedImages();
		});
	}

	$('#attachments-container').sortable({
		placeholder: 'attachment-placeholder',
		stop: function( event, ui ) { updateAttachedImages(); }
	});

	$('#attachments-container').disableSelection();

	$('#attach-image-button').click(function(e) {
		e.preventDefault();

		var custom_uploader = wp.media({
			title: 'Attach Images',
			button: {
				text: 'Attach Image'
			},
			multiple: true
		})
		.on('select', function() {
			var selection = custom_uploader.state().get('selection');

			selection.map(function(attachment) {
				attachment = attachment.toJSON();
				imageblock = '<div data-image-id="'+ attachment.id +'" class="attachment-image"><img src="'+ attachment.sizes.thumbnail.url +'" alt="'+ attachment.title +'" /><div class="attachment-buttons"><a class="edit-attachment button">Edit</a><a class="remove-attachment button">Remove</a></div></div>';
				
				$('#attachments-container').append(imageblock);
				updateAttachedImages();
			});

			$('.remove-attachment').removeAttachedImage();
		})
		.open();
	});

	$('.edit-attachment').click(function(event) {
		event.preventDefault();

		var $current = $(this).parents('.attachment-image').filter(':first'),
			$image = $current.find('img');

		var custom_uploader = wp.media({
			title: 'Replace Attached Image',
			button: {
				text: 'Replace Image'
			},
			multiple: false
		})
		.on('select', function() {
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			$image.attr('src', attachment.url);
			$current.attr('data-image-id', attachment.id);

			updateAttachedImages();
		})
		.open();
	});

	$('.remove-attachment').removeAttachedImage();

}); 