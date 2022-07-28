<?php

$config = array
(
  'site' => array(
    'parent' => '../../',
    'path' => 'http://'.$_SERVER['HTTP_HOST'].str_replace('index.php','',$_SERVER['PHP_SELF']),
    'url' => 'https://blank.unlink.men/',
    'name'  => '透明圖片產生器',
    'title' => '透明圖片產生器',
    'description' => '這張圖片是透明的，我什麼都沒看到',
    'copyright' => 'just for fun',
    'shortcut-icon' => 'https://blank.unlink.men/images/favicon.png',
    'apple-touch-icon' => ''
  ),
  'setting' => array(
    'enable-database' => false,
    'enable-navbar-search' => false,
    'enable-member-system' => false
  ),
  'member' => array(
    'default-page' => 'member'
  ),
  'database' => array(
    'host'  => '',
    'user'  => '',
    'pass'  => '',
    'db'  => ''
  ),
  'admin' => array(
    '000000000000000'
  ),
  'google' => array(
    'analytics-id'  => 'UA-00000000-00'
  ),
  'facebook' => array(
    'fanpage' => '',
    'app-id' => '',
    'app-secret' => '',
    'privacy-policy' => ''
  ),
  'og' => array(
    'title' => '透明圖片產生器',
    'type'  => 'website',
    'url' => 'https://blank.unlink.men/',
    'image' => 'https://blank.unlink.men/images/fb.png',
    'sitename'  => '透明圖片產生器',
    'description' => '這張圖片是透明的，我什麼都沒看到'
  )
);

?>
