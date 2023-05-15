<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/front/sass/app.scss', 'resources/front/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>


                        @endguest


                        <li class="nav-item">
                            

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 512.001 512.001">
<path style="fill:#CFF09E;" d="M14.222,73.306v80.082c0,18.18,14.737,32.917,32.917,32.917h271.969
	c1.537-10.752,10.758-19.026,21.936-19.026l0,0c11.177,0,20.399,8.274,21.936,19.026H464.86c18.18,0,32.917-14.737,32.917-32.917
	V73.306c0-18.18-14.737-32.917-32.917-32.917H47.14C28.959,40.389,14.222,55.127,14.222,73.306z"/>
<g>
	<path style="fill:#507C5C;" d="M464.86,200.528H362.98c-7.077,0-13.077-5.204-14.079-12.208c-0.556-3.887-3.934-6.818-7.856-6.818
		s-7.302,2.931-7.856,6.818c-1.001,7.006-7.003,12.208-14.079,12.208H47.14c-25.994,0-47.14-21.147-47.14-47.14V73.306
		c0-25.993,21.146-47.14,47.14-47.14h417.722c25.993,0,47.14,21.147,47.14,47.14v80.082C512,179.381,490.854,200.528,464.86,200.528
		z M372.989,172.084h91.873c10.308,0,18.695-8.387,18.695-18.695V73.306c0-10.308-8.385-18.695-18.695-18.695H47.14
		c-10.31,0-18.695,8.387-18.695,18.695v80.082c0,10.308,8.385,18.695,18.695,18.695H309.1c6.242-11.392,18.382-19.026,31.945-19.026
		C354.607,153.057,366.747,160.692,372.989,172.084z"/>
	<path style="fill:#507C5C;" d="M104.39,73.926c14.939,0,26.63,6.928,26.63,25.546v28.035c0,18.618-11.691,25.546-26.63,25.546
		H85.231c-4.437,0-7.36-2.381-7.36-5.087V79.015c0-2.705,2.923-5.087,7.36-5.087h19.159V73.926z M94.757,88.649v49.685h9.633
		c6.063,0,9.744-3.465,9.744-10.825V99.474c0-7.361-3.681-10.825-9.744-10.825H94.757z"/>
	<path style="fill:#507C5C;" d="M140.874,128.159V99.474c0-18.618,11.583-25.546,26.52-25.546s26.628,6.928,26.628,25.546v28.685
		c0,18.618-11.691,25.546-26.628,25.546C152.455,153.705,140.874,146.777,140.874,128.159z M177.136,99.474
		c0-7.468-3.681-10.825-9.742-10.825c-6.063,0-9.634,3.356-9.634,10.825v28.685c0,7.468,3.573,10.825,9.634,10.825
		c6.062,0,9.742-3.355,9.742-10.825V99.474z"/>
	<path style="fill:#507C5C;" d="M242.304,148.509l-20.567-37.453v36.803c0,3.465-4.223,5.195-8.444,5.195
		c-4.223,0-8.444-1.732-8.444-5.195V79.123c0-3.573,4.221-5.195,8.444-5.195c6.061,0,8.334,0.542,12.449,8.444l17.535,33.448V79.015
		c0-3.571,4.223-5.087,8.445-5.087c4.221,0,8.444,1.516,8.444,5.087v68.846c0,3.465-4.223,5.195-8.444,5.195
		C247.825,153.056,244.361,152.298,242.304,148.509z"/>
	<path style="fill:#507C5C;" d="M266.448,146.128c0-0.326,0.108-0.758,0.216-1.19l20.133-66.03c1.19-3.789,6.062-5.629,11.042-5.629
		c4.979,0,9.85,1.84,11.041,5.629l20.242,66.03c0.108,0.434,0.215,0.866,0.215,1.19c0,4.005-6.17,6.928-10.823,6.928
		c-2.706,0-4.873-0.866-5.521-3.139l-3.681-13.531h-22.841l-3.681,13.531c-0.649,2.273-2.815,3.139-5.52,3.139
		C272.617,153.056,266.448,150.133,266.448,146.128z M305.741,123.396l-7.902-29.009l-7.903,29.009L305.741,123.396L305.741,123.396
		z"/>
	<path style="fill:#507C5C;" d="M375.674,73.926c3.571,0,5.087,3.897,5.087,7.47c0,4.113-1.84,7.686-5.087,7.686h-14.939v58.778
		c0,3.465-4.221,5.195-8.444,5.195s-8.444-1.732-8.444-5.195V89.082H328.91c-3.248,0-5.089-3.573-5.089-7.686
		c0-3.573,1.516-7.47,5.089-7.47H375.674z"/>
	<path style="fill:#507C5C;" d="M404.361,106.942h16.236c3.248,0,5.089,3.14,5.089,6.603c0,2.923-1.516,6.386-5.089,6.386h-16.236
		v18.402h29.009c3.247,0,5.087,3.465,5.087,7.468c0,3.465-1.515,7.253-5.087,7.253h-38.537c-3.679,0-7.36-1.732-7.36-5.195V79.123
		c0-3.465,3.681-5.195,7.36-5.195h38.537c3.573,0,5.087,3.789,5.087,7.253c0,4.005-1.84,7.468-5.087,7.468h-29.009L404.361,106.942
		L404.361,106.942z"/>
	<path style="fill:#507C5C;" d="M451.978,336.81c-7.854,0-14.222-6.367-14.222-14.222V300.41c0-4.392-3.573-7.964-7.964-7.964
		s-7.966,3.573-7.966,7.964v22.178c0,7.855-6.369,14.222-14.222,14.222s-14.222-6.367-14.222-14.222V300.41
		c0-20.076,16.333-36.409,36.41-36.409c20.075,0,36.409,16.333,36.409,36.409v22.178C466.2,330.443,459.831,336.81,451.978,336.81z"
		/>
	<path style="fill:#507C5C;" d="M363.231,336.81c-7.854,0-14.222-6.367-14.222-14.222V189.465c0-4.392-3.574-7.964-7.966-7.964
		s-7.964,3.573-7.964,7.964v133.123c0,7.855-6.369,14.222-14.222,14.222s-14.222-6.367-14.222-14.222V189.465
		c0-20.076,16.333-36.409,36.409-36.409c20.076,0,36.41,16.333,36.41,36.409v133.123C377.454,330.443,371.086,336.81,363.231,336.81
		z"/>
	<path style="fill:#507C5C;" d="M407.605,336.81c-7.854,0-14.222-6.367-14.222-14.222V275.66c0-4.392-3.573-7.964-7.964-7.964
		s-7.964,3.573-7.964,7.964v46.928c0,7.855-6.369,14.222-14.222,14.222s-14.222-6.367-14.222-14.222V275.66
		c0-20.076,16.333-36.409,36.409-36.409s36.409,16.333,36.409,36.409v46.928C421.827,330.443,415.458,336.81,407.605,336.81z"/>
	<path style="fill:#507C5C;" d="M352.155,485.835c-4.655,0-9.215-2.281-11.941-6.475l-25.311-38.96
		c-0.279-0.43-0.535-0.873-0.765-1.33c-0.808-1.6-0.823-1.63-4.848-3.261c-3.398-1.378-8.051-3.265-13.099-7.051
		c-22.498-16.878-35.93-43.74-35.93-71.863v-84.225c0-20.076,16.333-36.409,36.409-36.409c20.076,0,36.41,16.333,36.41,36.409
		v39.937c0,7.855-6.369,14.222-14.222,14.222s-14.222-6.367-14.222-14.222v-39.937c0-4.392-3.574-7.964-7.966-7.964
		s-7.964,3.573-7.964,7.964v84.225c0,19.217,9.179,37.575,24.553,49.108c2.092,1.569,4.133,2.398,6.72,3.445
		c5.41,2.193,13.522,5.483,19.149,16.027l24.94,38.39c4.279,6.586,2.408,15.396-4.178,19.674
		C357.497,485.092,354.812,485.835,352.155,485.835z"/>
	<path style="fill:#507C5C;" d="M496.351,485.833c-7.854,0-14.222-6.367-14.222-14.222V322.599c0-4.392-3.573-7.964-7.964-7.964
		s-7.966,3.573-7.966,7.964c0,7.855-6.369,14.222-14.222,14.222s-14.222-6.367-14.222-14.222v-11.106
		c0-6.211,3.982-11.493,9.532-13.43c6.663-7.292,16.246-11.873,26.877-11.873c20.075,0,36.409,16.333,36.409,36.409V471.61
		C510.574,479.466,504.206,485.833,496.351,485.833z"/>
</g>
</svg>
 </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
