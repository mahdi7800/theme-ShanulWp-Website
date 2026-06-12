<?php
$register_from_enable = get_option('_shw_settings_set_general')['register_from_enable'];
if ($register_from_enable === 'yes') :

add_shortcode( 'shw-signup', 'shw_signup_func' );

function shw_signup_func() : string{
    ob_start(); ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                    <div class="bg-primary bg-opacity-10 rounded p-4 p-sm-5">
                        <h2>ثبت نام در سایت </h2>
                        <!-- Form START -->
                        <?php if (get_option( '_shw_settings_set_general' )['register_from_sms_enable'] === 'yes'): ?>
                            <form class="phone-number-form">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputPhoneNumber1">شماره موبایلتان را وارد کنید</label>
                                    <input type="text" class="form-control phone-number-input" id="exampleInputPhoneNumber1" aria-describedby="phoneHelp" placeholder="شماره موبایل...">
                                </div>
                                <!-- Button -->
                                <div class="row align-items-center">
                                    <div class="col-sm-12 d-grid gap-2">
                                        <button type="submit" class="btn btn-success">ارسال کد</button>
                                    </div>
                                </div>
                            </form>
                            <form class="send-verify-code">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputVerificationCode1">کد امنیتی خود را وارد کنید!</label>
                                    <input type="text" class="form-control verification-code-input" id="exampleInputVerificationCode1" aria-describedby="codeHelp" placeholder="کد امنیتی...">
                                </div>
                                <!-- Button -->
                                <div class="row align-items-center">
                                    <div class="col-sm-12 d-grid gap-2">
                                        <button type="submit" class="btn btn-success">ادامه</button>
                                    </div>
                                </div>
                            </form>
                            <form class="mt-4 register-form">
                                <input type="hidden" class="input-number-phone-hidden" name="phone_number">                        <!-- FullName -->
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputFullName1">نام و نام خانوادگی</label>
                                    <input type="text" class="form-control full-name" id="exampleInputFullName1" aria-describedby="FullNameHelp" placeholder="نام و نام خانوادگی">
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">پست الکترونیکی</label>
                                    <input type="email" class="form-control email-register" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ایمیل">
                                </div>
                                <!-- Password -->
                                <div class="container">
                                    <div class="row align-items-end">
                                        <div class="mb-3 col-9">
                                            <label class="form-label" for="exampleInputPassword1">رمز عبور</label>
                                            <input type="text" class="form-control password-register" id="exampleInputPassword1" placeholder="*********">
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-danger-soft" style="margin-bottom: 0.95rem;" id="generatePasswordBtn">تولید رمز عبور</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success">ثبت نام</button>
                                    </div>
                                    <div class="col-sm-8 text-sm-end">
                                        <span>آیا قبلا ثبت نام کرده اید؟ <a href="<?php echo site_url('/signing'); ?>"><u>ورود</u></a></span>
                                    </div>
                                </div>
                            </form>
                        <?php else: ?>
                            <form class="mt-4 register-form-deactivate-sms">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputFullName1">نام و نام خانوادگی</label>
                                    <input type="text" class="form-control full-name" id="exampleInputFullName1" aria-describedby="FullNameHelp" placeholder="نام و نام خانوادگی">
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">پست الکترونیکی</label>
                                    <input type="email" class="form-control email-register" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ایمیل">
                                </div>
                                <!-- Password -->
                                <div class="container">
                                    <div class="row align-items-end">
                                        <div class="mb-3 col-9">
                                            <label class="form-label" for="exampleInputPassword1">رمز عبور</label>
                                            <input type="text" class="form-control password-register" id="exampleInputPassword1" placeholder="*********">
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-danger-soft" style="margin-bottom: 0.95rem;" id="generatePasswordBtn">تولید رمز عبور</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success">ثبت نام</button>
                                    </div>
                                    <div class="col-sm-8 text-sm-end">
                                        <span>آیا قبلا ثبت نام کرده اید؟ <a href="<?php echo site_url('/signing'); ?>"><u>ورود</u></a></span>
                                    </div>
                                </div>
                            </form>
                         <?php endif; ?>
                        <!-- Form END -->
                     </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
 }
 endif;
