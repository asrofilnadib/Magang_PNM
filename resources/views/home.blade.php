{{--@dd(\App\Models\Nasabah::min('startingDateGP'))--}}
@extends('layouts.main')
@section('content')
  @include('sweetalert::alert')
  <main id="main" class="main">

    <div class="pagetitle mb-4">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Filter Card -->
            <div class="col-xxl-8 col-xl-10">

              <div class="card info-card customers-card">

                {{-- Form for Filtering --}}
                <div class="card-body">
                  <form method="GET" action="{{ route('nasabah.index') }}">
{{--                    @csrf--}}
                    <div class="row">
                      <div class="col-6 px-4 py-0">
                        <h4 class="card-title-form">Tanggal Dari</h4>
                        <input type="date" id="from" class="form-control" name="from"
                               @if(request('nama_file'))
                                 value="{{ old('from', request()->input('from')) }}" @else
                                 value="{{ old('from')  }}"
                          @endif>
                      </div>
                      <div class="col-6 px-4 py-0">
                        <h4 class="card-title-form">Tanggal Sampai</h4>
                        <input type="date" id="to" class="form-control" name="to"
                               @if(request('nama_file'))
                                 value="{{ old('to', request()->input('to')) }}" @else
                                 value="{{ old('to') }}"
                          @endif>
                      </div>
                    </div>

                    <div class="row px-3 py-2">
                      <h4 class="card-title-form">Nama File</h4>
                      <div class="col">
                        <select class="form-select" aria-label="Nama File" name="nama_file"
                                required>
                          <option value="semua_file" selected>Semua File</option>
                          @foreach($namaFiles as $namaFile)
                            <option value="{{ $namaFile->namaFile_id }}">{{ $namaFile->document->NamaFile }}</option>
                          @endforeach{{--
                          <option
                            value="{{ $doc180->id }}"> {{ $doc180->NamaFile }}</option>
                          <option value="{{ $doc204->id }}"> {{ $doc204->NamaFile }}</option>--}}
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                        <button type="submit" name="search"
                                class="btn btn-dark d-md-flex justify-content-md-end"><i
                            class="bi bi-search me-1"></i> Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

            </div><!-- End Filter Card -->

            <!-- NOA Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total Nasabah <br>
                  </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        {{ $sumNasabah }}
                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End NOA Card -->

            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Status TIF X Status Pembiayaan</h5>

                  <!-- Vertical Bar Chart -->
                  <div id="verticalBarChart" style="min-height: 300px;" class="echart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      const label = JSON.parse(`<?php echo $statusTIFPembiayaan ?>`)
                      const data = JSON.parse(`<?php echo $statusPembiayaan ?>`)
                      // console.log(label)
                      // console.log(data)
                      //
                      // console.log(data.label[0])

                      echarts.init(document.querySelector("#verticalBarChart")).setOption({
                        tooltip: {
                          trigger: 'axis',
                          axisPointer: {
                            type: 'shadow'
                          }
                        },
                        color: ['#40A2E3', '#2FDD92'],
                        legend: {
                          data: ['Sesuai', 'Modifikasi']
                        },
                        grid: {
                          left: '3%',
                          right: '4%',
                          bottom: '3%',
                          containLabel: true
                        },
                        xAxis: [
                          {
                            type: 'value'
                          }
                        ],
                        yAxis: [
                          {
                            type: 'category',
                            axisTick: {
                              show: false
                            },
                            data: [
                              data.label[0],
                              data.label[1],
                              data.label[2],
                            ]
                          }
                        ],
                        series: [
                          {
                            name: 'Sesuai',
                            type: 'bar',
                            label: {
                              show: true,
                              position: 'inside'
                            },
                            emphasis: {
                              focus: 'series'
                            },
                            data: [
                              label[0].Tidak.sesuai,
                              label[0].Masih.sesuai,
                              label[0].Pembiayaan.sesuai
                            ]
                          },
                          {
                            name: 'Modifikasi',
                            type: 'bar',
                            stack: 'Total',
                            label: {
                              show: true
                            },
                            emphasis: {
                              focus: 'series'
                            },
                            data: [
                              label[0].Tidak.modifikasi,
                              label[0].Masih.modifikasi,
                              label[0].Pembiayaan.modifikasi,
                            ]
                          },
                        ]
                      });
                    });
                  </script>
                  <!-- End Vertical Bar Chart -->

                </div>
              </div>
            </div>
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Status Ekskusi TIF -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Status Ekskusi TIF <br>
                <span>
                  @if(request('nama_file') && $nasabah->isNotEmpty() && $nasabah->first()->StartingDateGP >= request('from') )
                    {{ $nasabah->first()->document->NamaFile }}
                  @endif
                </span>
              </h5>

              <!-- Doughnut Chart -->
              <!-- Pie Chart -->
              <div id="statusTIF"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  const data = JSON.parse(`<?php echo $statusTIF ?>`)
                  new ApexCharts(document.querySelector("#statusTIF"), {
                    series: [
                      data.data[0],
                      data.data[1]
                    ],
                    chart: {
                      width: 320,
                      type: 'pie',
                      toolbar: {
                        show: true
                      }
                    },
                    legend: {
                      show: true,
                      position: 'top',
                    },
                    colors: ['#FF204E', '#008DDA'],
                    responsive: [{
                      breakpoint: 500,
                      options: {
                        chart: {
                          width: 210
                        },
                        legend: {
                          position: 'bottom'
                        }
                      }
                    }],
                    labels: [
                      data.label[0],
                      data.label[1],
                    ]
                  }).render();
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div><!-- End Status Ekskusi TIF -->

          <!-- Status Penyesuaian -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Status Pembiayaan <br>
                <span>
                  @if(request('nama_file') && $nasabah->isNotEmpty() && $nasabah->first()->StartingDateGP >= request('from') )
                    {{ $nasabah->first()->document->NamaFile }}
                  @endif
                </span>
              </h5>

              <!-- Donut Chart -->
              <div id="statusPembiayaan" class="my-4"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  const data = JSON.parse(`<?php echo $statusPembiayaan ?>`)
                  new ApexCharts(document.querySelector("#statusPembiayaan"), {
                    series: [
                      data.data[0],
                      data.data[1],
                      data.data[2]
                    ],
                    chart: {
                      width: 320,
                      type: 'donut',
                      toolbar: {
                        show: true
                      }
                    },
                    colors: ['#FF3F00', '#32E0C4', '#0D7377'],
                    legend: {
                      show: true,
                      position: 'top',

                    },
                    responsive: [{
                      breakpoint: 500,
                      options: {
                        chart: {
                          width: 210
                        },
                      }
                    }],
                    labels: [
                      data.label[0],
                      data.label[1],
                      data.label[2],
                    ]
                  }).render();
                });
              </script>
              <!-- End Donut Chart -->

            </div>
          </div><!-- End Status Penyesuaian -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- DATATABLES -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#dtable').DataTable({
        rowReorder: true,
        pages: 5
      });
    });
  </script>
@endsection
