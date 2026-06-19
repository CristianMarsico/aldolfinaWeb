@extends('layouts.user')

@section('content')
    <main class="container">

        <!-- HERO -->

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

        <!-- CATEGORIAS -->

        <section class="section">

            <div class="section-title">

                <h2>Categorías</h2>

            </div>

            <div class="categorias-grid">

                <a href="#" class="categoria">

                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=800&q=80">

                    <span>Pañales</span>

                </a>

                <a href="#" class="categoria">

                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=800&q=80">

                    <span>Higiene</span>

                </a>

                <a href="#" class="categoria">

                    <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?auto=format&fit=crop&w=800&q=80">

                    <span>Perfumería</span>

                </a>

                <a href="#" class="categoria">

                    <img src="https://images.unsplash.com/photo-1514989940723-e8e51635b782?auto=format&fit=crop&w=800&q=80">

                    <span>Ropa</span>

                </a>

            </div>

        </section>

        <!-- PRODUCTOS -->

        <section class="section">

            <div class="section-title">

                <h2>Más vendidos</h2>

                <a href="#">
                    Ver todos
                </a>

            </div>
            @include ('user.productos.card')
        </section>

    </main>
@endsection
