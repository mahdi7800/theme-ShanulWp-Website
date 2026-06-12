<?php
// افزودن اسلایدر جدید
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	if (!isset($_POST['_nonce_tns_setting_slider']) || !wp_verify_nonce($_POST['_nonce_tns_setting_slider'], '_nonce_tns_setting_slider')) {
		$message = '<div class="notice notice-error is-dismissible"><p>اعتبارسنجی امنیتی انجام نشد!</p></div>';
	} else {
		global $wpdb;
		$table = $wpdb->prefix . 'tns_sliders';
		$link = filter_var($_POST['tns_link'], FILTER_SANITIZE_URL);
		$link = esc_url_raw($link);
		$data = [
			'top_title'   => sanitize_text_field($_POST['tns_top_title']),
			'main_title'  => sanitize_text_field($_POST['tns_main_title']),
			'sub_title'   => sanitize_text_field($_POST['tns_sub_title']),
			'p_thumbnail' => $link,
			'p_image'     => sanitize_text_field($_POST['tns_images']),
		];
		$wpdb->insert($table, $data, ['%s','%s','%s','%s','%s']);
		$message = '<div class="notice notice-success is-dismissible"><p>تنظیمات با موفقیت ذخیره شد!</p></div>';
	}
}