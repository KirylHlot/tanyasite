<?php

?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <link rel="icon" href="<?= get_template_directory_uri() ?>/assets/img/favicon/favicon_32.png">
  <link rel="apple-touch-icon" sizes="180x180"
        href="<?= get_template_directory_uri() ?>/assets/img/favicon/apple-touch-icon-180.png">
  <meta name="theme-color" content="#333333">
	<?php wp_head(); ?>
</head>
<body <? body_class(); ?>>

<? the_top_menu(); ?>
<? the_right_menu(); ?>
<? the_fixed_social_list(); ?>

<? is_front_page() ? the_main_page_navigation() : false; ?>
