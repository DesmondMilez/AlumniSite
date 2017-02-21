<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('homepage') }}">Alumnii</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="{{ (Request::url() == route('contact-us')) ? 'active' : '' }}"><a href="{{ route('contact-us') }}">Контакт</a>
        </li>
        @if(Auth::check())
          @if(Auth::user()->isAdmin())
            <li class="{{ (Request::is('admin/*')) ? 'active' : '' }} dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                 aria-expanded="false">
                Админ <span class="carret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('admin.job-ad.index') }}">Објави оглас</a></li>
              </ul>
            </li>
          @else
            <li class="{{ (Request::url() == route('user.profile.edit')) ? 'active' : '' }}"><a
                  href="{{ route('user.profile.edit') }}">Мој Профил</a></li>
          @endif
        @endif
      </ul>
      @if(!Auth::check())
        <ul class="nav navbar-nav navbar-right">
          <li class="{{ (Request::url() == route('login')) ? 'active' : '' }}"><a href="{{ route('login') }}">Најава</a>
          </li>
          <li class="{{ (Request::url() == route('register')) ? 'active' : '' }}"><a href="{{ route('register') }}">Регистрирај
              се</a></li>
        </ul>
      @else
        <ul class="nav navbar-nav navbar-right">
          <li class="{{ (Request::url() == route('logout')) ? 'active' : '' }}"><a
                href="{{ route('logout') }}">Одјава</a>
          </li>
        </ul>
      @endif
    </div>
  </div>
</nav>

