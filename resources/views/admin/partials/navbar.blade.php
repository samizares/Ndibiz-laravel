<ul class="nav navbar-nav">
  <li><a href="/">Main Home</a></li>
  @if (Auth::check())
    <li @if (Request::is('admin/biz*')) class="active" @endif>
      <a href="/admin/biz">Businesses</a>
    </li>
    <li @if (Request::is('admin/cat*')) class="active" @endif>
      <a href="/admin/cat">Categories</a>
    </li>
     <li @if (Request::is('admin/location*')) class="active" @endif>
      <a href="/admin/location">Location</a>
    </li>
    <li @if (Request::is('admin/upload*')) class="active" @endif>
      <a href="/admin/upload">Uploads</a>
    </li>
  @endif
</ul>

<ul class="nav navbar-nav navbar-right">
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
</ul>