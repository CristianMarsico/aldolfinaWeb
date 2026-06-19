{{-- @extends('layouts.user')

@section('content')
    <div class="container my-4">
        <div class="row">

            <!-- SIDEBAR -->          
            @if ($categoriaActual == 'higiene')
                @include ('user.productos.filtroHigiene')
            @else
                @include ('user.productos.filtroPanal')
            @endif


            <!-- PRODUCTOS -->
            <div class="col-md-4">
                <div class="productos-grid" id="contenedor-productos">
                    @include ('categorias')
                </div>
            </div>

        </div>
    </div>




    <script>
        const id = {{ $id_categoria }};
    </script>
    <script src="{{ asset('js/filtroPanalesSidebar.js') }}"></script>
    <script src="{{ asset('js/filtroHigieneSidebar.js') }}"></script>
@endsection --}}


@extends('layouts.user')

@section('content')

<div class="container my-4">

    <div class="productos-layout">

        @include('user.productos.filtroHigiene')

        <div class="productos-content" id="contenedor-productos">

            @include('user.productos.card')

        </div>

    </div>

</div>
<script>
        const id = {{ $id_categoria }};       
    </script>
    {{-- <script src="{{ asset('js/filtroPanalesSidebar.js') }}"></script> --}}
    <script src="{{ asset('js/filtroHigieneSidebar.js') }}"></script>
@endsection