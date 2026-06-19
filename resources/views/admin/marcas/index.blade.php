@extends('layouts.admin')
@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-bold">
                    Administrar Marcas
                </h4>

                <input type="text" id="buscarProducto" class="form-control" placeholder="Buscar..." style="width:250px">

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#marcaModal" id="btnAddMarca">
                    <i class="bi bi-plus-lg"></i>
                    Nueva Marca
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table tabla-admin align-middle">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($marcas as $marca)
                            <tr>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $marca->marca }}
                                    </div>
                                </td>

                                <td>
                                    <div class="acciones">
                                        <button class="btn btn-outline-warning btn-sm btn-edit-marca" 
                                        data-bs-toggle="modal"
                                            data-marca="{{ $marca->toJson() }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <a href="{{ route('admin.marcas.eliminar', $marca->id) }}"
                                            class="btn btn-outline-danger btn-sm ">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('admin.partials.modalMarca')   
@endsection
