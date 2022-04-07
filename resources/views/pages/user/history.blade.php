@extends('layout.app')

@section('title')
  History Tontonan
@endsection

@section('content')
  <h1>History Tontonan</h1>
  @include('includes.alert_container')
  @include('includes.loading_screen')
  <section id="video-list">
    <template id="videoTemplate">
      <div class="video">
        <div class="left-side-1">
          <a href=""><img src="/images/rectangle_placeholder.png" alt="" class="thumbnail"></a>
        </div>
        <div class="right-side-2">
          <a href="" class="title-anchor"><p>Title</p></a>
          <img src="/images/icons/trash_bin.png" alt="" srcset="" class="trash-icon">
        </div>
      </div>
    </template>
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/pages/user/favorite.css">
@endpush

@push('add-on-script')
  <script type="text/javascript" src="/js/pages/user/history.js"></script>
@endpush