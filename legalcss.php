<?php
/*
Plugin Name: Legal CSS
Plugin URI: http://byronlevene.net
Description: This simple CSS class makes it easy to style the names of Acts in italics to conform with publishing requirements. This plugin aims to support AGLC3 Styling standards for legal documents. Currently in BETA, please email me if you are having issues.
Version: The Plugin's Version Number, e.g.: 0.0.1.9
Author: Byron Levene
Author URI: http://byronlevene.net
License: GPL2


    Copyright 2012  PLUGIN_AUTHOR_NAME  (email : contact@byronlevene.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('LEGALCSS_VERSION', '0.0.1.9');
define('LEGALCSS_PLUGIN_URL', plugin_dir_url( __FILE__ ));


 /**
     * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
     */
    add_action( 'wp_enqueue_scripts', 'prefix_add_stylesheet' );

    /**
     * Enqueue plugin style-file
     */
    function prefix_add_stylesheet() {
        wp_register_style( 'prefix-style', plugins_url('legalcss.css', __FILE__) );
        wp_enqueue_style( 'prefix-style' );
    }

	function sAct($atts, $content = null) {
   extract(shortcode_atts(array('link' => '/legalcss.css'), $atts));
   return '<span class="act" >' . do_shortcode($content) . '</span>';
}
add_shortcode('Act', 'sAct');
?>