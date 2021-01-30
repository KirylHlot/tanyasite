<?
function the_portfolio_short_preview($page_id)
{ ?>
  <div class="portfolio_short_preview">
    <div class="title_line">
      <h2>Примеры моих работ</h2>
      <a aria-label="Ссылка на архив работ" href="/portfolio">
        <span>Смотреть все</span>
        <?= get_angle_right_icon(); ?>
      </a>
    </div>
    <div class="portfolio_list">

    <div class="col left">

      <div class="c_row top">
        <a href="#"
           class="c_col left"
           style="background-image: linear-gradient(
             120deg,
           <?= hex2rgba("#174873", 1); ?>,
           <?= hex2rgba("#174873", .7); ?>),
             url(<?= get_field('main_img')['sizes']['large']; ?>);
             ">
          <span class="title">Длинное название коллекции</span>
          <?= get_nav_right(); ?>
        </a>
        <a href="#"
           class="c_col right"
           style="background-image: linear-gradient(
             300deg,
           <?= hex2rgba("#174873", 1); ?>,
           <?= hex2rgba("#174873", .7); ?>),
             url(<?= get_field('main_img')['sizes']['large']; ?>);
             ">
          <span class="title">Длинное название коллекции</span>
          <?= get_nav_right(); ?>
          
        </a>
      </div>

      <div class="c_row bottom">
        <a href="#"
           class="c_col left"
           style="background-image: linear-gradient(
             85deg,
           <?= hex2rgba("#174873", 1); ?>,
           <?= hex2rgba("#174873", .7); ?>),
             url(<?= get_field('main_img')['sizes']['large']; ?>);
             ">
          <span class="title">Длинное название коллекции</span>
          <?= get_nav_right(); ?>
        </a>
        <a href="#"
           class="c_col right"
           style="background-image: linear-gradient(
             -90deg,
           <?= hex2rgba("#174873", 1); ?>,
           <?= hex2rgba("#174873", .7); ?>),
             url(<?= get_field('main_img')['sizes']['large']; ?>);
             ">
          <span class="title">Длинное название коллекции</span>
          <?= get_nav_right(); ?>
        </a>
      </div>

    </div>

    <a href="#"
       class="col right"
       style="background-image: linear-gradient(
         -180deg,
       <?= hex2rgba("#174873", 1); ?>,
       <?= hex2rgba("#174873", .7); ?>),
         url(<?= get_field('main_img')['sizes']['large']; ?>);
         ">
      <span class="title">Длинное название коллекции</span>
      <?= get_nav_right(); ?>
    </a>

    <a href="#"
       class="col full_w"
       style="background-image: linear-gradient(
         45deg,
         <?= hex2rgba("#174873", 1); ?>,
         <?= hex2rgba("#174873", .7); ?>),
         url(<?= get_field('main_img')['sizes']['large']; ?>);
         ">
      <span class="title">Длинное название коллекции</span>
      <?= get_nav_right(); ?>
    </a>

  </div>
  </div>

<? }