@extends('layouts.un')
@section('content')
<br>
<br>
<br>
<br>
    <div id="idd" class="container">  
        <div class="row">
        <div class="col-6 col-xs-6 col-md-6">
                <img src="/storage/{{$pool->image}}"  class="w-100">
            </div>
            <div class="col-6">
                <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$pool->user->profile->profileImage()}}" style="max-width:40px;" class="rounded-circle w-100">
                    </div>
                <div>
                    <div class="font-weight-bold">
                        <a class="pr-3" href="/profile/{{$pool->user->id}}">
                            <span class="text-dark">{{$pool->user->name}}</span>
                        </a>
                    </div>
                </div>
                    </div>
                    <!-- <h3>{{$pool->user->name}}</h3>-->
                    <hr>
                        <p class="pr-2" style="float:right"> 
                            <span class="font-weight-bold">
                                <a href="/profile/{{$pool->user->id}}">
                                    <span class="text-dark">
                                        {{$pool->user->name}}
                                    </span>
                                </a>
                            </span>  
                            {{$pool->caption}}
                        </p>       
                    </div>
                    <div class="studyhard">
                        @include('pools.commentsDisplay', ['comments' => $pool->comments, 'pool_id' => $pool->id])  
                    </div>
                    <form method="post" action="/ahmadtorkamani/pool">
                        @csrf
                        <div class="form-group">
                        <input  type="text" name="caption" class="form-control" />
                            <input   type="hidden" name="pool_id" value="{{ $pool->id }}" />
                        </div>
                        <div class="form-group">
                            <input style="float:right;" type="submit" class="btn btn-primary" value="ثبت نظر" />
                        </div>
                    </form>
            </div>
        </div>
    </div>  
@endsection
