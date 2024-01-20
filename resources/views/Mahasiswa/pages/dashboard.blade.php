@extends('template.index')
@section('content')

<h4 class="mb-6">Selamat Datang, {{ Auth::user()->name }}</h4>
<h1 style="text-align: center; background-color: silver; border-radius: 10px">{{ Auth::user()->name }} Dashboard</h1>
<div>
<h3>Data</h3>
    <div class="row mt-6">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card" style="background-color:steelblue">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <div class="col-6"><i class="ti ti-layout-list"></i></div>
                      <p class="text-sm mb-0 text-capitalize font-weight-bold"><h2 style="color:whitesmoke">Pengguna</h2></p>
                      <h5 class="font-weight-bolder mb-0" style="color: yellow">
                        {{$user_count}}
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card" style="background-color: #6B99C3">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                        <div class="col-6"><i class="ti ti-layout-list"></i></div>
                      <p class="text-sm mb-0 text-capitalize font-weight-bold"><h2 style="color:whitesmoke">Barang</h2></p>
                      <h5 class="font-weight-bolder mb-0" style="color: yellow">
                        {{$product_count}}
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card" style="background-color: #252f40">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                        <div class="col-6"><i class="ti ti-layout-list"></i></div>
                      <p class="text-sm mb-0 text-capitalize font-weight-bold"><h2 style="color:whitesmoke">Peminjaman</h2></p>
                      <h5 class="font-weight-bolder mb-0" style="color: yellow">
                        {{-- {{$peminjaman_count}} --}}
                        0
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>

</div>
@endsection
