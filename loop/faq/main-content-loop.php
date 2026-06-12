<?php
global $wpdb;
$table_header = $wpdb->prefix . "tns_faq";
$table_content = $wpdb->prefix . "tns_faq_detail";

// دریافت هدرها
$stmt_headers = $wpdb->get_results("SELECT * FROM $table_header ORDER BY id DESC", ARRAY_A);
?>

<?php if (!empty($stmt_headers)) : ?>
    <div class="container my-5">
        <?php foreach ($stmt_headers as $header) : ?>
            <!-- عنوان دسته‌بندی سوالات -->
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold"><?php echo esc_html($header['header']); ?></h2>
                <div class="divider bg-primary mx-auto" style="width: 60px; height: 3px;"></div>
            </div>

            <?php
            // دریافت سوالات مربوط به این هدر
            $questions = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM $table_content WHERE faq_id = %d ORDER BY id DESC",
                    $header['ID']
                ),
                ARRAY_A
            );
            ?>

            <?php if (!empty($questions)) : ?>
                <div class="accordion accordion-flush" id="accordion-<?php echo $header['ID']; ?>">
                    <?php foreach ($questions as $index => $question) :
                        $item_id = $header['ID'] . '-' . $question['ID'];
                        $collapse_id = 'collapse-' . $item_id;
                        $is_first = ($index === 0);
                        ?>
                        <div class="accordion-item border rounded mb-3">
                            <h2 class="accordion-header" id="heading-<?php echo $item_id; ?>">
                                <button class="accordion-button <?php echo !$is_first ? 'collapsed' : ''; ?>"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#<?php echo $collapse_id; ?>"
                                        aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
                                        aria-controls="<?php echo $collapse_id; ?>">
                                    <i class="bi bi-question-circle-fill text-primary me-3"></i>
                                    <?php echo esc_html($question['faq_question']); ?>
                                </button>
                            </h2>
                            <div id="<?php echo $collapse_id; ?>"
                                 class="accordion-collapse collapse <?php echo $is_first ? 'show' : ''; ?>"
                                 aria-labelledby="heading-<?php echo $item_id; ?>"
                                 data-bs-parent="#accordion-<?php echo $header['ID']; ?>">
                                <div class="accordion-body bg-light rounded-bottom">
                                    <i class="bi bi-chat-left-text-fill text-muted me-2"></i>
                                    <?php echo wp_kses_post($question['faq_answer']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="alert alert-info text-center p-4 rounded-3 mb-5">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    هنوز سوالی برای این موضوع ثبت نشده است.
                </div>
            <?php endif; ?>

            <hr class="my-5 opacity-25">
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <div class="container my-5">
        <div class="alert alert-warning text-center p-5 rounded-4">
            <i class="bi bi-database-slash fs-1 d-block mb-3"></i>
            <h4 class="mb-3">هیچ سوال و جوابی یافت نشد!</h4>
            <p class="mb-4">سوالات متداول خود را در بخش تنظیمات ایجاد کنید.</p>
            <a href="<?php echo admin_url('admin.php?page=setting_shop_tab_six'); ?>"
               class="btn btn-primary">
                <i class="bi bi-gear-fill me-2"></i> رفتن به تنظیمات سوالات متداول
            </a>
        </div>
    </div>
<?php endif; ?>