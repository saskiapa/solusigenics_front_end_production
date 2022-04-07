@extends('layout.app')

@section('title')
  Beranda
@endsection

@section('content')
  @include('includes.aside')
  <section class="main">
    <form action="" id="form">
      <input 
        type="hidden" 
        name="disease" 
        value="" 
        id="inputDisease">
      <input 
        type="text" 
        name="keyword" 
        id="inputKeyword" 
        placeholder="Cari Video Disini" 
        required>
      <button 
        type="submit"
        class="btn-search">Cari</button>
    </form>
    <section class="recommendation">
      <main id="videoList">
        <h2 id="videoListHeading">Rekomendasi Untuk Anda</h2>
        @include('includes.alert_container')
        @include('includes.loading_screen')
      </main>
      <main id="videoNone">
        <img src="/images/icons/sad-face-in-rounded-square.png" alt="">
        <h4>Anda belum memiliki rekomendasi video</h4>
      </main>
    </section>
  </section>

  <template id="videoTemplate">
    <a href="" class="anchor">
      <figure>
        <img src="/images/rectangle_placeholder.png" alt="Trulli" style="width:100%">
        <figcaption>Contoh Judul Video Tentang Penyakit | YouTube | Vimeo | Cara Pencegahan penyakit DBD MALARIA</figcaption>
        <p class="source" style="display: block"></p>
        <p class="video_id" style="display: block"></p>
      </figure>
    </a>
  </template>
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/pages/user/beranda.css">
@endpush

@push('add-on-script')
  <script type="text/javascript" src="/js/pages/user/beranda.js"></script>
@endpush