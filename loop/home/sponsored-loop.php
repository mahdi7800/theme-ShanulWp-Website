
<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'meta_key' => '_type_post_meta',
    'meta_value' => 'article',
    'orderby' => 'date',
    'order' => 'DESC'
);
$posts = new WP_Query($args);

if ( $posts->have_posts() ) :
    while ( $posts->have_posts() ) : $posts->the_post(); ?>
<div class="col-sm-6 col-lg-3">
    <div class="card bg-transparent">
        <!-- Card img -->
        <?php echo  shw_post_thumbnail(); ?>
        <div class="card-body px-0 pt-3">
            <!-- Card info -->
            <ul class="nav nav-divider align-items-center small mb-2">
                <li class="nav-item">
                    <a href="#" class="text-reset btn-link"><?php echo get_the_author_meta('first_name'); ?> </a>
                </li>
                <li class="nav-item"><?php echo get_the_date('j F  , Y');?></li>
                <li class="nav-item"><?php echo get_comments_number();?> دیدگاه </li>
            </ul>
            <h5 class="card-title"><a href="<?php echo get_permalink(); ?>" class="btn-link text-reset stretched-link"><?php echo get_the_title(); ?></a></h5>
            <p><?php  echo PostExcerpt::shw_post_excerpt(); ?> </p>
        </div>
    </div>
</div>
<?php  endwhile; ?>
<?php else : ?>
    <!-- Card item START -->
    <div class="col-sm-6 col-lg-3">
        <div class="card bg-transparent">
            <!-- Card img -->
            <img class="card-img rounded-0 grayscale" src="<?php echo  SHW_URL . '/assets/images/blog/16by9/small/01.jpg'?>" alt="Card image">
            <div class="card-body px-0 pt-3">
                <!-- Card info -->
                <ul class="nav nav-divider align-items-center small mb-2">
                    <li class="nav-item">
                        <a href="#" class="text-reset btn-link">فاطمه تشکر</a>
                    </li>
                    <li class="nav-item">18 بهمن، 1400</li>
                </ul>
                <h5 class="card-title"><a href="#" class="btn-link text-reset stretched-link">اجرای تفاهم‌نامه همکاری برای سهولت دریافت مدارک</a></h5>
                <p>شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا ...</p>
            </div>
        </div>
    </div>
    <!-- Card item END -->
    <!-- Card item START -->
    <div class="col-sm-6 col-lg-3">
        <div class="card bg-transparent">
            <!-- Card img -->
            <img class="card-img rounded-0 grayscale" src="<?php echo  SHW_URL . '/assets/images/blog/16by9/small/02.jpg'?>" alt="Card image">
            <div class="card-body px-0 pt-3">
                <!-- Card info -->
                <ul class="nav nav-divider align-items-center small mb-2">
                    <li class="nav-item">
                        <a href="#" class="text-reset btn-link">رضا کریمی</a>
                    </li>
                    <li class="nav-item">7 شهریور، 1400</li>
                </ul>
                <h5 class="card-title"><a href="#" class="btn-link text-reset stretched-link">افزایش آلودگی هوا در شهرهای پُرجمعیت تا فردا</a></h5>
                <p>شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا ...</p>
            </div>
        </div>
    </div>
    <!-- Card item END -->
    <!-- Card item START -->
    <div class="col-sm-6 col-lg-3">
        <div class="card bg-transparent">
            <!-- Card img -->
            <img class="card-img rounded-0 grayscale" src="<?php echo  SHW_URL . '/assets/images/blog/16by9/small/03.jpg'?>" alt="Card image">
            <div class="card-body px-0 pt-3">
                <!-- Card info -->
                <ul class="nav nav-divider align-items-center small mb-2">
                    <li class="nav-item">
                        <a href="#" class="text-reset btn-link">مژده خالدی</a>
                    </li>
                    <li class="nav-item">8 آذر، 1400</li>
                </ul>
                <h5 class="card-title"><a href="#" class="btn-link text-reset stretched-link">بهترین حساب های توییتر برای یادگیری سرمایه گذاری</a></h5>
                <p>شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا ...</p>
            </div>
        </div>
    </div>
    <!-- Card item END -->
    <!-- Card item START -->
    <div class="col-sm-6 col-lg-3">
        <div class="card bg-transparent">
            <!-- Card img -->
            <img class="card-img rounded-0 grayscale" src="<?php echo  SHW_URL . '/assets/images/blog/16by9/small/04.jpg'?>" alt="Card image">
            <div class="card-body px-0 pt-3">
                <!-- Card info -->
                <ul class="nav nav-divider align-items-center small mb-2">
                    <li class="nav-item">
                        <a href="#" class="text-reset btn-link">آریا علیزاده</a>
                    </li>
                    <li class="nav-item">12 بهمن، 1400</li>
                </ul>
                <h5 class="card-title"><a href="#" class="btn-link text-reset stretched-link">احداث و مقاوم‌سازی مدارس جلفا توسط منطقه آزاد ارس</a></h5>
                <p>شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا ...</p>
            </div>
        </div>
    </div>
<?php endif; ?>