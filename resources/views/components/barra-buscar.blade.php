<div class="col p-2">
    <div class="d-inline-flex p-2 bd-highlight">
        <form method="GET" action="/buscar" class="input-group rounded">
            @csrf
            <input type="text" name="search" class="form-control rounded" placeholder="Buscar" aria-label="Search" aria-describedby="search-addon" value="{{old('search')}}" />
            <span class="input-group-text border-0" id="search-addon">
            <button class="submit input-group-text border-0">
                <i class="bi bi-search"></i>
            </button>
            </span>
        </form>
    </div>
</div>
