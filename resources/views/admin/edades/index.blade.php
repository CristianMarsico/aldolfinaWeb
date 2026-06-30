@extends('layouts.admin')

{{-- @section('title', 'Administrar Edades') --}}

@section('content')
    {{-- <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-bold">
                    Administrar Edades
                </h4>

                <input type="text" id="buscarProducto" class="form-control" placeholder="Buscar..." style="width:250px">

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edadModal" id="btnAddEdad">
                    <i class="bi bi-plus-lg"></i>
                    Agregar Edad
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table tabla-admin align-middle">
                    <thead>
                        <tr>
                            <th>Edad</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($edades as $edad)
                            <tr>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $edad->edades }}
                                    </div>
                                </td>
                                <td>
                                    <div class="acciones">
                                        <button class="btn btn-outline-warning btn-sm btn-edit-edad" data-bs-toggle="modal"
                                            data-edad="{{ $edad->toJson() }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <a href="{{ route('admin.edades.eliminar', $edad->id) }}"
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
    </div> --}}

    <section class="table-card">

        <div class="table-header">

            <input type="text" id="buscarProducto" placeholder="Buscar marca...">

            <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#edadModal" id="btnAddEdad">
                Agregar
            </button>


        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Edades</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($edades as $edad)
                        <tr>
                            <td>
                                {{ $edad->edades }}
                            </td>                            
                            <td>
                                <div class="acciones">
                                    <button class="btn-table btn-edit btn-edit-edad" data-bs-toggle="modal"
                                            data-edad="{{ $edad->toJson() }}">
                                        Editar
                                    </button>

                                    <a href="{{ route('admin.edades.eliminar', $edad->id) }}"
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

    </div>
    @include('admin.partials.modalEdad')
@endsection
