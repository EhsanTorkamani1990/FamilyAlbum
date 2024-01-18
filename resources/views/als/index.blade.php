@extends('layouts.index')
@section('content')
<br>
<br>
<br>
<br>

    @if(count($als) > 0 )
    <?php
        $colcount = count($als);
        $i = 1; 
    ?>
    <div id="als">
        <div class="row text-center">
        @foreach($als as $album) 
            @if($i == $colcount)
                <div  style="margin-right:15px"  class="medium-4 columns end float-right">
                @if (Auth::user()->can('manipulate-als', $album))
                        <a   href="/als/{!!$album->id!!}">
                        <img class="img-thumbnail"   src="/storage/albums_coversals/{!!$album->cover_image!!}" alt="$album->name">
                        </a>
                        <br>  
                        <h5>{{"نام آلبوم"}}<br>{{$album->name}}</h5> 
                        <h15><b>{{"توضیح"}}</b><br>{{$album->description}}</h15> 
                        <h4 id="xss">                
    {!!Form::open(['action' => ['AlController@destroy' , $album->id],'method'=>'POST'])!!}
    {!! csrf_field() !!}
    {!!Form::hidden('_method','DELETE')!!}
    <button type="submit" class="button button3">حذف</button>
    {!!Form::close()!!}
    @endif
    </h4>                       
            @else
            <div  style="margin-right:15px"  class="medium-4 columns end float-right">
            @if (Auth::user()->can('manipulate-als', $album))
                        <a href="/als/{!!$album->id!!}">
                        <img class="img-thumbnail" src="/storage/albums_coversals/{!!$album->cover_image!!}"  alt="$album->name">
                        </a>
                        <br>  
                        <h5 >{{"نام آلبوم"}}<br>{{$album->name}}</h5> 
                        <h15><b>{{"توضیح"}}</b><br>{{$album->description}}</h15> 
                        <h4 id="xss">                     
    {!!Form::open(['action' => ['AlController@destroy' , $album->id],'method'=>'POST'])!!}
    {!! csrf_field() !!}
    {!!Form::hidden('_method','DELETE')!!}
    <button type="submit" class="button button3">حذف</button>
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
        <p>{{"آلبوم خصوصی"}}</p>
    @endif
  <div>
  </div>
@endsection