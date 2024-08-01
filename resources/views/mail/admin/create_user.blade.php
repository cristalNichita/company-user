@extends('mail.layout.index')
@section('title')
<title>Product | Payment</title>
@endsection
@section('content')
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
    style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
    <tr>
        <td style="height:40px;">&nbsp;</td>
    </tr>
    <tr>
        <td style="padding:0 35px;">
            <h3> Hello {{ $fullName }},</h3>
            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
                Congrats, Your FlashX account been created.</h1>
            <span
                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
            <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                Here are your credentials for FlashX login.
            </p>
            <h2>Login Details</h2>

            <h4>Email Id : {{ $user->email }}</h4>
            <h4>Password : {{ $user->verificationToken }}</h4>
            @if ($licenceKey != Null)
            <h4 style="background:#8adb0c;color:#fff;"> Licence : {{ $licenceKey }}</h4>
            @endif
            <a href="{{ route('login') }}"
                style="background:#8adb0c; text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Login
            </a>
        </td>
    </tr>
    <tr>
        <td style="height:40px;">&nbsp;</td>
    </tr>
</table>
@endsection
