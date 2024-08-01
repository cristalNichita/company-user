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
                                            <b>{{ $userDetail->yourName ?? 'User' }}</b>,</span>

                                        <br />
                                        <br />
                                        <span
                                            style="color:#1e1e2d; font-weight:500; margin:0;font-size:16px;font-family:'Rubik',sans-serif;display: block;">We
                                            get your contact us request.</span>
                                        <br />
                                        <br />
                                        <span
                                            style="color:#1e1e2d; font-weight:500; margin:0;font-size:16px;font-family:'Rubik',sans-serif; display: block;">
                                            We’ll get back to you soon
                                            <b>{{ config('app.name') }}</b>.<br /><br /> Please click on this button for
                                            more information.</span>
                                        <br />
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
