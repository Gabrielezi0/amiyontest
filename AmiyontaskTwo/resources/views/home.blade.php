@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($generatedURLs as $item)
        <div class="col-md-4">
            <div class="card p-2 m-2">
                <div class="card-header"><a href="{{ $item->original_url }}">https://shrt.url?q={{$item->generated_key }}</a></div>

                <div class="card-body">
                        {{ $item->original_url}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
