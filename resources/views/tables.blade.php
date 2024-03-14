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
              <h5 class="card-title">Table Data Nasabah</h5>

              <!-- Table with hoverable rows -->
              <div class="responsive">
                <table class="table table-hover display" id="hoverTable">
                <thead>
                <tr>
                  <th>#</th>
                  <th>ID Nasabah</th>
                  <th>ID Loan</th>
                  <th>Nama File</th>
                  <th>Siklus</th>
                  <th>Status Eksekusi TIF</th>
                  <th>Status Penyesuaian</th>
                  <th>Starting Date GP</th>
                  <th>End Gate GP</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($nasabah as $klien)
                    <tr>
                      <th scope="row">{{ $klien->id }}</th>
                      <th scope="row"><a href="#">{{ $klien->NasabahId }}</a></th>
                      <td>{{ $klien->LoanId }}</td>
                      <td>{{ $klien->NamaFile }}</td>
                      <td>{{ $klien->Siklus }}</td>
                      <td><span class="badge bg-primary">{{ $klien->StatusEksekusiTIF }}</span></td>
                      <td><span class="badge bg-primary">{{ $klien->Status }}</span></td>
                      <td><a>{{ $klien->StartingDateGP }}</a></td>
                      <td><a>{{ $klien->EndDateGP }}</a></td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
              <!-- End Table with hoverable rows -->

            </div>
          </div>

      <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tabel Nama File</h5>
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
                    @foreach($dokumen as $doc)
                    <tr>
                      <th scope="row">{{ $doc->Id }}</th>
                      <th scope="row"><a href="#">{{ $klien->NamaFile }}</a></th>
                      <td>{{ $doc->TanggalTerima }}</td>
                      <td>{{ $doc->DivisiAsal }}</td>
                      <td>{{ $doc->NoMemoAsal }}</td>
                      <td>{{ $doc->PerihalMemoAsal }}</td>
                      <td>{{ $doc->TanggalKirim }}</td>
                      <td>{{ $doc->NoMemoOBS }}</td>
                      <td>{{ $doc->PerihalMemoOBS }}</td>
                      <td>{{ $doc->NoTiket }}</td>
                      <td><span class="badge bg-primary">{{ $doc->StatusTiket }}</span></td>
                      <td>{{ $doc->JenisGP }}</td>
                    </tr>
                    @endforeach
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
