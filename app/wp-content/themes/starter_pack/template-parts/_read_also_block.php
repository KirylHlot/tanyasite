<?

function the_read_also_block($page_id)
{
  ?>

  <div class="the_read_also_block">
    <div class="title_line">
      <h2>Читать еще</h2>
      <a aria-label="Ссылка на архив статей" href="/blog">
        <span>Смотреть все</span>
        <?= get_angle_right_icon(); ?>
      </a>
    </div>
    <div class="preview_list">
      <? $query = new WP_Query(array(
        'posts_per_page' => 6,
        'post_type' => 'blog',
        'post_status' => 'publish',
        'post__not_in' => array($page_id)
      ));

      while ($query->have_posts()) {
        $query->the_post();
        $color = get_blue_random_color();
        ?>

        <a title="Читать: <?= get_the_title(); ?>"
           href="<?= get_the_permalink(); ?>"
           class="preview_item"
           style="background-image: linear-gradient(
           -180deg,
           <?= hex2rgba($color, 1); ?>,
           <?= hex2rgba($color, .1); ?>),
           url(<?= get_field('main_img')['sizes']['large']; ?>);
         ">
          <span class="title"><?= get_the_title(); ?></span>
          <span class="more">
          Подробнее
          <?= get_angle_right_icon(); ?>
        </span>
        </a>

      <? };
      wp_reset_postdata(); ?>
    </div>
  </div>


<? }