<?php

function the_fixed_social_list()
{ ?>

  <ul id="fixed_social_list" class="fixed_social_list">

    <? if (checkField('ct_instagram', 26)){ ?>
      <li>
        <a aria-label="Инстаграм" href="<?= get_field('ct_instagram', 26); ?>">
          <?= get_instagram_icon(); ?>
        </a>
      </li>
    <? } ?>

    <? if (checkField('ct_vkontakte', 26)) { ?>
      <li class="social_icon">
        <a aria-label="Вконтакте" href="<?= get_field('ct_vkontakte', 26); ?>>">
          <?= get_vk_icon(); ?>
        </a>
      </li>
    <? } ?>

    <? if (checkField('ct_facebook', 26)) { ?>
      <li>
        <a aria-label="Фейсбук" href="<?= get_field('ct_facebook', 26); ?>">
          <? get_fb_icon(); ?>
        </a>
      </li>
    <? } ?>

  </ul>


<? }