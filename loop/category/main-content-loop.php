<?php
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$category_id = get_queried_object_id();
$taxonomy_obj = get_queried_object();


if (is_category()) {
    $taxonomy = 'category';
    $term_id = $taxonomy_obj->term_id;
    $term_slug = $taxonomy_obj->slug;

    $args = [
        'post_type' => 'post',
        'posts_per_page' => 1,
        'cat' => $term_id,
        'paged' => $paged,
    ];
}
else {
$args = [
    'post_type' => 'post',
    'posts_per_page' => 1,
    'cat' => $category_id,
    'paged' => $paged,
];}
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<!-- Card item START -->
<?php
    $categories = get_the_category();
    $cat_name = !empty($categories) ? $categories[0]->name : 'دسته‌بندی';
    $cat_link = !empty($categories) ? get_category_link($categories[0]->term_id) : '#';
    ?>

    <!-- Card item START -->
    <div class="card mb-4">
        <div class="row">
            <div class="col-md-5">
                <?php if (has_post_thumbnail()) : ?>
                    <img class="rounded-3 w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title_attribute(); ?>">
                <?php else : ?>
                    <img class="rounded-3 w-100" src="<?php echo SHW_URL . '/assets/images/blog/4by3/01.jpg'; ?>" alt="تصویر پیش‌فرض">
                <?php endif; ?>
                <!-- آیکون روی عکس -->
                <div class="position-absolute top-0 start-0 m-3">
                    <?php
                    $post_type = get_post_meta(get_the_ID(), '_type_post_meta', true);
                    if ($post_type) {
                        switch ($post_type) {
                            case 'article':
                                echo '<div class="icon-md bg-primary text-white fw-bold rounded-circle" title="نوشته"><i class="fas fa-file-alt"></i></div>';
                                break;
                            case 'tv':
                                echo '<div class="icon-md bg-danger text-white fw-bold rounded-circle" title="ویدئو"><i class="fas fa-video"></i></div>';
                                break;
                            case 'theme':
                                echo '<div class="icon-md bg-success text-white fw-bold rounded-circle" title="قالب"><i class="fas fa-palette"></i></div>';
                                break;
                            case 'plugin':
                                echo '<div class="icon-md bg-warning text-white fw-bold rounded-circle" title="افزونه"><i class="fas fa-plug"></i></div>';
                                break;
                            default:
                                echo '<div class="icon-md bg-secondary text-white fw-bold rounded-circle" title="پست"><i class="fas fa-file"></i></div>';
                        }
                    } else {
                        echo '<div class="icon-md bg-info text-white fw-bold rounded-circle" title="عمومی"><i class="fas fa-info"></i></div>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-7 mt-3 mt-md-0">
                <a href="<?php echo esc_url($cat_link); ?>" class="badge text-bg-danger mb-2">
                    <i class="fas fa-circle me-2 small fw-bold"></i><?php echo esc_html($cat_name); ?>
                </a>
                <h4>
                    <a href="<?php the_permalink(); ?>" class="btn-link stretched-link text-reset">
                        <?php the_title(); ?>
                    </a>
                </h4>
                <p><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></p>
                <!-- Card info -->
                <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                    <li class="nav-item">
                        <div class="nav-link">
                            <div class="d-flex align-items-center position-relative">
                                <div class="avatar avatar-xs">
                                    <?php echo get_avatar(get_the_author_meta('email'), 39, '', get_the_author(), ['class' => 'avatar-img rounded-circle']); ?>
                                </div>
                                <span class="ms-3">با
                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="stretched-link text-reset btn-link">
                                            <?php the_author(); ?>
                                        </a>
                                    </span>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"><?php echo get_the_date('j F، Y'); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 text-center mt-5">
        <nav class="mb-5 d-flex justify-content-center" aria-label="navigation">
            <?php echo Pagination::paginate($the_query,'list'); ?>
        </nav>
    </div>
<?php endwhile; ?>
<?php endif; ?>
