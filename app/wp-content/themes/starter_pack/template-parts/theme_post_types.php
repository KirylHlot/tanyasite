<?php
add_action('init', 'add_news_post_types');
function add_news_post_types(){
  register_post_type('news', array(
    'labels'             => array(
      'name'               => 'Новости', // Основное название типа записи
      'singular_name'      => 'Новость', // отдельное название записи типа Book
      'add_new'            => 'Добавить новую',
      'add_new_item'       => 'Добавить новость',
      'edit_item'          => 'Редактировать новость',
      'new_item'           => 'Добавить новость',
      'view_item'          => 'Посмотреть новость',
      'search_items'       => 'Найти новость',
      'not_found'          => 'Новостей не найдено',
      'not_found_in_trash' => 'В корзине новостей не найдено',
      'parent_item_colon'  => '',
      'menu_name'          => 'Новости'

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
//    'taxonomies' =>       array('category', 'post_tag')
  ) );
}

add_action('init', 'add_blog_post_types');
function add_blog_post_types(){
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

add_action('init', 'add_video_post_types');
function add_video_post_types(){
  register_post_type('video', array(
    'labels'             => array(
      'name'               => 'Видео', // Основное название типа записи
      'singular_name'      => 'Видео', // отдельное название записи типа Book
      'add_new'            => 'Добавить видео',
      'add_new_item'       => 'Добавить видео',
      'edit_item'          => 'Редактировать видео',
      'new_item'           => 'Добавить видео',
      'view_item'          => 'Посмотреть видео',
      'search_items'       => 'Найти видео',
      'not_found'          => 'Видео не найдено',
      'not_found_in_trash' => 'В корзине видео не найдено',
      'parent_item_colon'  => '',
      'menu_name'          => 'Видео'

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


function wptp_create_post_type_products() {
  ///products
  $labels = array(
    'name' => __( 'Продукция' ),
    'singular_name' => __( 'Продукты' ),
    'add_new' => __( 'Добавить продукт' ),
    'add_new_item' => __( 'Добавить продукт' ),
    'edit_item' => __( 'Редактировать продукт' ),
    'new_item' => __( 'Новый продукт' ),
    'view_item' => __( 'Посмотреть продукт' ),
    'search_items' => __( 'Искать продукты' ),
    'not_found' =>  __( 'Продуктов не найдено' ),
    'not_found_in_trash' => __( 'Нет удаленных продуктов' ),
  );
  $args = array(
    'labels' => $labels,
    'has_archive' => true,
    'public' => true,
    'hierarchical' => false,
    'menu_position' => false,
    'taxonomies' => array('products'),
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
      'thumbnail'
    ),
  );
  register_post_type( 'products', $args );

}
add_action( 'init', 'wptp_create_post_type_products' );
function wptp_register_taxonomy_products() {
  ///products
  register_taxonomy( 'products', 'products',
    array(
      'labels' => array(
        'name'              => 'Продукты',
        'singular_name'     => 'Продукты',
        'search_items'      => 'Поиск продуктов',
        'all_items'         => 'Все рубрики',
        'edit_item'         => 'Изменить продукты',
        'update_item'       => 'Обновить продукт',
        'add_new_item'      => 'Добаввить рубрику',
        'new_item_name'     => 'Новый продукт',
        'menu_name'         => 'Рубрики',
      ),
      'hierarchical' => true,
      'sort' => true,
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => true
    )
  );

}
add_action( 'init', 'wptp_register_taxonomy_products' );

function wptp_create_post_type_zapchasti() {
  ///Zapchasti
  $labels = array(
    'name' => __( 'Запчасти' ),
    'singular_name' => __( 'Запчасти' ),
    'add_new' => __( 'Добавить запчасть' ),
    'add_new_item' => __( 'Добавить запчасть' ),
    'edit_item' => __( 'Редактировать запчасть' ),
    'new_item' => __( 'Новая запчасть' ),
    'view_item' => __( 'Посмотреть запчасть' ),
    'search_items' => __( 'Искать запчасть' ),
    'not_found' =>  __( 'Запчастей не найдено' ),
    'not_found_in_trash' => __( 'Нет удаленных запчастей' ),
  );
  $args = array(
    'labels' => $labels,
    'has_archive' => true,
    'public' => true,
    'hierarchical' => false,
    'menu_position' => false,
    'taxonomies' => array('zapchasti'),
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
      'thumbnail'
    ),
  );
  register_post_type( 'zapchasti', $args );

}
add_action( 'init', 'wptp_create_post_type_zapchasti' );
function wptp_register_taxonomy_zapchasti() {
  ///Zapchasti
  register_taxonomy( 'zapchasti', 'zapchasti',
    array(
      'labels' => array(
        'name'              => 'Категории',
        'singular_name'     => 'Категории',
        'search_items'      => 'Поиск запчастей',
        'all_items'         => 'Все рубрики',
        'edit_item'         => 'Изменить запчасти',
        'update_item'       => 'Обновить запчасти',
        'add_new_item'      => 'Добаввить рубрику',
        'new_item_name'     => 'Новая запчасть',
        'menu_name'         => 'Категории',
      ),
      'hierarchical' => true,
      'sort' => true,
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => true
    )
  );

}
add_action( 'init', 'wptp_register_taxonomy_zapchasti' );
