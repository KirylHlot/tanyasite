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

function register_taxonomy_blog() {
  register_taxonomy( 'blog_tax', 'blog',
    array(
      'labels' => array(
        'name'              => 'Блог',
        'singular_name'     => 'Статьи',
        'search_items'      => 'Поиск статей',
        'all_items'         => 'Все статьи',
        'edit_item'         => 'Изменить статью',
        'update_item'       => 'Обновить статью',
        'add_new_item'      => 'Добаввить статью',
        'new_item_name'     => 'Новая статья',
        'menu_name'         => 'Статьи',
      ),
      'hierarchical' => true,
      'sort' => true,
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => true
    )
  );

}
add_action( 'init', 'register_taxonomy_blog' );
