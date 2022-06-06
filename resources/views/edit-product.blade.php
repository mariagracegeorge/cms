@extends('layouts.mainapp')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div>

    <h3>Edit Product</h3>

        <div class="form-group" style="padding: 20px;">
            <label class="col-sm-2 form-control-label">Title</label>
            <div class="col-sm-10" style="padding-top: 10px;">
                <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Title" value="{{ $product->title }}">
            </div>
        </div>

        <div class="form-group" style="padding: 20px;">
            <label class="col-sm-2 form-control-label">Slug</label>
            <div class="col-sm-10" style="padding-top: 10px;">
                <input type="text" class="form-control" id="product-slug" name="product-slug" placeholder="Slug" value="{{ $product->slug }}">
            </div>
        </div>

        <div class="form-group" style="padding: 20px;">
            <label class="col-sm-2 form-control-label">Content</label>
            <div class="col-sm-10" style="padding-top: 10px;">
                <input type="text" class="form-control" id="product-content" name="product-content" placeholder="Content" value="{{ $product->content }}">
            </div>
        </div>
        <input type="hidden" id="product-id" value="{{ $product->id }}">
        <input type="hidden" id="parent-slug" value="{{ $parent->slug }}">

        <div class="clearfix"></div>
        <div class="form-group" style="padding: 20px;">
            <button type="button" id="cancel-edit-page" class="btn btn-secondary-outline"  style="padding-left: 20px;">
                Cancel
            </button>
            <button type="button" id="btn-edit-page" class="btn btn-primary" style="padding-left: 20px;">
                Edit
            </button>
        </div>
        <div class="clearfix"></div>

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
