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
        <h1>دسته بندی قالب</h1>
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
    add_settings_field("category", "انتخاب دسته بندی", "display_list_category_element", "theme-options1", "section1");
    register_setting("section1", "cat",'category_handle');
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


function display_list_category_element()
{
        $categories = get_categories(array(
        "hide_empty"=>"0",
    ));
        foreach ($categories as $category){
            if ($category->parent == ""){
                if (in_array($category->term_id,get_option('cat'))) $act="checked";else $act="";
                echo '<label for="'.$category->name.'">'.$category->name.'</label>
                <input type="checkbox"  value="'.$category->term_id.'" '.$act.' name="cat[]">';
             }
        }

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