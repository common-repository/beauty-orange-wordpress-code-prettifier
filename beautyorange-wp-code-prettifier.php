<?php
/*
Plugin Name: Beauty Orange WordPress Code Prettifier
Plugin URI: http://www.beautyorange.com/beauty-orange-projects/beauty-orange-wordpress-code-prettifier/
Description: A plugin for WordPress, syntax highlighting of source code snippets in post, this plugin integrates Google Code Prettify : <a href="http://code.google.com/p/google-code-prettify/">google-code-prettify</a>. Supports all C-like, Bash-like, and XML-like languages. No need to specify the language. Widely used with good cross-browser support.
Author: leo
Version: 1.02
Author URI: http://www.beautyorange.com
*/

wp_register_style('beautyorange-wp-code-prettifier', WP_PLUGIN_URL . '/'.basename(dirname(__FILE__)).'/prettify.css');
wp_register_script('beautyorange-wp-code-prettifier', WP_PLUGIN_URL . '/'.basename(dirname(__FILE__)).'/prettify.js', false, false, true);

wp_enqueue_style('beautyorange-wp-code-prettifier');
wp_enqueue_script('beautyorange-wp-code-prettifier');

function beautyorange_wp_code_prettifier_filter($content) {
	return preg_replace("|<pre(.*?)>(.*?)</pre>|ise", 
		"'<pre'.stripslashes('$1').'>'.str_replace(array('<', '>'), array('&lt;', '&gt;'), stripslashes('$2')).'</pre>'", $content);
}

add_filter('the_content', 'beautyorange_wp_code_prettifier_filter', 0);
?>
