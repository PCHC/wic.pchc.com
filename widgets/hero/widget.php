<?php
/**
 * Creates a hero widget
 *
 * @package pchc-wic
 */

namespace Hero;

/**
 * Register and load the widget
 */
function pchc_load_widget() {
	register_widget( __NAMESPACE__ . '\\pchc_wic_hero' );
}
add_action( 'widgets_init', __NAMESPACE__ . '\\pchc_load_widget' );

/**
 * Creating the widget
 */
class Pchc_Wic_Hero extends \WP_Widget {
	/**
	 * Constructor
	 */
	public function __construct() {
		// Add Widget scripts.
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );

		parent::__construct(
			'pchc_wic_hero',
			__( 'PCHC Widget', 'pchc-wic' ),
			array(
				'description' => __( 'Sample widget based on WPBeginner Tutorial', 'pchc-wic' ),
			)
		);
	}

	/**
	 * Widget front-end
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Single widget instance.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';

		ob_start();

		echo $args['before_widget'];
		require __DIR__ . '/display.php';
		echo $args['after_widget'];
		ob_end_flush();
	}

	/**
	 * Widget back-end
	 *
	 * @param array $instance Single widget instance.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'pchc-wic' );
		}
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';

		/* Widget admin form */
		require_once __DIR__ . '/form.php';
	}

	/**
	 * Updating widget
	 *
	 * @param array $new_instance New instance.
	 * @param array $old_instance Old instance.
	 *
	 * @return array $instance New instance.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
		return $instance;
	}

	/**
	 * Widget scripts
	 */
	public function scripts() {
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_media();
		wp_enqueue_script( 'pchc_hero_widget_admin', get_stylesheet_directory_uri() . '/widgets/hero/js/script.js', array( 'jquery' ), '20180927', true );
	}
}
