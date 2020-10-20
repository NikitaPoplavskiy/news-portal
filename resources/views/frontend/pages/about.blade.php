@extends('frontend.layout.master2')

@section('title', 'About')


@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-6 col-md-offset-3">
                <h2 style="font-size:x-large;margin-top: 50px;margin-bottom:10px;">What is WorldNews.news?</h2>
                <p style="font-size:large;margin-top: 10px;">WorldNews.news it is a news agregator</p>
                <p style="font-size:large;margin-top: 10px;">Which help you to follow the latest news</p>
                <h2 style="font-size:x-large;margin-top: 50px;margin-bottom:10px;">We take news form RSS-feeds</h2>
                <p style="font-size:large;margin-top: 10px;">Such as: </p>
                <p>Перечисление источников новостей....</p>
                <p style="font-size:large;margin-top: 10px;">If you want to write us, you can follow the <a target="_blank" rel="noopener noreferrer" href="{{ route('page.contact') }}">contact page</a> and you will see our email-adress</p>                
            </div>
        </div>
    </div>
@endsection
