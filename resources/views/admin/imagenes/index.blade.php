@extends('layouts.admin')
@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-bold">
                    Administrar Imágenes
                </h4>

                <input type="text" id="buscarProducto" class="form-control" placeholder="Buscar..." style="width:250px">

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imgModal" id="btnAddImagen">
                    <i class="bi bi-plus-lg"></i>
                    Cargar Imagen
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table tabla-admin align-middle">
                    <thead>
                        <tr>
                            <th>Imágen</th>
                            <th>Producto</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($imagenes as $img)
                            <tr>

                                <td>
                                     @if ($img->imagen)
                                        <img src="{{asset('img/img_productos/'.$img->imagen)}}" class="img-thumbnail"
                                            style="max-width: 60px;" alt="{{ $img->nombre }}" />
                                    @else
                                        <img src="{{ asset('img/sinImg.png') }}" class="img-thumbnail"
                                            style="max-width: 60px;" alt="default" />
                                    @endif

                                </td>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $img->producto->nombre }}
                                    </div>
                                </td>

                                <td>
                                    <div class="acciones">
                                        <button class="btn btn-outline-warning btn-sm btn-edit-imagen"
                                            data-imagen='@json($img)'>
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <a href="{{ route('admin.imagenes.eliminar', $img->id) }}"
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

    @include('admin.partials.modalImagenes')
@endsection
