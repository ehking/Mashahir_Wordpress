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


<div class="row">
    <div class="container ">
        <div class="col-sm-12 order_by">
            <div style="float: right;">
                <?php
                 if (isset($_GET['filter']))
                     $filter=$_GET['filter'];
                 else
                     $filter='';

//                $mypod = pods('mashahir', array(
//                    'where'   => 'brithday LIKE "%'.$filter.'%"',
//                    'limit'=>-1
//                ));
//                var_dump($mypod);
//                die();
                $args = array(
                    'post_type' => 'Mashahir',
                    'cat'=>get_queried_object()->cat_ID,
                    'orderby'   => '',
                    'posts_per_page' => 5,
                );
                $the_query = new WP_Query( $args );
//                var_dump($the_query);
//                die();
                ?>
                <p><?php if ($the_query->post_count>0) echo $the_query->post_count; ?></p>
                <select name="S_filter" id="S_filter"data-placeholder="فیتلرسازی">
                    <option value="c_date">تاریخ ایجاد</option>
                    <option value="b_date">تاریخ تولد</option>
                    <option value="rnd">تصادفی</option>
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
                <div class="col-sm-12 col-md-2">
                    <a href="'.get_permalink().'"><img src="'.$img.'" alt="'.get_the_title().'" style="height: 278px;width: 198px"></a>
                </div>
                <div class="col-sm-12 col-md-8 contents">
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
           <?php paginate_links() ?>
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
