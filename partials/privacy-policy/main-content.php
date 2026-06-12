<section class="pt-4 pb-0">
    <div class="container">
        <div class="row">
            <?php if (!empty(get_the_content())) : ?>
                <p><?php the_content(); ?></p>
            <?php else : ?>
                <div class="alert alert-warning">لطفا متنی در مورد قانون مقرارت وب سایت خود بنویسید </div>
            <?php endif; ?>
            <?php if (is_page('adv')) : ?>
                <!-- Post list table START -->
                <?php
                $adv = [
                    'A-h,B-h,C-h' => [
                        'title' => 'بنر بغل اسلایدر صفحه اصلی',
                        'location' => 'سمت چپ اسلایدر',
                        'size' => '270x225 OR 270x90',
                        'monthly_price' => 510000,
                        'quarterly_price' => 1350000,
                        'available' => true
                    ],
                    'D-h,F-h,G-h' => [
                        'title' => 'بنر وسط صفحه اصلی',
                        'location' => 'صفحه اصلی وسط وب سایت',
                        'size' => '770x198',
                        'monthly_price' => 510000,
                        'quarterly_price' => 1350000,
                        'available' => true
                    ],
                    'A-b,B-b' => [
                        'title' => 'بنر داخل بلاگ',
                        'location' => 'فقط در صفحه بلاگ',
                        'size' => '300x250',
                        'monthly_price' => 360000,
                        'quarterly_price' => 900000,
                        'available' => false
                    ],
                    'A-s,B-s,C-s,D-s,F-s' => [
                        'title' => 'بنر سایدبار صفحات سینگل',
                        'location' => 'سایدبار صفحات مقاله',
                        'size' => '270x191',
                        'monthly_price' => 450000,
                        'quarterly_price' => 1170000,
                        'available' => true
                    ],
                    'A-c,B-c,C-c,D-c,F-c' => [
                        'title' => 'بنر صفحه دسته‌بندی',
                        'location' => 'سایدبار صفحات دسته‌بندی',
                        'size' => '270x191',
                        'monthly_price' => 450000,
                        'quarterly_price' => 1170000,
                        'available' => true
                    ]
                ];
                ?>

                <div class="table-responsive border-0">
                    <table class="table align-middle p-4 mb-0 table-hover">
                        <!-- Table head -->
                        <thead class="table-dark">
                        <tr>
                            <th scope="col" class="border-0 rounded-start">جایگاه تبلیغاتی</th>
                            <th scope="col" class="border-0">محل نمایش</th>
                            <th scope="col" class="border-0">اندازه (پیکسل)</th>
                            <th scope="col" class="border-0">هزینه ماهیانه (تومان)</th>
                            <th scope="col" class="border-0">هزینه سه ماهه (تومان)</th>
                            <th scope="col" class="border-0">وضعیت جایگاه</th>
                            <th scope="col" class="border-0 rounded-end">سفارش</th>
                        </tr>
                        </thead>

                        <!-- Table body START -->
                        <tbody class="border-top-0">
                        <?php foreach($adv as $key => $item): ?>
                            <tr>
                                <td>
                                    <h6 class="mt-2 mt-md-0 mb-0"><?php echo $item['title']; ?></h6>
                                    <small class="text-muted text-instagram">کد: <?php echo $key; ?></small>
                                </td>
                                <td><?php echo $item['location']; ?></td>
                                <td><?php echo $item['size']; ?></td>
                                <td><?php echo number_format($item['monthly_price']); ?></td>
                                <td><?php echo number_format($item['quarterly_price']); ?></td>
                                <td>
                                    <?php if($item['available']): ?>
                                        <span class="badge bg-success bg-opacity-10 text-success">موجود </span>
                                    <?php else: ?>
                                        <span class="badge bg-danger bg-opacity-10 text-danger">ناموجود </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($item['available']): ?>
                                        <a href="https://wa.me/989190888196" class="btn btn-warning btn-sm">رزرو در واتساپ<i class="fab fa-whatsapp me-1 ml-2"></i></a>
                                    <?php else: ?>
                                        <button class="btn btn-secondary btn-sm" disabled>اتمام ظرفیت</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <!-- Table body END -->
                    </table>
                    <div class="alert alert-light border mt-4 text-center p-4 rounded shadow-sm">
                        <h6 class="mb-3"> راه‌های ارتباطی برای ثبت سفارش تبلیغات:</h6>
                        <p class="mb-2">
                            پس از مطالعه پلان‌های فوق، برای درج آگهی از طریق راه‌های زیر اقدام کنید:
                        </p>
                        <div class="d-flex justify-content-center gap-3 mt-3 flex-wrap">
                            <a href="<?php echo site_url('/contact-us'); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> فرم تماس با ما
                            </a>
                            <a href="mailto:advertise@shanulwp.ir" class="btn btn-danger btn-sm">
                                <i class="fas fa-envelope"></i> ایمیل
                            </a>
                            <a href="https://t.me/shanulwp_adv" class="btn btn-info btn-sm text-white" target="_blank">
                                <i class="fab fa-telegram"></i> تلگرام
                            </a>
                            <a href="https://wa.me/989190888196" class="btn btn-success btn-sm" target="_blank">
                                <i class="fab fa-whatsapp"></i> واتساپ
                            </a>
                        </div>
                        <p class="mt-3 small text-muted">
                             ایمیل: <strong>advertise@shanulwp.ir</strong> |
                             تلگرام: <strong>shanulwp_adv@</strong>
                        </p>
                    </div>
                </div>
                <!-- Images -->
                <div class="row g-2 my-5">
                    <div class="col-md-3">
                        <a href="<?php echo SHW_URL . '/assets/images/blog/3by4/01.jpg';?>" data-glightbox data-gallery="image-popup">
                            <img class="rounded" src="<?php echo SHW_URL . '/assets/images/blog/3by4/01.jpg';?>" alt="Image">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo SHW_URL . '/assets/images/blog/3by4/02.jpg';?>" data-glightbox data-gallery="image-popup">
                            <img class="rounded" src="<?php echo SHW_URL . '/assets/images/blog/3by4/02.jpg';?>" alt="Image">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo SHW_URL . '/assets/images/blog/3by4/03.jpg'?>" data-glightbox data-gallery="image-popup">
                            <img class="rounded" src="<?php echo SHW_URL . '/assets/images/blog/3by4/03.jpg'?>" alt="Image">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo SHW_URL . '/assets/images/blog/3by4/04.jpg'?>" data-glightbox data-gallery="image-popup">
                            <img class="rounded" src="<?php echo SHW_URL . '/assets/images/blog/3by4/04.jpg';?>" alt="Image">
                        </a>
                    </div>
                </div>
                <!-- Post list table END -->
            <?php endif; ?>
        </div>
    </div>
</section>