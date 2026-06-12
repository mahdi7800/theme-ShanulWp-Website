<?php
$setting_website_general = get_option( '_shw_settings_set_general')['newsletter_enable'];
if ($setting_website_general == 'yes') : ?>
<!-- Newsletter START -->
<div class="bg-light p-4 mt-4 rounded-3 text-center">
    <h4>عضویت در خبرنامه</h4>
    <form class="news_latter">
        <div class="mb-3">
            <input type="email" class="form-control email-newsletter" name="email-newsletter" placeholder="ایمیل">
        </div>
        <button type="submit" id="btn_news_latter" class="btn btn-primary">عضویت</button>
        <div class="form-text">ربات نیستم</div>
    </form>
</div>
<!-- Newsletter END -->
<?php endif; ?>