@extends('layouts.app2')
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
        <h3 id="register1">{{"آلبوم خصوصی"}}</h3>
        <br>
        <div id="register1">
        {!!Form::open(['action'=>'AlController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        {!! csrf_field() !!}
        {!!Form::text('name', '',['placeholder' => 'نام آلبوم '])!!}
        {!!Form::textarea('description', '',['placeholder' => 'توضیحات آلبوم' ])!!}
        {!!Form::file('cover_image')!!}
        {!!Form::submit('ساخت آلبوم' , ['class'=> 'btn btn-primary'])!!} 
        {!!Form::close()!!}
        </div>
@endsection