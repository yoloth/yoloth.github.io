<?php
/**
 * Add Theme info Page
 */

function glamazon_fse_menu() {
	add_theme_page( esc_html__( 'Glamazon FSE', 'glamazon-fse' ), esc_html__( 'About Glamazon FSE', 'glamazon-fse' ), 'edit_theme_options', 'about-glamazon-fse', 'glamazon_fse_theme_page_display' );
}
add_action( 'admin_menu', 'glamazon_fse_menu' );

function glamazon_fse_admin_theme_style() {
	wp_enqueue_style('glamazon-fse-custom-admin-style', esc_url(get_template_directory_uri()) . '/assets/css/admin-styles.css');
}
add_action('admin_enqueue_scripts', 'glamazon_fse_admin_theme_style');

/**
 * Display About page
 */
function glamazon_fse_theme_page_display() {
	$theme = wp_get_theme();

	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	} ?>

		<div class="Grace-wrapper">
			<div class="Grcae-info-holder">
				<div class="Grcae-info-holder-content">
					<div class="Grace-Welcome">
						<h1 class="welcomeTitle"><?php esc_html_e( 'About Theme Info', 'glamazon-fse' ); ?></h1>                        
						<div class="featureDesc">
							<?php echo esc_html__( 'The Glamazon FSE is a free makeup salon WordPress theme for makeup artist, beauty spa, salon, massage, cosmetic shop, yoga, meditation, health care and wellness center.', 'glamazon-fse' ); ?>
						</div>
						
                        <h1 class="welcomeTitle"><?php esc_html_e( 'Theme Features', 'glamazon-fse' ); ?></h1>

                        <h2><?php esc_html_e( 'Block Compatibale', 'glamazon-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'glamazon-fse' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'Responsive Ready', 'glamazon-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'glamazon-fse' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'Cross Browser Compatible', 'glamazon-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'glamazon-fse' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'E-commerce', 'glamazon-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'glamazon-fse' ); ?>
                        </div>

					</div> <!-- .Grace-Welcome -->
				</div> <!-- .Grcae-info-holder-content -->
				
				
				<div class="Grcae-info-holder-sidebar">
                        <div class="sidebarBX">
                            <h2 class="sidebarBX-title"><?php echo esc_html__( 'Get Glamazon PRO', 'glamazon-fse' ); ?></h2>
                            <p><?php echo esc_html__( 'More features availbale on Premium version', 'glamazon-fse' ); ?></p>
                            <a href="<?php echo esc_url( 'https://gracethemes.com/themes/makeup-artist-wordpress-theme/' ); ?>" target="_blank" class="button"><?php esc_html_e( 'Get the PRO Version &rarr;', 'glamazon-fse' ); ?></a>
                        </div>


						<div class="sidebarBX">
							<h2 class="sidebarBX-title"><?php echo esc_html__( 'Important Links', 'glamazon-fse' ); ?></h2>

							<ul class="themeinfo-links">
                                <li>
									<a href="<?php echo esc_url( 'https://gracethemesdemo.com/glamazon/' ); ?>" target="_blank"><?php echo esc_html__( 'Demo Preview', 'glamazon-fse' ); ?></a>
								</li>                               
								<li>
									<a href="<?php echo esc_url( 'https://gracethemesdemo.com/documentation/glamazon/#homepage-lite' ); ?>" target="_blank"><?php echo esc_html__( 'Documentation', 'glamazon-fse' ); ?></a>
								</li>
								
								<li>
									<a href="<?php echo esc_url( 'https://gracethemes.com/wordpress-themes/' ); ?>" target="_blank"><?php echo esc_html__( 'View Our Premium Themes', 'glamazon-fse' ); ?></a>
								</li>
							</ul>
						</div>

						<div class="sidebarBX">
							<h2 class="sidebarBX-title"><?php echo esc_html__( 'Leave us a review', 'glamazon-fse' ); ?></h2>
							<p><?php echo esc_html__( 'If you are satisfied with Glamazon FSE, please give your feedback.', 'glamazon-fse' ); ?></p>
							<a href="https://wordpress.org/support/theme/glamazon-fse/reviews/" class="button" target="_blank"><?php esc_html_e( 'Submit a review', 'glamazon-fse' ); ?></a>
						</div>

				</div><!-- .Grcae-info-holder-sidebar -->	

			</div> <!-- .Grcae-info-holder -->
		</div><!-- .Grace-wrapper -->
<?php } ?>