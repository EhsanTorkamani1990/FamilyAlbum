@extends('layouts.app2')
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h3 id="register1">{{"آلبوم را فقط با نام کاربر اشتراک کنید"}}</h3>
<br>
<div id="register1">
        {!!Form::open(['action'=>'AlbumsController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        {!! csrf_field() !!}
        {!!Form::text('name', '',['placeholder' => 'نام خود را وارد کنید'])!!}
        {!!Form::text('name_alex', '',['placeholder' => 'از قسمت کاربران انلاین نام کاربر را وارد کنید '])!!}
        {!!Form::textarea('description', '',['placeholder' => 'توضیحات آلبوم' ])!!}
        {!!Form::file('cover_image')!!}
        {!!Form::submit('ساخت آلبوم' , ['class'=> 'btn btn-primary'])!!} 
        {!!Form::close()!!}
</div>
@endsection