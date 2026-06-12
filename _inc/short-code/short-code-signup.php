<?php
$register_from_enable = get_option('_shw_settings_set_general')['register_from_enable'];
if ($register_from_enable === 'yes') :
add_shortcode( 'shw-signing', 'shw_signing_func' );

function shw_signing_func() : string {

    ob_start(); ?>
    <section>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
				<div class="p-4 p-sm-5 bg-primary bg-opacity-10 rounded">
					<h2>ورود به حساب کاربری</h2>
					<!-- Form START -->
					<form class="mt-4 signup-form-technoavar">
						<!-- Email -->
						<div class="mb-3">
							<label class="form-label" for="exampleInputEmail1">پست الکترونیکی</label>
							<input type="email" class="form-control email-signup" id="exampleInputEmail1" placeholder="ایمیل">
						</div>
						<!-- Password -->
						<div class="mb-3">
							<label class="form-label" for="exampleInputPassword1">رمز عبور</label>
							<input type="password" class="form-control password-signup" id="exampleInputPassword1" placeholder="*********">
						</div>
                        <small id="emailHelp" class="form-text"><a href="<?php echo  home_url('/password-recovery/'); ?> "><strong class="forget_password  ">فراموشی رمز عبور</strong></a></small>

                        <!-- Checkbox -->
						<div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input remember_me-signup" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">مرا به خاطر بسپار</label>
                        </div>
                        <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                        <br/>
                        </div>
						<!-- Button -->
						<div class="row align-items-center mt-5">
							<div class="col-sm-4">
								<button type="submit" class="btn btn-success">ورود </button>
							</div>
							<div class="col-sm-8 text-sm-end">
								<span>آیا هنوز ثبت نام نکرده اید؟ <a href="<?php echo  site_url('/signup'); ?> "><u>ثبت نام</u></a></span>
							</div>
						</div>
					</form>
					<!-- Form END -->
				</div>
			</div>
		</div>
	</div>
    </section>;

<?php
    return ob_get_clean();
 }
endif;