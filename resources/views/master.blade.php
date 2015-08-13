@include('includes.header')

<!-- HEADER SEARCH SECTION -->
    <div class="header-search map">

    @yield('search')

    @yield('map') 
	 
    </div>
    <br><br> <!-- END .SEARCH-MAP -->
@yield('content')
</header>
</div>
@include('includes.footer')