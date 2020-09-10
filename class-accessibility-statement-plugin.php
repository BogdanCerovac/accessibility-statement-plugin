<?php

require_once 'class-statement-generator.php';

/**
 * Main Plugin File
 */
class AccessibilityStatementPlugin {
	/**
	 * Plugin admin sections
	 *
	 * @var array
	 */
	private $sections = array();

	/**
	 * Contructor
	 *
	 * Add admin pages and actions
	 *
	 * @return  void
	 */
	public function __construct() {
		$this->sections = array(
			new BasicInformation(),
			new YourEfforts(),
			new TechnicalInformation(),
			new AccessibilityLimitations(),
			new ApprovalAndComplaints(),
		);

		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_post_generate_statement', array( $this, 'create_page' ) );

		add_action( 'admin_notices', array( $this, 'add_admin_notices' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Enqueue JavaScript and CSS
	 *
	 * @return  void
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'accessibility-statement-generator', plugin_dir_url( __FILE__ ) . 'src/js/main.js', array(), false, true );
		wp_enqueue_style( 'accessibility-statement-generator', plugin_dir_url( __FILE__ ) . 'src/css/main.css' );
	}

	/**
	 * Add Settings page to Admin dashboard
	 *
	 * @return  void
	 */
	public function add_settings_page() {
		add_submenu_page( 'options-general.php', __( 'Accessibility Statement', 'a11y-statement' ), __( 'Accessibility', 'a11y-statement' ), 'manage_options', 'accessibility-statement', array( $this, 'page_contents' ) );
	}

	/**
	 * Get the Settings page contents
	 *
	 * @return  void
	 */
	public function page_contents() {
		echo psg_view(
			'settings-page',
			array(
				'sections' => $this->sections,
			)
		);
	}

	/**
	 * Create the accessibility statement
	 *
	 * @return  void
	 */
	public function create_page() {
		$generator = new StatementGenerator();
		$generator->create_page();
	}

	/**
	 * Display notices on settings page
	 *
	 * @return void
	 */
	public function add_admin_notices() {
		$screen = get_current_screen();

		if ( 'settings_page_accessibility-statement' === $screen->id ) {
			if ( isset( $_GET['success'] ) ) {
				add_settings_error( 'page_title', 'accessibility_statement_success', __( 'Accessibility Statement page updated successfully.', 'a11y-statement' ), 'success' );
			}

			if ( isset( $_GET['error'] ) ) {
				add_settings_error( 'page_title', 'accessiblity_statement_error', __( 'Unable to create an Accessibility Statement page.', 'a11y-statement' ), 'error' );
			}
		}
	}
}