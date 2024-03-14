{{--@dd($nasabah)--}}
@extends('layouts.main')
@section('content')
  <main id="main" class="main">

    <div class="pagetitle pb-4">
      <h1>General Tables</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table with hoverable rows</h5>

              <!-- Table with hoverable rows -->
              <div class="responsive">
                <table class="table table-hover display" id="hoverTable">
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
              <!-- End Table with hoverable rows -->

            </div>
          </div>

      <div class="card">
        <div class="card-body">
            <h5 class="card-title">Small tables</h5>
            <!-- Small tables -->
            <div class="responsive">
                <table class="table table-sm display" id="smTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama File</th>
                            <th>Tanggal Terima</th>
                            <th>Divisi Asal</th>
                            <th>No.Memo Asal</th>
                            <th>Perihal Memo Asal</th>
                            <th>Tanggal Kirim</th>
                            <th>No.Memo OBS</th>
                            <th>Perihal Memo OBS</th>
                            <th>No.Tiket</th>
                            <th>Status Tiket</th>
                            <th>Jenis GP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#">#2147</a></td>
                            <td>Bridie Kessler</td>
                            <td>ja</td>
                            <td>$47</td>
                            <td>Status Eksekusi TIF</td>
                            <td>Tanggal Mulai GP</td>
                            <td>Tanggal Berakhir GP</td>
                            <td><span class="badge bg-primary">Sesuai</span></td>
                            <td>Tanggal Eksekusi</td>
                            <td>Tanggal Mulai GP Penyesuaian</td>
                            <td><span class="badge bg-primary">Tidak Ada Jadwal</span></td>
                            <td>Tanggal Berakhir Penyesuaian</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End small tables -->
        </div>
    </div>


        </div>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </main><!-- End #main -->

  <script>
    $(document).ready( function () {
      $('#hoverTable').DataTable();
      $('#smTable').DataTable();
    });
  </script>
  {{--Datatables JQuery--}}
  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>

@endsection
