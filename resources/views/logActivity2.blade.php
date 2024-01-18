@extends('layouts.app2')
@section('content')
<div id="xbeta"  class="container">
	<h1 style="color:red;">زمان های ورود </h1>
	<a name="identifier2"></a>
	<a style="text-align:right;float:right;" href="#identifier"><i class="fa fa-arrow-down" style="font-size:25px;color:blue"></i></a>
	<table style="text-align:right;"  class="table table-striped">
		<tr>

			<th style="border:1px solid blue;">شماره فعالیت </th>
			<th style="border:1px solid blue;">ورود </th>
			<th style="border:1px solid blue;">لینک</th>
			<th style="border:1px solid blue;">Method</th>
			<th style="border:1px solid blue;">Ip</th>
			<th style="border:1px solid blue;">User Agent</th>
			<th style="border:1px solid blue;">Name</th>
			<th style="border:1px solid blue;">User  Id</th>
			<th style="border:1px solid blue;">email</th>
			<th style="border:1px solid blue;">زمان</th>
		</tr>
		@if($logs->count())
			@foreach($logs as $key => $log)
            @if($log->subject =='شما وارد وبسایت شدید')
			@if($log->user_id == Auth::user()->id)
			<tr>
				<td style="border:1px solid blue;"> <b style="color:red;">{{ ++$key }} </b></td>
				<td style="border:4px solid red;"> <b style="color:red;"> {{ $log->subject }}</b></td>
				<td style="border:1px solid blue;">{{ $log->url }}</td>
				<td style="border:1px solid blue;"><label class="label label-info">{{ $log->method }}</label></td>
				<td style="border:4px solid red;"> <b style="color:red;">{{ $log->ip }} </b> </td>
				<td style="border:1px solid blue;">{{ $log->agent }}</td>
				<td style="border:1px solid blue;">{{ $log->name }}</td>
				<td style="border:1px solid blue;">{{ $log->user_id }}</td>
				<th style="border:1px solid blue;">{{ $log->email }}</th>
				<td style="border:1px solid blue;"><span> <b style="color:red;">{{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}  </b></span></td>
			</tr>
			@endif
			@endif
			@endforeach
		@endif
	</table>
	<a name="identifier"></a>
	<a style="text-align:right;float:right;" href="#identifier2"><i class="fa fa-arrow-up" style="font-size:25px;color:blue"></i></a>
</div>
@endsection