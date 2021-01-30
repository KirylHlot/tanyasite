<?
$page_id = get_the_ID();
$categories = wp_get_object_terms($page_id, 'blog_tax');
$aside_title = checkField('aside_title', $page_id) ? get_field('aside_title', $page_id) : get_the_title($page_id);
$post_date = get_the_date('d') . '. ' . get_the_date('m') . '. ' . get_the_date('Y') . 'г. ';



?>
<? get_header(); ?>

  <div class="blog_wrapper">


    <div class="single_blog_wrapper main">

      <div class="blog_title_line">
        <? if (checkField('blog_pretitle', $page_id)) { ?>
          <div class="pretitle"><?= get_field('blog_pretitle', $page_id); ?></div>
        <? } ?>
        <h1 class="main_title"><?= get_field('main_h1', $page_id); ?></h1>
      </div>

      <? if (get_field('main_img', $page_id) and get_field('main_img', $page_id)['url'] !== '') { ?>

        <div class="main_img" style="background-image: url(<?= get_field('main_img', $page_id)['url']; ?>)"></div>

      <? } ?>

      <? if (checkField('preview_block', $page_id)) { ?>
        <div class="preview_block the_content">
          <?= wpautop(get_field('preview_block', $page_id)); ?>
        </div>
      <? } ?>

      <div class="the_content">
        <?= wpautop(get_the_content($page_id)); ?>
      </div>

      <? if (get_field('add_fotogalary', $page_id)) {

        the_blog_galary($page_id);

        if (checkField('additional_text_block', $page_id)) {
          ?>
          <div class="the_content">
            <?= wpautop(get_field('additional_text_block', $page_id)); ?>
          </div>
        <? }

      } ?>

      <div class="additional_info">

        <? if (count($categories) > 0) { ?>
          <div class="categories">
            <? foreach ($categories as $cat) {
              echo '<a title="Поиск по категории: «' . $cat->name . '»" href="/?s=' . $cat->name . '"> #' . $cat->name . '</a> ';
            } ?>
          </div>
        <? } ?>

        <div class="post_date">
          Опубликовано: <?= $post_date; ?>
        </div>

        <? the_author_block($page_id); ?>

      </div>

      <? the_read_also_block($page_id); ?>

      <? the_comments_block($page_id); ?>

      <? the_about_short($page_id); ?>

      <? the_portfolio_short_preview($page_id);?>

    </div>

    <div id="blog_aside" class="blog_aside">
      <div data-depth="0.08" class="bg_img prlx"
           style="background-image: url(<?= get_field('aside_bg', $page_id)['url']; ?>)"></div>
      <div class="content_block">

        <div class="date">
          <?= $post_date; ?>
        </div>


        <div class="title"><?= $aside_title; ?></div>

      </div>
    </div>
  </div>


<? get_footer(); ?>