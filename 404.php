<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>


<div class="container">
    <div class="row" style="background: white;padding: 50px;margin-top: 20px">



                    <header class="page-header" style="margin: 0 auto">
                        <h1 class="page-title"> ); صفحه ی موردنظر شما پیدا نشد</h1>
                    </header><!-- .page-header -->
            <div class="col-sm-12">
                <div class="row">

                    <h3>مطالب پیشنهادی</h3>

                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            $args = array(
                                'post_type' => 'Mashahir',
                                'orderby'   => 'rand',
                                'posts_per_page' => 10,
                            );
                            $the_query = new WP_Query( $args );
                            //        query_posts('posts_per_page=5');
                            if ( $the_query->have_posts() ) {
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();

                                $cats=get_the_category();
                                $ta="";
//                    var_dump($cats);
                                if($cats){
                                    if (count($cats)==1)
                                        $ta='<a href="'.get_category_link($cats[0]->term_id).'">'.$cats[0]->name.'</a>';
                                    else{
                                        for ($i=1;$i<=2;$i++){
                                            $ta.=' '.'<a href="'.get_category_link($cats[$i]->term_id).'">'.$cats[$i]->name.'</a>'.',';
                                        }

                                    }
                                }else{
                                    $ta="<span></span>";
                                }
                                $pod = pods( 'mashahir', get_the_id() );
                                $related = $pod->field( 'img' );

                                if($related){
                                    $img=$related[0]['guid'];
                                } else {
                                    $img= get_stylesheet_directory_uri().'/img/index/1.png';
                                }
                                echo '
                    <div class="col-sm-4 col-md-2 last_posts swiper-slide" style="cursor: pointer">
                        <a href="'.get_permalink().'"> <img src="'.$img.'" alt="'.get_the_title().'" style="width: 100% ;height: 200px"></a>
                        <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                       <p>'.$ta.'</p>
                    </div>
                    
                           ';
                            }
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <?php

                    }else{
                        echo '<p>پستی وجود ندارد</p>';
                    }
                    ?>
                </div>
                <script>
                    var swiper = new Swiper('.swiper-container', {
                        slidesPerView: 5,
                        spaceBetween: 50,
                        autoplay: {
                            delay: 4000,
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        breakpoints: {
                            1024: {
                                slidesPerView: 4,
                                spaceBetween: 40,
                            },
                            768: {
                                slidesPerView: 3,
                                spaceBetween: 30,
                            },
                            640: {
                                slidesPerView: 2,
                                spaceBetween: 20,
                            },
                            320: {
                                slidesPerView: 1,
                                spaceBetween: 10,
                            }
                        }
                    });
                </script>
            </div>

    </div>
</div>



<div><?php get_footer(); ?></div>
