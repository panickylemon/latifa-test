<?php
function wp_remove_version()
{
    return '';
}

add_filter('the_generator', 'wp_remove_version');

function vc_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);


if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}


function custom_css()
{
// Подключение CSS файла
    wp_enqueue_style('custom-css', get_stylesheet_directory_uri() . '/css/custom-styles.css');
}
add_action('wp_enqueue_scripts', 'custom_css');


function custom_js()
{
// Подключение JS файла

    wp_enqueue_script('jquery-js', get_stylesheet_directory_uri() . '/js/jquery-3.1.1.min.js', array(), false, false);
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom-scripts.js', array(), false, false);
}
add_action('wp_enqueue_scripts', 'custom_js');


function exclude_cat($query)
{
// Не выводить посты из 3 категории на странице блога
    if ($query->is_home) {
        $query->set('cat', '-3');
    } // id категории
    return $query;
}
add_filter('pre_get_posts', 'exclude_cat');
?>


<?php
// Поддрежка виджетов
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<span class="widgettitle">',
        'after_title' => '</span>',
    ));
}
?>