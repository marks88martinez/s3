@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuario Cliente</h3>
        </div>

        <div>

            {{-- ///////////////////// --}}
            <div class="col-12 col-md-6 col-lg-6">


                <div class="card">
                  <div class="card-header">
                    <h4>Nuevo Usuario</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('userClient.store') }}" enctype="multipart/form-data">
                        @csrf

                    <div class="form-row">
                      <div class="form-group col-md-12">

                            <label for="first_name">Nombre:</label><span
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
                    <div class="form-row">
                      <div class="form-group col-md-12">
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
                      <div class="form-group col-md-6">
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
                      <div class="form-group col-md-6">
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
