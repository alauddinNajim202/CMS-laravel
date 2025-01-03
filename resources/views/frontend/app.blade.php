@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>Home - One Startup IT</title>

    <!-- All Plugins CSS -->
    <!-- <link rel="stylesheet" href="./assets/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/plugins/aos.css" />
    <link rel="stylesheet" href="./assets/css/plugins/nice-select.min.css" />
    <link rel="stylesheet" href="./assets/css/plugins/owl.carousel.min.css" /> -->

    <!-- Custom Css -->

    @include('frontend.partials.styles')

</head>

<body>
    <!-- Navbar starts -->
        @include('frontend.partials.navbar')
    <!-- Header Area Ends -->


    <!-- main area starts -->
    <main>
        @yield('content')
    </main>
    <!-- main area starts -->

    <!-- footer area starts -->
    @include('frontend.partials.footer')
    <!-- footer area ends -->

    <!-- Javascript Links -->
    @include('frontend.partials.scripts')
</body>

</html>
