@extends('layouts.app2')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
<div class="container">

<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center"></h3><br />
   <div class="panel panel-default">
    <div class="panel-heading"> posted By{{"  "}}    {{  $post->user->name  }}</div>
    <div class="panel-body">
     <div id="message"></div>
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
 
       </thead>
       <tbody>
       
       </tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){

 fetch_data();

 function fetch_data()
 {
  $.ajax({
   url:"/posts/fetch_data/{{ $post->id }}",
   dataType:"json",
   success:function(data)
   {
    var html = '';

    for(var count=0; count < data.length; count++)
    {
     html +='';
     html +='<p  @if($post->user->id == Auth::user()->id) contenteditable @endif class="column_name" data-column_name="first_name" data-id="'+data[count].id+'">'+data[count].first_name+'</p>';
     html += '<b><pre style="font-family:sans-serif;background-color:white;font-size:17px;"    @if($post->user->id == Auth::user()->id) contenteditable @endif class="column_name tab" data-column_name="last_name" data-id="'+data[count].id+'">'+ data[count].last_name +'</pre></b>';
    /* html += '<pre><button type="button" class="btn btn-danger btn-xs delete" id="'+data[count].id+'">Delete</button></td></pre>';*/
    }
    $('tbody').html(html);
   }
  });
 }

 var _token = $('input[name="_token"]').val();

 $(document).on('click', '#add', function(){
  var first_name = $('#first_name').text();
  var last_name = $('#last_name').text();
  if(first_name != '' && last_name != '')
  {
   $.ajax({
    url:"{{ route('posts.add_data') }}",
    method:"POST",
    data:{first_name:first_name, last_name:last_name, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_data();
    }
   });
  }
  else
  {
   $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
  }
 });

 $(document).on('blur', '.column_name', function(){
  var column_name = $(this).data("column_name");
  var column_value = $(this).text();
  var id = $(this).data("id");
  
  if(column_value != '')
  {
   $.ajax({
    url:"{{ route('posts.update_data') }}",
    method:"POST",
    data:{column_name:column_name, column_value:column_value, id:id, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
    }
   })
  }
  else
  {
   $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
  }
 });

 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this records?"))
  {
   $.ajax({
    url:"{{ route('posts.delete_data') }}",
    method:"POST",
    data:{id:id, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_data();
    }
   });
  }
 });
});

</script>
<a name="identifier2"></a>
    <div style="direction:rtl;overFlow-x:true;margin-bottom:22px;" class="row justify-content-center">
        <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                <div class="card-header"> <!--p style="text-align:right;">({{   $post->first_name   }})</p-->
                @if($post->user->id == Auth::user()->id)
                     <a href="{{ route('post.edit',array('post'=>$post))}}"  role="button"><i class="fa fa-pencil" style="font-size:28px;color:blue"></i></a>
                    @endif
        <a style="text-align:left;text-decoration:none" href="/posts" ><i class="fa fa-arrow-left" style="font-size:25px;color:blue"></i></a>

        <a href="#identifier"><i class="fa fa-arrow-down" style="font-size:25px;color:blue"></i></a>
                </div>
                
                     <!--pre  contenteditable class="column_name" data-column_name="last_name" data-id="data[count].id"  style="text-align:center;margin-bottom:22px;font-style:italic;font-Size:17px;" ><br> &#127804;{{ $post->last_name }}&#127804;<hr></pre-->

                    <br>
                    <br>
                    <p style="text-align:center;">
                        <div style="float:left;text-align:left;">
                        @foreach ($post->likes as $user)
                             <p>{{ $user->name }} ❤️ Liked This Post {{"\n"}}</p>
                       @endforeach   
                        </div>
                    </p>
                    <hr/>
                    <h4 style="text-align:right;">لطفا نظر خود را بیان کنید </h4>
                    @include('partials._comment_replies', ['commennts' => $post->commennts, 'post_id' => $post->id])
                    <hr />
                    <a name="identifier"></a>
                    <h4>ثبت نظر </h4>
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ثبت نظر" />
                        </div>
                    </form>
                    <a href="#identifier2"><i class="fa fa-arrow-up" style="font-size:25px;color:blue"></i></a>
                </div>  
        </div>
    </div>
@endsection