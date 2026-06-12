<?php add_shortcode('shw-article', 'shw_short_code_article');

function shw_short_code_article() : string {
    ob_start(); ?>
    <!-- =======================
Inner intro START -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto text-center">
                    <h1 class="display-5"><?php echo get_the_title(); ?></h1>
                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-dots m-0">
                            <?php Breadcrumb::get_breadcrumb(); ?>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

    <!-- =======================
    Video post END -->
    <section class="pt-4">
        <div class="container">
            <div class="row g-4">
               <?php
               $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = [
        'post_type' => 'post',
        'posts_per_page' => 1,
        'meta_key' => '_type_post_meta',
        'meta_value' => 'article',
        'orderby' => 'date',
        'order' => 'DESC',
        'paged'          => $paged
    ];

    $the_query = new WP_Query( $args );

    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <!-- Image slider post START -->
                <div class="col-md-6">
                    <!-- Card item START -->
                    <div class="card">
                        <!-- Card image -->
                        <div class="card-image">
                            <!-- Slider START -->
                            <div class="tiny-slider dots-inside dots-white">
                                <div class="tiny-slider-inner" data-arrow="false" data-dots="true" data-autoplay="true" data-items="1" data-gutter="0">
                                    <div class="overflow-hidden">
                                        <?php echo  shw_post_thumbnail(); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider END -->
                        </div>
                        <div class="card-body px-0 pt-3">
                            <h4 class="card-title"><a href="<?php echo get_the_permalink(); ?>" class="btn-link text-reset"><?php echo get_the_title(); ?></a></h4>
                            <p><?php echo PostExcerpt::shw_post_excerpt() ?></p>
                            <!-- Card info -->
                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                <li class="nav-item">
                                    <div class="nav-link">
                                        <div class="d-flex align-items-center position-relative">
                                            <div class="avatar avatar-xs">
<!--                                                <img class="avatar-img rounded-circle" src="--><?php //echo SHW_URL . '/assets/images/avatar/04.jpg'?><!--" alt="avatar">-->
                                            </div>
                                            <span class="ms-3"><?php echo get_the_author_meta('first_name'); ?></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item"><?php echo get_the_date('j F  , Y');?></li>
                                <li class="nav-item"><?php echo get_comments_number();?> دیدگاه </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card item END -->
                </div>
                <!-- Image slider post END -->

        <?php endwhile;?>
        <?php endif; ?>
                <div class="col-12 text-center mt-5">
                    <nav class="mb-5 d-flex justify-content-center" aria-label="navigation">
                        <?php echo Pagination::paginate($the_query,'list'); ?>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Video post END -->
    <?php   return ob_get_clean();
}
