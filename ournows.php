<?php
/*
Plugin Name: OurNows
Plugin URI: http://wordpress.org/plugins/ournows/
Description: Embed your Now page in your website
Version: 1.1
Author: OurNows
Author URI: https://ournows.com
*/

function processCode( $atts ) {
	$defaults = array(
		'width' => '100%',
		'height' => '750',
	);

	foreach ( $defaults as $default => $value ) {
		if ( ! @array_key_exists( $default, $atts ) ) {
			$atts[$default] = $value;
		}
	}

	$html = "\n".'<!-- Ournows plugin -->'."\n";
	$html .= '<iframe style="border:none;" src="https://ournows.com/f/embed/_';
	foreach( $atts as $attr => $value ) {
		if ( strtolower($attr) == 'username') {
			$html .= esc_attr( $value ) . '"';
		} else { // adding all attributes
				$html .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
		} 
	}
	$html .= '></iframe>'."\n";

	return $html;
}
add_shortcode( 'ournows', 'processCode' );

