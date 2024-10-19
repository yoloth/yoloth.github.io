<?php
/**
 * Theme functions and definitions
 *
 * @package beauty_hair_salon
 */

// enque files
if ( ! function_exists( 'beauty_hair_salon_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function beauty_hair_salon_enqueue_styles() {
		wp_enqueue_style( 'beauty-salon-spa-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'beauty-hair-salon-style', get_stylesheet_directory_uri() . '/style.css', array( 'beauty-salon-spa-style-parent' ), '1.0.0' );
		// Theme Customize CSS.
		require get_parent_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'beauty-hair-salon-style',$beauty_salon_spa_custom_style );
		require get_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'beauty-hair-salon-style',$beauty_salon_spa_custom_style );

		// blocks css
        wp_enqueue_style( 'beauty-hair-salon-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'beauty-hair-salon-style' ), '1.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'beauty_hair_salon_enqueue_styles', 99 );

// theme setup
function beauty_hair_salon_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'beauty-hair-salon-featured-image', 2000, 1200, true );
	add_image_size( 'beauty-hair-salon-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'beauty-hair-salon' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, and column width.
	*/
	add_editor_style( array( 'assets/css/editor-style.css') );
}
add_action( 'after_setup_theme', 'beauty_hair_salon_setup' );

// custom header setup
function beauty_hair_salon_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'beauty_hair_salon_custom_header_args', array(
		'default-image'          => get_parent_theme_file_uri( '/assets/images/header-img-3.png' ),
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 100,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'beauty_salon_spa_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'beauty_hair_salon_custom_header_setup' );

// widgets
function beauty_hair_salon_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'beauty-hair-salon' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'beauty-hair-salon' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'beauty-hair-salon' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'beauty-hair-salon' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'beauty-hair-salon' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'beauty-hair-salon' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'beauty-hair-salon' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-hair-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'beauty-hair-salon' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-hair-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'beauty-hair-salon' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-hair-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'beauty-hair-salon' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-hair-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'beauty_hair_salon_widgets_init' );

// remove sections
function beauty_hair_salon_customize_register() {
  	global $wp_customize;
	$wp_customize->remove_section( 'beauty_salon_spa_pro' );

	$wp_customize->remove_setting('beauty_salon_spa_slider_content_alignment');
	$wp_customize->remove_control('beauty_salon_spa_slider_content_alignment');

	$wp_customize->remove_setting('beauty_salon_spa_footer_text');
	$wp_customize->remove_control('beauty_salon_spa_footer_text');

	$wp_customize->remove_setting('beauty_salon_spa_primary_color');
	$wp_customize->remove_control('beauty_salon_spa_primary_color');


	$wp_customize->remove_setting('beauty_salon_spa_text_color');
	$wp_customize->remove_control('beauty_salon_spa_text_color');


	$wp_customize->remove_setting('beauty_salon_spa_primary_fade');
	$wp_customize->remove_control('beauty_salon_spa_primary_fade');

	$wp_customize->remove_setting('beauty_salon_spa_footer_bg');
	$wp_customize->remove_control('beauty_salon_spa_footer_bg');
}
add_action( 'customize_register', 'beauty_hair_salon_customize_register', 11 );

// customizer
function beauty_hair_salon_customize( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

	require get_theme_file_path( 'inc/custom-control.php' );

	// pro section
	$wp_customize->add_section('beauty_hair_salon_pro', array(
		'title'    => __('UPGRADE HAIR SALON PREMIUM', 'beauty-hair-salon'),
		'priority' => 1,
	));
	$wp_customize->add_setting('beauty_hair_salon_pro', array(
		'default'           => null,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(new Beauty_Hair_Salon_Pro_Control($wp_customize, 'beauty_hair_salon_pro', array(
		'label'    => __('HAIR SALON PREMIUM', 'beauty-hair-salon'),
		'section'  => 'beauty_hair_salon_pro',
		'settings' => 'beauty_hair_salon_pro',
		'priority' => 1,
	)));

	// slider content alignment
	$wp_customize->add_setting( 'beauty_hair_salon_slider_content_alignment',
		array(
			'default' => 'RIGHT-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Beauty_Hair_Salon_Text_Radio_Button_Custom_Control( $wp_customize, 'beauty_hair_salon_slider_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Slider Content Alignment', 'beauty-hair-salon' ),
			'section' => 'beauty_salon_spa_slider_section',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','beauty-hair-salon'),
	            'CENTER-ALIGN' => __('CENTER','beauty-hair-salon'),
	            'RIGHT-ALIGN' => __('RIGHT','beauty-hair-salon'),
			),
		)
	) );

	// Product
    $wp_customize->add_section('beauty_hair_salon_shop_section',array(
		'title'	=> __('Product Settings','beauty-hair-salon'),
		'priority'	=> 5,
		'panel' => 'beauty_salon_spa_custompage_panel',
	));
    $wp_customize->add_setting( 'beauty_hair_salon_shop_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Hair_Salon_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_hair_salon_shop_heading', array(
		'label'       => esc_html__( 'Product Settings', 'beauty-hair-salon' ),		
		'section'     => 'beauty_hair_salon_shop_section',
		'settings'    => 'beauty_hair_salon_shop_heading',
	) ) );
	$wp_customize->add_setting(
		'beauty_hair_salon_shop_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Hair_Salon_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_hair_salon_shop_show_hide',
			array(
				'settings'        => 'beauty_hair_salon_shop_show_hide',
				'section'         => 'beauty_hair_salon_shop_section',
				'label'           => __( 'Check To show Section', 'beauty-hair-salon' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-hair-salon' ),
					'off'    => __( 'Off', 'beauty-hair-salon' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('beauty_hair_salon_shop_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('beauty_hair_salon_shop_text',array(
		'type' => 'text',
		'label' => __('Sub Heading Text','beauty-hair-salon'),
		'section' => 'beauty_hair_salon_shop_section',
	));
	$wp_customize->add_setting('beauty_hair_salon_shop_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('beauty_hair_salon_shop_title',array(
		'type' => 'text',
		'label' => __('Heading Text','beauty-hair-salon'),
		'section' => 'beauty_hair_salon_shop_section',
	));

	// Product settings
	$beauty_hair_salon_args = array(
	    'type'                     => 'product',
	    'child_of'                 => 0,
	    'parent'                   => '',
	    'orderby'                  => 'term_group',
	    'order'                    => 'ASC',
	    'hide_empty'               => false,
	    'hierarchical'             => 1,
	    'number'                   => '',
	    'taxonomy'                 => 'product_cat',
	    'pad_counts'               => false
	);
	$categories = get_categories($beauty_hair_salon_args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
	if($m==0){
		$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('beauty_hair_salon_shop_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_select',
	));
	$wp_customize->add_control('beauty_hair_salon_shop_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display products ','beauty-hair-salon'),
		'section' => 'beauty_hair_salon_shop_section',
	));

	$wp_customize->add_setting('beauty_hair_salon_shop_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('beauty_hair_salon_shop_number',array(
		'label'	=> __('Number of products','beauty-hair-salon'),
		'section' => 'beauty_hair_salon_shop_section',
		'type'	  => 'number',
	));

	$wp_customize->add_setting('beauty_hair_salon_footer_text',array(
		'default'	=> 'Beauty WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_hair_salon_footer_text',array(
		'label'	=> esc_html__('Copyright Text','beauty-hair-salon'),
		'section'	=> 'beauty_salon_spa_footer_copyright',
		'type'		=> 'textarea'
	));

	//colors

    $wp_customize->add_setting('beauty_hair_salon_primary_color', array(
	    'default' => '#e782a0',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_hair_salon_primary_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Color', 'beauty-hair-salon'),
	 
	)));

	$wp_customize->add_setting('beauty_hair_salon_text_color', array(
	    'default' => '#9f88a2',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_hair_salon_text_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Text Color', 'beauty-hair-salon'),
	 
	)));

	$wp_customize->add_setting('beauty_hair_salon_secondary', array(
	    'default' => '#541f5c',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_hair_salon_secondary', array(
	    'section' => 'colors',
	    'label' => esc_html__('theme Secondary Color', 'beauty-hair-salon'),
	 
	)));

	$wp_customize->add_setting('beauty_hair_salon_primary_fade', array(
	    'default' => '#ffeff4',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_hair_salon_primary_fade', array(
	    'section' => 'colors',
	    'label' => esc_html__('theme Color Fade', 'beauty-hair-salon'),
	 
	)));

	$wp_customize->add_setting('beauty_hair_salon_footer_bg', array(
	    'default' => '#541f5c',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_hair_salon_footer_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('Footer Bg color', 'beauty-hair-salon'),
	)));
}
add_action( 'customize_register', 'beauty_hair_salon_customize' );

// comments
function beauty_hair_salon_enqueue_comments_reply() {
  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
}
add_action(  'wp_enqueue_scripts', 'beauty_hair_salon_enqueue_comments_reply' );

// Footer Text
function beauty_hair_salon_copyright_link() {
    $beauty_hair_salon_footer_text = get_theme_mod('beauty_hair_salon_footer_text', esc_html__('Beauty WordPress Theme', 'beauty-hair-salon'));
    $beauty_hair_salon_credit_link = esc_url('https://www.ovationthemes.com/products/free-beauty-wordpress-theme');

    echo '<a href="' . $beauty_hair_salon_credit_link . '" target="_blank">' . esc_html($beauty_hair_salon_footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'beauty-hair-salon') . '</span></a>';
}

if ( ! defined( 'BEAUTY_HAIR_SALON_PRO_LINK' ) ) {
	define('BEAUTY_HAIR_SALON_PRO_LINK',__('https://www.ovationthemes.com/products/hair-salon-wordpress-theme','beauty-hair-salon'));
}

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Beauty_Hair_Salon_Pro_Control')):
    class Beauty_Hair_Salon_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( BEAUTY_HAIR_SALON_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE HAIR SALON PREMIUM','beauty-hair-salon');?> </a>
            </div>
            <div class="col-md">
                <img class="beauty_hair_salon_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('HAIR SALON PREMIUM - Features', 'beauty-hair-salon'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'beauty-hair-salon');?> </li>
                    <li class="upsell-beauty_hair_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'beauty-hair-salon');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( BEAUTY_HAIR_SALON_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE HAIR SALON PREMIUM','beauty-hair-salon');?> </a>
            </div>
        </label>
    <?php } }
endif;

if ( ! defined( 'BEAUTY_SALON_SPA_SUPPORT' ) ) {
	define('BEAUTY_SALON_SPA_SUPPORT',__('https://wordpress.org/support/theme/beauty-hair-salon','beauty-hair-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_REVIEW' ) ) {
	define('BEAUTY_SALON_SPA_REVIEW',__('https://wordpress.org/support/theme/beauty-hair-salon/reviews/','beauty-hair-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_LIVE_DEMO' ) ) {
	define('BEAUTY_SALON_SPA_LIVE_DEMO',__('https://trial.ovationthemes.com/beauty-hair-salon/','beauty-hair-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_BUY_PRO' ) ) {
	define('BEAUTY_SALON_SPA_BUY_PRO',__('https://www.ovationthemes.com/products/hair-salon-wordpress-theme','beauty-hair-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_PRO_DOC' ) ) {
	define('BEAUTY_SALON_SPA_PRO_DOC',__('https://trial.ovationthemes.com/docs/ot-beauty-hair-salon-pro-doc/','beauty-hair-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_FREE_DOC' ) ) {
define('BEAUTY_SALON_SPA_FREE_DOC',__('https://trial.ovationthemes.com/docs/ot-beauty-hair-salon-free-doc/','beauty-hair-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_THEME_NAME' ) ) {
	define('BEAUTY_SALON_SPA_THEME_NAME',__('Premium Hair Salon Theme','beauty-hair-salon'));
}