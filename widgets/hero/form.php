<?php
/**
 * Hero widget form
 *
 * @package pchc-wic
 */

namespace Hero;

?>

<p>
	<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>">
		<?php esc_html_e( 'Title:', 'pchc-wic' ); ?>
	</label>
	<input 
		class="widefat"
		id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"
		name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>"
		type="text"
		value="<?php echo esc_attr( $title ); ?>"
	/>
</p>

<p>
	<label for="<?php echo esc_html( $this->get_field_id( 'image' ) ); ?>">
		<?php esc_html_e( 'Image:', 'pchc-wic' ); ?>
	</label>
	<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'image' ) ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
	<button class="upload_image_button button button-primary">Upload Image</button>
</p>
