<nav id="navbar">
  <main>
    <div class="left-side">
      <a href="/beranda" id="navbrand-anchor"><p class="billabong-font-family" id="navbrand">Solusigenics</p></a>
      <a href="{{ route('favorite') }}" class="group-wrapper">
        <img src="/images/navbar/star.png" alt="">
        <p>Video Favorit</p>
      </a>
    </div>
    <div class="right-side">
      <a href="" class="group-wrapper">
        <img src="/images/navbar/user.png" alt="">
        <p id="welcomeGreeting">Welcome, user</p>
      </a>
      <img src="/images/navbar/three_dots.png" alt="" id="three-dots">
    </div>
  </main>
  <hr>
  <div id="dropdown-container">
    <aside id="dropdown-menu">
      <a href="{{ route('history') }}">History Tontonan</a>
      <a href="/api/user/logout">Logout</a>
    </aside>
  </div>
</nav>