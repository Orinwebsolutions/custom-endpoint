<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/Orinwebsolutions
 * @since      1.0.0
 *
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/public
 * @author     Amila Priyanakara <amilapriyankara16@gmail.com>
 */
class Custom_Endpoint_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/custom-endpoint-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'-boostrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array($this->plugin_name), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/custom-endpoint-public.js', array( 'jquery' ), $this->version, true );
		wp_localize_script( $this->plugin_name, 'wpAjax', array( 'ajaxurl' => admin_url('admin-ajax.php') ));

	}

	public function custom_init($wp_rewrite){
		$wp_rewrite->rules = array_merge(
			['my-api$' => 'index.php?custom_api=1'],
			$wp_rewrite->rules
		);
    }

    public function custom_query_vars( $query_vars ){
		$query_vars[] = 'custom_api';
		return $query_vars;
    }

    public function custom_template_redirect( ){
		// add_rewrite_endpoint( 'my-api', EP_PERMALINK );
		$custom_api = intval( get_query_var( 'custom_api' ) );
		if ( $custom_api ) {

			$result = get_transient('custom_end_point');

			if ($result === false) {
				$arg = array(); 
				$result = $this->request_new('GET', 'users', $arg);	
				set_transient('custom_end_point', $result, 3600);
			}
					
			include plugin_dir_path(  __FILE__ ) . 'partials/custom-endpoint-public-display.php';
			die;
		}
	}

	function request_new( $method, $endpoint, $body = '' ) {

		$requesturl = sprintf( '%s/%s/', 'https://jsonplaceholder.typicode.com', $endpoint );

		$params = array(
			'method'  => $method,
			'timeout' => 30
		);

		if ( ! empty( $body ) && is_string( $body ) ) {
			$params['body'] = $body;
		} else if ( ! empty( $body ) && is_array( $body ) ) {
			$requesturl .= '?' . http_build_query( $body );
		}

		$response = wp_remote_request( esc_url_raw( $requesturl ), $params );
		$status_code = wp_remote_retrieve_response_code( $response );

		if ( is_wp_error( $response ) ) {
			return $messages = $response->get_error_messages();
		} else {
			if ( isset( $response['body'] ) && $status_code == 200 ) {
				return json_decode($response['body']);
			} else {
				return false;
			}
		}

		return false;
	}
	public function get_user_details()
	{
		if ( !wp_verify_nonce( $_POST['userNonce'], "user_profile_nonce")) {
			exit("Not allowed!!");
		 }  
		 if($_POST['userId'])
		 {
						
			$result = get_transient('custom_end_point_user');

			if ($result === false || ($result[0]->id != $_POST['userId']) ) {
				$arg = array( 
					'id' => $_POST['userId'],  
				); 
				$result = $this->request_new('GET', 'users', $arg);
				set_transient('custom_end_point_user', $result, 3600);
			}

			wp_send_json($result);
		 }
	}

}
