@extends('layouts.admin')

@section('content')
    <!-- TABLA -->

    <section class="table-card">
        <div class="table-header">
            <input type="text" id="buscarProducto" placeholder="Buscar producto...">

            {{-- <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#productModal" id="btnAddProduct">
                Nuevo
            </button> --}}
            <button class="btn-primary" id="btnAddProduct">
                Nuevo
            </button>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbodyProductos">
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion_corta }}</td>
                            <td>${{ number_format($producto->precio, 2, ',', '.') }}</td>
                            <td>
                                <span class="badge success">
                                    {{ $producto->stock }}
                                </span>
                            </td>

                            <td>
                                <div class="acciones">
                                    {{-- <button class="btn-table btn-edit" data-product="{{ $producto->toJson() }}"
                                        data-bs-toggle="modal" data-bs-target="#productModal">
                                        Editar
                                    </button> --}}
                                    <button class="btn-table btn-edit" data-product="{{ $producto->toJson() }}">
                                        Editar
                                    </button>

                                    <a href="{{ route('admin.producto.eliminar', $producto->id) }}"
                                        class="btn-table btn-delete confirmDelete">
                                        Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    @include('admin.partials.productModal')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        const idCategoria = {{ $id_categoria }};
    </script>
    <script src="{{ asset('js/buscarProductos.js') }}"></script>
@endsection
