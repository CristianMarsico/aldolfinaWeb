@extends('layouts.admin')
@section('content')

    <section class="table-card">
        <div class="table-header">
            <input type="text" id="buscarProducto" placeholder="Buscar producto...">
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Imágenes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>
                                {{ $producto->nombre }}
                            </td>
                            <td>

                                @forelse($producto->imagenes as $img)
                                    <div class="d-inline-block text-center me-2 mb-2">

                                        <img src="{{ asset('img/img_productos/' . $img->imagen) }}" class="img-thumbnail"
                                            style="
                                                max-width: 60px;;
                                                height:60px;
                                                object-fit:fill;
                                            ">

                                        <div class="mt-1">


                                            @if ($img->principal)
                                                <span class="badge bg-success">
                                                    Principal
                                                </span>
                                            @else
                                                <button class="btn btn-sm btn-outline-success btn-principal"
                                                    data-id="{{ $img->id }}">
                                                    Principal
                                                </button>
                                            @endif

                                        </div>

                                        <div class="mt-1">


                                            <button class="btn-table btn-delete confirmDelete btn-eliminar-imagen"
                                                data-id="{{ $img->id }}">
                                                Eliminar
                                            </button>

                                        </div>

                                    </div>

                                @empty

                                    <img src="{{ asset('img/sinImg.png') }}" class="img-thumbnail" style="width:80px">
                                @endforelse

                            </td>                          

                            <td>

                                <button
                                    class="btn-primary btn-table btn-add-imagen"
                                    data-producto="{{ $producto->id }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#imgModal">                                    
                                    Agregar
                                </button>

                                @if ($producto->imagenes->count())

                                    <button
                                        class="btn-table btn-delete confirmDelete btn-eliminar-todas"
                                        data-producto="{{ $producto->id }}">

                                        Eliminar todas

                                    </button>

                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    </div>

    @include('admin.partials.modalImagenes')
    <script src="{{ asset('js/img.js') }}"></script>
@endsection
