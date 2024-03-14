@extends('layouts.main')
@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
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
                                    <option selected disabled>Pilih Nama File...</option>
                                    <option value="M.96.PNM.LBS.II.23M.035.PNM.PBI.5.I.23.xls">M.96.PNM.LBS.II.23M.035.PNM.PBI.5.I.23.xls</option>
                                    <option value="NM.150.PNM.LBS.II.23--M.029.PNM.PBI4.II.23.xlsx">NM.150.PNM.LBS.II.23--M.029.PNM.PBI4.II.23.xlsx</option>
                                    <option value="M.0466.PNM.OBS.V.22 -- M.006.PB2.V.22 -- M.008.PB2.V.22.xlsx">M.0466.PNM.OBS.V.22 -- M.006.PB2.V.22 -- M.008.PB2.V.22.xlsx</option>
                                    <option value="M.0673.PNM.LBS.VII.22 -- M.059.PNM.PBI1.VII.22.xlsx">M.0673.PNM.LBS.VII.22 -- M.059.PNM.PBI1.VII.22.xlsx</option>
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

              <div class="card-body">
                <h5 class="card-title">Tabel Nasabah</h5>

                <table class="table table-bordered datatable">
                <thead>
                <tr>
                  <th>ID Nasabah</th>
                  <th>ID Loan</th>
                  <th>Siklus</th>
                  <th>Tanggal Pencairan</th>
                  <th>Nama File</th>
                  <th>Tanggal Mulai GP</th>
                  <th>Tanggal Berakhir GP</th>
                  <th>Status Eksekusi TIF</th>
                  <th>Tanggal Eksekusi</th>
                  <th>Tanggal Mulai GP Penyesuaian</th>
                  <th>Tanggal Berakhir Penyesuaian</th>
                  <th>Status Penyesuaian</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><a href="#">#2147</a></th>
                    <td>Bridie Kessler</td>
                    <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                    <td>$47</td>
                    <td>Status Eksekusi TIF</td>
                    <td>Tanggal Mulai GP</td>
                    <td>Tanggal Berakhir GP</td>
                    <td><span class="badge bg-primary">Sesuai</span></td>
                    <td>Tanggal Eksekusi</td>
                    <td>Tanggal Mulai GP Penyesuaian</td>
                    <td>Tanggal Berakhir Penyesuaian</td>
                    <td><span class="badge bg-primary">Tidak Ada Jadwal</span></td>
                  </tr>
                </tbody>
                </table>
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

    </div>
  </section>

</main><!-- End #main -->
@endsection
