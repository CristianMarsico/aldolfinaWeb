@extends('layouts.admin')
@section('content')
    <div class="container-table">
        <!-- HEADER -->
        <div class="page-header">
            <div>
                <h1>Pedidos</h1>
                <p>Administrá los pedidos de tu tienda.</p>
                <p>Selecciona una categoría del menú para gestionar productos.</p>
            </div>

            <button class="btn-primary">
                Nuevo Pedido
            </button>
        </div>

        <!-- CARDS -->
        <div class="stats">
            <div class="stat-card">
                <span>Total pedidos</span>
                <h2>1.248</h2>
            </div>

            <div class="stat-card">
                <span>Pendientes</span>
                <h2>87</h2>
            </div>

            <div class="stat-card">
                <span>Entregados</span>
                <h2>1.094</h2>
            </div>

            <div class="stat-card">
                <span>Facturación</span>
                <h2>$2.5M</h2>
            </div>
        </div>
    </div>
@endsection
