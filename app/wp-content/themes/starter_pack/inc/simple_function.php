<?php
function get_currient_url()
{
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}


function checkField($fieldname, $id)
{
  if (!get_field($fieldname, $id)) {
    return false;
  }
  if (get_field($fieldname, $id) === '') {
    return false;
  }
  return true;
}

function get_random_color()
{
  $rand_color = [
    '#174873',
    '#CF304D',
    '#fc036f',
    '#7703fc',
    '#037bfc',
    '#03a5fc',
    '#03fc8c',
    '#fc03ad',
    '#fc036f',
    '#6203fc',
    '#fc5603',
  ];
  return $rand_color[random_int(0, count($rand_color) - 1)];
}
function get_blue_random_color()
{
  $rand_color = [
    '#03adfc',
    '#0398fc',
    '#0384fc',
    '#036ffc',
    '#0356fc',
    '#0339fc',
    '#2d03fc',
    '#5203fc',
    '#6203fc',
    '#7703fc',
  ];
  return $rand_color[random_int(0, count($rand_color) - 1)];
}

function hex2rgba($color, $opacity = false)
{

  $default = 'rgb(0,0,0)';

  //Return default if no color provided
  if (empty($color))
    return $default;

  //Sanitize $color if "#" is provided
  if ($color[0] == '#') {
    $color = substr($color, 1);
  }

  //Check if color has 6 or 3 characters and get values
  if (strlen($color) == 6) {
    $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
  } elseif (strlen($color) == 3) {
    $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
  } else {
    return $default;
  }

  //Convert hexadec to rgb
  $rgb = array_map('hexdec', $hex);

  //Check if opacity is set(rgba or rgb)
  if ($opacity) {
    if (abs($opacity) > 1)
      $opacity = 1.0;
    $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
  } else {
    $output = 'rgb(' . implode(",", $rgb) . ')';
  }

  //Return rgb(a) color string
  return $output;
}