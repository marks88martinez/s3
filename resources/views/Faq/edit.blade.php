@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuario Cliente </h3>
        </div>

        <div>

            {{-- ///////////////////// --}}
            <div class="col-12 col-md-12 col-lg-12">


                <div class="card">
                  <div class="card-header">
                    <h4>Edit Usuario</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="/faq/{{ $faq->id }}" enctype="multipart/form-data">
                        {{method_field('put')}}
                        @csrf


                      <div class="form-group col-md-12">

                            <label for="name">Nombre:</label><span
                                    class="text-danger">*</span>
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name"
                                   tabindex="1" placeholder="Enter Full name" value="{{ $faq->name }}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>

                      </div>
                      <div class="form-group col-md-12">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="ckeditor form-control" name="description">
                                {!! $faq->description }}
                            </textarea>
                            {{--  <textarea name="description"  class="form-control"  id="" cols="10" rows="4">{{ $producto->description }}</textarea>  --}}
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
