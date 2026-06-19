 @forelse ($productos as $p)
     {{-- <div class="product-card"> --}}
     <div class="product-card" onclick="window.location='{{ route('detalleProducto', $p->id) }}'">
         <div class="product-image">
             <span class="badge-sale">
                 Oferta
             </span>
             {{-- @if ($p->imagen)
                                <img src="{{ asset('img/' . $p->imagen) }}" alt="{{ $p->descripcion_corta }}">
                            @else
                                <img src="{{ asset('img/69f8e7dd1aced4.80817744.jpg') }}"
                                    alt="{{ $p->descripcion_corta }}">
                            @endif --}}
             @if ($p->imagen)
                 <img src="{{ asset('img/' . $p->imagen) }}" alt="{{ $p->nombre }}">
             @else
                 <img src="{{ asset('img/default.jpg') }}" alt="Sin imagen">
             @endif
         </div>

         <div class="product-info">
             <h3>{{ $p->descripcion_corta }}</h3>
             <div class="price-row">
                 <span class="old-price">$300.000</span>
                 {{-- <span class="discount">50% OFF</span> --}}
             </div>
             <div class="price">
                 <span>
                     $ {{ number_format($p->precio, 2, ',', '.') }}</span>
                 <span class="discount">50% OFF</span>
             </div>

             <div class="installments">
                 <a href="">Ver detalles</a>

                 @if (session('ID_USER'))
                     <a href="">Quitar</a>
                 @endif
             </div>
         </div>
     </div>
 @empty
     <div class="alert alert-warning">
         No se encontraron productos
     </div>
 @endforelse
