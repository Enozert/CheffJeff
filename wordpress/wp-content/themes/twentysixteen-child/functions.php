<?php
add_action( 'wp_enqueue_scripts', function() {
wp_enqueue_style( 'twentysixteen-parent-style', get_template_directory_uri() . '/style.css' );
});
// Used to style the admin menu
add_action('admin_head', 'my_custom_adminCss');
function my_custom_adminCss() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
}
// Used to style the TinyMCE editor.
add_editor_style('style.css');

//use admin side bar
add_filter('show_admin_bar', '__return_true', 1000);

//use clesic editor
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

define( 'DISALLOW_FILE_EDIT', true);

function remove_menus(){
    remove_menu_page( 'index.php' );                  //dashboard
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    //remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'tools.php' );                  //Tools
    //remove_menu_page( 'options-general.php' );        //Settings
    remove_menu_page( 'smush' );
    //remove_menu_page( 'edit.php?post_type=acf-field-group' ); //custom posttype
}
//remove_action( 'admin_menu', 'cptui_plugin_menu' ); //custom fieldtype
add_action( 'admin_menu', 'remove_menus' );

add_action('admin_menu', 'change_menus_position');
function change_menus_position() {
    add_menu_page(
       'Menus',
       'Menus',
       'edit_theme_options',
       'nav-menus.php',
       '',
       'dashicons-networking',
       68
    );
}

// redirect to website and not wordpress   
add_filter( 'template_include', 'my_callback' );
function my_callback() {
    return $_SERVER['DOCUMENT_ROOT']."/Pages/home.php";
}

// redirects
// add_action('admin_init', 'pages_redirect');
// function pages_redirect() {
//     global $pagenow;
    
//     // skip dashboard
//     if($pagenow == 'index.php'){
//         wp_redirect( admin_url('/upload.php') ); 
//         exit;
//     }
// }

function get_category_name() {
    register_rest_field('project', 'categoryName', array(
        'get_callback' => function() {
            return get_the_category();
        }
    ));
}
add_action('rest_api_init', 'get_category_name');

function get_img_url() {
    register_rest_field( 'home', 'imageURL', array(
            'get_callback'    => 'get_original_images_urls',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'about', 'imageURL', array(
            'get_callback'    => 'get_original_images_urls',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'skills', 'imageURL', array(
            'get_callback'    => 'get_original_images_urls',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'services', 'imageURL', array(
            'get_callback'    => 'get_original_images_urls',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'contact', 'imageURL', array(
            'get_callback'    => 'get_original_images_urls',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
add_action('rest_api_init', 'get_img_url');

function get_original_images_urls( $object, $field_name, $request ) {
    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $object->id ), 'full' );
    $img_url = $img['0'];
    
    return array(
        'large' => $img_url
    );
}

//get menu with rest api
function get_nav_menus() {
    return wp_get_nav_menu_items('Main Navigation');
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', 'menu', array(
        'methods' => 'GET',
        'callback' => 'get_nav_menus',
    ) );
} );