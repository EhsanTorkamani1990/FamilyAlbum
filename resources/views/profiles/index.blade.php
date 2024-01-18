@extends('layouts.un')
@section('content')
<div id="idd" class="container">
    <div class="row">
        <div class="col-3">
           <img  src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9">     
        <div class="d-flex justify-content-between align-items-baseline">
        <div  class="d-flex align-items-center pb-3">
                <div class="h4">{{$user->name}}</div>
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
        </div>
        @can('update',$user->profile)
  <a style="text-decoration:none;" href="/p/create">{{"پست جدید"}}</a>
  @endcan
        </div>      
        @can('update',$user->profile)
            <a class="d-flex" href="/profile/{{$user->id}}/edit">Edit Profile</a>
        @endcan
            <div class="d-flex">
                <div class="pl-2"><strong>{{ $user->pools->count() }}</strong>Posts</div>
                <div class="pl-2"><strong>{{ $user->profile->followers->count() }}</strong>Follwers</div>
                <div class="pl-2"><strong>{{ $user->following->count()}}</strong>Following</div>
            </div>
            <br>
            <br>
                <div class="d-flex" class="pt-4 font-weight-bold"><b>{{$user->profile->title}}</b></div>
                <div class="d-flex"><b>{{$user->profile->description}}</b></div>
                <div class="d-flex"><a href="#"><b>{{$user->profile->url}}</b></a></div>
        </div>
    </div>
    <div class="row pt-5">
    @foreach($user->pools as $pool)
        <div class="col-4 pb-4">
            <a href="/p/{{$pool->id}}">
                 <img src="/storage/{{$pool->image}}" style="border:2px solid blue;border-radius:10px;height:150px;width:150px;"   class="w-100">
                 <div id="naghi2">
                 @can('update',$user->profile)
                    {!!Form::open(['action' => ['ProfilesController@destroy' , $pool->id],'method'=>'POST'])!!}
                    {!! csrf_field() !!}
                    {!!Form::hidden('_method','DELETE')!!}
                    {!!Form::submit('حذف عکس' , ['class'=> 'btn btn-danger'])!!} 
                    {!!Form::close()!!}  
                @endcan
                </div>
            </a>
        </div>
    @endforeach
    </div>
</div>
@endsection
