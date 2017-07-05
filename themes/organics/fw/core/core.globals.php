<?php
/**
 * AxiomThemes Framework: global variables storage
 *
 * @package	axiomthemes
 * @since	axiomthemes 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('organics_storage_get')) {
	function organics_storage_get($var_name, $default='') {
		global $ORGANICS_GLOBALS;
		return isset($ORGANICS_GLOBALS[$var_name]) ? $ORGANICS_GLOBALS[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('organics_storage_set')) {
	function organics_storage_set($var_name, $value) {
		global $ORGANICS_GLOBALS;
		$ORGANICS_GLOBALS[$var_name] = $value;
	}
}

// Get global variable
if (!function_exists('organics_get_global')) {
	function organics_get_global($var_name) {
		global $ORGANICS_GLOBALS;
		return isset($ORGANICS_GLOBALS[$var_name]) ? $ORGANICS_GLOBALS[$var_name] : '';
	}
}

// Set global variable
if (!function_exists('organics_set_global')) {
	function organics_set_global($var_name, $value) {
		global $ORGANICS_GLOBALS;
		$ORGANICS_GLOBALS[$var_name] = $value;
	}
}

// Inc/Dec global variable with specified value
if (!function_exists('organics_inc_global')) {
	function organics_inc_global($var_name, $value=1) {
		global $ORGANICS_GLOBALS;
		$ORGANICS_GLOBALS[$var_name] += $value;
	}
}

// Concatenate global variable with specified value
if (!function_exists('organics_concat_global')) {
	function organics_concat_global($var_name, $value) {
		global $ORGANICS_GLOBALS;
		$ORGANICS_GLOBALS[$var_name] .= $value;
	}
}

// Get global array element
if (!function_exists('organics_get_global_array')) {
	function organics_get_global_array($var_name, $key) {
		global $ORGANICS_GLOBALS;
		return isset($ORGANICS_GLOBALS[$var_name][$key]) ? $ORGANICS_GLOBALS[$var_name][$key] : '';
	}
}

// Set global array element
if (!function_exists('organics_set_global_array')) {
	function organics_set_global_array($var_name, $key, $value) {
		global $ORGANICS_GLOBALS;
		if (!isset($ORGANICS_GLOBALS[$var_name])) $ORGANICS_GLOBALS[$var_name] = array();
		$ORGANICS_GLOBALS[$var_name][$key] = $value;
	}
}

// Inc/Dec global array element with specified value
if (!function_exists('organics_inc_global_array')) {
	function organics_inc_global_array($var_name, $key, $value=1) {
		global $ORGANICS_GLOBALS;
		$ORGANICS_GLOBALS[$var_name][$key] += $value;
	}
}

// Concatenate global array element with specified value
if (!function_exists('organics_concat_global_array')) {
	function organics_concat_global_array($var_name, $key, $value) {
		global $ORGANICS_GLOBALS;
		$ORGANICS_GLOBALS[$var_name][$key] .= $value;
	}
}
?>