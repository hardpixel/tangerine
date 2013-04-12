<?php

/**
 * Clean up wp_head()
 */

function tangerine_head_cleanup() {
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));

	add_filter('use_default_gallery_style', '__return_null');

	if (!class_exists('WPSEO_Frontend')) {
		remove_action('wp_head', 'rel_canonical');
		add_action('wp_head', 'tangerine_rel_canonical');
	}
}


function tangerine_rel_canonical() {
	global $wp_the_query;

	if (!is_singular()) {
		return;
	}

	if (!$id = $wp_the_query->get_queried_object_id()) {
		return;
	}

	$link = get_permalink($id);
	echo "\t<link rel=\"canonical\" href=\"$link\">\n";
}

add_action('init', 'tangerine_head_cleanup');


/**
 * Remove the WordPress version from RSS feeds
 */

add_filter('the_generator', '__return_false');


/**
 * Clean up language_attributes() used in <html> tag
 */

function tangerine_language_attributes() {
	$attributes = array();
	$output = '';

	if (function_exists('is_rtl')) {
		if (is_rtl() == 'rtl') {
			$attributes[] = 'dir="rtl"';
		}
	}

	$lang = get_bloginfo('language');

	if ($lang && $lang !== 'en-US') {
		$attributes[] = "lang=\"$lang\"";
	} else {
		$attributes[] = 'lang="en"';
	}

	$output = implode(' ', $attributes);
	$output = apply_filters('tangerine_language_attributes', $output);

	return $output;
}

add_filter('language_attributes', 'tangerine_language_attributes');


/**
 * Clean up output of stylesheet <link> tags
 */

function tangerine_clean_style_tag($input) {
	preg_match_all("!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches);
	// Only display media if it's print
	$media = $matches[3][0] === 'print' ? ' media="print"' : '';
	return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}

add_filter('style_loader_tag', 'tangerine_clean_style_tag');


/**
 * Wrap embedded media as suggested by Readability
 */

function tangerine_embed_wrap($cache, $url, $attr = '', $post_ID = '') {
	return '<div class="entry-content-asset">' . $cache . '</div>';
}

add_filter('embed_oembed_html', 'tangerine_embed_wrap', 10, 4);
add_filter('embed_googlevideo', 'tangerine_embed_wrap', 10, 2);


/**
 * Add class="th" to attachment items
 */

function tangerine_attachment_link_class($html) {
	$postid = get_the_ID();
	$html = str_replace('<a', '<a class="th"', $html);
	return $html;
}

add_filter('wp_get_attachment_link', 'tangerine_attachment_link_class', 10, 1);

/**
 * Add thumbnail styling to images with captions
 * Use <figure> and <figcaption>
 */
function tangerine_caption($output, $attr, $content) {
	if (is_feed()) {
		return $output;
	}

	$defaults = array(
		'id'      => '',
		'align'   => 'alignnone',
		'width'   => '',
		'caption' => ''
	);

	$attr = shortcode_atts($defaults, $attr);

	// If the width is less than 1 or there is no caption, return the content wrapped between the [caption] tags
	if ($attr['width'] < 1 || empty($attr['caption'])) {
		return $content;
	}

	// Set up the attributes for the caption <figure>
	$attributes  = (!empty($attr['id']) ? ' id="' . esc_attr($attr['id']) . '"' : '' );
	$attributes .= ' class="thumbnail wp-caption ' . esc_attr($attr['align']) . '"';
	$attributes .= ' style="width: ' . esc_attr($attr['width']) . 'px"';

	$output  = '<figure' . $attributes .'>';
	$output .= do_shortcode($content);
	$output .= '<figcaption class="caption wp-caption-text">' . $attr['caption'] . '</figcaption>';
	$output .= '</figure>';

	return $output;
}

add_filter('img_caption_shortcode', 'tangerine_caption', 10, 3);


/**
 * Clean up gallery_shortcode()
 */

function tangerine_gallery($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if (!empty($attr['ids'])) {
		if (empty($attr['orderby'])) {
		$attr['orderby'] = 'post__in';
	}
		$attr['include'] = $attr['ids'];
	}

	$output = apply_filters('post_gallery', '', $attr);

	if ($output != '') {
		return $output;
	}

	if (isset($attr['orderby'])) {
		$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
		if (!$attr['orderby']) {
			unset($attr['orderby']);
		}
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => '',
		'icontag'    => '',
		'captiontag' => '',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);

	if ($order === 'RAND') {
		$orderby = 'none';
	}

	if (!empty($include)) {
		$_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

		$attachments = array();
		foreach ($_attachments as $key => $val) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif (!empty($exclude)) {
		$attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
	} else {
		$attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
	}

	if (empty($attachments)) {
		return '';
	}

	if (is_feed()) {
		$output = "\n";
		foreach ($attachments as $att_id => $attachment) {
		$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		}
		return $output;
	}

	$output = '<div class="gallery small-12"><ul class="small-block-grid-3 large-block-grid-'. $columns .'" data-clearing>';

	$i = 0;
	foreach ($attachments as $id => $attachment) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, false, false);

		$output .= '<li>' . $link;
		if (trim($attachment->post_excerpt)) {
		$output .= '<div class="caption">' . wptexturize($attachment->post_excerpt) . '</div>';
		}
		$output .= '</li>';
	}

	$output .= '</ul></div>';

	return $output;
}

remove_shortcode('gallery');
add_shortcode('gallery', 'tangerine_gallery');


/**
 * Remove unnecessary self-closing tags
 */

function tangerine_remove_self_closing_tags($input) {
	return str_replace(' />', '>', $input);
}

add_filter('get_avatar',          'tangerine_remove_self_closing_tags'); // <img />
add_filter('comment_id_fields',   'tangerine_remove_self_closing_tags'); // <input />
add_filter('post_thumbnail_html', 'tangerine_remove_self_closing_tags'); // <img />


/**
 * Don't return the default description in the RSS feed if it hasn't been changed
 */
function tangerine_remove_default_description($bloginfo) {
	$default_tagline = 'Just another WordPress site';

	return ($bloginfo === $default_tagline) ? '' : $bloginfo;
}

add_filter('get_bloginfo_rss', 'tangerine_remove_default_description');


/**
 * Allow more tags in TinyMCE including <iframe> and <script>
 */

function tangerine_change_mce_options($options) {
	$ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src],script[charset|defer|language|src|type]';

	if (isset($initArray['extended_valid_elements'])) {
		$options['extended_valid_elements'] .= ',' . $ext;
	} else {
		$options['extended_valid_elements'] = $ext;
	}

	return $options;
}

add_filter('tiny_mce_before_init', 'tangerine_change_mce_options');


/**
 * Fix for empty search queries redirecting to home page
 */

function tangerine_request_filter($query_vars) {
	if (isset($_GET['s']) && empty($_GET['s'])) {
		$query_vars['s'] = ' ';
	}

	return $query_vars;
}

add_filter('request', 'tangerine_request_filter');
