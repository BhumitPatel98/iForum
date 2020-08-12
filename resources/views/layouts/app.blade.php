<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.3/styles/atom-one-dark.min.css">

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/forum') }}">
                   iForum
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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

        @if ($errors->count() > 0)
            <div class="alert alert-danger">
                <ul class="list-group-item">
                    @foreach ($errors->all() as $error)

                        <li class="list-group-item text-danger">
                            {{ $error }}
                        </li>
                        
                    @endforeach
                </ul>
            </div>
        @endif

        <main class="container py-4">

            <div class="row">

                {{-- @auth
                <div class="container">

                    @if (session()->has('success'))

                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    @if (session()->has('error'))

                    <div class="alert alert-danger">
                         {{ session()->get('error') }}
                    </div>
                    @endif

                </div>

            @endauth --}}

                <div class="col-4">

                    <a href="{{ route('discussion.create') }}" class="btn btn-primary form-control mb-3">Creat New Discussion</a>
                    <div class="panel panel-default">
                        <div class="card my-1" >
                             
                            <div class="card-body">

                                <ul class="list-group">
                                
                                    <li class="list-group-item">
                                      <strong> 
                                        <a href="\forum" style="text-decoration: none">
                                         <div class="text-center">Home</div>
                                        </a>
                                    </strong> 
                                    </li>
    
                                    <li class="list-group-item">
                                        <strong>
                                            <a href="\forum?filter=me" style="text-decoration: none">
                                                <div class="text-center">My Discussion</div>
                                            </a>
                                        </strong>
                                    </li>
    
                                    <li class="list-group-item">
                                        <strong>
                                            <a href="\forum?filter=solved" style="text-decoration: none">
                                                <div class="text-center">Answered Discussion</div>
                                            </a>
                                        </strong>
                                    </li>
    
                                    <li class="list-group-item">
                                        <strong>
                                            <a href="\forum?filter=unsolved" style="text-decoration: none">
                                                <div class="text-center">UnAnswered Discussion</div>
                                            </a>
                                        </strong>
                                    </li>
    
                                  </ul>
                                

                            </div>

                            @if (Auth::check())

                                @if (Auth::user()->admin)
                                    
                                    <div class="card-body">

                                        <ul class="list-group">
                                        
                                            <li class="list-group-item">
                                            <strong> 
                                                <a href="\channels" style="text-decoration: none">
                                                <div class="text-center">All Channels</div>
                                                </a>
                                            </strong> 
                                            </li>
            
                                        </ul>
                                        

                                    </div>
                                    

                                @endif

                            @endif
                              

                        </div>

                        <div class="card">
                            
                            <div class="card-header">
                                Channels
                            </div>
        
                            <div class="card-body">
                              <ul class="list-group">
                                @foreach ($channels as $channel)
                                        <li class="list-group-item">
                                           <a href="{{ route('channel',['slug'=> $channel->slug]) }}" style="text-decoration: none"> {{ $channel->title }}</a>
                                        </li>
                                @endforeach
                              </ul>
                            </div>

                        </div>
                        
                    </div>
                </div>
                <div class="col-8">
                    
                    @yield('content')
                </div>
           

            </div>    
                
        </main>
    </div>

    {{-- <!-- SCRIPTS --> --}}

    <script src="/js/app.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.3/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <script>
         @if(Session::has('success'))

            toastr.success('{{Session::get('success')}}')

         @endif
    </script>

    <script>
        @if(Session::has('error'))

           toastr.warning('{{Session::get('error')}}')

        @endif
   </script>

</body>
</html>
