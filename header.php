<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <link type="text/css" href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" media="screen" />
    <?php wp_head(); ?>
</head>
<body>
<div class="row">

    <?php
    if (! is_admin_bar_showing() ) {
       ?>
        <div class="col-sm-12 sub_header">
            <div>
                <a href="<?php echo wp_login_url(); ?> "><h3> ورود به حساب کاربری <i class="fa fa-user-circle"></i></h3></a>
            </div>
        </div>
    <?php
    }
    ?>

<div class="col-sm-12 header <?php if ( is_admin_bar_showing() ) {echo "margin_top_55";}?>">
    <div class="row">
        <div class="col-sm-6">
            <a href="#" id="headingimg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/NastaliqOnline.png" alt=""></a>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>
</div>
<!--<script src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/js/app.js"></script>-->