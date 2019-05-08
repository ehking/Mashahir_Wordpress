<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<div class="row">
    <div class="container">
        <?php get_template_part('temp/menu_category') ?>
    </div>
</div>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

        <?php
        if($_GET['S_category']=='AnyCategory'){
            $cat='';
        }else{
            $cat=$_GET['S_category'];
        }
        if($_GET['s']==''){
            $search='';
        }else{
            $search=$_GET['s'];
        }
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('posts_per_page' => 3, 'paged' => $paged ,'post_type'=>'Mashahir', 'cat'=>$cat, 's'=>$search);
        $the_query=new WP_Query($args);
        ?>
            <div class="row">
                <div class="container ">
                    <div class="col-sm-12 category_list">
                        <?php
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
                    <img src="'.$img.'" alt="'.get_the_title().'" style="height: 278px;width: 198px">
                </div>
                <div class="col-sm-12 col-md-8 contents">
                    <h2><a href="">'.get_the_title().'</a></h2>
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
                    <div class="col-sm-12" style="padding: 20px">
                        <?php echo paginate_links(); ?>
                    </div>
                </div>
            </div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer();?>
