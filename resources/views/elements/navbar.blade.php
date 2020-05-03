<nav class="navbar navbar-expand-lg navbar-primary">

    <a class="navbar-brand" href="{{route('indexPage')}}">سوق تاجنانت</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('aboutPage')}}">عن الموقع <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contactPage')}}">جهات الإتصال</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('posts.create')}}">إضافة تدوينة</a>
        </li>

      </ul>

             <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('فتح حساب') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"
                                   class="nav-link dropdown-toggle"
                                   href="#" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                   
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                        <a class="dropdown-item" href="/posts/create">
                                            <i class="fas fa-plus"></i> كتابة تدوينة
                                        </a>
                                  
                                   
                                           <a class="dropdown-item" href="{{route('home')}}">
                                              <i class="fas fa-gear"></i> لوحة التحكم
                                            </a>
                                    
                                    
                                    <a class="dropdown-item"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('خروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
         

    </div>
</nav>