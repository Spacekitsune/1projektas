<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Web_Designer_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'web-designer-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'web-designer' ),
				'family'      => esc_html__( 'Font Family', 'web-designer' ),
				'size'        => esc_html__( 'Font Size',   'web-designer' ),
				'weight'      => esc_html__( 'Font Weight', 'web-designer' ),
				'style'       => esc_html__( 'Font Style',  'web-designer' ),
				'line_height' => esc_html__( 'Line Height', 'web-designer' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'web-designer' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'web-designer-ctypo-customize-controls' );
		wp_enqueue_style(  'web-designer-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'web-designer' ),
        'Abril Fatface' => __( 'Abril Fatface', 'web-designer' ),
        'Acme' => __( 'Acme', 'web-designer' ),
        'Anton' => __( 'Anton', 'web-designer' ),
        'Architects Daughter' => __( 'Architects Daughter', 'web-designer' ),
        'Arimo' => __( 'Arimo', 'web-designer' ),
        'Arsenal' => __( 'Arsenal', 'web-designer' ),
        'Arvo' => __( 'Arvo', 'web-designer' ),
        'Alegreya' => __( 'Alegreya', 'web-designer' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'web-designer' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'web-designer' ),
        'Bangers' => __( 'Bangers', 'web-designer' ),
        'Boogaloo' => __( 'Boogaloo', 'web-designer' ),
        'Bad Script' => __( 'Bad Script', 'web-designer' ),
        'Bitter' => __( 'Bitter', 'web-designer' ),
        'Bree Serif' => __( 'Bree Serif', 'web-designer' ),
        'BenchNine' => __( 'BenchNine', 'web-designer' ),
        'Cabin' => __( 'Cabin', 'web-designer' ),
        'Cardo' => __( 'Cardo', 'web-designer' ),
        'Courgette' => __( 'Courgette', 'web-designer' ),
        'Cherry Swash' => __( 'Cherry Swash', 'web-designer' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'web-designer' ),
        'Crimson Text' => __( 'Crimson Text', 'web-designer' ),
        'Cuprum' => __( 'Cuprum', 'web-designer' ),
        'Cookie' => __( 'Cookie', 'web-designer' ),
        'Chewy' => __( 'Chewy', 'web-designer' ),
        'Days One' => __( 'Days One', 'web-designer' ),
        'Dosis' => __( 'Dosis', 'web-designer' ),
        'Droid Sans' => __( 'Droid Sans', 'web-designer' ),
        'Economica' => __( 'Economica', 'web-designer' ),
        'Fredoka One' => __( 'Fredoka One', 'web-designer' ),
        'Fjalla One' => __( 'Fjalla One', 'web-designer' ),
        'Francois One' => __( 'Francois One', 'web-designer' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'web-designer' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'web-designer' ),
        'Great Vibes' => __( 'Great Vibes', 'web-designer' ),
        'Handlee' => __( 'Handlee', 'web-designer' ),
        'Hammersmith One' => __( 'Hammersmith One', 'web-designer' ),
        'Inconsolata' => __( 'Inconsolata', 'web-designer' ),
        'Indie Flower' => __( 'Indie Flower', 'web-designer' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'web-designer' ),
        'Julius Sans One' => __( 'Julius Sans One', 'web-designer' ),
        'Josefin Slab' => __( 'Josefin Slab', 'web-designer' ),
        'Josefin Sans' => __( 'Josefin Sans', 'web-designer' ),
        'Kanit' => __( 'Kanit', 'web-designer' ),
        'Lobster' => __( 'Lobster', 'web-designer' ),
        'Lato' => __( 'Lato', 'web-designer' ),
        'Lora' => __( 'Lora', 'web-designer' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'web-designer' ),
        'Lobster Two' => __( 'Lobster Two', 'web-designer' ),
        'Merriweather' => __( 'Merriweather', 'web-designer' ),
        'Monda' => __( 'Monda', 'web-designer' ),
        'Montserrat' => __( 'Montserrat', 'web-designer' ),
        'Muli' => __( 'Muli', 'web-designer' ),
        'Marck Script' => __( 'Marck Script', 'web-designer' ),
        'Noto Serif' => __( 'Noto Serif', 'web-designer' ),
        'Open Sans' => __( 'Open Sans', 'web-designer' ),
        'Overpass' => __( 'Overpass', 'web-designer' ),
        'Overpass Mono' => __( 'Overpass Mono', 'web-designer' ),
        'Oxygen' => __( 'Oxygen', 'web-designer' ),
        'Orbitron' => __( 'Orbitron', 'web-designer' ),
        'Patua One' => __( 'Patua One', 'web-designer' ),
        'Pacifico' => __( 'Pacifico', 'web-designer' ),
        'Padauk' => __( 'Padauk', 'web-designer' ),
        'Playball' => __( 'Playball', 'web-designer' ),
        'Playfair Display' => __( 'Playfair Display', 'web-designer' ),
        'PT Sans' => __( 'PT Sans', 'web-designer' ),
        'Philosopher' => __( 'Philosopher', 'web-designer' ),
        'Permanent Marker' => __( 'Permanent Marker', 'web-designer' ),
        'Poiret One' => __( 'Poiret One', 'web-designer' ),
        'Quicksand' => __( 'Quicksand', 'web-designer' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'web-designer' ),
        'Raleway' => __( 'Raleway', 'web-designer' ),
        'Rubik' => __( 'Rubik', 'web-designer' ),
        'Rokkitt' => __( 'Rokkitt', 'web-designer' ),
        'Russo One' => __( 'Russo One', 'web-designer' ),
        'Righteous' => __( 'Righteous', 'web-designer' ),
        'Slabo' => __( 'Slabo', 'web-designer' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'web-designer' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'web-designer'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'web-designer' ),
        'Sacramento' => __( 'Sacramento', 'web-designer' ),
        'Shrikhand' => __( 'Shrikhand', 'web-designer' ),
        'Tangerine' => __( 'Tangerine', 'web-designer' ),
        'Ubuntu' => __( 'Ubuntu', 'web-designer' ),
        'VT323' => __( 'VT323', 'web-designer' ),
        'Varela Round' => __( 'Varela Round', 'web-designer' ),
        'Vampiro One' => __( 'Vampiro One', 'web-designer' ),
        'Vollkorn' => __( 'Vollkorn', 'web-designer' ),
        'Volkhov' => __( 'Volkhov', 'web-designer' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'web-designer' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'web-designer' ),
			'100' => esc_html__( 'Thin',       'web-designer' ),
			'300' => esc_html__( 'Light',      'web-designer' ),
			'400' => esc_html__( 'Normal',     'web-designer' ),
			'500' => esc_html__( 'Medium',     'web-designer' ),
			'700' => esc_html__( 'Bold',       'web-designer' ),
			'900' => esc_html__( 'Ultra Bold', 'web-designer' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'web-designer' ),
			'normal'  => esc_html__( 'Normal', 'web-designer' ),
			'italic'  => esc_html__( 'Italic', 'web-designer' ),
			'oblique' => esc_html__( 'Oblique', 'web-designer' )
		);
	}
}
