<nav class="navbar navbar-expand-lg fixed-top"style="background-color:;" color-on-scroll="0">
    <div class="container">
      <div class="navbar-translate">
      <a class="navbar-brand" href="{{route('frontend.landing')}}" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom" target="_blank">
          schoolmedia
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
            <li class="nav-item dropdown" style="">
                <a style="background-color:transparent;color:black;" class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categories
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($categories as $category)
                <a class="dropdown-item" href="{{route('front.category',['id'=>$category->id])}}">{{$category->name}}</a>
                    @endforeach
                </div>
            </li>

              <li class="nav-item dropdown">
                <a style="background-color:transparent;color:black;" class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Skills
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($skills as $skill)
                    <a class="dropdown-item" href="{{route('front.skill',['id'=>$skill->id])}}">{{$skill->name}}</a>
                    @endforeach
                </div>
            </li>

            @guest
              <li class="nav-item">
              <a style="color:black;" href="{{url('/login')}}" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
              <a style="color:black;" href="{{url('/register')}}" class="nav-link">Register</a>
            </li>
            @else
            <li class="nav-item dropdown">
                <a style="background-color:transparent;color:black;" class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

            @endguest
        </ul>
      </div>
    </div>
  </nav>
