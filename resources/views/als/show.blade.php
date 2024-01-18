@extends('layouts.index')
@section('content')
<br>
<br>
<br>
<br>
    <h1  id="register1">{!!$als->name!!}</h1>
    <a class="button button2" href="/als">{{"به عقب برگرد"}}</a>
    <a class="button button4" href="/phs/create/{{$als->id}}">{{"آپلود عکس"}}</a>
    <!--<a class="button alert" href="/albums/show">حذف البوم</a>-->
    <hr>
   @if(count($als->phs) > 0 )
    <?php
        $colcount = count($als->phs);
        $i = 1; 
    ?>
    <div id="phs">
        <div class="row text-center">
        @foreach($als->phs as $photo) 
            @if($i == $colcount)
                <div  id="forcenter" class="medium-4 columns end float-right">
                        <a href="/phs/{{$photo->id}}">
                        <img class="thumbnail" src="/storage/phs/{{$photo->al_id}}/{{$photo->photo}}" alt="$photo->title">
                        </a>
                        <br>   
                        <h41>{{$photo->title}}</h41>
                        <h4>{{$photo->description}}</h4>
 
            @else
                <!--<div class="medium-4 columns">
                <a href="/photos/{{$photo->id}}">
                        <img class="thumbnail" src="/storage/photos/{{$photo->al_id}}/{{$photo->photo}}" alt="$photo->title">
                        </a>
                        <br>   
                        <h4>{{$photo->title}}</h4>  -->
                        <div   id="forcenter" class="medium-4 columns end float-right">
                        <a href="/phs/{{$photo->id}}">
                        <img class="thumbnail" src="/storage/phs/{{$photo->al_id}}/{{$photo->photo}}" alt="$photo->title">
                        </a>
                        <br>   
                        <h41>{{$photo->title}}</h41>
                        <h4>{{$photo->description}}</h4>
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
