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
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Age</th>
                    <th scope="col">Start Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($nasabah as $klien)
                    <tr>
                      <th scope="row">{{ $klien->id }}</th>
                      <td>{{ $klien->NamaFile }}</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2016-05-25</td>
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
              <h5 class="card-title">Small tables</h5>
              <!-- Small tables -->
              <div class="responsive">
                <table class="table table-sm display" id="smTable">
                  <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Age</th>
                    <th scope="col">Start Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dokumen as $doc)
                    <tr>
                      <th scope="row">{{ $doc->Id }}</th>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2016-05-25</td>
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
