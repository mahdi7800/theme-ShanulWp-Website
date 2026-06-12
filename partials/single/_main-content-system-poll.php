<?php
$wishlist_enable = get_option('_shw_settings_set_general')['wishlist_enable'];
 if ($wishlist_enable === 'yes') {
   echo  do_shortcode('[shw-like-dislike-bookmark]');
}
