@extends('layouts.un')
@section('content')
<br>
<br>
    <div id="idd" class="container">  
       @foreach($pools as $pool)
       <div class="row">
        <div class="col-6 offset-3">
                <a href="/profile/{{ $pool->user->id }}">
                    <img src="/storage/{{$pool->image}}" class="w-100">
                </a>
            </div>
        </div>
            <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
                <div>
                        <p> 
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
            </div>
        </div>
       @endforeach
       <div class="row">
           <div  class="col-12 d-flex justify-content-center">
                {{ $pools->links() }}
           </div>
       </div>
    </div>   
@endsection
