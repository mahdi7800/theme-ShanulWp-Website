<!-- =======================
Sticky post START -->
<?php $next_post =  get_previous_post(); ?>
<?php if (!empty($next_post)) : ?>

<div class="sticky-post bg-light border p-4 mb-5 text-sm-end rounded d-none d-xxl-block">
    <div class="d-flex align-items-center">
        <!-- image -->
        <div class="col-4 d-none d-md-block">
            <?php echo shw_post_thumbnail(); ?>
        </div>
        <!-- Title -->
        <div class="ms-3 text-start">
            <span>خبر بعدی<i class="bi bi-arrow-right ms-3 rtl-flip"></i></span>
            <h6 class="m-0"> <a href="<?php echo get_the_permalink(); ?>" class="stretched-link btn-link text-reset"><?php the_title(); ?></a></h6>
        </div>
    </div>
</div>
<!-- =======================
Sticky post END -->
<?php endif; ?>