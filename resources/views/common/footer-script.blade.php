<script src="{{ env('WEB_BASE_URL').('front-new/js/jquery.js') }}"></script>
<script src="{{ env('WEB_BASE_URL').('front-new/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ env('WEB_BASE_URL').('front-new/js/intlTelInput.min.js') }}"></script>
<script src="{{ env('WEB_BASE_URL').('front-new/js/sparticles.js') }}"></script>
<script src="{{ env('WEB_BASE_URL').('front-new/js/custom-script.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{ env('WEB_BASE_URL').('front-new/js/toastr.min.js') }}"></script>
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="4951d3dc-f0af-419d-a39e-70da1bfb2613"
    data-blockingmode="auto" type="text/javascript"></script>

@yield('js')

<script>
    document.addEventListener('DOMContentLoaded', function(event) {
        var navbarToggler = document.querySelectorAll('.navbar-toggler')[0];
        navbarToggler.addEventListener('click', function(e) {
            e.target.children[0].classList.toggle('active');
        });
    });
</script>
<script>
    $(document).ready(function() {

        $(".menu-btn").click(function() {
            $(".menu-parent").addClass("show");
        });
        $(".nav-item.icon-tab").click(function() {
            $(".menu-parent").removeClass("show");
        });
    });
</script>
<script>
    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            // "progressBar": true,
            preventDuplicates: true,
            timeOut: 15000,
            extendedTimeOut: 15000, //Set the timeout to 2 minutes (2 * 60,000 milliseconds)
        }
        toastr.success("{{ session('success') }}");
        {{ Session::forget('success') }}
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            // "progressBar": true,
            preventDuplicates: true,
            timeOut: 15000,
            extendedTimeOut: 15000,
        }
        toastr.error("{{ session('error') }}");
        {{ Session::forget('error') }}
    @endif

    @if (count($errors) > 0)
        toastr.options = {
            "closeButton": true,
            // "progressBar": true,
            preventDuplicates: true,
            timeOut: 15000,
            extendedTimeOut: 15000,
        }
        toastr.error("{{ $errors->first() }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            // "progressBar": true,
            preventDuplicates: true,
            timeOut: 15000,
            extendedTimeOut: 15000,
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            // "progressBar": true,
            preventDuplicates: true,
            timeOut: 15000,
            extendedTimeOut: 15000,
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

<script>
    // for alert message disppper after 3 sec
    $(document).ready(function() {
        setTimeout(function() {
            $('.alertdisapper').hide();
        }, 4000);
    });

</script>

<script>
    $(document).ready(function(){
        $('#submitBtn').on('click', function(){
            // Get form data
            var formData = $('#news-update-form').serialize();

            // AJAX request
            $.ajax({
                url: "{{route('newsUpdatePost')}}", // Replace with your actual backend endpoint
                type: 'POST',
                data: formData,
                success: function(response){
                    $('.email-news-clear').val('');
                    toastr.success(response.message);
                },
                error: function(error){
                    toastr.error(response.message);
                }
            });
        });
    });
</script>
