<div class="col p-2">
    <div class="d-inline-flex p-2 bd-highlight">
        <form method="GET" action="/buscar" class="input-group rounded">
            @csrf
            <div class="form-floating input-group">
                <input type="text" name="search" id="search" class="form-control rounded" placeholder="Buscar" aria-label="Buscar vacante" aria-describedby="search-addon" value="{{old('search')}}">
                <label for="search">Buscar vacante</label>
                <span class="input-group-text border-0" id="search-addon">
                    <button class="btn btn-outline-secondary border-0">
                        <i class="bi bi-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
