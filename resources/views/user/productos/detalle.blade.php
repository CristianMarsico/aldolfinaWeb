@extends('layouts.user')

@section('content')
    <div class="producto-container">

        <div class="producto-grid">

            <!-- GALERÍA -->
            <section class="galeria">
                {{-- <div class="imagen-principal">
                    @if ($producto->imagenPrincipal)
                        <img id="imagenPrincipal" alt="Producto"
                            src="{{ asset('img/img_productos/' . $producto->imagenPrincipal->imagen) }}">
                    @else
                        <img src="{{ asset('img/default.jpg') }}" alt="Sin imagen">
                    @endif
                </div>

                <div class="miniaturas">
                    <img alt="Producto" src="{{ asset('img/img_productos/' . $producto->imagenPrincipal->imagen) }}">
                    @foreach ($producto->imagenesSecundarias as $imagen)
                        <img class="thumb active" src="{{ asset('img/img_productos/' . $imagen->imagen) }}">
                    @endforeach
                </div> --}}




                <div class="imagen-principal">

                    @if ($producto->imagenPrincipal)
                        <img id="imagenPrincipal"
                            src="{{ asset('img/img_productos/' . $producto->imagenPrincipal->imagen) }}">
                    @else
                        <img src="{{ asset('img/sinImg.png') }}" alt="Sin imagen">
                    @endif
                </div>


                @if ($producto->imagenPrincipal)
                     <div class="miniaturas">

                    {{-- Imagen principal también como thumb --}}
                    <img class="thumb active" src="{{ asset('img/img_productos/' . $producto->imagenPrincipal->imagen) }}">

                    @foreach ($producto->imagenesSecundarias as $imagen)
                        <img class="thumb" src="{{ asset('img/img_productos/' . $imagen->imagen) }}">
                    @endforeach

                </div>
                @endif
                
            </section>

            <!-- INFO -->

            <section class="info">

                {{-- <span class="categoria">
                PAÑALES
            </span> --}}

                <h1>
                    {{ $producto->nombre }}
                </h1>

                <div class="rating">
                    ⭐⭐⭐⭐⭐
                    <span>(124 opiniones)</span>
                </div>

                <div class="precio-box">

                    <span class="precio-anterior">
                        {{ $producto->precio }}
                    </span>

                    <span class="precio">
                        {{ $producto->precio }}
                    </span>

                    <span class="descuento">
                        -25%
                    </span>

                </div>

                <p class="descripcion-corta">

                    {{ $producto->descripcion_corta }}

                </p>

                <div class="talles">

                    <h4>Talle</h4>

                    <div class="opciones">

                        <button>RN</button>
                        <button>P</button>
                        <button>M</button>
                        <button>G</button>
                        <button class="active">XXG</button>

                    </div>

                </div>

                <div class="cantidad">

                    <label>Cantidad</label>

                    <input type="number" value="1">

                </div>

                <button class="btn-comprar">
                    Agregar al carrito
                </button>

                <button class="btn-wsp">
                    Consultar por WhatsApp
                </button>

                <div class="beneficios">

                    <div>
                        🚚 Envíos a todo el país
                    </div>

                    <div>
                        🔒 Compra protegida
                    </div>

                    <div>
                        💳 Cuotas sin interés
                    </div>

                </div>

            </section>

        </div>

    </div>


    <section class="detalle">

        <div class="contenido">

            <h2>Descripción</h2>

            <p>
                {{ $producto->descripcion_larga }}
            </p>

        </div>

    </section>


    <section class="relacionados">

        <h2>También te puede interesar</h2>

        <div class="cards">

            <article class="card">

                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=800&q=80">

                <h4>Toallitas Húmedas</h4>

                <span>$4.990</span>

            </article>

            <article class="card">

                <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?auto=format&fit=crop&w=800&q=80">

                <h4>Shampoo Baby</h4>

                <span>$6.590</span>

            </article>

            <article class="card">

                <img src="https://images.unsplash.com/photo-1514989940723-e8e51635b782?auto=format&fit=crop&w=800&q=80">

                <h4>Body Algodón</h4>

                <span>$8.999</span>

            </article>

        </div>

    </section>

    <script>
        const principal = document.getElementById("imagenPrincipal");
        const thumbs = document.querySelectorAll(".thumb");

        thumbs.forEach(img => {

            img.addEventListener("click", () => {

                principal.style.opacity = "0";

                setTimeout(() => {

                    principal.src = img.src;

                    principal.style.opacity = "1";

                }, 150);

                thumbs.forEach(t =>
                    t.classList.remove("active")
                );

                img.classList.add("active");

            });

        });
    </script>
@endsection
