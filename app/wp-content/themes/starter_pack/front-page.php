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

  <section id="specialized" class="specialized common_padding section"
           style="background-image: url(<?= get_field('specialized_bg', $page_id)['url']; ?>)">
    <div id="specialized_scene_prlx" class="specialized_scene_prlx">

      <div class="cssload-loader">
        <div class="cssload-inner cssload-one"></div>
        <div class="cssload-inner cssload-two"></div>
        <div class="cssload-inner cssload-three"></div>
      </div>

      <div class="line l_vertical line_01"></div>
      <div class="line l_vertical line_02"></div>
      <div class="line l_horizontal line_03"></div>
      <div class="line l_horizontal line_04"></div>

    </div>

    <div class="main_wrapper">

      <div class="title_line">
        <h2 class="h2_title"><?= get_field('specialized_title', $page_id); ?></h2>
      </div>

      <? if (have_rows('specialized_list', $page_id)) { ?>
        <div class="card_list">
          <?
          $counter = 0;
          $hidden_galary_list = '<div class="hidden_galary_list d_none">';

          while (have_rows('specialized_list', $page_id)) {
            the_row();

            if (get_sub_field('examples_list')) {
              $examples_list = get_sub_field('examples_list');
              $count_examples_list = count($examples_list);

              if ($examples_list[0]['caption'] and $examples_list[0]['caption'] !== '') {
                $data_caption = 'data-caption="' . $examples_list[0]['caption'] . '"';
              } else {
                $data_caption = '';
              }
              $examples_list_img_url = $examples_list[0]['image']['sizes']['large'];
              $wrapper_top = '<a href="' . $examples_list[0]['image']['url'] . '" data-fancybox="galary_' . $counter . '" ' . $data_caption . ' class="card has_example">';
              $wrapper_bottom = '</a>';

              if ($count_examples_list > 1) {
                for ($i = 1; $i < $count_examples_list; $i++) {
                  if ($examples_list[$i]['caption'] and $examples_list[$i]['caption'] !== '') {
                    $data_caption = 'data-caption="' . $examples_list[$i]['caption'] . '"';
                  } else {
                    $data_caption = '';
                  }
                  $hidden_galary_list = $hidden_galary_list . '<a href="' . $examples_list[$i]['image']['url']
                    . '" data-fancybox="galary_' . $counter . '" class="d_none" ' . $data_caption . '></a>';
                }
              }
            } else {
              $wrapper_top = '<div class="card">';
              $wrapper_bottom = '</div>';
              $examples_list_img_url = false;
            }
            ?>

            <?= $wrapper_top; ?>
            <div class="left_part">
              <? if ($examples_list_img_url) { ?>
                <svg xmlns="http://www.w3.org/2000/svg"
                     xml:space="preserve" width="100%" height="100%"
                     version="1.1"
                     style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                     viewBox="0 0 518866 537577"
                     class="get_card_bg has_mask">

                      <mask id="msk1">
                        <path class="stripe1"
                              d="M0 0l430796 0c34935,0 31601,56041 36402,89462 6211,43235 13137,68317 19742,86129 38052,102610 49852,122703 -8395,219067 -8372,13849 -12289,36993 -2414,96166 3644,21831 -14029,38087 -33949,45698 -8174,3123 -442182,-969 -442182,-8582l0 -527940z"></path>
                      </mask>

                  <image xlink:href="<?= $examples_list_img_url; ?>" mask="url(#msk1)"></image>
                  </svg>
              <? } else {
                echo get_card_bg();
              } ?>
            </div>
            <div class="right_part">
              <div class="title"><?= get_sub_field('title'); ?></div>
              <div class="desc"><?= get_sub_field('desc'); ?></div>
              <div class="more">Смотреть образцы</div>
            </div>
            <?= $wrapper_bottom; ?>

            <? $counter++;
          }
          echo $hidden_galary_list . '</div>';

          ?>
        </div>
        <?
        reset_rows();
      } ?>

    </div>


  </section>

  <section id="portfolio" class="portfolio section">
    <div class="full_width_wrapper">

      <h2 class="h2_title">
        <?= get_field('portfolio_title', $page_id); ?>
      </h2>

      <div class="category_list">
        <?
        $terms = get_terms([
          'taxonomy' => 'portfolio_tax',
          'hide_empty' => false,
          'meta_key' => 'tax_order',
          'orderby' => 'meta_value',
          'order' => 'ASC'
        ]);

        foreach ($terms as $term) {
          $title = $term->name;
          $description = $term->description;
          $slug = $term->slug;
          $term_id = $term->term_id;
          $bg_img = get_field('tax_cover', 'term_' . $term_id)['url'];
          ?>
          <a href="/<?= $slug; ?>">
            <span class="bgimg" style="background-image: url(<?= $bg_img; ?>)"></span>
            <span class="title"><?= $title; ?></span>
          </a>
        <? } ?>


      </div>


    </div>
  </section>

  <div id="insta" class="insta section">

    <div class="full_width_wrapper">
      <div class="insta_scene">

        <a aria-label="Мой инстаграм" href="<?= get_field('ct_instagram', 'option'); ?>" class="insta_title" target="_blank">
          <?= get_instagram_full_logo(); ?>
        </a>
        <div class="insta_content">
          Мои лучшие работы здесь
        </div>
      </div>
      <?= do_shortcode('[instagram-feed]');?>
    </div>
  </div>

  <section id="blog" class="blog">
    <div class="main_wrapper">

    </div>
  </section>

  <section id="contacts" class="contacts">
    <div class="main_wrapper">

    </div>
  </section>

<? get_footer(); ?>