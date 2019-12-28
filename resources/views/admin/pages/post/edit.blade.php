@extends('admin.master')

@section('content')
<div class="row mt-3">
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Post</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="card-body">
          <div class="form-group">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="exampleInputEmail1">Title</label>
            <input value="{{ $post->title }}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter...">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <span class="text-danger"></span>
            <textarea  name=content id="text" cols="30" rows="10">{{ $post->content }}</textarea>

            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
          </div>
          <div class="form-group">
            <label>Danh Muc</label>
            <select class="custom-select" name="category">

                @foreach($data_cate as $cate)

                  <option value="{{ $cate->id }}" {{ $cate->id == $post->cate_id ? 'selected' : '' }}>{{ $cate->name }}</option>

                @endforeach
                
            </select>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Ảnh</label>
            <div class="col-md-4">
              <span class="text-danger">{{ $errors->first('image') }}</span>
                  <input type='file' id="inputFile" name="image"  class="form-control"/>
                  <img id="image_upload_preview"
                  src="
                  @if($post->image == "")
                    http://placehold.it/100x100
                  @else 
                    {{ asset('img/upload/post/'.$post->image) }}
                  @endif
                  "
                   alt="your image" width="300" />
            </div>
          </div>
          {{-- <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="is_menu" value="1">
            <label for="customCheckbox1" class="custom-control-label">Display</label>
          </div> --}}
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
</div>
@endsection

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

@section('js_cate')
<script type="text/javascript">

  $(document).ready(function() {

  // Show preview image 
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });
 
  });
</script>
@endsection