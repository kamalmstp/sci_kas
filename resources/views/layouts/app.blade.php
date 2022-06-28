<!DOCTYPE html>
<html lang="en" data-theme="light">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Budget Control - PT. Sucofindo UP Sungai Putting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta property="og:url" content="https://kas.upsungaiputting.com" />
    <meta property="og:type" content="Budget Control - PT. Sucofindo UP Sungai Putting" />
    <title>Budget Control - PT. Sucofindo UP Sungai Putting</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('img/icon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('img/icons/96.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/icons/152.png')}}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{asset('img/icons/167.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/icons/180.png')}}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/tiny-slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/baguetteBox.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/rangeslider.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/vanilla-dataTables.min.css')}}" data-turbolinks-track="true" data-turbolinks-eval="false" data-turbolinks-suppress-warning>
    <link rel="stylesheet" href="{{asset('css/apexcharts.css')}}">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('style.css')}}" data-turbolinks-track="true" data-turbolinks-eval="false" data-turbolinks-suppress-warning>
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <livewire:styles/>
    <livewire:scripts/>
  </head>
  <body>
    <!-- Preloader -->
    <!-- @yield('loading') -->
    <!-- <div id="preloader">
      <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
    </div> -->
    <!-- Internet Connection Status -->
    <!-- # This code for showing internet connection status -->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Header Area -->
    @include('partials.header')
    <!-- # Sidenav Left -->
    <!-- Offcanvas -->
    @include('partials.sidebar')
    
    @yield('content')
    <!-- Footer Nav -->
    <div class="footer-nav-area" id="footerNav">
      <div class="container px-0">
        @include('partials.nav-footer')
      </div>
    </div>
    <!-- All JavaScript Files -->
    <script src="{{mix('js/app.js')}}" data-turbolinks-eval="false" data-turbolinks-suppress-warning></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" data-turbolinks-eval="false" data-turbolinks-suppress-warning></script>
    <script src="{{asset('js/slideToggle.min.js')}}"></script>
    <script src="{{asset('js/internet-status.js')}}"></script>
    <script src="{{asset('js/tiny-slider.js')}}"></script>
    <script src="{{asset('js/baguetteBox.min.js')}}"></script>
    <!-- <script src="{{asset('js/countdown.js')}}"></script> -->
    <!-- <script src="{{asset('js/rangeslider.min.js')}}"></script> -->
    <script src="{{asset('js/vanilla-dataTables.min.js')}}" data-turbolinks-track="true" data-turbolinks-eval="false" data-turbolinks-suppress-warning></script>
    <script src="{{asset('js/index.js')}}"></script>
    <script src="{{asset('js/magic-grid.min.js')}}"></script>
    <script src="{{asset('js/dark-rtl.js')}}"></script>
    <script src="{{asset('js/active.js')}}" data-turbolinks-track="true" data-turbolinks-eval="false" data-turbolinks-suppress-warning></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" data-turbolinks-track="true" data-turbolinks-eval="false" data-turbolinks-suppress-warning></script>
    <!-- PWA -->
    <script src="{{ asset('sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

    @if (session()->has('message'))
    <script>
      Swal.fire({
          title: 'Success',
          text: '{{ session("message") }}',
          icon: 'success',
        })
    </script>
    @endif
    <script>
      window.addEventListener('show-delete-confirmation', event => {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.livewire.emit('deleteConfirmed');
          }
        })
      });

      window.addEventListener('successDeleted', event => {
        Swal.fire(
          'Deleted!',
          'Data has been deleted',
          'success'
        )
      });

      var confirmLogout = () => {
          Swal.fire({
              title: 'Konfirmasi',
              text: 'Apakah Anda yakin akan keluar?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#dc3544',
              confirmButtonText: 'Ya, Keluar.',
              //cancelButtonColor: '',
              cancelButtonText: 'Batalkan',
          }).then((value) => {
              if (value.isConfirmed) {
                  var body = document.querySelector("body");
                  var actionURL = `/logout`;

                  //Form logout
                  var form = document.createElement("form");
                  form.setAttribute("method", "POST");
                  form.setAttribute("action", actionURL);

                  var inputMethod = document.createElement("input");
                  var token = document.querySelector("meta[name=csrf-token]").getAttribute('content');
                  inputMethod.setAttribute("type", "hidden");
                  inputMethod.setAttribute("name", "_token");
                  inputMethod.setAttribute("value", token);

                  form.appendChild(inputMethod);

                  form.setAttribute('action', actionURL);

                  body.appendChild(form);
                  form.submit();
              }
          });
      }
    </script>
  </body>
</html>