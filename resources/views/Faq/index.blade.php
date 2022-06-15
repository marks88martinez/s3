@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Faq</h3>
            <div class="section-header-breadcrumb">
                <a href="faq/create" class="btn btn-icon btn-success"><i class="far fa-user"></i></a>


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

        <div>
            <div class="card">
                {{-- <div class="card-header">
                  <h4>User</h4>
                </div> --}}
                <div class="card-body">
                  <div class="section-title mt-0">Faq</div>

                  {{--  /////////////////////////////  --}}

                    <div class="form-group">
                        <form action="/faq" method="GET" class="">
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
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>

                        <th scope="col">name</th>

                        <th scope="col">#</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $prod)
                        <tr>
                            <th scope="row">{{ $prod->id }}</th>


                            <td>{{ $prod->name }}</td>


                            <td>
                                <a href="/faq/{{ $prod->id }}/edit" class="btn btn-icon btn-warning"><i class="fas fa-cog"></i></a>
                                <a href="/faq/{{ $prod->id }}" class="btn btn-icon btn-info"><i class="far fa-file-alt"></i></a>
                                <form action="/faq/{{  $prod->id }}" method="POST" style="display: inline">

                                    @csrf
                                    @method('DELETE')


                                  <button class="btn btn-icon btn-danger"><i class="fas fa-trash "></i></button>
                              </form>
                            </td>

                          </tr>

                        @endforeach


                    </tbody>
                  </table>

                </div>

                <div class="card-footer clearfix">
                    <div class="pagination pagination-sm m-0 float-right">
                        {{ $faqs->links('pagination::bootstrap-4') }}

                    </div>
                </div>
              </div>

        </div>
    </section>
@endsection
