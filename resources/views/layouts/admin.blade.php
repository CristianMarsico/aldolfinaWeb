<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard Admin')</title>
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tablanueva.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
  
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            height: 100vh;
            overflow: hidden;
            background: #f8fafc;
        }

        #wrapper {
            display: flex;
            height: 100vh;
        }

        #sidebar-wrapper {
            width: 270px;
            background: #fff;
            border-right: 1px solid #e5e7eb;
            padding: 1.5rem;
            overflow-y: auto;
        }

        .sidebar-heading {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2563eb;
            margin-bottom: 2rem;
        }

        #sidebar-wrapper ul,
        #sidebar-wrapper li {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        #sidebar-wrapper li {
            margin-bottom: 8px;
        }

        #sidebar-wrapper a {
            text-decoration: none;
            color: #4b5563;

            display: flex;
            align-items: center;
            gap: 12px;

            padding: 12px 14px;
            border-radius: 12px;

            transition: .2s ease;
        }

        #sidebar-wrapper a:hover {
            background: #f3f4f6;
            color: #111827;
        }

        #sidebar-wrapper a.active {
            background: #2563eb;
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(37, 99, 235, .25);
        }

        #page-content-wrapper {
            flex: 1;
            overflow-y: auto;
            padding: 2rem;
        }

        .topbar {
            height: 70px;
            background: white;
            border-radius: 16px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 25px;
            margin-bottom: 25px;

            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info i {
            font-size: 28px;
        }

        .submenu {
            max-height: 0;
            overflow: hidden;

            margin-left: 10px;
            border-left: 2px solid #e5e7eb;

            transition: max-height .3s ease;
        }

        .submenu.open {
            max-height: 1000px;
        }

        .submenu a {
            font-size: .95rem;
            padding-left: 20px;
        }

        .toggle-icon {
            margin-left: auto;
            transition: .3s;
        }

        .toggle-icon.open {
            transform: rotate(90deg);
        }




        .hamburger-btn {
    position: fixed;
    top: 15px;
    left: 15px;

    width: 50px;
    height: 50px;

    border: none;
    border-radius: 12px;

    background: white;
    color: #111827;

    box-shadow: 0 4px 15px rgba(0,0,0,.12);

    z-index: 10001;

    font-size: 24px;

    display: flex;
    align-items: center;
    justify-content: center;

    transition: .25s;
}

.hamburger-btn:hover {
    transform: scale(1.05);
}


#sidebarOverlay {

    position: fixed;
    inset: 0;

    background: rgba(0,0,0,.4);

    opacity: 0;
    visibility: hidden;

    transition: .3s;

    z-index: 9998;
}

#sidebarOverlay.show {

    opacity: 1;
    visibility: visible;
}

@media (max-width: 991px) {

    #sidebar-wrapper {

        position: fixed;

        top: 0;
        left: 0;

        width: 280px;
        height: 100vh;

        z-index: 9999;

        transform: translateX(-100%);

        transition: transform .3s ease;

        box-shadow: 10px 0 30px rgba(0,0,0,.15);
    }

    #sidebar-wrapper.show {

        transform: translateX(0);
    }

    #page-content-wrapper {

        width: 100%;
        padding-top: 80px;
    }
}
    </style>
</head>

<body>
    <div class="d-lg-none">

    <button id="sidebarToggle" class="hamburger-btn">
        <i class="bi bi-list"></i>
    </button>

</div>

<div id="sidebarOverlay"></div>
    <div id="wrapper">      
        <nav id="sidebar-wrapper">
            <ul>

                <li>
                    <a href="javascript:void(0);" id="productosToggle">

                        <i class="bi bi-box-seam"></i>

                        <span>Productos</span>

                        <i class="bi bi-chevron-right toggle-icon" id="iconProductos"></i>

                    </a>

                    <ul id="productosSubmenu" class="submenu">

                        @foreach ($categorias as $categoria)
                            <li>

                                <a href="{{ route('admin.productos', [
                                    'categoria' => $categoria->categoria,
                                    'id_categoria' => $categoria->id,
                                ]) }}"
                                    class="{{ request()->routeIs('admin.productos') && request('id_categoria') == $categoria->id ? 'active' : '' }}">

                                    {{ ucfirst($categoria->categoria) }}

                                </a>

                            </li>
                        @endforeach

                    </ul>

                </li>

                <li>

                    <a href="{{ route('admin.marcas') }}"
                        class="{{ request()->routeIs('admin.marcas') ? 'active' : '' }}">

                        <i class="bi bi-tags"></i>

                        <span>Marcas</span>

                    </a>

                </li>

                <li>

                    <a href="{{ route('admin.edades') }}"
                        class="{{ request()->routeIs('admin.edades') ? 'active' : '' }}">

                        <i class="bi bi-people"></i>

                        <span>Edades</span>

                    </a>

                </li>

                <li>

                    <a href="{{ route('admin.imagenes') }}"
                        class="{{ request()->routeIs('admin.imagenes') ? 'active' : '' }}">

                        <i class="bi bi-images"></i>

                        <span>Imágenes</span>

                    </a>

                </li>

            </ul>

        </nav>
        {{-- <main id="page-content-wrapper" tabindex="-1">
            @yield('content')
        </main> --}}

        <main id="page-content-wrapper">

            <div class="topbar">

                <div>
                    <h5 class="mb-0">Panel de Administración</h5>
                </div>

                <div class="user-info">

                    <i class="bi bi-person-circle"></i>

                    <span>Administrador</span>

                </div>

            </div>

            @yield('content')

        </main>
    </div>
    @include('componentModal')

    {{-- <script src="{{ asset('js/modals.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', () => {

        //     const toggleBtn = document.getElementById('productosToggle');
        //     const submenu = document.getElementById('productosSubmenu');
        //     const icon = document.getElementById('iconProductos');

        //     const sidebar = document.getElementById('sidebar-wrapper');
        //     const sidebarToggle = document.getElementById('sidebarToggle');

        //     // BOTÓN HAMBURGUESA
        //     if (sidebarToggle) {

        //         sidebarToggle.addEventListener('click', () => {

        //             sidebar.classList.toggle('show');

        //             const icono = sidebarToggle.querySelector('i');

        //             if (sidebar.classList.contains('show')) {

        //                 icono.classList.remove('bi-list');
        //                 icono.classList.add('bi-x-lg');

        //             } else {

        //                 icono.classList.remove('bi-x-lg');
        //                 icono.classList.add('bi-list');
        //             }

        //         });

        //     } // ← FALTABA ESTA LLAVE

        //     // ABRIR SUBMENÚ SI HAY CATEGORÍA ACTIVA
        //     const categoriaActual = @json($categoriaActual ?? '');

        //     if (categoriaActual && submenu.querySelector('a.active')) {

        //         submenu.classList.add('open');
        //         toggleBtn.setAttribute('aria-expanded', 'true');
        //         submenu.setAttribute('aria-hidden', 'false');
        //         icon.classList.add('open');

        //     }

        //     // TOGGLE SUBMENÚ
        //     toggleBtn.addEventListener('click', () => {

        //         const isOpen = submenu.classList.toggle('open');

        //         toggleBtn.setAttribute('aria-expanded', isOpen);
        //         submenu.setAttribute('aria-hidden', !isOpen);

        //         icon.classList.toggle('open', isOpen);

        //     });

        // });


document.addEventListener('DOMContentLoaded', () => {

    const toggleBtn = document.getElementById('productosToggle');
    const submenu = document.getElementById('productosSubmenu');
    const icon = document.getElementById('iconProductos');

    const sidebar = document.getElementById('sidebar-wrapper');
    const btn = document.getElementById('sidebarToggle');
    const overlay = document.getElementById('sidebarOverlay');

    btn.addEventListener('click', () => {

        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');

        const icon = btn.querySelector('i');

        if (sidebar.classList.contains('show')) {

            icon.classList.remove('bi-list');
            icon.classList.add('bi-x-lg');

        } else {

            icon.classList.remove('bi-x-lg');
            icon.classList.add('bi-list');
        }

    });

    overlay.addEventListener('click', () => {

        sidebar.classList.remove('show');
        overlay.classList.remove('show');

        const icon = btn.querySelector('i');

        icon.classList.remove('bi-x-lg');
        icon.classList.add('bi-list');

    });
    // Abrir automáticamente si hay una categoría activa
    if (submenu.querySelector('.active')) {
        submenu.classList.add('open');
        icon.classList.add('open');
    }

    // Abrir/Cerrar al hacer click
    toggleBtn.addEventListener('click', () => {

        submenu.classList.toggle('open');
        icon.classList.toggle('open');

    });

});
    </script>


</body>

</html>
