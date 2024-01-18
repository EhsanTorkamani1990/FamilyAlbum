@extends('layouts.app2')
@section('content')
<div class="container">
    <div style="direction:rtl;text-align:right;" class="row justify-content-center">
        <div class="col-md-8">
        <a style="text-align:left;text-decoration:none" href="/posts" ><i class="fa fa-arrow-left" style="font-size:25px;color:blue"></i></a>
         
                <div class="card-header">سرودن شعر</div>
                <div class="card-body">
                    <form method="post" action="{{ route('post.store') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">عنوان شعر </label>
                            <input type="text" name="first_name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label class="label">متن شعر را بنویسید</label>
                            <textarea id="mahboobe" name="last_name" rows="10" cols="30" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ثبت شعر" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection