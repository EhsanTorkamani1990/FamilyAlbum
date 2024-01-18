@extends('layouts.master')
@section('title')
{{"شعر"}}
@endsection
@section('content')
    <section style="text-align:right;" class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>این لینک در حال ارتقاست</h3></header>
            <form action="{{ route('post.create') }}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post"   rows="5" placeholder="شعر"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">ثبت شعر</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>  
    <section style="text-align:right;" class="row posts">
        <div class="col-md-6 col-md-offset-3">
             <header><h3>اشعار</h3></header>
             <?php 
            // namespace App\Http\Controllers;
             //use Illuminate\Http\Request;
            // use App\Pool;
             use App\Post;
            $posts = Post::all();
                    // return view('dashboard')->with('posts',$posts);
                     //$posts = Post::all()->get();
                    // $post_id = $posts->id;
             ?>
             @foreach($posts as $post)
             <article class="post">
                <p>{{ $post->body }} </p>
                <div class="info">
                    Posted By {{ $post->user->name }} On {{"2012"}}
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                 {!!Form::open(['action' => ['PostController@destroysher' , $post->id],'method'=>'POST'])!!}
                    {!! csrf_field() !!}
                    {!!Form::hidden('_method','DELETE')!!}
                    {!!Form::submit('Delete' , ['class'=> 'btn btn-danger'])!!} 
                    {!!Form::close()!!}
                </div>
             </article>
             @endforeach
        </div>
    </section> 
@endsection