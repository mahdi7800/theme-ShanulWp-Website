<?php
if (is_user_logged_in()) :
$register_from_enable = get_option('_shw_settings_set_general')['register_from_enable'];
if ($register_from_enable === 'yes') :
    add_shortcode( 'shw-dashboard', 'shw_dashboard_func');
function shw_dashboard_func() : string {
    ob_start(); ?>
    <section class="py-4">
        <div class="container">

            <div class="row g-4">
                <!-- Profile cover and info START -->
                <div class="col-12">
                    <div class="card mb-4 position-relative z-index-9">
                        <!-- Cover image -->
                        <?php
                          $user = wp_get_current_user();
                          $user_id = get_current_user_id();
                          $email = get_user_by( 'user_email', $user->user_email);
                        $user_registered = $user->user_registered;
                        $user_first_name = get_user_meta($user_id,'first_name',true);
                        $user_last_name = get_user_meta($user_id,'last_name',true);
                        $avatar = get_avatar($email,'200','robohash',$user_first_name . ' ' . $user_last_name,['class'=>'avatar-img rounded-circle']);

                        ?>

                        <div class="py-5 h-200 rounded" style="background-image:url(<?php echo SHW_URL . '/assets/images/blog/16by9/big/07.jpg';?>); background-position: center bottom; background-size: cover; background-repeat: no-repeat;">
                        </div>
                        <div class="card-body pt-3 pb-0">
                            <div class="row d-flex justify-content-between">
                                <!-- Avatar -->
                                <div class="col-sm-12 col-md-auto text-center text-md-start">
                                    <div class="avatar avatar-xxl mt-n5">
                                     <?php echo $avatar ?>
                                    </div>
                                </div>
                                <!-- Profile info -->
                                <div class="col-sm-12 col-md text-center text-md-start d-md-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="my-1"><?php echo $user_first_name . ' ' . $user_last_name ?> <i class="bi bi-patch-check-fill text-info small"></i></h4>
                                        <ul class="list-inline">
                                            <?php
                                            $roles = $user->roles;
                                            $role_web = 'کاربر';

                                            if (in_array('administrator', $roles)) {
                                                $role_web = 'مدیر سایت';
                                            } elseif (in_array('editor', $roles)) {
                                                $role_web = 'ویرایشگر';
                                            } elseif (in_array('author', $roles)) {
                                                $role_web = 'برنامه نویس';
                                            } elseif (in_array('contributor', $roles)) {
                                                $role_web = 'مشارکت‌کننده';
                                            } elseif (in_array('subscriber', $roles)) {
                                                $role_web = 'عضو';
                                            }
                                            ?>

                                            <li class="list-inline-item"><i class="bi bi-person-fill me-1"></i> <?php echo $role_web ?> <?php  bloginfo('name'); ?></li>
                                            <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> تاریخ عضویت <?php echo date_i18n('j F Y', strtotime($user_registered)); ?> </li>
                                        </ul>
                                        <p class="m-0"></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile info END -->
                <!-- Counter item -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">
                                <i class="bi bi-chat-dots-fill"></i>
                            </div>
                            <!-- Content -->
                            <div class="ms-3">
                                <h3> <?php
                                    $user_comments_count = get_comments(['user_id' => $user_id, 'count' => true, 'status' => 'approve']);
                                    echo number_format($user_comments_count);?>
                                </h3>
                                <h6 class="mb-0">تعداد کامنت گذاشته اید</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Counter item -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-xl fs-1 bg-primary bg-opacity-10 rounded-3 text-primary">
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                            </div>
                            <!-- Content -->
                            <div class="ms-3">
                                <h3><?php echo shw_system_dislike_count($user_id); ?></h3>
                                <h6 class="mb-0">دیس لایک</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Counter item -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-xl fs-1 bg-danger bg-opacity-10 rounded-3 text-danger">
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                            </div>
                            <!-- Content -->
                            <div class="ms-3">
                                <h3><?php echo shw_system_like_count($user_id); ?></h3>
                                <h6 class="mb-0">لایک</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Counter item -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-xl fs-1 bg-info bg-opacity-10 rounded-3 text-info">
                                <i class="bi bi-bookmark-star-fill""></i>
                            </div>
                            <!-- Content -->
                            <div class="ms-3">
                                <h3><?php echo shw_system_wishlist_count($user_id); ?></h3>
                                <h6 class="mb-0">بوک مارک</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
                   <!-- Counter END -->
     </section>
<?php
    return ob_get_clean();
}
endif;
endif;
