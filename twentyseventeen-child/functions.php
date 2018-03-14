<?php
//* Code goes here

/*Add Parent Theme Styles*/

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/* Custom Permalink for Up2U SeLCont Multisite */

function change_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    $wp_rewrite->flush_rules();
}
add_action('init', 'change_permalinks');

/*Header Image Custom Size */

add_image_size( 'twentyseventeen-featured-image', 2000, 900, true );

/* Remove Default Widgets */
function unregister_widgets(){
  unregister_widget('WP_Widget_Pages');
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Links');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Text');
  unregister_widget('WP_Widget_Categories');
  unregister_widget('WP_Widget_Recent_Posts');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_RSS');
  unregister_widget('WP_Widget_Tag_Cloud');
  unregister_widget('WP_Nav_Menu_Widget');
}

add_action( 'widgets_init', 'unregister_widgets' );

/* Custom Theme Header Image */

$custom_header_args = array(
    'default-image' => get_theme_file_uri( '/assets/images/header.jpg' ),
    'width' => 2000,
    'height' => 900,
    'flex-height' => true,
    'video' => true,
);
add_theme_support('custom-header', $custom_header_args);
