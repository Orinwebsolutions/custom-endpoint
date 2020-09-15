<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/Orinwebsolutions
 * @since      1.0.0
 *
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/includes
 * @author     Amila Priyanakara <amilapriyankara16@gmail.com>
 */
class Custom_Endpoint_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$arg = ['url' => 'my-api' ];
		update_option( '_inpsyde_custom_endpoint', $arg ); 
	}

}
