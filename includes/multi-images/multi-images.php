<?php

add_action("admin_init", "images_init");

add_action('save_post', 'save_images_link');

function images_init(){
	$post_types = get_post_types();
	foreach ( $post_types as $post_type ) {
		add_meta_box("tangerine-attachments", "Attachments", "images_link", $post_type, "normal", "low");
	}
}

function images_link(){
	global $post;

	$custom  = get_post_custom($post->ID);
	$link    = $custom['_tangerine_attachments'][0];

	global $post;
	$image = get_post_meta($post->ID, '_tangerine_attachments', true);

	echo '<div class="attachments-header"><div id="attachments-container">';

	if($image) { 
		$image = explode(",", $image);
		
		foreach($image as $images){
			echo '<div data-image-id="'. $images .'" class="attachment-image">';
			echo wp_get_attachment_image($images,'thumbnail', 1, 1);
			echo '<div class="attachment-buttons"><a class="edit-attachment button">'. __( 'Edit', TANGERINE_TEXTDOMAIN ) .'</a><a class="remove-attachment button">'. __( 'Remove', TANGERINE_TEXTDOMAIN ) .'</a></div></div>';
		}
	}

	echo '</div></div>';

	echo '<input type="hidden" name="tangerine_attachments" class="attachments-field" value="'. $link .'" />';
	echo '<div class="attachments-footer"><a id="attach-image-button" type="button" class="button button-primary">'. __( 'Attach Images', TANGERINE_TEXTDOMAIN ) .'</a></div>';
}

function save_images_link(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){ return $post->ID; }
	update_post_meta($post->ID, '_tangerine_attachments', $_POST['tangerine_attachments']);
}

add_action('admin_enqueue_scripts', 'tangerine_attachments_scripts');

function tangerine_attachments_scripts() {
	wp_register_script( 'multi-images', get_template_directory_uri() .'/includes/multi-images/multi-images.js', array('jquery','media-upload','thickbox','jquery-ui-core','jquery-ui-sortable') );

	wp_enqueue_script('thickbox');  
	wp_enqueue_style('thickbox');  

	wp_enqueue_script('media-upload');
	wp_enqueue_script('multi-images');
}

function tangerine_attachments_list($size = 'gallery', $links = true, $link_class = 'th', $image_class = '', $before = '<ul>', $after = '</ul>', $before_link = '<li>', $after_link = '</li>' ) {
	global $post;
	$image = get_post_meta($post->ID, '_tangerine_attachments', true);

	if($image) { 
		$image = explode(",", $image);

		echo $before;
		foreach($image as $images){
			$url = wp_get_attachment_image_src($images, 1, 1);
			echo $before_link;

			if ($link == true) {
				echo '<a href="';
				echo $url[0];
				echo '" class="'. $class .'">';
				echo wp_get_attachment_image($images,$size, 1, array( 'class' => $image_class ));
				echo '</a>';
			} else {
				echo wp_get_attachment_image($images,$size, 1, array( 'class' => $image_class ));
			}
			echo $after_link;
		}
		echo $after;
	}
}

?>