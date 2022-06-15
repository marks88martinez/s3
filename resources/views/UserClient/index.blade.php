@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuario Cliente</h3>
            <div class="section-header-breadcrumb">
                <a href="userClient/create" class="btn btn-icon btn-success"><i class="far fa-user"></i></a>


              </div>
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
            {{--  /////////  --}}
            <div class="card">
                {{-- <div class="card-header">
                  <h4>User</h4>
                </div> --}}
                <div class="card-body">
                  <div class="section-title mt-0">Usuario</div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">#</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($userEmps as $userEmp)
                        <tr>
                            <th scope="row">{{ $userEmp->id }}</th>
                            <td>{{ $userEmp->name }}</td>
                            <td>{{ $userEmp->email }}</td>
                            <td>
                                <a href="/userClient/{{ $userEmp->id }}/edit" class="btn btn-icon btn-warning"><i class="fas fa-cog"></i></a>
                                <a href="/userClient/{{ $userEmp->id }}/edit" class="btn btn-icon btn-dark"><i class="fas fa-lock"></i></a>
                                <form action="/userClient/{{  $userEmp->id }}" method="POST" style="display: inline">

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
              </div>

        </div>
    </section>
@endsection
