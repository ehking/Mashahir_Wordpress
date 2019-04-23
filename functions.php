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

function add_theme_menu_item()
{
    add_menu_page("تنظیمات قالب", "تنظیمات قالب", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}
function theme_settings_page(){
    ?>
    <div class="wrap">
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
//$facebook_url = get_option('facebook_url');
//$twitter_url = get_option('twitter_url');
//$logo_url = get_option('logo');