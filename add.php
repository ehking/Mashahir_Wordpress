<?php
/* Template Name: Register_Page */
get_header();
session_start();
if (isset($_SESSION['flash_messages'])){
    $error=$_SESSION['flash_messages'];
    switch ($error){
        case 'sizeimg';
        alert("سایز تصویر باید کمتر از ۲ مگ باشد",'error');
        break;
        case 'formatimg';
            alert("فرمت عکس باید jpg/png/gif باشد",'error');
            break;
        case 'sizefile';
            alert("سایز فایل باید کمتر از ۲ مگ باشد",'error');
            break;
        case 'formatfile';
            alert("فرمت فایل باید pdf/doc باشد",'error');
            break;
            case 'validfrm';
                alert("فیلد های الزارمی را پر کنید",'error');
                break;
        default:
            alert($error,'error');
            break;
    }
    unset($_SESSION['flash_messages']);
}else if ($_SESSION['flash_messages_success']){
    alert("درخواست شما ارسال و مورد بررسی قرار خواهد گرفت",'success');
    unset($_SESSION['flash_messages_success']);
}

function alert($msgg,$ico){
    if ($ico==="success")
        $title="موفقیت";
    elseif($ico==="error")
        $title="خطا";

 echo "
   <script>swal('".$title."', '".$msgg."', '".$ico."');
   </script>";
}
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
    <div class="row">
        <div class="col-sm-12 col-md-8 register">
            <h3>معرفی شخصیت جدید</h3>
            <p>لطفا مشخصات فرد مورد نظر خود را  در این فرم وارد نمایید  تا پس از تایید  در سامانه  قرار گیرد</p>
            <form enctype="multipart/form-data" id="fupForm" action="<?php bloginfo('url')?>/wp-admin/admin-post.php" method="post">
                <input type="hidden" name="action" value="my_action" />
                <div class="form-group" >
                    <input type="text" class="form-control"  id="name" name="name" placeholder="نام و نام خانوادگی(یا نام پدر)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="shohrat" name="shohrat" placeholder="شهرت">
                </div>
                <div class="form-group">
                    <select id="cat" data-placeholder="تخصص یا تخصص ها" name="cat">
                        <?php
                        $categories = get_categories(array(
                            "hide_empty"=>"0",
                        ));
                        foreach($categories as $category) {
                            if ($category->parent == "")
                                echo '<option value="'.$category->name.'||'.$category->term_id.'">' . $category->name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group" >
                    <input type="number" id="brithday" class="form-control"  name="brithday" placeholder="سال تولد" style="margin-top: 20px">
                </div>
                <div class="form-group">
                    <label for="file" class="sr-only" name="img_url" id="img_url">Select a file</label>
                    <input type="file" id="img_url" name="img_url">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="body" name="body" rows="5"> زندگی شخص مورد نظر را شرح دهید ....</textarea>
                </div>
                <div class="form-group ">
                    <label for="file" class="sr-only" name="file" id="file">Select a file</label>
                    <input type="file" id="file" name="file">
                </div>
                <input type="submit" name="submit" class="btn btn-primary submitBtn" value="ثبت فرم"/>
            </form>
        </div>
        <div class="col-sm-12 col-md-4 ">
                <div class="col-sm-12 last_p">
                    <h3>آخرین اشخاص افزوده شده</h3>
                    <div class="row">
                        <?php
                        $args = array(
                            'post_type' => 'Mashahir',
                            'orderby'   => '',
                            'posts_per_page' => 3,
                        );
                        $the_query = new WP_Query( $args );
                        //        query_posts('posts_per_page=5');
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
                                echo '
                <div class="col-sm-12">
                    <div class="col-sm-12 last_posts">
                        <a href=""> <img src="'.$img.'" alt="" style="width: 100%;height: 80%;"></a>
                        <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                        <p>'.$ta.'</p>
                    </div>
                </div>';
                            }
                        }else{
                            echo '<p>پستی وجود ندارد</p>';
                        }
                        ?>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 "  id="img_add" style="padding: 0;">
            <?php dynamic_sidebar('img1') ?>
        </div>
    </div>
</div>

<div>
    <?php get_footer(); ?>
</div>

