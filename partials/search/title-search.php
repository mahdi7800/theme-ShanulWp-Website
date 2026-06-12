<!-- =======================
Inner intro START -->
<section class="pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto text-center py-5">
                <span>نتیجه ای جستجو</span>
                <h2 class="display-6 text-info"><?php echo $_GET['s']; ?></h2>
                <input class="search_value search-output" value="<?php echo $_GET['s'] ?>" type="hidden">
                <?php if ($wp_query->found_posts > 0 ): ?>
                    <span class="lead"><span class="text-info"><?php echo $wp_query->found_posts; ?></span> مطلب یافت شد </span>
                <?php else: ?>
                    <span class="lead text-danger">هیچ مطلبی یافت نشد</span>
                <?php endif; ?>
                <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-dots mb-0">
                        <?php echo Breadcrumb::get_breadcrumb(); ?>
                    </ol>
                </nav>
                <!-- Search -->
                <div class="row">
                    <div class="col-sm-8 col-md-6 col-lg-5 mx-auto">
                        <form class="input-group mt-4" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                            <input name="s" class="form-control form-control-lg border-success" type="search" placeholder="جستجو..." aria-label="Search">
                            <button class="btn btn-success btn-lg m-0" type="submit">
                                <span class="d-none d-md-block">جستجو</span>
                                <i class="d-block d-md-none fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =======================
Inner intro END -->