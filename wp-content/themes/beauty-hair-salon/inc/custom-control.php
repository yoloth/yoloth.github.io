<?php


if( class_exists( 'WP_Customize_Control' ) ) {
	class Beauty_Hair_Salon_Customizer_Customcontrol_Switch extends WP_Customize_Control {

		// Declare the control type.
		public $type = 'switch';

		// Enqueue scripts and styles for the custom control.
		public function enqueue() {

			// Load style and scripts for deafault switch control.
			wp_enqueue_script( 'beauty-hair-salon-control-switch', trailingslashit( get_template_directory_uri() ) . 'assets/js/custom-controls.js', array( 'jquery' ) );

			wp_enqueue_style( 'beauty-hair-salon-control-switch', trailingslashit( get_template_directory_uri() ) . 'assets/css/custom-controls.css', '', time() );

		}

		// Render the control to be displayed in the Customizer.
		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$choices        = NULL;
			$count          = NULL;
			$class_button   = NULL;
			$class_selected = NULL;
			?>

			<?php if ( !empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>

			<?php if ( !empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<div class="switch-option">

			<?php
				$choices = $this->choices;
			?>

				<?php foreach ( $choices as $value => $label ) : ?>						

						<?php if ( empty( $count ) ) { $class_button = 'cb-enable'; } else { $class_button = 'cb-disable'; } ?>

						<?php if ( $this->value() == esc_attr( $value ) ) { $class_selected = ' selected'; } else { $class_selected = NULL; } ?>
						<?php if ( ! $this->value() and $class_button == 'cb-disable' ) { $class_selected = ' selected'; } ?>

						<label class="<?php echo esc_attr( $class_button ) . esc_attr( $class_selected ); ?>" value="<?php echo esc_attr( $value ); ?>">
							<span><?php echo esc_html( $label ); ?></span>
						</label>

						<?php $count++; ?>

				<?php endforeach; ?>
			</div>

			<input type="hidden" <?php esc_attr( $this->link() ); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
		<?php }
	}
}
// Heading

if( class_exists( 'WP_Customize_Control' ) ) {
	class Beauty_Hair_Salon_Customizer_Customcontrol_Section_Heading extends WP_Customize_Control {
 
 		// Declare the control type.
		public $type = 'section';

		// Render the control to be displayed in the Customizer.
		public function render_content() {
		?>
			<div class="head-customize-section-description cus-head">
				<span class="title head-customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( !empty( $this->description ) ) : ?>
				<span class="description-customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
			</div>
		<?php
		}
	}
}

class  Beauty_Hair_Salon_Text_Radio_Button_Custom_Control extends WP_Customize_Control {
    /**
    * The type of control being rendered
    */
    public $type = 'text_radio_button';
    /**
    * Enqueue our scripts and styles
    */
    public function enqueue() {
        wp_enqueue_style( 'beauty-hair-salon-controls-css', trailingslashit( esc_url(get_template_directory_uri()) ) . 'assets/css/custom-controls.css', array(), '1.0', 'all' );
    }
    /**
    * Render the control in the customizer
    */
    public function render_content() { ?>
        <div class = 'text_radio_button_control'>
            <?php if ( !empty( $this->label ) ) { ?>
                <span class = 'customize-control-title'><?php echo esc_html( $this->label );?></span>
            <?php }?>
            <?php if ( !empty( $this->description ) ) { ?>
                <span class = 'customize-control-description'><?php echo esc_html( $this->description ); ?></span>
            <?php } ?>
            <div class = 'radio-buttons'>
                <?php foreach ( $this->choices as $key => $value ) { ?>
                    <label class = 'radio-button-label'>
                        <input type = 'radio' name = "<?php echo esc_attr( $this->id ); ?>" value = "<?php echo esc_attr( $key ); ?>" <?php $this->link();?><?php checked( esc_attr( $key ), $this->value() );?>/>
                        <span><?php echo esc_html( $value );?></span>
                    </label>
                <?php }?>
            </div>
        </div>
    <?php } 
}