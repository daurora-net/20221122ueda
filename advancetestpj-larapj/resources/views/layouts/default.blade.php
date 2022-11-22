<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdvanceTEST</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
  @livewireStyles
</head>

<body class="font-sans antialiased">
  <div class="container">
    @yield('content')
  </div>
  <script src="{{ asset('js/main.js') }}"></script>
  @livewireScripts
</body>

</html>