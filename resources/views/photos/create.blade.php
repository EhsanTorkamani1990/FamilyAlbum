@extends('layouts.app2')
@section('content')
        <br>
        <br>
        <br>
        <br>
        <br>
        <div id="register1">
        <h3>{{"آپلود عکس "}}</h3>
        <hr>
                {!!Form::open(['action'=>'PhotosController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                {!! csrf_field() !!}
                {!!Form::text('title', '',['placeholder' => 'نام عکس جدید'])!!}
                {!!Form::textarea('description', '',['placeholder' => 'کامنت '])!!}
                {!! Form::hidden('album_id' , $album_id )!!}
                {!!Form::file('photo')!!}
                {!!Form::submit('آپلود' , ['class'=> 'button button2'])!!}
                {!!Form::close()!!}
        </div>

@endsection