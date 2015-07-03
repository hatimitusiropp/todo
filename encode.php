<?php
function e($str, $charset = 'UTF-8'){
  return htmlspecialchars($str, ENT_QUOTES, $charset);
}

function format($datetime, $format = 'Y/m/d'){
  $ts = strtotime($datetime);
  print(date($format,$ts));
}
