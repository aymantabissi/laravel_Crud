<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : 'flex-row' }} d-flex justify-content-between">
    <a class="navbar-brand" href="{{ route('contact.index') }}">{{ __('message.welcome') }}</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse {{ app()->getLocale() == 'ar' ? 'me-auto' : 'ms-auto' }}" id="navbarNav">
      <ul class="navbar-nav align-items-center {{ app()->getLocale() == 'ar' ? 'me-auto' : 'ms-auto' }}">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact.index') }}">{{ __('message.contacts') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact.create') }}">{{ __('message.add_contact') }}</a>
        </li>

        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('message.login') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('message.register') }}</a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu {{ app()->getLocale() == 'ar' ? 'dropdown-menu-start' : 'dropdown-menu-end' }}" aria-labelledby="userDropdown">
              <li>
                <a class="dropdown-item" href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('message.logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        @endguest

        <!-- Language Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ strtoupper(app()->getLocale()) }}
          </a>
          <ul class="dropdown-menu {{ app()->getLocale() == 'ar' ? 'dropdown-menu-start' : 'dropdown-menu-end' }}" aria-labelledby="languageDropdown">
            <li>
              <a class="dropdown-item" href="{{ route('locale', 'en') }}">English</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('locale', 'ar') }}">العربية</a>
            </li>
          </ul>
        </li>

        <!-- Dark Mode Toggle -->
        <li class="nav-item">
          <button class="btn btn-sm btn-outline-light ms-2" id="toggle-dark" title="Toggle Dark Mode">
            <i class="bi bi-moon-fill"></i>
          </button>
        </li>
      </ul>
    </div>
  </div>
</nav>
