@extends('layouts.insidepages') 


        @section('content')
        <h1> <p>Create Your Post: </p></h1>
        <div class="flex-center position-ref full-height">
        <form action='/create' method='POST'>
                @csrf
               
                   <input type='file' name='picture' required>
                   <br>
                   <br>
                   <label for='paragraph'> Description: </label>
                   <textarea name='paragraph' cols='20' rows='10' required></textarea>
                   <br>
                   <br>
                   <button> POST </button>
                </form>
</div>
@endsection