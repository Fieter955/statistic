@extends('templete')

@section('container')
<div class="px-5">
    <h1 class="mb-5">{{ $send['title'] }}</h1>

   
    <h5>{{ $send['author'] }}</h5>
    <p>{{ $send['body'] }}</p>

    <a href="{{ route('posts') }}"><button>kembali</button></a>
</div>
@endsection

