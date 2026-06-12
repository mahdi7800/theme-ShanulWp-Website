<?php if (have_posts()) :
  while (have_posts()) : the_post(); ?>
<!-- About me -->
<div class="bg-light rounded p-3 p-md-4">
    <div class="d-flex mb-3">
        <!-- Avatar -->
        <a class="flex-shrink-0" href="#">
            <div class="avatar avatar-xl border border-4 border-danger rounded-circle">
                <?php $id_or_email = get_the_author_meta('email');
                echo  $avatar = get_avatar($id_or_email,'300','robohash',get_the_author(),['class'=>'avatar-img rounded-circle'])
                ?>
            </div>

        </a>
        <div class="flex-grow-1 ms-3">
            <span>سلام</span>
            <h3 class="mb-0"><?php echo get_the_author_meta('first_name'); ?></h3>
                <?php
                $role = get_the_author_meta('user_level');
                 if($role){
                     switch ($role){
                         case 10 ;
                             $role_web =  'مدیر';
                             break;
                         case 2 ;
                             $role_web = 'برنامه نویس';
                             break;
                         case 0 ;
                             $role_web = 'دبال کننده ';
                             break;
                         case 1 ;
                             $role_web = 'مشارکت کننده';
                             break;
                         case 7 ;
                             $role_web = 'ویرایشگر';
                             break;
                     }
                 } ?>
            <p><?php echo $role_web; ?>
                وب سایت شانول وردپرس
            </p>
        </div>
    </div>
    <?php if (empty(get_the_author_meta('description'))): ?>
        <p class="my-2 alert alert-info">لطفا توضیحات نویسنده را کامل کنید!!!</p>
    <?php else: ?>
        <p class="my-2"><?php echo get_the_author_meta('description'); ?></p>
    <?php endif; ?>
    <a href="<?php $author_id = get_the_author_meta('ID'); echo esc_url(get_author_posts_url($author_id)); ?>" class="btn btn-danger-soft btn-sm">مشاهده پست ها</a>
</div>
<?php endwhile;?>
<?php endif; ?>
