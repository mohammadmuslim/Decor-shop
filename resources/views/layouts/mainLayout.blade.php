<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('Frontend/assets/images/favicon.png') }}"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">

    <!-- Data table -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">

    <!-- Select 2 --->
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/select2/dist/css/select2.min.css') }}">
    <!-- Toastr CSS -->
    <link href="{{ asset('Backend/assets/toster-js/css/toastr.css') }}" rel="stylesheet">
    <!-- sweetalert2 CSS -->
    <link href="{{ asset('Backend/assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/argon.css?v=1.1.0') }}" type="text/css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/style.css') }}" type="text/css">

  @stack('css')
</head>

<body>
  <!--- Sidevar  start --->
   @include('partials.sidebar')
  <!--  End Sidevar -->
   <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Top Navigation Bar -->
    @include('partials.header')
    <!--- Content Head --->
    <!-- Header -->
    <div class="header  pb-6" style="">
      <div class="container-fluid">
        @yield('content_head')
      </div>
    </div>
    <!--- Content Body --->
    <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              @yield('content_body')
            </div>
          </div>
        </div>
        @include('partials.footer')
      </div><!-- End Content -->
    </div><!--- End Main Content -->
  <!-- Core -->
  <script src="{{ asset('Backend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

  <!-- Data table -->
  <script src="{{ asset('Backend/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
  <!-- Select 2 -->
  <script src="{{ asset('Backend/assets/vendor/select2/dist/js/select2.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('Backend/assets/js/argon.js?v=1.1.0') }}"></script>
  <!--- Toastr js Start --->
  <script src="{{ asset('Backend/assets/toster-js/js/toastr.js') }}"></script>
  <!-- Handlebar js -->
  <script src="{{ asset('Backend/assets/handelbar/js/handlebars.min.js') }}"></script>
  <!-- Sweet-Alert  -->
  <script src="{{ asset('Backend/assets/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/sweetalert2/sweet-alert.init.js') }}"></script>

  @stack('js')
   <!--- Toastr Message --->
    <script>
        @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    <!--- Laravel validation Message By Toaster --->
    <script type="text/javascript">
        @if($errors->any())
            @foreach($errors->all() as $error)
            toastr.error('{{ $error }}', 'Error', {
                closeButton:true,
                progressBar:true,
            });
            @endforeach
        @endif
    </script>

    <script type="text/javascript">
        function itemdelete(id){
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'mr-2 btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You Want to Delete This!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        event.preventDefault();
                        document.getElementById('delete_form_'+id).submit();
                    } else if (
                       / Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Data is Save :)',
                            'error'
                        )
                    }
                })
        }

    </script>

    <!--- Sweet-Alert --->
    <script type="text/javascript">
        function itemdelete(id){
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'mr-2 btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You Want to Delete This!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        event.preventDefault();
                        document.getElementById('delete_form_'+id).submit();
                    } else if (
                       / Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Data is Save :)',
                            'error'
                        )
                    }
                })
        }

    </script>
    <!-- repetar js --->
</body>
</html>
