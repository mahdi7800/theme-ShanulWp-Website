<!-- =======================
Inner intro START -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php PostView::shw_set_post_view(get_the_ID()); ?>
    <?php GoogleReferer::shw_set_google_referer(get_the_ID(), get_the_permalink()); ?>
<section class="bg-dark-overlay-4" style="background-image:url(<?php echo shw_post_thumbnail_url(); ?>); background-position: center left; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 py-md-5 my-lg-5">
                      <?php
                         $category = get_the_category();
                         if ( ! empty( $category ) ) {
                             $cat_link = get_category_link( $category[0]->term_id );
                             echo'<a href="'.$cat_link.'"class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>'.$category[0]->name.'</a>';
                         }
                      ?>
                <h1 class="text-white"><?php echo get_the_title(); ?></h1>
                <p class="lead text-white"><?php echo PostExcerpt::shw_post_excerpt(); ?></p>
                <ul class="nav nav-divider text-white-force align-items-lg-baseline">
                    <li class="nav-item"><?php echo get_the_date('j F, Y') ?></li>
                    <li class="nav-item"><?php echo ReadPost::shw_read_post_time(get_the_content()) ?> دقیقه زمان مطالعه</li>
                    <li class="nav-item"><i class="far fa-eye me-1"></i> <?php echo PostView::shw_get_post_view(get_the_ID()) ?> بازدید</li>
                    <?php $active_wishlist = get_option('_shw_settings_set_general');
                    if ($active_wishlist['wishlist_enable'] === 'yes') :?>
                        <?php
                        $user_id = get_current_user_id();
                        $post_id = get_the_ID();
                        $like_count = 0;

                        if ( $user_id ) {
                            global $wpdb;
                            $table = $wpdb->prefix . 'shw_system_like';
                            $like_count = $wpdb->get_var(
                                $wpdb->prepare("SELECT COUNT(*) FROM {$table} WHERE user_id = %d AND post_id = %d ", $user_id ,$post_id)
                            );
                        } ?>
                    <li class="nav-item"><a href="#"><i class="fas fa-heart me-1 text-danger"></i></a><?php echo esc_html($like_count); ?></li>
                    <?php
                    $user_id = get_current_user_id();
                    $post_id = get_the_ID();
                    $wishlist_count = 0;

                    if ( $user_id ) {
                        global $wpdb;
                        $table = $wpdb->prefix . 'tns_wishlist';
                        $wishlist_count = $wpdb->get_var(
                            $wpdb->prepare("SELECT COUNT(*) FROM {$table} WHERE u_id = %d AND p_id = %d", $user_id,$post_id)
                        );
                    } ?>
                    <li class="nav-item"><i class="fas fa-bookmark me-1 text-white"></i><span style="margin-right: 5px"><?php echo esc_html($wishlist_count); ?></span></li>
                    <?php endif; ?>
                </ul>
                <!-- Share post -->
                <div class="d-md-flex align-items-center mt-4">
                    <h5 class="text-white me-3">اشتراک گذاری </h5>
                    <!-- تلگرام -->
                    <ul class="nav text-white-force">
                    <li class="nav-item">
                        <?php
                        $telegram_url = 'https://t.me/share/url?url=' . urlencode(get_permalink()) . '&text=' . urlencode(get_the_title());
                        ?>
                        <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5"
                           style="background-color: #0088cc; color: white; transition: all 0.3s ease;"
                           href="<?php echo esc_url($telegram_url); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="اشتراک در تلگرام">
                            <i class="fab fa-telegram-plane align-middle"></i>
                        </a>
                    </li>

                    <!-- واتساپ -->
                    <li class="nav-item">
                        <?php
                        $whatsapp_url = 'https://wa.me/?text=' . urlencode(get_the_title() . ' - ' . get_permalink());
                        ?>
                        <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5"
                           style="background-color: #25D366; color: white; transition: all 0.3s ease;"
                           href="<?php echo esc_url($whatsapp_url); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="اشتراک در واتساپ">
                            <i class="fab fa-whatsapp align-middle"></i>
                        </a>
                    </li>

                    <!-- اینستاگرام (آیکون، اما لینک دهی صفحه اینستاگرام شما) -->
                    <li class="nav-item">
                        <?php
                        // لینک صفحه اینستاگرام خود را وارد کنید
                        $instagram_profile_url = 'https://instagram.com/yourusername';
                        ?>
                        <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5"
                           style="background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D); color: white; transition: all 0.3s ease;"
                           href="<?php echo esc_url($instagram_profile_url); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="اینستاگرام ما">
                            <i class="fab fa-instagram align-middle"></i>
                        </a>
                    </li>
                        <!-- لینکدین (LinkedIn) -->
                        <li class="nav-item">
                            <?php
                            $linkedin_url = 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode(get_permalink());
                            ?>
                            <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5"
                               style="background-color: #0077b5; color: white; transition: all 0.3s ease;"
                               href="<?php echo esc_url($linkedin_url); ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               title="اشتراک در لینکدین">
                                <i class="fab fa-linkedin-in align-middle"></i>
                            </a>
                        </li>
                    <!-- ایمیل -->
                    <li class="nav-item">
                        <?php
                        $email_subject = str_replace('&', '%26', get_the_title());
                        $email_body = str_replace('&', '%26', 'مطلب: ' . get_permalink());
                        $email_url = 'mailto:?subject=' . $email_subject . '&body=' . $email_body;
                        ?>
                        <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5"
                           style="background-color: #6c757d; color: white; transition: all 0.3s ease;"
                           href="<?php echo esc_url($email_url); ?>"
                           title="ارسال با ایمیل">
                            <i class="far fa-envelope align-middle"></i>
                        </a>
                    </li>

                    <!-- کپی لینک (آپشنال) -->
                    <li class="nav-item">
                        <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 copy-link-btn"
                           style="background-color: #17a2b8; color: white; cursor: pointer; transition: all 0.3s ease;"
                           onclick="copyToClipboard('<?php echo esc_url(get_permalink()); ?>')"
                           title="کپی لینک">
                            <i class="fas fa-link align-middle"></i>
                        </a>
                    </li>

                    </ul>
                    <script>
                        function copyToClipboard(text) {
                            navigator.clipboard.writeText(text).then(function() {
                                alert('لینک با موفقیت کپی شد!');
                            }, function(err) {
                                console.error('خطا در کپی لینک: ', err);
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =======================
Inner intro END -->
<?php endwhile; endif; ?>