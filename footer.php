
<div class="row">
    <div class="col-sm-12 co-footer"></div>
</div>
<div class="row footer">
    <div class="col-sm-12 col-md-6 col-lg-3">
        <h3><?php   echo Es_get_menu_by_location('Footer1')->name;?></h3>
        <?php wp_nav_menu( array( 'theme_location' => 'Footer1' ,'container'=>'','link_after'=>'<i class="fa fa-angle-left"></i>')); ?>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <h3><?php   echo Es_get_menu_by_location('Footer2')->name;?></h3>
        <?php wp_nav_menu( array( 'theme_location' => 'Footer2' ,'container'=>'','link_after'=>'<i class="fa fa-angle-left"></i>')); ?>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <h3><?php   echo Es_get_menu_by_location('Footer3')->name;?></h3>
        <?php wp_nav_menu( array( 'theme_location' => 'Footer3' ,'container'=>'','link_after'=>'<i class="fa fa-angle-left"></i>')); ?>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <?php dynamic_sidebar('Footer') ?>

    </div>
</div>


<?php wp_footer(); ?>

</body>
</html>
