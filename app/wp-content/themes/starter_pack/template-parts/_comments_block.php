<?php
function sort_comment_fields($fields)
{
  $new_fields = array();
  $myorder = array('author', 'email', 'url', 'comment'); // ПОРЯДОК ПОЛЕЙ

  foreach ($myorder as $key) {
    $new_fields[$key] = $fields[$key];
    unset($fields[$key]);
  }

  if ($fields)
    foreach ($fields as $key => $val)
      $new_fields[$key] = $val;
  return $new_fields;
}

add_filter('comment_form_fields', 'sort_comment_fields');

function sheens_unset_url_field($fields)
{

  if (isset($fields['url'])) {
    unset ($fields['url']);
  }

  if (isset($fields['email'])) {
    unset ($fields['email']);
  }

  return $fields;
}

add_filter('comment_form_fields', 'sheens_unset_url_field');

function crunchify_init()
{
  add_filter('comment_form_fields', 'crunchify_comments_form_defaults');
}

add_action('after_setup_theme', 'crunchify_init');

function placeholder_author_email_url_form_fields($fields)
{
  $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __('Имя', 'yourdomain') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .
    '<input id="author" name="author" type="text" placeholder="От 3х символов" value="' . esc_attr($commenter['comment_author']) . '" size="20"' . $aria_req . ' /></p>';
  return $fields;
}

add_filter('comment_form_default_fields', 'placeholder_author_email_url_form_fields');


function crunchify_comments_form_defaults($default)
{
  unset($default['comment_notes_after']);
  return $default;
}

function the_comments_block($page_id)
{
  if (!comments_open($page_id)) {
    return '';
  } ?>
  <div class="the_comments_block">

    <div class="title_line">
      <h2 class="h2_title">Комментарии</h2>
    </div>

    <?
    the_comments_navigation();
    wp_list_comments(
      array(
        'style' => 'div',
        'short_ping' => true,
        'callback' => 'single_comment',
      ), get_comments(array('post_id' => $page_id,))
    );
    comment_form(array(
      'title_reply' => '',
      'comment_notes_before' => '',
      'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" disabled />',
      'comment_field' => sprintf(
        '<p class="comment-form-comment">%s %s</p>',
        sprintf(
          '<label for="comment">%s</label>',
          _x('Comment', 'noun')
        ),
        '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required" placeholder="Введите комментарий от 10 символов"></textarea>'
      ),
    ));
    ?>

  </div>
  <?
  return '';
}

function single_comment($comment, $args, $depth)
{
  if ('div' === $args['style']) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'li';
    $add_below = 'div-comment';
  }

  $classes = ' ' . comment_class(empty($args['has_children']) ? '' : 'parent', null, null, false);
  ?>

  <<?= $tag, $classes; ?> id="comment-<?php comment_ID() ?>">

  <? if ('div' != $args['style']) { ?>
  <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
} ?>

  <div class="commentmetadata">
    <?php edit_comment_link(__('Edit'), '  ', ''); ?>
  </div>

  <div class="avatar_wrapper" style="background-color: <?= get_random_color(); ?>">
    <?= mb_substr(get_comment_author(), 0, 1, 'UTF-8'); ?>
  </div>

  <a title="Комментарий «<?= get_comment_author(); ?>»"
     href="<?= htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"
     class="author_wrapper"
  >
    <div class="name"><?= get_comment_author(); ?></div>
    <div class="date"><?= get_comment_date(); ?></div>
  </a>

  <? comment_text(); ?>


  <? if ('div' != $args['style']) { ?>
  </div>
<?php }
}