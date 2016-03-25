<div class="header-nav-bar">
    <div class="container">
        <nav class="hidden-lg hidden-md">
            <button><i class="fa fa-bars"></i></button>
            <ul class="primary-nav list-unstyled">
                @if (Auth::check())
                    <li class="hidden-lg hidden-md dropdown text-center">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                            <i class="fa fa-user"></i> {{Auth::user()->username}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
                            <li class=""><a href="#">View Profile</a></li>
                            <li class="divider"></li>
                            <li><a class="btn" href="/auth/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a class="btn" href="/auth/login" class=""><i class="fa fa-power-off"></i> <span>Login</span></a></li>
                    @endif
                            <!-- HEADER REGISTER -->
                    @if (Auth::guest())
                        <li><a class="btn" href="/auth/register" class=""><i class="fa fa-plus-square"></i> <span>Register</span></a></li>
                    @endif
                    <li class="hidden-lg hidden-md dropdown text-center">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                            <i class="fa fa-user"></i> Pages <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
                            <li class=""><a href="/admin/biz">Businesses</a></li>
                            <li class=""><a href="/admin/user">Users</a></li>
                            <li class=""><a href="/admin/cat">Categories</a></li>
                            <li class=""><a href="/admin/location">Location</a></li>
                            <li class=""><a href="/admin/report">Reports</a></li>
                            <li class=""><a href="/admin/upload">Uploads</a></li>
                        </ul>
                    </li>
                    <li class="text-center"><a href="/biz/create" class=""><i class="fa fa-plus"></i> Add a Business</a></li>
                    <li class="text-center"><a href="/"><i class="fa fa-arrow-left"></i> go to Site</a></li>
            </ul>
        </nav>
    </div> <!-- end .container -->
</div> <!-- end .header-nav-bar -->