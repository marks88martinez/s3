@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Empresa </h3>
        </div>

        <div>

            {{-- ///////////////////// --}}
            <div class="col-12 col-md-6 col-lg-6">


                <div class="card">
                  <div class="card-header">
                    <h4>Edit Empresa</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="/empresa/{{ $prod->id }}" enctype="multipart/form-data">
                        {{method_field('put')}}
                        @csrf


                      <div class="form-group col-md-12">

                            <label for="nombre_empresa">Nombre:</label><span
                                    class="text-danger">*</span>
                            <input id="nombre_empresa" type="text"
                                   class="form-control{{ $errors->has('nombre_empresa') ? ' is-invalid' : '' }}"
                                   name="nombre_empresa"
                                   tabindex="1" placeholder="Empresa" value="{{ $prod->nombre_empresa }}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre_empresa') }}
                            </div>

                      </div>
                      <div class="form-group col-md-12">

                            <label for="nombre_empresa">Sitio Web:</label><span
                                    class="text-danger">*</span>
                            <input id="sitio_web" type="text"
                                    class="form-control{{ $errors->has('sitio_web') ? ' is-invalid' : '' }}"
                                    name="sitio_web"
                                    tabindex="1" placeholder="Sitio Web" value="{{ $prod->sitio_web }}"
                                    autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('sitio_web') }}
                            </div>

                      </div>
                      <div class="form-group col-md-12">

                            <label for="telefono">telefono:</label><span
                                    class="text-danger">*</span>
                            <input id="telefono" type="text"
                                    class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                    name="telefono"
                                    tabindex="1" placeholder="Sitio Web" value="{{ $prod->telefono }}"
                                    autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('telefono') }}
                            </div>

                      </div>
                      <div class="form-group col-md-12">

                            <label for="email">email:</label><span
                                    class="text-danger">*</span>
                            <input id="email" type="text"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email"
                                    tabindex="1" placeholder="Sitio Web" value="{{ $prod->email }}"
                                    autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>

                      </div>
                      <div class="form-group col-md-12">

                            <label for="nombre_empresa">Stado:</label><span
                                    class="text-danger">*</span>
                                    <select name="status" id="status" class="form-control">

                                        @foreach( $enum as $key => $value)
                                            <option value="{{ $key }}" {{ $prod->status  == $key  ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre_empresa') }}
                            </div>

                      </div>
                      <div class="card-footer">
                        <button class="btn btn-success">Submit</button>
                      </div>

                </form>

                  </div>

                </div>


            </div>
            {{-- ///////////////////// --}}


        </div>
    </section>
@endsection
