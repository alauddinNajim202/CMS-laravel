<!-- ==== All Js cdn Links ==== -->

<!-- ==== All Js Links ==== -->
<script src=" {{asset('frontend/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins.js')}} "></script>
<script src="{{asset('frontend/js/main.js')}} "></script>
{{-- toastr start --}}
{{-- sweetalert --}}
<script src="{{ asset('backend/cdn/js/sweetalert2@11.js') }}"></script>

{{--jquery--}}
<script src="{{ asset('backend/cdn/js/jquery.ajaxy.min.js') }}"></script>

<script src="{{ asset('backend/libs/toastr/toastr.js') }}"></script>
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('t-success'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        toastr.success("{{ session('t-success') }}");
        @endif

            @if (Session::has('t-error'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        };
        toastr.error("{{ session('t-error') }}");
        @endif

            @if (Session::has('t-info'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        };
        toastr.info("{{ session('t-info') }}");
        @endif

            @if (Session::has('t-warning'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        };
        toastr.warning("{{ session('t-warning') }}");
        @endif
    });
</script>
@stack('script')
