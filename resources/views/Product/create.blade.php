@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Product </h3>
        </div>

        <div>

            {{-- ///////////////////// --}}
            <div class="col-12 col-md-8 col-lg-8">


                <div class="card">
                  <div class="card-header">
                    <h4>Nuevo Product</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf

                    <div class="form-row">
                      <div class="form-group col-md-12">

                            <label for="sku">sku:</label><span
                                    class="text-danger">*</span>
                            <input id="sku" type="text"
                                   class="form-control{{ $errors->has('sku') ? ' is-invalid' : '' }}"
                                   name="sku"
                                   tabindex="1" placeholder="Enter Full sku" value="{{ old('sku') }}"
                                   autofocus >
                            <div class="invalid-feedback">
                                {{ $errors->first('sku') }}
                            </div>

                      </div>
                      <div class="form-group col-md-12">

                            <label for="name">Nombre:</label><span
                                    class="text-danger">*</span>
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name"
                                   tabindex="1" placeholder="Enter Full name" value="{{ old('name') }}"
                                   autofocus >

                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>


                            <div class="form-group">
                                <label class="active">Photos Product</label>
                                <input type="file" name="photourl" class="form-control-file" />

                                <!-- ////////////imageloader////////////// -->
                                <!-- <div class="input-images-2" style="padding-top: .5rem;"></div> -->

                            </div>

                            <br>
                            <div class="form-group ">
                                <label for="exampleFormControlFile1">Excel import</label>
                                <input type="file" class="form-control-file" name="importExcel" id="exampleFormControlFile1">
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
