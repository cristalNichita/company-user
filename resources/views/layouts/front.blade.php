<!DOCTYPE html>
<html lang="en">

<head>
    @include('common.head')
</head>

<body onunload="deleteAllCookies()">
    <main> </main>
    <div> @include('common.header') </div>
    <div> @yield('content') </div>
    <div> @include('common.footer') </div>
</body>

</html>
