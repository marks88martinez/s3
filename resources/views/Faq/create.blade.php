@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">faq </h3>
        </div>

        <div>

            {{-- ///////////////////// --}}
            <div class="col-12 col-md-12 col-lg-12">


                <div class="card">
                  <div class="card-header">
                    <h4>Nuevo faq</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('faq.store') }}" enctype="multipart/form-data">
                        @csrf

                    <div class="form-row">

                      <div class="form-group col-md-12">

                            <label for="name">Title:</label><span
                                    class="text-danger">*</span>
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name"
                                   tabindex="1" placeholder="Enter Full name" value="{{ old('name') }}"
                                   autofocus >

                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                      </div>
                      <div class="form-group col-md-12">


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="ckeditor form-control" name="description"></textarea>
                                        {{--  <textarea name="description"  class="form-control"  id="" cols="10" rows="4">{{ $producto->description }}</textarea>  --}}
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

@endsection
