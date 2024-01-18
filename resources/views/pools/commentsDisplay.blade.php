@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>

        <a href="/profile/{{$comment->user->id}}">{{ $comment->user->name }}</a>
        <img   src="{{$comment->user->profile->profileImage()}}" style="max-width:40px;" class="rounded-circle w-100">

        <p>{{ $comment->caption }}</p>    
        <a href="" id="reply">
        </a>
        @if($comment->user->id == Auth::user()->id)
                {!!Form::open(['action' => ['CommentController@destroycc' , $comment->id],'method'=>'POST'])!!}
                {!! csrf_field() !!}
                {!!Form::hidden('_method','DELETE')!!}
                {!!Form::submit('حذف' , ['class'=> 'btn btn-danger'])!!} 
                {!!Form::close()!!}
            @endif
        <form style="text-align:right;"  method="post" action="/ahmadtorkamani/pool">
            @csrf
   <input type="text" name="caption" class="form-control" />
                <input type="hidden" name="pool_id" value="{{ $pool_id }}" />
   
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
  <div class="form-group">
                <input  type="submit" class="btn btn-primary" value="Reply" />
            </div>
        </form>
  @include('pools.commentsDisplay', ['comments' => $comment->replies])
</div>
@endforeach

