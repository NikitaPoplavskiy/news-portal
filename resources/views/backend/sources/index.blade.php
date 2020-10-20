@extends('backend.layout.master')

@section('title', 'Users')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/components/loading/style.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Sources Table
        <small>
            <a href="{{ route('admin.sources.create') }}" class="btn btn-block btn-xs btn-success btn-flat"><i class="fa fa-plus"></i> CREATE</a>
        </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                    <a class="btn btn-xs btn-success btn-flat" onclick="getNews();" id="#btn-get-news">Get new news</a>
                    <div style="display:none;" class="lds-spinner" id="loading">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <h1 style="display:none;" id="answer_good">Новости успешно получены!</h1>
                    <h3 id="news_count"></h3>
                    <h3 id="new_news_count"></h3>
                    <h1 style="display:none;" id="answer_fail">Произошла ошибка</h1>
                </div>

                <div class="box-body">
                    <table id="user-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($sources as $source)
                            <tr>
                                <td>{{ $source->id }}</td>
                                {{-- <td>--}}
                                {{-- <img src="{{ asset('images/'.$user->photo) }}" alt="{{ $user->name }}" width="40px">--}}
                                {{-- </td>--}}
                                <td>{{ $source->type }}</td>
                                <td>{{ $source->name }}</td>
                                <td>{{ $source->url }}</td>
                                <td>{{ ($source->status == '1') ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.sources.edit', $source->id) }}" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-flat" onclick="event.preventDefault();
                                                    document.getElementById('source-delete-form-{{$source->id}}').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="source-delete-form-{{$source->id}}" action="{{ route('admin.sources.destroy', $source->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <a href="javascript:void(0)" id="btn-get-news" class="btn btn-danger btn-flat">
                                            {{-- <i class="fa fa-trash"></i>--}}
                                            <i class="fab fa-accessible-icon"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('backend/components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function() {
        $('#user-table').DataTable();
    })
</script>


@endpush