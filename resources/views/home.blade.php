{{--@dd($filters)--}}
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

            {{-- Filters --}}
            <div class="col-8">
              <div class="flex flex-wrap justify-between items-center space-y-4 sm:space-y-0">
                <!-- Dropdown -->
                <div class="w-full sm:w-auto">
                  <label for="filter" class="block text-sm font-medium text-gray-700">Filter</label>
                  <select id="filter" name="filter" class="mt-1 block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md form-control">
                    <option id="180">{{ \App\Models\Documents::findOrFail(180)->NamaFile }}</option>
                    <option id="204">{{ \App\Models\Documents::findOrFail(204)->NamaFile }}</option>
                  </select>
                </div>

                <!-- Tanggal Dari -->
                <div class="w-full sm:w-auto">
                  <label for="from" class="block text-sm font-medium text-gray-700">Tanggal Dari</label>
                  <input type="date" id="from" name="from" class="mt-1 block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>

                <!-- Tanggal Sampai -->
                <div class="w-full sm:w-auto">
                  <label for="to" class="block text-sm font-medium text-gray-700">Tanggal Sampai</label>
                  <input type="date" id="to" name="to" class="mt-1 block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>

                <!-- Tombol Filter -->
                <div class="w-full sm:w-auto">
                  <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="getData()">Filter</button>
                </div>
              </div>

            </div>

            <div class="col-8">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Nama File</h5>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <!-- Filter inputs -->
                      <div class="input-group">
                        <select class="form-select" id="filterInput">
                          <form action="" method="get">
                            <option selected disabled>Pilih Nama File...</option>
                            <option value="{{ \App\Models\Documents::findOrFail(180) }}">
                              {{ \App\Models\Documents::findOrFail(180) }}
                            </option>
                            <option value="{{ \App\Models\Documents::findOrFail(204) }}">
                              {{ \App\Models\Documents::findOrFail(204) }}
                            </option>
                            <!-- Add more options if needed -->
                          </form>
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
                        <th scope="row"><a href="/nasabah/{{ $klien->NasabahId }}">{{ $klien->NasabahId }}</a></th>
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
                {{-- <x-filter _/> --}}
              </div>
            </div><!-- End Table -->

            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Bar CHart</h5>

                  <!-- Bar Chart -->
                  <canvas id="barChart" style="max-height: 400px;"></canvas>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new Chart(document.querySelector('#barChart'), {
                        type: 'bar',
                        data: {
                          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                          datasets: [{
                            label: 'Bar Chart',
                            data: [65, 59, 80, 81, 56, 55, 40],
                            backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 159, 64, 0.2)',
                              'rgba(255, 205, 86, 0.2)',
                            ],
                            borderColor: [
                              'rgb(255, 99, 132)',
                              'rgb(255, 159, 64)',
                              'rgb(255, 205, 86)',
                            ],
                            borderWidth: 1
                          }]
                        },
                        options: {
                          scales: {
                            y: {
                              beginAtZero: true
                            }
                          }
                        }
                      });
                    });
                  </script>
                  <script>
                    function getData() {
                      var filter = document.getElementById('filter')
                      var dateFrom = document.getElementById('from')
                      var dateTo = document.getElementById('to')

                      $.ajax({
                        url: '/',
                        method: 'GET',
                        dataType: 'json',
                        data: {
                          'country': $('#country').val(),
                          'from': $('#from').val(),
                          'to': $('#to').val()
                        },
                        success: function ($data) {
                          const data = $data.nasabah
                        },
                        error: function ($data) {
                        }
                      })
                    }
                  </script>
                  <!-- End Bar CHart -->

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Status Eksekusi TIF -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Status Eksekusi <span>| TIF</span></h5>
              <div id="trafficChart1" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  const data = JSON.parse(`<?php echo $status ?>`)
                  echarts.init(document.querySelector("#trafficChart1")).setOption({
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

          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Polar Area Chart</h5>

                <!-- Polar Area Chart -->
                <canvas id="polarAreaChart" style="max-height: 400px;"></canvas>
                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    const data = JSON.parse(`<?php echo $statusPembiayaan ?>`)
                    new Chart(document.querySelector('#polarAreaChart'), {
                      type: 'polarArea',
                      data: {
                        labels: [
                          data.label[0],
                          data.label[1],
                          data.label[2],
                        ],
                        datasets: [{
                          label: [],
                          data: [
                            data.data[0],
                            data.data[1],
                            data.data[2],
                          ],
                          backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)'
                          ]
                        }]
                      }
                    });
                  });
                </script>
                <!-- End Polar Area Chart -->

              </div>
            </div>
          </div>

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
@endsection
