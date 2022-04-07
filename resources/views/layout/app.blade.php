<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.meta')
  <title>@yield('title')</title>
  @include('includes.style')
  @stack('add-on-style')
</head>
<body>
  @include('includes.navbar')
  <main id="mainContent">@yield('content')</main>
  @include('includes.alert_notif')
  @include('includes.script')
  @stack('add-on-script')
</body>
</html>