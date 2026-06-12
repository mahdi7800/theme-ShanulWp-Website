<?php ?>
<table class="wp-list-table widefat fixed striped table-view-list posts">
    <thead>
    <tr>
        <th scope="col" class="manage-column column-author">ردیف</th>
        <th scope="col" class="manage-column column-title column-primary">عنوان</th>
        <th scope="col" class="manage-column column-categories">دسته بندی</th>
        <th scope="col" class="manage-column column-date">تعداد لیست علاقه مندی</th>
    </tr>
    </thead>
    <tbody id="the-list">
    <?php $counter = 1 ;
    global $wpdb;
    $table_name = $wpdb->prefix . 'shw_wishlist';
    $items = $wpdb->get_results( "SELECT p_id , COUNT(p_id) AS total_post FROM {$table_name} GROUP BY p_id ");
    if ($items):
    foreach ($items as $item): ?>
    <tr>
        <td class="author column-author"><?php echo $counter++; ?></td>
        <td class="title column-title has-row-actions column-primary">
            <?php
               $title = get_the_title($item->p_id);
               echo  esc_html($title);
            ?>
        </td>
        <td class="author column-categories">
            <?php

            $cats = get_the_category($item->p_id);

            if (!empty($cats)) {

                $cat_names = wp_list_pluck($cats, 'name');

                echo esc_html(implode(' , ', $cat_names));

            } else {

                echo '-';

            }

            ?>
        </td>
        <td class="date column-date"><?php echo $item->total_post; ?></td>
    </tr>
    <?php endforeach;
    endif; ?>
    </tbody>
</table>
