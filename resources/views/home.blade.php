@extends('layouts.main')
@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Total Nasabah -->
            <div class="col-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total Nasabah</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $sumNasabah }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- Total Nasabah -->

            <div class="col-8">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Nama File</h5>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <!-- Filter inputs -->
                      <div class="input-group">
                        <select class="form-select" id="filterInput">
                          <form action="#" method="get"></form>
                          <option selected disabled>Pilih Nama File...</option>
                          @foreach($nasabah as $klien)
                            <option value="{{ $klien->NamaFile }}">
                              {{ $klien->NamaFile }}
                            </option>
                          @endforeach
                          <!-- Add more options if needed -->
                        </select>
                        <button class="btn btn-primary" onclick="filterData()">Cari</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- Filter Data -->


            <!-- Tabel Nasabah -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="responsive">
                  <div class="card-body">
                    <h5 class="card-title">Tabel Nasabah</h5>
                  </div>

                  <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>ID Nasabah</th>
                      <th>Status Eksekusi TIF</th>
                      <th>Status Penyesuaian</th>
                      <th>Starting Date GP</th>
                      <th>End Gate GP</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nasabah as $klien)
                      <tr>
                        <th class="bold">{{ $klien->id }}</th>
                        <th scope="row"><a class="hover:text-blue-500" href="/nasabah/{{ $klien->NasabahId }}">{{ $klien->NasabahId }}</a></th>
                        <td class="text-center">
                          @if($klien->StatusEksekusiTIF == "Sesuai")
                            <span class="badge bg-success">{{ $klien->StatusEksekusiTIF }}</span>
                          @elseif($klien->StatusEksekusiTIF == "Modifikasi")
                            <span class="badge bg-warning">{{ $klien->StatusEksekusiTIF }}</span>
                          @endif
                        </td>
                        <td class="text-center">
                          @if($klien->Status == "Masih Ada Jadwal")
                            <span class="badge bg-primary">{{ $klien->Status }}</span>
                          @elseif($klien->Status == "Pembiayaan Lunas")
                            <span class="badge bg-success">{{ $klien->Status }}</span>
                          @elseif($klien->Status == "Tidak Ada Jadwal")
                            <span class="badge bg-secondary">{{ $klien->Status }}</span>
                          @endif
                        </td>
                        <td><a>{{ $klien->StartingDateGP }}</a></td>
                        <td><a>{{ $klien->EndDateGP }}</a></td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                {{--                <x-filter _/>--}}
              </div>
            </div>
          </div><!-- End Table -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Status Eksekusi TIF -->
        <div class="card">

          <div class="card-body pb-0">
            <h5 class="card-title">Status Eksekusi <span>| TIF</span></h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                const data = JSON.parse(`<?php echo $status ?>`)
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                      value: data.data[0],
                      name: data.label[0]
                    },
                      {
                        value: data.data[1],
                        name: data.label[1]
                      },
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- Status Eksekusi TIF -->

        <!-- Status Penyesuaian -->
        <div class="card">

          <div class="card-body pb-0">
            <h5 class="card-title">Status Penyesuaian</h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                const data = JSON.parse(`<?php echo $status ?>`)
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                      value: data.data[0],
                      name: data.label[0]
                    },
                      {
                        value: data.data[1],
                        name: data.label[1]
                      },
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- Status Penyesuaian -->

      </div><!-- End Right side columns -->
    </section>
  </main><!-- End #main -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
