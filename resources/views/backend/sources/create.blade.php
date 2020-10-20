@extends('backend.layout.master')

@section('title', 'Create User')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Create Source
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

        <form action="{{ route('admin.sources.store') }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf

            <div class="col-md-6">
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Create Source</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control" style="width: 100%;">
                                <option value="rss">RSS Feed</option>
                                <option value="html">HTML page</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control" style="width: 100%;">
                                <option value="-1">Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sourceName">Name</label>
                            <input type="text" name="name" class="form-control" id="sourceName">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="sourceUrl">URL</label>
                            <input type="url" name="url" class="form-control" id="sourceUrl">
                        </div>

                        <div class="icheckbox">
                            <label>
                                <input type="checkbox" id="checkbox_input" name="status"> Active
                            </label>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                    </div>
                </div>
            </div>

        </form>

    </div>
</section>

@endsection

@push('scripts')
<!-- iCheck -->
<script src="{{ asset('backend/components/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>

<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue'
        });

        /*if ($('input').iCheck('check')) {
            $('#checkbox_input').val() = 1
        } else {
            $('#checkbox_input').val() = 0
        }*/
    });
</script>
@endpush
