<!-- =======================
Main content START -->
<section class="position-relative pt-0">
    <div class="container" data-sticky-container>
        <div class="row">
            <!-- Main Post START -->
            <div class="col-lg-9">
                <?php get_template_part('loop/category/main-content-loop','main-content-loop'); ?>
            </div>
            <!-- Main Post END -->

            <!-- Sidebar START -->
            <div class="col-lg-3 mt-5 mt-lg-0">
                <div data-sticky data-margin-top="80" data-sticky-for="767">
                    <!-- Trending topics widget START -->

                    <!-- Trending topics widget END -->

                    <div class="row">
                        <!-- Recent post widget START -->
                        <?php get_template_part('partials/single/_sidebar-recent-post', '_sidebar-recent-post'); ?>
                        <!-- Recent post widget END -->
                        <?php get_template_part('partials/single/_sidebar-newsletter', '_sidebar-newsletter'); ?>
                        <!-- ADV widget START -->
                        <?php get_template_part('partials/category/_sidebar-category-adv','_sidebar-category-adv'); ?>
                        <!-- ADV widget END -->
                    </div>
                </div>
            </div>

            <!-- Sidebar END -->
        </div> <!-- Row end -->
    </div>
</section>
<!-- =======================
Main content END -->