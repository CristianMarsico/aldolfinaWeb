<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/componentBanner.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/componentFooter.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/componentHeader.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/user/home/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/home/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/home/portada.css') }}">
    {{-- separaciones entre categorias y mas vendidos  --}}
    <link rel="stylesheet" href="{{ asset('css/user/home/secciones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/home/categorias.css') }}">

    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/contacto/informacion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/contacto/formulario.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/productos/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/productos/detalle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tablanueva.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('css/paginaHome.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/paginaProductos.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/tabla.css') }}"> --}}
    <title>Pañalera Estilo Huggies Responsive + Buscador</title>
    {{-- <style>
        footer {
            background: #111827;
            color: white;

            margin-top: 60px;

            padding: 40px 0;
        }

        .footer {
            display: flex;
            justify-content: space-between;
        }

        @media(max-width:900px) {
            .footer {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style> --}}
</head>

<body>
    <header>
        <div class="container header-content">
            <div class="logo">
                BabyStore
            </div>

            <div class="search-box">
                <input type="text" placeholder="Buscar pañales, higiene, perfumería...">
            </div>

            <div class="header-actions">
                <a href="#">Ingresar</a>
                <a href="#">Carrito</a>
            </div>
        </div>
    </header>

    <nav>
        <div class="container nav-container">
            <button class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="menu" id="menu">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    HOME
                </a>

                @foreach ($categorias as $c)
                    <a href="{{ route('productos', [
                        'categoria' => $c->categoria,
                        'id_categoria' => $c->id,
                    ]) }}"
                        class="{{ request()->route('id_categoria') == $c->id ? 'active' : '' }}">
                        {{ mb_strtoupper($c->categoria, 'UTF-8') }}
                    </a>
                @endforeach

                <a href="{{ route('contacto') }}" class="{{ request()->routeIs('contacto') ? 'active' : '' }}">
                    CONTACTO
                </a>
            </div>

        </div>
    </nav>

    @yield('content')

    {{-- <footer>
        <div class="footer-section">
            <h3>Todos los Productos</h3>
            <ul>
                <li><a href="#">Pañales</a></li>
                <li><a href="#">Toallitas Húmedas</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Sobre Huggies</h3>
            <ul>
                <li><a href="#">Quiénes somos</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Necesito ayuda</h3>
            <ul>
                <li><a href="#">Contáctenos</a></li>
                <li><a href="#">Mapa del sitio</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Legal</h3>
            <ul>
                <li><a href="#">Configuración de Cookie</a></li>
                <li><a href="#">Política de privacidad</a></li>
                <li><a href="#">Valores sobre Privacidad</a></li>
                <li><a href="#">Términos y condiciones</a></li>
            </ul>
        </div>
        <div class="footer-section social-icons">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
    </footer> --}}

    <footer class="footer">

    <div class="footer-container">

        <div class="footer-brand">
            <h2>BabyStore</h2>
            <p>
                Todo para el cuidado de tu bebé. Pañales, higiene,
                perfumería y accesorios con la mejor calidad.
            </p>

            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-section">
            <h3>Productos</h3>
            <ul>
                <li><a href="#">Pañales</a></li>
                <li><a href="#">Toallitas Húmedas</a></li>
                <li><a href="#">Perfumería</a></li>
                <li><a href="#">Accesorios</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Empresa</h3>
            <ul>
                <li><a href="#">Quiénes somos</a></li>
                <li><a href="#">Nuestras marcas</a></li>
                <li><a href="#">Promociones</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Ayuda</h3>
            <ul>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Preguntas frecuentes</a></li>
                <li><a href="#">Envíos</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        © 2026 BabyStore - Todos los derechos reservados.
    </div>

</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="{{ asset('js/btn_hamburguesa.js') }}"></script>
</body>

</html>
