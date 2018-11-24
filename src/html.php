<?php

namespace ItalyStrap\HTML;

if ( ! function_exists( 'ItalyStrap\HTML\get_attr' ) ) {

	/**
	 * Build list of attributes into a string and apply contextual filter on string.
	 *
	 * The contextual filter is of the form `italystrap_attr_{context}_output`.
	 *
	 * @since 1.0.0
	 *
	 * @see In general-function on the plugin.
	 *
	 * @param  string $context    The context, to build filter name.
	 * @param  array  $attributes Optional. Extra attributes to merge with defaults.
	 * @param  bool   $echo       True for echoing or false for returning the value.
	 *                            Default false.
	 * @param  null   $args       Optional. Extra arguments in case is needed.
	 *
	 * @return string String of HTML attributes and values.
	 */
	function get_attr( $context, array $attr = array(), $echo = false, $args = null ) {

		$html = '';

		/**
		 * This filters the array with html attributes.
		 *
		 * @param  array  $attr    The array with all HTML attributes to render.
		 * @param  string $context The context in wich this functionis called.
		 * @param  null   $args    Optional. Extra arguments in case is needed.
		 *
		 * @var array
		 */
		$attr = (array) apply_filters( "italystrap_{$context}_attr", $attr, $context, $args );

		foreach ( $attr as $key => $value ) {

			if ( empty( $value ) ) {
				continue;
			}

			if ( true === $value ) {

				$html .= ' ' . esc_html( $key );
			} else {

				$html .= sprintf(
					' %s="%s"',
					esc_html( $key ),
					( 'href' === $key ) ? esc_url( $value ) : esc_attr( $value )
				);
			}
		}

		/**
		 * This filters the output of the html attributes.
		 *
		 * @param  string $html    The HTML attr output.
		 * @param  array  $attr    The array with all HTML attributes to render.
		 * @param  string $context The context in wich this functionis called.
		 * @param  null   $args    Optional. Extra arguments in case is needed.
		 *
		 * @var string
		 */
		$html = apply_filters( "italystrap_attr_{$context}_output", $html, $attr, $context, $args );

		if ( ! $echo ) {
			return $html;
		}

		echo $html;
	}
}

if ( ! function_exists( 'ItalyStrap\HTML\is_HTML' ) ) {

	/**
	 * https://subinsb.com/php-check-if-string-is-html/
	 *
	 * @param  string $string
	 *
	 * @return bool
	 */
	function is_HTML( $string ) {
		return $string !== strip_tags( $string );
	}
}
