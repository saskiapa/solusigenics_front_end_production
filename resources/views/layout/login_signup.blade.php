<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.meta')
  <title>@yield('title')</title>
  @include('includes.style')
  <link rel="stylesheet" href="/css/pages/login_and_signup.css">
  @stack('add-on-style')
</head>
<body>
  <main>
    @yield('content')
  </main>
  @include('includes.script')
  @stack('add-on-script')
</body>
</html>