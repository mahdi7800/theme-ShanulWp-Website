<?php
$register_from_enable = get_option('_shw_settings_set_general')['register_from_enable'];
if ($register_from_enable === 'yes') :
add_shortcode( 'shw-password-recovery', 'shw_password_recovery' );

function shw_password_recovery() : string  {

    $html = '';
    $get_token = isset( $_GET['recovery_token'] ) && ! empty( $_GET['recovery_token'] );
    $html = '';
if ( $get_token ) :
    $token = '';
    $token = wp_tnw_find_recaver_token( $_GET['recovery_token'] );
    if ( $token ) :
        $html_token = '      
			<div class="mb-3">
				<label class="form-label" for="exampleInputPassword1">رمز عبور</label>
				<input type="password" class="form-control recover_new_password" id="exampleInputPassword1" placeholder="*********">
			</div>
			<div class="mb-3">
				<label class="form-label" for="exampleInputPassword2">تکرار رمز عبور</label>
				<input type="password" class="form-control recover_new_repeat_password" id="exampleInputPassword2" placeholder="*********">
			</div>
			<div class="row align-items-center">
				<div class="col-12 d-flex justify-content-center">
					<button type="submit" class="btn btn-success btn_change_password" id="btn_recaver_password">تغییر کلمه عبور </button>
					<input class="token_cr" type="hidden" value="' . $_GET['recovery_token'] . '">
				</div>
			</div>';
    else :
        $html_token = '<div class="alert alert-danger">لینک باز یابی کمه عبور  نا معتبر می باشد!!</div>';
    endif;
else:
    $html_token = '
			<div class="mb-3">
				<label class="form-label" for="exampleInputEmail1">پست الکترونیکی</label>
				<input type="text" class="form-control recover_email" id="exampleInputEmail1" placeholder="ایمیل...">
			</div>
			<div class="row align-items-center">
				<div class="col-12 d-flex justify-content-center">
					<button type="submit" class="btn btn-success btn_send_recaver_password"> ارسال لینک بازیابی کلمه عبور </button>
				</div>
			</div>';
endif;

 return $html = '
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                <div class="bg-primary bg-opacity-10 rounded p-4 p-sm-5">
                    <h2>فراموشی رمز عبور</h2>
                    <form class="mt-4">
                        ' . $html_token. '
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>';

 }
 endif;