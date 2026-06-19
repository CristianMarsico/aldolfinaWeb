<div class="contact-form-card">
    <h2 id="form-title">{{ $producto ? 'Editar Existente' : 'Crear Nuevo' }}</h2>
    <form class="contact-form" action="{{ route('guardarPanal') }}" method="POST" enctype="multipart/form-data"
        novalidate>
        @csrf
        <input type="hidden" name="id" value="{{ $producto->id ?? '' }}">
        <input type="hidden" name="id_categoria" value="{{ $id_categoria }}">

        <div class="form-group">
            <label for="nombre">Producto</label>
            <input type="text" id="nombre" name="nombre"
                value="{{ old('nombre', $producto->nombre ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <select id="edad" name="edad" required>
                @foreach ($edades as $e)
                    <option value="{{ $e->id }}"
                        {{ old('edad', $producto->id_edad ?? '') == $e->id ? 'selected' : '' }}>
                        {{ $e->edades }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <select id="marca" name="marca" required>
                @foreach ($marcas as $m)
                    <option value="{{ $m->id }}"
                        {{ old('marca', $producto->id_marca ?? '') == $m->id ? 'selected' : '' }}>
                        {{ $m->marca }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="talle">Talle</label>
            <select id="talle" name="talle" required>
                @foreach ($talles as $t)
                    <option value="{{ $t->id }}"
                        {{ old('talle', $producto->id_talle ?? '') == $t->id ? 'selected' : '' }}>
                        {{ $t->talle }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" step="0.01" name="precio"
                value="{{ old('precio', $producto->precio ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $producto->stock ?? '') }}"
                required>
        </div>
        <div class="form-group">
            <label for="descripcion_corta">Descripción corta</label>
            <input type="text" id="descripcion_corta" name="descripcion_corta"
                value="{{ old('descripcion_corta', $producto->descripcion_corta ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion_larga">Descripción larga</label>
            <textarea id="descripcion_larga" rows="4" name="descripcion_larga" required>{{ old('descripcion_larga', $producto->descripcion_larga ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">
            @if (!empty($producto->imagen))
                <img src="{{ asset('img/' . $producto->imagen) }}" width="120" class="img-thumbnail mt-2"
                    alt="Imagen producto">
            @endif
        </div>

        {{-- <button type="submit">{{ $producto ? 'Editar Producto' : 'Agregar Producto' }}</button> --}}
        <button type="submit"
            class="btn-contact {{ $producto ? 'confirm-edit' : 'confirm-submit' }}">{{ $producto ? 'Editar Producto' : 'Agregar Producto' }}</button>
    </form>
</div>