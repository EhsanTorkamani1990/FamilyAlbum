@extends('layouts.app2')
@section('content')
@php $users = DB::table('users')->get(); @endphp
<div id="xbeta" class="container">
    <div style="direction:rtl;text-align:right;" class="row justify-content-center">
        <div   class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
        <a class="btn btn-primary rounded-circle" href="{{ route('post.create') }}">+</a>
        <br>
        <br>
        <p style="color:blue;font-style:sanserif;">شعر های شما تا الان : {{ auth()->user()->possts->count() }}</p>
        <!--p>{!! $posts->count() > 0 ? "<b>".$posts->count()."</b>" : '' !!}</p-->
            <table  class="table table-striped">
                <thead>
                <th style="font-size:17px;color:blue;text-align:right"></th>
                    <th  style="font-size:17px;color:blue;text-align:right">حذف شعر </th>
                    <th  style="font-size:17px;color:blue;text-align:right">عنوان شعر </th>
                    <th  style="font-size:17px;color:blue;text-align:right">ارسال از </th>
                    <th  style="font-size:17px;color:blue;text-align:right">زمان شعر</th>
                    <th  style="font-size:17px;color:blue;text-align:right"></th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                <td>
                      <a style="font-size:15px;text-decoration:none;" href="posts/like/{{ $post->id }}">❤️({{ $post->likes->count() }})</a>     
                </td>
                     <td> 
                     
                        @if($post->user->id == Auth::user()->id)
                            {!!Form::open(['action' => ['CommenntController@destroy' , $post->id],'method'=>'POST'])!!}
                            {!! csrf_field() !!}
                            {!!Form::hidden('_method','DELETE')!!}
                            {!!Form::submit('حذف' , ['class'=> 'btn btn-danger '])!!} 
                            {!!Form::close()!!}
                        @endif
                     </td>
                <td style="font-size:15px;color:blue;"><span>{{   $post->first_name    }}</span></td>
                <td style="font-size:15px;color:blue;"><span>{{   $post->user->name      }}</span></td>
                <td style="font-size:15px;color:blue;"><span>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span></td>
                    <td>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">خواندن</a>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div  class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
