



<li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
<li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Cosa facciamo</a></li>
<li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Prenota ora</a></li>
<li><a href="{{route('home.tools')}}" class="{{ request()->routeIs('home.tools') ? 'active' : '' }}">Strumenti</a></li>
<li><a href="{{route('home.articles')}}" class="{{ request()->routeIs('home.articles') ? 'active' : '' }}">Articoli</a></li>
