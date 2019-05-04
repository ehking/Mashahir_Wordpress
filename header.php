<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/safari-pinned-tab.svg" color="#5bbad5">
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.js"></script>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.bundle.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/select.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/until.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/alert.js"></script>
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
                <a href="<?php echo wp_login_url(); ?> "><h3> ورود به حساب کاربری <i class="fa fa-user"></i></h3></a>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="col-sm-12 header <?php if ( is_admin_bar_showing() ) {echo "margin_top_55";}?>">
        <div class="container">
             <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="<?php bloginfo('url')?>" id="headingimg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/NastaliqOnline.png" alt=""></a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="search-header">
                            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                                <label>
                                    <input type="search" class="search-field" placeholder=" جست و جوی شخصیت ..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="جست و جوی شخصیت ..." />
                                </label>
                                <input type="submit" class="search-submit btn btn-success" value="جست و جو" />
                                <select name="S_category" data-placeholder="همه دسته ها">
                                    <option value="AnyCategory">همه دسته ها</option>
                                <?php

                                $categories = get_categories(array(
                                        "hide_empty"=>"0",
                                ));
                                foreach($categories as $category) {
                                if ($category->parent == "")
                                    echo '<option value="'.$category->term_id.'">' . $category->name . '</option>';
                                }
                                ?>
                                </select>
                            </form>
                        </div>
                     </div>
                </div>
             </div>
            <div class="row">
                <div class="col-sm-12 single_menu">
                       <?php wp_nav_menu( array( 'theme_location' => 'Top_Menu' ,'container'=>'')); ?>
                </div>
            </div>
        </div>
    </div>
</div>


