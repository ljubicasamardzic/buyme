<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BuyMe</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @livewireStyles
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')
    @include('partials.navbar')

    @yield('content')

    @livewireScripts
    @stack('scripts')

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        window.addEventListener('toastr', event => {
            toastr.options = {
                positionClass: 'toast-bottom-right',
                closeButton: true,
                tapToDismiss: true
            }

            toastr.success(event.detail.message);
        });
    </script>

    @yield('scripts')
</body>

</html>

