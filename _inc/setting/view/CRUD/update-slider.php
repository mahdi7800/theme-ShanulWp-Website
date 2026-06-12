<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_submit'])) {
	if (!isset($_POST['_nonce_tns_edit_slider']) || !wp_verify_nonce($_POST['_nonce_tns_edit_slider'], '_nonce_tns_edit_slider')) {
		$message = '<div class="notice notice-error is-dismissible"><p>خطای اعتبارسنجی برای ویرایش!</p></div>';
	} else {
		global $wpdb;
		$table = $wpdb->prefix . 'tns_sliders';
		$id = intval($_POST['edit_id']);
		$link = filter_var($_POST['edit_tns_link'], FILTER_SANITIZE_URL);
		$link = esc_url_raw($link);
		$data = [
			'top_title'   => sanitize_text_field($_POST['edit_tns_top_title']),
			'main_title'  => sanitize_text_field($_POST['edit_tns_main_title']),
			'sub_title'   => sanitize_text_field($_POST['edit_tns_sub_title']),
			'p_thumbnail' => $link,
			'p_image'     => sanitize_text_field($_POST['edit_tns_images']),
		];
		$wpdb->update($table, $data, ['id' => $id], ['%s','%s','%s','%s','%s'], ['%d']);
		$message = '<div class="notice notice-success is-dismissible"><p>تغییرات با موفقیت ذخیره شد!</p></div>';
	}
}