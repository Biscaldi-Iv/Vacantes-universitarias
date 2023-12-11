<div class="modal-body">

    @auth
        <div class="form-group row">
            <div class="col-sm-12 p-2" hidden>
                <label for="id">ID</label>
                <input type="number" class="form-control" name="id" id="id" placeholder="id del usuario">
            </div>
        </div>
    @endauth

    <div class="form-group row">
        <div class="col-sm-6 p-2">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" minlength="2"
                placeholder="Primer nombre" required @guest value="{{ old('nombre') }}" @endguest>
        </div>
        <div class="col-sm-6 p-2">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" minlength="5"
                placeholder="Apellidos" required @guest value="{{ old('apellido') }}" @endguest>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 p-2">
            <label for="email">Email</label>
            <input type="mail" class="form-control" name="email" id="email" placeholder="Email" required
                @auth readonly @endauth @guest value="{{ old('email') }}" @endguest>
        </div>
        <div class="col-sm-6 p-2">
            <label for="telefono">Teléfono</label>
            <input type="phone" class="form-control" name="telefono" id="telefono" minlength="7"
                placeholder="Teléfono" required @guest value="{{ old('telefono') }}" @endguest>
        </div>
    </div>

    @auth
        @if (auth()->user()->privilegio == 3 && isset($universidades))
            <div class="form-group row">
                <div class="col-sm-6 p-2">
                    <label for="privilegio">Privilegio</label>
                    <select name="privilegio" id="privilegio" class="form-select form-select-lg" onchange="cambiar(this)">
                        <option value="1" selected>Usuario</option>
                        <option value="2">Personal universitario</option>
                        <option value="3">Administrator</option>
                    </select>
                </div>
                <div class="col-sm-6 p-2" id="selUni" hidden>
                    <label for="fkIdUni" class="form-label">Universidad</label>
                    <select class="form-select form-select-lg" name="fkIdUni" id="fkIdUni"
                        onchange="showCatedras(this.value)">
                        @foreach ($universidades as $u)
                            <option value="{{ $u->idUniversidad }}">{{ $u->nombreUniversidad }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row" id="formCatedras" hidden>
                <div class="col-sm-6 p-2">
                    <label for="fkIdCatedra">Catedra</label>
                    <select class="form-select form-select-lg" name="fkIdCatedra" id="fkIdCatedra"></select>
                </div>
            </div>
        @endif
    @endauth

    <div class="form-group row">
        <div class="col-sm-6 p-2">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="direccion" id="direccion" minlength="5"
                placeholder="direccion" required @guest value="{{ old('direccion') }}" @endguest>
        </div>
        <div class="col-sm-6 p-2">
            <label for="ndoc">Documento</label>
            <select name="tipodoc" id="tipodoc" class="form-grup-text">
                <option value="DNI">DNI</option>
                <option value="ID">ID</option>
                <option value="LC">LC</option>
                <option value="LE">LE</option>
                <option value="CI">CI</option>
            </select>
            <input type="number" class="form-control" name="ndoc" id="ndoc" required
                @guest value="{{ old('ndoc') }}" @endguest>
        </div>
    </div>

    @auth
        <div class="form-group row">
            <div class="col-sm-6 p-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="cambio" onchange="cambiarContras(this.checked)"
                        checked />
                    <label class="form-check-label" for="cambio"> Cambiar contraseña</label>
                </div>
            </div>
        </div>
    @endauth


    <div class="form-group row" id='claves'>
        <div class="col-sm-6 p-2">
            <label for="password">Contraseña</label>
            <div class="input-group">
                <input type="password" class="form-control" oninput="checkpass()" name="password" id="password"
                    placeholder="contraseña" minlength="8" maxlength="16"
                    @guest value="{{ old('password') }}" @endguest>
                <button class="btn" style=" border-color: #ced4da;" type="button" id="togglePassword">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>
        <div class="col-sm-6 p-2">
            <label for="password_confirmacion">Confirmar Contraseña</label>
            <div class="input-group">
                <input type="password" class="form-control" oninput="checkpass()" name="password_confirmacion"
                    id="password_confirmacion" placeholder="contraseña" minlength="8" maxlength="16"
                    @guest value="{{ old('password_confirmacion') }}" @endguest>
                <button class="btn" style=" border-color: #ced4da;" type="button"
                    id="togglePasswordConfirmation">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>
    </div>
    <h6 class="alert alert-success" id="success" hidden></h6>
</div>
