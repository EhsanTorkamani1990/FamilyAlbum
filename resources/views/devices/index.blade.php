@extends('layouts.app2')
@section('content')
@php $users = DB::table('users')->get(); @endphp
<div id="xbeta" class="container">
<a name="identifier2"></a>
<a href="#identifier"><i class="fa fa-arrow-down" style="font-size:25px;color:blue"></i></a>

            <table  class="table table-striped">
                <thead>
                    <th> حذف</th>
                    <th>نام</th>
                    <th>توضیح</th>
                    <th>زمان</th>
                </thead>
                <tbody>
                @foreach ($devices as $device)
                <tr>
                     <td> 
                        @if( $device->user_id == Auth::user()->id)
                            {!!Form::open(['action' => ['DevicesController@destroy' , $device->id],'method'=>'POST'])!!}
                            {!! csrf_field() !!}
                            {!!Form::hidden('_method','DELETE')!!}
                            {!!Form::submit('حذف' , ['class'=> 'btn btn-danger '])!!} 
                            {!!Form::close()!!}
                        @endif
                     </td>
                <td><span>{{  $device->name     }}</span></td>
                <td><span><a style="text-decoration:none;" href="/sohbat/{{ $device->id }}">اینجا کلیک کنید</a></span></td>
                <td><span>{{ \Carbon\Carbon::parse($device->created_at)->diffForHumans() }}</span></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            
 <a name="identifier"></a>

<a href="#identifier2"><i class="fa fa-arrow-up" style="font-size:25px;color:blue"></i></a>
<div> 
@endsection

