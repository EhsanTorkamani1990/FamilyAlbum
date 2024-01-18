<div class="topnav" id="myTopnav">
  <a href="https://torkamani.org" class="active">Torkamani.org</a>
  <div class="dropdown">
    <button class="dropbtn">شعر
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/posts">سرودن شعر </a>
      <a href="/livetable">شعر با ویرایش راحت </a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">چت
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    
      <a href="/chatify">{{ "چت خصوصی"}}</a>
    </div>
  </div> 
  <!--a href="/aghajoon">{{"سرودن شعر "}}</a-->
  @if(!Auth::check())
  <a href="{!!  asset('/login') !!}">{{"ورود به حساب کاربری"}} </a>
  @else
  <div class="dropdown">
    <button class="dropbtn">آلبوم
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/als">آلبوم خصوصی</a>
      <a href="/als/create">{{"ساخت آلبوم خصوصی "}}</a>
      <a href="/albums">آلبوم های به اشتراک </a>
      <a href="/albums/create">{{"ساخت آلبوم با یک کاربر "}}</a>
      <a href="/image-gallery">{{"عکس های آقا جون و مامان زری"}}</a>
    </div>
  </div> 
  <div class="dropdown">
  <button class="dropbtn">پروفایل
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="/profile/<?php
                    $user = auth()->user();
                    print($user->id);
                ?>">پروفایل کاربری</a>
  <a href="/xs">فالووئینگ</a>
  <a href="/check">کاربران آنلاین</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">فعالیت ها
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="/logActivity3"> فعالیت های کاربران </a>
      <a href="/logActivity"> فعالیت های شما  </a>
      <a href="/logActivity2">زمانهای ورود شما </a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">نظر سنجی
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="{!! asset('/devices/create') !!}">نظر سنجی </a>
      <a href="/devices">همه ی نظرات </a>
    </div>
  </div> 

  <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{"خروج"}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form>  
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  @endif
</div>
