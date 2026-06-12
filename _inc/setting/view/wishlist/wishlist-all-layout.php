<?php ?>


<table class="wp-list-table widefat fixed striped table-view-list posts">
    <thead>
    <tr>
        <th scope="col" class="manage-column column-title column-primary">ردیف</th>
        <th scope="col" class="manage-column column-author">نام و نام خانوادگی</th>
        <th scope="col" class="manage-column column-email">ایمیل</th>
        <th scope="col" class="manage-column column-role">نقش</th>
        <th scope="col" class="manage-column column-comments">تعداد پست های موجود لیست</th>
        <th scope="col" class="manage-column column-date">تاریخ ایجاد</th>
    </tr>
    </thead>

    <tbody id="the-list">
    <?php $counter = 1;
    global $wpdb;
    $table_name = $wpdb->prefix . 'shw_wishlist';
    $items = $wpdb->get_results("SELECT  u_id, MIN(create_at) as MinCreate_at , COUNT(*) as total_posts FROM {$table_name} GROUP BY u_id ");
    if ($items):
    foreach ($items as $item): ?>
    <tr>

        <td class="column-title column-primary">
            <?php echo $counter++; ?>
        </td>

        <td class="column-author">
            <?php $user_first_name = get_user_meta($item->u_id,'first_name',true);
                  $user_last_name = get_user_meta($item->u_id,'last_name',true);
                  echo $user_first_name . ' ' . $user_last_name; ?>
        </td>

        <td class="column-email">
            <?php
              $user = get_userdata($item->u_id);
              echo $user->user_email;
            ?>
        </td>

        <td class="column-role">
            <?php      $role = !empty($user->roles)
                ? translate_user_role(
                    wp_roles()->roles[$user->roles[0]]['name']
                )
                : '-';
            echo esc_html($role);
            ?>
        </td>

        <td class="column-comments">
            <?php echo  $item->total_posts ?>
        </td>
        <td class="column-date">
            <?php echo esc_html($item->MinCreate_at); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>

