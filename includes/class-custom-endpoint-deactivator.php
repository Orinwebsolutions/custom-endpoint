<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/Orinwebsolutions
 * @since      1.0.0
 *
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/includes
 * @author     Amila Priyanakara <amilapriyankara16@gmail.com>
 */
class Custom_Endpoint_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option( '_inpsyde_custom_endpoint' );
	}

}
