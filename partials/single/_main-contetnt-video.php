<div class="mt-2 mb-4">
    <!-- HTML video START -->
    <div class="player-wrapper rounded overflow-hidden">
        <?php
        global $post;
        $link = get_post_meta($post->ID, '_tv_link_video', true);
        echO($link);
        ?>
    </div>
    <!-- HTML video END -->
</div>