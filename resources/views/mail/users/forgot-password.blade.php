<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
</head>

<body
    style="padding: 20px; margin: 0; background-color: #000; color: #fff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center; font-size: 18px;">
    <div style="text-align: center; margin-bottom: 25px; background-color: #000;">
        <img src="{{url('front-new/images/logo.webp')}}" alt="logo" style="max-width: 30%; padding:2%;">
    </div>
    <div style="text-align: center;">
        <img src="{{url('assets/img/main-character.png')}}" alt="logo">
    </div>
    <h1 style="text-align: center; font-weight: 700; color: #fff; text-transform: uppercase;">Forgot your password?</h1>
    <p style="text-align: center; margin-bottom: 20px;">Hi ,User<br> It seems like you forgot your password for {{
        config('app.name') }}. If this is true, click the link below to reset your password.</p>
    <a href="{{$url}}"
        style="text-align: center; padding: 10px 15px; margin: 25px auto; width: 190px; display: block; background-color: #A1FF00; color: #000; text-decoration: none; font-weight: 700;">Click
        Here</a>
    <p style="text-align: center; margin: 20px 0;">If you did not forget your password, please disregard this email.</p>
    <p style="text-align: center; background-color: black; color: #fff; padding: 2%;">Thanks for using <a
            href="{{route('home')}}" style="color: #A1FF00; text-decoration: none;">{{ config('app.name') }}</a>. Stay
        tuned!</p>
</body>

</html>
