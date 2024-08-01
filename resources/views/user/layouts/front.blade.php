<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.common.head')
    <style>
        .loader {
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.20);
            backdrop-filter: blur(10px);
            z-index: 99999;
        }

        .loader-modal {
            border-radius: 20px;
            border: 1px solid #A1FF00;
            background: #0F0F0F;
            padding: 25px;
            width: 100%;
            max-width: 768px;
            margin: 10px;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
        }

        .loader-modal p {
            font-size: 20px;
            font-weight: 400;
            color: #A1FF00;
            margin-top: 20px;
            display: block;
            font-family: Poppins;
        }

        .loader-modal span {
            height: 5px;
            width: 5px;
            margin-right: 5px;
            border-radius: 50%;
            background-color: #A1FF00;
            animation: loading 1s linear infinite;
            display: inline-block;
        }

        /* Creating the loading animation*/
        @keyframes loading {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(15px);
            }

            50% {
                transform: translateX(15px);
            }

            100% {
                transform: translateX(0);
            }

        }

        .loader-modal span:nth-child(1) {
            animation-delay: 0.1s;
        }

        .loader-modal span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .loader-modal span:nth-child(3) {
            animation-delay: 0.3s;
        }
    </style>
</head>

<body class="flex h-full demo1 sidebar-fixed header-fixed">
    <div class="flex grow">
        <div class="loader" style="display: none;">
            <div class="loader-modal">
                <img src="{{ asset('admin-assets/images/loader-img.png') }}" alt="" width="110" height="110" />
                <p>
                    Loading
                    <span></span>
                    <span></span>
                    <span></span>
                </p>
            </div>
        </div>
        @include('user.common.side-bar')
        @include('user.common.header')
        @yield('content')
        @include('user.common.footer')
    </div>
</body>

</html>
