<?php
if ( ! current_user_can( 'manage_options' ) ) {
    return;
}

require_once 'CRUD/insert-faq-headers.php';
require_once 'CRUD/insert-faq-details.php';
require_once 'CRUD/update-faq-details.php';
require_once 'CRUD/delete-faq-details.php';
require_once 'CRUD/delete-faq-headers.php';


global $wpdb;
$table = $wpdb->prefix . "tns_faq";
$headers_faq = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);


$message = '';
if (isset($faq_header_message)) {
    $message = $faq_header_message;
}
if (isset($faq_details_message)) {
    $message = $faq_details_message;
}
?>

<div class="uk-container">
    <?php echo $message; ?>
    <div class="uk-flex-inline uk-flex-stretch uk-margin-top">
        <h4 class="uk-margin-left uk-text-right">
            <span class="uk-text-primary"><?php echo esc_html( get_admin_page_title() ); ?></span>
        </h4>
    </div>

    <div class="uk-alert-primary" uk-alert>
        <a href class="uk-alert-close" uk-close></a>
        <p>شما می‌توانید از این بخش سوالات متداول که در مورد وب سایت می‌شود را ایجاد کنید!</p>
    </div>

    <!-- فرم اول: ایجاد تیتر -->
    <form method="post">
        <div class="uk-margin">
            <input class="uk-input uk-width-1-2 tnm-headers" name="tnm-headers" type="text"
                   placeholder="تیتر و موضوع سوال را ایجاد کنید!" aria-label="uk-width-1-2" required>
        </div>
        <div class="uk-width-1-1">
            <?php submit_button('ذخیره تیتر', 'primary', 'submit-faq-header'); ?>
            <?php wp_nonce_field('_nonce_tnm_setting_faq', '_nonce_tnm_setting_faq'); ?>
        </div>
    </form>

    <?php if(!empty($headers_faq)) : ?>

        <form method="post">
            <div class="uk-margin">
                <div uk-form-custom="target: > * > span:first-child">
                    <select aria-label="Custom controls" name="faq_header_id" required>
                        <option value="">انتخاب موضوع مورد نظر</option>
                        <?php foreach($headers_faq as $header_faq) : ?>
                            <option value="<?php echo intval($header_faq['ID']); ?>">
                                <?php echo esc_html($header_faq['header']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
                <a href="#edit-faq-header-modal"
                   uk-toggle
                   uk-tooltip="title: ویرایش "
                   class="uk-icon-button edit-faq-btn"
                   uk-icon="file-edit"
                   data-id=""
                   data-faq-question=""
                   data-faq-answer=""
                   data-faq-id="">
                </a>
            </div>

            <div class="uk-margin">
                <input class="uk-input uk-form-width-large faq-question" name="faq-question"
                       id="faq-question" type="text" placeholder="سوال خود را اینجا بنویسید"
                       aria-label="Large" required>
            </div>

            <div class="uk-margin">
            <textarea class="uk-textarea faq-answer" name="faq-answer" id="faq-answer"
                      rows="5" placeholder="جواب سوال را اینجا بنویسید!"
                      aria-label="Textarea" required></textarea>
            </div>

            <div class="uk-width-1-1">
                <?php submit_button('ذخیره سوال و جواب', 'primary', 'submit-faq-details'); ?>
                <?php wp_nonce_field('_nonce_tnm_setting_faq_details', '_nonce_tnm_setting_faq_details'); ?>
            </div>
        </form>
    <?php endif; ?>
 <?php
 $table_details = $wpdb->prefix . "tns_faq_detail";
 $table_headers = $wpdb->prefix . "tns_faq";

 $faq_details_s = $wpdb->get_results(
     "SELECT 
        d.*,
        h.header
     FROM $table_details AS d 
     INNER JOIN $table_headers AS h ON d.faq_id = h.ID 
     ORDER BY d.faq_id DESC",
     ARRAY_A
 );

     ?>
    <?php if(!empty($faq_details_s)) : ?>
    <table class="uk-table uk-table-middle uk-table-divider">
        <thead>
        <tr>
            <th class="uk-width-small">ردیف</th>
            <th class="uk-width-small">تیتر و موضوع</th>
            <th>سوال</th>
            <th>جواب</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <?php $count = 1 ; ?>
        <?php foreach($faq_details_s as $faq_details) : ?>
        <tbody>
        <tr>
            <td><?php echo $count++ ?></td>
            <td><?php echo esc_html($faq_details['header']) ?></td>
            <td><?php echo esc_html($faq_details['faq_question']) ?></td>
            <td><?php echo esc_html($faq_details['faq_answer']) ?></td>
            <td class="uk-text-right" style="white-space: nowrap;">
                <a href="<?php echo esc_url(add_query_arg(['action' => 'delete_detail', 'id' => $faq_details['ID']])); ?>"
                   uk-tooltip="title: حذف سوال و جواب"
                   name="tns-delete-details"
                   class="uk-icon-button tns-delete-details"
                   uk-icon="trash"
                   style="margin-left: 5px;"></a>

                <a href="#edit-faq-modal"
                   uk-toggle
                   uk-tooltip="title: ویرایش سوال و جواب"
                   class="uk-icon-button edit-faq-btn"
                   uk-icon="file-edit"
                   data-id="<?= $faq_details['ID']; ?>"
                   data-faq-question="<?= esc_attr($faq_details['faq_question']); ?>"
                   data-faq-answer="<?= esc_attr($faq_details['faq_answer']); ?>"
                   data-faq-id="<?= $faq_details['faq_id']; ?>">
                </a>
            </td>
        </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
    <?php else :?>
    <div class="alert alert-info">چیزی وجود ندارد!</div>
    <?php endif; ?>
</div>

<!-- Modal Update FAQ -->
<div id="edit-faq-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <h2 class="uk-modal-title">ویرایش سوال</h2>

        <form method="post" class="uk-grid-small" uk-grid>

            <?php wp_nonce_field('_nonce_tns_edit_faq','_nonce_tns_edit_faq'); ?>
            <input type="hidden" name="edit_id" id="edit_id">

            <!-- انتخاب موضوع -->
            <div class="uk-width-1-1">
                <select class="uk-select" name="faq_header_id_update" id="edit_faq_header" required>
                    <option value="">انتخاب موضوع</option>
                    <?php foreach($headers_faq as $header): ?>
                        <option value="<?= intval($header['ID']); ?>">
                            <?= esc_html($header['header']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- سوال -->
            <div class="uk-width-1-1">
                <input class="uk-input"
                       name="faq-question-update"
                       id="faq-question-update"
                       type="text"
                       value=""
                       required>
            </div>

            <!-- جواب -->
            <div class="uk-width-1-1">
                <textarea class="uk-textarea"
                          name="faq-answer-update"
                          id="faq-answer-update"
                          rows="10"
                          required></textarea>
            </div>

            <!-- دکمه ذخیره -->
            <div class="uk-width-1-1">
                <?php submit_button('ذخیره تغییرات', 'primary', 'edit_submit_faq'); ?>
            </div>

        </form>
    </div>
</div>

<!-- Modal DELETE FAQ HEADER -->
<div id="edit-faq-header-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <h2 class="uk-modal-title">ویرایش سوال</h2>

        <table class="uk-table uk-table-middle uk-table-divider">
            <thead>
            <tr>
                <th class="uk-width-small">ردیف</th>
                <th class="uk-width-small">تیتر و موضوع</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <?php $count = 1 ; ?>
            <?php foreach($headers_faq as $header_faq) : ?>
                <tbody>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo esc_html($header_faq['header']) ?></td>
                    <td class="uk-text-right" style="white-space: nowrap;">
                        <a href="<?php echo esc_url(add_query_arg(['action' => 'delete_header', 'id' => $header_faq['ID']])); ?>"
                           uk-tooltip="title: حذف تیتر"
                           name="tns-delete-details"
                           class="uk-icon-button tns-delete-details"
                           uk-icon="trash"
                           style="margin-left: 5px;"></a>
                    </td>
                </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>

