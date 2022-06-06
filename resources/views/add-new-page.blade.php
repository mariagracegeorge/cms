@extends('layouts.mainapp')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div>

    <h3>Create New Page</h3>

        <div class="form-group" style="padding: 20px;">
            <label class="col-sm-2 form-control-label">Title</label>
            <div class="col-sm-10" style="padding-top: 10px;">
                <input type="text" class="form-control" id="page-name" name="page-name" placeholder="Title">
            </div>
        </div>

        <div class="form-group" style="padding: 20px;">
            <label class="col-sm-2 form-control-label">Slug</label>
            <div class="col-sm-10" style="padding-top: 10px;">
                <input type="text" class="form-control" id="page-slug" name="page-slug" placeholder="Slug">
            </div>
        </div>

        <div class="form-group" style="padding: 20px;">
            <label class="col-sm-2 form-control-label">Content</label>
            <div class="col-sm-10" style="padding-top: 10px;">
                <input type="text" class="form-control" id="page-content" name="page-content" placeholder="Content">
            </div>
        </div>
        <input type="hidden" id="parent-id" value="{{ $parent_id }}">
        <input type="hidden" id="type" value="{{ $type }}">

        <div class="clearfix"></div>
        <div class="form-group" style="padding: 20px;">
            <button type="button" id="cancel-create-page" class="btn btn-secondary-outline"  style="padding-left: 20px;">
                Cancel
            </button>
            <button type="button" id="btn-create-page" class="btn btn-primary" style="padding-left: 20px;">
                Create Page
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
