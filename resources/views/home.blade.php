@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href = '/posts/create' class = 'btn btn-success'>Create Announcement</a>
                    <h3>Your Announcements<h3>
                    @if(count($posts)>0)
                    <table class ="table table-striped">
                        
                            <th>Title</th>
                            <th class = 'float-right mr-5'>Action</th>
                            

                        
                        @foreach($posts as $post)
                        </tr>
                            <td>{{$post->title}}</td>
                            
                            <td>
                                <a href = "/posts/{{$post->id}}/edit" class = "btn btn-success float-right " >Edit</a>
                                {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method' => 'POST', 'class' => 'float-right mr-1' ])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>

                        </tr>
                        @endforeach
                    </table>
                    @else
                            <p> You have no Announcements </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
