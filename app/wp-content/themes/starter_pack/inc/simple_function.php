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
