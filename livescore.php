<?php
/*
Plugin Name: LiveScore
Version: 3.7
Plugin URI: http://www.mackolik.org/live-score/
Description: This plugin adds online live scores to your blog. Before activate this plugin you must create a new page with name 'Live Score'
Author: iddaa
Author URI: https://www.mackolik.org/
*/

function live_score($content) {
	if ( is_page('Live Score') ) {
		include "livedet.php";				  
	}
return $content;
}

add_filter('the_content', 'live_score');

?>