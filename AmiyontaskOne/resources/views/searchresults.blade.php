@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($searchresults as $item)
        <div class="col-md-4">
            <div class="card p-2 m-2">
                <div class="card-header"><a href="{{ $item->link }}">{{$item->title }}</a></div>

                <div class="card-body">
                        {!! $item->htmlSnippet !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
