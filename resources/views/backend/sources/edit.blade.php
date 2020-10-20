@extends('backend.layout.master')

@section('title', 'Edit User')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Edit User
        <small><a href="{{ route('admin.sources.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i class="fa fa-plus"></i> BACK</a></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <form action="{{ route('admin.sources.update', $source->id) }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control" style="width: 100%;">
                                <option value="rss" @if($source->type == 'rss') {{'selected'}} @endif>RSS Feed</option>
                                <option value="html" @if($source->type == 'html') {{'selected'}} @endif>HTML page</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control" style="width: 100%;">
                                <option value="-1">Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($source->category_id == $category->id) {{'selected'}} @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sourceName">Name</label>
                            <input type="text" name="name" class="form-control" id="sourceName" value="{{ $source->name }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="sourceUrl">URL</label>
                            <input type="url" name="url" class="form-control" id="sourceUrl" value="{{ $source->url }}">
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" id="checkbox_input" {{ $source->status  ? 'checked' : '' }}> Active
                            </label>
                        </div>

                        {{-- <div class="box-img">--}}
                        {{-- <img src="{{ asset('images/'.$user->photo) }}" alt="{{ $user->name }}" class="img-responsive">--}}
                        {{-- </div>--}}
                        {{-- <div class="form-group">--}}
                        {{-- <label for="newsimage">Featured Image</label>--}}
                        {{-- <input type="file" name="photo" id="newsimage">--}}
                        {{-- <p class="help-block">(Image must be in .png or .jpg format)</p>--}}
                        {{-- </div>--}}
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">UPDATE</button>
                    </div>
                </div>
            </div>

        </form>

    </div>
</section>

@endsection

@push('scripts')
<!-- iCheck -->
<script src="{{ asset('backend/components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
        });
    });
</script>


<script>
    $('input').on('ifChecked', function(event) {
        $("#checkbox_input").val('1');
    });
    $('input').on('ifUnchecked', function(event) {
        $("#checkbox_input").val('0');
    });
</script>
@endpush
