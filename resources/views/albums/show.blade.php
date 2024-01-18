@extends('layouts.index')
@section('content')
<br>
<br>
@if (Auth::user()->can('manipulate-albums', $albums) || Auth::user()->name == $albums->name_alex )
{!!Form::open(['action'=>'AlbumsController@taghi','method'=>'get','enctype'=>'multipart/form-data'])!!}
        {!! csrf_field() !!}
        {!!Form::text('name22', '',['placeholder' => 'اسم را وارد کنید'])!!}
        {!!Form::submit('اشتراک' , ['class'=> 'button button2'])!!} 
        {!!Form::close()!!}
@endif
<br>
    <h3 style="color:blue;"> Shared   With   {{$albums->name_alex}} & {{$albums->user->name}} For The first time </h3>
<br>
<br>
    <h1 style="color:blue;"  id="register1">{!!$albums->name!!}</h1>
    <a class="button button2" href="/">{{"به عقب برگرد"}}</a>
    <a class="button button4" href="/photos/create/{{$albums->id}}">{{"آپلود عکس"}}</a>
    <!--<a class="button alert" href="/albums/show">حذف البوم</a>-->
    <hr>
   @if(count($albums->photos) > 0 )
    <?php
        $colcount = count($albums->photos);
        $i = 1; 
    ?>
    <div id="photos">
        <div class="row text-center">
        @foreach($albums->photos as $photo) 
            @if($i == $colcount)
                <div  id="forcenter" class="medium-4 columns end float-right">
                        <a href="/photos/{{$photo->id}}">
                        <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="$photo->title">
                        </a>
                        <br>   
                        <h41 style="color:blue;">{{$photo->title}}</h41>
                        <h4 style="color:blue;">{{$photo->description}}</h4>
            @else
                <!--<div class="medium-4 columns">
                <a href="/photos/{{$photo->id}}">
                        <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="$photo->title">
                        </a>
                        <br>   
                        <h4>{{$photo->title}}</h4>  -->
                        <div   id="forcenter" class="medium-4 columns end float-right">
                        <a href="/photos/{{$photo->id}}">
                        <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="$photo->title">
                        </a>
                        <br>   
                        <h41 style="color:blue;">{{$photo->title}}</h41>
                        <h4 style="color:blue;">{{$photo->description}}</h4>
            @endif
            @if($i % 3 == 0 )
            </div></div><div class="row text-center">
            @else
                </div>
            @endif
            <?php $i++; ?>
        @endforeach
        
        </div>
    </div>
    @else
        <p  id="register1">{{"در حال حاضر عکسی در این آلبوم موجود نیست"}}</p>
    @endif
@endsection
