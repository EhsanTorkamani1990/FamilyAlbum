@extends('layouts.alfa')
@section('content')
<div class="container">
<h3 style="color:blue;text-align:center">لطفا در این بخش فقط عکس های آقا جون و مامان زری اپلود شود  </h3>
<h3 style="color:red;text-align:center"></h3>
<form action="{{ url('image-gallery') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-md-5">
            <strong>عنوان:</strong>
            <input type="text" name="title" class="form-control" placeholder="عنوان">
        </div>
        <div class="col-md-5">
            <strong>عکس:</strong>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-md-2">
            <br/>
            <button type="submit" class="btn btn-primary">آپلود</button>
        </div>
    </div>
</form> 
<div class="row">
<div class='list-group gallery'>
        @if($images->count())
            @foreach($images as $image)
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>

                <a class="thumbnail fancybox" rel="ligthbox" href="/storage/images2222/{{ $image->image }}">
                    <img class="img-responsive" alt="" src="/storage/images2222/{{ $image->image }}" />
                    <div class='text-center'>
                        <small class='text-muted'>{{ $image->title }}</small>
                    </div> <!-- text-center / end -->
                </a>
                <form action="{{ url('image-gallery',$image->id) }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    {!! csrf_field() !!}
                    <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>
            </div> <!-- col-6 / end -->
            @endforeach
        @endif
    </div> <!-- list-group / end -->
</div> <!-- row / end -->
</div> <!-- container / end -->
@endsection