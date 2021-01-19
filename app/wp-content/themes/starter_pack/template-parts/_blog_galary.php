<?php

function the_blog_galary($page_id)
{

  if (have_rows('blog_fotogalary', $page_id)) {

    $images_list = get_field('blog_fotogalary', $page_id);
    $images_list_count = count($images_list);
    if ($images_list_count > 3) {
      ?>

      <div class="the_blog_galary_wrapper">

        <a href="<?= $images_list[0]['image']['url']; ?>"
           data-fancybox="galary"
           class="column bgproperty"
           style="background-image: url(<?= $images_list[0]['image']['sizes']['medium_large']; ?>)"></a>


        <div class="column galary_carousel_wrapper">

          <?= $images_list_count > 4 ? get_galary_icon() : ''; ?>

          <div id="galary_carousel"
               class="blog_galary <?= $images_list_count > 4 ? 'galary_carousel owl-carousel' : ''; ?>">


            <? $counter = 0;
            foreach ($images_list as $image) {
              if ($counter > 2) { ?>
                <a href="<?= $image['image']['url']; ?>"
                   data-fancybox="galary-carousel"
                   class="bgproperty"
                   style="background-image: url(<?= $image['image']['url']; ?>)"></a>
              <? }
              $counter++;
              ?>
            <? } ?>



          </div>

          <? if ( $images_list_count > 4 ) { ?>
            <div class="galary_carousel_navs">
              <div class="galary_carousel_left_nav navs"><?= get_nav_left(); ?></div>
              <div class="galary_carousel_right_nav navs"><?= get_nav_right(); ?></div>
            </div>
          <?
          } ?>


        </div>

        <div class="column doble">
          <a href="<?= $images_list[1]['image']['url']; ?>"
             class="colm bgproperty"
             data-fancybox="galary"
             style="background-image: url(<?= $images_list[1]['image']['sizes']['medium_large']; ?>)"></a>
          <a href="<?= $images_list[2]['image']['url']; ?>"
             class="colm bgproperty"
             data-fancybox="galary"
             style="background-image: url(<?= $images_list[2]['image']['sizes']['medium_large']; ?>)"></a>
        </div>

      </div>

    <? }
  }
}