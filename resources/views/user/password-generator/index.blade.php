@extends('user.layouts.front')
@section('title', 'Activity Log')

@section('content')
    <div class="wrapper flex grow flex-col">
        <main class="grow content pt-5" id="content" role="content">
            <!-- begin: container -->
            <div class="container-fixed">
                <div class="flex flex-nowrap items-center lg:items-end justify-between dark:border-b-coal-100 gap-6">
                    <div class="grid">
                        <div class="scrollable-x-auto">
                            <div class="menu gap-3" data-menu="true">
                                <div class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary" data-menu-item-placement="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click">
                                    <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                                        <div class="text-2xl text-gray-900">
                                            <div class="font-medium">Password Generator</div>
                                            <div class="text-gray-600 text-lg">Central Hub for Generation of you Unique Password</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: container -->
            <div class="container-fixed">
                <div class="flex grow gap-5 lg:gap-7.5">
                    <div class="flex flex-col items-stretch grow gap-5 lg:gap-7.5">
                        <div class="card pb-2.5">
                            <div class="card-header" id="change_name">
                                <h3 class="card-title">
                                    Advanced Generator
                                </h3>
                            </div>
                            <form>
                                <div class="card-body gap-5">
                                    <label class="input input-lg-big max-w-[700px] max-h-[100px]">
                                        <div class="font-normal text-xl text-center text-gray-700 w-full" id="generated-password">p2AUJV!QA1ux7Cs*</div>
                                    </label>
                                </div>
                                <div class="pb-7.5">
                                    <div class="text-sm px-7 text-gray-700 pb-3.5">
                                        <b>General Settings</b>
                                        <div class="text-gray-500">Set up your general settings for the password.</div>
                                    </div>
                                    <div class="flex-col px-7 w-full">
                                        <div class="flex items-stretch gap-3.5">
                                            <div class="min-w-72">
                                                <div class="flex-col items-baseline flex-wrap lg:flex-nowrap gap-3.5">
                                                    <label class="form-label-big max-w-64 pb-1.5 font-bold">
                                                        Length
                                                    </label>
                                                    <input class="input" name="email" placeholder="Enter Length" type="text" value="15" id="pass-length"/>
                                                </div>
                                            </div>
                                            <div class="min-w-72">
                                                <div class="flex-col items-baseline flex-wrap lg:flex-nowrap gap-3.5">
                                                    <label class="form-label-big max-w-64 pb-1.5 font-bold">
                                                        Minimum password length
                                                    </label>
                                                    <input class="input" disabled="disabled" name="email" placeholder="Enter Length" type="text" value="15" id="min-pass-length"/>
                                                </div>
                                            </div>
                                            <div class="min-w-72">
                                                <div class="flex-col items-baseline flex-wrap lg:flex-nowrap gap-3.5">
                                                    <label class="form-label-big max-w-64 pb-1.5 font-bold">
                                                        Minimum numbers
                                                    </label>
                                                    <input class="input" name="email" placeholder="Enter Length" type="text" value="15" id="pass-min-num"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="max-w-72 pt-3.5">
                                            <div class="flex-col items-baseline flex-wrap lg:flex-nowrap gap-3.5">
                                                <label class="form-label-big max-w-64 pb-1.5 font-bold">
                                                    Minimum specials
                                                </label>
                                                <input class="input" name="email" placeholder="Enter Length" type="text" value="2" id="pass-min-spec"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gap-7 pt-3.5 pb-2">
                                    <div class="text-sm px-7 text-gray-700 gap-7 pb-3.5">
                                        <b>Options</b>
                                        <div class="text-gray-500">Choose specific options for your password</div>
                                    </div>
                                    <div class="flex flex-col items-start gap-2 px-7">
                                        <label class="form-label flex items-center gap-2.5 text-gray-800">
                                            <input class="checkbox" name="check" type="checkbox" value="1" id="include-upper"/>
                                            A-Z
                                        </label>
                                        <label class="form-label flex items-center gap-2.5 text-gray-800">
                                            <input class="checkbox" name="check" type="checkbox" value="1" id="include-lower"/>
                                            a-z
                                        </label>
                                        <label class="form-label flex items-center gap-2.5 text-gray-800">
                                            <input checked="" class="checkbox" name="check" type="checkbox" value="1" id="include-numbers"/>
                                            0-9
                                        </label>
                                        <label class="form-label flex items-center gap-2.5 text-gray-800">
                                            <input class="checkbox" name="check" type="checkbox" value="1" id="include-specials"/>
                                            !@#$%^&*
                                        </label>
                                    </div>
                                </div>
                                <div class="flex px-5 gap-4 justify-end pb-3.5">
                                    <button type="button" class="btn btn-primary font-normal" id="generate-password">
                                        Regenerate Password
                                    </button>
                                    <button class="btn btn-light text-center font-normal">Copy Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#pass-length').on('input', function() {
                $('#min-pass-length').val($(this).val());
            });
            $('#generate-password').on('click', function() {
                let length = $('#pass-length').val();
                let minNumbers = $('#pass-min-num').val();
                let minSpecials = $('#pass-min-spec').val();
                let includeUpper = $('#include-upper').is(':checked');
                let includeLower = $('#include-lower').is(':checked');
                let includeNumbers = $('#include-numbers').is(':checked');
                let includeSpecials = $('#include-specials').is(':checked');

                let upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                let lower = "abcdefghijklmnopqrstuvwxyz";
                let numbers = "0123456789";
                let specials = "!@#$%^&*";
                let allChars = "";
                let password = "";

                if (includeUpper) allChars += upper;
                if (includeLower) allChars += lower;
                if (includeNumbers) allChars += numbers;
                if (includeSpecials) allChars += specials;

                function getRandomChar(chars) {
                    return chars[Math.floor(Math.random() * chars.length)];
                }

                if (includeNumbers) {
                    for (let i = 0; i < minNumbers; i++) {
                        password += getRandomChar(numbers);
                    }
                }
                if (includeSpecials) {
                    for (let i = 0; i < minSpecials; i++) {
                        password += getRandomChar(specials);
                    }
                }

                while (password.length < length) {
                    if (allChars.length > 0) {
                        password += getRandomChar(allChars);
                    } else {
                        password += getRandomChar(numbers + specials);
                    }
                }

                $('#generated-password').html(password.split('').sort(function() {
                    return 0.5 - Math.random()
                }).join(''));
            });
        });
    </script>
@endsection
