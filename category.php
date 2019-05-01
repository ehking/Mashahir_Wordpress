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

<div>
<?php get_footer();?>
</div>
