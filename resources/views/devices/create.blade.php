@extends('layouts.app2')
@section('content')
<br>
<br>
<br>
<h1 id="forcenter">{{"ارتباط با ما"}}</h1>
<div id="" class="container">
    <form method="POST" action="/devicesaction">
        {{ csrf_field() }}
       <div>
       <h2 id="forcenter"> <label ><h423 id="forcenter">{{"نام شما"}}</h423></label></h2>
          <input  type="text" name="name" placeholder="name">
      </div>
      <div>
      <h3 id="forcenter">  <label ><h348 id="rangesefid">{{"لطفا پیام خود را وارد کنید"}}</h348></label></h3>
            <textarea style="height:255px;" name="description" placeholder="پیام"></textarea>
      </div>
      <div>
        <input style="margin-top:12px;text-align:center;float:right;"  type="submit" class="btn btn-primary" value="ارسال">
      </div>
    </form>  
 </div>  
@endsection
