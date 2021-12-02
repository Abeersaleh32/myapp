
@extends('layouts.insidepages')


@section('content')
        <h1> all posts </h1>


        @foreach((array)$posts As $post)
       <ul>
        <li>  {{$posts-> picture}} {{$posts -> paragraph}}</li>

        </ul>

@endforeach




@endsection
