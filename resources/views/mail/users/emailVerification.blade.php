<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Validation</title>
</head>

<body
    style="padding: 20px; margin: 0; background-color: #000; color: #fff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center; font-size: 18px;">
    <div style="text-align: center; margin-bottom: 25px;">
        <img src="{{ url('front-new/images/logo.webp') }}" alt="logo">
    </div>
    <div style="text-align: center;">
        <img src="{{ url('assets/img/forget-input.png') }}" alt="logo">
    </div>
    <h1 style="text-align: center; font-weight: 700; color: #fff; text-transform: uppercase;">Verify Email</h1>
    <p style="text-align: center; margin-bottom: 20px;">Hi ,User<br> We're excited to have you get started. First, you
        need to confirm your account. Just press the button below.</p>
    <a href="{{ route('verifyEmail', ['url' => $url]) }}"
        style="text-align: center; padding: 10px 15px; margin: 25px auto; width: 190px; display: block; background-color: #A1FF00; color: #000; text-decoration: none; font-weight: 700;">Click
        Here</a>
    <p style="text-align: center; margin: 20px 0;">If you have any questions, please contact admin, we always happy to
        help out.</p>
    @if (!empty($password))
    <p style="text-align: center; margin: 20px 0;">Your password is {{ $password }}.</p>
    @endif
    <p style="text-align: center;">Thanks for using <a href="#" style="color: #A1FF00; text-decoration: none;">{{
            config('app.name') }}</a>. Stay tuned!</p>
</body>

</html>
