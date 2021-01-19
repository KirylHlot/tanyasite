<?php
function add_blog_post_type(){
  register_post_type('blog', array(
    'labels'             => array(
      'name'               => 'Статьи', // Основное название типа записи
      'singular_name'      => 'Статья', // отдельное название записи типа Book
      'add_new'            => 'Добавить статью',
      'add_new_item'       => 'Добавить статью',
      'edit_item'          => 'Редактировать статью',
      'new_item'           => 'Добавить статью',
      'view_item'          => 'Посмотреть статью',
      'search_items'       => 'Найти статью',
      'not_found'          => 'Статей не найдено',
      'not_found_in_trash' => 'В корзине статей не найдено',
      'parent_item_colon'  => '',
      'menu_name'          => 'Блог'

    ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-layout',
    'supports'           => array('title','editor', 'thumbnail', 'custom-fields', 'post-formats'),
  ) );
}
add_action('init', 'add_blog_post_type');
function add_portfolio_post_type(){
  register_post_type('portfolio', array(
    'labels'             => array(
      'name'               => 'Портфолио', // Основное название типа записи
      'singular_name'      => 'Работа', // отдельное название записи типа Book
      'add_new'            => 'Добавить работу',
      'add_new_item'       => 'Добавить работу',
      'edit_item'          => 'Редактировать работу',
      'new_item'           => 'Добавить работу',
      'view_item'          => 'Посмотреть работу',
      'search_items'       => 'Найти работу',
      'not_found'          => 'Работ не найдено',
      'not_found_in_trash' => 'В корзине работ не найдено',
      'parent_item_colon'  => '',
      'menu_name'          => 'Портфолио'

    ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-layout',
    'supports'           => array('title','editor', 'thumbnail', 'custom-fields', 'post-formats'),
  ) );
}
add_action('init', 'add_portfolio_post_type');

function register_taxonomy_blog() {
  register_taxonomy( 'blog_tax', 'blog',
    array(
      'labels' => array(
        'name'              => 'Категории блог',
        'singular_name'     => 'Категории блог',
        'search_items'      => 'Поиск категорий',
        'all_items'         => 'Все категории',
        'edit_item'         => 'Изменить категорию',
        'update_item'       => 'Обновить категорию',
        'add_new_item'      => 'Добаввить категорию',
        'new_item_name'     => 'Новая категория',
        'menu_name'         => 'Категории блог',
      ),
      'hierarchical' => true,
      'sort' => true,
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => true
    )
  );

}
add_action( 'init', 'register_taxonomy_blog' );
function register_taxonomy_portfolio() {
  register_taxonomy( 'portfolio_tax', 'portfolio',
    array(
      'labels' => array(
        'name'              => 'Категории портфолио',
        'singular_name'     => 'Категория портфолио',
        'search_items'      => 'Поиск категорий',
        'all_items'         => 'Все категории',
        'edit_item'         => 'Изменить категорию',
        'update_item'       => 'Обновить категорию',
        'add_new_item'      => 'Добаввить категорию',
        'new_item_name'     => 'Новая категория',
        'menu_name'         => 'Категории портфолио',
      ),
      'hierarchical' => true,
      'sort' => true,
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => true
    )
  );

}
add_action( 'init', 'register_taxonomy_portfolio' );