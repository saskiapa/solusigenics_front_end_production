@extends('layout.login_signup')

@section('title')
  Login
@endsection

@section('content')
  <form
    id="form"
    action="/api/user/check_login"
    method="POST">
    <h1 class="billabong-font-family">Solusigenics</h1>
    <div class="centeringAlert">
      <div id="alert">
        <p id="alertMessage">Username atau Email atau Password salah</p>
      </div>
    </div>
    <div class="inputContainer">
      <input type="text" name="emailorusername" placeholder="Username atau email" id="inputUsername" required>
    </div>
    <div class="inputContainer">
      <input type="password" name="password" placeholder="Password" id="inputPassword" required>
    </div>
    <div class="inputContainer">
      <input type="submit" value="Login">
    </div>
  </form>
  <section class="card">
    <p>Belum punya akun? <a href="/signup">Sign Up</a></p>
  </section>
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/pages/login.css">
@endpush

@push('add-on-script')
  <script type="text/javascript" src="js/pages/login.js"></script>
@endpush