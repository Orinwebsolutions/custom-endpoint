<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/Orinwebsolutions
 * @since      1.0.0
 *
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/admin
 * @author     Amila Priyanakara <amilapriyankara16@gmail.com>
 */
class Custom_Endpoint_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Custom_Endpoint_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Endpoint_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/custom-endpoint-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Custom_Endpoint_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Endpoint_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/custom-endpoint-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function admin_option_page()
	{
		add_menu_page(
            __( 'End point', 'custom-endpoint' ),
            __( 'End point settings', 'custom-endpoint' ),
            'manage_options',
			'custom-endpoint',
            array(
                $this,
                'settings_page'
			),
			'',
			'90'
			
        );
	}

	function settings_page() {
		include plugin_dir_path( __FILE__ ) . 'partials/custom-endpoint-admin-display.php';
	}
	
	
	function admin_field_settings() {
		register_setting( 
			'custom_endpoint_group', // settings group name 
			'_inpsyde_custom_endpoint', // option name
			'custom_endpoints_validate'  // sanitization function
		);
		add_settings_section( 
			'custom_endpoint_settings', // section ID
			'', //Title
			'', //Callback
			'custom-endpoint'// page slug
		);

		add_settings_field( 
			'some_iD', // section ID
			'Endpoint URL',  //title
			array($this,'custom_endpoint_field_callback'), //callback
			'custom-endpoint', //page slug 
			'custom_endpoint_settings',// settings ID
			array( 
				'label_for' => 'custom_endpoint_settings_url'
			)
		);
	}

	function custom_endpoint_field_callback() {
		$options = get_option( '_inpsyde_custom_endpoint' );
		$val = ($options['url'])? $options['url'] : '';
		echo "<input id='_inpsyde_custom_endpoint[url]' name='_inpsyde_custom_endpoint[url]' type='text' value='". esc_attr( $val ). "' /><br/><small>Enter url without spacing. Ex test_url/ testurl</small>";
	}
}
