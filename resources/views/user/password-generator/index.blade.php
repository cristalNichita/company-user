@extends('user.layouts.front')
@section('title', 'Activity Log')

@section('content')
    <div class="wrapper flex grow flex-col">
        <main class="grow content pt-5" id="content" role="content">
            <div class="container-fixed" id="content_container">
            </div>
            <input type="text" class="input" id="generated-password">
            <input type="number" class="input" id="password-length" placeholder="length" value="10">
            <input type="number" class="input" id="min-numbers" placeholder="min-num" value="10">
            <input type="number" class="input" id="min-specials" placeholder="min-spec" value="5">
            <input type="checkbox" id="include-upper"> A-Z
            <input type="checkbox" id="include-lower"> a-z
            <input type="checkbox" id="include-numbers"> 0-9
            <input type="checkbox" id="include-specials"> @!

            <button type="button" class="btn btn-primary" id="generate-password">Generate</button>
        </main>
    </div>
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
