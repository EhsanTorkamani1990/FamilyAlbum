@extends('layouts.app2')
@section('content')
<div id="xbeta"  class="container">
	<h1>فعالیت های کاربران </h1>
	<a name="identifier2"></a>
	<a style="text-align:right;float:right;" href="#identifier"><i class="fa fa-arrow-down" style="font-size:25px;color:blue"></i></a>
	<table style="text-align:right;"  class="table table-striped">
		<tr>

			<th>شماره</th>
			<th>فعالیت</th>
			<th>نام </th>
			<th>زمان</th>
			<th>ایمیل</th>
		</tr>
		@if($logs->count())
			@foreach($logs as $key => $log)
				<tr>
					<td style="border:2px solid blue;color:blue;">{{ ++$key }}</td>
					<td style="border:2px solid blue;color:blue;">{{ $log->subject }}</td>
					<td style="border:2px solid blue;color:blue;">{{ $log->name }}</td>
					<td  style="border:2px solid blue;color:blue;"><span>{{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</span></td>
					<td  style="border:2px solid blue;color:blue;"><span>{{ $log->email }}</span></td>
				</tr>
			@endforeach
		@endif
	</table>
	<a name="identifier"></a>
	<a style="text-align:right;float:right;" href="#identifier2"><i class="fa fa-arrow-up" style="font-size:25px;color:blue"></i></a>
</div>
@endsection