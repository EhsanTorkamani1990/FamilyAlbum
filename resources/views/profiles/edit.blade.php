@extends('layouts.un')
@section('content')
<br>
<div id="idd" class="container">
<form action="/profile/{{$user->id}}/" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
            <div class="row pr-5">
                <div class="col-8 offset-2">
                <div class="row">
                        <h1>{{"ویرایش پروفایل"}}</h1>
                </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label">عنوان</label>
                                <input id="title"
                                type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="title"
                                value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label">توضیحات</label>
                                <input id="description"
                                type="text"
                                    class="form-control @error('description') is-invalid @enderror"
                                    name="description"
                                value="{{ old('description') }}" required autocomplete="description" autofocus>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label">لینک </label>
                                <input id="url"
                                type="text"
                                    class="form-control @error('url') is-invalid @enderror"
                                    name="url"
                                value="{{ old('url') }}" required autocomplete="url" autofocus>
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="row">
                        <label for="image" class="col-md-4 col-form-label">عکس پروفایل</label>

                        <input type="file" , class="form-control-file" id="image" name="image">
                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                     <div class="row pt-4">
                            <button class="btn btn-primary">ذخیره</button>
                     </div>
            </div>
            </div> 
            </form>
</div>
@endsection
