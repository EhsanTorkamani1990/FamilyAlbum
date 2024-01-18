@foreach($commennts as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a style="text-decoration:none;" href="/post/like/{{  $comment->id  }}">{{ $comment->likes2->count() }}  ❤️</a>
        <p style="font-size:12px;color:blue;">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
        <a href="" id="reply"></a>

        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="پاسخ" />
            </div>
        </form>
        @if($comment->user->id == Auth::user()->id)
                {!!Form::open(['action' => ['CommenntController@destroycc' , $comment->id],'method'=>'POST'])!!}
                {!! csrf_field() !!}
                {!!Form::hidden('_method','DELETE')!!}
                {!!Form::submit('حذف' , ['class'=> 'btn btn-danger'])!!} 
                {!!Form::close()!!}
            @endif
             @include('partials._comment_replies', ['commennts' => $comment->replies])
    </div>
@endforeach