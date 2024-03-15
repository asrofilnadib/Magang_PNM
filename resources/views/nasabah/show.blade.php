{{--@dd($nasabah)--}}
@extends('layouts.mains')
@section('content')
  <main id="main" class="main">

    <div class="pagetitle mb-3">
      <h1>Form Elements</h1>
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
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Text</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->LoanId }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Text</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->LoanId }}
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Text</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->LoanId }}
                  </div>
                </div>
              </form><!-- End General Form Elements -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Advanced Form Elements -->
              <form>
                <div class="row mb-3">
                  <div class="col-lg-12">
                    <label for="inputText" class="col-sm-2 col-form-label w-auto font-extralight text-sm italic">Nasabah ID</label>
                  </div>
                  <div class="w-auto font-normal font-sans">
                    {{ $nasabah->NasabahId }}
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
