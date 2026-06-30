    <div class="container-table">
        <h2>Lista de pañales</h2>
        <input class="form-control mb-3" type="text" id="buscarProducto" placeholder="Buscar..."
            aria-label="Buscar productos" />
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tbodyProductos">
                @foreach ($productos as $p)
                    <tr>
                        <td>
                            @if ($p->imagen)
                                <img src="{{ asset('img/' . $p->imagen) }}" alt="Imagen {{ $p->nombre }}"
                                    class="img-thumbnail" />
                            @else
                                <img src="{{ asset('img/69f8e7dd1aced4.80817744.jpg') }}" alt="Imagen predeterminada"
                                    class="img-thumbnail" />
                            @endif
                        </td>
                        <td>{{ $p->nombre }}</td>
                        <td>{{ $p->descripcion_corta }}</td>
                        <td>${{ $p->precio }}</td>
                        <td>{{ $p->stock }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Acciones producto">
                                <button type="button" class="btn-warning"
                                    onclick="window.location='{{ route('editarPanal', $p->id) }}'">Editar</button>
                                {{-- <button type="button" class="btn-danger"
                                    onclick="if(confirm('¿Eliminar producto?')) window.location='{{ route('eliminarPanal', $p->id) }}'">Eliminar</button> --}}

                                <a href="{{ route('eliminarPanal', $p->id) }}"
                                    class="btn btn-danger btn-sm confirm">Eliminar</a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>