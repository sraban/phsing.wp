<?php
/**
 * Extensions
 *
 * @package 	Ocean_Extra
 * @category 	Core
 * @author 		OceanWP
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
class Ocean_Extra_Extensions {

	/**
	 * Start things up
	 */
	public function __construct() {
		include_once( OE_PATH .'/includes/panel/assets/class-plugin-installer.php' );
		add_action( 'admin_menu', array( $this, 'add_page' ), 9999 );
	}

	/**
	 * Add sub menu page
	 *
	 * @since 1.0.0
	 */
	public function add_page() {
		add_submenu_page(
			'oceanwp-panel',
			esc_html__( 'Extensions', 'ocean-extra' ),
			'<span class="dashicons dashicons-star-filled" style="font-size: 16px; color: #ec4848;"></span> <span style="color: #ec4848">' . esc_html__( 'Extensions', 'ocean-extra' ) . '</span>',
			'manage_options',
			'oceanwp-panel-extensions',
			array( $this, 'create_admin_page' )
		);
	}

	/**
	 * Settings page output
	 *
	 * @since 1.0.0
	 */
	public function create_admin_page() {

		// Free extensions
		$free_plugins = array(
			array(
				'slug' => 'ocean-extra',
			),
			array(
				'slug' => 'ocean-social-sharing',
			),
			array(
				'slug' => 'ocean-product-sharing',
			),
			array(
				'slug' => 'ocean-custom-sidebar',
			),
			array(
				'slug' => 'ocean-demo-import',
			),
			array(
				'slug' => 'ocean-posts-slider',
			),
			array(
				'slug' => 'ocean-modal-window',
			),
		);

		// Premium extensions
		$premium_plugins = array(
			array(
				'slug' 			=> 'ocean-popup-login',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'Popup Login', 'ocean-extra' ),
				'description' 	=> esc_html__( 'A plugin to add a popup login, register and lost password form where you want.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/popup-login-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
			array(
				'slug' 			=> 'ocean-instagram',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'Instagram', 'ocean-extra' ),
				'description' 	=> esc_html__( 'A plugin to display your Instagram feed in a beautiful way.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/instagram-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
			array(
				'slug' 			=> 'ocean-portfolio',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'Portfolio', 'ocean-extra' ),
				'description' 	=> esc_html__( 'A complete extension to display your portfolio and work in a beautiful way.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/portfolio-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
			array(
				'slug' 			=> 'ocean-sticky-header',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'Sticky Header', 'ocean-extra' ),
				'description' 	=> esc_html__( 'Attach the header with or without the top bar at the top of your screen with an animation.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/sticky-header-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
			array(
				'slug' 			=> 'ocean-footer-callout',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'Footer Callout', 'ocean-extra' ),
				'description' 	=> esc_html__( 'Add some relevant/important information about your company or product in your footer.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/footer-callout-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
			array(
				'slug' 			=> 'ocean-elementor-widgets',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'Elementor Widgets', 'ocean-extra' ),
				'description' 	=> esc_html__( 'Add some new widgets to the popular free page builder Elementor.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/elementor-widgets-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
			array(
				'slug' 			=> 'ocean-side-panel',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'Side Panel', 'ocean-extra' ),
				'description' 	=> esc_html__( 'Add a responsive side panel with your preferred widgets inside.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/side-panel-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
			array(
				'slug' 			=> 'ocean-hooks',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'Ocean Hooks', 'ocean-extra' ),
				'description' 	=> esc_html__( 'Add your custom content throughout various areas of OceanWP without using child theme.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/ocean-hooks-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
			array(
				'slug' 			=> 'ocean-sticky-footer',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'Sticky Footer', 'ocean-extra' ),
				'description' 	=> esc_html__( 'A simple extension to attach the footer at the bottom of your screen.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/sticky-footer-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
			array(
				'slug' 			=> 'ocean-woo-popup',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'Woo Popup', 'ocean-extra' ),
				'description' 	=> esc_html__( 'A simple extension to display a popup when you click on the Add To Cart button.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/woo-popup-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
			array(
				'slug' 			=> 'ocean-white-label',
				'url' 			=> 'https://oceanwp.org/extension/',
				'name' 			=> esc_html__( 'White Label', 'ocean-extra' ),
				'description' 	=> esc_html__( 'A plugin which adds a new box in Theme Panel to allow you to replace the OceanWP name.', 'ocean-extra' ),
				'icons' 		=> plugins_url( '/assets/img/white-label-icon.png', __FILE__ ),
				'author' 		=> esc_html__( 'OceanWP', 'ocean-extra' ),
				'author_url' 	=> 'https://oceanwp.org/',
			),
		);

		// Affiliate link
		$ref_url = '';
		$aff_ref = apply_filters( 'ocean_affiliate_ref', $ref_url );

		// Add & is has referal link
		if ( $aff_ref ) {
			$if_ref = '&';
		} else {
			$if_ref = '?';
		} ?>

		<div id="oceanwp-extensions-wrap" class="wrap">
				
			<h2>OceanWP - <?php esc_attr_e( 'Extensions', 'ocean-extra' ); ?></h2>

			<div class="oceanwp-admin-notice">
				<div class="alignleft"><strong><?php esc_attr_e( 'Core Extensions Bundle', 'ocean-extra' ); ?></strong> – <?php esc_attr_e( 'Check out our extensions bundle which includes all premium extensions at a significant discount', 'ocean-extra' ); ?>.</div>

				<div class="alignright"><a href="https://oceanwp.org/core-extensions-bundle/<?php echo esc_attr( $aff_ref ); ?><?php echo $if_ref; ?>utm_source=admin-extensions&utm_medium=extension&utm_campaign=OWP-extensions-page&utm_content=Core Extensions Bundle" class="button button-primary" target="_blank"><?php esc_attr_e( 'View our Extensions Bundle', 'ocean-extra' ); ?></a></div>
			</div>
			
			<div class="oe-plugin-installer">
				<?php
				if ( class_exists( 'Ocean_Extra_Plugin_Installer' ) ) {
					Ocean_Extra_Plugin_Installer::init( $free_plugins );
					Ocean_Extra_Plugin_Installer::init_premium( $premium_plugins );
				} ?>
			</div>

		</div>
			
	<?php
	}
}
new Ocean_Extra_Extensions();