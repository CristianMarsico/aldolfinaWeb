 <div class="productos-grid">
     @forelse ($productos as $p)
         <article class="producto product-card">

             {{-- @if ($oferta) --}}
             <span class="badge-oferta">
                 Oferta
             </span>
             {{-- @endif --}}

             @if ($p->imagenPrincipal)
                 <img src="{{ asset('img/img_productos/' . $p->imagenPrincipal->imagen) }}"
                     alt="{{ $p->nombre }}">
             @else
                 <img src="{{ asset('img/sinImg.png') }}" alt="Sin imagen">
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
                 <span class="precio-ver">

                     ${{ number_format($p->precio, 0, ',', '.') }}

                 </span>
                 {{-- @endif --}}
                 <a class="btn-ver" href="{{ route('detalleProducto', $p->id) }}">Ver detalles</a>
             </div>

         </article>
     @empty
         <div class="alert alert-warning">
             No se encontraron productos
         </div>
     @endforelse
 </div>
 {{-- @foreach ($productos as $producto)
     @if ($producto->imagenPrincipal)
         <img src="{{ asset('img/img_productos/' . $producto->imagenPrincipal->imagen) }}" alt="{{ $producto->nombre }}">
     @endif

     {{ $producto->nombre }}
 @endforeach --}}
