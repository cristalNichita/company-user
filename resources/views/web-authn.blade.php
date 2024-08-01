<!DOCTYPE html>
<html>

<head>
    <title>PHP WebAuthn Demo</title>
    <script type="text/javascript" src="{{ url('assets/js/web-authn-helper.js') }}"></script>
    <script>
        var APP_URL = "{{ env('APP_URL') }}";
    </script>
</head>

<body>
    <h1>PHP WebAuthn Demo {{ env('APP_URL') }}</h1>
    <button onclick="register.a()">Register</button>
    <button onclick="validate.a()">Validate</button>
</body>

</html>
