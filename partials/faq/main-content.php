

<div class="page-content">

    <div class="container">
        <?php get_template_part('loop/faq/main-content-loop','main-content-loop'); ?>
    </div><!-- End .container -->

</div><!-- End .page-content -->


<div class="container">
    <div class="row">
        <div class="rounded-4 p-5 my-5 position-relative overflow-hidden"
             style="background: linear-gradient(135deg, #334155 0%, #1e293b 100%);">

            <div class="position-relative z-index-1">
                <div class="row align-items-center justify-content-between text-center text-md-start g-4">
                    <div class="col-md-8">
                        <h3 class="mb-2 text-white">
                            <i class="bi bi-chat-dots-fill me-2"></i>
                            اگر سوالات بیشتری دارید...
                        </h3>
                        <p class="text-white-50 mb-0">
                            تیم پشتیبانی ما ۲۴ ساعته آماده پاسخگویی به سوالات شماست.
                        </p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="btn btn-light rounded-pill">
                            <i class="bi bi-telephone-fill me-2 text-primary"></i>
                            تماس با ما
                            <i class="bi bi-arrow-left ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>