@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
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
            <section class="section">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div  class="card" id="chart"></div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="card box">
                          <div id="bar"></div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-6">
                        <div class="card box">
                          <div id="donut"></div>
                        </div>
                      </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                              <h4>Ultimos Productos</h4>
                            </div>
                            <div class="card-body p-0">
                              <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                  <tbody><tr>
                                    <th>#</th>
                                    <th>#SKU</th>
                                    <th>Nombre</th>
                                    <th>Empresa</th>
                                    <th>#</th>
                                  </tr>
                                  @foreach ( $prods as $prod )

                                  <tr>
                                    <td><a href="#">{{ $prod->sku }}</a></td>
                                    <td class="font-weight-600">{{ $prod->user->name }}</td>
                                    <td><div class="badge badge-warning">{{ $prod->estado }}</div></td>
                                    <td>
                                        {{ Carbon\Carbon::parse($prod->created_at)->format('d/m/Y H:i:s ') }}
                                    </td>
                                    <td>
                                      <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                  </tr>
                                  @endforeach

                                </tbody></table>
                              </div>
                            </div>
                          </div>

                    </div>

                  </div>

              </section>
        </div>
    </section>
    {{--  @foreach ($prods as $prod )
        {{ $prod }}
    @endforeach  --}}




@endsection

@section('scripts')
{{--  <script src="/js/productoCategoria.js"></script>  --}}

    <script>

    window.Promise ||
    document.write(
    '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
    )
    window.Promise ||
    document.write(
    '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
    )
    window.Promise ||
    document.write(
    '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
    )
    </script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


    <script>
      // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests
      // Based on https://gist.github.com/blixt/f17b47c62508be59987b
      var _seed = 42;
      Math.random = function() {
        _seed = _seed * 16807 % 2147483647;
        return (_seed - 1) / 2147483646;
      };
    </script>



    <script>

        var options = {
          series: [{
          name: 'Net Profit',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Revenue',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Free Cash Flow',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();


    </script>

    <script src="/assets/data.js"></script>
    <script src="/assets/scripts.js"></script>


@stop



