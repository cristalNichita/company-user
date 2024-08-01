<!DOCTYPE html>
<html>

<head>
    <title>Generate Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="//fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <style type="text/css">
        a:hover {
            text-decoration: underline !important;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #000000; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:30px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <img style="width: 150px" src="{{ url('front-new/images/logo.webp') }}" title="logo"
                                alt="logo">
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:left;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <span
                                            style="color:#1e1e2d; font-weight:500; margin:0;font-size:16px;font-family:'Rubik',sans-serif; display: block;">
                                            Hello
                                            <b>{{ $userDetail->userName ? $userDetail->userName : "User" }}</b>,</span>

                                        <br />
                                        <br />
                                        <span
                                            style="color:#1e1e2d; font-weight:500; margin:0;font-size:16px;font-family:'Rubik',sans-serif;display: block;">Your
                                            account has been successfully created.</span>
                                        <br />
                                        <br />
                                        <span
                                            style="color:#1e1e2d; font-weight:500; margin:0;font-size:16px;font-family:'Rubik',sans-serif; display: block;">
                                            We’re super excited to have you with us on the
                                            <b>{{ config('app.name') }}</b>.<br /><br /> Please click to accept request
                                            for further process.</span>
                                        <br />
                                        <a href="{{ url('/').'?userId='.$userDetail->id }}" target="__blank"
                                            style="background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(138, 219, 12, 1); text-decoration: none !important; font-weight: 500; margin-top: 35px; color: rgba(255, 255, 255, 1); text-transform: uppercase; font-size: 14px; padding: 10px 24px; display: inline-block; border-radius: 50px">Accept
                                            Request</a>
                                        <br />
                                        <br />
                                        <br />
                                        <span>Kindest Regards,<br>
                                            {{ config('app.name') }}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>

                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:#FFF; line-height:18px; margin:0 0 0;">
                                &copy; Copyright {{ date('Y') }}. <strong>{{ config('app.name') }}</strong> All
                                Rights Reserved.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>
