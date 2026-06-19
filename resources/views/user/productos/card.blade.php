 <div class="productos-grid">
     {{--   <article class="producto">

         <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=800&q=80">

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

         <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=800&q=80">

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

         <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?auto=format&fit=crop&w=800&q=80">

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

         <img src="https://images.unsplash.com/photo-1514989940723-e8e51635b782?auto=format&fit=crop&w=800&q=80">

         <div class="producto-info">

             <h3>Body Algodón</h3>

             <span class="precio">
                 $8.999
             </span>

             <button>
                 Agregar al carrito
             </button>

         </div>

     </article> --}}


     @forelse ($productos as $p)
         <article class="producto product-card">

             {{-- @if ($oferta) --}}
                 <span class="badge-oferta">
                     Oferta
                 </span>
             {{-- @endif --}}

             @if ($p->imagen)
                 <img src="{{ asset('img/' . $p->imagen) }}" alt="{{ $p->nombre }}">
             @else
                 <img src="{{ asset('img/default.jpg') }}" alt="Sin imagen">
             @endif

             <div class="producto-info">

                 <h3>
                     {{ $p->nombre }}
                 </h3>

                 {{-- @if ($oferta) --}}
                     @php
                         //  $precioFinal = $producto->precio - ($producto->precio * $producto->descuento) / 100;
                         $precioFinal = 2500;
                     @endphp
{{-- 
                     <span class="precio-original">

                         ${{ number_format($p->precio, 0, ',', '.') }}

                     </span>

                     <span class="precio-descuento">

                         ${{ number_format($precioFinal, 0, ',', '.') }}
                        </span>
                         <span class="badge-descuento">
                             25 % off
                         </span>
                 @else --}}
                     <span class="precio">

                         ${{ number_format($p->precio, 0, ',', '.') }}

                     </span>
                 {{-- @endif --}}

                 <button>

                     Agregar al carrito

                 </button>

             </div>

         </article>
     @empty
         <div class="alert alert-warning">
             No se encontraron productos
         </div>
     @endforelse
 </div>
