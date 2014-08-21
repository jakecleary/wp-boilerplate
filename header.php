<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php print STYLES_DIR . 'main.css'; ?>">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php print SCRIPTS_DIR . 'main.min.js'; ?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body class="">
    <div class="page-wrapper">
        <header class="page-header" role="banner">
        <!--
            NAVIGATION and WAI-ARIA
            ========================
            Anywhere you display content that contains links to navigate this document and/or related documents you should include the 'navigation' aria tag to help screen readers understand this contnent.
            For example, the main navigation for this documnent may look a little something like:

            <nav role="navigation"> ... </nav>
        -->
        </header>
        <main class="page-content" role="main">
