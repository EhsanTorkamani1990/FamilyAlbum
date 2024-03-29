@extends('layouts.app')
@section('content')
<br>
<div id="ADHD"  class="container">

<br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(Session::has('fail'))
<div class="alert alert-danger">
   {{Session::get('fail')}}
</div>
@endif
                <div class="card-header"></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">  
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{'آدرس ایمیل:'}}</label>
                        
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                       <label for="password" class="col-md-4 col-form-label text-md-right"> {{'رمز عبور:'}}</label>
                       
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label id="padpad" class="form-check-label" for="remember">
                                         {{ __('مرا به خاطر بسپار') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                             </br>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ورود') }}
                                    </button>
                                @if (Route::has('password.request'))
                                    <a  class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('آیا رمز  خود را فراموش کرده اید؟') }}
                                    </a>
                                    <br>
                                    <a href="/register">Sign Up</a>
                                @endif
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
