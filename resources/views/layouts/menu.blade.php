

@if (Auth::user()->id == 1)
<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
       <i class="fas fa-tachometer-alt"></i> <p> Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('importars.index') }}"
       class="nav-link {{ Request::is('importars*') ? 'active' : '' }}">
       <i class="fab fa-wordpress"></i> <p>Importar WP</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('ordenes.index') }}"
       class="nav-link {{ Request::is('ordenes*') ? 'active' : '' }}">
       <i class="fas fa-tshirt"></i>    <p>Ordenes</p>
    </a>
</li>

    <li class="nav-item">
        <a href="{{ route('users.index') }}"
        class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="fas fa-users"></i> <p>Users</p>
        </a>
    </li>


    <li class="nav-item">
        <a href="{{ route('porcentajes.index') }}"
           class="nav-link {{ Request::is('porcentajes*') ? 'active' : '' }}">
           <i class="fas fa-tag"></i>  <p>Importe Pendiente</p>
        </a>
    </li>
    @else
    <li class="nav-item">
        <a href="{{ route('home') }}"
           class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
           <i class="fas fa-tachometer-alt"></i> <p> Dashboard</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('ordenes.index') }}"
           class="nav-link {{ Request::is('ordenes*') ? 'active' : '' }}">
           <i class="fas fa-tshirt"></i>    <p>Ordenes</p>
        </a>
    </li>
@endif








