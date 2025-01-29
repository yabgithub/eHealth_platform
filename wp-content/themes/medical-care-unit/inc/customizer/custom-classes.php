<?php
/**
* Customizer Custom Classes.
* @package Medical Care Unit
*/

if ( ! function_exists( 'medical_care_unit_sanitize_number_range' ) ) :
    function medical_care_unit_sanitize_number_range( $medical_care_unit_input, $medical_care_unit_setting ) {
        $medical_care_unit_input = absint( $medical_care_unit_input );
        $medical_care_unit_atts = $medical_care_unit_setting->manager->get_control( $medical_care_unit_setting->id )->input_attrs;
        $medical_care_unit_min = ( isset( $medical_care_unit_atts['min'] ) ? $medical_care_unit_atts['min'] : $medical_care_unit_input );
        $medical_care_unit_max = ( isset( $medical_care_unit_atts['max'] ) ? $medical_care_unit_atts['max'] : $medical_care_unit_input );
        $medical_care_unit_step = ( isset( $medical_care_unit_atts['step'] ) ? $medical_care_unit_atts['step'] : 1 );
        return ( $medical_care_unit_min <= $medical_care_unit_input && $medical_care_unit_input <= $medical_care_unit_max && is_int( $medical_care_unit_input / $medical_care_unit_step ) ? $medical_care_unit_input : $medical_care_unit_setting->default );
    }
endif;

/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Medical_Care_Unit_Customize_Section_Upsell extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'upsell';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_url = '';

    public $notice = '';
    public $nonotice = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );
        $json['notice']  = esc_attr( $this->notice );
        $json['nonotice']  = esc_attr( $this->nonotice );

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

                <# if ( data.notice ) { #>
                    <h3 class="accordion-section-notice">
                        {{ data.title }}
                    </h3>
                <# } #>

                <# if ( !data.notice ) { #>
                    <h3 class="accordion-section-title">
                        {{ data.title }}

                        <# if ( data.pro_text && data.pro_url ) { #>
                            <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                        <# } #>
                    </h3>
                <# } #>
            
        </li>
    <?php }
}