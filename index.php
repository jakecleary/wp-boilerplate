<?php

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();

dump($content);

Timber::render('index.twig', $context);
