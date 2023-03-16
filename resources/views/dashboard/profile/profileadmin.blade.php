@extends('dashboard.layouts.maindash')
@section('container')
  @if(session()->has('success'))
      <div class="alert alert-success col-lg-11" role="alert">
        {{ session('success') }}
      </div>
  @endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Profil Saya</h1>
</div>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Biodata</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8">{{ $UserLogin->Name  }}</div>
                  </div>
                  
                   <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8">{{ $UserLogin->Username  }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">E-mail</div>
                    <div class="col-lg-9 col-md-8">{{ $UserLogin->Email  }}</div>
                  </div>

                </div>
                <div class="col-sm-2 button-edit">
                    <a href="/dashboard/editprofile"><button type="button" class="btn btn-info add-new">Edit Profil</button></a>
                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
  @endsection()