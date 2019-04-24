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
        <div class="container">
             <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="#" id="headingimg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/NastaliqOnline.png" alt=""></a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="search-header">
                            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                                <label>
                                    <input type="search" class="search-field" placeholder=" جست و جوی شخصیت ..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="جست و جوی شخصیت ..." />
                                </label>
                                <input type="submit" class="search-submit btn btn-success" value="جست و جو" />
                                <select name="food_selector" data-placeholder="همه دسته ها">
                                    <option value="AnyCategory">همه دسته ها</option>
                                <?php

                                $categories = get_categories(array(
                                        "hide_empty"=>"0",
                                ));
                                foreach($categories as $category) {
                                if ($category->parent == "")
                                    echo '<option value="' . get_category_link($category->term_id) . '">' . $category->name . '</option>';
                                }
                                ?>
                                </select>
                            </form>
                        </div>
                     </div>
                </div>
             </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="container">
        <div class="col-sm-12 slider">
            <img class="img-fluid" src="<?php echo get_option('logo');  ?>" alt="header"">
        </div>
    <div class="col-sm-12 menu">
<!--        <ul class="nav nav-tabs" id="myTab" role="tablist">-->
<!---->
<!--            --><?php
//            foreach($categories as $category) {
//                if ($category->parent == "") {
//                    echo '<li class="nav-item col-lg-2 col-md-3 col-sm-6">';
//                    echo '<a class="nav-link" id="'. $category->slug.'-tab" data-toggle="tab" href="#'. $category->slug.'" role="tab" aria-selected="false" aria-controls="'. $category->term_id .'" >' ;
//                    echo '<i class="icon fa '.$category->term_font_icon.'"></i>'. $category->name.'</a>';
//                    echo ' </li>';
//                }
//            }
//            ?>
<!--        </ul>-->
<!--            --><?php
//            foreach($categories as $category) {
//                if ($category->parent == "") {
//                    $categoryid=$category->term_id;
//                  $msg='<div class="col-sm-12 sub-menu">';
//                   $msg.= '<ul>';
//                    foreach($categories as $categoryc) {
//                        if ($categoryid == $categoryc->parent) {
//                            $msg.= '<li> '.$categoryc->name.'</li>';
//                        }
//                    }
//            $msg.='</ul>';
//            $msg.='</div>';
//                 echo '<div class="tab-pane deactive fade" id="'.$category->slug.'" role="tabpanel" aria-labelledby="'.$category->slug.'-tab">
//                 '.$msg.'
//                 </div>';
//                }
//            }
//            ?>

        <ul id="main_menu">
                 <?php
            foreach($categories as $category) {
                if ($category->parent == "") {
                    echo '<li class="main_list"><a href="">'. $category->name.'<i class="fa '.$category->term_font.'"></i></a>';
                    echo ' <ul class="animate fadeInDown">
                    <ol>
                        <a class="mmmk" href="">
                            <li>'. $category->name.'</li>
                        </a>
                    </ol>
                </ul>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
        <br>
        <p>rf</p>

    </div>
    </div>
</div>





<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.bundle.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/select.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/until.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>