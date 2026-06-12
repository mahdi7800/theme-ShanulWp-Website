<?php

$args = [
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'category_name'  => 'tech',
    'post__not_in'   => array(get_queried_object_id()),
    'orderby'        => 'date',
    'order'          => 'DESC',
];
  $the_query = new WP_Query( $args );

  if ( $the_query->have_posts() ) :
      while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<!-- Recent post item -->
<div class="card mb-3">
    <div class="row g-3">
        <div class="col-4">
            <?php echo shw_post_thumbnail(); ?>
        </div>
        <div class="col-8">
            <h6><a href="<?php the_permalink(); ?>" class="btn-link stretched-link text-reset"><?php echo get_the_title(); ?></a></h6>
            <div class="small mt-1"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' پیش'; ?></div>
        </div>
    </div>
</div>
<!-- Recent post item -->
<?php endwhile; ?>
<?php else : ?>
<!-- Recent post item -->
<div class="card mb-3">
    <div class="row g-3">
        <div class="col-4">
            <img class="rounded" src="<?php echo SHW_URL . '/assets/images/blog/4by3/thumb/01.jpg';?>" alt="">
        </div>
        <div class="col-8">
            <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset">دسته بندی خود با نام tech ایجاد کرده و سپس پست خود را ایجاد کنید</a></h6>
            <div class="small mt-1">17 بهمن، 1400</div>
        </div>
    </div>
</div>
<!-- Recent post item -->
<div class="card mb-3">
    <div class="row g-3">
        <div class="col-4">
            <img class="rounded" src="<?php echo SHW_URL . '/assets/images/blog/4by3/thumb/02.jpg'?>" alt="">
        </div>
        <div class="col-8">
            <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset">دسته بندی خود با نام tech ایجاد کرده و سپس پست خود را ایجاد کنید</a></h6>
            <div class="small mt-1">4 مهر، 1400</div>
        </div>
    </div>
</div>
<!-- Recent post item -->
<div class="card mb-3">
    <div class="row g-3">
        <div class="col-4">
            <img class="rounded" src="<?php echo SHW_URL . '/assets/images/blog/4by3/thumb/03.jpg'?>" alt="">
        </div>
        <div class="col-8">
            <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset">دسته بندی خود با نام tech ایجاد کرده و سپس پست خود را ایجاد کنید</a></h6>
            <div class="small mt-1">30 تیر، 1400</div>
        </div>
    </div>
</div>
<!-- Recent post item -->
<div class="card mb-3">
    <div class="row g-3">
        <div class="col-4">
            <img class="rounded" src="<?php echo SHW_URL . '/assets/images/blog/4by3/thumb/04.jpg'?>" alt="">
        </div>
        <div class="col-8">
            <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset">دسته بندی خود با نام tech ایجاد کرده و سپس پست خود را ایجاد کنید‌</a></h6>
            <div class="small mt-1">29 دی 1400</div>
        </div>
    </div>
</div>
<?php endif; ?>