@extends('layouts.app')

@section('content')
    <h2><a href='/posts' class = 'btn btn-info'>Back</a></h2><br>
    <h3 style="font-size:20px;">{{$post->title}}</h3>
    <br>
    <div>
        {{$post->body}}
    </div>
    <br>
    
    <hr>
   
@endsection 