<?php
function the_author_block($page_id)
{

  if (!get_field('is_add_author', 'options')) {
    return '';
  }

  if (get_field('is_add_author_currient', $page_id)) {
    $postfix = '_currient';
    $temp_id = $page_id;
    $class = "currient_author";
    $is_currient = true;
    $background_image = get_field('author_logo' . $postfix, $temp_id)['url'];
  } else {
    $postfix = '';
    $temp_id = 'options';
    $class = "common_author";
    $is_currient = false;
  }

  if (checkField('author_link' . $postfix, $temp_id)) { ?>
    <a title="Автор статьи: <?= get_field('author_title' . $postfix, $temp_id); ?>"
       href="<?= get_field('author_link' . $postfix, $temp_id); ?>"
       target="<?= get_field('is_author_link_target' . $postfix, $temp_id) ? "_blank" : "_self"; ?>"
       rel="<?= get_field('is_author_link_target' . $postfix, $temp_id) ? "nofollow noopener noreferrer" : "follow opener referrer"; ?>"
       class="<?= $class; ?>"
      <?= $is_currient ? 'style="background-image: url(' . $background_image . ')"' : ''; ?>
    >
      <?= $is_currient ? '' : get_tanya_logo('get_tanya_img_01_anim'); ?>
    </a>
  <? } else { ?>
    <span title="Автор статьи: <?= get_field('author_title' . $postfix, $temp_id); ?>"
        <?= $is_currient ? 'style="background-image: url(' . $background_image . ')"' : ''; ?>
       class="<?= $class; ?>"
    >
      <?= $is_currient ? '' : get_tanya_logo('get_tanya_img_01_anim'); ?>
    </span>
  <? } ?>

  <?
  return '';
}