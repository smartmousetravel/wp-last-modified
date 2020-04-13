<?php
/*
Plugin Name: Last-Modified HTTP Header Field
Plugin URI: https://github.com/smartmousetravel/wp-last-modified-header
Description: Automatically add a Last-Modified HTTP response header field
Version: 1.0
Author: lucas@smartmousetravel.com
License: Apache 2.0
*/

function last_modified_header() {
  global $post;
  if (isset($post) && is_single()) {
    $modtime = strtotime($post->post_date_gmt);
    if (isset($post->post_modified))
      $modtime = strtotime($post->post_modified);
    $modtimestr = date("D, d M Y H:i:s", $modtime);
    header("Last-Modified: " . $modtimestr . " GMT");
  }
}

add_action('wp', 'last_modified_header');
?>
