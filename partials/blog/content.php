<?php $set_index_website = get_option('_shw_set_index_website');
if ($set_index_website) :
    switch($set_index_website):
        case 1:?>
            <?php get_template_part('partials/nav/menu-blog','menu-blog'); ?>
            <?php get_template_part('partials/layout/start-layout','start-layout'); ?>
            <div class="alert alert-info has-text-align-center">در بروز رسانی هایی آیینده بخش بلاگ کامل میشود</div>
            <?php get_template_part('partials/blog/blog-section-1','blog-section-1'); ?>
            <?php get_template_part('partials/blog/blog-section-2','blog-section-2'); ?>
            <?php get_template_part('partials/blog/blog-section-3','blog-section-3'); ?>
            <?php get_template_part('partials/blog/blog-section-4','blog-section-4'); ?>
            <?php get_template_part('partials/blog/blog-section-5','blog-section-5'); ?>
            <?php get_template_part('partials/layout/end-layout','end-layout'); ?>
            <?php  break; ?>
        <?php case 2 : ?>
        <?php get_template_part('partials/index/start-layout','start-layout'); ?>
        <?php get_template_part('partials/offline/content','content');         ?>
        <?php get_template_part('partials/index/end-layout','end-layout');     ?>
        <?php break;
    endswitch;
endif; ?>