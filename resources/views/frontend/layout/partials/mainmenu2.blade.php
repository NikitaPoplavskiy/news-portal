<div class="container main-menu" id="main-menu">
    <div class="row align-items-center justify-content-between">
        <nav id="nav-menu-container">
            <ul class="nav-menu sf-js-enabled sf-arrows">
                <li class="menu-active"><a href="{{ route('home') }}">Home</a></li>
                <li class="menu-has-children"><a href="#" class="sf-with-ul">Categories</a>
                    <ul>
                        @foreach ($mainmenus as $mainmenu)
                        <li><a href="{{ route('page.category' , $mainmenu->slug) }}">{!! $mainmenu->name !!}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('page.all-news') }}">All News</a></li>
        </nav><!-- #nav-menu-container -->
        <div class="navbar-right">
            <form class="Search" action="{{ route('page.search') }}" method="GET">
                <input name="search" type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
                <label for="Search-box" class="Search-box-label">
                    <span class="lnr lnr-magnifier"></span>
                </label>
                <span class="Search-close">
                    <span class="lnr lnr-cross"></span>
                </span>
            </form>
        </div>
    </div>
</div>