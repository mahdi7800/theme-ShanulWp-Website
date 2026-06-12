<?php
function shw_replace_wp_login_logo(): void
{
    ?>
    <style type="text/css">
        /* حذف کامل لوگوی پیشفرض وردپرس */
        .login h1 {
            position: relative;
            height: auto !important;
        }

        .login h1 a {
            display: block;
            background: none !important;
            width: auto !important;
            height: auto !important;
            text-indent: 0 !important;
            font-size: 20px;
            color: #2271b1;
            padding: 0;
        }

        /* استایل لوگوی سفارشی شما */
        .login h1 a::before {
            content: "";
            display: block;
            background-image: url('<?php echo !empty(get_site_icon_url()) ? get_site_icon_url(150) : SHW_URL . '/assets/images/logo-icon.svg'; ?>');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            width: 200px;
            height: 80px;
            margin: 0 auto;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'shw_replace_wp_login_logo');

function shw_change_login_logo_url(): ?string
{
    return home_url();
}
add_filter('login_headerurl', 'shw_change_login_logo_url');

function shw_change_login_logo_title(): ?string
{
    return get_bloginfo('name');
}
add_filter('login_headertext', 'shw_change_login_logo_title');

function shw_remove_wp_logo($wp_admin_bar): void
{
	$wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'shw_remove_wp_logo', 999);

function shw_change_login_background_gradient() {
    ?>
    <style type="text/css">
        body.login {
            background: linear-gradient(135deg, #66ea7c 0%, #764ba2 100%) !important;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'shw_change_login_background_gradient');