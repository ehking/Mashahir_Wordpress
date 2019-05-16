<div class="col-sm-12 menu d-none d-md-block d-lg-block d-xl-block">
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
                   $img_cat= templ_get_the_icon(array('size'=> 'thumbnail'),'category',$category->term_id);
                   if ($img_cat){
                       $img='<img src="'.$img_cat[1][0].'" alt="'.$category->name.'">';
                   }else{
                       $img='<i class="fa fa-low-vision"></i>';
                   }

                    echo '<li class="main_list"><a href="'.get_category_link($category->term_id).'">'.$img. $category->name.' </a>';
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