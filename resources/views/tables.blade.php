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
                      <th scope="row"><a href="/nasabah/{{ $klien->NasabahId }}">{{ $klien->NasabahId }}</a></th>
                      <td>{{ $klien->LoanId }}</td>
                      <td>{{ $klien->Siklus }}</td>
                      <td>
                        @if($klien->StatusEksekusiTIF == "Sesuai")
                          <span class="badge bg-success">{{ $klien->StatusEksekusiTIF }}</span>
                        @elseif($klien->StatusEksekusiTIF == "Modifikasi")
                          <span class="badge bg-warning">{{ $klien->StatusEksekusiTIF }}</span>
                        @endif
                      </td>
                      <td>
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
              <!-- End Table with hoverable rows -->

            </div>
          </div>

      <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tabel Nama File</h5>
            <!-- Small tables -->
            <div class="table-responsive">
                <table class="table table-sm display" id="smTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama File</th>
                            <th>No.Memo Asal</th>
                            <th>No.Memo OBS</th>
                            <th>No.Tiket</th>
                            <th>Status Tiket</th>
                            <th>Jenis GP</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dokumen as $doc)
                    <tr>
                      <th scope="row">{{ $doc->id }}</th>
                      <th scope="row">{{ $doc->NamaFile }}</th>
                      <td>{{ $doc->NoMemoAsal }}</td>
                      <td>{{ $doc->NoMemoOBS }}</td>
                      <td>{{ $doc->NoTiket }}</td>
                      <td>
                        @if($doc->StatusTiket == 'Belum Kirim Ticket')
                          <span class="badge bg-secondary">{{ $doc->StatusTiket }}</span>
                        @elseif($doc->StatusTiket == 'Sudah Kirim Ticket')
                          <span class="badge bg-success"> {{ $doc->StatusTiket }}</span>
                      @endif</td>
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
      $('#smTable').DataTable({
        'pageLength': 5,
      });
    });
  </script>
  {{--Datatables JQuery--}}
  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>

@endsection
