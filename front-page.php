<?php 

// Short hand way of doing things
Templater::render(array(
	'header' => array('blah' => 'welcome to the site'),
	'content' => array('page' => 'page', 'vars' => array('variable' => 'craig')),
	'footer' => array(),
	'globals' => array()
));

?>