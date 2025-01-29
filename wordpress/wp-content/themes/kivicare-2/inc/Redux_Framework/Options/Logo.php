<?php
/**
 * Kivicare\Kivicare\Redux_Framework\Options\Logo class
 *
 * @package kivicare
 */

namespace Kivicare\Kivicare\Redux_Framework\Options;
use Redux;
use Kivicare\Kivicare\Redux_Framework\Component;

class Logo extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Logo','kivicare'),
			'id'    => 'header-logo',
			'icon'  => 'el el-flag',
			'fields'=> array(
		
				array(
					'id'       => 'header_radio',
					'type'     => 'button_set',
					'title'    => esc_html__( 'Select Logo Type', 'kivicare' ),
					'subtitle' => esc_html__( 'Select either Text or image for your Logo.', 'kivicare' ),
					'options'  => array(
						'1' => ' Logo as Text',
						'2' => ' Logo as Image',
					),
					'default'  => '2'
				),
		
				array(
					'id'       => 'header_text',
					'type'     => 'text',
					'title'    => esc_html__( 'Logo Text', 'kivicare' ),
					'desc'     => esc_html__( 'Enter the text to be used instead of the logo image', 'kivicare' ),
					'required'  => array( 'header_radio', '=', '1' ),
					'msg'      => esc_html__('Please enter correct value','kivicare' ),
					'default'  => esc_html__('kivicare','kivicare' ),
				),
		
				array(
					'id'            => 'header_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Text Color', 'kivicare' ),
					'subtitle'      => esc_html__( 'Choose Text Color', 'kivicare' ),
					'required'      => array( 'header_radio', '=', '1' ),
					'default'       =>'#ffffff',
					'mode'          => 'background',
					'transparent'   => false
				),
		        array(
					'id' => 'kivicare_header_logo_section',
					'type' => 'section',
					'title'=>  esc_html__('Logo', 'kivicare'),
					'indent' => true,
					'required'  => array( 'header_radio', '=', '2' ),
				) ,
		
				array(
					'id'       => 'kivicare_logo',
					'type'     => 'media',
					'url'      => false,
					'title'    => esc_html__( 'Logo','kivicare'),
					'required'  => array( 'header_radio', '=', '2' ),
					'read-only'=> false,
					'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/logo.png' ),
					'subtitle' => esc_html__( 'Upload Logo image for your Website. Otherwise site title will be displayed in place of Logo.','kivicare'),
				),

				array(
					'id'       => 'kivicare_mobile_logo',
					'type'     => 'media',
					'url'      => false,
					'title'    => esc_html__( 'Responsive Logo','kivicare'),
					'required'  => array( 'header_radio', '=', '2' ),
					'read-only'=> false,
					'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/logo-white.png' ),
					'subtitle' => esc_html__( 'Upload Logo image for your Website. Otherwise site title will be displayed in place of Logo.','kivicare'),
				),
		

			)
		));
	}
}
