<?php

add_action( 'add_meta_boxes', 'shw_add_meta_box_type_post' );

function shw_add_meta_box_type_post() {
    add_meta_box
    (
        'shw-add-meta-box-type-post',
        'نوع محتوا',
        'shw_add_meta_box_layout',
        'post',
        'normal',
        'high'
    );

    function shw_add_meta_box_layout($post)
    {
        $type_post = get_post_meta($post->ID,'_type_post_meta',true);
        wp_nonce_field('type_post_nonce','type_post_nonce');?>

        <div>
            <label>
            <input type="radio" name="type_post"  value="article" <?php checked($type_post ,'article'); ?>>
                <span>مقالات</span>
            </label>
        </div>
        <div>
            <label>
            <input type="radio" name="type_post" value="tv" <?php checked($type_post ,'tv'); ?>>
                <span>تلوزیون</span>
            </label>
        </div>
        <div>
            <label>
            <input type="radio" name="type_post"  value="plugin" <?php checked($type_post ,'plugin'); ?>>
                <span>پلاگین</span>
            </label>
        </div>
        <?php $register_from_enable = get_option('_shw_settings_set_general')['sale_plugin_or_themes_enable'];
        if ($register_from_enable === 'yes') : ?>
        <div>
            <label>
            <input type="radio" name="type_post"  value="theme" <?php checked($type_post ,'theme'); ?>>
                <span>قالب</span>
            </label>
        </div>
        <?php endif; ?>
     <?php
    }


}

add_action('save_post','shw_add_meta_box_type_post_save');

function shw_add_meta_box_type_post_save($post_id)
{
    if ( ! isset( $_POST['type_post_nonce'] ) || ! wp_verify_nonce( $_POST['type_post_nonce'], 'type_post_nonce' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if (isset($_POST['type_post'])){
        $value_save = sanitize_text_field($_POST['type_post']);
        update_post_meta($post_id,'_type_post_meta',$value_save);
    }

}

$register_from_enable = get_option('_shw_settings_set_general')['newsletter_enable'];
if ($register_from_enable === 'yes') :
add_action('add_meta_boxes','shw_add_meta_box_send_post_newsletter');

function shw_add_meta_box_send_post_newsletter() {
    add_meta_box(
        'shw_send_post_newsletter'
        ,'انتخاب پست در خبر نامه'
        ,'shw_send_post_newsletter_layout'
        ,'post',
        'normal',
        'high'
    );
}
function shw_send_post_newsletter_layout($post) {
    $send_newsletter = get_post_meta($post->ID,'_shw_send_post_newsletter',true);
    wp_nonce_field('shw_nonce_send_post_newsletter_action','shw_nonce_send_post_newsletter_action'); ?>
    <div>
        <label>
            <input name="send_post_newsletter" type="checkbox" value="1" <?php checked($send_newsletter , 1) ?>>
            <span>پستی که میخوایید در خبرنامه ارسال کنید با فعال کردن این پست ارسال میشود!</span>
        </label>
    </div>

<?php }

add_action('save_post','shw_send_post_newsletter_save_post');

function shw_send_post_newsletter_save_post($post_id) {
    // Verify nonce
    if (!isset($_POST['shw_nonce_send_post_newsletter_action']) || !wp_verify_nonce($_POST['shw_nonce_send_post_newsletter_action'], 'shw_nonce_send_post_newsletter_action')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save or delete meta
    if (isset($_POST['send_post_newsletter'])) {
        update_post_meta($post_id, '_shw_send_post_newsletter', 1);
    } else {
        update_post_meta($post_id, '_shw_send_post_newsletter', 0);
    }
}
endif;

// -----------------------------------------------------
// 2. متاباکس مخصوص TV
// -----------------------------------------------------

add_action('add_meta_boxes', 'shw_add_tv_meta_box');

function shw_add_tv_meta_box() {
    global $post;
    if (!$post) return;

    $type_post = get_post_meta($post->ID, '_type_post_meta', true);

    if ($type_post === 'tv') {
        add_meta_box(
            'shw-tv-settings',
            'تنظیمات تلویزیون',
            'shw_tv_meta_box_layout',
            'post',
            'normal',
            'high'
        );
    }
}

function shw_tv_meta_box_layout($post) {
    $link_video  = get_post_meta($post->ID, '_tv_link_video', true);


    wp_nonce_field('tv_nonce', 'tv_nonce');

    ?>
    <label>
        لینک ویدیو:
        <input type="text" class="large-text" name="link-video" value="<?php echo esc_textarea($link_video); ?>">
    </label>
    <br><br>

    <?php
}

add_action('save_post', 'shw_save_tv_meta');

function shw_save_tv_meta($post_id) {

    if (!isset($_POST['tv_nonce']) || !wp_verify_nonce($_POST['tv_nonce'], 'tv_nonce'))
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if (isset($_POST['link-video'])) {
        update_post_meta($post_id, '_tv_link_video', $_POST['link-video']);
    }

}


// -----------------------------------------------------
// 3. متاباکس مخصوص Plugin
// -----------------------------------------------------

add_action('add_meta_boxes', 'shw_add_plugin_meta_box');

function shw_add_plugin_meta_box() {
    global $post;
    if (!$post) return;

    $type_post = get_post_meta($post->ID, '_type_post_meta', true);

    if ($type_post === 'plugin') {
        add_meta_box(
            'shw-plugin-settings',
            'تنظیمات پلاگین',
            'shw_plugin_meta_box_layout',
            'post',
            'normal',
            'high'
        );
    }
}

function shw_plugin_meta_box_layout($post) {
    $link = get_post_meta($post->ID, '_plugin_download', true);

    wp_nonce_field('plugin_nonce', 'plugin_nonce');
    ?>

    <label>
        لینک دانلود پلاگین:
        <input type="text" name="link-download" value="<?php echo esc_attr($link); ?>">
    </label>

    <?php
}

add_action('save_post', 'shw_save_plugin_meta');

function shw_save_plugin_meta($post_id) {

    if (!isset($_POST['plugin_nonce']) || !wp_verify_nonce($_POST['plugin_nonce'], 'plugin_nonce'))
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if (isset($_POST['link-download'])) {
        update_post_meta($post_id, '_plugin_download', esc_url_raw($_POST['link-download']));
    }
}
