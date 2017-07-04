<a href="{{ url('/logout') }}" class="{{ $class or "btn btn-primary" }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    {{ $slot }}
</a>

<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
