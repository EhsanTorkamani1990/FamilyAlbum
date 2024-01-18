@extends('layouts.app2')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    } 
</style>
@section('content')
<div class="container">
<a name="identifier2"></a>
    <div style="direction:rtl;overFlow-x:true;" class="row justify-content-center">
      
        <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                
                <div class="card-header"> <p style="text-align:right;">({{   $post->first_name  }}) </p>
                <a href="#identifier"><i class="fa fa-arrow-down" style="font-size:25px;color:blue"></i></a>
        <a style="text-align:left;text-decoration:none" href="/post/show/{{ $post->id }}" ><i class="fa fa-arrow-left" style="font-size:25px;color:blue"></i></a>
                </div>
                    <form  method="post" action="{{ route('post.update',array('post'=>$post))}}">
                    @csrf
            @method('PATCH')
                        <div class="form-group">
                            @csrf
                            @if( Auth::user()->name == $post->user->name) <input  type="text" name="first_name" class="form-control" value=" {{ $post->first_name }}" required>  @endif</input>
                        </div>
                        <div  class="form-group">
                            @if( Auth::user()->name == $post->user->name) <textarea width="100%"  name="last_name" rows="10" cols="30" class="form-control" required>@endif {{   $post->last_name  }} </textarea>
                        </div>
                        @if( Auth::user()->name == $post->user->name)
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ویرایش" />
                        </div>
                        @endif
                    </form>
                    <p style="text-align:center;">
                        <div style="float:left;text-align:left;">
                        @foreach ($post->likes as $user)
                             <p>{{ $user->name }} ❤️ Liked This Post {{"\n"}}</p>
                       @endforeach   
                        </div>
                    </p>
                    <hr/>
                    <hr />
                    <h4 style="text-align:right;">لطفا نظر خود را بیان کنید </h4>
                    @include('partials._comment_replies', ['commennts' => $post->commennts, 'post_id' => $post->id])
                    <hr />
                    <h4>ثبت نظر </h4>
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ثبت نظر" />
                        </div>
                    </form>
                    <a name="identifier"></a>
                    <a href="#identifier2"><i class="fa fa-arrow-up" style="font-size:25px;color:blue"></i></a>
                </div>
         
        </div>
    </div>
@endsection