<?php
/**
 * Add function to widgets_init that will load our widget.
 */
add_action( 'widgets_init', 'organics_widget_calendar_load' );

/**
 * Register our widget.
 */
function organics_widget_calendar_load() {
	register_widget('organics_widget_calendar');
}

/**
 * Recent posts Widget class.
 */
class organics_widget_calendar extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array('classname' => 'widget_calendar', 'description' => esc_html__('Calendar for posts and/or Events', 'organics'));

		/* Widget control settings. */
		$control_ops = array('width' => 200, 'height' => 250, 'id_base' => 'organics_widget_calendar');

		/* Create the widget. */
		parent::__construct( 'organics_widget_calendar', esc_html__('Organics - Advanced Calendar', 'organics'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget($args, $instance) {
		extract($args);

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', isset($instance['title']) ? $instance['title'] : '');
		$post_type = isset($instance['post_type']) ? $instance['post_type'] : 'post';
		
		$output = organics_get_calendar(false, 0, 0, array('post_type'=>$post_type));

		if (!empty($output)) {
	
			/* Before widget (defined by themes). */			
			echo ($before_widget);
			
			/* Display the widget title if one was input (before and after defined by themes). */
			if ($title) echo ($before_title) . ($title) . ($after_title);
	
			echo ($output);
			
			/* After widget (defined by themes). */
			echo ($after_widget);
		}
	}

	/**
	 * Update the widget settings.
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		/* Strip tags for title and comments count to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['post_type'] = isset($new_instance['post_type']) ? join(',', $new_instance['post_type']) : 'post';

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form($instance) {

		// Set up some default widget settings
		$instance = wp_parse_args( (array) $instance, array(
			'title' => '',
			'post_type'=>'post'
			)
		);
		$title = $instance['title'];
		$post_type = $instance['post_type'];
		$posts_types = organics_get_list_posts_types(false);
		?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Widget title:', 'organics'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('post_type')); ?>_1"><?php esc_html_e('Post type:', 'organics'); ?></label><br>
			<?php
				$i=0;
				if (is_array($posts_types) && count($posts_types) > 0) {
					foreach ($posts_types as $type=>$type_title) {
						$i++;
						echo '<span class="post_type" style="display:inline-block; white-space: nowrap; overflow: hidden; width:33.3333%; height: 1.5em; line-height: 1.5em;"><input type="checkbox" id="'.esc_attr($this->get_field_id('post_type').'_'.intval($i)).'" name="'.esc_attr($this->get_field_name('post_type')).'[]" value="'.esc_attr($type).'"'.(organics_strpos($post_type, $type)!==false ? ' checked="checked"' : '').'><label for="'.esc_attr($this->get_field_id('post_type').'_'.intval($i)).'">'.($type_title).'</label></span>';
					}
				}
			?>
			</select>
			<br><span class="description"><?php esc_html_e('Attention! If you check custom post types, please check also settings in the correspond plugins and enable display this posts in the blog!', 'organics'); ?></span>
		</p>

	<?php
	}
}

?>