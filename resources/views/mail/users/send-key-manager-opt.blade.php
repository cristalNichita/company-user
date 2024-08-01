<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Manager Security Code</title>
</head>

<body
    style="padding: 20px; margin: 0; background-color: #000; color: #fff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center; font-size: 18px;">
    <div style="text-align: center; margin-bottom: 25px;">
        <img src="{{url('front-new/images/logo.webp')}}" alt="logo" style="max-width: 100%;">
    </div>
    <div style="text-align: center;">
        <img src="{{url('assets/img/forget-input.png')}}" alt="logo" style="max-width: 100%;">
    </div>
    <p style="text-align: center; margin-bottom: 20px;">Hi,{{$userName}}<br> Thank you for being associated with {{
        config('app.name') }}.<br> Your Security Code for the access Key Manager module.<br /> Security Code is secret
        and can be used only once.<br /> Therefore, do not disclose this to anyone.</p>
    <h1
        style="text-align: center; font-weight: 700; color: #A1FF00; text-transform: uppercase; margin-top: 20px; margin-bottom: 20px;">
        {{$otp}}</h1>
    <p style="text-align: center; margin: 20px 0;">Contact admin support if you did not request for it.</p>
    <p style="text-align: center;">Thanks for using <a href="#" style="color: #A1FF00; text-decoration: none;">{{
            config('app.name') }}</a>. Stay tuned!</p>
</body>

</html>
