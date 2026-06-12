<?php
class Tnw_MailLayout
{
    public static function tnw_contact_layout(string $full_name,string $email,string $title,string $message) :string
    {
        return $email_layout = '
    <div style="background-color: #efefef;border: 1px solid #eee;text-align: right">
    <p style="font-size: 19px">ارسال کنند ایمیل : '.$full_name.'</p>
    <p style="font-size: 19px">آدرس ایمیل : '. $email.'</p>
    <p style="font-size: 19px">'. $title .'</p>
    <p style="font-size: 16px">'. $message .'</p>
</div>
    ';
    }
}