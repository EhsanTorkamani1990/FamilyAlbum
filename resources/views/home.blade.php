@extends('layouts.un')
@section('content')

    <div style="text-align:right;"  class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Family Album</div>
                    <div class="card-body">
                        @php $users = DB::table('users')->get(); @endphp
                        <div class="container table-responsive-xl">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th id="register22">نام کاربری </th>
                                    <th id="register22">ایمیل</th>
                                    <th id="register22">وضعیت</th>
                                    <th id="register22">آخرین بازدید</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td> <a class="pr-3" href="/profile/{{$user->id}}">{{$user->name}}</a></td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if(Cache::has('user-is-online-' . $user->id))
                                                <span class="text-success">Online</span>
                                            @else
                                                <span class="text-secondary">Offline</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
