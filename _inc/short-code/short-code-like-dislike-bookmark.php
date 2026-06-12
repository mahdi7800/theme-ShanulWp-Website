<?php
add_shortcode('shw-like-dislike-bookmark', 'shw_like_dislike_bookmark_function');

function shw_like_dislike_bookmark_function() : string {
ob_start(); ?>
    <!-- Review poll START -->
				<div class="bg-light border p-3 rounded d-sm-flex align-items-center justify-content-between text-center">
					<!-- Title -->
					<h5 class="m-0">آیا این پست برایتان مفید بود؟</h5>
					<small class="py-2 d-block"></small>
					<!-- Check buttons -->
                    <!-- دکمه لایک -->
                    <?php
                    $is_liked = shw_user_system_like_post(get_current_user_id(), get_the_ID());
                    $is_disliked = shw_user_system_dislike_post(get_current_user_id(), get_the_ID());
                    $is_bookmarked = shw_user_bookmark_product(get_current_user_id(), get_the_ID());
                    ?>
					<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="button"
                               class="btn-check like-post <?php echo $is_liked ? 'liked' : ''; ?>"
                               name="like-post"
                               id="like-post"
                               data-like-post-id="<?php echo get_the_ID(); ?>">

                        <label class="btn btn-sm mb-0 <?php echo $is_liked ? 'btn-primary active' : 'btn-outline-primary'; ?> ml-10"
                               for="like-post" id="like-post">
                            <i class="far fa-thumbs-up me-1"></i> بله
                        </label>

                        <!-- دکمه دیس‌لایک -->
                        <input type="button"
                               class="btn-check dislike-post <?php echo $is_disliked ? 'disliked' : ''; ?>"
                               name="dislike-post"
                               id="dislike-post"
                               data-dislike-post-id="<?php echo get_the_ID(); ?>">

                        <label class="btn btn-sm mb-0 <?php echo $is_disliked ? 'btn-danger active' : 'btn-outline-danger'; ?>  mr-10"
                               for="dislike-post">
                            خیر <i class="far fa-thumbs-down ms-1"></i>
                        </label>

                    </div>

                    <!-- دکمه بوکمارک -->
                    <input type="button"
                           class="btn-check bookmark-post <?php echo $is_bookmarked ? 'bookmarked' : ''; ?>"
                           id="bookmark"
                           data-post-id="<?php echo get_the_ID(); ?>">

                    <label class="btn btn-sm mb-0 <?php echo $is_bookmarked ? 'btn-warning active' : 'btn-outline-warning'; ?>"
                           for="bookmark">
                        <i class="far fa-bookmark me-1"></i> <?php echo $is_bookmarked ? 'ذخیره شده' : 'ذخیره'; ?>
                    </label>
				</div>
				<!-- Review poll END -->
<?php   return ob_get_clean();
}