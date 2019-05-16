<?php
/**
 * The template for displaying Category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>
<div class="row">
    <div class="container">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<div class="breadcrumbs"><p id="breadcrumbs">','</p></div>' );
        }else{
            echo "Yoast Not install";
        }

        ?>
    </div>
</div>
<div class="row">
    <div class="container">
<?php get_template_part('temp/menu_category') ?>
    </div>
</div>

<?php
if (isset($_GET['filter']))
    $filter=$_GET['filter'];
else
    $filter='';
?>
<div class="row">
    <div class="container ">
        <div class="col-sm-12 order_by">
            <div style="float: right;">

                <p><?php if ($the_query->post_count>0) echo $the_query->post_count; ?></p>
                <select name="S_filter" id="S_filter"data-placeholder="فیتلرسازی">
                    <option value="c_date" <?php if ($filter=='c_date') echo 'selected'?> >تاریخ ایجاد</option>
                    <option value="b_date" <?php if ($filter=='b_date') echo 'selected'?>>تاریخ تولد</option>
                    <option value="rnd" <?php if ($filter=='rnd') echo 'selected'?>>تصادفی</option>
                </select>
                <script>
                    $('#S_filter').change(function() {
                        var option = $(this).find('option:selected');
                        var op=option.val();
                        // $.get( "", { name: "John", time: "2pm" } );
                        <?php global $wp;
                        $url=home_url($wp->request);?>
                        window.location="<?php echo $url ?>"+"?filter="+op.toString();
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<?php

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'Mashahir',
    'cat'=>get_queried_object()->cat_ID,
    'orderby'   => '',
    'posts_per_page' => 10,
    'paged'=>$paged
);
if ($filter=='c_date'){
    $args['orderby']='post_date';
}
if ($filter=='c_date'){
    $args['orderby']='post_date';
}
if ($filter=='b_date'){
    $args['meta_key']='brithday';
    $args['orderby']='meta_value';
}
if ($filter=='rnd'){
    $args['orderby']='rand';
}
$the_query = new WP_Query( $args );
?>

<div class="row">
    <div class="container ">
        <div class="col-sm-12 category_list">
            <?php
//            var_dump(get_queried_object());
//            die();

            if ( $the_query->have_posts() ) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) )
                        $sh= ADDTOANY_SHARE_SAVE_KIT(array(
                            'output_later'=>true
                        ));
                    if(function_exists('wp_ulike'))
                        $link= wp_ulike('put',array('id'=>get_the_ID()));
                    else
                        $link="wp_ulike no install";

                    $pod = pods( 'mashahir', get_the_id() );
                    $related = $pod->field( 'img' );

                    if($related){
                        $img=$related[0]['guid'];
                    } else {
                        $img= get_stylesheet_directory_uri().'/img/index/1.png';
                    }

                    echo ' <div class="row margin_top_20">
                <div class="col-sm-12 col-md-3">
                    <a href="'.get_permalink().'"><img src="'.$img.'" alt="'.get_the_title().'" style="height: 278px;width: 198px;display: block;margin: 0 auto"></a>
                </div>
                <div class="col-sm-12 col-md-7 contents">
                    <h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>
                    <div>
                        <div class="row"><span>'.the_ratings('span',0,false).'</span><span>'." ( ".get_comments_number()."  دیدگاه کاربر  "." ) ".' </span></div>
                    </div>
                    <p>'.substr(get_the_content(),0,500).'...'.'</p>
                </div>
                <div class="col-sm-12 col-md-2">
                    '.$link.'
                    '.$sh.'
                </div>
            </div>';

                }

            }else{
                echo "<p style='text-align: center;padding: 20px'>داده ای برای نمایش وجود ندارد</p>";
            }
            ?>

        </div>
        <div class="col-sm-12">
            <?php $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $the_query->max_num_pages
            ) );
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="container">
        <div class="col-sm-12" style="padding: 0;margin-top: 40px;text-align: center;">
            <?php dynamic_sidebar('img1') ?>
        </div>
    </div>
</div>

<div>
<?php get_footer();?>
</div>
