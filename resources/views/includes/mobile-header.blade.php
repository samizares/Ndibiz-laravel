<div class="header-nav-bar">
    <div class="container">
        <nav class="hidden-lg hidden-md">
            <button><i class="fa fa-bars"></i></button>
            <ul class="primary-nav list-unstyled text-center">
                    <li><a href="/businesses"><i class="fa fa-building-o"></i> Explore</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-question"></i> Help
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu text-center">
                            <li><a href="#" class=""> How to register</a></li>
                            <li><a href="#" class=""> FAQs</a></li>
                            <li><a href="#" class=""> Contact us</a></li>
                        </ul>
                    </li>
                @if (Auth::check())
                    <li class="hidden-lg hidden-md dropdown text-center">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                            <i class="fa fa-user"></i> {{Auth::user()->username}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
                            <li><a href="/profile/{{Auth::user()->id}}">View Profile</a></li>
                            @if(Auth::check())
                                @if(Auth::user()->admin)
                                    <li><a href="/admin"><i class="fa fa-user"></i> View Admin Dashboard</a></li>
                                @endif
                            @endif
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
                    <li><a href="/biz/create" class="text-color-yellowFFD231"><i class="fa fa-plus"></i> Add a Business</a></li>
            </ul>
        </nav>
    </div> <!-- end .container -->
</div> <!-- end .header-nav-bar -->