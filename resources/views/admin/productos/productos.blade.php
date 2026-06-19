@extends('layouts.admin')

@section('content')

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-bold">
                    Administrar {{ ucfirst($categoriaActual) }}
                </h4>

                <input type="text" id="buscarProducto" class="form-control" placeholder="Buscar..." style="width:250px">

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal" id="btnAddProduct">
                    <i class="bi bi-plus-lg"></i>
                    Nuevo Producto
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table tabla-admin align-middle">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>

                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="tbodyProductos">
                        @foreach ($productos as $producto)
                            <tr>
                                <td>                                    
                                    @if ($producto->imagen)
                                        <img src="{{asset('img/'.$producto->imagen)}}" class="img-thumbnail"
                                            style="max-width: 60px;" alt="{{ $producto->nombre }}" />
                                    @else
                                        <img src="{{ asset('img/sinImg.png') }}" class="img-thumbnail"
                                            style="max-width: 60px;" alt="{{ $producto->nombre }}" />
                                    @endif

                                </td>
                                <td class="fw-semibold">{{ $producto->nombre }}</td>
                                <td>{{ $producto->descripcion_corta }}</td>
                                <td>${{ number_format($producto->precio, 2, ',', '.') }}</td>
                                <td>

                                    @if ($producto->stock > 10)
                                        <span class="badge bg-success">
                                            {{ $producto->stock }}
                                        </span>
                                    @elseif($producto->stock > 0)
                                        <span class="badge bg-warning text-dark">
                                            {{ $producto->stock }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Sin stock
                                        </span>
                                    @endif

                                </td>
                                {{-- <td>
                                    <button type="button" class="btn btn-warning btn-sm btn-edit"
                                        data-product="{{ $producto->toJson() }}" data-bs-toggle="modal"
                                        data-bs-target="#productModal">Editar</button>

                                    <a href="{{ route('eliminarPanal', $producto->id) }}"
                                        class="btn btn-danger btn-sm confirm">Eliminar</a>
                                </td> --}}

                                <td>
                                    <div class="acciones">
                                        <button class="btn btn-warning btn-sm btn-edit"
                                            data-product="{{ $producto->toJson() }}" data-bs-toggle="modal"
                                            data-bs-target="#productModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <a href="{{ route('eliminarPanal', $producto->id) }}"
                                            class="btn btn-outline-danger btn-sm confirm">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.partials.productModal')
  
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        const idCategoria = {{ $id_categoria }};
    </script>
    <script src="{{ asset('js/buscarPanalesAdmin.js') }}"></script>
@endsection
