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
                      <h4>{{ $faq->name }}</h4>
                    </div>
                    <div class="card-body">
                      <p>
                          {!! $faq->description !!}
                      </p>
                    </div>

                  </div>


            </div>
            {{-- ///////////////////// --}}




        </div>

    </section>
@endsection
