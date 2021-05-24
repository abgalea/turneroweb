@extends('layouts.app')
        
            <div class="card">
                <div class="card-header">Registrar nuevo Usuario</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Usuario</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dependencia" class="col-md-4 col-form-label text-md-right">Dependencia</label>

                            <div class="col-md-6">
                                <select class="form-control" name="dependencia">
                                    <option >SELECCIONAR UNA OPCIÓN</option>
                                    <option selected value="MELD">MELD</option>
                                </select>

                                @error('dependencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dependencia" class="col-md-4 col-form-label text-md-right">Localidad</label>

                            <div class="col-md-6">
                                <select class="form-control" name="localidad" >
                                    <option selected disabled>SELECCIONAR UNA OPCIÓN</option>
                                    <option value='25 de Mayo'>25 de Mayo</option>
                                    <option value='9 de Julio'>9 de Julio</option>
                                    <option value='Alba Posse'>Alba Posse</option>
                                    <option value='Almafuerte'>Almafuerte</option>
                                    <option value='Ameghino'>Ameghino</option>
                                    <option value='Apostoles'>Apostoles</option>
                                    <option value='Aristobulo del Valle'>Aristobulo del Valle</option>
                                    <option value='Arroyo del Medio'>Arroyo del Medio</option>
                                    <option value='Azara'>Azara</option>
                                    <option value='Bernardo de Irigoyen'>Bernardo de Irigoyen</option>
                                    <option value='Bompland'>Bompland</option>
                                    <option value='Caa Yari'>Caa Yari</option>
                                    <option value='Campo Grande'>Campo Grande</option>
                                    <option value='Campo Ramon'>Campo Ramon</option>
                                    <option value='Campo Viera'>Campo Viera</option>
                                    <option value='Candelaria'>Candelaria</option>
                                    <option value='Capiovi'>Capiovi</option>
                                    <option value='Caraguatay'>Caraguatay</option>
                                    <option value='Cerro Azul'>Cerro Azul</option>
                                    <option value='Cerro Cora'>Cerro Cora</option>
                                    <option value='Colonia Alberdi'>Colonia Alberdi</option>
                                    <option value='Colonia Aurora'>Colonia Aurora</option>
                                    <option value='Colonia Delicia'>Colonia Delicia</option>
                                    <option value='Colonia Polana'>Colonia Polana</option>
                                    <option value='Colonia Victoria'>Colonia Victoria</option>
                                    <option value='Colonia Wanda'>Colonia Wanda</option>
                                    <option value='Comandante Andresito'>Comandante Andresito</option>
                                    <option value='Concepcion de la Sierra'>Concepcion de la Sierra</option>
                                    <option value='Corpus'>Corpus</option>
                                    <option value='Dos Arroyos'>Dos Arroyos</option>
                                    <option value='Dos de Mayo'>Dos de Mayo</option>
                                    <option value='El Alcazar'>El Alcazar</option>
                                    <option value='El Soberbio'>El Soberbio</option>
                                    <option value='Eldorado'>Eldorado</option>
                                    <option value='Fachinal'>Fachinal</option>
                                    <option value='Garuhape'>Garuhape</option>
                                    <option value='Garupa'>Garupa</option>
                                    <option value='General Alvear'>General Alvear</option>
                                    <option value='General Urquiza'>General Urquiza</option>
                                    <option value='Gobernador Lopez'>Gobernador Lopez</option>
                                    <option value='Gobernador Roca'>Gobernador Roca</option>
                                    <option value='Guarani'>Guarani</option>
                                    <option value='Hipolito Irigoyen'>Hipolito Irigoyen</option>
                                    <option value='Itacaruare'>Itacaruare</option>
                                    <option value='Jardin America'>Jardin America</option>
                                    <option value='Leandro N. Alem'>Leandro N. Alem</option>
                                    <option value='Loreto'>Loreto</option>
                                    <option value='Los Helechos'>Los Helechos</option>
                                    <option value='Martires'>Martires</option>
                                    <option value='Mojon Grande'>Mojon Grande</option>
                                    <option value='Montecarlo'>Montecarlo</option>
                                    <option value='Obera'>Obera</option>
                                    <option value='Olegario V. Andrade'>Olegario V. Andrade</option>
                                    <option value='Panambi'>Panambi</option>
                                    <option value='Posadas'>Posadas</option>
                                    <option value='Pozo Azul'>Pozo Azul</option>
                                    <option value='Profundidad'>Profundidad</option>
                                    <option value='Puerto Esperanza'>Puerto Esperanza</option>
                                    <option value='Puerto Iguazu'>Puerto Iguazu</option>
                                    <option value='Puerto Leoni'>Puerto Leoni</option>
                                    <option value='Puerto Libertad'>Puerto Libertad</option>
                                    <option value='Puerto Piray'>Puerto Piray</option>
                                    <option value='Puerto Rico'>Puerto Rico</option>
                                    <option value='Ruiz de Montoya'>Ruiz de Montoya</option>
                                    <option value='San Antonio'>San Antonio</option>
                                    <option value='San Ignacio'>San Ignacio</option>
                                    <option value='San Javier'>San Javier</option>
                                    <option value='San Jose'>San Jose</option>
                                    <option value='San Martin'>San Martin</option>
                                    <option value='San Pedro'>San Pedro</option>
                                    <option value='San Vicente'>San Vicente</option>
                                    <option value='Santa Ana'>Santa Ana</option>
                                    <option value='Santa Maria'>Santa Maria</option>
                                    <option value='Santiago de Liniers'>Santiago de Liniers</option>
                                    <option value='Santo Pipo'>Santo Pipo</option>
                                    <option value='Tres Capones'>Tres Capones</option>
                                </select>
                                @error('dependencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nivel" class="col-md-4 col-form-label text-md-right">Rol</label>

                            <div class="col-md-6">
                                <select class="form-control" name="nivel" >
                                <option value="admin"> Administrador</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="vendedor">Vendedor</option>
                                </select>
                                @error('nivel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    
