@extends('layouts.app')

@section('content')

    <h1>Recent Announcement</h3>
            
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card p-3 mt-3 mb-3">
                <h3><a href = "/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small> By {{$post->user->name}}</small>
                
            </div>
        @endforeach
        
    @else 
            <p> No Post Found </p>
       
    @endif
    
@endsection