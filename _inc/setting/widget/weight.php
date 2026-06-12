<?php
add_action('wp_dashboard_setup','tnm_widget1');
add_action('wp_dashboard_setup','tnm_widget2');

function tnm_widget1(){
    wp_add_dashboard_widget(
        'tnm_widget_welcome',
        'قالب تکنواشاپ',
        'tnm_widget_layout',
        '',
        '',
        '',
        'high'
    );
    function tnm_widget_layout(){?>

        <div class="uk-margin-top">
            <div class="uk-alert uk-alert-primary" uk-alert>
                <button class="uk-alert-close uk-icon uk-close" type="button" uk-close="" aria-label="Close"><svg width="14" height="14" viewBox="0 0 14 14"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>
                <p class="uk-text-bold uk-margin-remove-bottom">سپاس و قدردانی</p>
                <hr class="uk-divider-small">
                <p class="uk-text-small">
                    این قالب توسط :<span class="uk-text-bold uk-text-danger">شرکت مهندسی شانول وردپرس</span> توسعه داده شده است.
                    از تمامی کاربران گرامی که از این محصول استفاده می‌کنند، صمیمانه سپاس‌گزاریم.
                </p>

            </div>
  <div class="uk-child-width-1-1@s uk-text-center" uk-grid>
                <div>
                    <div class="uk-background-secondary uk-light uk-padding uk-panel uk-border-rounded">
                        <p class="uk-h4">در صورت رضایت از این پروژه، می‌توانید با حمایت مالی کوچک، ما را در ادامه توسعه و ارائه محتوای باکیفیت تر یاری دهید.
                            سپاس از همراهی شما 🌱</p>
                        <a class="uk-button uk-button-danger uk-border-rounded" href="https://daramet.com/d_mahdi47?webintent&donate=100000&message=thanks" >  ما را حمایت کنید ☕</a>
                    </div>
                </div>


        <div class="uk-margin-top uk-text-center">
            <a href="https://x.com/d_mahdi47?s=21&t=pX4cCB5VPUGyO1KmoExvuQ" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
            <a href="https://www.instagram.com/d_mahdi47?igsh=MWd5aDRldDV3ZWhtZQ%3D%3D&utm_source=qr" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="instagram"></a>
            <a href="https://github.com/mahdi7800" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="github"></a>
            <a href="https://www.linkedin.com/in/mahdi-davoudi-b3754a1b4" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="linkedin"></a>
            <a href="mailto:mdavoudi47@shanulwp.ir" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="mail"></a>
            <a href="https://shanulwp.ir/" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="world"></a>
        </div>
    <?php }
}

$newsletter_enable = get_option('_tnm_settings_set_general',[])['newsletter_enable'];
if($newsletter_enable === 'yes') {
    function tnm_widget2()
    {
        wp_add_dashboard_widget(
                'tnm_widget_newsletter',
                'گزارش سیستم خبرنامه',
                'tnm_widget_newsletter_layout',
             '',
            '',
            '',
            'high'
        );
    }
    function tnm_widget_newsletter_layout(){?>

    <?php
        global $wpdb;
        $table = $wpdb->prefix . 'tns_newsletter';
         $stmt = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$table}",'newsletter_enable'));
        ?>

  <div class="uk-container uk-container-xsmall uk-background-muted uk-padding uk-border-rounded uk-box-shadow-medium">
        <div class="uk-grid-small uk-child-width-expand@s uk-margin-small" uk-grid>
            <div>
                <span class="uk-text-bold">تا کنون چند نفر در خبرنامه ما ثبت نام کرده اند:</span>
            </div>
            <div class="uk-text-right">
                <span class="uk-text-primary"><?php echo $stmt ?></span>
            </div>
        </div>
</div>
     <?php }
}