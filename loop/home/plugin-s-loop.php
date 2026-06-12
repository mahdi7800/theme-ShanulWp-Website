<div class="tiny-slider arrow-hover arrow-dark arrow-round">
    <div class="tiny-slider-inner"
         data-autoplay="false"
         data-hoverpause="true"
         data-gutter="24"
         data-arrow="true"
         data-dots="false"
         data-items-xl="5"
         data-items-lg="4"
         data-items-md="3"
         data-items-sm="2"
         data-items-xs="2"
    >
        <?php
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 6,
            'meta_key' => '_type_post_meta',
            'meta_value' => 'plugin',
            'orderby' => 'date',
            'order' => 'DESC'
        ];

        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();?>
        <!-- Plugin item -->
        <div>
            <div class="card card-overlay-bottom card-img-scale">
                <?php echo shw_post_thumbnail(); ?>
                <div class="card-img-overlay d-flex px-3 px-sm-5">
                    <h5 class="mt-auto mx-auto">
                        <?php $link = get_post_meta($post->ID, '_plugin_download', true);?>
                        <a href="<?php echo esc_url($link) ?>" class="stretched-link btn-link text-white"><?php echo get_the_title(); ?></a>
                    </h5>
                </div>
            </div>
        </div>
        <!-- Plugin item -->
        <?php endwhile; ?>
        <?php else : ?>
        <!-- Category item -->
        <div>
            <div class="card card-overlay-bottom card-img-scale">
                <img class="card-img" src="<?php echo SHW_URL . '/assets/images/blog/1by1/thumb/01.jpg';?>" alt="card image">
                <div class="card-img-overlay d-flex px-3 px-sm-5">
                    <h5 class="mt-auto mx-auto">
                        <a href="#" class="stretched-link btn-link text-white">گردشگری</a>
                    </h5>
                </div>
            </div>
        </div>
        <!-- Category item -->
        <div>
            <div class="card card-overlay-bottom card-img-scale">
                <img class="card-img" src="<?php echo SHW_URL . '/assets/images/blog/1by1/thumb/02.jpg'?>" alt="card image">
                <div class="card-img-overlay d-flex px-3 px-sm-5">
                    <h5 class="mt-auto mx-auto">
                        <a href="#" class="stretched-link btn-link text-white">اقتصاد</a>
                    </h5>
                </div>
            </div>
        </div>
        <!-- Category item -->
        <div>
            <div class="card card-overlay-bottom card-img-scale">
                <img class="card-img" src="<?php echo SHW_URL . '/assets/images/blog/1by1/thumb/03.jpg'?>" alt="card image">
                <div class="card-img-overlay d-flex px-3 px-sm-5">
                    <h5 class="mt-auto mx-auto">
                        <a href="#" class="stretched-link btn-link text-white">بین الملل</a>
                    </h5>
                </div>
            </div>
        </div>
        <!-- Category item -->
        <div>
            <div class="card card-overlay-bottom card-img-scale">
                <img class="card-img" src="<?php echo SHW_URL . '/assets/images/blog/1by1/thumb/04.jpg'?>" alt="card image">
                <div class="card-img-overlay d-flex px-3 px-sm-5">
                    <h5 class="mt-auto mx-auto">
                        <a href="#" class="stretched-link btn-link text-white">ورزش</a>
                    </h5>
                </div>
            </div>
        </div>
        <!-- Category item -->
        <div>
            <div class="card card-overlay-bottom card-img-scale">
                <img class="card-img" src="<?php echo SHW_URL . '/assets/images/blog/1by1/thumb/05.jpg'?>" alt="card image">
                <div class="card-img-overlay d-flex px-3 px-sm-5">
                    <h5 class="mt-auto mx-auto">
                        <a href="#" class="stretched-link btn-link text-white">رسانه</a>
                    </h5>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>