
<?php get_header(); ?>
<div class="row">
    <div class="container">
        <div class="col-sm-12 slider">
            <?php putRevSlider("test1") ;?>
        </div>
        <div class="col-sm-12 menu">
            <ul id="main_menu">
                <div class="row">
                    <?php
                    $categories = get_categories(array(
                        "hide_empty"=>"0",
                    ));
                    $n=1;
                    foreach($categories as $category) {
                        if (in_array($category->term_id,get_option('cat'))) {
                            $categoryid=$category->term_id;
                            echo '<li class="main_list"><a href="'.get_category_link($category->term_id).'"><i class="fa '.$category->term_font_icon.'"></i>'. $category->name.' </a>';
                            echo '<ul class="animate fadeInDown">';
                            echo '<ol>';
                            foreach ($categories as $categoryc){
                                if ($n==4){
                                    echo "</ol><ol>";
                                    $n=0;
                                }
                                if ($categoryid == $categoryc->parent) {
                                    echo '<a class="" href="'.get_category_link($categoryc->term_id).'">
                            <li>'. $categoryc->name.'</li>
                        </a>';
                                    $n++;
                                }
                            }
                            echo '</ul></li>';
                        }
                    }
                    ?>
                </div>
            </ul>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row index_img">
            <div class="col-sm-12 col-md-8">
                <div class="col-sm-12" style="padding: 0;">
                    <a href=""> <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/4.png" alt="" style="height: 250px;width: 100%"></a>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <a href=""> <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/2.png" alt="" style="height: 250px;width: 100%"></a>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <a href=""> <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/3.png" alt="" style="height: 250px;width: 100%"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <a href=""> <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/1.png" alt="" style="width: 100%;height: 96.5%;"></a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row rnd_post">

<?php
$args = array(
    'post_type' => 'post',
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
         if(has_post_thumbnail()){
            $img=get_the_post_thumbnail_url();
         } else {
          $img= get_stylesheet_directory_uri().'/img/index/1.png';
             }
            echo ' <div class="col-sm-12 col-md-6 wo-posts" >
                <div class="row">
                    <div class="col-sm-12 col-md-8  wo-post">
                           <p>'.$ta.'</p>
                        <h2>'.get_the_title().'</h2>
                        <p>star</p>
                        <p>'.get_the_content().'</p>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <a href=""> <img src="'.$img.'" alt="" style="width: 100%;height: 70.5%;"></a>
                    </div>
                </div>
            </div>';
    }
}else
    echo '<p>no post</p>';
?>
        </div>
    </div>

<div class="container">
    <div class="row last_post">
        <div class="col-sm-12">
            <h3> <hr>آخرین مشاهیر اضافه شده </h3>
        </div>

    </div>
    <div class="row">
        <?php
        $args = array(
            'post_type' => 'post',
            'orderby'   => '',
            'posts_per_page' => 5,
        );
//        $the_query = new WP_Query( $args );
        query_posts('posts_per_page=5');
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                $tags=get_the_tag_list(' ',' , ' ,' ' );
                if($tags){
                    $tags=explode(',',$tags);
                    foreach ($tags as $tag){
                        $ta.='<span>'."".$tag.", ".'</span>';
                    }
                }else{
                    $ta="<span></span>";
                }
                if(has_post_thumbnail()){
                    $img=get_the_post_thumbnail_url();
                } else {
                    $img= get_stylesheet_directory_uri().'/img/index/1.png';
                }
                echo '
                <div class="col-sm-2dot4 col-md-2dot4 col-lg-2dot4 ">
                    <div class="col-sm-12 last_posts">
                        <a href=""> <img src="'.$img.'" alt="" style="width: 100%;height: 80%;"></a>
                        <h3>'.get_the_title().'</h3>
                        <p>'.$ta.'</p>
                    </div>
                </div>';
             }
        }
        ?>






    </div>
</div>
<div>
    <?php get_footer(); ?>
</div>



