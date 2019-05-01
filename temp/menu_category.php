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