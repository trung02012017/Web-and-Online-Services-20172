<div class="navbar-wrapper2 navbar-fixed-top" style="min-height: 110px;">
    <div class="container">
  <div class="navbar mtnav" style="top: 30px;">

    <div class="container offset-3">
      <!-- Navigation-->
      <div class="navbar-header">
      <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="{{url('/')}}" class="navbar-brand"><img src="{{asset('images/logo.png')}}" alt="Travel Agency Logo" class="logo" style="display: inline-block; width: 200px;"></a>
      </div>
      <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="dropdown">
        @if(!session('username'))
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Tài khoản<b class="lightcaret mt-2"></b></a>
        @else
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo session('username'); ?><b class="lightcaret mt-2"></b></a>
        @endif
        <ul class="dropdown-menu">
          @if(!session('userid'))
          <li><a href="{{url('login')}}">Đăng nhập</a></li>
          <li><a href="#">Đăng ký</a></li>
          @else
          <li><a href="{{url('logout')}}">Đăng xuất</a></li>
            <li><a href="{{url('/profile/' . session('userid'))}}">Thông tin tài khoản</a></li>
          @endif
        </ul>
        </li>
        @if(session('admin') == 1)
          <li><a href="{{url('/admin')}}">Quản lý</a></li>
        @endif
      </ul>
      </div>
      <!-- /Navigation-->
    </div>

      </div>
    </div>
  </div>
