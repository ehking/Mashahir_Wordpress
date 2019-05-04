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
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

        <?php
        if($_GET['S_category']=='AnyCategory'){
            $cat='';
        }else{
            $cat=$_GET['S_category'];
        }
        $wp=new WP_Query(array(
           'post_type'=>'Mashahir',
           'posts_per_page' => 5,
           'cat'=>$cat
        ));
        if ($wp->have_posts()){
            while ($wp->have_posts()){
                the_post();
                echo the_title();
            }
        }else{
            echo '<p style="text-align: center;padding: 50px">مورد شما پیدا نشد</p>';
        }

        ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer();?>
