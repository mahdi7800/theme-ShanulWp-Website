<?php
if ( ! current_user_can( 'manage_options' ) ) {
	return;
}
$message = '';
$sms_setting_website_set = get_option( '_shw_sms_settings_set', [] );
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
if (!isset($_POST['_nonce_tns_setting_sms']) || !wp_verify_nonce($_POST['_nonce_tns_setting_sms'], '_nonce_tns_setting_sms')) {
    $message = '<div class="notice notice-error is-dismissible"><p>اعتبارسنجی امنیتی انجام نشد!</p></div>';
}else {
    $setting_website_data = [
        'username'    => sanitize_text_field( $_POST['username'] ?? '' ),
        'password'    => sanitize_text_field( $_POST['password'] ?? '' ),
        'verify_code' => sanitize_text_field( $_POST['verify_code'] ?? '' ),
        'welcome'     => sanitize_text_field( $_POST['welcome'] ?? '' )
    ];
    update_option( '_shw_sms_settings_set', $setting_website_data );
    $sms_setting_website_set = $setting_website_data ;
}
}
?>

<div class="uk-container">
    <?php echo $message; ?>
    <div class="uk-flex-inline uk-flex-stretch uk-margin-top">
        <h4 class="uk-margin-left uk-text-right">
            <span class="uk-text-primary"><?php echo esc_html( get_admin_page_title() ); ?></span>
            <span uk-icon="info"
                  uk-tooltip="title: ابتدا صفحه ای اصلی وب سایت خود را انتخاب کنید!; pos: left;">
           </span>
        </h4>
    </div>
    <form method="post" class="uk-grid-small" uk-grid>
        <div class="uk-child-width-1-2@s uk-grid-small" uk-grid>
            <!-- Username -->
            <div>
                <label class="uk-badge uk-margin-bottom" for="sms-username">UserName</label>
                <input class="uk-input" id="sms-username" type="text" name="sms_username"
                       placeholder="مثال: 30005000"
                       value="<?php echo esc_attr( $sms_setting_website_set['username'] ?? '' ); ?>"
                       uk-tooltip="title:نام کاربری سامانه ملی پیامک; pos: bottom-right">
            </div>

            <!-- Password -->
            <div>
                <label class="uk-badge uk-margin-bottom" for="sms-password">Password</label>
                <input class="uk-input" id="sms-password" type="password" name="sms_password"
                       placeholder="رمز عبور سامانه ملی پیامک"
                       value="<?php echo esc_attr( $sms_setting_website_set['password'] ?? '' ); ?>"
                       uk-tooltip="title:رمز عبور سامانه ملی پیامک; pos: bottom-right">
            </div>

            <!-- Verify Code -->
            <div>
                <label class="uk-badge uk-margin-bottom" for="sms-verify-code">شماره متن کد تایید</label>
                <input class="uk-input" id="sms-verify-code" type="text" name="sms_verify_code"
                       placeholder="شماره متن کد تایید در ثبت نام"
                       value="<?php echo esc_attr( $sms_setting_website_set['verify_code'] ?? '' ); ?>"
                       uk-tooltip="title:شماره متنی که برای کد تایید ارسال می‌شود; pos: bottom-right">
            </div>

            <!-- Welcome Message -->
            <div>
                <label class="uk-badge uk-margin-bottom" for="sms-welcome">شماره متن پیام خوش آمدگویی</label>
                <input class="uk-input" id="sms-welcome" type="text" name="sms_welcome"
                       placeholder="شماره متن پیام خوش آمدگویی"
                       value="<?php echo esc_attr( $sms_setting_website_set['welcome'] ?? '' ); ?>"
                       uk-tooltip="title:شماره متنی که برای پیام خوش آمدگویی ارسال می‌شود; pos: bottom-right">
            </div>
        </div>
        <div class="uk-width-1-1">
            <?php submit_button('ذخیره تنظیمات', 'primary'); ?>
            <?php wp_nonce_field('_nonce_tns_setting_sms', '_nonce_tns_setting_sms'); ?>
        </div>
    </form>
</div>