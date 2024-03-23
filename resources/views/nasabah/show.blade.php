{{--@dd($nasabah)--}}
@extends('layouts.mains')
@section('content')
  <main id="main" class="main">

    <div class="pagetitle mb-3">
      <h1>Detail Nasabah</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Nasabah ID</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->NasabahId }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Loan ID</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->LoanId }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Status Penyesuaian</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->Status }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Status Eksekusi TIF</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->StatusEksekusiTIF }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Starting Date GP</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->StartingDateGP }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">End Date GP</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->EndDateGP }}
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              {{-- <h5 class="card-title"></h5> --}}

              <!-- Advanced Form Elements -->
              <form>
                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Nama File</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->document->NamaFile }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Siklus</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->Siklus }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Tanggal Pencairan</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->TanggalPencairan }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Tanggal Pencairan Value</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->TanggalPencairanValue }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Date Eksekusi TIF</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->DateEksekusiTIF }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Starting Date GP (Penyesuaian)</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->StartingDateGP_Penyesuaian }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">End Date GP (Penyesuaian)</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->EndDateGP_Penyesuaian }}
                  </div>
                </div>


              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
