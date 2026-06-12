<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	if (!isset($_POST['_nonce_tns_setting_banner']) || !wp_verify_nonce($_POST['_nonce_tns_setting_banner'], '_nonce_tns_setting_banner')) {
		$message = '<div class="notice notice-error is-dismissible"><p>اعتبارسنجی امنیتی انجام نشد!</p></div>';
	} else {
		global $wpdb;
		$link_url =$_POST['tns_link'];
		$link = filter_var($link_url , FILTER_SANITIZE_URL);
		$link_url  = esc_url_raw($link_url );
		$table = $wpdb->prefix  . 'shw_banner';
		$data = [
			'image_url'=>esc_url_raw($_POST['tns_image']) ,
			'title'=> sanitize_text_field($_POST['tns_title']),
			'link_url'=>$link_url ,
		];
		$format = ['%s' , '%s' , '%s'];
		$stmt = $wpdb->insert($table,$data,$format);

		$message = '<div class="notice notice-success is-dismissible"><p>تنظیمات با موفقیت ذخیره شد!</p></div>';
	}
}