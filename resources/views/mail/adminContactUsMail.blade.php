@extends('mail.layout.index')
@section('title')
<title>Contact Us</title>
@endsection
@section('content')
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
    style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
    <tr>
        <td style="height:40px;">&nbsp;</td>
    </tr>
    <tr>
        <td style="padding:0 35px;">
            <h3> Hello Admin,</h3>
            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
                Contact us request.</h1>
            <span
                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>

            <table cellspacing="2" border="1"
                style="width: 100%;border: 1px solid #000;border-collapse: collapse; margin-top: 8%;">
                <tr>
                    <th colspan="2" style="background: #9e9e9e47; padding:5px;"><u>User Details</u></th>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">User Name :</th>
                    <td style="text-align: center;">{{ $userDetail->yourName ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Company Name :</th>
                    <td style="text-align: center;">{{ $userDetail->companyName ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Company Url :</th>
                    <td style="text-align: center;">{{ $userDetail->companyUrl ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Email :</th>
                    <td style="text-align: center;">{{ $userDetail->email ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Contact Number :</th>
                    <td style="text-align: center;">{{ $userDetail->contactNumber ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Subject :</th>
                    <td style="text-align: center;">{{ $userDetail->subject ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Description :</th>
                    <td style="text-align: center;">{{ $userDetail->description ?? '-' }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="height:40px;">&nbsp;</td>
    </tr>
</table>
@endsection
