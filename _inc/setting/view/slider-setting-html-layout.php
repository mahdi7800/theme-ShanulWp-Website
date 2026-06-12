<?php

if (!current_user_can('manage_options')) {
	return;
}
$message = '';
include_once 'CRUD/insert-slider.php';
include_once 'CRUD/delete-slider.php';
include_once 'CRUD/update-slider.php';
?>
<?php
global $wpdb;
$table = $wpdb->prefix . 'tns_sliders';
$home_sliders = $wpdb->get_results("SELECT * FROM {$table}", ARRAY_A);
?>

<div class="uk-container uk-margin-top">
	<?php echo $message; ?>

    <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
        <h4 class="uk-text-right uk-margin-remove"><?php echo esc_html(get_admin_page_title()); ?></h4>
        <a href="#" uk-toggle="target: #modal-close-default" class="uk-button uk-button-primary">+ افزودن اسلایدر</a>
    </div>

    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider uk-table-small">
            <thead>
            <tr>
                <th class="uk-text-right">#</th>
                <th class="uk-text-right">تصویر</th>
                <th class="uk-text-right">عنوان بالایی</th>
                <th class="uk-text-right">عنوان اصلی</th>
                <th class="uk-text-right">عنوان زیرین</th>
                <th class="uk-text-right">لینک ورود</th>
                <th class="uk-text-right">عملیات</th>
            </tr>
            </thead>
            <tbody>
			<?php if (!empty($home_sliders)) : ?>
				<?php $row_number = 1; ?>
				<?php foreach ($home_sliders as $slider) : ?>
                    <tr>
                        <td class="uk-text-right"><?php echo $row_number++; ?></td>
                        <td>
                            <div class="uk-cover-container" style="width: 100px; height: 60px;">
                                <?php
								$image_sliders =  explode('++',$slider['p_image']);
					            $desktop_image_sliders = isset($image_sliders[0]) ? esc_url(trim($image_sliders[0])) : '';
					            $mobile_image_sliders = isset($image_sliders[1]) ? esc_url(trim($image_sliders[1])) : $desktop_image_sliders; ?>
                                <img src="<?php echo  $mobile_image_sliders; ?>" alt="تصویر" uk-cover>
                            </div>
                        </td>
                        <td class="uk-text-right"><?php echo esc_html($slider['top_title']); ?></td>
                        <td class="uk-text-right"><?php echo esc_html($slider['main_title']); ?></td>
                        <td class="uk-text-right"><?php echo esc_html($slider['sub_title']); ?></td>
                        <td class="uk-text-right">
                            <a href="<?php echo esc_url($slider['p_thumbnail']); ?>" target="_blank"><?php echo esc_url($slider['p_thumbnail']); ?></a>
                        </td>
                        <td class="uk-text-right" style="white-space: nowrap;">
                            <a href="<?php echo esc_url(add_query_arg(['action' => 'delete', 'id' => $slider['id']])); ?>"
                               uk-tooltip="title: حذف بنر"
                               class="uk-icon-button"
                               uk-icon="trash"
                               style="margin-left: 5px;"></a>

                            <a href="#edit-slider-modal"
                               uk-toggle
                               uk-tooltip="title: ویرایش اسلایدر"
                               class="uk-icon-button edit-slider-btn"
                               uk-icon="file-edit"
                               data-id="<?php echo esc_attr($slider['id']); ?>"
                               data-top-title="<?php echo esc_attr($slider['top_title']); ?>"
                               data-main-title="<?php echo esc_attr($slider['main_title']); ?>"
                               data-sub-title="<?php echo esc_attr($slider['sub_title']); ?>"
                               data-p-thumbnail="<?php echo esc_attr($slider['p_thumbnail']); ?>"
                               data-p-image="<?php echo esc_attr($slider['p_image']); ?>">
                            </a>
                        </td>
                    </tr>
				<?php endforeach; ?>
			<?php else : ?>
                <tr><td colspan="7" class="uk-text-center">هیچ اسلایدری ثبت نشده است.</td></tr>
			<?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Insert Slider -->
<div id="modal-close-default" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">افزودن اسلایدر جدید</h2>
        <form method="post" class="uk-grid-small" uk-grid>
            <div class="uk-width-1-1"><label>آدرس تصویر</label>
                <input class="uk-input" type="text" name="tns_images" required>
            </div>
            <div class="uk-width-1-1"><label>عنوان بالایی</label>
                <input class="uk-input" type="text" name="tns_top_title">
            </div>
            <div class="uk-width-1-1"><label>عنوان اصلی</label>
                <input class="uk-input" type="text" name="tns_main_title" required>
            </div>
            <div class="uk-width-1-1"><label>عنوان زیرین</label>
                <input class="uk-input" type="text" name="tns_sub_title">
            </div>
            <div class="uk-width-1-1"><label>لینک صفحه</label>
                <input class="uk-input" type="text" name="tns_link" required>
            </div>
            <div class="uk-width-1-1">
				<?php submit_button('ذخیره تنظیمات', 'primary', 'submit'); ?>
				<?php wp_nonce_field('_nonce_tns_setting_slider', '_nonce_tns_setting_slider'); ?>
            </div>
        </form>
    </div>
</div>

<!-- Modal Update Slider -->
<div id="edit-slider-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">ویرایش اسلایدر</h2>
        <form method="post" class="uk-grid-small" uk-grid>
            <input type="hidden" name="edit_id" id="edit_id">
            <div class="uk-width-1-1"><label>آدرس تصویر</label>
                <input class="uk-input" type="text" name="edit_tns_images" id="edit_tns_images" required>
            </div>
            <div class="uk-width-1-1"><label>عنوان بالایی</label>
                <input class="uk-input" type="text" name="edit_tns_top_title" id="edit_tns_top_title">
            </div>
            <div class="uk-width-1-1"><label>عنوان اصلی</label>
                <input class="uk-input" type="text" name="edit_tns_main_title" id="edit_tns_main_title" required>
            </div>
            <div class="uk-width-1-1"><label>عنوان زیرین</label>
                <input class="uk-input" type="text" name="edit_tns_sub_title" id="edit_tns_sub_title">
            </div>
            <div class="uk-width-1-1"><label>لینک صفحه</label>
                <input class="uk-input" type="text" name="edit_tns_link" id="edit_tns_link" required>
            </div>
            <div class="uk-width-1-1">
				<?php submit_button('ذخیره تغییرات', 'primary', 'edit_submit'); ?>
				<?php wp_nonce_field('_nonce_tns_edit_slider', '_nonce_tns_edit_slider'); ?>
            </div>
        </form>
    </div>
</div>

