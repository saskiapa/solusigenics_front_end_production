@extends('layout.app')

@section('title')
@endsection

@section('content')
  @include('includes.aside')
  <section class="main">
    <section class="video">
      <div class="centering">
        <div class="flex-space-between">
          <h1 id="videoTitle"></h1>
          <img src="http://127.0.0.1:8000/images/icons/heart_white.png" alt="" id="heart">
        </div>
      </div>
      <iframe
        id="iframe"
        width="560" 
        height="315" 
        src="" 
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen></iframe>
    </section>
  </section>
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/pages/user/watch.css">
@endpush

@push('add-on-script')
  <script type="text/javascript" src="/js/pages/user/watch.js"></script>
@endpush