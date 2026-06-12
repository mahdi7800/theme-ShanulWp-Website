<?php add_action('wp_ajax_nopriv_shw_random_password', 'shw_random_password');

function shw_random_password() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'])){
        die('access dined');
    }
     $randompassword = RandomPassword::generateRandomString();
    if ($randompassword){
        wp_send_json(['success' => true,'password' => $randompassword ,'message'=>'رمز عبور با موفقیت تولید شد']);
    }else{
        wp_send_json(['error' => true,'message'=>'خطا در تولید رمز عبور']);
    }
}