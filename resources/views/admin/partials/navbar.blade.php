<ul class="nav navbar-nav primary-nav list-unstyled">
  <li><a href="/">Main Home</a></li>
  @if (Auth::check())
    <li @if (Request::is('admin/biz*')) @endif>
      <a href="/admin"><i class="fa fa-home"></i> Admin Home</a>
    </li>
    <li @if (Request::is('admin/user*')) @endif>
      <a href="/admin/user"><i class="fa fa-user"></i> User</a>
    </li>
    <li @if (Request::is('admin/message*')) @endif>
      <a href="/admin/message"><i class="fa fa-user"></i> Messages</a>
    </li>
    <li @if (Request::is('admin/biz*')) @endif>
      <a href="/admin/biz">Businesses</a>
    </li>
    <li @if (Request::is('admin/cat*')) @endif>
      <a href="/admin/cat">Categories</a>
    </li>
    <li @if (Request::is('admin/location*')) @endif>
      <a href="/admin/location">Location <i class="fa fa-map-marker"></i></a>
    </li>
    <li @if (Request::is('admin/upload*')) @endif>
      <a href="/admin/upload"><i class="fa fa-upload"></i> Uploads</a>
    </li>
  @endif
</ul>

<!-- <ul class="nav navbar-nav navbar-right">
  @if (Auth::guest())
    <li><a href="/auth/login">Login</a></li>
  @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
         aria-expanded="false">{{ Auth::user()->username }}
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="/auth/logout">Logout</a></li>
      </ul>
    </li>
  @endif
</ul> -->