<?php

$args = [
    'post_type' => 'post',
    'posts_per_page' => 6,
    'meta_key' => '_type_post_meta',
    'meta_value' => 'tv',
    'orderby' => 'date',
    'order' => 'DESC'
];

$the_query = new WP_Query( $args );

if ($the_query->have_posts()) :
    while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="col-sm-6 col-lg-3">
            <!-- Card item START -->
            <div class="position-relative rounded-3 overflow-hidden card-fold">
                <?php echo shw_post_thumbnail(); ?>
                <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                    <div class="w-100 my-auto">
                        <a href="<?php echo get_the_permalink(); ?>" class="icon-md bg-primary d-block mx-auto text-white rounded-circle" data-glightbox data-gallery="y-video">
                            <i class="bi bi-play-btn"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-3">
                <h5 class="card-title">
                    <a href="<?php echo get_the_permalink(); ?>" class="btn-link text-dark-mode"><?php the_title(); ?></a>
                </h5>
                <ul class="nav nav-divider align-items-center d-none d-sm-inline-block small opacity-6">
                    <li class="nav-item text-muted"><?php echo get_the_date('j F Y'); ?></li>
                </ul>
            </div>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <!-- Card small START -->
    <div class="col-sm-6 col-lg-3">
        <!-- Card item START -->
        <div class="card bg-transparent overflow-hidden">
            <!-- Card img -->
            <div class="position-relative rounded-3 overflow-hidden">
                <img class="card-img" src="<?php echo SHW_URL . '/assets/images/blog/16by9/small/05.jpg'?>" alt="Card image">
                <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                    <!-- Card overlay -->
                    <div class="w-100 my-auto">
                        <!-- Popup video -->
                        <a href="https://www.aparat.com/video/video/embed/videohash/yMQab/vt/frame" class="icon-md bg-primary d-block mx-auto text-white rounded-circle" data-glightbox data-gallery="y-video">
                            <i class="bi bi-play-btn"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pt-3">
            <h5 class="card-title"><a href="podcast-single.html" class="btn-link text-white">رازهای کوچک کثیف در مورد صنعت تجارت</a></h5>
            <!-- Card info -->
            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6">
                <li class="nav-item">
                    <div class="nav-link">
                        با <a href="#" class="text-reset btn-link">علی حسنی</a>
                    </div>
                </li>
                <li class="nav-item">17 تیر، 1400</li>
            </ul>
        </div>
          <!-- Card item END -->
     </div>

    <div class="col-sm-6 col-lg-3">
        <!-- Card item START -->
        <div class="card bg-transparent overflow-hidden">
            <!-- Card img -->
            <div class="position-relative rounded-3 overflow-hidden">
                <img class="card-img" src="<?php echo SHW_URL . '/assets/images/blog/16by9/small/06.jpg';?>" alt="Card image">
                <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                    <!-- Card overlay -->
                    <div class="w-100 my-auto">
                        <!-- Popup video -->
                        <a href="https://www.aparat.com/video/video/embed/videohash/yMQab/vt/frame" class="icon-md bg-primary d-block mx-auto text-white rounded-circle" data-glightbox data-gallery="y-video">
                            <i class="bi bi-play-btn"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-3">
                <h5 class="card-title"><a href="podcast-single.html" class="btn-link text-white">رونمایی از طرح بزرگترین تلسکوپ نوری</a></h5>
                <!-- Card info -->
                <ul class="nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6">
                    <li class="nav-item">
                        <div class="nav-link">
                            با <a href="#" class="text-reset btn-link">نیلوفر راد</a>
                        </div>
                    </li>
                    <li class="nav-item">22 آذر، 1400</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Card item END -->

    <div class="col-sm-6 col-lg-3">
        <!-- Card item START -->
        <div class="card bg-transparent overflow-hidden">
            <!-- Card img -->
            <div class="position-relative rounded-3 overflow-hidden">
                <img class="card-img" src="<?php echo SHW_URL . '/assets/images/blog/16by9/small/07.jpg';?>" alt="Card image">
                <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                    <!-- Card overlay -->
                    <div class="w-100 my-auto">
                        <!-- Popup video -->
                        <a href="https://www.aparat.com/video/video/embed/videohash/yMQab/vt/frame" class="icon-md bg-primary d-block mx-auto text-white rounded-circle" data-glightbox data-gallery="y-video">
                            <i class="bi bi-play-btn"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-3">
                <h5 class="card-title"><a href="podcast-single.html" class="btn-link text-white">کیفیت هوای تهران همچنان ناسالم</a></h5>
                <!-- Card info -->
                <ul class="nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6">
                    <li class="nav-item">
                        <div class="nav-link">
                            با <a href="#" class="text-reset btn-link">رضا مرادی</a>
                        </div>
                    </li>
                    <li class="nav-item">24 بهمن، 1400</li>
                </ul>
            </div>
        </div>
        <!-- Card item END -->
    </div>

    <div class="col-sm-6 col-lg-3">
        <!-- Card item START -->
        <div class="card bg-transparent overflow-hidden">
            <!-- Card img -->
            <div class="position-relative rounded-3 overflow-hidden">
                <img class="card-img" src="<?php echo SHW_URL . '/assets/images/blog/16by9/small/08.jpg';?>" alt="Card image">
                <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                    <!-- Card overlay -->
                    <div class="w-100 my-auto">
                        <!-- Popup video -->
                        <a href="https://www.aparat.com/video/video/embed/videohash/yMQab/vt/frame" class="icon-md bg-primary d-block mx-auto text-white rounded-circle" data-glightbox data-gallery="y-video">
                            <i class="bi bi-play-btn"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-3">
                <h5 class="card-title"><a href="podcast-single.html" class="btn-link text-white">برگزاری جشنواره زمستانه آکادمی ایرانسل</a></h5>
                <!-- Card info -->
                <ul class="nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6">
                    <li class="nav-item">
                        <div class="nav-link">
                            با <a href="#" class="text-reset btn-link">رضا کریمی</a>
                        </div>
                    </li>
                    <li class="nav-item">7 شهریور، 1400</li>
                </ul>
            </div>
        </div>
        <!-- Card item END -->
    </div>
    <!-- Card small START -->
<?php endif; ?>

