<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // اطلاعات فرم را دریافت کنید
    $birthdate = $_POST['birthdate'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $comments = $_POST['comments'];
    $gender = $_POST['gender'];

    // آدرس ایمیل مقصد
    $to = "raminrodbari1382@gmail.com";

    // موضوع ایمیل
    $subject = "فرم ثبت نام جدید";

    // بدنه ایمیل
    $message = "
    <html>
    <head>
    <title>فرم ثبت نام جدید</title>
    </head>
    <body>
    <p>اطلاعات فرم ثبت نام:</p>
    <table>
    <tr>
    <th>تاریخ تولد</th><td>$birthdate</td>
    </tr>
    <tr>
    <th>نام کاربری</th><td>$username</td>
    </tr>
    <tr>
    <th>کلمه عبور</th><td>$password</td>
    </tr>
    <tr>
    <th>توضیحات</th><td>$comments</td>
    </tr>
    <tr>
    <th>جنسیت</th><td>$gender</td>
    </tr>
    </table>
    </body>
    </html>
    ";

    // تنظیمات هدر ایمیل
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@example.com" . "\r\n"; // آدرس ایمیل فرستنده

    // ارسال ایمیل
    if (mail($to, $subject, $message, $headers)) {
        echo "ایمیل با موفقیت ارسال شد.";
    } else {
        echo "خطا در ارسال ایمیل.";
    }
}
?
