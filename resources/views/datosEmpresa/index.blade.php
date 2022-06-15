@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Datos de la Empresa</h3>
        </div>

        <div>
            @if(session()->has('message'))

            <div class="alert {{session('alert') ?? 'alert-info'}} alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>×</span>
                    </button>
                    {{ session('message') }}
                  </div>

            </div>
            @endif
            @isset($dir)

              {{-- ///////////////////// --}}
              <div class="col-12 col-md-12 col-lg-12">


                <div class="card">
                <div class="card-header">
                    <h4>Edit Address</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/datosEmpresa/ {{ $dir->id }}" enctype="multipart/form-data">
                        {{method_field('put')}}
                        @csrf


                    <div class="form-row">
                    <div class="form-group col-md-5">

                            <label for="first_name">Lugar:</label><span
                                    class="text-danger">*</span>
                            <input id="firstName" type="text"
                                class="form-control{{ $errors->has('nombre_lugar') ? ' is-invalid' : '' }}"
                                name="nombre_lugar"
                                tabindex="1" placeholder="Lugar" value="{{ $dir->nombre_lugar }}"
                                autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                    </div>
                    <div class="form-group col-md-4">

                            <label for="first_name">Pais:</label><span
                                    class="text-danger">*</span>

                                    <select name="pais" class="form-control">
                                        @foreach ($paises as $key =>  $pais )

                                        <option value="{{ $key }}"  {{(old('title', $key) == $dir->pais ? 'selected' : '')}}>{{ $pais }}</option>
                                        @endforeach
                                    </select>




                    </div>
                    <div class="form-group col-md-3">

                            <label for="codigo_postal">Codigo Postal:</label><span
                                    class="text-danger">*</span>
                            <input id="codigo_postal" type="text"
                                class="form-control{{ $errors->has('codigo_postal') ? ' is-invalid' : '' }}"
                                name="codigo_postal"
                                tabindex="1" placeholder="Codigo Postal" value="{{ $dir->codigo_postal}}"
                                autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('codigo_postal') }}
                            </div>
                    </div>

                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">

                            <label for="first_name">Ciudad:</label><span
                                    class="text-danger">*</span>
                            <input id="ciudad" type="text"
                                class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}"
                                name="ciudad"
                                tabindex="1" placeholder="ciudad" value=" {{ $dir->ciudad}}"
                                autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('ciudad') }}
                            </div>
                    </div>
                    <div class="form-group col-md-6">

                            <label for="calle">Calle:</label><span
                                    class="text-danger">*</span>
                            <input id="calle" type="text"
                                class="form-control{{ $errors->has('calle') ? ' is-invalid' : '' }}"
                                name="calle"
                                tabindex="1" placeholder="calle" value="{{ $dir->calle }}"
                                autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('calle') }}
                            </div>
                    </div>

                    </div>


                    <div class="card-footer">
                        <button class="btn btn-success">Actualizar</button>
                    </div>

                </form>

                </div>

                </div>


             </div>
          {{-- ///////////////////// --}}

            @else
             {{-- ///////////////////// --}}
             <div class="col-12 col-md-12 col-lg-12">


                <div class="card">
                <div class="card-header">
                    <h4> New Address </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/datosEmpresa" enctype="multipart/form-data">
                        {{method_field('post')}}
                        @csrf


                    <div class="form-row">
                    <div class="form-group col-md-5">

                            <label for="first_name">Lugar:</label><span
                                    class="text-danger">*</span>
                            <input id="firstName" type="text"
                                class="form-control{{ $errors->has('nombre_lugar') ? ' is-invalid' : '' }}"
                                name="nombre_lugar"
                                tabindex="1" placeholder="Lugar"
                                autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                    </div>
                    <div class="form-group col-md-4">

                            <label for="first_name">Pais:</label><span
                                    class="text-danger">*</span>

                                    <select name="pais" class="form-control">
                                        @foreach ($paises as $key =>  $pais )

                                        <option value="{{ $key }}"  >{{ $pais }}</option>
                                        @endforeach
                                    </select>




                    </div>
                    <div class="form-group col-md-3">

                            <label for="codigo_postal">Codigo Postal:</label><span
                                    class="text-danger">*</span>
                            <input id="codigo_postal" type="text"
                                class="form-control{{ $errors->has('codigo_postal') ? ' is-invalid' : '' }}"
                                name="codigo_postal"
                                tabindex="1" placeholder="Codigo Postal"
                                autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('codigo_postal') }}
                            </div>
                    </div>

                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">

                            <label for="first_name">Ciudad:</label><span
                                    class="text-danger">*</span>
                            <input id="ciudad" type="text"
                                class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}"
                                name="ciudad"
                                tabindex="1" placeholder="ciudad"
                                autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('ciudad') }}
                            </div>
                    </div>
                    <div class="form-group col-md-6">

                            <label for="calle">Calle:</label><span
                                    class="text-danger">*</span>
                            <input id="calle" type="text"
                                class="form-control{{ $errors->has('calle') ? ' is-invalid' : '' }}"
                                name="calle"
                                tabindex="1" placeholder="calle"
                                autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('calle') }}
                            </div>
                    </div>

                    </div>


                    <div class="card-footer">
                        <button class="btn btn-success">New Address</button>
                    </div>

                </form>

                </div>

                </div>


             </div>

              {{-- ///////////////////// --}}
              @endisset



              {{-- ///////////////////// --}}
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Registro de dir </h4>
                  </div>



                  <div class="card-body">
             {{--  /////////////////////////////  --}}

                  <div class="form-group">
                    <form action="/datosEmpresa" method="GET" class="">
                        <div class="input-group input-group-sm" >
                        <input type="text" name="search" class="form-control float-left" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            </button>
                        </div>
                        </div>
                    </form>

                </div>

              {{--  /////////////////////////////  --}}
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tbody><tr>
                            <th >#</th>
                            <th >#Lugar</th>
                            <th >#Codigo Postal.</th>
                            <th >#Pais</th>
                            <th >#Ciudad</th>
                            <th >#Calle</th>
                            <th >#</th>
                        </tr>
                        @foreach ($dirs as $dir)
                        <tr>
                            <th scope="row">{{ $dir->id }}</th>

                            <td>{{ $dir->nombre_lugar }}</td>
                            <td>{{ $dir->codigo_postal }}</td>
                            <td>{{ $dir->pais }}</td>
                            <td>{{ $dir->ciudad }}</td>
                            <td>{{ $dir->calle }}</td>


                            <td >
                                <div style="display: flex;">
                                    <a href="/datosEmpresa?id={{ $dir->id }}" class="btn btn-icon btn-warning"><i class="fas fa-cog"></i></a>
                                    <form action="/datosEmpresa/{{  $dir->id }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-icon btn-danger"><i class="fas fa-trash "></i></button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @endforeach

                      </tbody></table>
                    </div>
                  </div>
                  <div class="card-footer text-right">

                        <div class="card-footer clearfix">
                            <div class="pagination pagination-sm m-0 float-right">
                                {{--  {{ $dirs->links('pagination::bootstrap-4') }}  --}}

                            </div>
                        </div>

                  </div>
                </div>
            </div>
              {{-- ///////////////////// --}}



        </div>
    </section>
@endsection
