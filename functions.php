<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
add_theme_support( 'post-thumbnails' );

add_filter('term_links-post_tag','limit_to_five_tags');


function register_my_menus() {
    register_nav_menus(
        array(
            'Top_Menu' =>"منو بالا",
            'Footer1' => 'Footer1',
            'Footer2' => 'Footer2',
            'Footer3' => 'Footer3',
        )
    );
}
add_action( 'init', 'register_my_menus' );



add_action( 'admin_post_my_action', 'prefix_admin_my_action' );
add_action( 'admin_post_nopriv_my_action', 'prefix_admin_add_foobar' );

function prefix_admin_my_action() {
    session_start();
    if (!trim($_POST['name']) == '' && !trim($_POST['shohrat']) == ''  && !trim($_POST['brithday']) == '') {
        if (!$_FILES['img_url']['name']=="") {
            $maxsize = 2097152;
            $acceptable = array(
                'image/jpeg',
                'image/jpg',
                'image/gif',
                'image/png'
            );
            if (($_FILES['img_url']['size'] >= $maxsize) || ($_FILES["img_url"]["size"] == 0)) {
                $error = 'sizeimg';
                $_SESSION['flash_messages']=$error;
                header('location:../register');
                exit();
            }
            if ((in_array($_FILES['uploaded_file']['type'], $acceptable)) && (empty($_FILES["uploaded_file"]["type"]))) {
                $error = 'formatimg';
                $_SESSION['flash_messages']=$error;
                header('location:../register');
                exit();
            }
            $upload_overrides = array('test_form' => false);
            $moveimg = wp_handle_upload($_FILES['img_url'], $upload_overrides);

            if ($moveimg && isset($moveimg['error'])) {
                $_SESSION['flash_messages']=$moveimg['error'];
                header('location:../register');
                exit();
            }
        }
        if (! $_FILES['file']['name']=="") {
            $maxsize = 2097152;
            $acceptable = array(
                'application/pdf',
                'application/msword (.doc)',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document(.docx)',
            );
            if (($_FILES['img_url']['size'] >= $maxsize) || ($_FILES["img_url"]["size"] == 0)) {
                $error = 'sizefile';
                $_SESSION['flash_messages']=$error;
                header('location:../register');
                exit();
            }
            if ((in_array($_FILES['uploaded_file']['type'], $acceptable)) && (empty($_FILES["uploaded_file"]["type"]))) {
                $error = 'formatfile';
                $_SESSION['flash_messages']=$error;
                header('location:../register');
                exit();
            }
            $upload_overrides = array('test_form' => false);
            $movefile = wp_handle_upload($_FILES['file'], $upload_overrides);

            if ($movefile && isset($movefile['error'])) {
                $_SESSION['flash_messages']=$movefile['error'];
                header('location:../register');
                exit();
            }
        }
        global $wpdb;
        $wpdb->insert('wp_form_data', array(
            'name_m' => $_POST['name'],
            'shohrat' => $_POST['shohrat'],
            'cat' => $_POST['cat'],
            'brithday' => $_POST['brithday'],
            'img_url' => $moveimg['url'],
            'body' => $_POST['body'],
            'file' => $movefile['url']
        ));
        $_SESSION['flash_messages_success']='success';
        header('location:../register');
        exit();
    }
    $_SESSION['flash_messages']='validfrm';
    header('location:../register');
    exit();
}




function Es_get_menu_by_location( $location ) {
    if( empty($location) ) return false;

    $locations = get_nav_menu_locations();
    if( ! isset( $locations[$location] ) ) return false;

    $menu_obj = get_term( $locations[$location], 'nav_menu' );

    return $menu_obj;
}


add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => 'Footer',
        'id' => 'Es_Footer',
        'description' => 'اضافه کردن آیتم به قسمت فوتر سایت',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'img1',
        'id' => 'Es_img1',
        'description' => 'جایگاه عکس 1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'img2',
        'id' => 'Es_img2',
        'description' => 'جایگاه عکس 2',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'img3',
        'id' => 'Es_img3',
        'description' => 'جایگاه عکس 3',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'img4',
        'id' => 'Es_img4',
        'description' => 'جایگاه عکس 4',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

}

function create_post_type() {
    register_post_type( 'Mashahir',
        array(
            'labels' => array(
                'name' =>'مشاهیر',
                'singular_name' =>'مشاهیر'
            ),
            'supports' => array(
                'title',
                'author',
                'comments',
                'editor'),
            'public' => true,
            'has_archive' => true,

        )
    );
}
add_action( 'init', 'create_post_type' );

function limit_to_five_tags($terms) {
    return array_slice($terms,0,5,true);
}

function add_theme_menu_item()
{
    add_menu_page("تنظیمات قالب", "تنظیمات قالب", "manage_options", "theme-panel", "theme_settings_page", null, 99);
    add_submenu_page( 'theme-panel','dew','wewe','manage_options','t1','theme_settings_list_category');
}

function theme_settings_list_category(){

    ?>
    <div class="wrap">
        <?php settings_errors(); ?>
        <form method="post" action="options.php">
            <?php
            settings_fields("section1");
            do_settings_sections("theme-options1");
            submit_button();
            ?>
        </form>
    </div>
    <?php
}


function display_theme_category_fields (){
    add_settings_section("section1", "", null, "theme-options1");
    add_settings_field("category", "انتخاب دسته بندی سایدبار", "display_list_category_element", "theme-options1", "section1");
    add_settings_field("pages", "انتخاب  منو هدر", "display_list_page_element", "theme-options1", "section1");
    register_setting("section1", "cat",'category_handle');
    register_setting("section1", "page",'page_handle');
}

function page_handle(){
    $page=$_POST['page'];

    if (count($page)<=4){
        return $page;
    }
    else{
        $page=get_option('page');
        add_settings_error( "page", "page", "شما باید کمتر از 4 مورد را انتخاب کنید", "error" );
        return $page;
    }
}
function category_handle(){
        $cat=$_POST['cat'];
        if (count($cat)==6){
            return $cat;
        }
        else{
            $cat=get_option('cat');
            add_settings_error( "category", "category", "شما باید 6 تا از دسته بندی ها را انتخاب کنید", "error" );
            return $cat;
        }
}

function display_list_page_element(){
    $page=get_pages();
    echo '<h2>تنظیمات منو هدر سایت</h2>';
    echo '<label for="">صفحه ی اصلی</label>
                <input type="checkbox" checked disabled>';
    foreach ($page as $page){
        if (in_array($page->ID,get_option('page'))) $act="checked";else $act="";
        echo '<label for="'.$page->post_title.'">'.$page->post_title.'</label>
                <input type="checkbox"  value="'.$page->ID.'" '.$act.' name="page[]">';
    }
    echo '<hr><p style="font-size: 10px">شما باید کم تر از 4 صفحه برای نمایش در منو را مشخص کنید</p>';

}

function display_list_category_element()
{
        $categories = get_categories(array(
        "hide_empty"=>"0",
    ));
    echo '<h2>تنظیمات منو سایدبار</h2>';
        foreach ($categories as $category){
            if ($category->parent == ""){
                if (in_array($category->term_id,get_option('cat'))) $act="checked";else $act="";
                echo '<label for="'.$category->name.'">'.$category->name.'</label>
                <input type="checkbox"  value="'.$category->term_id.'" '.$act.' name="cat[]">';
             }
        }
    echo '<hr><p style="font-size: 10px">شما باید حتما در قسمت دسته بندی ها بیش از ۶ دسته بندی داشته باشید</p>';

}


function theme_settings_page(){
    ?>
    <div class="wrap">
        <?php settings_errors(); ?>
        <h1>Theme Panel</h1>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function display_twitter_element()
{
    ?>
    <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}
function display_facebook_element()
{
    ?>
    <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_theme_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme-options");
    add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_section("section", "All Settings", null, "theme-options");
    add_settings_field("logo", "Logo", "logo_display", "theme-options", "section");
    register_setting("section", "logo", "handle_logo_upload");
    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
}

function logo_display()
{
    ?>
    <input type="file" name="logo" /><br>
    <img src="<?php echo get_option('logo');?>" alt="logo" height="200px" >
    <?php
}
function handle_logo_upload()
{
    if ( ! function_exists( 'wp_handle_upload' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }
    if(!empty($_FILES["logo"]["tmp_name"]))
    {
        $urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE),time());
        $temp = $urls["url"];
        return $temp;
    }
    return $option;
}

add_action("admin_init", "display_theme_panel_fields");
add_action("admin_init", "display_theme_panel_fields");
add_action("admin_menu", "add_theme_menu_item");
add_action("admin_init", "display_theme_category_fields");
//$facebook_url = get_option('facebook_url');
//$twitter_url = get_option('twitter_url');
//$logo_url = get_option('logo');