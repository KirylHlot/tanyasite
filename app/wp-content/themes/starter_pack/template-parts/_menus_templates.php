<?
function the_top_menu()
{ ?>
  <nav id="top_menu" class="top_menu <?= is_single() ? "single" : ""; ?>">
    <? if (is_front_page()) { ?>
      <span class="logo_wrapper">
        <?= get_main_logo(); ?>
      </span>
    <? } else { ?>
      <a aria-label="Главная страница" href="/" class="logo_wrapper">
        <?= get_main_logo(); ?>
      </a>
    <? } ?>
    <div class="contacts_block">

      <a href="tel:<?= preg_replace('/[^\d+]/', '', get_field('ct_phone', 26)); ?>" class="phone">
        <?= get_field('ct_phone', 26); ?>
      </a>
      <span>/</span>
      <a href="mailto:<?= get_field('ct_mail', 26); ?>" class="mail">
        <?= get_field('ct_mail', 26); ?>
      </a>

    </div>

    <div class="search_icon open_search elem_rotate">
      <?= get_search_icon(); ?>
    </div>
    <div id="show_right_menu" class="show_right_menu elem_rotate">
      <?= get_burger_icon(); ?>
    </div>
  </nav>
<? }

function the_right_menu()
{ ?>
  <div id="right_menu" class="right_menu">

    <div id="close_right_menu" class="close_right_menu elem_rotate">
      <?= get_close_menu_icon(); ?>
    </div>

    <?php wp_nav_menu([
      'container_class' => 'right_menu_list',
      'theme_location' => 'right_menu'
    ]); ?>

    <ul class="messenger_list">

      <? if (checkField('ct_telegram', 26)) { ?>
        <li>
          <a aria-label="Телеграм" href="tg://resolve?domain=<?= get_field('ct_telegram'); ?>">
            <?= get_telegram_icon(); ?>
          </a>
        </li>
      <? } ?>

      <? if ( checkField('ct_viber', 26)) { ?>
        <li>
          <a aria-label="Viber" title="Viber" class="viber_desc"
             href="viber://chat?number=<?= preg_replace('/[^\d+]/', '', get_field('ct_viber')); ?>"
             target="_blank" rel="nofollow noopener">
            <?= get_viber_icon(); ?>
          </a>
          <a aria-label="Viber" title="Viber" class="viber_mobi"
             href="viber://add?number=<?= preg_replace('/[^\d]/', '', get_field('ct_viber')); ?>"
             target="_blank" rel="nofollow noopener">
            <?= get_viber_icon(); ?>
          </a>
        </li>
      <? } ?>
      <li class="open_search">
        <span><?= get_search_icon(); ?></span>
      </li>
    </ul>
  </div>
<? }

function the_main_page_navigation(){
  wp_nav_menu([
    'container' => false,
    'menu_class' => 'main_page_navigation',
    'theme_location' => 'main_page_navigation',
    'menu_id' => 'main_page_navigation'
  ]);
}