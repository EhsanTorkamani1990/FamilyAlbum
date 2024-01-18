@extends('layouts.app2')
@section('content')
<div id="xbeta"  class="container">
	<h1>Log Activity Lists</h1>
	<a name="identifier2"></a>
	<a style="text-align:right;float:right;" href="#identifier"><i class="fa fa-arrow-down" style="font-size:25px;color:blue"></i></a>
	<table style="text-align:right;"  class="table table-striped">
		<tr>

			<th style="border:2px solid blue;">شماره</th>
			<th style="border:2px solid red;">فعالیت</th>
			<th style="border:2px solid blue;">URL</th>
			<th style="border:2px solid blue;">Method</th>
			<th style="border:2px solid yellow;background-color:red;color:white;">Ip</th>
			<th style="border:2px solid yellow;background-color:red;color:white;">User Agent</th>
			<th style="border:1px solid blue;">Name</th>
			<th style="border:1px solid blue;">user_id</th>
			<th style="border:1px solid blue;">email</th>
			<th  style="border:2px solid red;">زمان</th>
		</tr>
		@if($logs->count())
			@foreach($logs as $key => $log)
				@if($log->user_id == Auth::user()->id)
				<tr>
					<td style="border:2px solid blue;">{{ ++$key }}</td>
					<td style="border:2px solid red;">{{ $log->subject }}</td>
					<td style="border:2px solid blue;" class="text-success">{{ $log->url }}</td>
					<td style="border:2px solid blue;"><label class="label label-info">{{ $log->method }}</label></td>
					<td style="border:2px solid yellow;background-color:red;color:white;">{{ $log->ip }}</td>
					<td style="border:2px solid yellow;background-color:red;color:white;" >{{ $log->agent }}</td>
					<td style="border:1px solid blue;">{{ $log->name }}</td>
					<td style="border:1px solid blue;">{{ $log->user_id }}</td>
					<th style="border:1px solid blue;">{{ $log->email }}</th>
					<td  style="border:2px solid red;"><span>{{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</span></td>
				</tr>
				@endif
			@endforeach
		@endif
	</table>
	<a name="identifier"></a>
	<a style="text-align:right;float:right;" href="#identifier2"><i class="fa fa-arrow-up" style="font-size:25px;color:blue"></i></a>
</div>
@endsection