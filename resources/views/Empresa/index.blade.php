@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Empresas</h3>
            <div class="section-header-breadcrumb">
                <a href="empresa/create" class="btn btn-icon btn-success"><i class="far fa-user"></i></a>


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
                  <div class="section-title mt-0">Empresas</div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>

                        <th scope="col">Nombre</th>
                        <th scope="col">estados</th>
                        <th scope="col">#</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($emps as $emp)
                        <tr>
                            <th scope="row">{{ $emp->id }}</th>

                            <td>{{ $emp->nombre_empresa }}</td>

                            <td>
                                <div class="badge badge-{{ $emp->status == 'Active' ? 'success' : 'danger' }}">{{ $emp->status }}</div>

                            </td>
                            <td>
                                <a href="/empresa/{{ $emp->id }}/edit" class="btn btn-icon btn-warning"><i class="fas fa-cog"></i></a>
                                <form action="/empresa/{{  $emp->id }}" method="POST" style="display: inline">

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
                        {{ $emps->links('pagination::bootstrap-4') }}

                    </div>
                </div>
              </div>

        </div>
    </section>
@endsection
