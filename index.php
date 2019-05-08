
<?php get_header(); ?>
<div class="row">
    <div class="container">
        <div class="col-sm-12 slider">
            <?php putRevSlider("test1") ;?>
        </div>
        <?php get_template_part('temp/menu_category') ?>
    </div>
</div>
    <div class="container">
        <div class="row index_img">
            <div class="col-sm-12 col-md-8">
                <div class="col-sm-12" style="padding: 0;">
                    <?php dynamic_sidebar('img1') ?>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7 img_250">
                        <?php dynamic_sidebar('img3') ?>
                    </div>
                    <div class="col-sm-12 col-md-5 img_250">
                        <?php dynamic_sidebar('img4') ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 img_da">
                <?php dynamic_sidebar('img2') ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row rnd_post">

<?php
$args = array(
    'post_type' => 'Mashahir',
    'orderby'   => 'rand',
    'posts_per_page' => 2,
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $tags=get_the_tag_list(' ',' , ' ,' ' );
        if($tags){
            $tags=explode(',',$tags);
           foreach ($tags as $tag){
               $ta.='<span>'."".$tag.", ".'</span>';
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
        if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) )
            $sh= ADDTOANY_SHARE_SAVE_KIT(array(
                'output_later'=>true
            ));
            echo ' <div class="col-sm-12 col-md-6 wo-posts" >
                <div class="row">
                    <div class="col-sm-12 col-md-8  wo-post">
                           <p>'.$ta.'</p>
                        <h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>
                         <span style="    text-align: right; display: block;">'.the_ratings('span',0,false).'</span>
                        <p>'.substr(get_the_content(),0,400).'...'.'</p>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <a href=""> <img src="'.$img.'" alt="'.get_the_title().'" style="width: 170px;height: 200px"></a>
                    </div>
                </div>
            </div>';
    }
}else
    echo '<p>پستی وجود ندارد</p>';
?>
        </div>
    </div>

<div class="container">
    <div class="row last_post">
        <div class="col-sm-12">
            <h3> آخرین مشاهیر اضافه شده </h3>
        </div>

    </div>
    <div class="row">
        <div class="swiper-container">
            <div class="swiper-wrapper">
        <?php
        $args = array(
            'post_type' => 'Mashahir',
            'orderby'   => '',
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
<div>
    <?php get_footer(); ?>
</div>



