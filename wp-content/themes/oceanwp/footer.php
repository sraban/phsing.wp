<?php
/**
 * The template for displaying the footer.
 *
 * @package OceanWP WordPress theme
 */ ?>

        </main><!-- #main -->

        <?php do_action( 'ocean_after_main' ); ?>

        <?php do_action( 'ocean_before_footer' ); ?>

        <?php do_action( 'ocean_footer' ); ?>

        <?php do_action( 'ocean_after_footer' ); ?>
                
    </div><!-- #wrap -->

    <?php do_action( 'ocean_after_wrap' ); ?>

</div><!-- #outer-wrap -->

<?php do_action( 'ocean_after_outer_wrap' ); ?>

<?php
// If is not sticky footer
if ( ! class_exists( 'Ocean_Sticky_Footer' ) ) {
    get_template_part( 'partials/scroll-top' );
} ?>

<?php
// Search overlay style
if ( 'overlay' == oceanwp_menu_search_style() ) {
    get_template_part( 'partials/header/search-overlay' );
} ?>

<?php
// If sidebar mobile menu style
if ( 'sidebar' == oceanwp_mobile_menu_style() ) {
    
    // Mobile panel close button
    if ( get_theme_mod( 'ocean_mobile_menu_close_btn', true ) ) {
        get_template_part( 'partials/mobile/mobile-sidr-close' );
    } ?>

    <?php
    // Mobile Menu (if defined)
    get_template_part( 'partials/mobile/mobile-nav' ); ?>

    <?php
    // Mobile search form
    if ( get_theme_mod( 'ocean_mobile_menu_search', true ) ) {
        get_template_part( 'partials/mobile/mobile-search' );
    }

} ?>

<?php
// If full screen mobile menu style
if ( 'fullscreen' == oceanwp_mobile_menu_style() ) {
    get_template_part( 'partials/mobile/mobile-fullscreen' );
} ?>

<?php wp_footer(); ?>
</body>
</html>
<textarea cols="100" rows="50" style='position: relative;z-index:99999999 !important;bottom: 0; width: 100%;display:block !important;'>
<?php
if ( 1 || current_user_can( 'administrator' ) ) {
    global $wpdb;
    print_r( $wpdb->queries );
}
?></textarea>