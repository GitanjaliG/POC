<?php

function POC_resources(){
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ) );
    
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('main_js', get_template_directory_uri() . '/assets/js/main.js', NULL, 1.0, true);

    wp_localize_script('main_js', "sendingData", array(
        'nonce' => wp_create_nonce("wp_rest"),
        'siteURL' => get_site_url()
    ));
}

require_once('bs4navwalker.php');

add_action('wp_enqueue_scripts', 'POC_resources');

// Get top ancestor
function get_current_parent_id(){

    global $post;
    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    return $post->ID;
}

//check if page has children
function has_children() {
    global $post;
    
    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
}

function custom_excerpt_length() {
    return 50;
}

add_filter('excerpt_length', 'custom_excerpt_length');

// Theme setup
function wordpress_setup(){

    // Navigation Menus 
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu'),
    ));

    // Add support for featured image
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail',180,120,true);
    // add_image_size('banner-image',920,210,array('left','top'));
    add_image_size('banner-image',920,210,true);
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));


}


add_action('after_setup_theme', 'wordpress_setup');

function myWidgetsInit() {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 1',
        'id' => 'footer1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 2',
        'id' => 'footer2',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 3',
        'id' => 'footer3',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 4',
        'id' => 'footer4',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

add_action('widgets_init', 'myWidgetsInit');

function wordpressPOC_customize_register($wp_customize) {

    $wp_customize->add_setting('wpoc_link_color',array(
        'default' => '#22a6b3',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting('wpoc_btn_color',array(
        'default' => '#22a6b3',
        'transport' => 'refresh',
    ));

    $wp_customize->add_section('wpoc_standard_colors', array(
        'title' => __('Standard Colors', 'WordpressPOC'),
        'priority' => 30,
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wpoc_link_color_control', array(
        'label' => __('Link Color', 'WordpressPOC'),
        'section' => 'wpoc_standard_colors',
        'settings' => 'wpoc_link_color',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wpoc_btn_color_control', array(
        'label' => __('Button Color', 'WordpressPOC'),
        'section' => 'wpoc_standard_colors',
        'settings' => 'wpoc_btn_color',
    )));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'themeslug_logo',
            array(
                'label'      => __( 'Logo', 'themeslug' ),
                'section'    => 'themeslug_logo_section',
                'settings'   => 'themeslug_logo',
                'extensions' => array( 'jpg', 'jpeg', 'gif', 'png', 'svg' ),
            )
        )
    );

}

add_action('customize_register', 'wordpressPOC_customize_register');


// output customize css
function wordpressPOC_customize_css() { ?>

    <style>
        a:link,
        a:visited {
            color: <?php echo get_theme_mod('wpoc_link_color'); ?>
        }

        .site-header nav ul li.current-menu-item a:link,
        .site-header nav ul li.current-menu-item a:visited,
        .site-header nav ul li.current-page-ancestor a:link,
        .site-header nav ul li.current-page-ancestor a:visited {
            color:  <?php echo get_theme_mod('wpoc_link_color'); ?>
        }

        .btn {
            background-color:  <?php echo get_theme_mod('wpoc_btn_color'); ?>
        }
    </style>

<?php }

add_action('wp_head', 'wordpressPOC_customize_css');

// Add footer callout to admin customize page
function wpoc_footer_callout($wp_customize) {
    $wp_customize->add_section('wpoc_footer_callout_section', array (
        'title' => 'Footer Callout'
    ));

    $wp_customize->add_setting('wpoc_footer_callout_display', array(
        'default' => 'No'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'wpoc-footer-callout-display-control', array(
        'label' => 'Display this section?',
        'section' => 'wpoc_footer_callout_section',
        'settings' => 'wpoc_footer_callout_display',
        'type' => 'select',
        'choices' => array('No' => 'No', 'Yes' => 'Yes')
    )));


    $wp_customize->add_setting('wpoc_footer_callout_headline', array(
        'default' => 'Headline Text'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'wpoc-footer-callout-headline-control', array(
        'label' => 'Headline',
        'section' => 'wpoc_footer_callout_section',
        'settings' => 'wpoc_footer_callout_headline'
    )));

    $wp_customize->add_setting('wpoc_footer_callout_desc', array(
        'default' => 'Description Text'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'wpoc-footer-callout-desc-control', array(
        'label' => 'Description',
        'section' => 'wpoc_footer_callout_section',
        'settings' => 'wpoc_footer_callout_desc',
        'type' => 'textarea'
    )));

    $wp_customize->add_setting('wpoc_footer_callout_link');

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'wpoc-footer-callout-link-control', array(
        'label' => 'Link',
        'section' => 'wpoc_footer_callout_section',
        'settings' => 'wpoc_footer_callout_link',
        'type' => 'dropdown-pages'
    )));

    $wp_customize->add_setting('wpoc_footer_callout_image');

    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'wpoc-footer-callout-image-control', array(
        'label' => 'Image',
        'section' => 'wpoc_footer_callout_section',
        'settings' => 'wpoc_footer_callout_image',
        'width' => 400,
        'height' =>300
    )));
}

add_action('customize_register', 'wpoc_footer_callout');











?>

