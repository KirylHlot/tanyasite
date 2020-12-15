<? $page_id = get_the_ID(); ?>
<? get_header(); ?>

  <section id="promo" class="promo section">
    <div class="main_wrapper">

      <div class="content_block">
        <? if (have_rows('portfolio_links_list', $page_id)) { ?>
          <ul id="portfolio_links_list">
            <? while (have_rows('portfolio_links_list', $page_id)) {
              the_row(); ?>
              <li>
                <a href="<?= get_sub_field('link'); ?>">
                  <?= get_sub_field('title'); ?>
                </a>
              </li>
            <? } ?>
          </ul>
          <?
          reset_rows();
        } ?>
        <h1><?= get_field('main_h1', $page_id); ?></h1>
        <? if (checkField('mpp_content', $page_id)) { ?>
          <span>
            <?= get_field('mpp_content', $page_id); ?>
          </span>
        <? } ?>
        <div class="btn">Напишите мне</div>

      </div>

      <div id="promo_scene_prlx" class="promo_scene_prlx">

        <div data-depth="0.1" class="big_circl_01 prlx">
          <?= get_main_circle('big_circl_01_anim'); ?>
        </div>

        <div data-depth="0.3" class="big_circl_02 prlx">
          <?= get_main_circle('big_circl_02_anim'); ?>
        </div>

        <?= get_main_circle_tripple('circle_tripple_animation'); ?>

        <div data-depth="0.055" class="image_block prlx">
          <?= get_tanya_img_01('get_tanya_img_01_anim'); ?>
        </div>

        <?= get_right_lines(); ?>

        <div class="big_line big_line_01"></div>
        <div class="big_line big_line_02"></div>
        <div class="big_line big_line_03"></div>
        <div class="big_line big_line_04"></div>

      </div>

    </div>
  </section>

  <section id="specialized" class="specialized section"
  style="background-image: url(<?= get_field('specialized_bg', $page_id)['url']; ?>)">

  </section>

<section id="mp_callback" class="mp_callback section">

</section>

<? get_footer(); ?>