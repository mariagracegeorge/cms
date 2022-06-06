@extends('layouts.mainapp')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div>

      <h3><a href="/category/{{ $category->slug }}">{{ $category->title }}</a>/{{ $categoryDetails->title }}</h3>
        <div>
          <a href="/add-page/{{ $categoryDetails->id }}/1">Add Product</a>
        <hr/>
        <div>
          <h3>Products</h3>
          <ul>
            @if(count($categoryItems) > 0)
            @foreach ($categoryItems as $key => $item)
            @if($item->type == 1)
              <li>
                <a href="/category/{{ $item->slug }}">
                  <div>{{ $item->title }}</div>
                </a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="/category/show-edit-page/{{ $item->id }}">Edit</a> | <a id="delete-product" data-id="{{ $item->id }}" href="">Delete</a>
              </li>
            @endif
            @endforeach
            @else
            <li>
              No Products
            </li>
            @endif
          </ul>
        </div>
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
