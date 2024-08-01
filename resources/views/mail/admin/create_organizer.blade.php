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
            <h3> Dear {{ $fullName }},</h3>
            <span
                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
            <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                I hope this message finds you well. As part of our ongoing efforts to enhance the security measures
                within
                our organization, we are pleased to inform you that you have been assigned a Hardware Security Module
                (HSM)
                device.
            </p>

            <h2>HSM Details</h2>

            <h4>HSM Name : {{ $hsmsTool->name }}</h4>
            <h4>MAC ID : {{ $hsmsTool->macId }}</h4>
            <h4>Location : {{ $hsmsTool->location }}</h4>
            <h4>Storage : {{ $storage }}</h4>

            @if ($hsmCount == 1)
            <span
                style="color:#1e1e2d; font-weight:500; margin:0;font-size:16px;font-family:'Rubik',sans-serif; display: block;">
                We’re super excited to have you with us on the
                <b>{{ config('app.name') }}</b>.<br /><br /> Please click to accept request for further
                process.</span>
            <br />

            <a href="{{ url('/') . '?userId=' . $user->id }}" target="__blank"
                style="background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(138, 219, 12, 1); text-decoration: none !important; font-weight: 500; margin-top: 35px; color: rgba(255, 255, 255, 1); text-transform: uppercase; font-size: 14px; padding: 10px 24px; display: inline-block; border-radius: 50px">Register
                Account</a>
            @endif

        </td>
    </tr>
    <tr>
        <td style="height:40px;">&nbsp;</td>
    </tr>
</table>
@endsection
