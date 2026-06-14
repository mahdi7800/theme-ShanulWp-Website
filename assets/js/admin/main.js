document.addEventListener('DOMContentLoaded', function () {
    // Edit Slider Modal
    const editSliderButtons = document.querySelectorAll('.edit-slider-btn');
    editSliderButtons.forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('edit_id').value = this.dataset.id;
            document.getElementById('edit_tns_images').value = this.dataset.pImage;
            document.getElementById('edit_tns_top_title').value = this.dataset.topTitle;
            document.getElementById('edit_tns_main_title').value = this.dataset.mainTitle;
            document.getElementById('edit_tns_sub_title').value = this.dataset.subTitle;
            document.getElementById('edit_tns_link').value = this.dataset.pThumbnail;
        });
    });

    // Edit Banner Modal (if you use banners too)
    const editBannerButtons = document.querySelectorAll('.edit-banner-btn');
    editBannerButtons.forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('edit_id').value = this.dataset.id;
            document.getElementById('edit_image').value = this.dataset.image;
            document.getElementById('edit_title').value = this.dataset.title;
            document.getElementById('edit_link').value = this.dataset.link;
        });
    });
    // Edit FAQ Modal
    document.querySelectorAll('.edit-faq-btn').forEach(button => {
        button.addEventListener('click', function () {
            // مقادیر رو ست کن
            document.getElementById('edit_id').value = this.dataset.id || '';
            document.getElementById('faq-question-update').value = this.dataset.faqQuestion || '';
            document.getElementById('faq-answer-update').value = this.dataset.faqAnswer || '';
            document.getElementById('edit_faq_header').value = this.dataset.faqId || '';
        });
    });

});