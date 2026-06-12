<?php

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-faq-details'])) {
    if (!isset($_POST['_nonce_tnm_setting_faq_details']) || !wp_verify_nonce($_POST['_nonce_tnm_setting_faq_details'], '_nonce_tnm_setting_faq_details')) {
        $message = '<div class="notice notice-error is-dismissible"><p>اعتبارسنجی امنیتی سوال و جواب انجام نشد!</p></div>';
        echo $message;
    } else {
        global $wpdb;
        $table = $wpdb->prefix . "tns_faq_detail";


        $faq_id = isset($_POST['faq_header_id']) ? intval($_POST['faq_header_id']) : 0;

        if($faq_id > 0) {
            $data = [
                'faq_question' => sanitize_text_field($_POST['faq-question']),
                'faq_answer' => wp_kses_post($_POST['faq-answer']),
                'faq_id' => $faq_id
            ];
            $format = ['%s','%s','%d'];
            $stmt = $wpdb->insert($table, $data, $format);

            if ($stmt !== false){
                $message = '<div class="notice notice-success is-dismissible"><p>سوال و جواب با موفقیت ذخیره شد!</p></div>';
                echo $message;
            } else {
                $message = '<div class="notice notice-error is-dismissible"><p>خطایی در ذخیره‌سازی سوال و جواب رخ داده است!</p></div>';
                echo $message;
//                echo '<pre>';
//                print_r($wpdb->last_error);
//                echo '</pre>';
            }
        } else {
            $message = '<div class="notice notice-error is-dismissible"><p>لطفا یک موضوع انتخاب کنید!</p></div>';
            echo $message;
        }
    }
}
