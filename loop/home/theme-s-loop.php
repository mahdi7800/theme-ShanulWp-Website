<?php
$args = [
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'rand',
];

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <!-- Slider item START -->
        <div>
            <div class="card border">
                <!-- Image -->
                <div class="position-relative">
                    <img class="card-img-top" src="<?php echo SHW_URL . '/assets/images/shop/14.jpg';?>" alt="">
                    <div class="card-img-overlay d-flex">
                        <div class="w-100 mt-auto">
                            <span class="badge fs-6 text-bg-success">25000 تومان</span>
                        </div>
                    </div>
                </div>

                <!-- Card body -->
                <div class="card-body">
                    <h5 class="card-title"><a href="shop-detail.html" class="stretched-link">کارت خرید هدیه</a></h5>
                    <p class="mb-3">اهل دنیای موجود طراحی اساسا مورد استفاده قرار...</p>
                    <h6 class="mb-0"><i class="bi bi-patch-check text-primary me-2"></i>برای افراد خاص</h6>
                </div>

                <!-- Card footer -->
                <div class="card-footer pb-3 d-grid">
                    <a href="#" class="btn btn-sm btn-dark mb-0">مشاهده</a>
                </div>
            </div>
        </div>
        <!-- Slider item END -->
<?php endwhile; ?>
<?php else : ?>
    <!-- Slider item START -->
    <div>
        <div class="card border">
            <!-- Image -->
            <div class="position-relative">
                <img class="card-img-top" src="<?php echo SHW_URL . '/assets/images/shop/14.jpg';?>" alt="">
                <div class="card-img-overlay d-flex">
                    <div class="w-100 mt-auto">
                        <span class="badge fs-6 text-bg-success">25000 تومان</span>
                    </div>
                </div>
            </div>

            <!-- Card body -->
            <div class="card-body">
                <h5 class="card-title"><a href="shop-detail.html" class="stretched-link">کارت خرید هدیه</a></h5>
                <p class="mb-3">اهل دنیای موجود طراحی اساسا مورد استفاده قرار...</p>
                <h6 class="mb-0"><i class="bi bi-patch-check text-primary me-2"></i>برای افراد خاص</h6>
            </div>

            <!-- Card footer -->
            <div class="card-footer pb-3 d-grid">
                <a href="#" class="btn btn-sm btn-dark mb-0">مشاهده</a>
            </div>
        </div>
    </div>
    <!-- Slider item END -->

    <!-- Slider item START -->
    <div>
        <div class="card border">
            <!-- Image -->
            <div class="position-relative">
                <img class="card-img-top" src="<?php echo SHW_URL . '/assets/images/shop/15.jpg';?>" alt="">
                <div class="card-img-overlay d-flex">
                    <div class="w-100 mt-auto">
                        <span class="badge fs-6 text-bg-success">30000 تومان</span>
                    </div>
                </div>
            </div>

            <!-- Card body -->
            <div class="card-body">
                <h5 class="card-title"><a href="shop-detail.html" class="stretched-link">لوازم آرایشی و بهداشتی</a></h5>
                <p class="mb-3">اهل دنیای موجود طراحی اساسا مورد استفاده قرار...</p>
                <h6 class="mb-0"><i class="bi bi-patch-check text-primary me-2"></i>تجربه هنری</h6>
            </div>

            <!-- Card footer -->
            <div class="card-footer pb-3 d-grid">
                <a href="#" class="btn btn-sm btn-dark mb-0">مشاهده</a>
            </div>
        </div>
    </div>
    <!-- Slider item END -->

    <!-- Slider item START -->
    <div>
        <div class="card border">
            <!-- Image -->
            <div class="position-relative">
                <img class="card-img-top" src="<?php echo SHW_URL . '/assets/images/shop/16.jpg';?>" alt="">
                <div class="card-img-overlay d-flex">
                    <div class="w-100 mt-auto">
                        <span class="badge fs-6 text-bg-success">رایگان</span>
                    </div>
                </div>
            </div>

            <!-- Card body -->
            <div class="card-body">
                <h5 class="card-title"><a href="shop-detail.html" class="stretched-link">لوازم خانه و آشپزخانه</a></h5>
                <p class="mb-3">اهل دنیای موجود طراحی اساسا مورد استفاده قرار...</p>
                <h6 class="mb-0"><i class="bi bi-patch-check text-primary me-2"></i>تجربه وسایل نو</h6>
            </div>

            <!-- Card footer -->
            <div class="card-footer pb-3 d-grid">
                <a href="#" class="btn btn-sm btn-dark mb-0">مشاهده</a>
            </div>
        </div>
    </div>
    <!-- Slider item END -->

    <!-- Slider item START -->
    <div>
        <div class="card border">
            <!-- Image -->
            <div class="position-relative">
                <img class="card-img-top" src="<?php echo SHW_URL . '/assets/images/shop/17.jpg';?>" alt="">
                <div class="card-img-overlay d-flex">
                    <div class="w-100 mt-auto">
                        <span class="badge fs-6 text-bg-success">25000 تومان</span>
                    </div>
                </div>
            </div>

            <!-- Card body -->
            <div class="card-body">
                <h5 class="card-title"><a href="shop-detail.html" class="stretched-link">کالای دیجیتال</a></h5>
                <p class="mb-3">اهل دنیای موجود طراحی اساسا مورد استفاده قرار...</p>
                <h6 class="mb-0"><i class="bi bi-patch-check text-primary me-2"></i>کالاهای متنوع</h6>
            </div>

            <!-- Card footer -->
            <div class="card-footer pb-3 d-grid">
                <a href="#" class="btn btn-sm btn-dark mb-0">مشاهده</a>
            </div>
        </div>
    </div>
    <!-- Slider item END -->
<?php endif; ?>