<?php 

// Short hand way of doing things
$header = array('blah' => 'welcome to the site');

$content = array(
  'page' => 'page',
  'path' => '/path/to/page/file/', // This is optional
  'vars' => array('variable' => 'craig')
);

$footer = array();
$globals = array();

Templater::render(array(
    'header' => $header,
    'content' => $content,
    'footer' => $footer,
    'globals' => $globals
));

?>