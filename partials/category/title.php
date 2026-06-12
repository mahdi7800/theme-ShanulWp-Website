<!-- =======================
Inner intro START -->
<section class="pt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border p-4 text-center rounded-3">
                    <h1><?php echo single_cat_title();?></h1>
                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-dots m-0">
                               <?php Breadcrumb::get_breadcrumb(); ?>
                        </ol>
                    </nav>
                    <div class="text-center position-relative">
                        <span class="badge text-bg-info fs-6"><?php echo $wp_query->found_posts; ?> خبر </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =======================
Inner intro END -->