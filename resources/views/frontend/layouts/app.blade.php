<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Poliban | Alumni</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('sisami/favicon.ico') }}" />

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- box icons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- Data table --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
    {{-- summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @livewireStyles
    <style>
        .action {
            border: none !important;
        }
    </style>
</head>

<body class="bg-body-tertiary" data-bs-theme="light" data-bs-spy="scroll" data-bs-target="#navbar">
    @include('sweetalert::alert')


    {{-- navbar --}}
    <x-navbar-frontend></x-navbar-frontend>


    @yield('content')



    {{-- footer --}}
    <footer class="pt-5 my-5">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="/#about" class="nav-link px-2 text-body-secondary">About</a></li>
            <li class="nav-item"><a href="/#summary" class="nav-link px-2 text-body-secondary">Summary</a></li>
            <li class="nav-item"><a href="/#event" class="nav-link px-2 text-body-secondary">Events</a></li>
            <li class="nav-item"><a href="/#vacancy" class="nav-link px-2 text-body-secondary">Job Vacancies</a></li>
        </ul>
        <p class="text-center text-body-secondary">&copy; 2023 Sisami</p>
    </footer>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    {{-- aos --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("navbar").classList.add('navbar-scrolled');
            } else if (document.body.scrollTop < 20 || document.documentElement.scrollTop < 20) {
                document.getElementById("navbar").classList.remove('navbar-scrolled');
            }
        }
    </script>
    {{-- data table --}}
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            // datatables
            $('#myTable').DataTable({
                responsive: true,
                "lengthChange": false
            });
        });
    </script>
    {{-- summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('#summernote').summernote({
            placeholder: 'Describe your company requirements',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        });
    </script>
    @livewireScripts
</body>

</html>
