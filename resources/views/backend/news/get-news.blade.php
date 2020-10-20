@extends('backend.layout.master')

@section('title', 'Get News')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/loading/style.css') }}">
@endpush

@section('content')

<h1 id="zagolovok" style="display:none; position: fixed;
    top: 50%;
    left: 50%;
    margin-top: -50px;
    margin-left: -100px;">Новости успешно получены!</h1>

<div id="loading" class="cssload-container">
    <div class="cssload-zenith" style="position: fixed;
    top: 50%;
    left: 50%;
    margin-top: -50px;
    margin-left: -100px;"></div>
</div>


@endsection

@push('scripts')
    <!-- iCheck -->    
    <script src="{{ asset('backend/components/jquery/jquery.min.js') }}"></script>    

    <script>        
        $(document).ready(function(){
            $("#zagolovok").slideDown(1000);
            $("#loading").hide();
        });
    </script>
@endpush