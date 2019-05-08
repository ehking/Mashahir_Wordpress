<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

?>

<div class="row breadcrumbs">
    <div class="container ">
<?php
if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<div><p id="breadcrumbs">','</p></div>' );
}else{
    echo "Yoast Not install";
}
?>
</div>
</div>

<div class="container">
            <?php
            // Start the Loop.
            $pod = pods( 'mashahir', get_the_id() );
            $related = $pod->field( 'img' );

            if ($related){
                foreach ($related as $img){
                    $row.='<div class="swiper-slide" style="text-align: center"><img src="'.$img['guid'].'" alt="'.$img['post_title'].'" style="max-height: 400px"></div>';
                }
            }else{
                $row='<img  src="'.get_stylesheet_directory_uri().'/img/index/1.png'.'" alt="" style="max-height: 400px;margin: 0 auto;">';
            }
            while ( have_posts() ) :
                the_post();
         if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) )
         $sh= ADDTOANY_SHARE_SAVE_KIT(array(
                 'output_later'=>true
         ));
                if(function_exists('wp_ulike'))
                   $link= wp_ulike('put');
                else
                    $link="wp_ulike no install";

                echo ' <div class="row single_p">
        <div class="col-sm-12 single_post" >
            <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="row link_nav">
                    <h6><a href="'.get_next_post()->guid.'" title="پست بعدی"> <i class="fa fa-angle-right"></i></a></h6>
                    <h6><a href="'.get_previous_post()->guid.'" title="پست قبلی"> <i class="fa fa-angle-left"></i></a></h6>
                    <h2><a href="#"> '.get_the_title().'</a></h2>
                </div>
                <div>
                    <div class="row"><span>'.the_ratings('span',0,false).'</span><span>'." ( ".get_comments_number()."  دیدگاه کاربر  "." ) ".' </span></div>
                </div>
                <div class="row">
                   <p>'.substr(get_the_content(),0,600).'...'.'</p>
                </div>
                <div class="row">
                    '.$link.'
                   
                </div>
                <hr>    
                <div class="row">
               
                    <p>  اشتراک گذاری   </p>
                             <div>
                        '.$sh.'
                        </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
            
            <div class="swiper-container">
    <div class="swiper-wrapper">
    
     '.$row.'
    </div>
    
    <!-- Add Arrows -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
               
            </div>
            </div>
        </div>
    </div>';

            endwhile;
            ?>
    <script>
        var swiper = new Swiper(".swiper-container", {
            autoHeight: true,
            loop:true,
            pagination: {
                el: ".swiper-pagination",
                type: "bullets",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

        });
    </script>
</div>
<div class="row">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home" class="active">توضیحات</a></li>
        <span>|</span>
        <li><a data-toggle="tab" href="#menu1">نظرات</a></li>
    </ul>
</div>

    <div class="container">
        <div class="row tab_post">
            <div class="col-sm-12">
                <div id="home" class="tab-pane fade in active show di_none">
                    <p><?php  echo get_the_content()?></p>
                </div>
                <div id="menu1" class="tab-pane fade di_none">
                    <?php comments_template('comments.php'); ?>
                </div>
            </div>
        </div>
    </div>




<div>
    <?php get_footer();  ?>
</div>

