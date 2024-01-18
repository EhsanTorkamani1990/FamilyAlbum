@extends('layouts.un')
@section('content')
        <br>
        <br>
        <br>
          <div id="idd" class="container"> 
          <br>
          <a class="pt-5 pl-5 pr-5" style="text-decoration:none;"  href="/profile/{{Auth::user()->id}}">برو به پروفایل من</a> 
             <form action="/p" enctype="multipart/form-data" method="post">
             @csrf
             <div class="row pr-5">
                    <div class="col-8 offset-2">
                    <div class="row">
                         <h1>پست جدید</h1>
                    </div>
                         <div class="form-group row">
                              <label for="caption" class="col-md-4 col-form-label">عنوان پست</label>
                                   <input id="caption"
                                    type="text"
                                     class="form-control @error('caption') is-invalid @enderror"
                                     name="caption"
                               
                                    value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                                   @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                        </span>
                                   @enderror
                         </div>
                         <div class="row">
                         <label  for="image" class="col-md-4 col-form-label">پست عکس</label>

                         <input type="file" , class="form-control-file" id="image" name="image">
                         @error('caption')
                              <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                              </span>
                         @enderror
                         </div>
                         <div class="row pt-4">
                              <button class="btn btn-primary">پست عکس</button>
                         </div>
               </div>
               </div> 
             </form>
          </div>   
@endsection
