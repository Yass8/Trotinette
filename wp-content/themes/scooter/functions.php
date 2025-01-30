<?php

function theme_setup(){
    add_theme_support('custom-logo');
    add_theme_support( 'post-thumbnails' );
    register_nav_menus(array(
        "principal" => "Menu principal",
        "footer-menu" => "Menu footer",
    ));
}
// add_action('nom_du_hook','nom_de_la_fonction')
add_action('after_setup_theme', 'theme_setup');

function ajouter_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/styles.css');
    wp_enqueue_style('custom-style-responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap/css/bootstrap.min.css');

    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js');
    wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap/js/bootstrap.min.js');
}
add_action('wp_enqueue_scripts', 'ajouter_styles');

function theme_widget_init() {
    register_sidebar(array(
      'name' => 'Banner de promotion',
      'id' => 'promotion',
      'description' => 'Promotion de l\'application mobile',
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '',
      'after_title'   => ''
    ));

    register_sidebar(array(
        'name' => 'Slogan',
        'id' => 'slogan',
        'description' => 'Notre slogan',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));

    register_sidebar(array(
        'name' => 'Tarif',
        'id' => 'tarif',
        'description' => 'Notre tarif',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));

    register_sidebar(array(
        'name' => 'Nombre de trottinnetes',
        'id' => 'nombre-trottinnette',
        'description' => 'Nombre de trottinnetes',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));

    register_sidebar(array(
        'name' => 'Nombre de chargeurs',
        'id' => 'nombre-chargeur',
        'description' => 'Nombre de chargeurs',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));
}
add_action('widgets_init', 'theme_widget_init');