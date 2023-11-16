<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/js/pace.min.js')}}"></script>

  <!--plugins-->

  <link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('assets/plugins/notifications/css/lobibox.min.css')}}" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

  <!-- CSS Files -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="{{asset('assets/css/dark-theme.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/semi-dark.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/header-colors.css')}}" rel="stylesheet" />
  <title>{{$title}}</title>
  @livewireStyles
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">

    <!--start sidebar -->
        <x-common.sidebar></x-common.sidebar>
    <!--end sidebar -->

    <!--start top header-->
    <x-common.header></x-common.header>
    <!--end top header-->


    <!-- start page content wrapper-->
    {{$slot}}
    
    <!--end page content wrapper-->


    <!--start footer-->
    <x-common.footer></x-common.footer>
    <!--end footer-->


    <!--Start Back To Top Button-->
    <x-common.backTop></x-common.backTop>
    <!--End Back To Top Button-->

    {{--  
        <!--start switcher-->
        <x-common.themeCustomize></x-common.themeCustomize>
        <!--end switcher-->
    --}}

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

  </div>
  <!--end wrapper-->


  <!-- JS Files-->
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!--plugins-->

  <script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="{{asset('assets/js/index.js')}}"></script>
  <script src="{{asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
  <script src="{{asset('assets/plugins/notifications/js/notifications.min.js')}}"></script>
  <script src="{{asset('assets/plugins/notifications/js/notification-custom-script.js')}}"></script>

  <!-- Main JS-->
  <script src="{{asset('assets/plugins/select2/js/select2-custom.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  @livewireScripts
  @push('alpine-scripts')
  <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('publishers', () => ({
          createForm: false ,
          showTable:true ,
          publisherName: '' 
        }))
    })
  </script>
  @endpush
  
</body>

</html>