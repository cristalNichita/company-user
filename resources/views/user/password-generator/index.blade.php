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
                                            <div class="font-normal text-xl text-center text-gray-700 w-full">p2AUJV!QA1ux7Cs*</div>
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
                                                    <input class="input" name="email" placeholder="Enter Length" type="text" value="15"/>
                                                </div>
                                            </div>
                                            <div class="min-w-72">
                                                <div class="flex-col items-baseline flex-wrap lg:flex-nowrap gap-3.5">
                                                    <label class="form-label-big max-w-64 pb-1.5 font-bold">
                                                        Minimum password length
                                                    </label>
                                                    <input class="input" disabled="disabled" name="email" placeholder="Enter Length" type="text" value="15"/>
                                                </div>
                                            </div>
                                            <div class="min-w-72">
                                                <div class="flex-col items-baseline flex-wrap lg:flex-nowrap gap-3.5">
                                                    <label class="form-label-big max-w-64 pb-1.5 font-bold">
                                                        Minimum numbers
                                                    </label>
                                                    <input class="input" name="email" placeholder="Enter Length" type="text" value="15"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="max-w-72 pt-3.5">
                                            <div class="flex-col items-baseline flex-wrap lg:flex-nowrap gap-3.5">
                                                <label class="form-label-big max-w-64 pb-1.5 font-bold">
                                                    Minimum specials
                                                </label>
                                                <input class="input" name="email" placeholder="Enter Length" type="text" value="2"/>
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
                                            <input class="checkbox" name="check" type="checkbox" value="1"/>
                                            A-Z
                                        </label>
                                        <label class="form-label flex items-center gap-2.5 text-gray-800">
                                            <input class="checkbox" name="check" type="checkbox" value="1"/>
                                            a-z
                                        </label>
                                        <label class="form-label flex items-center gap-2.5 text-gray-800">
                                            <input checked="" class="checkbox" name="check" type="checkbox" value="1"/>
                                            0-9
                                        </label>
                                        <label class="form-label flex items-center gap-2.5 text-gray-800">
                                            <input class="checkbox" name="check" type="checkbox" value="1"/>
                                            !@#$%^&*
                                        </label>
                                    </div>
                                </div>
                                <div class="flex px-5 gap-4 justify-end pb-3.5">
                                    <button type="button" class="btn btn-primary choose-mfa-btn font-normal">
                                        Regenerate Password
                                    </button>
                                    <button class="btn btn-light text-center close-modal font-normal">Copy Password</button>
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
            function generatePassword(options) {
                const upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                const lowerCase = 'abcdefghijklmnopqrstuvwxyz';
                const numbers = '0123456789';
                const specials = '!@#$%^&*';

                let allChars = '';
                if (options.includeUpper) allChars += upperCase;
                if (options.includeLower) allChars += lowerCase;
                if (options.includeNumbers) allChars += numbers;
                if (options.includeSpecials) allChars += specials;

                // Ensure that password length is sufficient to include required characters
                if (options.length < options.minNumbers + options.minSpecials) {
                    return 'Error: Password length is too short to include required numbers and special characters.';
                }

                let password = '';
                let requiredNumbers = options.minNumbers;
                let requiredSpecials = options.minSpecials;
                let otherChars = options.length - requiredNumbers - requiredSpecials;

                while (password.length < options.length) {
                    if (requiredNumbers > 0) {
                        password += numbers.charAt(Math.floor(Math.random() * numbers.length));
                        requiredNumbers--;
                    } else if (requiredSpecials > 0) {
                        password += specials.charAt(Math.floor(Math.random() * specials.length));
                        requiredSpecials--;
                    } else if (otherChars > 0) {
                        const char = allChars.charAt(Math.floor(Math.random() * allChars.length));
                        if (!numbers.includes(char) && !specials.includes(char)) {
                            password += char;
                            otherChars--;
                        }
                    }
                }

                // Shuffle the password
                return password.split('').sort(() => 0.5 - Math.random()).join('');
            }

            $('#generate-password').on('click', function() {
                const options = {
                    length: parseInt($('#password-length').val()),
                    minNumbers: parseInt($('#min-numbers').val()),
                    minSpecials: parseInt($('#min-specials').val()),
                    includeUpper: $('#include-upper').is(':checked'),
                    includeLower: $('#include-lower').is(':checked'),
                    includeNumbers: $('#include-numbers').is(':checked'),
                    includeSpecials: $('#include-specials').is(':checked')
                };

                const password = generatePassword(options);
                $('#generated-password').val(password);
            })
        });
    </script>
@endsection
