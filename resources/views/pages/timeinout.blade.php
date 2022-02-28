@extends('layouts.app')


@section('content')
<br>
{!! Form::open(['action' => 'App\Http\Controllers\PagesController@timeinout','method'=>'POST']) !!}
{{Form::submit('Time In',['class' => 'btn btn-success', 'name'=>'submitbutton', 'value' => 'Time In', 'style' => 'width:610px; height:450px; font-size:100px;'])}} 
{{Form::submit('Time Out',['class' => 'btn btn-danger', 'name'=>'submitbutton', 'value' => 'Time Out', 'style' => 'width:610px; height:450px; font-size:100px;'])}}  

            
{!! Form::close() !!}


        
        
      
@endsection  




