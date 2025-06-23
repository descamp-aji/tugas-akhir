<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{$title ?? config('app.name')}}</title>
  <link rel="shortcut icon" href="{{asset('myassets/img/logo.png')}}" />
  <!-- Bootstrap CSS -->
  <link
    href={{asset('bootstrap-5/css/bootstrap.min.css')}}
    rel="stylesheet"
  />
  <!-- Bootstrap Icons -->
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
  rel="stylesheet"
  />
  {{-- Flatpicker css --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" /> 
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css"
  />
  {{-- My CSS --}}
  <link
    href={{asset('myassets/css/mycss.css')}}
    rel="stylesheet"
  />
</head>
<body>
  <aside class="sidebar">
    <!-- Logo -->
    <div class="logo">
      <a href="/">
        <span>
          <img src="{{asset('myassets/img/logo.png')}}" alt="Logo" /> 
          DocuTrack
        </span>
      </a>
    </div>
    {{-- Navigation Menu --}}
    <x-navigation-menu/>
    <!-- User Badge -->
    <div class="user-badge mt-auto">
      <img
        src="https://randomuser.me/api/portraits/men/34.jpg"
        alt="User Profile"
      />
      <div class="user-info">
        <div class="name"><a href="{{route('profile', auth()->user()->id )}}"> {{auth()->user()->name}} </a></div>
        <div class="status">
          <hr style="margin-block: 5px">
          <span>
            <p style="margin: 0">
                {{auth()->user()->role == 'admin' ? 'Administrator' : 'Regular User'}}
            </p>
          </span>
        </div>
      </div>
    </div>
  </aside>
  <!-- Konten utama -->
  <main style="margin-left: 280px; padding-right:1rem; padding-left:1rem ">
    <hr style="margin-top: 0">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col">
          <h6 class="fw-bold">Hallo!! Have a nice day</h6>
          <h6 style="margin:0px">{{date('l, F j, Y')}}</h6>
        </div>
        <div class="col d-flex justify-content-end">
          <a style="text-decoration: none; color:black" href="{{route('logout')}}"><i class="bi bi-box-arrow-left"></i> Keluar</a>
        </div>
      </div>
    <hr>
    {{$slot}}
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src={{asset('bootstrap-5/js/bootstrap.bundle.min.js')}}></script>
  <!-- Flatpickr JS + MonthSelect plugin -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
  <script src={{asset('myassets/js/script.js')}}></script>
</body>
</html>

