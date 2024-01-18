@extends('layouts.app2')
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<h3>
    <a  href="/als/{!!$photo->al_id!!}"><h19 id="register1">{{"به گالری برگرد"}}</h19></a>
</h3>
    <hr>
    <img src="/storage/phs/{!!$photo->al_id!!}/{!!$photo->photo!!}" alt="{!!$photo->title!!}">
    <br><br>
    <div id="register1" >
        {!!Form::open(['action' => ['PhController@destroy' , $photo->id],'method'=>'POST'])!!}
        {!! csrf_field() !!}
        {!!Form::hidden('_method','DELETE')!!}
        {!!Form::submit('حذف عکس' , ['class'=> 'button btn-danger'])!!} 
        {!!Form::close()!!}
        <div>
        <h5>{{"نام عکس:"}}<br>{{$photo->title}}</h5> 
        <h15><b>توضیحاتی درباره عکس:</b><br>{{$photo->description}}</h15> 
        <br>
        <small>{{"Size:"}}{!!$photo->size!!}</small>
        </div>
</div>
@endsection
