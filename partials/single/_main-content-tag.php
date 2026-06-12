<!-- Tags and info START -->
<div class="d-md-flex justify-content-between text-center text-md-start my-4">
    <!-- Tag -->
    <ul class="list-inline mb-0">
        <?php
        $tags = get_the_tags();
        if ($tags):
            foreach ($tags as $tag): $tag_link = get_tag_link($tag->term_id)
                ?>
                <li class="list-inline-item">
                    <a class="btn btn-outline-light btn-sm" href="<?php echo $tag_link ?>"> # <?php echo $tag->name ?></a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <!-- Info -->
    <ul class="nav nav-divider align-items-center justify-content-center justify-content-md-end">
        <li class="nav-item"><i class="far fa-comment-alt me-1"></i>  دیدگاه :  <?php echo get_comments_number(); ?> </li>
        <li class="nav-item"><i class="far fa-eye me-1"></i><?php echo PostView::shw_get_post_view(get_the_ID()); ?> بازدید</li>
        <li class="nav-item"><i class="fa fa-search me-1"></i> <?php echo GoogleReferer::shw_get_google_referer(get_the_ID()) ; ?>  بازدید گوگل </li>
    </ul>
</div>
<!-- Tags and info END -->