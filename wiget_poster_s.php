<?php
/**
 * Plugin Name: Wiget Poster S
 * Description: A plugin that works as an example of how you can easily write your own widget.
 * Version: 0.4
 * Author: Zwooll
 * Author URI: https://twitter.com/tau_wave
 */


/**
 * Main class
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.
 */
class WigetPosterS_Widget extends WP_Widget
{
    function WigetPosterS_Widget()
    {
        parent::WP_Widget(false, $name = 'Wiget Poster S');
    }

    function widget($args, $instance)
    {
        extract($args);

        // Print the div tag
        if ($instance['div'] != '') echo '<div class = "widget_poster_s" id = "' . $this->id . '">';

        echo '<a href="' . $instance['href'] . '" ';  // Populate main URL

        if ($instance['a_class'] != '') echo 'class="' . $instance['a_class'] . '"';

        if ($instance['a_target'] != '') {
            echo ' target = "' . $instance['a_target'] . '"';
        } else {
            echo ' target = "_blank"';
        }

        echo '>';

        echo '<img src="' . $instance['src'] . '" width="' . $instance['img_width'] . '" height="' . $instance['img_height'] . '"';  // src... width... height...

        if ($instance['img_border'] != '') {
            echo ' border="' . $instance['img_border'] . '"';
        } else {
            echo ' border="0"';
        }

        if ($instance['img_class'] != '') echo ' class="' . $instance['img_class'] . '"';  // img class

        if ($instance['img_alt'] != '') echo ' alt="' . $instance['img_alt'] . '"';  // alternative text

        echo '></a>';

        if ($instance['div'] != '') echo '</div>';  // Close the div tag if we use it
    }

    function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    function form($instance)
    {
        $div = esc_attr($instance['div']);
        $href = esc_attr($instance['href']);
        $a_class = esc_attr($instance['a_class']);
        $a_target = esc_attr($instance['a_target']);
        $src = esc_attr($instance['src']);
        $img_width = esc_attr($instance['img_width']);
        $img_height = esc_attr($instance['img_height']);
        $img_border = esc_attr($instance['img_border']);
        $img_class = esc_attr($instance['img_class']);
        $img_alt = esc_attr($instance['img_alt']);

        echo '
        <p><label for="' . $this->get_field_id('div') . '"> ' . _e('Use div in widget:') . '</label>
        <input class="widefat" id="' . $this->get_field_id('div') . '"
        name="' . $this->get_field_name('div') . '" type="checkbox"
        value="true" ';
        if ($div == 'true') echo 'checked="true"';
        echo ' /></p>';

        echo '
        <p><label for="' . $this->get_field_id('href') . '"> ' . _e('URL used in banner click:') . '</label>
        <input class="widefat" id="' . $this->get_field_id('href') . '"
        name="' . $this->get_field_name('href') . '" type="text"
        value="' . $href . '" /></p>';

        echo '
        <p><label for="' . $this->get_field_id('a_class') . '"> ' . _e('Class name for the "a" tag (leave empty if do not use it):') . '</label>
        <input class="widefat" id="' . $this->get_field_id('a_class') . '"
        name="' . $this->get_field_name('a_class') . '" type="text"
        value="' . $a_class . '" /></p>';

        echo '    
        <p><label for="' . $this->get_field_id('a_target') . '"> ' . _e('Value of the target attribute for the "a" tag (target = "_blank" if empty):') . '</label><input class="widefat" id="' . $this->get_field_id('a_target') . '"
        name="' . $this->get_field_name('a_target') . '" type="text"
        value="' . $a_target . '" /></p>';

        echo '
        <p><label for="' . $this->get_field_id('src') . '"> ' . _e('The path to the image of your banner (example: http://test.com/image/banner.gif):') . '</label>
        <input class="widefat" id="' . $this->get_field_id('src') . '"
        name="' . $this->get_field_name('src') . '" type="text"
        value="' . $src . '" /></p>';

        echo '
        <p><label for="' . $this->get_field_id('img_width') . '"> ' . _e('Banner width:') . '</label>
        <input class="widefat" id="' . $this->get_field_id('img_width') . '"
        name="' . $this->get_field_name('img_width') . '" type="text"
        value="' . $img_width . '" /></p>';

        echo '
        <p><label for="' . $this->get_field_id('img_height') . '"> ' . _e('Banner height:') . '</label>
        <input class="widefat" id="' . $this->get_field_id('img_height') . '"
        name="' . $this->get_field_name('img_height') . '" type="text"
        value="' . $img_height . '" /></p>';

        echo '
        <p><label for="' . $this->get_field_id('img_border') . '"> ' . _e('Border size of the banner (if empty then border = "0"):') . '</label>
        <input class="widefat" id="' . $this->get_field_id('img_border') . '"
        name="' . $this->get_field_name('img_border') . '" type="text"
        value="' . $img_border . '" /></p>';

        echo '
        <p><label for="' . $this->get_field_id('img_class') . '"> ' . _e('Class name for the "img" tag (leave empty if do not use it):') . '</label>
        <input class="widefat" id="' . $this->get_field_id('img_class') . '"
        name="' . $this->get_field_name('img_class') . '" type="text"
        value="' . $img_class . '" /></p>';

        echo '
        <p><label for="' . $this->get_field_id('img_alt') . '"> ' . _e('Alternative text for the image:') . '</label>
        <input class="widefat" id="' . $this->get_field_id('img_alt') . '"
        name="' . $this->get_field_name('img_alt') . '" type="text"
        value="' . $img_alt . '" /></p>';

    }

}

/**
 * Register our widget.
 */
function WigetPosterS_load_widgets()
{
    register_widget('WigetPosterS_Widget');
}

/**
 * Hook our function to widgets_init action that will load our widget.
 */
add_action('widgets_init', create_function('', 'return register_widget("WigetPosterS_Widget");'));

?>
