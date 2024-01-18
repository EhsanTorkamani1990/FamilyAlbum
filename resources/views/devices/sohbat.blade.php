@extends('layouts.app2')
@section('content')
@php $users = DB::table('users')->get(); @endphp
<div id="xbeta" class="container">
<a name="identifier2"></a>
<a href="#identifier"><i class="fa fa-arrow-down" style="font-size:25px;color:blue"></i></a>
            <table  class="table table-striped">
                @foreach ($devices as $device)
                <tr>
                <td><span>{{  $device->name     }}</span></td>
                <td><span>{{ $device->description  }}</span></td>
                <td><span>{{ \Carbon\Carbon::parse($device->created_at)->diffForHumans() }}</span></td>
                </tr>
                @endforeach
            </table>
            <a name="identifier"></a>
<a href="#identifier2"><i class="fa fa-arrow-up" style="font-size:25px;color:blue"></i></a>
<div>
@endsection