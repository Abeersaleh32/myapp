@extends('layouts.app')

@section('content')
<div class="content">

                    <h2><br>'You are logged in!</h2>

                @foreach((array)$posts as $post)
                    <ul>
                       <li> {{$post->picture}}</li>

                       <li> {{$post->paragraph}}</li>
                     </ul>
                    @auth
                     <a href="{{'/edite'. $post->id}}" class="btn btn-primary">Edit</a>
                     <form action="{{route ('postcontroll.destroy',['id'=>$post->id])}}" method="POST">
                         @csrf
                         @method('DELETE')
                     <a href="{{'/delete'. $post->id}}" class="btn btn-primary">Delete</a>
                    @endauth
</form>
                 @endforeach

</div>


@endsection
