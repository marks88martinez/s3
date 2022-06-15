@extends('layouts.auth_app')
@section('title')
    Register
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header d-flex">

                <h2 class="section-title">Registro</h2>



            <div class="ml-auto ">
                <a href="{{ route('login') }}" class=" btn btn-primary ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
            </div>
        </div>








        <div class="card-body">
            <ul class="nav nav-pills d-flex justify-content-center" id="myTab3" role="tablist">
              <li class="nav-item">
                <a class="nav-link active show" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Registro de Empresa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Registro de Usuario</a>
              </li>

            </ul>
            <div class="tab-content" id="myTabContent2">
              <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                    {{-- ////////////// registro empresa /////////// --}}
                    <div class="card-body pt-1">
                        <form method="POST" action="{{ route('registerUser.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-2"><h6>Datos de la Empresa</h6></div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">Nombre de la Empresa:</label><span
                                                class="text-danger">*</span>
                                        <input id="nombre_empresa" type="text"
                                               class="form-control{{ $errors->has('nombre_empresa') ? ' is-invalid' : '' }}"
                                               name="nombre_empresa"
                                               tabindex="1" placeholder="Nombre de la Empresa .." value="{{ old('nombre_empresa') }}"
                                               autofocus required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nombre_empresa') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefono">Telefono:</label><span
                                                class="text-danger">*</span>
                                        <input id="telefono" type="text"
                                               class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                               name="telefono"
                                               tabindex="1" placeholder="Telefono .." value="{{ old('telefono') }}"
                                               autofocus required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('telefono') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tipo_documento">Tipo de Documento:</label><span
                                                class="text-danger">*</span>
                                        <input id="tipo_documento" type="text"
                                               class="form-control{{ $errors->has('tipo_documento') ? ' is-invalid' : '' }}"
                                               name="tipo_documento"
                                               tabindex="1" placeholder="Tipo Documento .." value="{{ old('tipo_documento') }}"
                                               autofocus required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('sitio_web') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="num_documento">Numero de Documento:</label><span
                                                class="text-danger">*</span>
                                        <input id="num_documento" type="text"
                                               class="form-control{{ $errors->has('num_documento') ? ' is-invalid' : '' }}"
                                               name="num_documento"
                                               tabindex="1" placeholder="Numero de Documento .." value="{{ old('num_documento') }}"
                                               autofocus required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('sitio_web') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="sitio_web">Sitio Web:</label><span
                                                class="text-danger">*</span>
                                        <input id="sitio_web" type="text"
                                               class="form-control{{ $errors->has('sitio_web') ? ' is-invalid' : '' }}"
                                               name="sitio_web"
                                               tabindex="1" placeholder="Sitio Web .." value="{{ old('sitio_web') }}"
                                               autofocus required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('sitio_web') }}
                                        </div>
                                    </div>
                                </div>


                            </div>

                            {{-- <div class="mt-2"><h6>Dirección</h6></div>
                                <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre_lugar">nombre_lugar:</label><span
                                                class="text-danger">*</span>
                                        <input id="nombre_lugar" type="text"
                                               class="form-control{{ $errors->has('nombre_lugar') ? ' is-invalid' : '' }}"
                                               name="nombre_lugar"
                                               tabindex="1" placeholder="nombre_lugar" value="{{ old('nombre_lugar') }}"
                                               autofocus required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nombre_lugar') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="codigo_postal">codigo_postal:</label><span
                                                class="text-danger">*</span>
                                        <input id="codigo_postal" type="codigo_postal"
                                               class="form-control{{ $errors->has('codigo_postal') ? ' is-invalid' : '' }}"
                                               placeholder="codigo_postal" name="codigo_postal" tabindex="1"
                                               value="{{ old('codigo_postal') }}"
                                               required autofocus>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('codigo_postal') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pais">pais:</label><span
                                                class="text-danger">*</span>
                                        <input id="codigo_postal" type="pais"
                                               class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}"
                                               placeholder="pais" name="pais" tabindex="1"
                                               value="{{ old('pais') }}"
                                               required autofocus>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('pais') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ciudad">ciudad:</label><span
                                                class="text-danger">*</span>
                                        <input id="codigo_postal" type="ciudad"
                                               class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}"
                                               placeholder="ciudad" name="ciudad" tabindex="1"
                                               value="{{ old('ciudad') }}"
                                               required autofocus>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('ciudad') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="calle">calle:</label><span
                                                class="text-danger">*</span>
                                        <input id="calle" type="calle"
                                               class="form-control{{ $errors->has('calle') ? ' is-invalid' : '' }}"
                                               placeholder="calle" name="calle" tabindex="1"
                                               value="{{ old('calle') }}"
                                               required autofocus>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('calle') }}
                                        </div>
                                    </div>
                                </div>


                            </div> --}}
                            <div class="mt-2"><h6>Register Usuario</h6></div>
                                <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">Full Name:</label><span
                                                class="text-danger">*</span>
                                        <input id="firstName" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name"
                                               tabindex="1" placeholder="Enter Full Name" value="{{ old('name') }}"
                                               autofocus required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label><span
                                                class="text-danger">*</span>
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               placeholder="Enter Email address" name="email" tabindex="1"
                                               value="{{ old('email') }}"
                                               required autofocus>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="control-label">Password
                                            :</label><span
                                                class="text-danger">*</span>
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}"
                                               placeholder="Set account password" name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation"
                                               class="control-label">Confirm Password:</label><span
                                                class="text-danger">*</span>
                                        <input id="password_confirmation" type="password" placeholder="Confirm account password"
                                               class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"
                                               name="password_confirmation" tabindex="2">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <input name="registro" type="hidden" value="empresa">
                        </form>
                    </div>

                    {{-- ////////////// registro empresa /////////// --}}
              </div>
              <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                {{-- ///////////////// registro usuario ///////////// --}}
                <div class="card-body pt-1">
                    <form method="POST" action="{{ route('registerUser.store') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="mt-2"><h6>Register Usuario</h6></div>
                            <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">Full Name:</label><span
                                            class="text-danger">*</span>
                                    <input id="firstName" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name"
                                           tabindex="1" placeholder="Enter Full Name" value="{{ old('name') }}"
                                           autofocus required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email:</label><span
                                            class="text-danger">*</span>
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="Enter Email address" name="email" tabindex="1"
                                           value="{{ old('email') }}"
                                           required autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="control-label">Password
                                        :</label><span
                                            class="text-danger">*</span>
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}"
                                           placeholder="Set account password" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation"
                                           class="control-label">Confirm Password:</label><span
                                            class="text-danger">*</span>
                                    <input id="password_confirmation" type="password" placeholder="Confirm account password"
                                           class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"
                                           name="password_confirmation" tabindex="2">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password_confirmation') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input name="registro" type="hidden" value="usuario">
                    </form>
                </div>

                {{-- ///////////////// registro usuario ///////////// --}}

            </div>

            </div>
          </div>


    </div>

@endsection
