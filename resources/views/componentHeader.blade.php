{{-- @include('componentHead')
<header>
    <div class="logo">
        <img src="{{ asset('img/69f8e7dd1aced4.80817744.jpg') }}" alt="Logo Pañalera" />
    </div>
    <nav>
        <ul id="nav-menu">
            @if (!session('ID_USER'))
                <li class="active">
                    
                    <a href="{{ route('home') }}">INICIO</a>
                </li>
            @endif
            @foreach ($categorias as $c)
                <li class="active">
                    <a href="{{ url(!session('ID_USER') ? $c->categoria . '/' . $c->id : 'abm/' . $c->categoria . '/' . $c->id) }}">
                        {{ mb_strtoupper($c->categoria, 'UTF-8') }}
                    </a>
                </li>
            @endforeach
            @if (!session('ID_USER'))
                <li class="active">
                    <a href="{{ route('contacto') }}">CONTACTO</a>
                </li>
            @endif
            @if (session('ID_USER'))
                <li class="active">
                    <a href="{{ route('logout') }}">CERRAR SESIÓN</a>
                </li>
            @endif
        </ul>
    </nav>
    <div class="search-icon" aria-label="Abrir búsqueda" tabindex="0" role="button"><i class="fas fa-search"></i>
    </div>
    <div class="hamburger" aria-label="Abrir menú" tabindex="0" role="button"><i class="fas fa-bars"></i></div>
    <div class="search-container" role="search">
        <input type="text" placeholder="Buscar..." aria-label="Buscar" />
    </div>
</header>
<script>
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.getElementById('nav-menu');
    const searchIcon = document.querySelector('.search-icon');
    const searchContainer = document.querySelector('.search-container');

    hamburger.addEventListener('click', () => {
        navMenu.classList.toggle('show');
    });

    searchIcon.addEventListener('click', (e) => {
        e.stopPropagation(); // Evita cierre al darle click a lupa
        searchContainer.classList.toggle('open');
        if (searchContainer.classList.contains('open')) {
            searchContainer.querySelector('input').focus();
        }
    });

    // Cierra menú y buscador al hacer click fuera
    document.addEventListener('click', e => {
        if (!e.target.closest('nav') && !e.target.closest('.hamburger')) {
            navMenu.classList.remove('show');
        }
        if (!e.target.closest('.search-container') && !e.target.closest('.search-icon')) {
            searchContainer.classList.remove('open');
        }
    });
</script> --}}
