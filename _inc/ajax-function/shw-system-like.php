<?php

add_action('wp_ajax_shw_system_like', 'shw_system_like');

function shw_system_like()
{

    if (!is_user_logged_in()) {
        wp_send_json(['error' => true, 'message' => 'لطفا اول وارد شوید!!'], 403);
    }
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'])) {
        die('access denied');
    }

    global $wpdb;
    $table = $wpdb->prefix . 'shw_system_like';
    $table_dislike = $wpdb->prefix . 'shw_system_dislike';
    $p_id = intval($_POST['post_id']);
    $u_id = get_current_user_id();
    $p_title = get_the_title($p_id);
    $p_thumbnail = get_the_post_thumbnail_url($p_id);
    $p_permalink = get_the_permalink($p_id);


    // بررسی اینکه آیا این بوکمارک قبلاً ثبت شده یا نه
    $exists = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM {$table} WHERE user_id = %d AND post_id = %d",
        $u_id, $p_id
    ));

    $exists_dislike = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$table_dislike} WHERE user_id = %d AND post_id = %d",
        $u_id, $p_id));

    if ($exists_dislike) {
        $deleted = $wpdb->delete(
            $table_dislike,
            ['user_id' => $u_id, 'post_id' => $p_id],
            ['%d', '%d']
        );
        if ($deleted) {
            $data = [
                'post_id' => $p_id,
                'user_id' => $u_id,
                'post_title' => $p_title,
                'post_thumbnail' => $p_thumbnail,
                'p_permalink' => $p_permalink
            ];
            $format = ['%d', '%d', '%s', '%s', '%s'];

            $stmt = $wpdb->insert($table, $data, $format);
            if ($stmt) {
                wp_send_json(['success' => true, 'message' => 'دیسلاک شما به لایک تبدیل شد'], 200);
            } else {
                wp_send_json(['error' => true, 'message' => 'خطا در درج داده است! '], 403);
            }
        }
    } elseif ($exists){
            $deleted = $wpdb->delete(
                $table,
                ['user_id' => $u_id, 'post_id' => $p_id],
                ['%d', '%d']
            );
            if ($deleted) {
                wp_send_json(['success' => true, 'message' => 'لایک شما حذف شد.'], 200);
            } else {
                wp_send_json(['error' => true, 'message' => 'خطا در حذف اطلاعات!'], 500);
            }
    }else{
        $data = [
            'post_id' => $p_id,
            'user_id' => $u_id,
            'post_title' => $p_title,
            'post_thumbnail' => $p_thumbnail,
            'p_permalink' => $p_permalink
        ];
        $format = ['%d', '%d', '%s', '%s', '%s'];

        $stmt = $wpdb->insert($table, $data, $format);
        if ($stmt) {
            wp_send_json(['success' => true, 'message' => 'لایک شما ثبت شد!!'], 200);
        } else {
            wp_send_json(['error' => true, 'message' => 'خطا در درج داده است! '], 403);
        }
    }







}

function shw_user_system_like_post($user_id, $post_id): bool
{
    global $wpdb;
    $table = $wpdb->prefix . 'shw_system_like';
    $stmt = $wpdb->get_row($wpdb->prepare("SELECT user_id , post_id FROM {$table} WHERE user_id='%d' AND post_id='%d'", $user_id, $post_id));
    if ($stmt) {
        return true;
    } else {
        return false;
    }
}

function shw_system_like_count($user_id)
{
    global $wpdb;
    $table = $wpdb->prefix . 'shw_system_dislike';
    $stmt = $wpdb->prepare("SELECT COUNT(*) FROM {$table} WHERE user_id='%d'", $user_id);
    $count = $wpdb->get_var($stmt);
    return $count ? $count : 0;

}



