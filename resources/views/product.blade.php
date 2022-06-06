@extends('layouts.mainapp')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div>

      <h3>
        @if($category != null)
          <a href="/category/{{ $category->slug }}">{{ $category->title }}</a>/
        @endif
        <a href="/category/{{ $subCategory->slug }}">{{ $subCategory->title }}</a>/{{ $categoryDetails->title }}
      </h3>

        <div>
          <ul>
              <li>
                  <div>Title: {{ $categoryDetails->title }}</div>
              </li>
              <li>
                  <div>Content: {{ $categoryDetails->content }}</div>
              </li>
          </ul>
        </div>

</div>
@endsection
<script src="/js/jquery/jquery.min.js" crossorigin="anonymous"></script>
<script src="/js/pages.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  pages.csrf_token  = $('meta[name="csrf-token"]').attr('content');
  pages.ready();
});
</script>
