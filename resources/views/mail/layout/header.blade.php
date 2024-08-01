<table class="w3-ban" width="100%" height="150" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td bgcolor="#000">
            <table width="620" border="0" cellspacing="0" cellpadding="0" align="center" class="scale">
                <tr>
                    <td>
                        <table width="540" border="0" cellspacing="0" cellpadding="0" align="center" class="scale">
                            <tr>
                                <center>
                                    <a href="{{route('home')}}">

                                        <img src="{{ url('front-new/images/logo.webp') }}" alt=""
                                            style="width:200px;height:50px;">
                                    </a>
                                </center>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td bgcolor="#04d791"
            style="background: url({{ asset('admin-assets/') }}) center center / cover no-repeat, #f3f3f3;">
            <table width="620" border="0" cellspacing="0" cellpadding="0" align="center" class="scale section">
                @yield('header')
            </table>
        </td>
    </tr>
</table>
