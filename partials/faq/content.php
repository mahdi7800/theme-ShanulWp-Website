<?php $set_index_website = get_option('_shw_set_index_website');
if ($set_index_website) :
    switch($set_index_website):
        case 1:?>
            <?php get_template_part('partials/nav/menu','menu'); ?>
            <?php get_template_part('partials/layout/start-layout','start-layout'); ?>
            <?php get_template_part('partials/faq/title','title'); ?>
            <?php get_template_part('partials/faq/main-content','main-content'); ?>
            <?php get_template_part('partials/layout/end-layout','end-layout'); ?>
            <?php  break; ?>
        <?php case 2 : ?>
        <?php
        $admin = current_user_can('administrator');
         if ($admin) : ?>
             <div class="alert py-2 m-0 border-0 rounded-0 alert-dismissible fade show text-center overflow-hidden"
                  role="alert"
                  style="background:linear-gradient(135deg,#0f172a,#1e293b);">

                 <figure class="position-absolute top-50 start-50 translate-middle opacity-25">
                     <!-- SVG -->
                 </figure>

                 <div class="position-relative d-flex align-items-center justify-content-center gap-2">
                     <i class="bi bi-tools text-warning"></i>
                     <span class="text-white">
  کاربران در حال مشاهده صفحه تعمیرات هستند و فقط مدیران به سایت دسترسی دارند.
                    </span>
                 </div>

                 <button type="button"
                         class="btn-close btn-close-white opacity-75 p-3"
                         data-bs-dismiss="alert"
                         aria-label="Close">
                 </button>

             </div>
             <?php get_template_part('partials/nav/menu','menu'); ?>
             <?php get_template_part('partials/layout/start-layout','start-layout'); ?>
             <?php get_template_part('partials/faq/title','title'); ?>
             <?php get_template_part('partials/faq/main-content','main-content'); ?>
             <?php get_template_part('partials/layout/end-layout','end-layout'); ?>
         <?php else : ?>
            <?php get_template_part('partials/index/start-layout','start-layout'); ?>
            <?php get_template_part('partials/offline/content','content');         ?>
           <?php get_template_part('partials/index/end-layout','end-layout');     ?>
          <?php endif; ?>
        <?php break;
    endswitch;
endif; ?>