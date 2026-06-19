<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Pañalera Estilo Huggies Responsive + Buscador</title>
    <style>
   



        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fa;
            color: #1f2937;
        }

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

        /* PRODUCTOS */

        .productos-grid {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(250px, 1fr));

            gap: 20px;
        }

        .producto {
            background: white;

            border-radius: 14px;

            overflow: hidden;
        }

        .producto img {
            width: 100%;
            height: 240px;
            object-fit: contain;
            padding: 15px;
        }

        .producto-info {
            padding: 15px;
        }

        .producto h3 {
            font-size: 15px;
            margin-bottom: 10px;
        }

        .precio {
            display: block;

            font-size: 26px;
            font-weight: 700;

            margin-bottom: 15px;
        }

        .producto button {
            width: 100%;
            height: 42px;

            border: none;

            border-radius: 8px;

            background: #0284c7;
            color: white;

            cursor: pointer;
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

    {{-- @include ('componentHeader')

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Huggies Bebé, siempre vos.</h1>
                <p>Con la combinación perfecta para dejar tu piel apapachable.</p>
                <button>Conoce más</button>
            </div>
        </section>

        <section class="promo">
            <img src="{{ asset('img/69f8e7dd1aced4.80817744.jpg') }}" alt="Pañales" />
            <div class="text-box">
                <h2>Nuestros Pañales</h2>
                <p>Ideales para mantener tu piel suave, seca y protegida.</p>
                <button>Ver Pañales</button>
            </div>
        </section>

        <section class="promo">
            <img src="{{ asset('img/69f8e7dd1aced4.80817744.jpg') }}" alt="Toallitas" />
            <div class="text-box">
                <h2>Nuestras Toallitas Húmedas</h2>
                <p>Suaves y delicadas con tu piel, bebé. Conócelas y elige la tuya.</p>
                <button>Ver Toallitas Húmedas</button>
            </div>
        </section>
    </main>

    <section class="marcas">
        <h2>Nuestras marcas</h2>
        <div class="marcas-logos">
            <div class="logo-container">
                <img src="{{ asset('img/estrella.jpg') }}" alt="Marca 1" title="Marca 1" />
            </div>
            <div class="logo-container">
                <img src="{{ asset('img/vital.jpg') }}" alt="Marca 2" title="Marca 2" />
            </div>
            <div class="logo-container">
                <img src="{{ asset('img/huggies.png') }}" alt="Marca 4" title="Marca 4" />
            </div>
            <div class="logo-container">
                <img src="{{ asset('img/jonsons.png') }}" alt="Marca 4" title="Marca 4" />
            </div>
            <div class="logo-container">
                <img src="{{ asset('img/pampers.png') }}" alt="Marca 4" title="Marca 4" />
            </div>
        </div>
    </section>

    @include ('componentFooter')
    @include ('componentCloseHead') --}}



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

    <nav>

        <div class="container menu">
            @foreach ($categorias as $c)
                {{-- <li class="active"> --}}
                <a
                    {{-- href="{{ url(!session('ID_USER') ? $c->categoria . '/' . $c->id : 'abm/' . $c->categoria . '/' . $c->id) }}"> --}}
                    href="{{ url($c->categoria . '/' . $c->id) }}">
                    
                    {{ mb_strtoupper($c->categoria, 'UTF-8') }}
                </a>
                {{-- </li> --}}
            @endforeach
            {{-- <a href="index3.html" class="active">Pañales</a>
            <a href="parado.html">Higiene</a>
            <a href="#">Perfumería</a>
            <a href="#">Ropa</a>
            <a href="#">Mamaderas</a>
            <a href="#">Promociones</a> --}}

        </div>

    </nav>

    <main class="container">

       

        <section class="hero">

            <div class="hero-info">

                <span class="tag">
                    OFERTAS ESPECIALES
                </span>

                <h1>
                    Hasta 30% OFF
                    en pañales seleccionados
                </h1>

                <p>
                    Aprovechá las promociones de esta semana
                    y llevate las mejores marcas.
                </p>

                <a href="#" class="btn">
                    Ver promociones
                </a>

            </div>

            <div class="hero-image">

                <img src="https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?auto=format&fit=crop&w=1200&q=80"
                    alt="Banner">

            </div>

        </section>

       

        <section class="section">

            <div class="section-title">

                <h2>Categorías</h2>

            </div>

            <div class="categorias-grid">

                <a href="#" class="categoria">

                    <img
                        src="https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=800&q=80">

                    <span>Pañales</span>

                </a>

                <a href="#" class="categoria">

                    <img
                        src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=800&q=80">

                    <span>Higiene</span>

                </a>

                <a href="#" class="categoria">

                    <img
                        src="https://images.unsplash.com/photo-1544126592-807ade215a0b?auto=format&fit=crop&w=800&q=80">

                    <span>Perfumería</span>

                </a>

                <a href="#" class="categoria">

                    <img
                        src="https://images.unsplash.com/photo-1514989940723-e8e51635b782?auto=format&fit=crop&w=800&q=80">

                    <span>Ropa</span>

                </a>

            </div>

        </section>

     

        <section class="section">

            <div class="section-title">

                <h2>Más vendidos</h2>

                <a href="#">
                    Ver todos
                </a>

            </div>

            <div class="productos-grid">

                <article class="producto">

                    <img
                        src="https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=800&q=80">

                    <div class="producto-info">

                        <h3>Pampers Premium Care</h3>

                        <span class="precio">
                            $25.999
                        </span>

                        <button>
                            Agregar al carrito
                        </button>

                    </div>

                </article>

                <article class="producto">

                    <img
                        src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=800&q=80">

                    <div class="producto-info">

                        <h3>Toallitas Húmedas</h3>

                        <span class="precio">
                            $4.990
                        </span>

                        <button>
                            Agregar al carrito
                        </button>

                    </div>

                </article>

                <article class="producto">

                    <img
                        src="https://images.unsplash.com/photo-1544126592-807ade215a0b?auto=format&fit=crop&w=800&q=80">

                    <div class="producto-info">

                        <h3>Shampoo Baby</h3>

                        <span class="precio">
                            $6.500
                        </span>

                        <button>
                            Agregar al carrito
                        </button>

                    </div>

                </article>

                <article class="producto">

                    <img
                        src="https://images.unsplash.com/photo-1514989940723-e8e51635b782?auto=format&fit=crop&w=800&q=80">

                    <div class="producto-info">

                        <h3>Body Algodón</h3>

                        <span class="precio">
                            $8.999
                        </span>

                        <button>
                            Agregar al carrito
                        </button>

                    </div>

                </article>

            </div>

        </section>

    </main>

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

</body>

</html>
