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
  {{-- My CSS --}}
  <link
    href={{asset('myassets/css/mycss.css')}}
    rel="stylesheet"
  />
  <!-- Bootstrap Icons -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    rel="stylesheet"
  />

</head>
<body>
  <aside class="sidebar">
    <!-- Logo -->
    <div class="logo">
      <span>
        <img src="{{asset('myassets/img/logo.png')}}" alt="Logo"> 
        DocuTrack
      </span>
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
    <div class="container d-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb" class="mb-0">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active" style="color: #4b4b4b" aria-current="page">{{strtoupper($title)}}</li>
            </ol>
        </nav>
        <span><a style="text-decoration: none; color:#4b4b4b" href="{{route('logout')}}"><i class="bi bi-box-arrow-left"></i> Keluar</a></span>
    </div>
    <hr>
    {{$slot}}
  </main>

  <!-- Bootstrap JS Bundle (termasuk Popper) -->
  <script src={{asset('bootstrap-5/js/bootstrap.bundle.min.js')}}></script>
</body>
</html>

