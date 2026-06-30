@extends('layouts.admin')
@section('content')
    <section class="table-card">
        <div class="table-header">
            <input type="text" id="buscarProducto" placeholder="Buscar marca...">
            {{-- <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#marcaModal" id="btnAddMarca">
                Agregar
            </button> --}}
            <button class="btn-primary" id="btnAddMarca">
                Agregar
            </button>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Imágen</th>
                        <th>Marca</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $marca)
                        <tr>
                            <td>
                                @if ($marca->imagen)
                                    <img src="{{ asset('img/marcas/' . $marca->imagen) }}" class="img-thumbnail"
                                        style="max-width: 60px;" alt="{{ $marca->marca }}" />
                                @else
                                    <img src="{{ asset('img/sinImg.png') }}" class="img-thumbnail" style="max-width: 60px;"
                                        alt="{{ $marca->marca }}" />
                                @endif

                            </td>
                            <td>{{ $marca->marca }}</td>
                            <td>
                                <div class="acciones">
                                    {{-- <button class="btn-table btn-edit btn-edit-marca" data-marca="{{ $marca->toJson() }}"
                                        data-bs-toggle="modal">
                                        Editar
                                    </button> --}}
                                    <button class="btn-table btn-edit btn-edit-marca" data-marca="{{ $marca->toJson() }}">
                                        Editar
                                    </button>
                                    <a href="{{ route('admin.marcas.eliminar', $marca->id) }}"
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    @include('admin.partials.modalMarca')
@endsection
