<div class="col-md-3">
    <div class="sidebar">

        <h5><strong>HIGIENE</strong></h5>
        <p class="mt-3 mb-1">Marca</p>

        @foreach ($marcas as $m)

            <div class="form-check">

                <input class="form-check-input filtro-marca" type="checkbox" value="{{$m->id}}">
                <label class="form-check-label">{{$m->marca}}</label>
            </div>

        @endforeach

        <hr>

        {{-- <h6><strong>Filtrar por</strong></h6>

        <p class="mt-3 mb-1">Marca</p>
        {foreach $marcas as $m}
            <div class="form-check">

                <input class="form-check-input filtro-marca" type="checkbox" value="{$m->id}">
                <label class="form-check-label">{$m->marca}</label>
            </div>
        {/foreach}  --}}

        <p class="mt-3 mb-1">Precio</p>

        <div class="form-check">
            <input class="form-check-input filtro-precio" type="radio" name="precio" value="0-5000">
            <label class="form-check-label">
                $0 - $5.000
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input filtro-precio" type="radio" name="precio" value="5000-10000">
            <label class="form-check-label">
                $5.000 - $10.000
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input filtro-precio" type="radio" name="precio" value="10000-20000">
            <label class="form-check-label">
                $10.000 - $20.000
            </label>
        </div>

    </div>

    <button id="btn-limpiar-filtros" class="btn btn-outline-secondary w-100 mt-3">
        Limpiar filtros
    </button>
</div>