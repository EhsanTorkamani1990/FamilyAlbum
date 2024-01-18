@extends('layouts.index')
@section('title')
    {{"آلبوم ترکمنی"}}
@endsection
@section('content')
<br>
<br>
<br>
<br>
<br>
    @if(count($albums) > 0 )
    <?php
        $colcount = count($albums);
        $i = 1; 
    ?>
    <div id="albums">
        <div class="row text-center">
        @foreach($albums as $album) 
        @if($i == $colcount)
                <div   class="medium-4 columns end float-right">
                @if (Auth::user()->can('manipulate-albums', $album) || Auth::user()->name == $album->name_alex || Auth::user()->name == $album->name22)
                        <a   href="/albums/{!!$album->id!!}">
                        <img class="img-thumbnail"   src="/storage/albums_covers/{!!$album->cover_image!!}" alt="$album->name">
                        </a>
                        <br>  
                        <h5>{{"نام اشتراک "}}<br>{{$album->name}}</h5> 
                        <h15><b>{{"توضیح"}}</b><br>{{$album->description}}</h15> 
                        <h4 id="xss">                    
    {!!Form::open(['action' => ['AlbumsController@destroy' , $album->description],'method'=>'POST'])!!}
    {!! csrf_field() !!}
    {!!Form::hidden('_method','DELETE')!!}
    {!!Form::submit('حذف آلبوم' , ['class'=> 'button button3'])!!} 
    {!!Form::close()!!}
    @endif
    </h4>                       
            @else
            <div   class="medium-4 columns end float-right">
                @if (Auth::user()->can('manipulate-albums', $album) ||  Auth::user()->name == $album->name_alex  || Auth::user()->name == $album->name22 ) 
                        <a href="/albums/{!!$album->id!!}">
                        <img class="img-thumbnail" src="/storage/albums_covers/{!!$album->cover_image!!}"  alt="$album->name">
                        </a>
                        <br>  
                        <h5 >{{"نام اشتراک"}}<br>{{$album->name}}</h5> 
                        <h15><b>{{"توضیح"}}</b><br>{{$album->description}}</h15> 
                        <h4 id="xss">                          
    {!!Form::open(['action' => ['AlbumsController@destroy' , $album->description],'method'=>'POST'])!!}
    {!! csrf_field() !!}
    {!!Form::hidden('_method','DELETE')!!}
    {!!Form::submit('حذف آلبوم' , ['class'=> 'button button3'])!!} 
    {!!Form::close()!!}
    @endif

    </h4> 
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
        <p>{{"آلبوم به اشتراک"}}</p>
    @endif
  <div>
  </div>

@endsection