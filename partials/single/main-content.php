<div class="col-lg-9 mb-5">
    <?php $tv = get_post_meta(get_the_ID(), '_type_post_meta', true); ?>
    <?php if ($tv === 'tv') : ?>
        <?php get_template_part('partials/single/_main-contetnt-video', '_main-contetnt-video'); ?>
    <?php endif; ?>
    <?php the_content(); ?>
    <?php get_template_part('partials/single/_main-content-tag','_main-content-tag'); ?>
    <?php if ($tv === 'tv' || $tv === 'article') : ?>
    <!-- Donation START -->
    <?php get_template_part('partials/single/_main-content-donation','_main-content-donation'); ?>
        <!-- Donation END -->
    <?php endif; ?>
    <!-- Next prev post START -->
    <?php get_template_part('partials/single/_main-content-system-poll', '_main-content-system-poll'); ?>
    <?php if ($tv === 'tv' || $tv === 'article') : ?>
    <?php get_template_part('partials/single/_main-content-related-post', '_main-content-related-post'); ?>
    <?php endif; ?>
    <!-- Comments START -->
    <?php get_template_part('partials/single/_main-content-comment', '_main-content-comment'); ?>
    <!-- Comments END -->
</div>
