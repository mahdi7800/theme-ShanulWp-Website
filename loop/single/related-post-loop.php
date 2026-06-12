<?php

$id = get_queried_object_id();
$type_post = get_post_meta(get_the_ID(), '_type_post_meta', true);
$meta_value = '';
if ($type_post === 'article') {
    $meta_value = 'article';
} elseif ($type_post === 'tv') {
    $meta_value = 'tv';
}
$args = [
    'post_type' => 'post',
    'posts_per_page' => '3',
    'meta_key' => '_type_post_meta',
    'meta_value' => $meta_value,
    'order' => 'DESC',
    'post__not_in' => array($id)
];
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
        <!-- Card item START -->
        <div class="card">
            <!-- Card img -->
            <div class="position-relative">
                <?php echo shw_post_thumbnail(); ?>
                <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                    <!-- Card overlay Top -->
                    <div class="w-100 mb-auto d-flex justify-content-end">
                        <div class="text-end ms-auto">
                            <!-- Card format icon -->
                            <?php $posttype = get_post_meta(get_the_ID(), '_type_post_meta', true);
                                if ($posttype) {
                                    switch ($posttype) {
                                        case 'article': ?>
                                        <div class="icon-md bg-white bg-opacity-10 bg-blur text-white fw-bold rounded-circle" title=""><i class="fas fa-file"></i></div>
                                        <?php break;
                                        case 'tv': ?>
                                        <div class="icon-md bg-white bg-opacity-10 bg-blur text-white fw-bold rounded-circle" title=""><i class="fas fa-video"></i></div>
                                        <?php break;
                                    }
                                }
                            ?>



                        </div>
                    </div>
                    <!-- Card overlay bottom -->
                    <div class="w-100 mt-auto">
                      <?php
                      $category = get_the_category();
                         if ( ! empty( $category ) ) {
                             $cat_link = get_category_link( $category[0]->term_id );
                             echo '<a href="'.$cat_link.'" class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold">'.$category[0]->name.'</i></a>';
                         }?>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 pt-3">
                <h5 class="card-title">
                    <a href="<?php echo get_the_permalink(); ?>" class="btn-link text-reset">
                        <?php echo get_the_title(); ?>
                    </a>
                </h5>
            </div>
        </div>
        <!-- Card item END -->
<?php endwhile; ?>
<?php else : ?>
    <div class="alert alert-info">پست مرتبطی وجود ندارد</div>
<?php endif; ?>




