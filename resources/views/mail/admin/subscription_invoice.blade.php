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
                Your Product Detail's.</h1>
            <span
                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
            <table cellspacing="2" border="1"
                style="width: 100%;border: 1px solid #000;border-collapse: collapse; margin-top: 8%;">
                <tr>
                    <th colspan="2" style="background: #9e9e9e47; padding:5px;"><u>Product Details</u></th>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Product Name :</th>
                    <td style="text-align: center;">{{ $product->productName ?? "-" }}</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Product Price :</th>
                    <td style="text-align: center;">{{config('constant.STRIPE_PAYMENT.STRIPE_CURRENCY_SYMBOL')}} {{
                        $product->productPrice ?? "-" }}</td>
                </tr>

                <tr>
                    <th style="padding:5px; width: 30%">Payment Type :</th>
                    <td style="text-align: center;">{{ $product->paymentType ?? "-" }}</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Payment Duration :</th>
                    <td style="text-align: center;">{{ $product->recuringDurationMonths ?? "-" }} Months</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Hardware Plan Name :</th>
                    <td style="text-align: center;">{{ $hardwarePlan->planName ?? "-" }}</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">SoftWare Plan Name :</th>
                    <td style="text-align: center;">{{ $softwarePlan->planName ?? "-" }}</td>
                </tr>
                <tr>
                    <th style="padding:5px; width: 30%">Employee Strength :</th>
                    <td style="text-align: center;">{{ $product->employeeStrength ?? "-" }}</td>
                </tr>

            </table>

            <a href="{{ $invoiceLink }}"
                style="background:#8adb0c; text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Download
                Invoice </a>
        </td>
    </tr>
    <tr>
        <td style="height:40px;">&nbsp;</td>
    </tr>
</table>
@endsection
