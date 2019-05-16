<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/swiper.js"></script>
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
    <nav class="d-lg-none d-xl-none col-sm-12 navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler d-block d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>
        <a class="" href="#" style="margin: 0 auto;"><?php bloginfo('name')?></a>

        <div class="d-lg-none d-xl-none collapse col-sm-12 nav_mobile" id="navbarSupportedContent">
            <ul>
                <li>
                    <div class="row ">
                        <div class="col-sm-12 Top_Menu_mobile">
                            <?php wp_nav_menu( array( 'theme_location' => 'Top_Menu' ,'container'=>'')); ?>
                        </div>
                    </div>
                </li>
                <li>
                    <hr>
                        <h3 style="text-align: right">دسته بندی</h3>
                    <ul class="Cat_Menu_mobile">
                        <?php
                        $categories = get_categories(array(
                            "hide_empty"=>"0",
                        ));
                        $n=1;
                        foreach($categories as $category) {
                            if (in_array($category->term_id,get_option('cat'))) {
                                $categoryid=$category->term_id;
                                echo ' <li class="nav-item dropdown">';
                                echo ' <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> '.$category->name.'</a>';
                              echo  ' <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                foreach ($categories as $categoryc){
                                    if ($categoryid == $categoryc->parent) {
                                        echo ' <a class="dropdown-item" href="'.get_category_link($categoryc->term_id).'">'.$categoryc->name.'</a>';
                                    }
                                }
                                echo '</div>';
                            }
                        }
    //                    ?>
                    </ul>
                    </li>
                </li>
            </ul>

            <?php get_template_part('temp/menu_category') ?>
        </div>
    </nav>


    <div class="col-sm-12 header <?php if ( is_admin_bar_showing() ) {echo "margin_top_55";}?>">
        <div class="container">
             <div class="row">
                <div class="col-sm-12 col-md-6">
                    <a href="<?php bloginfo('url')?>" id="headingimg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/NastaliqOnline.png" alt="Logo" style="width: 100%;max-width: 350px;"></a>
                </div>
                <div class="col-sm-12 col-md-6">
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
            <div class="row ">
                <div class="col-sm-12 single_menu d-none d-md-block d-lg-block d-xl-block">
                       <?php wp_nav_menu( array( 'theme_location' => 'Top_Menu' ,'container'=>'')); ?>
                </div>
            </div>
        </div>
    </div>
</div>


