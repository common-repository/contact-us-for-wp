<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://contactuswp.com
 * @since      1.0.0
 *
 * @package    Contactuswp
 * @subpackage Contactuswp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Contactuswp
 * @subpackage Contactuswp/public
 * @author     Sana Azmeh <hello@contactuswp.com>
 */
class Contactuswp_Public {

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
		 * defined in Contactuswp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Contactuswp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugins_url('css/contactuswp-public.css', __FILE__), array(), filemtime( plugin_dir_path( __FILE__ ) . 'css/contactuswp-public.css' ), 'all' );

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
		 * defined in Contactuswp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Contactuswp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		$name_nonce = wp_create_nonce( 'ContactUsWP' );
		
		wp_enqueue_script('contactuswp-ajax-gscript', plugins_url('js/contactuswp-gscript.js', __FILE__), array('jquery'),  $this->version, false);
   		wp_localize_script('contactuswp-ajax-gscript', 
   		 					'contactuswp_ajax_obj', 
   		 					array(	'ajax_url' => admin_url( 'admin-ajax.php' ),
       		 						'nonce'    => $name_nonce,
    							) 
   		 					);
   		
   		wp_enqueue_script(  $this->plugin_name , plugins_url('js/contactuswp-public.js', __FILE__), array( 'jquery' ), filemtime( plugin_dir_path( __FILE__ ) . 'js/contactuswp-public.js' ), false );

	}

}
