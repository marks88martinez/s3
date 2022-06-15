@extends('layouts.app')

@section('content')
<style>

</style>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">RMA</h3>
            <div class="section-header-breadcrumb">
                <a href="product/create" class="btn btn-icon btn-success"><i class="far fa-user"></i></a>


              </div>
        </div>
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

        <div class="row">

            @isset($rma)

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h4>RMA</h4>
                      {{ $rma }}
                    </div>
                    <div class="card-body">


                    <form method="POST" action="{{ route('rma.store') }}" enctype="multipart/form-data">
                        {{method_field('put')}}
                         @csrf

                      <div class="form-row">
                        <div class="form-group col-md-6">

                              <label for="sku">Productos:</label><span
                                      class="text-danger">*</span>


                                      <select class=" form-control selectpicker" name="producto_id" data-live-search="true">
                                        @foreach ($prod as  $key => $pro)
                                        <option data-tokens="ketchup mustard" value="{{ $pro->id }}" {{(old('producto_id', $pro->id) == $rma->producto_id ? 'selected' : '')}}>
                                            {{ $pro->sku }}
                                            - {{Str::limit(  $pro->name , 45, $end='...')}}
                                        </option>
                                        @endforeach

                                      </select>
                        </div>
                        <div class="form-group col-md-3">
                              <label for="sku">Comprado de :</label><span
                                      class="text-danger">*</span>

                                      <select class=" form-control selectpicker" id="comprado_de" name="empresa_id" data-live-search="true">
                                        @foreach ($emp as  $key => $pro)
                                        <option data-tokens="ketchup mustard" value="{{ $pro->id }}" {{(old('empresa_id', $pro->id) == $rma->empresa_id ? 'selected' : '')}}>
                                             {{Str::limit(  $pro->nombre_empresa , 45, $end='...')}}
                                        </option>
                                        @endforeach

                                      </select>




                        </div>
                        <div class="form-group col-md-3">
                              <label for="sku">Dirección de envio :</label><span
                                      class="text-danger">*</span>

                                      <select id="address">

                                        {{-- <option  data-tokens="ketchup mustard" value="">
                                        </option> --}}

                                      </select>
                        </div>

                        {{--  <div class="form-group col-md-6">

                              <label for="sku">sku:</label><span
                                      class="text-danger">*</span>
                              <input id="sku" type="text"
                                     class="form-control{{ $errors->has('sku') ? ' is-invalid' : '' }}"
                                     name="sku"
                                     tabindex="1" placeholder="Enter Full sku" value="{{ old('sku') }}"
                                     autofocus required>
                              <div class="invalid-feedback">
                                  {{ $errors->first('sku') }}
                              </div>

                        </div>  --}}
                        <div class="form-group col-md-4">

                              <label for="serial" >Serial:</label><span
                                      class="text-danger" >*</span>
                              <input  id="serial" type="text"
                                     class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}"
                                     name="serial"
                                     tabindex="1" placeholder="Nro. Serial" value="{{ $rma->serial }}"
                                     autofocus required
                                     data-toggle="tooltip" data-html="true" title=' <img   src="img/men.jpg" >'
                                     >


                              <div class="invalid-feedback">
                                  {{ $errors->first('serial') }}
                              </div>

                        </div>
                        <div class="form-group col-md-4">

                              <label for="serial">Numero de Lote:</label><span
                                      class="text-danger">*</span>
                              <input id="num_lote" type="text"
                                     class="form-control{{ $errors->has('num_lote') ? ' is-invalid' : '' }}"
                                     name="num_lote"
                                     tabindex="1" placeholder=" Nro. Lote" value="{{  $rma->num_lote }}"
                                     autofocus required
                                     data-toggle="tooltip" data-html="true" title=' <img   src="img/men2.jpg" >'
                                     >
                              <div class="invalid-feedback">
                                  {{ $errors->first('num_lote') }}
                              </div>

                        </div>
                        <div class="form-group col-md-4">

                              <label for="fecha_de_compra">fecha_de_compra:</label><span
                                      class="text-danger">*</span>
                              <input id="fecha_de_compra" type="date"
                                     class="form-control{{ $errors->has('fecha_de_compra') ? ' is-invalid' : '' }}"
                                     name="fecha_de_compra"
                                     tabindex="1" placeholder="Fecha de compra" value="{{ $rma->fecha }}"
                                     autofocus required>
                              <div class="invalid-feedback">
                                  {{ $errors->first('fecha_de_compra') }}
                              </div>

                        </div>

                        <div class="form-group col-md-10">

                              <label for="descripcion">Description del Problema:</label><span
                                      class="text-danger">*</span>
                              <textarea id="descripcion" type="text"
                                     class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                     name="descripcion"
                                     tabindex="1"  value="{{ old('descripcion') }}"
                                     autofocus  data-height="100" style="height: 80px;">
                                    {{ $rma->descripcion }}
                                    </textarea>
                              <div class="invalid-feedback">
                                  {{ $errors->first('descripcion') }}
                              </div>

                        </div>
                        <div class="form-group col-md-2">

                              <label for="descripcion">Estado:</label><span class="text-danger">*</span>
                                      <select name="pais" class="form-control">
                                        @foreach ($estados as $key =>  $estado )

                                        <option value="{{ $key }}"  {{(old('title', $key) == '' ? 'selected' : '')}}>{{ $estado }}</option>
                                        @endforeach
                                    </select>


                        </div>
                        <div class="col-sm-12 col-md-6">

                            <div class="form-group">
                                <label class="active">Photos del Problema</label>
                                {{-- <input type="file" name="photo_problema"  class="form-control-file"/> --}}
                                <input type="file" class="form-control-file" name="photoproblema"/>

                                <!-- ////////////imageloader////////////// -->
                                <!-- <div class="input-images-2" style="padding-top: .5rem;"></div> -->
                                {{-- <div class="input-field">
                                    <label class="active">Photos</label>
                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                </div> --}}
                                <!-- ////////////////////////// -->
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6">

                            <div class="form-group">
                                <label class="active">Photos de la Nota de Compra</label>
                                <input type="file" name="photonotacompra" class="form-control-file" />

                                <!-- ////////////imageloader////////////// -->
                                <!-- <div class="input-images-2" style="padding-top: .5rem;"></div> -->
                                {{-- <div class="input-field">
                                    <label class="active">Photos</label>
                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                </div> --}}
                                <!-- ////////////////////////// -->
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

            @else
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h4>RMA</h4>
                    </div>
                    <div class="card-body">
                      <form method="POST" name="form-example-1" id="form-example-1" action="{{ route('rma.store') }}" enctype="multipart/form-data">
                          @csrf

                      <div class="form-row">
                        <div class="form-group col-md-6">

                              <label for="sku">Productos:</label><span
                                      class="text-danger">*</span>

                                      <select class=" form-control selectpicker prodclass" name="producto_id" data-live-search="true">
                                        @foreach ($prod as $pro )

                                        <option data-tokens="ketchup mustard" value="{{ $pro->id }}" >

                                            {{ $pro->sku }}
                                             - {{Str::limit(  $pro->name , 45, $end='...')}}

                                        </option>
                                        @endforeach

                                      </select>
                        </div>
                        <div class="form-group col-md-3">
                              <label for="sku">Comprado de :</label><span
                                      class="text-danger">*</span>

                                      <select class=" form-control selectpicker" id="comprado_de" name="empresa_id" data-live-search="true">
                                        @foreach ($emp as $pro )
                                        <option data-tokens="ketchup mustard" value="{{ $pro->id }}">

                                             {{Str::limit(  $pro->nombre_empresa , 45, $end='...')}}
                                        </option>
                                        @endforeach

                                      </select>
                        </div>
                        <div class="form-group col-md-3">
                              <label for="sku">Dirección de envio :</label><span
                                      class="text-danger">*</span>

                                      <select id="address">

                                        {{-- <option  data-tokens="ketchup mustard" value="">
                                        </option> --}}

                                      </select>
                        </div>

                        {{--  <div class="form-group col-md-6">

                              <label for="sku">sku:</label><span
                                      class="text-danger">*</span>
                              <input id="sku" type="text"
                                     class="form-control{{ $errors->has('sku') ? ' is-invalid' : '' }}"
                                     name="sku"
                                     tabindex="1" placeholder="Enter Full sku" value="{{ old('sku') }}"
                                     autofocus required>
                              <div class="invalid-feedback">
                                  {{ $errors->first('sku') }}
                              </div>

                        </div>  --}}
                        <div class="form-group col-md-4">

                              <label for="serial" >Serial:</label><span
                                      class="text-danger" >*</span>
                              <input  id="serial" type="text"
                                     class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}"
                                     name="serial"
                                     tabindex="1" placeholder="Nro. Serial" value="{{ old('serial') }}"
                                     autofocus required
                                     data-toggle="tooltip" data-html="true" title=' <img   src="img/men.jpg" >'
                                     >


                              <div class="invalid-feedback">
                                  {{ $errors->first('serial') }}
                              </div>

                        </div>
                        <div class="form-group col-md-4">

                              <label for="serial">Numero de Lote:</label><span
                                      class="text-danger">*</span>
                              <input id="num_lote" type="text"
                                     class="form-control{{ $errors->has('num_lote') ? ' is-invalid' : '' }}"
                                     name="num_lote"
                                     tabindex="1" placeholder=" Nro. Lote" value="{{ old('num_lote') }}"
                                     autofocus required
                                     data-toggle="tooltip" data-html="true" title=' <img   src="img/men2.jpg" >'
                                     >
                              <div class="invalid-feedback">
                                  {{ $errors->first('num_lote') }}
                              </div>

                        </div>
                        <div class="form-group col-md-4">

                              <label for="fecha_de_compra">fecha_de_compra:</label><span
                                      class="text-danger">*</span>
                              <input id="fecha_de_compra" type="date"
                                     class="form-control{{ $errors->has('fecha_de_compra') ? ' is-invalid' : '' }}"
                                     name="fecha_de_compra"
                                     tabindex="1" placeholder="Fecha de compra" value="<?php echo date('Y-m-d'); ?>"
                                     autofocus required>
                              <div class="invalid-feedback">
                                  {{ $errors->first('fecha_de_compra') }}
                              </div>

                        </div>

                        <div class="form-group col-md-10">

                              <label for="descripcion">Description del Problema:</label><span
                                      class="text-danger">*</span>
                              <textarea id="descripcion" type="text"
                                     class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                     name="descripcion"
                                     tabindex="1"  value="{{ old('descripcion') }}"
                                     autofocus  data-height="100" style="height: 80px;"></textarea>
                              <div class="invalid-feedback">
                                  {{ $errors->first('descripcion') }}
                              </div>

                        </div>
                        <div class="form-group col-md-2">

                              <label for="descripcion">Estado:</label><span class="text-danger">*</span>
                                      <select name="pais" class="form-control">
                                        @foreach ($estados as $key =>  $estado )

                                        <option value="{{ $key }}"  {{(old('title', $key) == '' ? 'selected' : '')}}>{{ $estado }}</option>
                                        @endforeach
                                    </select>


                        </div>
                        <div class="col-sm-12 col-md-6">

                            <div class="form-group">
                                <label class="active">Photos del Problema</label>
                                {{-- <input type="file" name="photo_problema"  class="form-control-file"/> --}}
                                <input type="file" class="form-control-file" name="photoproblema"/>

                                <!-- ////////////imageloader////////////// -->
                                <!-- <div class="input-images-2" style="padding-top: .5rem;"></div> -->
                                {{-- <div class="input-field">
                                    <label class="active">Photos</label>
                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                </div> --}}
                                <!-- ////////////////////////// -->
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6">

                            <div class="form-group">
                                <label class="active">Photos de la Nota de Compra</label>
                                <input type="file" name="photonotacompra" class="form-control-file" />

                                <!-- ////////////imageloader////////////// -->
                                <!-- <div class="input-images-2" style="padding-top: .5rem;"></div> -->
                                {{-- <div class="input-field">
                                    <label class="active">Photos</label>
                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                </div> --}}
                                <!-- ////////////////////////// -->
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

            @endisset



            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Registro de RMA </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tbody><tr>
                            <th >#</th>
                            <th >#Serie Nr.</th>
                            <th >#Num. Lote</th>
                            <th >#Puchase Date</th>
                            <th >#Puchased From</th>

                            <th >#Responsable</th>
                            <th >#stado</th>
                            <th >#</th>
                            <th >#</th>
                        </tr>
                        @foreach ($rmas as $rma)
                        <tr>
                            <th scope="row">{{ $rma->id }}</th>
                            <td>{{ $rma->serial }}</td>
                            <td>{{ $rma->num_lote }}</td>
                            <td>
                                {{ Carbon\Carbon::parse($rma->fecha)->format('d/m/Y') }}
                            </td>
                            <td>{{ $rma->empresa->nombre_empresa  }}</td>

                            <td>{{ $rma->user->name }}</td>
                            <td>

                                <div class="badge badge-{{ $rma->estado == 'verificado' ? 'success' : 'danger' }}"> <i class="fas {{ $rma->estado == 'verificado' ? 'fa-check' : 'fa-times' }} "></i> </div>
                            </td>
                            <td>

                                {{ Carbon\Carbon::parse($rma->created_at)->format('d/m/Y H:i:s ') }}

                            </td>


                            <td class="buttons d-flex " >
                                <button type="button" onclick="selectPhoto({{$rma->id}})" class="btn btn-icon btn-sm btn-light " data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-camera"></i>
                                </button>
                                <button type="button" onclick="photoNotaCompra({{$rma->id}})" class="btn btn-icon btn-sm btn-info " data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-camera"></i>
                                </button>
                                <a href="/rmapdf/{{$rma->id}}" class="btn btn-icon btn-sm btn-primary " target="_blank"><i class="fas fa-print"></i></a>
                                <div style="display: flex;">

                                    <a href="/rma?id={{ $rma->id }}" class="btn btn-icon btn-sm  btn-warning"><i class="fas fa-cog"></i></a>

                                    <form action="/rma/{{  $rma->id }}" method="POST" style="display: inline">

                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash "></i></button>
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
                                {{ $rmas->links('pagination::bootstrap-4') }}

                            </div>
                        </div>

                  </div>
                </div>
            </div>


        </div>


    </section>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Photos del Problema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="photoProblema">
        <img src="#" class="img-thumbnail" alt="...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



    <style>
        .tooltip-inner {
            max-width: none;
            white-space: nowrap;
            background:white;
            border:1px solid lightgray;
          -webkit-box-shadow: 0px 3px 3px 0px rgba(0,0,0,0.3);
          -moz-box-shadow: 0px 3px 3px 0px rgba(0,0,0,0.3);
          box-shadow: 0px 3px 3px 0px rgba(0,0,0,0.3);
          color:gray;
          margin:0;
          padding:0;
        }

        .tooltip.bottom .tooltip-arrow {
          top: 50;
          left: 50%;
          margin-left: -10px;
          border-bottom-color: red; /* black */
          border-width: 0 5px 5px;
        }


    </style>
@endsection

@section('scripts')
  {{--  <script src="/js/productoCategoria.js"></script>  --}}

  <script>





    $(document).ready(function(){

        $('.input-images-1').imageUploader();
        $('[rel="tooltip"]').tooltip();
        selectDir();

      // calendar




    });
    $("#comprado_de").change(function(){
        selectDir();
    });
    function selectDir(){
        var id = $('#comprado_de').val()
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
         $.ajax({
            type:'GET',
            url:'/rma/selectDir/'+id,
            success:function(data) {
               var address = data;
                 $('#address').replaceWith(`
                 <select id="address"  name="direccion_id" class=" form-control">
                 </select>
                   `);
                   address.forEach((data) => {
                    $('#address').append(`
                         <option   value="`+data.id+`">
                         `+data.nombre_lugar+`
                         </option>
                       `);
                   });
            },
            error: function (jqXHR, textStatus, errorThrown) {
              alert('error');
            }
         });
    }
    function selectPhoto(id){
       // var id = $('#photos_problema').val()
       //console.log('funka:'+id)
       $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
         $.ajax({
            type:'GET',
            url:'/rma/selectPhoto/'+id,
            success:function(data) {
               var photoProblema = data;
               //console.log(photoProblema);
                 $('#photoProblema').replaceWith(`
                 <div class="modal-body" id="photoProblema">
                    <img src="`+photoProblema.url+`" class="img-thumbnail" alt="...">
                  </div>
                   `);

            },
            error: function (jqXHR, textStatus, errorThrown) {
              alert('error');
            }
         });
    }
    function photoNotaCompra(id){
       // var id = $('#photos_problema').val()
       console.log('funka:'+id)
       $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
         $.ajax({
            type:'GET',
            url:'/rma/photoNotaCompra/'+id,
            success:function(data) {
                var photoProblema = data;
               console.log(photoProblema);
                 $('#photoProblema').replaceWith(`
                 <div class="modal-body" id="photoProblema">
                    <img src="`+photoProblema.url+`" class="img-thumbnail" alt="...">
                  </div>
                   `);



            },
            error: function (jqXHR, textStatus, errorThrown) {
              //alert('error');
              $('#photoProblema').replaceWith(`
              <div class="modal-body" id="photoProblema">
                 <img src="/img/not_page.jpeg" class="img-thumbnail" alt="...">
               </div>
                `);
            }
         });




    }
  </script>


@stop

