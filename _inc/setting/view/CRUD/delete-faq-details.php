<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['action']) && $_GET['action']=='delete_detail' && isset($_GET['id'])){
        $ID = intval($_GET['id']);
        global $wpdb;
        $table = $wpdb-> prefix .'tns_faq_detail';
        $where = ['ID'=>$ID];
        $where_format = ['%d'];
        $stmt = $wpdb->delete($table,$where ,$where_format);

        if($stmt !== false){
            $message = '<div class="notice notice-error is-dismissible"><p>سوال جواب مورد نظر حدف شد!</p></div>';
        }else{
            $message = '<div class="notice notice-error is-dismissible"><p>خطا در برقراری با دیتا بیس!!!</p></div>';
        }
    }
}