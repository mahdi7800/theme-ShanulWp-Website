<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-faq-header'])) {
    if (!isset($_POST['_nonce_tnm_setting_faq']) || !wp_verify_nonce($_POST['_nonce_tnm_setting_faq'], '_nonce_tnm_setting_faq')) {
        $message = '<div class="notice notice-error is-dismissible"><p>اعتبارسنجی امنیتی هدر انجام نشد!</p></div>';
        return $message;
    } else {
        global $wpdb;
        $table = $wpdb->prefix . "tns_faq";
        $data = ['header' => sanitize_text_field($_POST['tnm-headers'])];
        $format = ['%s'];
        $stmt = $wpdb->insert($table, $data, $format);

        if ($stmt !== false){
            $message = '<div class="notice notice-success is-dismissible"><p>تیتر با موفقیت ذخیره شد!</p></div>';
            return $message;
        } else {
            $message = '<div class="notice notice-error is-dismissible"><p>خطایی در ذخیره‌سازی تیتر رخ داده است!</p></div>';
            return $message;
        }
    }
}