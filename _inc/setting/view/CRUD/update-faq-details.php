<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_submit_faq'])) {
    if (!isset($_POST['_nonce_tns_edit_faq']) || !wp_verify_nonce($_POST['_nonce_tns_edit_faq'], '_nonce_tns_edit_faq')) {
        $message = '<div class="notice notice-error is-dismissible"><p>اعتبارسنجی امنیتی سوال و جواب انجام نشد!</p></div>';
    } else {
        global $wpdb;
        $table = $wpdb->prefix . "tns_faq_detail";
        $id = intval($_POST['faq_header_id_update']);
        $id_D = intval($_POST['edit_id']);
        $data =[
            'faq_question' => sanitize_text_field($_POST['faq-question-update']),
            'faq_answer' => wp_kses_post($_POST['faq-answer-update']),
            'faq_ID'=>$id
        ];
        $where= ['ID'=>$id_D];
        $format = ['%s','%s','%d'];
        $where_format = ['%d'];
        $stmt = $wpdb->update($table,$data,$where,$format,$where_format);
        if ($stmt !== false) {
            $message = '<div class="notice notice-success is-dismissible"><p>سوال و جواب با موفقیت ویرایش شد!</p></div>';
        } else {
            $message = '<div class="notice notice-error is-dismissible"><p>خطا در ویرایش سوال و جواب رخ داد!</p></div>';
        }
    }
}