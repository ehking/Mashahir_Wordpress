<?php /* Template Name: Register_Page */
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
    <div class="row">
        <div class="col-sm-12 col-md-8 register">
            <h3>معرفی شخصیت جدید</h3>
            <p>لطفا مشخصات فرد مورد نظر خود را  در این فرم وارد نمایید  تا پس از تایید  در سامانه  قرار گیرد</p>
            <form enctype="multipart/form-data" id="fupForm">
                <div class="form-group" >
                    <input type="text" class="form-control"  id="name" name="name" placeholder="نام و نام خانوادگی(یا نام پدر)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="shohrat" name="shohrat" placeholder="شهرت">
                </div>
                <div class="form-group">
                    <select id="cat" data-placeholder="تخصص یا تخصص ها">
                        <?php
                        $categories = get_categories(array(
                            "hide_empty"=>"0",
                        ));
                        foreach($categories as $category) {
                            if ($category->parent == "")
                                echo '<option value="'.$category->name.'">' . $category->name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group" >
                    <input type="text" id="brithday" class="form-control"  name="brithday" placeholder="سال تولد" style="margin-top: 20px">
                </div>
                <div class="form-group">
                    <input type="file" id="img">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="body" name="body" rows="5"> زندگی شخص مورد نظر را شرح دهید ....</textarea>
                </div>
                <div class="form-group">
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
                            'posts_per_page' => 5,
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
<script>
    $(document).ready(function(e){

        $("#fupForm").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo get_stylesheet_directory_uri(); ?>/postfile.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('.submitBtn').attr("disabled","disabled");
                    $('#fupForm').css("opacity",".5");
                },
                error:function(e){
                    console.log(e)
                },
                success: function(msg){
                    console.log(msg);
                    if(msg == 'ok'){
                        Swal.fire(
                            'اطلاعات با موفقیت ثبت شد',
                            'منتظر تایید مدیران سایت باشید',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'اطلاعات چک خود کنید',
                            '',
                            'error'
                        )
                    }
                    $('#fupForm').css("opacity","");
                    $(".submitBtn").removeAttr("disabled");
                }
            });
        });

        //file type validation
        // $("#file").change(function() {
        //     var file = this.files[0];
        //     var imagefile = file.type;
        //     var match= ["image/jpeg","image/png","image/jpg"];
        //     if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
        //         alert('Please select a valid image file (JPEG/JPG/PNG).');
        //         $("#file").val('');
        //         return false;
        //     }
        // });
    });
</script>
<div>
    <?php get_footer(); ?>
</div>

