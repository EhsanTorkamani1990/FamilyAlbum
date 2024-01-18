<div id="for_nav" class="top-bar-right">
    <div class="row">
        <div>
            <ul class="menu">
                <li id="family_album" class="menu-text">{{"Family  Album"}} </li>
               @if(!Auth::check())
                <li><a href="{!!  asset('/login') !!}">{{"ورود به حساب کاربری"}} </a></li>
               @else
               <li>
               <div class="dropdown">
  <button class="dropbtn">آلبوم</button>
  <div class="dropdown-content">
  <a href="/als">آلبوم خصوصی</a>
  <a href="/als/create">{{"ساخت آلبوم خصوصی "}}</a>
  <a href="/albums">آلبوم های به اشتراک </a>
  <a href="/albums/create">{{"ساخت آلبوم با یک کاربر "}}</a>
  <a href="/image-gallery">{{"عکس های آقا جون و مامان زری"}}</a>
  <a href="/box/share">{{"عکس همه فامیل "}}</a>
  <a href="/box/share/create/{user}">{{"اپلود برای فامیل "}}</a>
  <a href="/dropzone">{{"آلبوم  با سلیقه همه فامیل "}}</a>
  </div>
</div>
</li>
<li>
 <div class="dropdown">
  <button class="dropbtn"> فامیل</button>
  <div class="dropdown-content">
  <a href="/profile/<?php
                    $user = auth()->user();
                    print($user->id);
                ?>">پروفایل کاربری</a>
  <a href="/xs">فالویینگ های  من</a>
  <a href="/check">کاربران انلاین</a>
  </div>
</div>
</li>
<li>
<div class="dropdown">
  <button class="dropbtn">{{"نظرات"}}</button>
  <div class="dropdown-content">
  <a href="{!! asset('/devices/create') !!}">{{"نظر سنجی"}}</a>
  </div>
</div>
</li>
<li>
<div class="dropdown">
  <button class="dropbtn">{{"شعر"}}</button>
  <div class="dropdown-content">
  <a href="/aghajoon">{{"سرودن شعر "}}</a>
  </div>
</div>
</li>
<li>
<div class="dropdown">
  <button class="dropbtn"> {{"خروج"}}</button>
  <div class="dropdown-content">
  <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{"خروج"}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form>
            </div>
            </div>
            </li>     
                @endif
            </ul>
        </div> 
    </div>
</div> 