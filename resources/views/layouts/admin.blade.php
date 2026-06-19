<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>@yield('title', 'Dashboard Admin')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      height: 100vh;
      overflow: hidden;
    }

    #wrapper {
      display: flex;
      height: 100%;
      min-height: 100vh;
    }

    #sidebar-wrapper {
      width: 260px;
      background: #3478f6;
      color: white;
      overflow-y: auto;
      padding: 1rem;
      transition: transform 0.3s ease;
    }

    #sidebar-wrapper .sidebar-heading {
      font-weight: 700;
      font-size: 1.5rem;
      margin-bottom: 1rem;
      text-align: center;
      user-select: none;
    }

    #sidebar-wrapper ul,
    #sidebar-wrapper li {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    #sidebar-wrapper li {
      margin-bottom: 0.4rem;
    }

    #sidebar-wrapper a {
      color: white;
      text-decoration: none;
      padding: 7px 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-radius: 6px;
      font-weight: 600;
      transition: background-color 0.3s ease;
      user-select: none;
      cursor: pointer;
    }

    #sidebar-wrapper a.active,
    #sidebar-wrapper a:hover {
      background-color: #275ec6;
      font-weight: 700;
    }

    #page-content-wrapper {
      flex-grow: 1;
      background: #f8fbff;
      padding: 2rem;
      overflow-y: auto;
      min-width: 0;
    }

    /* Submenu categorías */
    .submenu {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.35s ease;
      margin-left: 15px !important;
      border-left: 2px solid rgba(255, 255, 255, 0.3);
      
    }

    .submenu.open {
      max-height: 1000px; /* un número grande para expandir */
      margin-top: 0.5rem;
    }

    .submenu a {
      padding: 6px 20px;
      font-weight: 500;
      margin-left: 15px;
    }

    /* Icono toggle */
    .toggle-icon {
      transition: transform 0.3s ease;
    }
    .toggle-icon.open {
      transform: rotate(90deg);
    }

    @media (max-width: 991px) {

    #wrapper {
        position: relative;
    }

    #sidebar-wrapper {
        position: fixed;
        top: 0;
        left: 0;

        width: 260px;
        height: 100vh;

        z-index: 9999;

        transform: translateX(-100%);
        transition: transform .3s ease;
    }

    #sidebar-wrapper.show {
        transform: translateX(0);
    }

    #sidebarToggle {
        position: fixed;
        top: 15px;
        left: 15px;

        z-index: 10000;
    }

    #page-content-wrapper {
        width: 100%;
        padding: 1rem;
    }
}


.tabla-admin {
    border-collapse: separate;
    border-spacing: 0 10px;
}

.tabla-admin thead th {
    background: transparent;
    border: none;
    color: #6c757d;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .5px;
    font-weight: 600;
}

.tabla-admin tbody tr {
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
    transition: .2s;
}

.tabla-admin tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,.10);
}

.tabla-admin td {
    border: none;
    padding: 18px;
    vertical-align: middle;
}

.tabla-admin tbody tr td:first-child {
    border-radius: 10px 0 0 10px;
}

.tabla-admin tbody tr td:last-child {
    border-radius: 0 10px 10px 0;
}

.acciones {
    display: flex;
    justify-content: center;
    gap: 8px;
}

.btn-accion {
    width: 36px;
    height: 36px;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 0;
    border-radius: 8px;
}

.card {
    border-radius: 15px;
}

  </style>
</head>
<body>
<div class="d-lg-none">
    <button id="sidebarToggle" class="btn btn-primary">
        <i class="bi bi-list"></i>
    </button>
</div>
<div id="wrapper">
  <nav id="sidebar-wrapper" role="navigation" aria-label="Menú lateral">
    <div class="sidebar-heading">Pañalera Admin</div>
    <ul>
      <li>
        <a href="javascript:void(0);" id="productosToggle" aria-expanded="false" aria-controls="productosSubmenu" aria-haspopup="true">
          PRODUCTOS
          <i class="bi bi-chevron-right toggle-icon" id="iconProductos"></i>
        </a>
        <ul id="productosSubmenu" class="submenu" aria-hidden="true">
          @foreach ($categorias as $categoria)
            <li>
              <a href="{{ route('admin.productos', ['categoria' => $categoria->categoria, 'id_categoria' => $categoria->id]) }}"
                 class="{{ (isset($categoriaActual) && $categoriaActual == $categoria->categoria) ? 'active' : '' }}">
                {{ ucfirst($categoria->categoria) }}
              </a>
            </li>
          @endforeach
        </ul>
      </li>
      <li>
        <a href="{{ route('admin.marcas') }}" class="{{ (isset($activo) && $activo == 'marcas') ? 'active' : '' }}">
          MARCAS
        </a>
      </li>
      <li>
        <a href="{{ route('admin.edades') }}" class="{{ (isset($activo) && $activo == 'edades') ? 'active' : '' }}">
          EDADES
        </a>
      </li>

      <li>
        <a href="{{ route('admin.imagenes') }}" class="{{ (isset($activo) && $activo == 'imagenes') ? 'active' : '' }}">
          IMÁGENES PRODUCTOS
        </a>
      </li>
    </ul>
  </nav>

  <main id="page-content-wrapper" tabindex="-1">
    @yield('content')
  </main>
</div>


 
<script>

  
document.addEventListener('DOMContentLoaded', () => {

    const toggleBtn = document.getElementById('productosToggle');
    const submenu = document.getElementById('productosSubmenu');
    const icon = document.getElementById('iconProductos');

    const sidebar = document.getElementById('sidebar-wrapper');
    const sidebarToggle = document.getElementById('sidebarToggle');

    // BOTÓN HAMBURGUESA
    if (sidebarToggle) {

        sidebarToggle.addEventListener('click', () => {

            sidebar.classList.toggle('show');

            const icono = sidebarToggle.querySelector('i');

            if (sidebar.classList.contains('show')) {

                icono.classList.remove('bi-list');
                icono.classList.add('bi-x-lg');

            } else {

                icono.classList.remove('bi-x-lg');
                icono.classList.add('bi-list');
            }

        });

    } // ← FALTABA ESTA LLAVE

    // ABRIR SUBMENÚ SI HAY CATEGORÍA ACTIVA
    const categoriaActual = @json($categoriaActual ?? '');

    if (categoriaActual && submenu.querySelector('a.active')) {

        submenu.classList.add('open');
        toggleBtn.setAttribute('aria-expanded', 'true');
        submenu.setAttribute('aria-hidden', 'false');
        icon.classList.add('open');

    }

    // TOGGLE SUBMENÚ
    toggleBtn.addEventListener('click', () => {

        const isOpen = submenu.classList.toggle('open');

        toggleBtn.setAttribute('aria-expanded', isOpen);
        submenu.setAttribute('aria-hidden', !isOpen);

        icon.classList.toggle('open', isOpen);

    });

});
</script>

@stack('scripts')
</body>
</html>
