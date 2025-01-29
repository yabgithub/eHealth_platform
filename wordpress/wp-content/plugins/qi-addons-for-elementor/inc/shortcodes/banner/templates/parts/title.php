<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! empty( $title ) ) :
	?>
	<?php echo '<' . qi_addons_for_elementor_framework_sanitize_tags( $title_tag );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="qodef-m-title">
		<?php echo esc_html( $title ); ?>
	<?php echo '</' . qi_addons_for_elementor_framework_sanitize_tags( $title_tag );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
<?php endif; ?>
