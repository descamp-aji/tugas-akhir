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
  {{-- My css --}}
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
  {{$slot}}
  <!-- Bootstrap JS Bundle (termasuk Popper) -->
  <script src={{asset('bootstrap-5/js/bootstrap.bundle.min.js')}}></script>
</body>
</html>
