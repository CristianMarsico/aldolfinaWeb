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
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paginaContacto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/home/cardProducto.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/paginaHome.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/paginaProductos.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/tabla.css') }}"> --}}
    <title>Pañalera Estilo Huggies Responsive + Buscador</title>
    <style>
        .container {
            width: min(1200px, 95%);
            margin: auto;
        }

        /* HEADER */

        header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .header-content {
            height: 75px;

            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            font-size: 26px;
            font-weight: 700;
        }

        .search-box {
            flex: 1;
        }

        .search-box input {
            width: 100%;
            height: 45px;

            border: 1px solid #d1d5db;
            border-radius: 10px;

            padding: 0 15px;
        }

        .header-actions {
            display: flex;
            gap: 20px;
        }

        .header-actions a {
            text-decoration: none;
            color: #374151;
        }

        /* MENU */

        nav {
            background: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .menu {
            display: flex;
            gap: 25px;
            height: 50px;
            align-items: center;
            justify-content: center;
        }

        .menu a {
            text-decoration: none;
            color: #555;
            padding: 15px 0;
            position: relative;
            transition: .2s;
        }

        .menu a:hover {
            color: #0284c7;
        }

        .menu a.active {
            background: #e0f2fe;
            color: #0284c7;
            border-radius: 8px;
            padding: 8px 14px;
        }

        .menu a.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;

            width: 100%;
            height: 3px;

            background: #0284c7;
            border-radius: 3px;
        }

        /* HERO */

        .hero {
            background: white;

            margin-top: 25px;

            border-radius: 18px;

            overflow: hidden;

            display: grid;
            grid-template-columns: 1fr 500px;
        }

        .hero-info {
            padding: 50px;
        }

        .tag {
            background: #e0f2fe;
            color: #0284c7;

            padding: 8px 14px;
            border-radius: 20px;

            font-size: 12px;
        }

        .hero h1 {
            font-size: 42px;
            margin: 20px 0;
        }

        .hero p {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;

            padding: 12px 24px;

            background: #0284c7;
            color: white;

            text-decoration: none;

            border-radius: 10px;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* SECCIONES */

        .section {
            margin-top: 50px;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 20px;
        }

        .section-title h2 {
            font-size: 28px;
        }

        .section-title a {
            text-decoration: none;
        }

        /* CATEGORIAS */

        .categorias-grid {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(220px, 1fr));

            gap: 20px;
        }

        .categoria {
            background: white;

            border-radius: 14px;

            overflow: hidden;

            text-decoration: none;
            color: #111827;

            transition: .2s;
        }

        .categoria:hover {
            transform: translateY(-4px);
        }

        .categoria img {
            width: 100%;
            height: 170px;
            object-fit: cover;
        }

        .categoria span {
            display: block;

            padding: 16px;

            font-weight: 600;
        }

        /* FOOTER */

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

        /* RESPONSIVE */

        @media(max-width:900px) {

            .hero {
                grid-template-columns: 1fr;
            }

            .hero-image {
                height: 250px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .header-content {
                flex-wrap: wrap;
                height: auto;
                padding: 15px 0;
            }

            .search-box {
                width: 100%;
                flex: none;
            }

            .menu {
                overflow: auto;
                white-space: nowrap;
                padding: 0 15px;
            }

            .footer {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
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

    <!-- MENU -->

    {{-- <nav>
        <div class="container menu">
            <a href="{{ route('home') }}">
                HOME
            </a>
            @foreach ($categorias as $c)
                <a href="{{ route('productos', ['categoria' => $c->categoria, 'id_categoria' => $c->id]) }}">
                    {{ mb_strtoupper($c->categoria, 'UTF-8') }}
                </a>
            @endforeach
            <a href="{{ route('contacto') }}">
                CONTACTO
            </a>
        </div>

    </nav> --}}

    <nav>

        <div class="container menu">

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

    </nav>

    @yield('content')

    <footer>

        <div class="container footer">

            <div>

                <h3>BabyStore</h3>

                <p>Todo para tu bebé.</p>

            </div>

            <div>

                <h4>Contacto</h4>

                <p>WhatsApp</p>

                <p>Instagram</p>

            </div>

        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</body>

</html>
