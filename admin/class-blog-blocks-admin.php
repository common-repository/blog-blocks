<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://businessupwebsite.com
 * @since      1.0.0
 *
 * @package    Blog_Blocks
 * @subpackage Blog_Blocks/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Blog_Blocks
 * @subpackage Blog_Blocks/admin
 * @author     Ivan Chernyakov <admin@businessupwebsite.com>
 */
class Blog_Blocks_Admin {

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
		 * defined in Blog_Blocks_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blog_Blocks_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/blog-blocks-admin.css', array(), $this->version, 'all' );

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
		 * defined in Blog_Blocks_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blog_Blocks_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/blog-blocks-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Gutenberg block category for blog-blocks.
	 *
	 * @since 1.0.0
	 */
	public function register_block_category( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'blog-blocks',
					'title' => __( 'Blog Blocks', 'blog-blocks' ),
				),
			)
		);
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function register_block_info_box() {
		wp_register_script(
			'blog-blocks-notice',
			plugin_dir_url( __FILE__ ) . 'js/blog-blocks-admin-notice.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'underscore' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'js/blog-blocks-admin-notice.js' )
		);

		register_block_type( 'blog-blocks/notice', array(
			'editor_script' => 'blog-blocks-notice',
			'editor_style' => 'blog-blocks-notice'
		) );

		if ( function_exists( 'wp_set_script_translations' ) ) {
	    wp_set_script_translations( 'blog-blocks-notice', 'blog-blocks' );
	  }
	}

}
