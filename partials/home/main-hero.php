<!-- =======================
Main hero START -->
<section class="pt-3 pb-3 mb-2 card-grid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tiny-slider arrow-hover arrow-blur arrow-white arrow-round rounded-3 overflow-hidden">
                    <div class="tiny-slider-inner"
                         data-autoplay="false"
                         data-hoverpause="true"
                         data-gutter="1"
                         data-arrow="true"
                         data-dots="false"
                         data-items="1">
                        <?php
                        global $wpdb;
                        $table = $wpdb->prefix . 'shw_banner';
                        $banners = $wpdb->get_results("SELECT * FROM $table ORDER BY id DESC LIMIT 3", ARRAY_A);
                        if (!empty($banners)) :

                            foreach ($banners as $banner) :
                                ?>
                                <?php $main_title = explode('|',esc_html($banner['title'])) ;   ?>
                                <!-- Slide 1 -->
                                <div class="card bg-dark-overlay-3 h-400 h-sm-500 h-md-600 rounded-0" style="background-image:url(<?php echo esc_url($banner['image_url'])?>); background-position: center left; background-size: cover;">
                                    <!-- Card Image overlay -->
                                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-5">
                                        <div class="w-100 my-auto">
                                            <div class="col-md-10 col-lg-7 mx-auto text-center">
                                                <!-- Card category -->
                                                <!-- Card title -->
                                                <h2 class="text-white display-5"><a href="<?php echo esc_url($banner['link_url']); ?>" class="btn-link text-reset fw-normal"><?php echo $main_title[0] ?></a></h2>
                                                <p class="text-white"><?php echo $main_title[1] ?></p>
                                                <!-- Card info -->
                                                <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                    <li class="nav-item">
                                                        <div class="nav-link">
                                                            <div class="d-flex align-items-center text-white position-relative">
                                                                <a href="<?php echo esc_url($banner['link_url']); ?>" class="btn btn-primary">کلیک کنید</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php else : ?>
                                        <!-- Slide 1 -->
                                        <div class="card bg-dark-overlay-3 h-400 h-sm-500 h-md-600 rounded-0" style="background-image:url(<?php echo SHW_URL . '/assets/images/blog/16by9/05.jpg';?>); background-position: center left; background-size: cover;">
                                            <!-- Card Image overlay -->
                                            <div class="card-img-overlay d-flex align-items-center p-3 p-sm-5">
                                                <div class="w-100 my-auto">
                                                    <div class="col-md-10 col-lg-7 mx-auto text-center">
                                                        <!-- Card category -->
                                                        <a href="#" class="badge text-bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>اقتصاد</a>
                                                        <!-- Card title -->
                                                        <h2 class="text-white display-5"><a href="post-single-2.html" class="btn-link text-reset fw-normal">کریسمس چه فرقی با سال نوی میلادی دارد؟</a></h2>
                                                        <p class="text-white">دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                                        <!-- Card info -->
                                                        <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                            <li class="nav-item">
                                                                <div class="nav-link">
                                                                    <div class="d-flex align-items-center text-white position-relative">
                                                                        <div class="avatar avatar-sm">
                                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/14.jpg" alt="avatar">
                                                                        </div>
                                                                        <span class="ms-3">با <a href="#" class="stretched-link text-reset btn-link">مهدی رزاق</a></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="nav-item">7 دی، 1400</li>
                                                            <li class="nav-item"><a href="#" class="btn-link"><i class="far fa-comment-alt me-1"></i> 5 دیدگاه</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slide 2 -->
                                        <div class="card bg-dark-overlay-3 h-400 h-sm-500 h-md-600 rounded-0" style="background-image:url(<?php echo SHW_URL . '/assets/images/blog/16by9/02.jpg';?>); background-position: center left; background-size: cover;">
                                            <!-- Card Image overlay -->
                                            <div class="card-img-overlay d-flex align-items-center p-3 p-sm-5">
                                                <div class="w-100 my-auto">
                                                    <div class="col-md-10 col-lg-7 mx-auto text-center">
                                                        <!-- Card category -->
                                                        <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>مگامنو</a>
                                                        <!-- Card title -->
                                                        <h2 class="text-white display-5"><a href="post-single-2.html" class="btn-link text-reset fw-normal">مشکل اولیه استارت آپ ها و راه حل آنها</a></h2>
                                                        <p class="text-white">دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                                        <!-- Card info -->
                                                        <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                            <li class="nav-item">
                                                                <div class="nav-link">
                                                                    <div class="d-flex align-items-center text-white position-relative">
                                                                        <div class="avatar avatar-sm">
                                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="avatar">
                                                                        </div>
                                                                        <span class="ms-3">با <a href="#" class="stretched-link text-reset btn-link">مهشید صمدی</a></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="nav-item">17 تیر، 1400</li>
                                                            <li class="nav-item"><a href="#" class="btn-link"><i class="far fa-comment-alt me-1"></i> 3 دیدگاه</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =======================
Main hero END -->