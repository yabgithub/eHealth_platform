<?php
/**
 * Kivicare\Kivicare\Redux_Framework\Options\Blog class
 *
 * @package kivicare
 */

namespace Kivicare\Kivicare\Redux_Framework\Options;

use Redux;
use Kivicare\Kivicare\Redux_Framework\Component;

class Blog extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section( $this->opt_name, array(
			'title' => esc_html__( 'Blog', 'kivicare' ),
			'id'    => 'blog',
			'icon'  => 'el el-quotes',
			'customizer_width' => '500px',
		) );

		Redux::set_section( $this->opt_name, array(
			'title' => esc_html__('General Blogs','kivicare'),
			'id'    => 'blog-section',
			'subsection' => true,
			'desc'  => esc_html__('This section contains options for blog.','kivicare'),
			'fields'=> array(

				array(
					'id'       => 'blog_default_banner_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Blog Page Default Banner Image','kivicare'),
					'read-only'=> false,
					'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/redux/banner.png' ),
					'subtitle' => esc_html__( 'Upload banner image for your Website. Otherwise blank field will be displayed in place of this section.','kivicare').'<b>'.esc_html__("(Note:Only Display Banner Style Second & Third in Page Banner Setting)","kivicare").'</b>',
				),

				array(
					'id'        => 'blog_setting',
					'type'      => 'image_select',
					'title'     => esc_html__( 'Blog page Setting','kivicare' ),
					'subtitle'  => wp_kses( __( '<br />Choose among these structures (Right Sidebar, Left Sidebar, 1column, 2column and 3column) for your blog section.<br />To filling these column sections you should go to appearance > widget.<br />And put every widget that you want in these sections.','kivicare' ), array( 'br' => array() ) ),
					'options'   => array(
						'1' => array( 'title' => esc_html__( 'One Columns','kivicare' ), 'img' => get_template_directory_uri() . '/assets/images/redux//single-column.jpg' ),
						'2' => array( 'title' => esc_html__( 'Two Columns','kivicare' ), 'img' => get_template_directory_uri() . '/assets/images/redux//two-column.jpg' ),
						'3' => array( 'title' => esc_html__( 'Three Columns','kivicare' ), 'img' => get_template_directory_uri() . '/assets/images/redux//three-column.jpg' ),
						'4' => array( 'title' => esc_html__( 'Right Sidebar','kivicare' ), 'img' => get_template_directory_uri() . '/assets/images/redux//right-side.jpg' ),
						'5' => array( 'title' => esc_html__( 'Left Sidebar','kivicare' ), 'img' => get_template_directory_uri() . '/assets/images/redux//left-side.jpg' ),
					),
					'default'   => '4',
				),

				array(
					'id'        => 'display_pagination',
					'type'      => 'button_set',
					'title'     => esc_html__( 'Previous/Next Pagination','kivicare'),
					'subtitle' => esc_html__( 'Turn on to display the previous/next post pagination for blog page.','kivicare'),
					'options'   => array(
						'yes' => esc_html__('On','kivicare'),
						'no' => esc_html__('Off','kivicare')
					),
					'default'   => esc_html__('yes','kivicare')
				),

				array(
					'id'        => 'display_featured_image',
					'type'      => 'button_set',
					'title'     => esc_html__( 'Featured Image on Blog Archive Page','kivicare'),
					'subtitle' => esc_html__( 'Turn on to display featured images on the blog or archive pages.','kivicare'),
					'options'   => array(
						'yes' => esc_html__('On','kivicare'),
						'no' => esc_html__('Off','kivicare')
					),
					'default'   => esc_html__('yes','kivicare')
				),
			)
		));

		Redux::set_section( $this->opt_name, array(
				'title'      => esc_html__( 'Blog Single Post', 'kivicare' ),
				'id'         => 'basic',
				'subsection' => true,
				'fields'     => array(

					array(
						'id'        => 'blog_single_page_setting',
						'type'      => 'image_select',
						'title'     => esc_html__( 'Blog Single page Setting','kivicare' ),
						'subtitle'  => wp_kses( __( '<br />Choose among these structures (Right Sidebar, Left Sidebar and 1column) for your blog section.<br />To filling these column sections you should go to appearance > widget.<br />And put every widget that you want in these sections.','kivicare' ), array( 'br' => array() ) ),
						'options'   => array(
							'1' => array( 'title' => esc_html__( 'Full Width','kivicare' ), 'img' => get_template_directory_uri() . '/assets/images/redux/single-column.jpg' ),
							'4' => array( 'title' => esc_html__( 'Right Sidebar','kivicare' ), 'img' => get_template_directory_uri() . '/assets/images/redux/right-side.jpg' ),
							'5' => array( 'title' => esc_html__( 'Left Sidebar','kivicare' ), 'img' => get_template_directory_uri() . '/assets/images/redux/left-side.jpg' ),
						),
						'default'   => '4',
					),

					array(
						'id'        => 'display_comment',
						'type'      => 'button_set',
						'title'     => esc_html__( 'Comments','kivicare'),
						'subtitle' => esc_html__( 'Turn on to display comments.','kivicare'),
						'options'   => array(
							'yes' => esc_html__('On','kivicare'),
							'no' => esc_html__('Off','kivicare')
						),
						'default'   => esc_html__('yes','kivicare')
					),

				))
		);

	}
}
