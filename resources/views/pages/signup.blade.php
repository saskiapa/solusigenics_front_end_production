@extends('layout.login_signup')

@section('title')
  Daftar
@endsection

@section('content')
  <form
    id="form"
    action="api/user/signup"
    method="POST">
    <h1 class="billabong-font-family">Solusigenics</h1>
    @csrf
    <input type="hidden" id="responseUsernameAndEmail" value="">
    <div class="inputContainer">
      <input type="text" name="username" placeholder="Username" id="inputUsername" required>
      <small id="smallUsername">Username sudah digunakan</small>
    </div>
    <div class="inputContainer">
      <input type="text" name="email" placeholder="Email" id="inputEmail" required>
      <small id="smallEmail">Email sudah digunakan</small>
    </div>
    <div class="inputContainer">
      <input type="password" name="password" placeholder="Password" id="inputPassword" required>
    </div>
    <div class="inputContainer">
      <input type="submit" value="Sign Up">
    </div>
  </form>
  <section class="card">
    <p>Sudah punya akun? <a href="/login">Login</a></p>
  </section>
@endsection

@push('add-on-style')
<link rel="stylesheet" href="/css/pages/signup.css">
@endpush

@push('add-on-script')
  <script type="text/javascript" src="js/pages/signup.js"></script>
@endpush